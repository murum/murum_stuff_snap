<?php

class SearchController extends BaseController {

    public function search() {

        $users = DB::table('users');

        if (Input::has('minAge') && Input::has('maxAge')) {
            $users = $users->whereBetween('age', array(Input::get('minAge'), Input::get('maxAge')));
        }

        if (Input::has('minAge')) {
            $users = $users->where('age', '>=', Input::get('minAge'));
        }
        if (Input::has('maxAge')) {
            $users = $users->where('age', '>=', Input::get('maxAge'));
        }

        if (Input::has('sex')) {
            $users = $users->where('sex', '=', Input::get('sex'));
        }

        $users = $users->paginate(15);

        //Load view?
    }
}
