<?php
/**
 * Created by PhpStorm.
 * User: Lahiru Rangana
 * Date: 8/9/2015
 * Time: 1:00 AM
 */
Class User extends CI_Model
{
    function login($username, $password)
    {
        $this -> db -> select('userId, username, password');
        $this -> db -> from('users');
        $this -> db -> where('username', $username);
        $this -> db -> where('password', md5($password));
        $this -> db -> limit(1);

        $query = $this -> db -> get();

        if($query -> num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
}
?>