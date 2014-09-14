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

        $this->_becomeAdmin();

        // Visit dashboard first so we can Redirect::back() to it
        $this->call("GET", route("admin.dashboard"));

        $this->call("GET", route("admin.delete_card_block_ip", [$card->id]));
        $this->assertTrue(BlockedIp::whereIp(self::UNIT_TEST_IP)->exists());
        $this->assertFalse(Card::whereId($card->id)->exists());
    }
    public function test_block_ip_manually() {
        $this->_becomeAdmin();

        BlockedIp::whereIp(self::UNIT_TEST_IP)->delete();

        $this->call("POST", route("admin.block_ip", ["ip" => self::UNIT_TEST_IP]));
        $this->assertTrue(BlockedIp::whereIp(self::UNIT_TEST_IP)->exists());
    }
    private function _becomeAdmin() {
        $admin = new Admin;
        $admin->username = self::UNIT_TEST_CARD;
        $admin->role = implode(",", [Admin::ROLE_CAN_DELETE_CARD, Admin::ROLE_CAN_BLOCK_IP]);
        $this->be($admin);
    }
}

