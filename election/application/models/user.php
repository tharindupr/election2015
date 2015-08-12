<?php
Class User extends CI_Model
{
	function login($username, $password)
	{
		$this -> db -> select('userId, username, password,userType');
		$this -> db -> from('users');
		$this -> db -> where('username = ' . "'" . $username . "'"); 
		$this -> db -> where('password = ' . "'" . MD5($password) . "'"); 
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

	function get_users()
	{

		$this -> db -> select('userId, username, password,userType');
		$this -> db -> from('users');


		$query = $this -> db -> get();
		return $query->result();
	}
}
?>