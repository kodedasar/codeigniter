<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->twig->display('welcome', [
            'version' => CI_VERSION,
        ]);
    }
}
