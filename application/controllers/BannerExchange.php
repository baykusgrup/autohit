<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BannerExchange extends CI_Controller
{


    public function index()
    {
        if ($this->session->userdata('user_id') == NULL)
            redirect("index.php/Login");
        else {
            $user_id = $this->session->userdata("user_id");

            $this->load->helper(['language', 'lang', 'url']);
            dilSecici();

            $data = array();
            $data["userid"] = $user_id;
            $data["sites"] = $this->sites_model->getMyBannerByUserIDAllWithVisits($user_id);
            $data["userWallet"] = $this->sites_model->getWalletByUserID($user_id);

            $data["todayTop250"] = $this->statics_model->getTop250DailyVisit();
            $data["weeklyTop250"] = $this->statics_model->getTop250WeeklyVisit();
            $data["monthlyTop250"] = $this->statics_model->getTop250MountlyVisit();

            $this->load->view('_head');
            $this->load->view('bannerexchange', $data);
            $this->load->view('_foot');
        }

    }

    public function addSite()
    {

        $dateTime = date('Y-m-d H:i:s');
        $unique = uniqid();

        $dataBanner = array();

        $dataBanner["user_id"] = $this->session->userdata("user_id");
        $dataBanner["url_title"] = $this->input->post("title");
        $dataBanner["url"] = $this->input->post("url");
        $dataBanner["visit_cost"] = "1";
        $dataBanner["duration_sec_id"] = "15";

        $dataBanner["record_status"] = 1;
        $dataBanner["insert_date"] = $dateTime;
        $dataBanner["insert_user"] = 0;
        $dataBanner["update_date"] = $dateTime;
        $dataBanner["update_user"] = 0;

        $config = array();
        $config['upload_path'] = "./assets/uploads";
        $config["allowed_types"] = 'jpg|jpeg';
        $config["overwrite"] = true;
        $config["file_name"] = "banner_" . $unique . ".jpg";
        $this->load->library('upload', $config);

        if ($this->upload->do_upload("file")) {
            $path = "assets/uploads/";
            $dataBanner["banner_logo"] = $path . $config["file_name"];
            $dataBanner["uniqueid"] = $unique;
            $record_id = $this->generalTables_model->insertTables("websitesbanner", $dataBanner);
            echo $record_id;
        } else {
            echo "Error";
        }

    }

    public function updateSiteOnly(){

        $dateTime = date('Y-m-d H:i:s');

        $site_id = $this->input->post("site_id");
        $dataBanner = array();

        $dataBanner["url_title"] = $this->input->post("title");
        $dataBanner["url"] = $this->input->post("url");
        $dataBanner["visit_cost"] = "1";
        $dataBanner["duration_sec_id"] = "15";

        $dataBanner["record_status"] = $this->input->post("status");
        $dataBanner["update_date"] = $dateTime;
        $dataBanner["update_user"] = $this->session->userdata("user_id");


        $site_id = $this->generalTables_model->updateTable("websitesbanner", $site_id, $dataBanner);
        echo $site_id;


    }


    public function updateSiteAll()
    {

        $dateTime = date('Y-m-d H:i:s');

        $site_id = $this->input->post("site_id");
        $data = $this->sites_model->getBannerUniqueID($site_id);
        $unique = $data[0]["uniqueid"];
        $dataBanner = array();

        $dataBanner["url_title"] = $this->input->post("title");
        $dataBanner["url"] = $this->input->post("url");
        $dataBanner["visit_cost"] = "1";
        $dataBanner["duration_sec_id"] = "15";

        $dataBanner["record_status"] = $this->input->post("status");
        $dataBanner["update_date"] = $dateTime;
        $dataBanner["update_user"] = $this->session->userdata("user_id");


        $config = array();
        $config['upload_path'] = "./assets/uploads";
        $config["allowed_types"] = 'jpg|jpeg';
        $config["overwrite"] = true;
        $config["file_name"] = "banner_" . $unique . ".jpg";
        $this->load->library('upload', $config);

        if ($this->upload->do_upload("file")) {
            $path = "assets/uploads/";
            $dataBanner["banner_logo"] = $path . $config["file_name"];
            $record_id = $this->generalTables_model->updateTable("websitesbanner", $site_id, $dataBanner);
            echo $record_id;
        } else {
            echo "Error";
        }


    }

    public function deleteSite($site_id)
    {
        $user_id = $this->session->userdata("user_id");
        $this->db->where('websites_id', $site_id);
        $this->db->where('user_id', $user_id);
        $this->db->delete('websitesbanner');
        return true;
    }

    public function controllMySites()
    {
        $this->load->helper(['language', 'lang', 'url']);
        dilSecici();

        $user_id = $this->session->userdata("user_id");
        $return = $this->sites_model->getMyBannerByUserIDAllWithVisits($user_id);
        $HTML = "";
        foreach ($return as $site) {
            $HTML .= "<tr>
                                                <td id='updateSite_siteID_" . $site["websites_id"] . "' >" . $site["websites_id"] . "</td>
                                                <td id='updateSite_title_" . $site["websites_id"] . "'>" . substr($site["url_title"], 0, 15) . "</td>
                                                <td id='updateSite_url_" . $site["websites_id"] . "'>" . substr(preg_replace('#^https?://#', '', rtrim($site["url"], '/')), 0, 20) . "</td>
                                      
                                                
                                                <td style='display: none' id='updateSite_status_" . $site["websites_id"] . "'>" . $site["record_status"] . "</td>
                                                
                                                <td>" . $site["TotalVisit"] . "</td>
                                                <td>" . $site["TodayVisit"] . "</td>
                                                <td><a name='sites_selector' site_id='" . $site["websites_id"] . "' onclick=\"setUpdateSite(" . $site["websites_id"] . ");\"  href=\"#modal_addSite\"  data-toggle=\"modal\" class=\"btn btn-outline green btn-sm purple\"><i class=\"fa fa-edit\"></i> " . lang("sites_edit") . " </a></td>
                                            </tr>";
        }
        echo $HTML;
    }

    public function Call($size, $userid)
    {
        $data = array();
        $data['userid'] = $userid;
        $data['size'] = $size;

        $this->load->view('bannercall', $data);
    }

    public function Show($userid)
    {
        $data = array();
        $data["userid"] = $userid;
        $data["visitsite"] = $this->sites_model->getBannerFromDatabaseNotBlockedAndNotMySites($userid);

        $this->GiveCreditToShower($userid);
        $this->TakeCreditFromShowed($data["visitsite"][0]["websites_id"]);
        $this->RecordShowed($data["visitsite"][0]["websites_id"]);
        $this->load->view('banner', $data);
    }

    public function GiveCreditToShower($userid)
    {
        // userid nin user_wallet > banner_credits +1


        $dateTime = date('Y-m-d H:i:s');

        $userWallet = $this->sites_model->getWalletByUserID($userid);

        $wallet_id = $userWallet[0]["user_wallet_id"];


        $userWallet[0]["banner_credits"] = $userWallet[0]["banner_credits"] + 1;

        $dataSites = array();
        $dataSites["banner_credits"] = $userWallet[0]["banner_credits"];

        $dataSites["update_date"] = $dateTime;
        $dataSites["update_user"] = $this->session->userdata("user_id");

        $wallet_id = $this->generalTables_model->updateTable("user_wallet", $wallet_id, $dataSites);

    }

    public function TakeCreditFromShowed($siteid)
    {
        //  TakeCreditFromShowed
        // websiteid nin websitesbanner> websiteid si eşleşen sitenin
        // websiteid  websitesbanner>showed +1
        // useridnin user_wallet > banner_credits -1

        $dateTime = date('Y-m-d H:i:s');

        $userWallet = $this->sites_model->getBannersInfoBySiteID($siteid);

        $wallet_id = $userWallet[0]["user_wallet_id"];

        $userWallet[0]["banner_credits"] = $userWallet[0]["banner_credits"] - 1;

        $dataSites = array();
        $dataSites["banner_credits"] = $userWallet[0]["banner_credits"];

        $dataSites["update_date"] = $dateTime;
        $dataSites["update_user"] = $this->session->userdata("user_id");

        $wallet_id = $this->generalTables_model->updateTable("user_wallet", $wallet_id, $dataSites);

        $site_id = $userWallet[0]["websites_id"];

        $userWallet[0]["showed"] = $userWallet[0]["showed"] + 1;

        $dataSites = array();
        $dataSites["showed"] = $userWallet[0]["showed"];

        $dataSites["update_date"] = $dateTime;
        $dataSites["update_user"] = $this->session->userdata("user_id");

        $site_id = $this->generalTables_model->updateTable("websitesbanner", $site_id, $dataSites);

    }


    public function RecordShowed($siteid)
    {

        $dateTime = date('Y-m-d H:i:s');

        $userWallet = $this->sites_model->getBannersInfoBySiteID($siteid);

        $user_id = $userWallet[0]["user_id"];

        $userDetail = $this->sites_model->getMyBannerByUserIDAllWithVisits($user_id);


        $dataSites = array();
        $dataSites["user_id"] = $userWallet[0]["user_id"];
        $dataSites["website_id"] = $userDetail[0]["websites_id"];
        $dataSites["ip"] = $_SERVER["REMOTE_ADDR"];
        $dataSites["surf_date"] = $dateTime;
        $dataSites["record_status"] = "1";
        $dataSites["insert_date"] = $dateTime;
        $dataSites["insert_user"] = $user_id;
        $dataSites["update_date"] = $dateTime;
        $dataSites["update_user"] = $user_id;

        $wallet_id = $this->generalTables_model->insertTables("static_banner_info", $dataSites);

    }


    public function Go($user)
    {
        $data = array();
        $data["userid"] = $user;

        header("Location:https://bilgiotu.com");
    }
}
