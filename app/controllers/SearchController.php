<?php

class SearchController extends BaseController {

    public function index() {
        return View::make('search.index');
    }

    public function search() {
        if (Input::has('minAge') && Input::has('maxAge')) {
            $users = User::whereBetween('age', array(Input::get('minAge'), Input::get('maxAge')));
        } else if(Input::has('minAge')) {
            $users = User::where('age', '>=', Input::get('minAge'));
        } else if(Input::has('maxAge')) {
            $users = User::where('age', '<=', Input::get('maxAge'));
        }

        if (Input::has('sex')) {
            if(isset($users)) {
                $users = $users->where('sex', '=', Input::get('sex'))->orderBy('created_at', 'DESC')->paginate(12);
            } else {
                $users = User::where('sex', '=', Input::get('sex'))->orderBy('created_at', 'DESC')->paginate(12);
            }
        }
        return View::make('search.result', compact('users'));
    }
}
