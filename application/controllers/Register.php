<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function index()
    {
        $this->load->helper(['language', 'lang', 'url']);
        dilSecici();

        $this->load->view('_head');
        $this->load->view('register');
        $this->load->view('_foot');
    }

    public function insertMember(){

        $dateTime = date('Y-m-d H:i:s');

        $dataUser=array();
        $dataUser["email"]= $this->input->post("e_mail");
        $dataUser["password"] = $this->input->post("password");
        $dataUser["password_md5"] = md5($this->input->post("password"));

        $dataUser["record_status"] = 1;
        $dataUser["insert_date"] = $dateTime;
        $dataUser["insert_user"] =0;
        $dataUser["update_date"] = $dateTime;
        $dataUser["update_user"]= 0;

        $user_id = $this->generalTables_model->insertTables("users",$dataUser);

        if ($user_id!=0){
            $dataDetail=array();
            $dataDetail["user_id"]= $user_id;
            $dataDetail["e_mail"] =$this->input->post("e_mail");
            $dataDetail["registered_date"] = $dateTime;
            $dataDetail["view_rate"] = 0.8;
            $dataDetail["referance_code"] = uniqid();
            $dataDetail["referance_code_to"] = 0;


            $dataDetail["record_status"] = 1;
            $dataDetail["insert_date"] = $dateTime;
            $dataDetail["insert_user"] =0;
            $dataDetail["update_date"] = $dateTime;
            $dataDetail["update_user"]= 0;

            $userDetail_id = $this->generalTables_model->insertTables("users_detail",$dataDetail);

        }

        if ($user_id!=0){
            $dataWallet=array();
            $dataWallet["user_id"]= $user_id;
            $dataWallet["total_credits"] =0;
            $dataWallet["earn_credits"] = 0;
            $dataWallet["wasted_credits"] = 0;


            $dataWallet["record_status"] = 1;
            $dataWallet["insert_date"] = $dateTime;
            $dataWallet["insert_user"] =0;
            $dataWallet["update_date"] = $dateTime;
            $dataWallet["update_user"]= 0;

            $wallet_id = $this->generalTables_model->insertTables("user_wallet",$dataWallet);

        }


        return $user_id;

    }


    public function changeUserPass(){

        $old_pass = $this->input->post("oldPass");
        $new_pass = $this->input->post("newPass");
        $user_id = $this->session->userdata("user_id");
        $dateTime = date('Y-m-d H:i:s');

        $deger = $this->user->checkPassword($user_id,$old_pass);

        if($deger==true){

            $data=array();
            $data["password"]=$new_pass;
            $data["password_md5"]=md5($new_pass);

            $data["up_date"]=$dateTime;
            $data["up_user_id"]= $user_id;
            $this->generalTables_model->updateTable("user_data",$user_id,$data);
            return true;

        }else{
            return false;
        }





    }
}
