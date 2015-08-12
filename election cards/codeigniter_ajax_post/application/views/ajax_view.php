<html>
<head>
 <!-- jQuery 2.0.2 -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 
 <link href="<?php echo base_url(); ?>css/card.css" rel="stylesheet" type="text/css" />
  
  
<script type="text/javascript">
		
			
		 // Ajax post
            $(document).ready(function() {
                
                    event.preventDefault();
                    var user_name = "Hello";
                    var password = "Tharindu";
                    jQuery.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + "index.php/ajax_post_controller/submit",
                        dataType: 'json',
                        data: {name: user_name, pwd: password},
                        success: function(res) {
                            if (res)
                            {
                                // Show Entered Value
                               
                                jQuery("div#value").html(res.username);
                                jQuery("div#value_pwd").html(res.pwd);
                            }
                        }
                    });
               
            });
		
</script>


</head>



<body> 
<div id="innerbox" >

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


<div id="district">COLOMBO DISTRICT </div> 
<div id="polling">COLOMBO WEST </div>
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
</div>


<div id="value"> </div>
<div id="value_pwd"> </div>

</body>
</html>