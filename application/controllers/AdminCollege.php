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
            $this->load->model('admincollege_model');
            $data['roles'] = $this->user_model->getUserRoles();
            
            $this->global['pageTitle'] = 'Add New College';

            $this->loadViews("addNewCollege", $this->global, $data, NULL);
        }
    }
}

?>