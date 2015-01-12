<?php

class StaticController extends BaseController
{
	public function update()
	{
		return View::make('static.update');
	}

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
        $rules =  array('captcha' => array('required', 'captcha'));
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
        {
            Flash::error('Captcha var felaktigt inskriven.');
            return Redirect::back()->withInput();
        }
        else
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
                Flash::error(Lang::get('messages.error.mail'));
                return Redirect::back()->withInput();
            }

            Flash::success(Lang::get('messages.success.feedback_mail'));
            return Redirect::back();
        }
    }
}
