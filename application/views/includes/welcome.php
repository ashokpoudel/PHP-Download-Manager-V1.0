<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script>
 //ajax download doesn't work till now 
  /////////////////////////////////////////////////////////////////
 	function getfile(filename){

    $.post("<?php echo base_url(); ?>index.php/dlm/getfile",{filename:filename},function(data){
		 //document.getElementById('test').innerHTML = "";
 	}, "json");
  
  $("#getfile").ajaxStart(function(){
    $("#wait").css("display","block");
	 $("#blackol").css("display","block");
  });
  
  $("#getfile").ajaxComplete(function(){
    $("#wait").css("display","none");
	$("#blackol").css("display","none");
  });
  
  $("#getfile").ajaxError(function(){
    alert("Server Connection error!");
  });
  }
</script>

<?php if($files->result_count()==0){ ?>
    <div class="hero-unit"><h3>Welcome to Download Manager</h3>
    It seems that you have not been activated to any user group till now. Or your group doesnot have any files available.<br /><br />
    Please visit the page few hours later.<br />
    Thanks,<br />Admin
    </div>
<?php }
else{
    ?>
<div class="page-header">
<h1>Available Files</h1>
    </div>
<table class="table table-striped" id="files">
    <tr>
        <th width="20px">Sn</th><th>File Name</th><th></th>
    </tr>
    <?php
    $i=1;
    foreach ($files as $rowf){
    ?>
    <tr>
        <td><?php echo $i; $i++; ?></td>
        <td><?php echo $rowf->filename; ?></td>
        <td><a id="getfile" class="btn modal-download" href="<?php echo base_url(); ?>/index.php/dlm/getfile?filename=<?php echo $rowf->filename; ?>" ><i class="icon-download"></i> Download</a></td>
    </tr>
    <?php
    }
    ?>
</table>
<?php } ?>