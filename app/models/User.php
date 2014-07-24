<?php

class User extends Eloquent {

    public static $rules = array(
        'snapname' => 'required',
        'description' => 'required',
        'birthday' => 'required|date',
        'sex' => 'numeric|in:0,1,2,9',
        'image' => 'image'
    );


    // TODO: SHOULD BE REFACTORED TO A REPOSITORY
    public function has_picture() {
        return !empty($this->picture);
    }

    public function get_age() {
        //explode the date to get month, day and year
        $birthDate = explode("-", $this->birthday);
        //get age from date or birthdate
        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
          ? ((date("Y") - $birthDate[0]) - 1)
          : (date("Y") - $birthDate[0]));
        return $age;
    }

    public function get_gender() {
        if ( $this->sex == 0 ) return 'unknown';
        if ( $this->sex == 1 ) return 'male';
        if ( $this->sex == 2 ) return 'female';

        return 'not_applicable';
    }

}
