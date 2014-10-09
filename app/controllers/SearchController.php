<?php

class SearchController extends BaseController {

    public function index() {
        return View::make('search.index');
    }

    public function search() {

        $query = Card::query();

        if (Input::has('minAge') && Input::has('maxAge')) {
            $query->whereBetween('age', array(Input::get('minAge'), Input::get('maxAge')));
        } else if (Input::has('minAge')) {
            $query->where('age', '>=', Input::get('minAge'));
        } else if (Input::has('maxAge')) {
            $query->where('age', '>=', Input::get('maxAge'));
        }

        if (Input::has('sex') && Input::get('sex') !== "0") {
            $query->where('sex', '=', Input::get('sex'));
        }

        $users = $query->paginate(15);

        return View::make('search.result', compact('users'));

    }
}