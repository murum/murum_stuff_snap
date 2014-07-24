<?php

class User extends Eloquent {

    public static $rules = array(
        'snapname' => 'required',
        'description' => 'required',
        'birthday' => 'required|date',
        'sex' => 'numeric|in:0,1,2,9',
        'image' => 'image'
    );

}
