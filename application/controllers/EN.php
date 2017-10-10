<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EN extends CI_Controller
{

    public function index()
    {
        $this->load->helper(['language', 'lang', 'url']);
        dilSecici();

        header("Location:index.php/Login/dilDegistir/us");
    }
}
