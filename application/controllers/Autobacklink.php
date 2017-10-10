<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autobacklink extends CI_Controller {

    public function index()
    {

            $this->load->helper(['language', 'lang', 'url']);
            dilSecici();

            $data=array();
            $data["todayTop250"]= $this->statics_model->getTop250DailyVisit();
            $data["weeklyTop250"]= $this->statics_model->getTop250WeeklyVisit();
            $data["monthlyTop250"]= $this->statics_model->getTop250MountlyVisit();

            $this->load->view('_head');
            $this->load->view('autobacklink',$data);
            $this->load->view('_foot');
    }
}
