<?php
Class Employee extends CI_Controller{
	public function __Construct(){
		parent::__Construct();
		$this->load->database();
		 $this->load->library('form_validation');
		$this->load->helper(array('form','url'));
		 
		
	}
	function index(){
		$this->load->view('employer/header');

		//$this->load->view('employer/registeremp');
		//$this->load->view('employer/footer');
	}
	function emp_reg(){
		if($this->input->post('submit')=='Register Your Account')
		{
	$this->form_validation->set_rules('workscout_user_login','username','required');
		$this->form_validation->set_rules('workscout_user_email','email','required|valid_email');
		if($this->form_validation->run()==FALSE){
			$this->emp_reg();
			
		}
		else
		{
			if($this->input->post()){
			$uname=$this->input->post('workscout_user_login');
			$email=$this->input->post('workscout_user_email');
			$emp=$this->input->post('workscout_user_role');
			$data=array('emp_uname'=>$uname,
			'emp_email'=>$email,
			'emp_cat'=>$emp);
			//print_r($data);
			if($emp=='employer'){
			$data1=$this->db->insert('emp_reg',$data);
			
				redirect('employee/dashboard');
			}
			else{
				redirect('');
			}
		}
			
		}}
}
	function rolekey_exists($email) {
  $this->db->where('emp_email',$email);
    $query = $this->db->get('emp_reg');
    if ($query->num_rows() > 0){
        return true;
    }
    else{
        return false;
    }
}
function jo_post(){
	if($this->input->post('submit_job')=='Preview')
		{
	$this->form_validation->set_rules('job_title','Job Title','required');
	$this->form_validation->set_rules('job_type','Job Type','required');
	//$this->form_validation->set_rules('job_category','Job Category','required');
	$this->form_validation->set_rules('job_description','Job Description','required');
	$this->form_validation->set_rules('application','Application','required');
	$this->form_validation->set_rules('company_name','Company Name','required');
	$this->form_validation->set_rules('company_name','Company Name','required');
	if($this->form_validation->run()==FALSE){
		//$this->jo_post();
	}
	else{
		if(!empty($_FILES['header_image']['name'])){
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['file_name'] = $_FILES['header_image']['name'];
                //$config['max_size'] = '10240';
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('header_image')){
                    $uploadData = $this->upload->data();
                    $header_image = $uploadData['file_name'];
                }else{
                    $header_image = '';
                }
            }else{
                $header_image = '';
            }
			if(!empty($_FILES['company_logo']['name'])){
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['file_name'] = $_FILES['company_logo']['name'];
                //$config['max_size'] = '10240';
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('company_logo')){
                    $uploadData = $this->upload->data();
                    $company_logo = $uploadData['file_name'];
                }else{
                    $company_logo = '';
                }
            }else{
                $company_logo= '';
            }
		$job_title=$this->input->post('job_title');
		$job_location=$this->input->post('job_location');
		$job_type=$this->input->post('job_type');
		$job_category=implode(",",$this->input->post('job_category'));
		//$job_category=$this->input->post('job_category'));
		//$job_category=json_encode(',',$this->input->post('job_category'));
		$job_tags=$this->input->post('job_tags');
		$job_description=$this->input->post('job_description');
		$application=$this->input->post('application');
		$job_deadline=$this->input->post('job_deadline');
		$apply_link=$this->input->post('apply_link');
		$company_name=$this->input->post('company_name');
		$company_website=$this->input->post('company_website');
		$company_tagline=$this->input->post('company_tagline');
		$company_video=$this->input->post('company_video');
		$company_twitter=$this->input->post('company_twitter');
		
		$data=array('title'=>$job_title,
		'loc'=>$job_location,
		'jo_type'=>$job_type,
		'jo_cat'=>$job_category,
		'jo_tag'=>$job_tags,
		'des'=>$job_description,
		'email'=>$application,
		'closedate'=>$job_deadline,
		'ext_link'=>$apply_link,
		'header'=>$header_image,
		'com_name'=>$company_name,
		'web'=>$company_website,
		'com_tag'=>$company_tagline,
		'video'=>$company_video,
		'twitter'=>$company_twitter,
		'logo'=>$company_logo
		 );
		$data1=$this->db->insert('jo_post',$data);
		redirect('employee/jo_preview',$data);
		
	}
		}
		$this->load->view('employer/header');
	$this->load->view('employer/job_post');
	$this->load->view('employer/footer');
}
function dashboard(){
	$this->load->view('employer/header');
	$this->load->view('employer/emp_dashboard');
	//$this->load->view('employer/footer');
}
function jo_preview(){
	$this->load->view('employer/header');
	$this->load->view('employer/job_post_preview');
	//$this->load->view('employer/footer');
}
}
?>