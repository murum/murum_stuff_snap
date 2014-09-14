<?php

class AdminControllerTest extends TestCase {
    const UNIT_TEST_IP = "123.123.123.123";
    const UNIT_TEST_CARD = "UNIT_TEST_CARD";

    public function test_delete_card_block_ip() {
        BlockedIp::whereIp(self::UNIT_TEST_IP)->delete();
        $this->assertFalse(BlockedIp::whereIp(self::UNIT_TEST_IP)->exists());

        $card = new Card;
        $card->snapname = self::UNIT_TEST_CARD;
        $card->description = self::UNIT_TEST_CARD;
        $card->age = 22;
        $card->ip_address = self::UNIT_TEST_IP;
        $card->save();

        $admin = new Admin;
        $admin->username = self::UNIT_TEST_CARD;
        $admin->role = implode(",", [Admin::ROLE_CAN_DELETE_CARD, Admin::ROLE_CAN_BLOCK_IP]);
        $this->be($admin);

        $this->call("GET", route("admin.delete_card_block_ip", [$card->id]));
        $this->assertTrue(BlockedIp::whereIp(self::UNIT_TEST_IP)->exists());
        $this->assertFalse(Card::whereId($card->id)->exists());
    }
}

