<?php
/**
 * Created by PhpStorm.
 * User: Lahiru Rangana
 * Date: 8/8/2015
 * Time: 4:57 PM
 */
class Result extends CI_controller
{

    public function get_votes()	{
        $this->load->helper('url');
        $this->load->model('resultmodel','',TRUE);
        $result = $this->resultmodel->get_votes();

        $string1="<table class='table table-striped'>
                <thead>
                <tr >
                    <th width='5%'>Code</th>
                    <th width='50%'>Name</th>


                    <th width='10%'></th>
                    <th width='10%'></th>

                </tr>
                </thead>
                <tbody>";

        $string2="";

        if($result)
        {
            //$sess_array = array();
            //<td><strong>".$row->district."</strong></td>
            foreach($result as $row)
            {
                $string2="<tr>
                    <td><strong>".$row->code."</strong></td>
                    <td><strong>".$row->description."</strong></td>
                    <td><button type='button' class='btn1 btn btn-default' value='".$row->code."'>Add</a></button></td>
                    <td><button type='button' class='btn btn-default'><a href='http://localhost/arttvelection2015/election/votes_controller/index/".$row->code."'  target='_blank'>View</a></button></td>
                </tr>".$string2;

            }

        }

        $string=$string1.$string2."</tbody>
            </table>";

        $script1="<script type='text/javascript' src='".base_url('js/plugins/jquery/jquery.min.js')."'></script>
                 <script type='text/javascript' src='".base_url('js/plugins/jquery/jquery-ui.min.js')."''></script>";

        $script2="<script type='text/javascript'>


        // Ajax post
        $(document).ready(function() {
            $('.btn1').click(function () {

            event.preventDefault();
            var user_n = $(this).val();
            var password = 'Lahiru';
            jQuery.ajax({
                type: 'POST',
                url: '".base_url('/result/add_to_view')."',
                dataType: 'json',
            data: {name: user_n, pwd: password},
            success: function(res) {


            if (res)
            {
            alert('Added To Presenter and MCR'+res.pwd);
            }
            }
            });

            });
            });

            </script>";
        $string=$string.$script1.$script2;



        $data = array(
            'username' => $string,
            'pwd'=>$this->input->post('pwd')
        );
        echo json_encode($data);
    }

    public function get_district()	{
        $this->load->helper('url');
        $this->load->model('resultmodel','',TRUE);
        $result = $this->resultmodel->get_district();

        $string="<table class='table table-striped'>
                <thead>
                <tr >
                    <th width='10%'>Code</th>
                    <th width='60%'>Name</th>
                    <th width='10%'></th>
                    <th width='10%'></th>

                </tr>
                </thead>
                <tbody>";


        if($result)
        {
            //$sess_array = array();
            foreach($result as $row)
            {
                $string=$string."<tr>
                    <td><strong>".$row->code."</strong></td>
                    <td><strong>".$row->description."</strong></td>
                    <td><button type='button' class='btn2 btn btn-default' value='".$row->code."'>Add</a></button></td>
                    <td><button type='button' class='btn btn-default'><a href='http://localhost/arttvelection2015/election/district_controller/index/".$row->code."'  target='_blank'>View</a></button></td>
                </tr>";

            }

        }


        $string=$string."</tbody>
            </table>";

        $script1="<script type='text/javascript' src='".base_url('js/plugins/jquery/jquery.min.js')."'></script>
                 <script type='text/javascript' src='".base_url('js/plugins/jquery/jquery-ui.min.js')."''></script>";

        $script2="<script type='text/javascript'>


        // Ajax post
        $(document).ready(function() {
            $('.btn2').click(function () {

            event.preventDefault();
            var user_n = $(this).val();
            var password = 'Lahiru';
            jQuery.ajax({
                type: 'POST',
                url: '".base_url('/result/add_to_view')."',
                dataType: 'json',
            data: {name: user_n, pwd: password},
            success: function(res) {


            if (res)
            {
            alert('Your Added To Presenter and MCR');
            }
            }
            });

            });
            });

            </script>";
        $string=$string.$script1.$script2;



        $data = array(
            'username' => $string,
            'pwd'=>$this->input->post('pwd')
        );
        echo json_encode($data);
    }


    public function get_all_island()	{
        $this->load->helper('url');
        $this->load->model('resultmodel','',TRUE);
        $result = $this->resultmodel->get_all_island();

        $string="<table class='table table-striped'>
                <tbody>";



        if($result)
        {
            //$sess_array = array();
            foreach($result as $row)
            {
                $string=$string."<tr>
                    <td><strong>".$row->time_stamps."</strong></td>
                    <td><strong>All Island Summary</strong></td>
                    <td><button type='button' class='btn3 btn btn-default' value='AIVOT'>Add</a></button></td>
                    <td><button type='button' class='btn btn-default'><a href='http://localhost/arttvelection2015/election/allisland_controller/index/'  target='_blank'>View</a></button></td>
                </tr>";

            }

        }


        $string=$string."</tbody>
            </table>";

        $script1="<script type='text/javascript' src='".base_url('js/plugins/jquery/jquery.min.js')."'></script>
                 <script type='text/javascript' src='".base_url('js/plugins/jquery/jquery-ui.min.js')."''></script>";

        $script2="<script type='text/javascript'>


        // Ajax post
        $(document).ready(function() {
            $('.btn3').click(function () {

            event.preventDefault();
            var user_n = $(this).val();
            var password = 'Lahiru';
            jQuery.ajax({
                type: 'POST',
                url: '".base_url('/result/add_to_view')."',
                dataType: 'json',
            data: {name: user_n, pwd: password},
            success: function(res) {


            if (res)
            {
            alert('Your Added To Presenter and MCR');
            }
            }
            });

            });
            });

            </script>";

        $string=$string.$script1.$script2;



        $data = array(
            'username' => $string,
            'pwd'=>$this->input->post('pwd')
        );
        echo json_encode($data);
    }

    public function national_seats()	{
        $this->load->helper('url');
        $this->load->model('resultmodel','',TRUE);
        $result = $this->resultmodel->get_national_seats();

        $string="<table class='table table-striped'>
                <tbody>";



        if($result)
        {
            //$sess_array = array();
            foreach($result as $row)
            {
                $string=$string."<tr>
                    <td><strong>".$row->time_stamps."</strong></td>
                    <td><strong>National Basis Seats</strong></td>
                    <td><button type='button' class='btn4 btn btn-default' value='AINAST'>Add</a></button></td>
                    <td><button type='button' class='btn btn-default'><a href='http://localhost/arttvelection2015/election/nationalseats_controller/index/'  target='_blank'>View</a></button></td>
                </tr>";

            }

        }


        $string=$string."</tbody>
            </table>";

        $script1="<script type='text/javascript' src='".base_url('js/plugins/jquery/jquery.min.js')."'></script>
                 <script type='text/javascript' src='".base_url('js/plugins/jquery/jquery-ui.min.js')."''></script>";

        $script2="<script type='text/javascript'>


        // Ajax post
        $(document).ready(function() {
            $('.btn4').click(function () {

            event.preventDefault();
            var user_n = $(this).val();
            var password = 'Lahiru';
            jQuery.ajax({
                type: 'POST',
                url: '".base_url('/result/add_to_view')."',
                dataType: 'json',
            data: {name: user_n, pwd: password},
            success: function(res) {


            if (res)
            {
            alert('Your Added To Presenter and MCR');
            }
            }
            });

            });
            });

            </script>";

        $string=$string.$script1.$script2;



        $data = array(
            'username' => $string,
            'pwd'=>$this->input->post('pwd')
        );
        echo json_encode($data);
    }

    public function composition()	{
        $this->load->helper('url');
        $this->load->model('resultmodel','',TRUE);
        $result = $this->resultmodel->get_composition();

        $string="<table class='table table-striped'>
                <tbody>";



        if($result)
        {
            //$sess_array = array();
            foreach($result as $row)
            {
                $string=$string."<tr>
                    <td><strong>".$row->time_stamps."</strong></td>
                    <td><strong>National Basis Seats</strong></td>
                    <td><button type='button' class='btn5 btn btn-default' value='AICOMP'>Add</a></button></td>
                    <td><button type='button' class='btn btn-default'><a href='http://localhost/arttvelection2015/election/composition_controller/index/'  target='_blank'>View</a></button></td>
                </tr>";

            }

        }


        $string=$string."</tbody>
            </table>";

        $script1="<script type='text/javascript' src='".base_url('js/plugins/jquery/jquery.min.js')."'></script>
                 <script type='text/javascript' src='".base_url('js/plugins/jquery/jquery-ui.min.js')."''></script>";

        $script2="<script type='text/javascript'>


        // Ajax post
        $(document).ready(function() {
            $('.btn5').click(function () {

            event.preventDefault();
            var user_n = $(this).val();
            var password = 'Lahiru';
            jQuery.ajax({
                type: 'POST',
                url: '".base_url('/result/add_to_view')."',
                dataType: 'json',
            data: {name: user_n, pwd: password},
            success: function(res) {


            if (res)
            {
            alert('Your Added To Presenter and MCR');
            }
            }
            });

            });
            });

            </script>";

        $string=$string.$script1.$script2;



        $data = array(
            'username' => $string,
            'pwd'=>$this->input->post('pwd')
        );
        echo json_encode($data);
    }


    public function add_to_view()	{
        $this->load->helper('url');
        $this->load->model('resultmodel','',TRUE);
        $result = $this->resultmodel->add_to_view($this->input->post('name'));
        //$done=$this->resultmodel->update_done($this->input->post('name'));

        //$string="Insert";
        $data = array(
            'username' => $result,
            'pwd'=>$this->input->post('name')
        );
        echo json_encode($data);
    }


    public function get_presenter_view()	{
        $this->load->helper('url');
        $this->load->model('resultmodel','',TRUE);
        $result = $this->resultmodel->get_presenter_view();

        $string1="<table class='table table-striped'>
                <thead>
                <tr >
                    <th width='5%'>Code</th>
                    <th width='50%'>Name</th>
                    <th width='10%'></th>


                </tr>
                </thead>
                <tbody>";

        $string2="";

        if($result)
        {
            //$sess_array = array();
            //<td><strong>".$row->district."</strong></td>
            foreach($result as $row)
            {
                $string2="<tr>
                    <td><strong>".$row->code."</strong></td>
                    <td><strong>".$row->description."</strong></td>
                    <td><button type='button' class='btn btn-default' value='".$row->code."'><a href='".base_url('viewcard/update')."/".$row->code."'  target='_blank'>View</a></button></td>
                </tr>".$string2;

            }

        }

        $string=$string1.$string2."</tbody>
            </table>";

        $data = array(
            'username' => $string,
            'pwd'=>$this->input->post('pwd')
        );
        echo json_encode($data);
    }

    public function get_presenter_queue()	{
        $this->load->helper('url');
        $this->load->model('resultmodel','',TRUE);
        $result = $this->resultmodel->get_presenter_queue();

        $string1="<table class='table table-striped'>
                <thead>
                <tr >
                    <th width='5%'>Code</th>
                    <th width='50%'>Name</th>
                    <th width='10%'></th>


                </tr>
                </thead>
                <tbody>";

        $string2="";

        if($result)
        {
            //$sess_array = array();
            //<td><strong>".$row->district."</strong></td>
            foreach($result as $row)
            {
                $string2="<tr>
                    <td><strong>".$row->code."</strong></td>
                    <td><strong>".$row->description."</strong></td>
                    <td><button type='button' class='btn btn-default' value='".$row->code."'><a href='".base_url('viewcard/update')."/".$row->code."'  target='_blank'>View</a></button></td>
                </tr>".$string2;

            }

        }

        $string=$string1.$string2."</tbody>
            </table>";

        $data = array(
            'username' => $string,
            'pwd'=>count($result)
        );
        echo json_encode($data);
    }

    public function get_mcr_view()	{
        $this->load->helper('url');
        $this->load->model('resultmodel','',TRUE);
        $result = $this->resultmodel->get_mcr_view();

        $string1="<table class='table table-striped'>
                <thead>
                <tr >
                    <th width='5%'>Code</th>
                    <th width='50%'>Name</th>
                    <th width='10%'></th>


                </tr>
                </thead>
                <tbody>";

        $string2="";

        if($result)
        {
            //$sess_array = array();
            //<td><strong>".$row->district."</strong></td>
            foreach($result as $row)
            {
                $string2="<tr>
                    <td><strong>".$row->code."</strong></td>
                    <td><strong>".$row->description."</strong></td>
                    <td><button type='button' class='btn btn-default' value='".$row->code."'><a href='".base_url('viewcard/update')."/".$row->code."'  target='_blank'>View</a></button></td>
                </tr>".$string2;

            }

        }

        $string=$string1.$string2."</tbody>
            </table>";

        $data = array(
            'username' => $string,
            'pwd'=>$this->input->post('pwd')
        );
        echo json_encode($data);
    }

    public function get_mcr_queue()	{
        $this->load->helper('url');
        $this->load->model('resultmodel','',TRUE);
        $result = $this->resultmodel->get_mcr_queue();

        $string1="<table class='table table-striped'>
                <thead>
                <tr >
                    <th width='5%'>Code</th>
                    <th width='50%'>Name</th>
                    <th width='10%'></th>


                </tr>
                </thead>
                <tbody>";

        $string2="";

        if($result)
        {
            //$sess_array = array();
            //<td><strong>".$row->district."</strong></td>
            foreach($result as $row)
            {
                $string2="<tr>
                    <td><strong>".$row->code."</strong></td>
                    <td><strong>".$row->description."</strong></td>
                    <td><button type='button' class='btn btn-default' value='".$row->code."'><a href='".base_url('viewcard/update')."/".$row->code."'  target='_blank'>View</a></button></td>
                </tr>".$string2;

            }

        }

        $string=$string1.$string2."</tbody>
            </table>";

        $data = array(
            'username' => $string,
            'pwd'=>count($result)
        );
        echo json_encode($data);
    }

}

?>