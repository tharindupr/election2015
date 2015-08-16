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
                    <td><button type='button' class='btn1 btn btn-default' value='".$row->code."'>Add</button></td>
                    <td><button type='button' class='btn btn-default' value='".$row->code."' onclick='view_card(\"$row->code\")'><a href='".base_url('votes_controller/index/')."".$row->code."'  target='_blank'>View</a></button></td>
                </tr>".$string2;

            }

        }

        $string=$string1.$string2."</tbody>
            </table>";

        $doneresult = $this->resultmodel->get_votes_done();

        $done1="<table class='table table-striped'>
                <thead>
                <tr >
                    <th width='5%'>DONE</th>
                    <th width='50%'>ADDED RESULTS TO MCR AND PRESENTER</th>


                    <th width='10%'></th>
                    <th width='10%'></th>

                </tr>
                </thead>
                <tbody>";

        $done2="";

        if($doneresult)
        {
            //$sess_array = array();
            //<td><strong>".$row->district."</strong></td>
            foreach($doneresult as $row)
            {
                $done2="<tr>
                    <td><strong>".$row->code."</strong></td>
                    <td><strong>".$row->description."</strong></td>
                    <td><button type='button' class='btn1 btn btn-default' value='".$row->code."'>Add</button></td>
                    <td><button type='button' class='btn btn-default' value='".$row->code."' onclick='view_card(\"$row->code\")'><a href='".base_url('votes_controller/index/')."".$row->code."'  target='_blank'>View</a></button></td>
                </tr>".$done2;

            }

        }

        $string=$string.$done1.$done2."</tbody>
            </table>";



        $script1="<script type='text/javascript' src='".base_url('js/plugins/jquery/jquery.min.js')."'></script>
                 <script type='text/javascript' src='".base_url('js/plugins/jquery/jquery-ui.min.js')."''></script>";

        $script2="<script type='text/javascript'>


        // Ajax post
        $(document).ready(function() {
            $('.btn1').click(function () {

            event.preventDefault();
            var user_n = $(this).val();
            var type = 'votes';
            jQuery.ajax({
                type: 'POST',
                url: '".base_url('/result/add_to_view')."',
                dataType: 'json',
            data: {name: user_n, type: type},
            success: function(res) {


            if (res)
            {
            alert('Added To Presenter and MCR');
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
                    <td><button type='button' class='btn btn-default' value='".$row->code."' onclick='view_card(\"$row->code\")'><a href='".base_url('district_controller/index/')."".$row->code."'  target='_blank'>View</a></button></td>
                </tr>";

            }

        }


        $string=$string."</tbody>
            </table>";


        $doneresult = $this->resultmodel->get_district_done();

        $done1="<table class='table table-striped'>
                <thead>
                <tr >
                    <th width='5%'>DONE</th>
                    <th width='50%'>ADDED RESULTS TO MCR AND PRESENTER</th>


                    <th width='10%'></th>
                    <th width='10%'></th>

                </tr>
                </thead>
                <tbody>";

        $done2="";

        if($doneresult)
        {
            //$sess_array = array();
            //<td><strong>".$row->district."</strong></td>
            foreach($doneresult as $row)
            {
                $done2="<tr>
                    <td><strong>".$row->code."</strong></td>
                    <td><strong>".$row->description."</strong></td>
                    <td><button type='button' class='btn1 btn btn-default' value='".$row->code."'>Add</button></td>
                    <td><button type='button' class='btn btn-default' value='".$row->code."' onclick='view_card(\"$row->code\")'><a href='".base_url('votes_controller/index/')."".$row->code."'  target='_blank'>View</a></button></td>
                </tr>".$done2;

            }

        }

        $string=$string.$done1.$done2."</tbody>
            </table>";

        $script1="<script type='text/javascript' src='".base_url('js/plugins/jquery/jquery.min.js')."'></script>
                 <script type='text/javascript' src='".base_url('js/plugins/jquery/jquery-ui.min.js')."''></script>";

        $script2="<script type='text/javascript'>


        // Ajax post
        $(document).ready(function() {
            $('.btn2').click(function () {

            event.preventDefault();
            var user_n = $(this).val();
            var type = 'district_votes';
            jQuery.ajax({
                type: 'POST',
                url: '".base_url('/result/add_to_view')."',
                dataType: 'json',
            data: {name: user_n, type: type},
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
                    <td><button type='button' class='btn3 btn btn-default' value='".$row->time_stamps."'>Add</a></button></td>
                    <td><button type='button' class='btn btn-default'><a href='".base_url('allisland_controller/index/')."'  target='_blank'>View</a></button></td>
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
            var type = 'all_island';
            jQuery.ajax({
                type: 'POST',
                url: '".base_url('/result/add_to_view')."',
                dataType: 'json',
            data: {name: user_n, type: type},
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
                    <td><button type='button' class='btn4 btn btn-default' value='".$row->time_stamps."'>Add</a></button></td>
                    <td><button type='button' class='btn btn-default'><a href='".base_url('nationalseats_controller/index/')."'  target='_blank'>View</a></button></td>
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
            var type = 'national_basis_seats';
            jQuery.ajax({
                type: 'POST',
                url: '".base_url('/result/add_to_view')."',
                dataType: 'json',
            data: {name: user_n, type: type},
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
                    <td><button type='button' class='btn5 btn btn-default' value='".$row->time_stamps."'>Add</a></button></td>
                    <td><button type='button' class='btn btn-default'><a href='".base_url('composition_controller/index/')."'  target='_blank'>View</a></button></td>
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
            var type = 'composition';
            jQuery.ajax({
                type: 'POST',
                url: '".base_url('/result/add_to_view')."',
                dataType: 'json',
            data: {name: user_n, type: type},
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

        $type=$this->input->post("type");
        $result="1000";

        if($type=="votes"){

            $result = $this->resultmodel->add_to_view($this->input->post('name'));
            $this->resultmodel->update_done_votes($this->input->post('name'));
        }

        elseif($type=="district_votes"){

            $result = $this->resultmodel->add_to_view($this->input->post('name'));
            $this->resultmodel->update_done_district($this->input->post('name'));
        }

        elseif($type=="all_island"){

            $result = $this->resultmodel->add_to_view("AIVOT");
            $this->resultmodel->update_done_allisland($this->input->post('name'));
        }

        elseif($type=="national_basis_seats"){

            $result = $this->resultmodel->add_to_view("AINAST");
            $this->resultmodel->update_done_seats($this->input->post('name'));
        }

        elseif($type=="composition"){

            $result = $this->resultmodel->add_to_view("AICOMP");
            $this->resultmodel->update_done_composition($this->input->post('name'));
        }

        elseif($type=="summary"){

            $result = $this->resultmodel->add_to_view("SUM");
            //$this->resultmodel->update_done_summary($this->input->post('name'));
        }


        //$string="Insert";
        $data = array(
            'username' => $result,
            'pwd'=>$this->input->post('type')
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
            //
            //<td><button type='button' onclick='location.href='".base_url('viewcard/update')."/".$row->code." class='btn btn-default' value='".$row->code."'>View</button></td>
            foreach($result as $row)
            {
                $string2="<tr>
                    <td><strong>".$row->code."</strong></td>
                    <td><a href='".base_url('viewcard/update')."/".$row->code."'  target='_blank'><strong>".$row->description."</strong></a></td>
                    <td><button type='button' class='btn btn-default' value='".$row->code."' onclick='view_card(\"$row->code\")'><a href='".base_url('viewcard/update')."/".$row->code."'  target='_blank'>View</a></button></td>

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
            //<td><button type='button' class='btn btn-default' value='".$row->code."'><a href='".base_url('viewcard/update')."/".$row->code."'  target='_blank'>View</a></button></td>
            //"<button onclick='view_card(\".$row->code.\")'>Click me</button>"
            foreach($result as $row)
            {
                $string2="<tr>
                    <td><strong>".$row->code."</strong></td>
                    <td><a href='".base_url('viewcard/update')."/".$row->code."'  target='_blank'><strong>".$row->description."</strong></a></td>
                    <td><button type='button' class='btn btn-default' value='".$row->code."' onclick='view_card(\"$row->code\")'><a href='".base_url('viewcard/update')."/".$row->code."'  target='_blank'>View</a></button></td>


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
                    <td><button type='button' class='btn btn-default' value='".$row->code."' onclick='view_card(\"$row->code\")'><a href='".base_url('viewcard/update')."/".$row->code."'  target='_blank'>View</a></button></td>
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
                    <td><button type='button' class='btn btn-default' value='".$row->code."' onclick='view_card(\"$row->code\")'><a href='".base_url('viewcard/update')."/".$row->code."'  target='_blank'>View</a></button></td>
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


    public function admin_queue()	{
        $this->load->helper('url');
        $this->load->model('resultmodel','',TRUE);
        $votes = $this->resultmodel->get_votes_queue();
        $district = $this->resultmodel->get_district_queue();
        $summary = $this->resultmodel->get_summary_queue();
        $seats = $this->resultmodel->get_seats_queue();
        $composition = $this->resultmodel->get_composition_queue();


        $data = array(

            'votes'=>count($votes),
            'district'=>count($district),
            'summary'=>count($summary),
            'seats'=>count($seats),
            'composition'=>count($composition)
        );
        echo json_encode($data);
    }

}

?>