<?php

function dilSecici($gelen = "")
{
    $ci = &get_instance();
    if ($gelen == "") {
        if ($ci->input->cookie("dil") == "") {
            $dil = dilSec();
        } else {
            $dil = dilSec($ci->input->cookie("dil"));
        }
    } else {
        $dil = dilSec($gelen);
    }
    $cookie = array(
        'name' => "dil",
        'value' => $dil,
        'expire' => '86500'
    );
    $ci->input->set_cookie($cookie, TRUE);
    if ($dil == 'en') {
        $language = "english";
        if (file_exists(APPPATH . '../application/language/' . $language . '/genel_lang.php')) {
            $ci->lang->load("genel", $language);
        }
    } elseif ($dil == 'ar') {
        $language = "arabic";
        if (file_exists(APPPATH . '../application/language/' . $language . '/genel_lang.php')) {
            $ci->lang->load("genel", $language);
        } else {
            $ci->lang->load("genel", "english");
        }
    } elseif ($dil == 'it') {
        $language = "italian";
        if (file_exists(APPPATH . '../application/language/' . $language . '/genel_lang.php')) {
            $ci->lang->load("genel", $language);
        } else {
            $ci->lang->load("genel", "english");
        }
    } elseif ($dil == 'de') {
        $language = "german";
        if (file_exists(APPPATH . '../application/language/' . $language . '/genel_lang.php')) {
            $ci->lang->load("genel", $language);
        } else {
            $ci->lang->load("genel", "english");
        }
    } elseif ($dil == 'fa') {
        $language = "persian";
        if (file_exists(APPPATH . '../application/language/' . $language . '/genel_lang.php')) {
            $ci->lang->load("genel", $language);
        } else {
            $ci->lang->load("genel", "english");
        }
    } elseif ($dil == 'ru') {
        $language = "russian";
        if (file_exists(APPPATH . '../application/language/' . $language . '/genel_lang.php')) {
            $ci->lang->load("genel", $language);
        } else {
            $ci->lang->load("genel", "english");
        }
    } elseif ($dil == 'tr') {
        $language = "turkish";
        if (file_exists(APPPATH . '../application/language/' . $language . '/genel_lang.php')) {
            $ci->lang->load("genel", $language);
        } else {
            $ci->lang->load("genel", "english");
        }
    } else {
        $ci->lang->load("genel", "english");
    }
}

function dilSec($gelen = "")
{
    $ci = &get_instance();
    $url = $ci->uri->segment(1);
    if ($gelen == "") {
        if (dilDosyaIsmi($url) != "") {
            return $url;
//$ci->session->set_userdata('dil', $url);
        } else {
            return "us";
//$ci->session->set_userdata('dil', "turkish");
        }
    } else {
        if (dilDosyaIsmi($gelen) != "") {
            return $gelen;
//$ci->session->set_userdata('dil', $url);
        } else {
            return "us";
//$ci->session->set_userdata('dil', "turkish");
        }
    }
}

function dilUrl()
{
    $ci = &get_instance();
    $dil = $ci->input->cookie("dil");
//$dil = $ci->session->userdata("dil");
    return $dil . "/";
}

function dilDosyaIsmi($gelen)
{
    if ($gelen == "us") {
        return "english";
    } elseif ($gelen == "ar") {
        return "arabic";
    } elseif ($gelen == "it") {
        return "italian";
    } elseif ($gelen == "de") {
        return "german";
    } elseif ($gelen == "fa") {
        return "persian";
    } elseif ($gelen == "ru") {
        return "russian";
    } elseif ($gelen == "tr") {
        return "turkish";
    } else {
        return "";
    }
}

?>
