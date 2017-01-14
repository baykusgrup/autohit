<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('user', '', TRUE);
        $this->load->model('email', '', TRUE);
    }


    function index()
    {
        //This method will have the credentials validation
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page

            //$data['view']='login_view';
            //$this->load->view('login_view',$data['view']);

            redirect('index.php/login');
        } else {
            redirect('index.php/Account');
        }

    }

    function check_database($password)
    {
        //Field validation succeeded.  Validate against database
        $email = $this->input->post('email');
        $password_md5 = md5($password);
        //query the database
        $result = $this->user->login($email, $password_md5);

        if($result!=NULL)
        {
            foreach($result as $rows)
            {
                $user_id=$rows["user_id"];
            }
            //$user_id=$result[0]["id"];
            $result_all = $this->user->getAllUserInfobyUserId($user_id);

            $sess_array = array();
            foreach($result_all as $row)
            {

                $sess_array = array(
                    'user_id' => $row["user_id"],
                    'email' =>    $row["email"],

                );
                $this->session->set_userdata($sess_array);

                //$my_session_id = $_GET['session_id']; //gets the session ID successfully
                //$this->session->userdata('session_id', $my_session_id);
                $this->user->saveLoginConnection();
            }
            return true;
        }
        else
        {
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
        }
    }

    public function sessionDestroy()
    {
        $this->User->saveLogoutConnection();
        $this->session->sess_destroy();
        redirect("index.php/Login");
    }


    public
    function getNewPassword()
    {

        $user_email = trim($this->input->post("email"));
        $users_email = array();
        $extension = explode("@", $user_email)[1];
        $host = "";
        $smtp_secure = "";
        $port = 0;
        $language = "tr";
        $host_email = "sacar@pickyfy.wien";
        $host_pwd = "SB13pickyfy93";
        $alias = "pickyfy";
        $header = "PickyFy Password";
        $content = "<strong>" . $user_email . "</strong>";
        $host = "srvm03.turhost.com";
        $smtp_secure = "ssl";
        $port = 465;
        /*if($extension=="gmail.com"){
           $host="smtp.gmail.com";
           $smtp_secure="ssl";
           $port=465;
        }else if ($extension=="pickyfy.wien"){
           $host="srvm03.turhost.com";
           $smtp_secure="ssl";
           $port=465;
        }else if($extension=="outlook.com" || $extension=="hotmail.com"){
           $host="smtp.live.com";
           $smtp_secure="tls";
           $port=587;
        }else if($extension=="yandex.com"){
             $host="smtp.yandex.com";
           $smtp_secure="tls";
           $port=587;
        }
        */
        $key = md5($user_email);
        $link = "<p>http://127.0.0.1/picfy/index.php/VerifyLogin/PasswordForget?confirm_key=" . $key . "</p>";
        $content = $link;
        array_push($users_email, $user_email);
        $result = $this->email->passwordChange($users_email, $host, $language, $alias, $header, $content, $host_email, $host_pwd, $smtp_secure, $port);
        //$result=true;
        $mesaj = "error";

        if ($result == true) {
            $mesaj = "true";
            $dateTime = date('Y-m-d H:i:s');
            $current_time = $dateTime;
            $expired_time = date('d/m/Y', strtotime("+2 days"));
            $data = array('e_mail' => $user_email,
                'key_forget' => $key,
                'used' => 1,
                'insert_dt' => $current_time,
                'update_dt' => $current_time
            );
            $this->db->set('usable_dt', 'NOW() + INTERVAL 2 DAY', FALSE);
            $this->db->insert("forget_password", $data);
        }
        echo json_encode($mesaj);

    }

    public
    function ChangePassword()
    {

        $password = $this->input->post("password");
        $encrypted_code = $this->input->post("confirm_key");
        $encrypted_code = trim($encrypted_code);

        $sorgu = $this->forgetpassword_model->forgetPasswordGetUserId($encrypted_code);
        if ($sorgu) {
            $result = $sorgu->result_array();
            $sorgu = $this->forgetpassword_model->getUserIdforForgetPassword($result[0]['e_mail']);


            if ($sorgu) {
                $result2 = $sorgu->result_array();
                $user_id = $result2[0]["user_id"];

                if (strtotime(date('d/m/Y')) <= strtotime($result[0]["usable_dt"])) {

                    $this->db->where("user_id", $result2[0]["user_id"]);
                    if ($this->db->update("users", array("password" => $password))) {


                        $this->db->where('forget_password_id', $result[0]["forget_password_id"]);
                        if ($this->db->update("forget_password", array("user_id" => $user_id, 'used' => 0)) == true) {

                            echo "oldu";
                        } else {
                            echo "others are not changed at forget password";
                        }
                    } else {
                        echo "password is not changed at user table";
                    }
                } else {
                    echo "zamanı gecmis";
                }
            }
        }


    }

    function PasswordForget()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->view('forgetpassword_view');
    }

}
