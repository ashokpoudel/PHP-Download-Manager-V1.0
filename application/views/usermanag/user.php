<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script>
  /////////////////////////////////////////////////////////////////
 	function setusergroup(uid,gid){
    $.post("<?php echo base_url(); ?>index.php/usermanag/setusergroup",{user_id:uid,usergroup_id:gid},function(data){
	document.getElementById('test').innerHTML = "";
 	}, "json");
  
  $("#usergroup"+uid).ajaxStart(function(){
    $("#wait").css("display","block");
	 $("#blackol").css("display","block");
  });
  
  $("#usergroup"+uid).ajaxComplete(function(){
    $("#wait").css("display","none");
	$("#blackol").css("display","none");
  });
  
  $("#usergroup"+uid).ajaxError(function(){
    alert("Server Connection error!");
  });
  }
  </script>
<div class="page-header">
        <h1>Users</h1>
    </div>
<table class="table table-striped" id="groups">
    <tr>
        <th width="20px">Id</th><th>User Name</th><th>Group</th>
    </tr>
    <?php
    foreach ($users as $row){
    ?>
    <tr id="<?php echo $row->id; ?>">
        <td><?php echo $row->id; ?></td>
        <td><?php echo $row->username; ?></td>
        <td>
        <form id="usermanager" action="" method="POST" enctype="multipart/form-data" class="form-inline form-horizontal">
            <select size="1" id="usergroup<?php echo $row->id; ?>" name="usergroup" onchange="setusergroup('<?php echo $row->id; ?>',this.value)">
            <option value="">--- Select One ---</option>
            <?php 
            foreach ($groups as $rowg)
            {
              ?>
              <option <?php if($row->groups_id==$rowg->id) echo 'selected="selected"'; ?> value="<?php echo $rowg->id; ?>"><?php echo $rowg->GroupName; ?></option>
              <?php  
            }
            ?>
            </select>
            </form>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
<div id="wait" class="bdrrad5" style="display:none;width:69px;border:1px solid black;position:absolute;top:40%;left:50%;padding:10px; background-color:#FFFFFF"><img src='<?php echo base_url(); ?>img/loading.gif' width="64" height="64" /></div><div id="blackol" class="black_overlay"></div>