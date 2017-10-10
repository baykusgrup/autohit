<?php defined('BASEPATH') OR exit('No direct script access allowed');
class logProcess_model extends CI_Model {


    //before changing data ,you can send id and table name, it is recored
    //on the your table's log table

    public function writeLog($tablename,$id){

        $deger=true;
        $tableid=getTableId($tablename);
        try {
            $this->db->select("*");
            $this->db->where($tableid,$id);
            $query=$this->db->get($tablename);
            if($query->num_rows()) {
                $logtable_name=$tablename.'_log';
                print_r($logtable_name);
                $new_record = $query->result_array();

                foreach ($new_record as $row => $record) {
                    $this->db->insert($logtable_name, $record);
                }
            }

        }catch (Exception $e) {
            //alert the user.
            var_dump($e->getMessage());
            $deger=false;
        }

        return $deger;

    }

    public function getTableId($tablename)
    {
        $tableid="-";
        switch ($tablename) {

            case "users";
                $tableid="user_id";
                break;
            case "ip_info";
                $tableid="ipInfo_id";
                break;
            case "websites";
                $tableid="websites_id";
                break;
            case "user_wallet";
                $tableid="user_wallet_id";
                break;
            default:
                echo "Hata";
                break;
        }
        return $tableid;
    }

}
