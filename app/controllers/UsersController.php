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
            $user->ip_address = Request::getClientIp();

            if (Input::has('age')) {
                $user->age = Input::get('age');
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
                Flash::success('Your card was created!');
                return Redirect::to('/');
            } else {
                Flash::error('Something went wrong in the save process of the card, please try again!');
                return Redirect::back()->withInput();
            }
        }
        Flash::error('Validation errors. You\'ll also need to recreate your photo');
        return Redirect::back()->withInput()->withErrors($validator);
    }
}