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

            if (Input::hasFile('image')) {

                $extension = Input::file('image')->getClientOriginalExtension();

                $destinationPath = public_path() . '/uploads/';
                $fileName = md5(uniqid(rand(), true) . date('Y-m-d H:i:s')) . $extension;

                $url = $destinationPath . $fileName;

                Input::file('image')->move($destinationPath, $fileName);

                $user->picture = $url;

            }

            $user->save();

            return Redirect::to('/')->with('message', 'Thanks for registering!');
        }
        return Redirect::to('users/create')->withErrors($validator);
    }
}