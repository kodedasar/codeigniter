<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = [
            'ci_version'  => CI_VERSION
        ];

        echo $this->addPath("welcome")->twig->display('@welcome/welcome', $data);
    }

    public function dashboard()
    {
        echo $this->addPath("welcome")->twig->display('@welcome/dashboard');
    }
}
