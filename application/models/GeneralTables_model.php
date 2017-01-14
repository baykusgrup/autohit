<?php
class generalTables_model extends CI_Model {


    public function insertTables($tablename,$Data)
    {
        try {

            $this->db->insert($tablename,$Data);
            return $this->db->insert_id();

        }catch (Exception $e) {
            //alert the user.
            var_dump($e->getMessage());
            return 0;
        }

    }

    //  user table is updated if the user is firm user, dont forget firm id
    // if its not, firm_id will be 0
    public function updateTable($tablename,$id,$data)
    {
        $table_id=$this->logProcess_model->getTableId($tablename);
        $deger=true;
        try {

            $this->db->where($table_id, $id);
            $this->db->update($tablename, $data);

        }catch (Exception $e) {
            //alert the user.
            var_dump($e->getMessage());
            $deger=false;
        }

        return $deger;
    }

    public function deleteTable($tablename,$id)
    {
        $table_id=$this->logProcess_model->getTableId($tablename);
        $deger=true;
        try {

            $this->db->where($table_id, $id);
            $this->db->delete($tablename);

        }catch (Exception $e) {
            //alert the user.
            var_dump($e->getMessage());
            $deger=false;
        }

        return $deger;
    }

}
