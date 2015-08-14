<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class nationalseats_controller extends CI_Controller {
    
       // Show view Page
        public function index(){
			
            $this->load->view("nationalseats_view");
        }
	
      
	
	
	
	
	public function nationalseats() {
		
		$this->load->database();
		$query = $this->db->query("SELECT * FROM national_basis_seats ORDER BY time_stamps DESC LIMIT 1");
		
		foreach ($query->result_array() as $row)
		{
			$result=$row;
		}
		

	$SEAT="ALL ISLAND";
	
	$done=$result['done'];
	unset($result['time_stamps']);
	unset($result['done']);
	$votes;
	
	$seats;
	$count=0;
	
	foreach($result as $key=>$a)
	{
		if($count%2==0)
		{$votes[$key]=$a;}
		if($count%2==1)
		{$seats[$key]=$a;}
	
		
		$count++;
	}
	
	
	asort($votes);
	
	asort($seats);
	$votes=array_reverse($votes);
	
	$seats=array_reverse($seats);
	$party_names=[];
	$party_votes=[];
	
	$party_seats=[];
	$count=0;
	//print_r($votes);
	foreach ($votes as $b=>$c)
	{	if($count==4){break;}
		array_push($party_names,$b);
		array_push($party_votes,$c);
		$count++;
		
	}
	$count=0;

	$count=0;
	//print_r($votes);
	
	foreach ($seats as $b=>$c)
	{	if($count==4){break;}
		array_push($party_seats,$c);
		
		$count++;
		
	}


	$data = array(
                    'Party1_Name' => substr($party_names[0], 0, -6),
					'Party2_Name' => substr($party_names[1], 0, -6),
					'Party3_Name' => substr($party_names[2], 0, -6),
					'Party4_Name' => substr($party_names[3], 0, -6),
					'Party1_votes' => $party_votes[0],
					'Party2_votes' => $party_votes[1],
					'Party3_votes' => $party_votes[2],
					'Party4_votes' => $party_votes[3],
					'Party1_seats' => substr($party_seats[0], 0, -3),
					'Party2_seats' => substr($party_seats[1], 0, -3),
					'Party3_seats' => substr($party_seats[2], 0, -3),
					'Party4_seats' => substr($party_seats[3], 0, -3),
					'District'=>"ALL ISLAND",
					'Polling'=>"NATIONAL BASIS SEATS");
					
	
                  
                        
	        echo json_encode($data);
	
	
	
	}
}
