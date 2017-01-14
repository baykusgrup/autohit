<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->helper(array('form','url'));
        $this->load->view('_head');
        $this->load->view('login');
        $this->load->view('_foot');
    }

    public function dilDegistir($gelen)
    {
        $this->load->helper(['language', 'lang', 'url']);
        $this->load->helper(['language', 'lang', 'url']);
        dilSecici($gelen);
        header("Location:".$_SERVER['HTTP_REFERER']."");
    }

}
