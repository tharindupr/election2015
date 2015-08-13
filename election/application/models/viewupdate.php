<?php
Class Viewupdate extends CI_Model
{
    function presenter($code)
    {

        $data = array(
            'presenter' => 1
        );

        $this->db->where('code', $code);
        $this->db->update('view', $data);


    }

    function mcr($code)
    {

        $data = array(
            'mcr' => 1
        );

        $this->db->where('code', $code);
        $this->db->update('view', $data);


    }


}
?>