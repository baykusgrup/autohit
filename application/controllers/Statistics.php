<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistics extends CI_Controller {

    public function index()
    {
        if ($this->session->userdata('user_id') == NULL)
            redirect("index.php/Login");
        else {
            $this->load->helper(['language', 'lang', 'url']);
            dilSecici();
            $user_id =$this->session->userdata('user_id');
            $data=array();
            $data["todayCount"]= $this->statics_model->getViewedTodayCount();
            $data["websitesCount"]= $this->statics_model->getWebsitesCount();
            $data["getUserCount"]= $this->statics_model->getUserCount();
            $data["getOnlineViewer"]= $this->statics_model->getOnlineMemberViewerCount();
            $data["todayVisitedByUser"]= $this->statics_model->getViewedTodayByUserCount($user_id);

            $data["todayTop250"]= $this->statics_model->getTop250DailyVisit();
            $data["weeklyTop250"]= $this->statics_model->getTop250WeeklyVisit();
            $data["monthlyTop250"]= $this->statics_model->getTop250MountlyVisit();

            $this->load->view('_head');
            $this->load->view('statistics',$data);
            $this->load->view('_foot');
        }
    }
}
