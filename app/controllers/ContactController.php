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
            Flash::error(Lang::get('messages.error.mail'));
            return Redirect::back()->withInput();
        }

        Flash::success(Lang::get('messages.success.contact_mail'));
        return Redirect::back();
    }
}
