<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/* load the MX_Router class */
require APPPATH.'third_party/MX/Controller.php';

class MY_Controller extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->hmvc();
    }

    /**
     * HMVC : fix callback form_validation
     * https://bitbucket.org/wiredesignz/codeigniter-modular-extensions-hmvc.
     *
     * @return void
     */
    private function hmvc()
    {
        $this->load->library('form_validation');
        $this->form_validation->CI = &$this;
    }

    public function addPath($namespace = '', $customPath = '')
    {
        if (empty($customPath)) {
            $paths = APPPATH.'modules/'.get_class($this).'/views/';
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
