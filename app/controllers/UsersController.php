<?php

class UsersController extends BaseController {

    public function index() {
        $users = User::orderBy('updated_at', 'DESC')->paginate(12);
        return View::make('users.index')->with('users', $users);
    }

    public function create() {
        if(
            Request::getClientIp() == '109.58.145.73'
            ||
            Request::getClientIp() == '78.72.85.42'
            ||
            Request::getClientIp() == '46.195.125.40'
            ||
            Request::getClientIp() == '90.141.181.66'
            ||
            Request::getClientIP() == '193.138.219.229'
            ||
            Request::getClientIP() == '213.64.97.73'
        ) {
            Flash::error(Lang::get('messages.error.create_banned'));
            return Redirect::to('/');
        }

        return View::make('users.create');
    }

    public function show($username) {
        $user = User::where('snapname', '=', $username)->firstOrFail();
        return View::make('users.show')->with('user', $user);
    }

    public function store() {
        if( Common::ipIsFree() ) {
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

					$html = new Htmldom('http://kik.com/u/'.$user->kik);
					foreach($html->find('img') as $element) {
						$user->kik_picture = $element->src;
					}
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
        } else {
            $user = Common::getUserByBusyIP();
            Flash::error( Lang::get('messages.error.ip_used') . ' ' .$user->created_at->modify('+1 day'));
            return Redirect::home();
        }
    }

	public function kik_image() {
		$kik = Input::get('kik');

		$html = new Htmldom('http://kik.com/u/'.$kik);
		foreach($html->find('img') as $element) {

			return Response::json(array(
				'success' => true,
				'source' => $element->src
			));
		}

		return Response::json(array(
			'success' => false,
			'source' => '/images/placeholder_sv.png',
		));
	}

    public function get_bump() {
        return View::make('bump.bump');
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