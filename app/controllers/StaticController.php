<?php

class StaticController extends BaseController
{

    public function about()
    {
        return View::make('static.about');
    }

    public function rules()
    {
        return View::make('static.rules');
    }

    public function contact()
    {
        return View::make('static.contact');
    }

    public function feedback()
    {
        return View::make('static.feedback');
    }

    public function send_feedback()
    {
        $message_text = Input::get('message');
        $email = Input::get('email');
        $data = array(
            'email' => $email,
            'message_text' => $message_text,
        );

        Mail::send('emails.feedback', $data, function($message) use ($email, $message_text)
        {
            $message->from($email, $email);
            $message->to('contact@letssnap.com', 'Let\'s Snap')->subject('Feedback Message');
        });

        if(count(Mail::failures()) > 0){
            Flash::error('Something went wrong in the sending process, please send us a mail direct from your email.');
            return Redirect::back()->withInput();
        }

        Flash::success('An email was sent! Thanks for letting us know your thoughts on this website');
        return Redirect::back();
    }
}
