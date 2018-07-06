<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class CollegeUi extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admincollege_model');
        $this->load->helper("url");
        $this->load->library('pagination');
        $this->load->model('user_model');
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'College List';
        
        $this->load->model('admincollege_model');

        $searchText = $this->input->post('searchText');
        $data['searchText'] = $searchText;


        $limit_per_page = 1;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->admincollege_model->get_total();
         if ($total_records > 0) 
        {
            // get current page records
            $data["results"] = $this->admincollege_model->get_current_page_records($limit_per_page, $start_index);
             
            $config['base_url'] = base_url() . 'paging/index';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
             
            $this->pagination->initialize($config);
             
            // build paging links
            $data["links"] = $this->pagination->create_links();
        }
         
        $data['CollegeRecords'] = $this->admincollege_model->adminCollegeListing($searchText, $start_index,"");
        
        $this->load->view('header');  
        $this->load->view("adminFrontendCollege",$data); 
        $this->load->view('footer');
    }
}

?>