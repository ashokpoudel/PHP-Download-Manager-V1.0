<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    /////////////////////////////////////////////////////////////////
 	$("#savegroup").click(function(){
    txt=$("#GroupName").val();
	$.post("<?php echo base_url(); ?>index.php/usermanag/creategroup",{groupname:txt},function(data){
		$("#groups").append(data.append); 
 	}, "json");
    });
  
  $("#savegroup").ajaxStart(function(){
    $("#wait").css("display","block");
	 $("#blackol").css("display","block");
  });
  
  $("#savegroup").ajaxComplete(function(){
    $("#wait").css("display","none");
	$("#blackol").css("display","none");
  });
  
  $("#savegroup").ajaxError(function(){
    alert("Server Connection error!");
  });
    ///////////////////////////////////////////////////
  });
  /////////////////////////////////////////////////////////////////
 	function deleteit (id){
    $.post("<?php echo base_url(); ?>index.php/usermanag/deletegroup",{id:id},function(data){
		if(data.removed=='1'){
		  $("#"+id).remove();
		} 
 	}, "json");
  
  $("#deleteit").ajaxStart(function(){
    $("#wait").css("display","block");
	 $("#blackol").css("display","block");
  });
  
  $("#deleteit").ajaxComplete(function(){
    $("#wait").css("display","none");
	$("#blackol").css("display","none");
  });
  
  $("#deleteit").ajaxError(function(){
    alert("Server Connection error!");
  });
  }
  </script>
<div class="page-header">
        <h1>Groups</h1>
    </div>
    <form id="fileupload" action="" method="POST" enctype="multipart/form-data" class="form-inline form-horizontal">
    <input type="text" name="GroupName" id="GroupName" placeholder="Group Name" /> 
    <button type="button" class="btn btn-primary start" id="savegroup">
                    <i class="icon-upload icon-white"></i> Create New Group
     </button>
    </form>
<table class="table table-striped" id="groups">
    <tr>
        <th width="20px">Id</th><th>Group Name</th><th></th>
    </tr>
    <?php
    foreach ($groups as $row){
    ?>
    <tr id="<?php echo $row->id; ?>">
        <td><?php echo $row->id; ?></td>
        <td><?php echo $row->GroupName; ?></td>
        <td>
        <button type="button" class="btn btn-danger delete" id="deleteit" onclick="deleteit('<?php echo $row->id; ?>')">
                    <i class="icon-trash icon-white"></i> Delete
        </button></td>
    </tr>
    <?php
    }
    ?>
</table>
<div id="wait" class="bdrrad5" style="display:none;width:69px;border:1px solid black;position:absolute;top:40%;left:50%;padding:10px; background-color:#FFFFFF"><img src='<?php echo base_url(); ?>img/loading.gif' width="64" height="64" /></div><div id="blackol" class="black_overlay"></div>