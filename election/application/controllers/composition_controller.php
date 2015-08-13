<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class composition_controller extends CI_Controller {
    
       // Show view Page
        public function index(){
			
            $this->load->view("composition_view");
        }
	
      
	
	
	
	
	public function composition() {
		
		$this->load->database();
		$query = $this->db->query("SELECT * FROM composition ORDER BY time_stamps DESC LIMIT 1");
		
		
		foreach ($query->result_array() as $row)
		{
			$result=$row;
		}
		

	$SEAT="ALL ISLAND";
	$done=$result['done'];
	unset($result['time_stamps']);
	unset($result['done']);
	$district;
	$nationals;
	$total;
	$count=0;
	
	foreach($result as $key=>$a)
	{
		if($count%3==0)
		{$district[$key]=$a;}
		if($count%3==1)
		{$nationals[$key]=$a;}
		if($count%3==2)
		{$total[$key]=$a;}
		
		$count++;
	}
	
	asort($district);
	asort($nationals);
	asort($total);
	$district=array_reverse($district);
	$nationals=array_reverse($nationals);
	$total=array_reverse($total);
	
	$party_names=[];
	$party_district=[];
	$party_national=[];
	$party_total=[];
	$count=0;
	//print_r($district);
	foreach ($district as $b=>$c)
	{	if($count==4){break;}
		array_push($party_names,$b);
		array_push($party_district,$c);
		$count++;
		
	}
	$count=0;
	//print_r($district);
	foreach ($nationals as $b=>$c)
	{	if($count==4){break;}
		array_push($party_national,$c);
		
		$count++;
		
	}
	foreach ($total as $b=>$c)
	{	if($count==4){break;}
		array_push($party_total,$c);
		
		$count++;
		
	}
	

	$data = array(
                    'Party1_Name' => substr($party_names[0], 0, -9),
					'Party2_Name' => substr($party_names[1], 0, -9),
					'Party3_Name' => substr($party_names[2], 0, -9),
					'Party4_Name' => substr($party_names[3], 0, -9),
					'Party1_district' => $party_district[0],
					'Party2_district' => $party_district[1],
					'Party3_district' => $party_district[2],
					'Party4_district' => $party_district[3],
					'Party1_national' => $party_national[0],
					'Party2_national' => $party_national[1],
					'Party3_national' => $party_national[2],
					'Party4_national' => $party_national[3],
					'Party4_total' => $party_district[3],
					'Party1_total' => $party_national[0],
					'Party2_total' => $party_national[1],
					'Party3_total' => $party_national[2],
					'Party4_total' => $party_national[3],
					'District'=>"ALL ISLAND",
					'Polling'=>"COMPOSITION OF THE PARLIMENT");
					
	
                  
                        
	        echo json_encode($data);
	
	
	
	}
}
