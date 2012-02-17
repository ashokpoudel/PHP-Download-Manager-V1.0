<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="<?php echo base_url(); ?>">Download Manager <?php if($this->tank_auth->is_logged_in() && $this->tank_auth->get_username()) { ?> (<strong><?php echo $this->tank_auth->get_username() ?></strong>)<?php } ?></a>
            <div class="nav-collapse">
            <?php if($this->tank_auth->is_logged_in()) { ?>
            <ul class="nav">
                <?php
                if($this->tank_auth->get_usergroup() && $this->tank_auth->get_usergroup()==ADMIN){
                ?>
                
                    <li><a href="<?php echo base_url(); ?>dlm/fileupload">File Upload</a></li>
                    <li><a href="<?php echo base_url(); ?>dlm/filemanager">File Manager</a></li>
                    <li class="dropdown">
                    <a class="dropdown-toggle"   data-toggle="dropdown"  href="#">User Manager<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url(); ?>usermanag/users">Users</a></li>
                        <li><a href="<?php echo base_url(); ?>usermanag/groups">Groups</a></li>
                    </ul>
                    </li>
                    
                <?php
                }
                ?>
                <li class="dropdown">
                    <a class="dropdown-toggle"   data-toggle="dropdown"  href="#">Settings<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url(); ?>auth/change_password">Change Password</a></li>
                        <li><a href="<?php echo base_url(); ?>auth/change_email">Change Email</a></li>
                    </ul>
                    </li>
                    <li><?php echo anchor('/auth/logout/', 'Logout'); ?></li>
                </ul>
                <?php } ?>
            </div>
        </div>
    </div>
</div>