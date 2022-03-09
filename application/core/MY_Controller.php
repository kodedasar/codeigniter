<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/* load the MX_Router class */
require APPPATH . 'third_party/MX/Controller.php';

class MY_Controller extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->_hmvc_fixes();
    }

    public function _hmvc_fixes()
    {
        //fix callback form_validation
        //https://bitbucket.org/wiredesignz/codeigniter-modular-extensions-hmvc
        $this->load->library('form_validation');
        $this->form_validation->CI = &$this;
    }

    public function template($get = 'admin')
    {
        $paths = ['paths' => [APPPATH . "views/$get", VIEWPATH]];
        $this->load->library('Twig', $paths);
        $this->twig->base = getenv('CI_URL');

        if ($get == 'admin') {
            $this->twig->cache = false;
        }

        return $this;
    }

    public function addPath($namespace = '', $customPath = '')
    {
        if (empty($customPath)) {
            $paths = APPPATH . 'modules/' . get_class($this) . '/views/';
        } else {
            $paths = $customPath;
        }
        if (empty($namespace)) {
            $this->twig->addPath($paths);
        } else {
            $this->twig->addPath($paths, $namespace);
        }

        return $this;
    }
}
