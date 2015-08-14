<html>
<head>
 <!-- jQuery 2.0.2 -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <script src="<?php echo base_url(); ?>js/video.js"></script>
 
 <link href="<?php echo base_url(); ?>css/video.css" rel="stylesheet" type="text/css" />
 
 <link href="<?php echo base_url(); ?>css/card.css" rel="stylesheet" type="text/css" />
  
  
<script type="text/javascript">
		
			
		 // Ajax post
            $(document).ready(function() {
                
                    event.preventDefault();
                    var user_name = "Hello";
                    var password = "Tharindu";
                    jQuery.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + "index.php/composition_controller/composition",
                        dataType: 'json',
                        data: {name: user_name, pwd: password},
                        success: function(res) {
                            if (res)
                            {
                                // Show Entered Value
                               
                                jQuery("div#party1").html(res.Party1_Name);
                                jQuery("div#party2").html(res.Party2_Name);
								jQuery("div#party3").html(res.Party3_Name);
                                jQuery("div#party4").html(res.Party4_Name);
								jQuery("div#party1votes").html(res.Party1_district);
								jQuery("div#party2votes").html(res.Party2_district);
								jQuery("div#party3votes").html(res.Party3_district);
								jQuery("div#party4votes").html(res.Party4_district);
								jQuery("div#party1percentage").html(res.Party1_national);
								jQuery("div#party2percentage").html(res.Party2_national);
								jQuery("div#party3percentage").html(res.Party3_national);
								jQuery("div#party4percentage").html(res.Party4_national);
								jQuery("div#party1seats").html(res.Party1_total);
								jQuery("div#party2seats").html(res.Party2_total);
								jQuery("div#party3seats").html(res.Party3_total);
								jQuery("div#party4seats").html(res.Party4_total);
								jQuery("div#district").html(res.District);
								jQuery("div#districtdescription").html(res.Polling);
								
								
							
							
							
								
								$('#logo1').css("background-image", "url(<?php echo base_url(); ?>logo/"+res.Party1_Name+".PNG");  
								$('#logo2').css("background-image", "url(<?php echo base_url(); ?>logo/"+res.Party2_Name+".PNG");  
								$('#logo3').css("background-image", "url(<?php echo base_url(); ?>logo/"+res.Party3_Name+".PNG");  
								$('#logo4').css("background-image", "url(<?php echo base_url(); ?>logo/"+res.Party4_Name+".PNG");  
                            }
                        }
                    });
               
            });
		
</script>


</head>



<body> 
 <video autoplay id="bgvid" loop>
<source src="<?php echo base_url(); ?>video.mp4" type="video/mp4">
</video>
<div id="innerbox" >
<div id="value"> </div>


<div id="logo1" style="background-image: url('<?php echo base_url();?>logo/logo1.PNG')"; >   </div>
<div id="logo2" style="background-image: url('<?php echo base_url();?>logo/logo1.PNG')"; >   </div>
<div id="logo3" style="background-image: url('<?php echo base_url();?>logo/logo1.PNG')"; >   </div>
<div id="logo4" style="background-image: url('<?php echo base_url();?>logo/logo1.PNG')"; >   </div>


<div id="district">COLOMB DISTRICT </div> 
<div id="districtdescription">COLOMBO WEST </div>

<div id="party1">UPFA </div>
<div id="party1votes">500 000 </div>
<div id="party1percentage">20.0% </div>
<div id="party1seats" >0 </div>

<div id="party2">JVP</div>
<div id="party2votes">50 000 </div>
<div id="party2percentage">20.0% </div>
<div id="party2seats" >0 </div>

<div id="party3">UNP</div>
<div id="party3votes">5 000 </div>
<div id="party3percentage">20.0% </div>
<div id="party3seats" >0 </div>

<div id="party4">JVP</div>
<div id="party4votes"> 500 </div>
<div id="party4percentage">20.0% </div>
<div id="party4seats" >0 </div>

<div id="valid">VALID</div> 
<div id="valid_votes">VALID</div> 
<div id="valid_percentage">VALID</div> 
<div id="rejected">REJECTED</div> 
<div id="rejected_votes">REJECTED</div> 
<div id="rejected_percentage">REJECTED</div> 
<div id="polled">POLLED</div> 
<div id="polled_votes">POLLED</div> 
<div id="polled_percentage">POLLED</div> 
<div id="electors">ELECTORS</div> 
<div id="electors_votes">ELECTORS</div> 



</div>






</body>
</html>