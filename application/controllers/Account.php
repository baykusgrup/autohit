<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

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
            $data["todayCount"]= $this->statics_model->getViewedTodayCount();

            $this->load->view('_head');
            $this->load->view('account', $data);
            $this->load->view('_foot');
        }
    }

    public function changePassword(){
        $pass = $this->input->post("pass");
        $user_id = $this->session->userdata("user_id");

        $dateTime = date('Y-m-d H:i:s');

        $dataPassword=array();
        $dataPassword["password"] =$pass;
        $dataPassword["password_md5"] =md5($pass);

        $dataPassword["update_user"]=$user_id;
        $dataPassword["update_date"]=$dateTime;

        $updateRowID= $this->generalTables_model->updateTable("users",$user_id,$dataPassword);

        return $updateRowID;
    }

    public function changeEmail(){
        $email = $this->input->post("email");
        $user_id = $this->session->userdata("user_id");

        $dateTime = date('Y-m-d H:i:s');

        $dataEmail=array();
        $dataEmail["email"] =$email;

        $dataEmail["update_user"]=$user_id;
        $dataEmail["update_date"]=$dateTime;

        $updateRowID= $this->generalTables_model->updateTable("users",$user_id,$dataEmail);

        return $updateRowID;
    }

}
