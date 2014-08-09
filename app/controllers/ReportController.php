<?php

class ReportController extends BaseController {

    public function index() {

    }


    public function store() {

        $rules = array(
            'reason' => 'required',
            'user_id' => 'exists:users,id',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Response::json(array('success' => false, 'messages' => $validator->messages()));
        }

        $report = new Report;

        $report->reason = Input::get('reason');
        $report->ip_address = Request::getClientIp();
        $report->user_id = Input::get('user_id');

        $report->save();

        return Response::json(array('success' => true));

    }


}
