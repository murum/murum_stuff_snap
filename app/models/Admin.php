<?php

use Illuminate\Auth\UserInterface;

/*
 * Custom User model used by admins
 */
class Admin extends Eloquent implements UserInterface {
    const ROLE_CAN_DELETE_CARD = 1;
    const ROLE_CAN_BLOCK_IP = 2;

    public function getAuthIdentifier() {
        return $this->getKey();
    }
    public function getAuthPassword() {
        return $this->password;
    }
    public function getReminderEmail() {
        return $this->username;
    }
    public function getRememberToken() {
        return $this->getRememberTokenName();
    }
    public function setRememberToken($value) {
        $this->remember_token = $value;
    }
    public function getRememberTokenName() {
        return 'remember_token';
    }

}
