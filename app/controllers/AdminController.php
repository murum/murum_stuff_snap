<?php

class AdminController extends BaseController {
    public function getLogin() {
        if ( Auth::check() ) {
            return Redirect::route("admin.dashboard");
        }
        return View::make("admin.login");
    }
    public function postLogin() {
        if ( Auth::attempt(["username" => Input::get("username"), "password" => Input::get("password")]) ) {
            return Redirect::route("admin.dashboard");
        }
        Log::warning("Failed login attempt for username: " . e(Input::get("username")) .
            " IP: " . Request::getClientIp());
        return Redirect::route("admin.login");
    }
    public function getDashboard() {
        return View::make("admin.dashboard")->with("admin", Auth::getUser());
    }
    public function getHandleCards() {
        $cards = Card::orderBy("updated_at", "desc")->paginate(60);
        return View::make("admin.handle_cards")->with("cards", $cards);
    }
    public function getDeleteCard($id) {
        $this->_checkHasRole(Admin::ROLE_CAN_DELETE_CARD);
        Card::findOrFail($id)->delete();
        Log::info("Admin: " . Auth::getUser()->username . " deleted card id: " . $id);
        return Redirect::back();
    }
    public function getDeleteCardBlockIp($id) {
        $this->_checkHasRole(Admin::ROLE_CAN_BLOCK_IP);
        $cardIp = Card::findorFail($id)->ip_address;
        $this->getDeleteCard($id);
        BlockedIp::updateOrCreate(["ip" => $cardIp]);
        Log::info("Admin: " . Auth::getUser()->username . " blocked IP: " . $cardIp);
        return Redirect::back();
    }
    public function getLogout() {
        Auth::logout();
        return Redirect::route("admin.login");
    }
    private function _checkHasRole($role) {
        $roles = explode(",", Auth::getUser()->role);
        if ( ! in_array($role, $roles) ) {
            throw new Exception("Admin does not have role: " . $role);
        }
    }
}
