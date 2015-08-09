<?php
/**
 * Created by PhpStorm.
 * User: Lahiru Rangana
 * Date: 8/8/2015
 * Time: 4:57 PM
 */
class Elect extends CI_controller
{
    function Index()
    {

        $this->load->view('index');

    }
    function get_admin_home()
    {

        $this->load->helper('url');
        $this->load->view('home_admin');

    }

    function get_presenter_home()
    {

        $this->load->helper('url');
        $this->load->view('home_presenter');

    }

    function get_mcr_home()
    {

        $this->load->helper('url');
        $this->load->view('home_mcr');

    }
}

?>