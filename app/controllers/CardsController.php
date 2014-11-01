<?php

class CardsController extends BaseController {

    public function index() {
        $cards = Card::orderBy('updated_at', 'DESC')->paginate(12);
        return View::make('cards.index')->with('cards', $cards);
    }

    public function create() {
        if ( BlockedIp::isBlocked() ) {
            Flash::error(Lang::get('messages.error.create_banned'));
            return Redirect::to('/');
        }
        return View::make('cards.create');
    }

    public function show($username) {
        $card = Card::where('snapname', '=', $username)->firstOrFail();
        return View::make('cards.show')->with('user', $card);
    }

    public function store() {
	    if ( ! $this->_isAllowedToStore() ) {
		    $user = Common::getUserByBusyIP();
		    Flash::error( Lang::get('messages.error.ip_used') . ' ' .$user->created_at->modify('+1 day'));
		    Log::info("User id: $user->id snapname: $user->snapname must wait before adding new card");
		    return Redirect::home();
	    }

	    $validator = Validator::make(Input::all(), Card::$rules);

	    if ($validator->passes()) {
		    $card = new Card;

		    $card->snapname = Input::get('snapname');
		    $card->description = Input::get('description');
		    $card->ip_address = Request::getClientIp();

		    if (Input::has('age')) {
			    $card->age = Input::get('age');
		    }

		    if (Input::has('kik')) {
			    $card->kik = Input::get('kik');

			    $html = new Htmldom('http://kik.com/u/'.$card->kik);
			    foreach($html->find('img') as $element) {
				    $card->kik_picture = $element->src;
			    }
		    }

		    if (Input::has('instagram')) {
			    $card->instagram = Input::get('instagram');
		    }

		    if( Input::has('sex') ) {
			    $card->sex = Input::get('sex');
		    }

		    if (Input::has('image')) {
			    $card->picture = Input::get('image');
		    }

		    if( $card->save() ) {
			    Flash::success(Lang::get('messages.success.created_card'));
			    return Redirect::to('/');
		    } else {
			    Flash::error(Lang::get('message.error.create_card_fail_save'));
                return Redirect::route("cards.create")->withInput();
		    }
	    }
	    Flash::error(Lang::get('messages.error.validation'));
	    return Redirect::route("cards.create")->withInput()->withErrors($validator);
    }

	public function kik_image() {
		$kik = Input::get('kik');

		$html = new Htmldom('http://kik.com/u/open/'.$kik);
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
        $card = Card::whereSnapname($snapname)->get()->last();

        if($card) {
            // If the bump were made with 1 day... there's to early for a bump
            $next_bump = $card->updated_at->modify('+1 day');
            $now = new DateTime();
            if($next_bump >= $now->format(Common::STANDARD_DATETIME_FORMAT)) {
                Flash::error(Lang::get('messages.bump.already_bumped') . $next_bump);
                return Redirect::to('/');
            }


            $card->bumps += 1;
            if($card->save()){
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
	private function _isAllowedToStore() {
		if (App::environment("local")) {
			Log::debug("Always allow cards to be stored when running local environment");
			return true;
		}

		if ( BlockedIp::isBlocked() ) { 
			Log::warning("Blocked IP tried to store a card through a post request.");
			return false;
		}

		$date = (new DateTime)->modify('-1 day');

		return ! Card::whereIpAddress(Request::getClientIp())
			->where('created_at', '>=', $date)
			->whereSnapname(Input::get('snapname'))
			->exists();
	}
}