<?php
/**
 * Created by PhpStorm.
 * User: Lahiru Rangana
 * Date: 8/8/2015
 * Time: 4:57 PM
 */
class Viewcard extends CI_controller
{

    public function update($code)	{
        $this->load->helper('url');
        $this->load->model('viewupdate','',TRUE);

        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['type'] = $session_data['type'];
            if($data['type']=='P'){$this->viewupdate->presenter($code);}
            elseif($data['type']=='M'){$this->viewupdate->mcr($code);}

        }

        if(strlen($code)==3 && substr($code, -1)=='Z'){

            redirect('district_controller/index/'.$code, 'refresh');
        }
        else{

            redirect('votes_controller/index/'.$code, 'refresh');
        }



    }



}

?>