<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Earn extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('user_id') == NULL)
            redirect("index.php/Login");
        else {
            $this->load->helper(['language', 'lang', 'url']);
            dilSecici();

            $data=array();
            $data["todayTop250"]= $this->statics_model->getTop250DailyVisit();
            $data["weeklyTop250"]= $this->statics_model->getTop250WeeklyVisit();
            $data["monthlyTop250"]= $this->statics_model->getTop250MountlyVisit();

            $this->load->view('_head');
            $this->load->view('earn',$data);
            $this->load->view('_foot');
        }
    }




    public function getUrlsFromDatabase()
    {
        $result = $this->sites_model->getUrlsFromDatabase();
        $HTML = "";

        foreach ($result as $site) {
            $HTML .= "<tr>
                        <td name='sites_selector'  site_id='".$site["websites_id"]."'  visit_cost='" . $site["visit_cost"] . "'  credits='" . $site["credits"] . "'  durations='" . $site["durations_sec"] . "'  >" . $site["url"] . "</td>
                      </tr>";
        }

        echo $HTML;
    }

    public function saveIP()
    {
        $user_id = $this->session->userdata("user_id");
        $result = $this->user->getIPInfo_Control($user_id);
        $deger = 0;
        if ($result != null) {
            if ( $result[0]["user_ip"] ==  $_SERVER["REMOTE_ADDR"]  && $result[0]["record_status"] == "1") {  //$result[0]["record_status"] == "1"
                $deger = 1;


            } else {

                $id = $this->user->getIPInfo_Save();
                $deger = 2;


            }
        } else {
            $deger = 3;
            $id = $this->user->getIPInfo_Save();

        }


        echo $deger;
    }

    public function closedIP()
    {
        $id = $this->user->getIPInfo_Close();
        echo $id;
    }

    public function controllActiveViewer()
    {
      $user_id =  $this->session->userdata("user_id");
        $result = $this->user->controllActiveViewer($user_id);
        $HTML = "";

        foreach ($result as $ip) {
            $HTML .= "<tr>
                        <td>".$ip["user_ip"]."</td>
                        <td>
                            Type: ".$ip["user_browser"]."
                        </td>
                    </tr>";
        }

        echo $HTML;
    }




}
