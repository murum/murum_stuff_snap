<?php

class User extends Eloquent {

    public static $rules = array(
        'snapname' => 'required|max:15',
        'description' => 'required|max:170',
        'sex' => 'numeric|in:0,1,2,9',
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

    public function get_image() {
        if($this->picture) {
            return $this->picture;
        } elseif( $this->kik ) {
            $html = new Htmldom('http://kik.com/u/'.$this->kik);
            foreach($html->find('img') as $element) {
                return $element->src;
            }
        } else {
            return false;
        }
    }

}
