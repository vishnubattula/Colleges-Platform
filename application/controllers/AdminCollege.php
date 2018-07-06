<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class AdminCollege extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admincollege_model');
        $this->load->model('user_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Admin College';
        $this->loadViews("adminCollege", $this->global, NULL , NULL);
    }
    
 /**
     * This function is used to load the user list
     */
    function adminCollegeListing()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('admincollege_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->admincollege_model->adminCollegeListingCount($searchText);

			$returns = $this->paginationCompress ( "adminCollegeListing/", $count, 5 );
            
            $data['adminCollegeRecords'] = $this->admincollege_model->adminCollegeListing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Admin College Listing';
            
            $this->loadViews("adminCollege", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the add new form
     */
    function addNewCollege()
    {
       if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('cname','Full Name','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('cemail','Email','trim|required|valid_email|xss_clean|max_length[128]');
            $this->form_validation->set_rules('cmobile','Mobile Number','required|min_length[10]|xss_clean');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNew();
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('cname')));
                $email = $this->input->post('cemail');
                $mobile = $this->input->post('cmobile');
                $url = $this->input->post('curl');
                $address = $this->input->post('caddress');
                $short_description = $this->input->post('csdesc');
                $long_description = $this->input->post('cldesc');
               
                /** image upload to uploads folder **/
                $path = "uploads/";
                $ImageName = $_FILES['cimage']['name'];
                $location = $path . $_FILES['cimage']['name']; 

                move_uploaded_file($_FILES['cimage']['tmp_name'], $location); 

                
                
                
                $collegeInfo = array('name'=>$name,'email'=>$email,'mobile'=>$mobile, 'url'=>$url, 'address'=>$address, 'short_desc'=> $short_description,
                                    'long_desc'=>$long_description,'image'=> $ImageName, 'status'=>1, 'createdBy'=>$this->vendorId, 'createdDtm'=>date('Y-m-d H:i:s'));
                
                $this->load->model('admincollege_model');
                $result = $this->admincollege_model->addNewCollege($collegeInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New College created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Adding College failed');
                }
                
                redirect('addNewCollege');
            }
        }
    }
    
function addNew()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('admincollege_model');
            
            $this->global['pageTitle'] = 'Add New College';

            $this->loadViews("addNewCollege", $this->global, NULL);
        }
    }
    
function editOldCollege($collegeId = NULL){
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            if($userId == null)
            {
                redirect('userListing');
            }
            
            $data['userInfo'] = $this->user_model->getCollegeInfo($collegeId);
            
            $this->global['pageTitle'] = 'CodeInsect : Edit User';
            
            $this->loadViews("editOld", $this->global, $data, NULL);
        }
    }

}

?>