<?php

class UsersController extends BaseController {

    public function index() {
        $users = User::orderBy('created_at', 'DESC')->paginate(12);
        return View::make('users.index')->with('users', $users);
    }

    public function create() {
        return View::make('users.create');
    }

    public function show($username) {
        $user = User::where('snapname', '=', $username)->firstOrFail();
        return View::make('users.show')->with('user', $user);
    }

    public function store() {
        $validator = Validator::make(Input::all(), User::$rules);

        if ($validator->passes()) {
            $user = new User;

            $user->snapname = Input::get('snapname');
            $user->description = Input::get('description');

            if (Input::has('birthday')) {
                $user->birthday = Input::get('birthday');
            }

            if (Input::has('kik')) {
                $user->kik = Input::get('kik');
            }

            if (Input::has('instagram')) {
                $user->instagram = Input::get('instagram');
            }

            if( Input::has('sex') ) {
                $user->sex = Input::get('sex');
            }

            if (Input::has('image')) {
                $user->picture = Input::get('image');
            }
            if( $user->save() ) {
                return Redirect::to('/')->with('message', 'Thanks for registering!');
            } else {
                return Redirect::back()->withInput()->with(['error' => 'Something went wrong in the save process of the user']);
            }
        }
        return Redirect::back()->withInput()->withErrors($validator);
    }
}