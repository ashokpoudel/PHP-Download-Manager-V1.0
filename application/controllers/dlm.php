<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dlm extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
        $this->load->helper('file');

        $this->template->set_partial('head', 'partials/head', FALSE);
		$this->template->set_partial('header', 'partials/header', FALSE);
		$this->template->set_partial('footer', 'partials/footer', FALSE);
	}

	function index()
	{
	   
	}
    
    function filemanager()
	{
   	    $group = new Groups();
        $group->distinct(true);
        //$group->include_related('files',array('id'),true,true);
        $data['groups'] = $group->get();
        

        $files = new Files();
        $files->include_related('groups',array('id'),true,true);
        $data['files'] = $files->get();
                //echo $this->db->last_query();
		$this->template->set_partial('body', 'includes/filemanager', FALSE);
		$this->template->build('layout',$data);
	}
    
     function fileupload()
	{
		$this->template->set_partial('body', 'includes/fileupload', FALSE);
		$this->template->build('layout');
	}
    
    public function addthis()
	{
		$group_id = $_REQUEST['group_id'];
        $file_id = $_REQUEST['file_id'];
        
            $query = $this->db->get_where('files_usergroup', array('usergroup_id' => $group_id,'files_id'=>$file_id));
            if ($query->num_rows() == 0)
            {
        		$data=array(
				'usergroup_id' => $group_id,
				'files_id' => $file_id,
				);
        		$sql=$this->db->insert('files_usergroup', $data);
                $op=1;
            }
            else
            {
                $sql = $this->db->delete('files_usergroup', array('usergroup_id' => $group_id,'files_id'=>$file_id));
                $op = 0;
            }
		header('Content-Type: text/javascript');
		echo json_encode(array('removed'=>$op));
	}
    
    function getfile(){
        $this->load->helper('download');
        $data = file_get_contents("./server/php/files/".$_REQUEST['filename']); // Read the file's contents
        $name = $_REQUEST['filename'];
        
        force_download($name, $data); 
        redirect('');
    }
}

/* End of file dlm.php */
/* Location: ./application/controllers/dlm.php */