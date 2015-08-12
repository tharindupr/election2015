<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class district_controller extends CI_Controller {
    
       // Show view Page
        public function index($d){
			$data=array('page'=>$d);
            $this->load->view("district_view",$data);
        }
	
      
	
	
	
	
	public function districtvotes($seat) {
		
		$this->load->database();
		$query = $this->db->query("SELECT * FROM district_votes where district='".$seat."'");
		$query1=$this->db->query("SELECT description,district FROM result_description where code='".$seat."'");
		
		foreach ($query->result_array() as $row)
		{
			$result=$row;
		}
		

	$SEAT=$result['district'];
	$VALID_votes=$result['VALID_votes'];
	$VALID_percentage=$result['VALID_percentage'];
	$REJECTED_votes=$result['REJECTED_votes']; 
	$REJECTED_percentage=$result['REJECTED_percentage'];
	$POLLED_votes=$result['POLLED_votes'];
	$POLLED_percentage=$result['POLLED_percentage'];
	$ELECTORS=$result['ELECTORS'] ;
	$done=$result['done'];
	unset($result['district']);
	unset($result['VALID_votes']);
	unset($result['VALID_percentage']);
	unset($result['REJECTED_votes']);
	unset($result['REJECTED_percentage']);
	unset($result['POLLED_votes']);
	unset($result['POLLED_percentage']);
	unset($result['ELECTORS']);
	unset($result['done']);
	$votes;
	$percentages;
	$seats;
	$count=0;
	
	foreach($result as $key=>$a)
	{
		if($count%3==0)
		{$votes[$key]=$a;}
		if($count%3==1)
		{$percentages[$key]=$a;}
		else
		{$seats[$key]=$a;}
		$count++;
	}
	
	asort($votes);
	asort($percentages);
	$votes=array_reverse($votes);
	$percentages=array_reverse($percentages);
	$party_names=[];
	$party_votes=[];
	$party_percentage=[];
	$count=0;
	//print_r($votes);
	foreach ($votes as $b=>$c)
	{	if($count==4){break;}
		array_push($party_names,$b);
		array_push($party_votes,$c);
		$count++;
		
	}
	$count=0;
	//print_r($votes);
	foreach ($percentages as $b=>$c)
	{	if($count==4){break;}
		array_push($party_percentage,$c);
		
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
					'Party1_percentage' => $party_percentage[0],
					'Party2_percentage' => $party_percentage[1],
					'Party3_percentage' => $party_percentage[2],
					'Party4_percentage' => $party_percentage[3],
					'VALID_votes'=>$VALID_votes,
					'VALID_percentage'=>$VALID_percentage,
					'REJECTED_votes'=>$REJECTED_votes,
					'REJECTED_percentage'=>$REJECTED_percentage,
					'POLLED_votes'=>$POLLED_votes,
					'POLLED_percentage'=>$POLLED_percentage,
					'ELECTORS'=>$ELECTORS,
					'District'=>strtoupper($query1->row()->district)." DISTRICT",
					'Polling'=>$query1->row()->description);
					
	
                  
                        
	        echo json_encode($data);
	
	
	
	}
}
