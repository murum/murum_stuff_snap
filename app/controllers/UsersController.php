<?php

class UsersController extends BaseController {

    public function index() {

        $users = User::orderBy('created_at')->paginate(15);

        return View::make('users.index')->with('users', $users);

    }

    public function create() {



        return View::make('users.create');

    }

    public function show($username) {

        $user = User::where('snapname', '=', $username)->firstOrFail();

        return View::make('users.show');
    }

    public function store() {

    }

}