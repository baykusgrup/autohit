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
            $data["getUserCountLast24Hour"]= $this->statics_model->getUserCountLast24Hour();
            $data["getOnlineViewer"]= $this->statics_model->getOnlineMemberViewerCount();
            $data["getOnlineViewerLast24Hour"]= $this->statics_model->getOnlineMemberViewerCountLast24Hour();
            $data["todayVisitedByUser"]= $this->statics_model->getViewedTodayByUserCount($user_id);
            $data["weeklyVisitedByUser"]= $this->statics_model->getViewedWeeklyByUserCount($user_id);
            $data["monthlyVisitedByUser"]= $this->statics_model->getViewedMonthlyByUserCount($user_id);

            $data["todayTop250"]= $this->statics_model->getTop250DailyVisit();
            $data["weeklyTop250"]= $this->statics_model->getTop250WeeklyVisit();
            $data["monthlyTop250"]= $this->statics_model->getTop250MountlyVisit();

            $this->load->view('_head');
            $this->load->view('statistics',$data);
            $this->load->view('_foot');
        }
    }
}
