<?php

class StaticController extends BaseController {

    public function about() {
        return View::make('static.about');
    }

    public function rules() {
        return View::make('static.rules');
    }

    public function contact() {
        return View::make('static.contact');
    }
}
