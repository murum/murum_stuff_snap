<?php

class BlockedIp extends Eloquent {
    protected $fillable = ["ip"];

    public static function isBlocked() {
        return BlockedIp::whereIp(Request::getClientIp())->exists();
    }
}
