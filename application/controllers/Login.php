<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if ($this->session->userdata('user_id') == NULL) {

            $this->load->helper(['language', 'lang', 'url']);
            dilSecici();

            $data["todayTop250"] = $this->statics_model->getTop250DailyVisit();
            $data["weeklyTop250"] = $this->statics_model->getTop250WeeklyVisit();
            $data["monthlyTop250"] = $this->statics_model->getTop250MountlyVisit();

            $this->load->helper(array('form', 'url'));
            $this->load->view('_head');
            $this->load->view('login', $data);
            $this->load->view('_foot');

        } else {
            redirect("index.php/Account");
        }
    }

    public function dilDegistir($gelen)
    {
        $this->load->helper(['language', 'lang', 'url']);
        dilSecici($gelen);
        header("Location:" . $_SERVER['HTTP_REFERER'] . "");
    }

}
