<?php

class User extends Eloquent {

    public static $rules = array(
        'snapname' => 'required_without:kik|max:15',
		'kik' => 'required_without:snapname|max:30',
        'description' => 'required|max:170',
        'sex' => 'numeric|in:0,1,2,9',
    );


    // TODO: SHOULD BE REFACTORED TO A REPOSITORY
    public function has_picture() {
        return !empty($this->picture);
    }

    public function has_picture_or_kik() {
        //return (!empty($this->picture) || !empty($this->kik));
		return ( !empty($this->kik) );
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
        if ( $this->sex == 0 ) return 'transgender';
        if ( $this->sex == 1 ) return 'boysymbol';
        if ( $this->sex == 2 ) return 'girlsymbol';

        return 'transgender';
    }

	public function get_usernames_amount() {
		$usernames = 1;
		if (!empty($this->kik)) $usernames++;
		if (!empty($this->instagram)) $usernames++;
		return $usernames;
	}

    public function get_image() {
		/*
        if($this->picture) {
            return $this->picture;
        } else
		*/
		if( $this->kik ) {
            return $this->kik_picture;
        } else {
            return false;
        }
    }

}
