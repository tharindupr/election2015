<?php
Class ResultModel extends CI_Model
{


    function get_votes()
    {

        $this -> db -> select('votes.seat, votes.done, result_description.code , result_description.description, result_description.district');
        $this -> db -> from('votes, result_description');
        $this -> db -> where('votes.seat = result_description.code');
        $this -> db -> where('votes.done = 0');


        $query = $this -> db -> get();

        if($query -> num_rows() > 0) {
            return $query->result();

        }


    }
    function get_votes_done()
    {

        $this -> db -> select('votes.seat, votes.done, result_description.code , result_description.description, result_description.district');
        $this -> db -> from('votes, result_description');
        $this -> db -> where('votes.seat = result_description.code');
        $this -> db -> where('votes.done = 1');


        $query = $this -> db -> get();

        if($query -> num_rows() > 0) {
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

        $this -> db -> select('district_votes.district, district_votes.done, result_description.code , result_description.description, result_description.district');
        $this -> db -> from('district_votes, result_description');
        $this -> db -> where('district_votes.district = result_description.code');
        $this -> db -> where('district_votes.done = 0');


        $query = $this -> db -> get();

        if($query -> num_rows() > 0) {
            return $query->result();

        }



    }

    function get_district_done()
    {

        $this -> db -> select('district_votes.district, district_votes.done, result_description.code , result_description.description, result_description.district');
        $this -> db -> from('district_votes, result_description');
        $this -> db -> where('district_votes.district = result_description.code');
        $this -> db -> where('district_votes.done = 1');


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
            else {

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

    function get_votes_queue()
    {
        $this -> db -> select('seat, done');
        $this -> db -> from('votes');
        $this -> db -> where('done = 0');


        $query = $this -> db -> get();

        return $query->result();
    }

    function get_district_queue()
    {
        $this -> db -> select('district, done');
        $this -> db -> from('district_votes');
        $this -> db -> where('done = 0');


        $query = $this -> db -> get();

        return $query->result();
    }

    function get_summary_queue()
    {
        $this -> db -> select('time_stamps, done');
        $this -> db -> from('all_island');
        $this -> db -> where('done = 0');


        $query = $this -> db -> get();

        return $query->result();
    }

    function get_seats_queue()
    {
        $this -> db -> select('time_stamps, done');
        $this -> db -> from('national_basis_seats');
        $this -> db -> where('done = 0');


        $query = $this -> db -> get();

        return $query->result();
    }

    function get_composition_queue()
    {
        $this -> db -> select('time_stamps, done');
        $this -> db -> from('composition');
        $this -> db -> where('done = 0');


        $query = $this -> db -> get();

        return $query->result();
    }

    function update_done_votes($code)
    {

        $data = array(
            'done' => 1
        );

        $this->db->where('seat', $code);
        $this->db->update('votes', $data);

            /*

            $this -> db -> select('district, done');
            $this -> db -> from('district_votes');

            $query = $this -> db -> get();

            return $query->num_rows();

            */


    }

    function update_done_district($code)
    {

        $data = array(
            'done' => 1
        );

        $this->db->where('district', $code);
        $this->db->update('district_votes', $data);




    }

    function update_done_allisland($code)
    {

        $data = array(
            'done' => 1
        );

        $this->db->where('time_stamps', $code);
        $this->db->update('all_island', $data);




    }

    function update_done_seats($code)
    {

        $data = array(
            'done' => 1
        );

        $this->db->where('time_stamps', $code);
        $this->db->update('national_basis_seats', $data);




    }

    function update_done_composition($code)
    {

        $data = array(
            'done' => 1
        );

        $this->db->where('time_stamps', $code);
        $this->db->update('composition', $data);




    }

    function get_summary(){

        $query="SELECT * FROM summary ORDER BY id DESC LIMIT 1";

        $q = $this ->db->query($query);
        return $q->result();
    }
}
?>