<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
    }

    public function index()
    {
        $data = [
            'ci_version'  => CI_VERSION
        ];

        echo $this->addPath("home")->twig->display('@home/home', $data);
    }
}
