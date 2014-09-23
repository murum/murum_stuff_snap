<?php

class CardsControllerTest extends TestCase {
    const UNIT_TEST_CARD = "UNIT_TEST_CARD";
    const UNIT_TEST_CARD_OTHER_NAME = "UNIT_TEST_CARD_OTHER_NAME";

    public function test_prevent_new_card_within_24_hours() {
        $card = $this->_getOrCreateCard();
        $card->created_at = (new Datetime)->modify("-23 hours");
        $card->save();

        $this->call("POST", route("cards.store"), ["snapname" => self::UNIT_TEST_CARD]);
        $this->assertTrue(Session::has("flash_notification"));
        $this->assertEquals(Lang::get('messages.error.ip_used') . ' ' .$card->created_at->modify('+1 day'),
               Session::get("flash_notification")["message"]);
    }
    public function test_allow_new_card_within_24_hours_with_other_snapname() {
            $card = $this->_getOrCreateCard();
            $card->created_at = (new Datetime)->modify("-23 hours");

            $card->snapname = self::UNIT_TEST_CARD_OTHER_NAME;
            $card->save();

            $this->call("POST", route("cards.store"), ["snapname" => self::UNIT_TEST_CARD]);
            $this->assertNotEquals(Lang::get('messages.error.ip_used') . ' ' .$card->created_at->modify('+1 day'), Session::get("flash_notification")["message"]);
    }

    private function _getOrCreateCard() {
        if ( ! Card::whereSnapname(self::UNIT_TEST_CARD)->exists() ) {
            $card = new Card;
        } else {
            $card = Card::whereSnapname(self::UNIT_TEST_CARD)->firstOrFail();
        }

        $card->snapname = self::UNIT_TEST_CARD;
        $card->description = self::UNIT_TEST_CARD;
        $card->age = 22;
        $card->ip_address = Request::getClientIp();
        $card->save();

        return $card;
    }
}
