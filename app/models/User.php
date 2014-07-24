<?php

class User extends Eloquent {

    public static $rules = array(
        'snapname' => 'required',
        'description' => 'required',
        'birthday' => 'date',
    );

}
