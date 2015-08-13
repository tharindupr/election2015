<?php
Class ResultModel extends CI_Model
{


    function get_votes()
    {


        /*
        $query = "
            SELECT 'votes'.'seat', 'result_description'.'code','result_description'.'description'
            FROM 'votes' Inner join 'result_description'
            WHERE 'votes'.'seat' = 'result_description'.'code'";

        $q = $this ->db->query($query);
        return $q->result();


        */

        $this -> db -> select('votes.seat, result_description.code , result_description.description, result_description.district');
        $this -> db -> from('votes, result_description');
        $this -> db -> where('votes.seat = result_description.code');


        $query = $this -> db -> get();

        if($query -> num_rows() > 1) {
            return $query->result();

        }


    }

    function get_district()
    {



        /*
         *
         $query = "SELECT district_votes.district FROM district_votes";
        */

        //$q = $this ->db->query($query);
        //return $q->result();




        /*
        $this -> db -> select('district');
        $this -> db -> from('district_votes');
        //$this -> db -> where('votes.seat = result_description.code');


        $query = $this -> db -> get();

        if($query -> num_rows() > 0) {
            return $query->result();

        }
        */

        $this -> db -> select('district_votes.district, result_description.code , result_description.description, result_description.district');
        $this -> db -> from('district_votes, result_description');
        $this -> db -> where('district_votes.district = result_description.code');


        $query = $this -> db -> get();

        if($query -> num_rows() > 0) {
            return $query->result();

        }



    }

    function get_all_island()
    {
        $this -> db -> select('time_stamps');
        $this -> db -> from('all_island');

        $query = $this -> db -> get();

        if($query -> num_rows() > 0) {
            return $query->result();

        }
    }

    function get_composition()
    {
        $this -> db -> select('time_stamps');
        $this -> db -> from('composition');
        //$this -> db -> where('district_votes.district = result_description.code');

        $query = $this -> db -> get();

        if($query -> num_rows() > 0) {
            return $query->result();

        }
    }

    function get_national_seats()
    {
        $this -> db -> select('time_stamps');
        $this -> db -> from('national_basis_seats');
        //$this -> db -> where('district_votes.district = result_description.code');

        $query = $this -> db -> get();

        if($query -> num_rows() > 0) {
            return $query->result();

        }
    }

    function add_to_view($code)
    {
        $query = "insert into view (code) values ('".$code."')";
        if($this ->db->query($query)){

            return "True";
        }
        else{

            return "false";

        }



    }

    function get_presenter_view()
    {
        $this -> db -> select('view.presenter, view.code, result_description.code , result_description.description, result_description.district');
        $this -> db -> from('view, result_description');
        $this -> db -> where('view.code = result_description.code');
        $this -> db -> where('view.presenter = 1');


        $query = $this -> db -> get();

        if($query -> num_rows() > 0) {
            return $query->result();

        }


    }

    function get_presenter_queue()
    {
        $this -> db -> select('view.presenter, view.code, result_description.code , result_description.description, result_description.district');
        $this -> db -> from('view, result_description');
        $this -> db -> where('view.code = result_description.code');
        $this -> db -> where('view.presenter = 0');


        $query = $this -> db -> get();

        if($query -> num_rows() > 0) {
            return $query->result();

        }


    }

    function get_mcr_view()
    {
        $this -> db -> select('view.mcr, view.code, result_description.code , result_description.description, result_description.district');
        $this -> db -> from('view, result_description');
        $this -> db -> where('view.code = result_description.code');
        $this -> db -> where('view.mcr = 1');


        $query = $this -> db -> get();

        if($query -> num_rows() > 0) {
            return $query->result();

        }


    }

    function get_mcr_queue()
    {
        $this -> db -> select('view.mcr, view.code, result_description.code , result_description.description, result_description.district');
        $this -> db -> from('view, result_description');
        $this -> db -> where('view.code = result_description.code');
        $this -> db -> where('view.mcr = 0');


        $query = $this -> db -> get();

        if($query -> num_rows() > 0) {
            return $query->result();

        }


    }


}
?>