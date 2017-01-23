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
                                                                              // krediden visit cost cikariliyor

        $visitCost_subTotal = $return[0]["credits"] - $return[0]["visit_cost"];

        $dataSites=array();
        $dataSites["credits"] =$visitCost_subTotal;

        $dataSites["update_date"] = $dateTime;
        $dataSites["update_user"]= $this->session->userdata("user_id");

        $site_id = $this->generalTables_model->updateTable("websites",$site_id,$dataSites);



                                                                                // krediden visit cost cikariliyor son
                                                    //cost hesaplamaları
        $earn_total= $return[0]["visit_cost"] * 0.8;
        $commision = $return[0]["visit_cost"] * 0.1;
                                                    //cost hesaplamaları

                                                                        //Kullanan kullanıcının referansı var mı

        $referanceUserID = $this->sites_model->getReferanceUserIDByUserID($user_id);
        if ($referanceUserID != null){
                                                                        //Kullanan kullanıcının referansı var mı son

            //Varsa referansına 0.1 pay ver
            $ref_wallet_id = $referanceUserID[0]["refWalletID"];
            $ref_user_id= $referanceUserID[0]["ref"];
            $refWallet=$this->sites_model->getWalletByUserID($ref_user_id);
            $dataCommision=array();
            $dataCommision["total_credits"] = $refWallet[0]["total_credits"] + $commision;
            $dataCommision["earn_credits"]  = $refWallet[0]["earn_credits"] + $commision;

            $dataCommision["update_date"] = $dateTime;
            $dataCommision["update_user"]= $this->session->userdata("user_id");

            $refwallet_id = $this->generalTables_model->updateTable("user_wallet",$ref_wallet_id,$dataCommision);
            //Varsa referansına 0.1 pay ver son

        }

        // Kazanılan kredinin kullanıcıya aktarılması

        $dataWallet=array();
        $dataWallet["total_credits"] = $userWallet[0]["total_credits"] + $earn_total;
        $dataWallet["earn_credits"]  = $userWallet[0]["earn_credits"] + $earn_total;

        $dataWallet["update_date"] = $dateTime;
        $dataWallet["update_user"]= $this->session->userdata("user_id");

        $wallet_id = $this->generalTables_model->updateTable("user_wallet",$wallet_id,$dataWallet);
        // Kazanılan kredinin kullanıcıya aktarılması son



    }
    public function SiteVisitInfoCalculate($site_id)
    {
            $user_id= $this->session->userdata("user_id");


            $dateTime = date('Y-m-d H:i:s');

            $dataVisit=array();
            $dataVisit["user_id"] =$user_id;
            $dataVisit["ip"] = $_SERVER["REMOTE_ADDR"];
            $dataVisit["website_id"] = $site_id;
            $dataVisit["surf_date"] = $dateTime;

            $dataVisit["record_status"] = 1;
            $dataVisit["update_date"] = $dateTime;
            $dataVisit["update_user"]= $user_id;
            $dataVisit["insert_date"] = $dateTime;
            $dataVisit["insert_user"]= $user_id;

            $visit_id = $this->generalTables_model->insertTables("static_sitesurf_info",$dataVisit);
            return $visit_id;
    }

    public function AutoDistributionCalculate($userID)
    {
        $user_id= $this->session->userdata("user_id");

        $return=$this->sites_model->getMySitesByUserID($userID);
        $userWallet=$this->sites_model->getWalletByUserID($user_id);

        $wallet_id = $userWallet[0]["user_wallet_id"];

        $dateTime = date('Y-m-d H:i:s');

        if($userWallet[0]["total_credits"]>count($return)){

            $perCost = $userWallet[0]["total_credits"]/count($return);
            $sub_credit =$userWallet[0]["total_credits"];
            foreach ($return as $site){

                $dataAuto=array();
                $dataAuto["credits"] = $site["credits"] + $perCost;

                $dataAuto["update_user"] =$user_id;
                $dataAuto["update_date"] =$dateTime;
                $update_id = $this->generalTables_model->updateTable("websites",$site["websites_id"],$dataAuto);

                $dataWallet=array();
                $dataWallet["total_credits"] = $userWallet[0]["total_credits"] - $sub_credit;
                $dataWallet["wasted_credits"]  = $userWallet[0]["wasted_credits"] + $sub_credit;

                $dataWallet["update_date"] = $dateTime;
                $dataWallet["update_user"]= $this->session->userdata("user_id");

                $wallet_id = $this->generalTables_model->updateTable("user_wallet",$wallet_id,$dataWallet);
            }

        }


    }

    public function Surf($siteID,$autoID)
    {
        $userID =$this->session->userdata("user_id");

        $return=$this->sites_model->getSitesInfoBySiteID($siteID);

        if($autoID ==1){
            if($return[0]["credits"]<$return[0]["visit_cost"]){
                echo "1";
            }
            else{
                $this->AutoDistributionCalculate($userID);
                $this->SiteVisitInfoCalculate($siteID);
                $this->SurfingCostCalculation($siteID);

                echo "2";
            }
        } else{
            if($return[0]["credits"]<$return[0]["visit_cost"]){
                echo "1";
            }
            else{
                $this->SiteVisitInfoCalculate($siteID);
                $this->SurfingCostCalculation($siteID);
                echo "2";
            }
        }




    }
}
