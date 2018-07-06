<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class AdminCollege_model extends CI_Model
{
    
 function adminCollegeListingCount()
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

function addNewCollege($collegeInfo)
    {
        $this->db->trans_start();
        $this->db->insert('college_listing', $collegeInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
function getCollegeInfo($collegeId)
    {
        $this->db->select('userId, name, email, mobile, roleId');
        $this->db->from('tbl_users');
        $this->db->where('isDeleted', 0);
		$this->db->where('roleId !=', 1);
        $this->db->where('userId', $userId);
        $query = $this->db->get();
        
        return $query->result();
    }
    
public function get_current_page_records($limit, $start) 
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get("college_listing");
 
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }
             
            return $data;
        }
 
        return false;
    }
     
    public function get_total() 
    {
        return $this->db->count_all("college_listing");
    }
}

?>
