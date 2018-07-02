<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('home_model');
    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $this->load->view('home');
    }

}

?>