<?php

class BlockedIp extends Eloquent {
    protected $primaryKey = "ip";
    protected $fillable = ["ip", "reason"];

    public static function isBlocked() {
        return BlockedIp::whereIp(Request::getClientIp())->exists();
    }
}
