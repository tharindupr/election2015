<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class summary_controller extends CI_Controller {
    
  
        public function index(){
	
            $this->load->view("summary_view");
        }
	
public function getsummary() {
	
$this->load->database();
$query = $this->db->query("SELECT Sum(AITC_votes),Sum(AITC_percentage),Sum(AITM_votes),Sum(AITM_percentage),Sum(ONF_votes),Sum(ONF_percentage) ,
Sum(ACMC_votes) ,Sum(ACMC_percentage),Sum(ITAK_votes),Sum(ITAK_percentage),Sum(EDF_votes) , Sum(EDF_percentage),Sum(EPDP_votes) ,Sum(EPDP_percentage),
Sum(UPFA_votes) ,Sum(UPFA_percentage),Sum(UNP_votes) ,Sum(UNP_percentage),Sum(DUA_votes) ,Sum(DUA_percentage),Sum(UPP_votes) ,Sum(UPP_percentage),Sum(ELPP_votes) ,
Sum(ELPP_percentage),Sum(USP_votes),Sum(USP_percentage),Sum(UPF_votes),Sum(UPF_percentage),Sum(OWORS_votes),Sum(OWORS_percentage),Sum(JVP_votes) ,Sum(JVP_percentage),Sum(JSEP_votes) ,Sum(JSEP_percentage)    ,
Sum(TULF_votes) ,Sum(TULF_percentage)    ,Sum(NSSP_votes) ,Sum(NSSP_percentage),Sum(NSU_votes) ,Sum(NSU_percentage)    ,Sum(PP_votes) ,Sum(PP_percentage)    ,
Sum(FSP_votes) ,Sum(FSP_percentage)    ,Sum(DNM_votes) ,Sum(DNM_percentage)    ,Sum(DP_votes) ,Sum(DP_percentage)    ,
Sum(BJP_votes) ,Sum(BJP_percentage)    ,Sum(MJP_votes) ,Sum(MJP_percentage)    ,Sum(MNA_votes) ,Sum(MNA_percentage)    ,Sum(CWC_votes) ,Sum(CWC_percentage)    ,
Sum(LP_votes) ,Sum(LP_percentage)    ,Sum(SLLP_votes) ,
Sum(SLLP_percentage)    ,Sum(SLNF_votes) ,Sum(SLNF_percentage)    ,Sum(SLVP_votes) ,Sum(SLVP_percentage)    ,Sum(SLMP_votes) ,Sum(SLMP_percentage)   ,Sum(SLMC_votes) ,
Sum(SLMC_percentage)    ,Sum(SEP_votes) ,Sum(SEP_percentage)    ,Sum(IND01_votes) ,
Sum(IND01_percentage)    ,Sum(IND02_votes) ,Sum(IND02_percentage)    ,Sum(IND03_votes) ,Sum(IND03_percentage)    ,Sum(IND04_votes) ,
Sum(IND04_percentage)    ,Sum(IND05_votes) ,Sum(IND05_percentage)    ,Sum(IND06_votes) ,Sum(IND06_percentage)    ,Sum(IND07_votes) ,Sum(IND07_percentage)    ,Sum(IND08_votes) ,Sum(IND08_percentage)    ,Sum(IND09_votes) ,Sum(IND09_percentage)    ,Sum(IND10_votes) ,
Sum(IND10_percentage)    ,Sum(IND11_votes) ,Sum(IND11_percentage)    ,Sum(IND12_votes) ,Sum(IND12_percentage)    ,Sum(IND13_votes) ,Sum(IND13_percentage)    ,Sum(IND14_votes) ,Sum(IND14_percentage)    ,Sum(IND15_votes) ,
Sum(IND15_percentage)    ,Sum(IND16_votes) ,Sum(IND16_percentage)    ,Sum(IND17_votes) ,Sum(IND17_percentage)    ,Sum(IND18_votes) ,Sum(IND18_percentage)    ,Sum(IND19_votes) ,
Sum(IND19_percentage)    ,Sum(IND20_votes) ,Sum(IND20_percentage)    ,Sum(IND21_votes) ,Sum(IND21_percentage)    ,Sum(IND22_votes) ,Sum(IND22_percentage)    ,Sum(IND23_votes) ,Sum(IND23_percentage)    ,Sum(IND24_votes) ,
Sum(IND24_percentage)    ,Sum(IND25_votes) ,Sum(IND25_percentage)    ,Sum(IND26_votes) ,Sum(IND26_percentage)    ,Sum(IND27_votes) ,
Sum(IND27_percentage)    ,Sum(IND28_votes) ,Sum(IND28_percentage)    ,Sum(IND29_votes) ,Sum(IND29_percentage)    ,Sum(IND30_votes) ,Sum(IND30_percentage),
SUM(VALID_votes),SUM(REJECTED_votes),SUM(POLLED_votes),SUM(ELECTORS) FROM votes");

//creating the sql statement to insert into summary

$sql="INSERT into summary values(0,";
$count=1;
$count=$this->db->query("select count(*) as c from votes")->result_array()[0]['c'];

foreach ($query->result_array()[0] as $key=>$val){
if(substr($key, -11, -1)=="percentage")
{
$sql=$sql.($val/$count).","; 
}
else
$sql=$sql.$val.","; 
}

$sql=rtrim($sql, ",").")";


$this->db->query($sql);

   
   
	
	$this->load->database();
	$query = $this->db->query("SELECT * FROM summary ORDER BY id DESC LIMIT 1");
	foreach ($query->result_array() as $row)
	{
		$result=$row;
	}
		

		$SEAT="Summary";
		$VALID_votes=$result['VALID'];
		$REJECTED_votes=$result['REJECTED']; 
		$POLLED_votes=$result['POLLED'];
		$ELECTORS=$result['ELECTORS'] ;
		
		
		unset($result['VALID']);
		unset($result['REJECTED']);
		unset($result['POLLED']);
		unset($result['ELECTORS']);
		unset($result['id']);
		$votes;
		$percentages;
		$count=0;
		
		//getting top 4 votes
		foreach($result as $key=>$a)
		{
			if($count%2==0)
			{$votes[$key]=$a;}
			else
			{$percentages[$key]=$a;}
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
						'Party1_color' => ($this->db->query("SELECT color FROM colors where party='".substr($party_names[0], 0, -6)."'")->result_array()[0]['color']),
						'Party2_color' =>($this->db->query("SELECT color FROM colors where party='".substr($party_names[1], 0, -6)."'")->result_array()[0]['color']),
						'Party3_color' => ($this->db->query("SELECT color FROM colors where party='".substr($party_names[2], 0, -6)."'")->result_array()[0]['color']),
						'Party4_color' => ($this->db->query("SELECT color FROM colors where party='".substr($party_names[3], 0, -6)."'")->result_array()[0]['color']),
						'VALID_votes'=>$VALID_votes,
						'REJECTED_votes'=>$REJECTED_votes,
						'POLLED_votes'=>$POLLED_votes,
						'ELECTORS'=>$ELECTORS,
						'District'=>"ALL ISLAND",
						'Polling'=>"SUMMARY RESULT");
						
		
					  
						
				echo json_encode($data);



}	
	
	

}
