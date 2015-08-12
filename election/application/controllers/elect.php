<?php
/**
 * Created by PhpStorm.
 * User: Lahiru Rangana
 * Date: 8/8/2015
 * Time: 4:57 PM
 */
class Elect extends CI_controller
{

    function get_admin_home()
    {

        $this->load->helper('url');
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['id'] = $session_data['id'];
            $data['type'] = $session_data['type'];
            $this->load->view('home_admin', $data);
        }
        //$this->load->view('home_admin');

    }

    function get_presenter_home()
    {

        $this->load->helper('url');
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['id'] = $session_data['id'];
            $data['type'] = $session_data['type'];
            $this->load->view('home_presenter', $data);
        }
        //$this->load->view('');

    }

    function get_mcr_home()
    {

        $this->load->helper('url');
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['id'] = $session_data['id'];
            $data['type'] = $session_data['type'];
            $this->load->view('home_mcr', $data);
        }
        //$this->load->view('home_mcr');

    }







}

?>