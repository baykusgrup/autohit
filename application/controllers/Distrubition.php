<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distrubition extends CI_Controller {

    public function DistrubitionTotalAmountDisCredit($site_id)
    {
        $cost_per=$this->input->post("per_cost");
        $this -> sub_calculateMyTotalCredits($cost_per);
        $return=$this->sites_model->getSitesInfoBySiteID($site_id);

        $dateTime = date('Y-m-d H:i:s');


        $total_credits = $cost_per + $return[0]["credits"];

        $dataSites=array();
        $dataSites["credits"] =$total_credits;

        $dataSites["update_date"] = $dateTime;
        $dataSites["update_user"]= $this->session->userdata("user_id");

        $site_id = $this->generalTables_model->updateTable("websites",$site_id,$dataSites);
        return  $site_id;


    }

    public function getMyCreditsInfo()
    {
       $user_id= $this->session->userdata("user_id");

        $userWallet=$this->sites_model->getWalletByUserID($user_id);

        echo $userWallet[0]["total_credits"];

    }

    public function sub_calculateMyTotalCredits($cost_per)
    {
       $user_id= $this->session->userdata("user_id");

        $dateTime = date('Y-m-d H:i:s');

        $userWallet=$this->sites_model->getWalletByUserID($user_id);
        $user_wallet_id = $userWallet[0]["user_wallet_id"];
        $dataWallet=array();

        $dataWallet["total_credits"] = $userWallet[0]["total_credits"] - $cost_per;
        $dataWallet["wasted_credits"] = $userWallet[0]["wasted_credits"] + $cost_per;

        $dataWallet["update_date"] = $dateTime;
        $dataWallet["update_user"]= $this->session->userdata("user_id");

        $wallet_id = $this->generalTables_model->updateTable("user_wallet",$user_wallet_id,$dataWallet);

        echo $wallet_id;

    }

    public function SurfingCostCalculation($site_id)
    {
        $user_id= $this->session->userdata("user_id");

        $return=$this->sites_model->getSitesInfoBySiteID($site_id);
        $userWallet=$this->sites_model->getWalletByUserID($user_id);

        $wallet_id = $userWallet[0]["user_wallet_id"];

        $dateTime = date('Y-m-d H:i:s');


        $visitCost_subTotal = $return[0]["credits"] - $return[0]["visit_cost"];  // krediden visit cost cikariliyor

        $dataSites=array();
        $dataSites["credits"] =$visitCost_subTotal;

        $dataSites["update_date"] = $dateTime;
        $dataSites["update_user"]= $this->session->userdata("user_id");

        $site_id = $this->generalTables_model->updateTable("websites",$site_id,$dataSites);


        $earn_total= $return[0]["visit_cost"] * 0.8;



        $dataWallet=array();
        $dataWallet["total_credits"] = $userWallet[0]["total_credits"] + $earn_total;

        $dataWallet["update_date"] = $dateTime;
        $dataWallet["update_user"]= $this->session->userdata("user_id");

        $wallet_id = $this->generalTables_model->updateTable("user_wallet",$wallet_id,$dataWallet);
    }


    public function Surf($siteID)
    {

        $return=$this->sites_model->getSitesInfoBySiteID($siteID);

        if($return[0]["credits"]<$return[0]["visit_cost"]){
            echo "1";
        }
        else{
            $this->SurfingCostCalculation($siteID);
            echo "2";
        }


    }
}
