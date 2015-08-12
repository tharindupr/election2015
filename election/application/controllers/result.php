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

        $string="<table class='table table-striped'>
                <thead>
                <tr >
                    <th width='5%'>Code</th>
                    <th width='50%'>Name</th>


                    <th width='10%'></th>
                    <th width='10%'></th>

                </tr>
                </thead>
                <tbody>";

        if($result)
        {
            //$sess_array = array();
            //<td><strong>".$row->district."</strong></td>
            foreach($result as $row)
            {
                $string=$string."<tr>
                    <td><strong>".$row->code."</strong></td>
                    <td><strong>".$row->description."</strong></td>
                    <td><button type='button' class='btn1 btn btn-default' value='01A'>Add</a></button></td>
                    <td><button type='button' class='btn btn-default'><a href='http://localhost/arttvelection2015/election/img/arttv.jpg'  target='_blank'>View</a></button></td>
                </tr>";

            }

        }

        $string=$string."</tbody>
            </table>";


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
                    <th width='10%'>District</th>
                    <th width='60%'>District</th>
                    <th width='10%'>Password</th>

                    <th width='10%'>Button</th>

                </tr>
                </thead>
                <tbody>";


        if($result)
        {
            //$sess_array = array();
            foreach($result as $row)
            {
                $string=$string."<tr>
                    <td><strong>1</strong></td>
                    <td><strong>".$row->district."</strong></td>
                    <td><strong>".$row->district."</strong></td>

                    <td><button type='button' class='btn btn-default'><a href='http://localhost/arttvelection2015/election/img/arttv.jpg'  target='_blank'>Generate</a></button></td>
                </tr>";

            }

        }


        $string=$string."</tbody>
            </table>";


        $data = array(
            'username' => $string,
            'pwd'=>$this->input->post('pwd')
        );
        echo json_encode($data);
    }

    public function add_to_view()	{
        $this->load->helper('url');
        $this->load->model('resultmodel','',TRUE);
        $result = $this->resultmodel->add_to_view();
        $string="Insert";
        $data = array(
            'username' => $result,
            'pwd'=>$this->input->post('pwd')
        );
        echo json_encode($data);
    }




}

?>