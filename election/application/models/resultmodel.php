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



        $query = "SELECT district FROM district_votes";

        $q = $this ->db->query($query);
        return $q->result();



        /*

        $this -> db -> select('district');
        $this -> db -> from('district_votes');
        //$this -> db -> where('votes.seat = result_description.code');


        $query = $this -> db -> get();

        if($query -> num_rows() > 0) {
            return $query->result();

        }
        */


    }

    function add_to_view()
    {
        $query = "insert into view (code, description) values ('01A', 'Colombo North')";
        if($this ->db->query($query)){

            return "True";
        }
        else{return "false";

        }



    }


}
?>