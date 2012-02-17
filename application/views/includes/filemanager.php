<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script>
  /////////////////////////////////////////////////////////////////
 	function addthis (gid,fid){

    $.post("<?php echo base_url(); ?>index.php/dlm/addthis",{file_id:fid,group_id:gid},function(data){
		 document.getElementById('test').innerHTML = "";
 	}, "json");
  
  $("#filemanager").ajaxStart(function(){
    $("#wait").css("display","block");
	 $("#blackol").css("display","block");
  });
  
  $("#filemanager").ajaxComplete(function(){
    $("#wait").css("display","none");
	$("#blackol").css("display","none");
  });
  
  $("#filemanager").ajaxError(function(){
    alert("Server Connection error!");
  });
  }
  </script>
  <div id="test"></div>
<div class="page-header">
<h1>File Manager</h1>
    </div>
<table class="table table-striped" id="files">
    <tr>
        <th width="20px">Sn</th><th>File Name</th><th>Access Group</th>
    </tr>
    <?php
    $i=1;
    foreach ($files as $rowf){
    ?>
    <tr>
        <td><?php echo $i; $i++; ?></td>
        <td><?php echo $rowf->filename; ?></td>
        <td>
            <form id="filemanager" action="" method="POST" enctype="multipart/form-data" class="form-inline form-horizontal">
            <?php 
            foreach ($groups as $row)
            {
              ?>
              <label><input <?php if($rowf->groups_id==$row->id) echo 'checked="checked"'; ?> onchange="addthis('<?php echo $row->id; ?>','<?php echo $rowf->id; ?>')" type="checkbox" name="group" value="<?php echo $row->id; ?>" /> <?php echo $row->GroupName; ?></label>
              <?php  
            }
            ?>
            </form>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
<div id="wait" class="bdrrad5" style="display:none;width:69px;border:1px solid black;position:absolute;top:40%;left:50%;padding:10px; background-color:#FFFFFF"><img src='<?php echo base_url(); ?>img/loading.gif' width="64" height="64" /></div><div id="blackol" class="black_overlay"></div>