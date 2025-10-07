<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ApplicationModel;

class Home extends BaseController
{
    protected $userModel;
    protected $applicationModel;
    protected $session;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->applicationModel = new ApplicationModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data = [
            'title' => 'होम - एनजीओ विक्रांत',
            'isLoggedIn' => $this->session->get('isLoggedIn'),
            'user_name' => $this->session->get('user_name'),
            'user_role' => $this->session->get('user_role')
        ];

        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'हमारे बारे में - एनजीओ विक्रांत',
            'isLoggedIn' => $this->session->get('isLoggedIn'),
            'user_name' => $this->session->get('user_name'),
            'user_role' => $this->session->get('user_role')
        ];

        return view('pages/about', $data);
    }

    public function betiVivah()
    {
        $data = [
            'title' => 'बेटी विवाह सहायता - एनजीओ विक्रांत',
            'isLoggedIn' => $this->session->get('isLoggedIn'),
            'user_name' => $this->session->get('user_name'),
            'user_role' => $this->session->get('user_role')
        ];

        return view('pages/beti_vivah', $data);
    }

    public function deathHelp()
    {
        $data = [
            'title' => 'मृत्यु सहायता - एनजीओ विक्रांत',
            'isLoggedIn' => $this->session->get('isLoggedIn'),
            'user_name' => $this->session->get('user_name'),
            'user_role' => $this->session->get('user_role')
        ];

        return view('pages/death_help', $data);
    }

    public function educationHelp()
    {
        $data = [
            'title' => 'शिक्षा सहायता - एनजीओ विक्रांत',
            'isLoggedIn' => $this->session->get('isLoggedIn'),
            'user_name' => $this->session->get('user_name'),
            'user_role' => $this->session->get('user_role')
        ];

        return view('pages/education_help', $data);
    }

    public function ruleBook()
    {
        $data = [
            'title' => 'नियम पुस्तिका - एनजीओ विक्रांत',
            'isLoggedIn' => $this->session->get('isLoggedIn'),
            'user_name' => $this->session->get('user_name'),
            'user_role' => $this->session->get('user_role')
        ];

        return view('pages/rulebook', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'संपर्क करें - एनजीओ विक्रांत',
            'isLoggedIn' => $this->session->get('isLoggedIn'),
            'user_name' => $this->session->get('user_name'),
            'user_role' => $this->session->get('user_role')
        ];

        return view('pages/contact', $data);
    }
}
