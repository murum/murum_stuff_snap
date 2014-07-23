<?php

class UsersController extends BaseController {

    public function index() {

        return View::make('users.index');

    }

    public function create() {

        return View::make('users.create');

    }

    public function show($username) {
        return View::make('users.show');
    }

    public function store() {

    }

}