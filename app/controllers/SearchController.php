<?php

class SearchController extends BaseController {

    public function index() {
        return View::make('search.index');
    }

    public function search() {

        $users = DB::table('users');

        if (Input::has('minAge') && Input::has('maxAge')) {
            $users = $users->whereBetween('age', array(Input::get('minAge'), Input::get('maxAge')));
        } else if (Input::has('minAge')) {
            $users = $users->where('age', '>=', Input::get('minAge'));
        } else if (Input::has('maxAge')) {
            $users = $users->where('age', '>=', Input::get('maxAge'));
        }

        if (Input::has('sex')) {
            $users = $users->where('sex', '=', Input::get('sex'));
        }

        $users = $users->paginate(15);

        return View::make('search.result', compact('users'));
    }
}
