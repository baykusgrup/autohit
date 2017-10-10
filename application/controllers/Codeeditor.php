<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CodeEditor extends CI_Controller {

    public function index()
    {
            $this->load->helper(['language', 'lang', 'url']);
            dilSecici();

            $this->load->view('codeeditor');
    }
}
