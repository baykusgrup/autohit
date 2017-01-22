<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Refferal extends CI_Controller {

    public function index()
    {
        if ($this->session->userdata('user_id') == NULL)
            redirect("index.php/Login");
        else {
            $this->load->helper(['language', 'lang', 'url']);
            dilSecici();

            $user_id = $this->session->userdata("user_id");

            $data = array();
            $data["userInfo"] = $this->account_model->getUserAllInfoByUserID($user_id);
            $data["refferrals"] = $this->account_model->getReferallsbyUserID($user_id);

            $data["todayTop250"]= $this->statics_model->getTop250DailyVisit();
            $data["weeklyTop250"]= $this->statics_model->getTop250WeeklyVisit();
            $data["monthlyTop250"]= $this->statics_model->getTop250MountlyVisit();

            $this->load->view('_head');
            $this->load->view('refferal', $data);
            $this->load->view('_foot');
        }
    }
}
