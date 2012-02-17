<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
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
		      
            $user = new Usersmodel();
            $user->include_related('groups',array('id'),true,true);
            $user->where('id',$this->tank_auth->get_user_id());
            $data['user'] = $user->get();
            
            $files = new Files();
            $data['files'] = $files->where_related('groups','id',$user->groups_id)->get();
            
            
            $this->template->set_partial('body', 'includes/welcome', FALSE);
			$this->template->build('layout',$data);
		}
	}
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */