<?php

class UsersControllerTest extends TestCase {
    const UNIT_TEST_USER = "UNIT_TEST_USER";
    const UNIT_TEST_USER_OTHER_NAME = "UNIT_TEST_USER_OTHER_NAME";

    public function test_prevent_new_card_within_24_hours() {
        $user = $this->_getOrCreateUser();
        $user->created_at = (new Datetime)->modify("-23 hours");
        $user->save();

        $this->call("POST", route("users.store"), ["snapname" => self::UNIT_TEST_USER]);
        $this->assertTrue(Session::has("flash_notification"));
        $this->assertEquals(Lang::get('messages.error.ip_used') . ' ' .$user->created_at->modify('+1 day'),
               Session::get("flash_notification")["message"]);
    }
    public function test_allow_new_card_within_24_hours_with_other_snapname() {
            $user = $this->_getOrCreateUser();
            $user->created_at = (new Datetime)->modify("-23 hours");

            $user->snapname = self::UNIT_TEST_USER_OTHER_NAME;
            $user->save();

            $this->call("POST", route("users.store"), ["snapname" => self::UNIT_TEST_USER]);
            $this->assertNotEquals(Lang::get('messages.error.ip_used') . ' ' .$user->created_at->modify('+1 day'), Session::get("flash_notification")["message"]);
    }

    private function _getOrCreateUser() {
        if ( ! User::whereSnapname(self::UNIT_TEST_USER)->exists() ) { // TODO ok to set affected User models fields to fillable to use Laravel firstOrCreate function instead?
            $user = new User;
        } else {
            $user = User::whereSnapname(self::UNIT_TEST_USER)->firstOrFail();
        }

        $user->snapname = self::UNIT_TEST_USER;
        $user->description = self::UNIT_TEST_USER;
        $user->age = 22;
        $user->ip_address = Request::getClientIp();
        $user->save();

        return $user;
    }
}
