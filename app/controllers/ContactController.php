<?php

class ContactController extends BaseController {
    public function contact()
    {
        $data = array(
            'name' => Input::get('name'),
            'email' => Input::get('email'),
            'message' => Input::get('message'),
        );

        if(Mail::send('emails.contact', $data, function($message) use ($data)
        {
            $message->from($data['email'], $data['name']);
            $message->to('contact@letssnap.com', 'Let\'s Snap')->subject('Contact Message');
        }))
        {
            Flash::success('An email was sent! We\'ll respond as soon as possible, we try to answer all mails within 24h');
            Redirect::back();
        } else
        {
            dd(Flash);
            Flash::error('Something went wrong in the sending process, please send us a mail direct from your email.');
            Redirect::back()->withInput();
        }
    }
}
