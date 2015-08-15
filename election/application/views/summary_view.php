<html>
<head>
 <!-- jQuery 2.0.2 -->

<script src="<?php echo base_url(); ?>js/jquery-1.11.3.min.js"></script>
  <script src="<?php echo base_url(); ?>js/video.js"></script>
 
 <link href="<?php echo base_url(); ?>css/video.css" rel="stylesheet" type="text/css" />
 <link href="<?php echo base_url(); ?>css/card.css" rel="stylesheet" type="text/css" />
  
  
<script type="text/javascript">
		
			console.log("DONE");
		 // Ajax post
            $(document).ready(function() {
                
                    event.preventDefault();
                    var user_name = "Hello";
                    var password = "Tharindu";
                    jQuery.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + "index.php/summary_controller/getsummary",
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
								jQuery("div#party1votes").html(res.Party1_votes);
								jQuery("div#party2votes").html(res.Party2_votes);
								jQuery("div#party3votes").html(res.Party3_votes);
								jQuery("div#party4votes").html(res.Party4_votes);
								jQuery("div#party1percentage").html(res.Party1_percentage+" %");
								jQuery("div#party2percentage").html(res.Party2_percentage+" %");
								jQuery("div#party3percentage").html(res.Party3_percentage+" %");
								jQuery("div#party4percentage").html(res.Party4_percentage+" %");
								jQuery("div#district").html(res.District);
								jQuery("div#districtdescription").html(res.Polling);
								jQuery("div#valid_votes").html(res.VALID_votes);
							
								jQuery("div#rejected_votes").html(res.REJECTED_votes);
						
								jQuery("div#polled_votes").html(res.POLLED_votes);
						
								jQuery("div#electors_votes").html(res.ELECTORS);
								
								$("#progress1").css( "width",(342*Number(res.Party1_percentage)/100).toString()+"px");
								$("#progress2").css( "width",(342*Number(res.Party2_percentage)/100).toString()+"px");
								$("#progress3").css( "width",(342*Number(res.Party3_percentage)/100).toString()+"px");
								$("#progress4").css( "width",(342*Number(res.Party4_percentage)/100).toString()+"px");
								
								$("#progress1").css( "background-color",res.Party1_color);
								$("#progress2").css( "background-color",res.Party2_color);
								$("#progress3").css( "background-color",res.Party3_color);
								$("#progress4").css( "background-color",res.Party4_color);
								
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
<div id="progress1" style="width:200px; background-color: red">
</div>
<div id="progress2">
</div>
<div id="progress3">
</div>
<div id="progress4">
</div>

<div id="logo1" style="background-image: url('<?php echo base_url();?>logo/logo1.PNG')"; >   </div>
<div id="logo2" style="background-image: url('<?php echo base_url();?>logo/logo1.PNG')"; >   </div>
<div id="logo3" style="background-image: url('<?php echo base_url();?>logo/logo1.PNG')"; >   </div>
<div id="logo4" style="background-image: url('<?php echo base_url();?>logo/logo1.PNG')"; >   </div>


<div id="district">COLOMB DISTRICT </div> 
<div id="districtdescription">COLOMBO WEST </div>
<div id="party1">UPFA </div>
<div id="party1votes">500 000 </div>
<div id="party1percentage">20.0% </div>
<div id="party2">JVP</div>
<div id="party2votes">50 000 </div>
<div id="party2percentage">20.0% </div>
<div id="party3">UNP</div>
<div id="party3votes">5 000 </div>
<div id="party3percentage">20.0% </div>
<div id="party4">JVP</div>
<div id="party4votes"> 500 </div>
<div id="party4percentage">20.0% </div>

<div id="valid">VALID</div> 
<div id="valid_votes">VALID</div> 

<div id="rejected">REJECTED</div> 
<div id="rejected_votes">REJECTED</div> 

<div id="polled">POLLED</div> 
<div id="polled_votes">POLLED</div> 

<div id="electors">ELECTORS</div> 
<div id="electors_votes">ELECTORS</div> 



</div>






</body>
</html>