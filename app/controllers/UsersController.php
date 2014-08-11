<?php

class UsersController extends BaseController {

    public function index() {
        $users = User::orderBy('updated_at', 'DESC')->paginate(12);
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
                Flash::success(Lang::get('messages.success.created_card'));
                return Redirect::to('/');
            } else {
                Flash::error(Lang::get('message.error.create_card_fail_save'));
                return Redirect::back()->withInput();
            }
        }
        Flash::error(Lang::get('messages.error.validation'));
        return Redirect::back()->withInput()->withErrors($validator);
    }

    public function post_bump() {
        $snapname = Input::get('bump_snapname');
        $user = User::whereSnapname($snapname)->get()->last();

        if($user) {
            // If the bump were made with 1 day... there's to early for a bump
            $next_bump = $user->updated_at->modify('+1 day');
            $now = new DateTime();
            if($next_bump >= $now->format('Y-m-d H:i:s')) {
                Flash::error(Lang::get('messages.bump.already_bumped') . $next_bump);
                return Redirect::to('/');
            }


            $user->bumps += 1;
            if($user->save()){
                Flash::success(Lang::get('messages.bump.success'));
                return Redirect::to('/');
            } else {
                Flash::error(Lang::get('messages.bump.server_error'));
            }
        } else {
            Flash::error(Lang::get('messages.bump.no_user'));
        }
        return Redirect::to('/');
    }
}