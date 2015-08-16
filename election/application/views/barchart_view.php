<html>
<head>
    <!-- jQuery 2.0.2 -->


    <script src="<?php echo base_url(); ?>js/jquery-1.11.3.min.js"></script>
    <script>
    jQuery.ajax({
    type: "POST",
    url: "<?php echo base_url(); ?>" + "index.php/summary_controller/getsummary/",
    dataType: 'json',
    //data: {name: user_name, pwd: password},
    success: function(res) {
    if (res)
    {
    // Show Entered Value


        jQuery("div#party1").html(res.Party1_Name);
        jQuery("div#party2").html(res.Party2_Name);
        jQuery("div#party3").html(res.Party3_Name);
        jQuery("div#party4").html(res.Party4_Name);
        $("#p1").css( "width",(342*Number(res.Party1_percentage)/100).toString()+"px");
        $("#p2").css( "width",(342*Number(res.Party2_percentage)/100).toString()+"px");
        $("#p3").css( "width",(342*Number(res.Party3_percentage)/100).toString()+"px");
        $("#p1").css( "background-color",res.Party1_color);
        $("#p2").css( "background-color",res.Party2_color);
        $("#p3").css( "background-color",res.Party3_color);
        jQuery("div#percentage1").html(res.Party1_percentage+" %");
        jQuery("div#percentage2").html(res.Party2_percentage+" %");
        jQuery("div#percentage3").html(res.Party3_percentage+" %");



        /* jQuery("div#party1votes").html(res.Party1_votes);
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
         $("#progress4").css( "background-color",res.Party4_color);*/

    }
    }
    });



    </script>



<head>


<body>

<style>

.chart div {

    position: relative;

    top:0px;
    font: 10px sans-serif;

    text-align: right;
    padding: 3px;
    margin: 1px;
    color: white;
    height:10px;

}

}
</style>



<!-- <table bgcolor="black" style="color:white;"> -->
<table>
    <tr>
        <td>
            <div class="party">
                <div id="party1"></div>
            </div>
        </td>
        <td><div  class="chart"><div id="p1" style="width: 40px;"></div></div></td>
        <td><div id="percentage1"></div></td>

    </tr>

    <tr>
        <td>
            <div class="party">
                <div id="party2"></div>
            </div>
        </td>
        <td><div class="chart"><div id="p2" style="width: 40px;"></div></div></td>
        <td><div id="percentage2"></div></td>
    </tr>
    <tr>
        <td>
            <div class="party">
                <div id="party3"></div>
            </div>
        </td>
        <td><div class="chart"><div id="p3" style="width: 40px;"></div></div></td>
        <td><div id="percentage3"></div></td>
    </tr>
</table>




</body>

</html>