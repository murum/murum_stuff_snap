<?php

class ContactController extends BaseController {

    public function index()
    {
        //return View::make('contact.index');
    }

    public function contact()
    {
        $data = array(
            'name' => Input::get('name'),
            'email' => Input::get('email'),
            'message' => Input::get('message'),
        );

        Mail::send('emails.contact', $data, function($message)
        {
            $message->to('contact@letssnap.com', 'Let\'s Snap')->subject('Contact Message');
        });
    }
}
