<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Usermanag extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
        
        $this->template->set_partial('head', 'partials/head', FALSE);
		$this->template->set_partial('header', 'partials/header', FALSE);
		$this->template->set_partial('footer', 'partials/footer', FALSE);
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			$this->template->set_partial('body', 'auth/welcome', FALSE);
			$this->template->build('layout'); 
		}
	}
    
    function groups()
	{
	       $group = new Groups();
           $data['groups'] = $group->get();
			$this->template->set_partial('body', 'usermanag/group', FALSE);
			$this->template->build('layout',$data); 
	}
    
    function users()
	{
	        $users = new Usersmodel();
            $users->include_related('groups',array('id'),true,true);
            $data['users'] = $users->get();

            $group = new Groups();
            $data['groups'] = $group->get();
        
			$this->template->set_partial('body', 'usermanag/user', FALSE);
			$this->template->build('layout',$data); 
	}
    
    public function creategroup()
	{
		$groupname = $_REQUEST['groupname'];
        
        $group = new Groups();
        $group->GroupName = $groupname;
        if($group->save()){
  		$op = '<tr id="'.$group->id.'"><td>'.$group->id.'</td><td>'.$groupname.'</td><td><button type="button" class="btn btn-danger delete" onclick="deleteit('.$group->id.')"><i class="icon-trash icon-white"></i> Delete</button></td></tr>';
        }
        else{
            $op = '<tr><td colspan = "3"><div class="alert alert-error"> Data could not be added.'.$group->error->string.'</div></td></tr>';
        }
		header('Content-Type: text/javascript');
		echo json_encode(array('append'=>$op));
	}
    
    public function deletegroup()
	{
		$groupid = $_REQUEST['id'];
        
        $group = new Groups();
        $group->where('id',$groupid)->get();
        if($group->delete())
		$op = 1;
        else
        $op = 0;
		header('Content-Type: text/javascript');
		echo json_encode(array('removed'=>$op));
	}
    
    public function setusergroup()
	{
		$usergroup_id = $_REQUEST['usergroup_id'];
        $user_id = $_REQUEST['user_id'];
        
            $query = $this->db->get_where('users_usergroup', array('user_id'=>$user_id));
            if ($query->num_rows() == 0)
            {
        		$data=array(
				'usergroup_id' => $usergroup_id,
				'user_id' => $user_id,
				);
        		$sql=$this->db->insert('users_usergroup', $data);
                $op=1;
            }
            else
            {
                $data=array(
				'usergroup_id' => $usergroup_id,
				'user_id' => $user_id,
				);
                $this->db->where(array('user_id'=>$user_id));
        		$sql=$this->db->update('users_usergroup', $data);
                $op=1;
            }
		header('Content-Type: text/javascript');
		echo json_encode(array('added'=>$op));
	}
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */