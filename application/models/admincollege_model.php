<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class AdminCollege_model extends CI_Model
{
    
 function adminCollegeListingCount(){
       $this->db->select('*');
        $this->db->from('college_listing');
        if(!empty($searchText)) {
            $likeCriteria = "(  email  LIKE '%".$searchText."%'
                            OR  name  LIKE '%".$searchText."%'
                            OR  mobile  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('status', 1);
        $query = $this->db->get();
    
        return count($query->result());
 }
    
 function adminCollegeListing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('college_listing');
        if(!empty($searchText)) {
            $likeCriteria = "(  email  LIKE '%".$searchText."%'
                            OR  name  LIKE '%".$searchText."%'
                            OR  mobile  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('status', 1);
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
   
}

?>
