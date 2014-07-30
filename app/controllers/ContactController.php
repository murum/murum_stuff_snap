<?php

class ContactController extends BaseController {
    public function contact()
    {
        $name = Input::get('name');
        $email = Input::get('email');
        $message_text = Input::get('message');
        $data = array(
            'name' => $name,
            'email' => $email,
            'message_text' => $message_text,
        );

        Mail::send('emails.contact', $data, function($message) use ($name, $email)
        {
            $message->from($email, $name);
            $message->to('contact@letssnap.com', 'Let\'s Snap')->subject('Contact Message');
        });

        if(count(Mail::failures()) > 0){
            Flash::error('Something went wrong in the sending process, please send us a mail direct from your email.');
            return Redirect::back()->withInput();
        }

        Flash::success('An email was sent! We\'ll respond as soon as possible, we try to answer all mails within 24h');
        return Redirect::back();
    }
}
