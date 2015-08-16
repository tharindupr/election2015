<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class barchart_controller extends CI_Controller
{

    // Show view Page
    public function index()
    {

        $this->load->view("barchart_view");
    }

}