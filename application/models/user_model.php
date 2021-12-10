<?php
class user_model extends CI_Model
{

 public function register($userdata)
    {
        $this->db->insert('user_details', $userdata);
        $afftectedRows = $this->db->affected_rows();
        if ($afftectedRows > 0) {
            return true;
        } else {
            return false;
        }
    }
    

    public function login($email, $encrypt_password){
        //Validate
        $this->db->select("*"); 
        $this->db->from('login_details');
        $this->db->where('email', $email);
        $this->db->where('password', $encrypt_password);
       ;
        $query = $this->db->get();
        return $query->result();
        
    }
    public function login_employer($email, $encrypt_password){
        //Validate
        $this->db->select("*"); 
        $this->db->from('user_details');
        $this->db->where('email', $email);
        $this->db->where('password', $encrypt_password);
        $this->db->where("(role='2')", NULL, FALSE);
        $query = $this->db->get();
        return $query->result();
        
    }
    public function get_email_data($email){
        $this->db->select("*"); 
        $this->db->from('user_details');
        $this->db->where('email', $email);
        $query = $this->db->get();
        return $query->result();
    }
    public function update_user($data,$id){
        $this->db->where('id', $id);
        $this->db->update('user_details', $data);
        $result = $this->db->affected_rows();
        return $result;
    }
    

    	// Check email exists
        function is_email_available_Admin($email,$role)  
		{  
            $this->db->where('role', $role);  
			 $this->db->where('email', $email);  
			 $query = $this->db->get("user_details");  
			 if($query->num_rows() > 0)  
			 {  
				  return 1;  
			 }  
			 else  
			 {  
				  return 0;  
			 }  
		} 

        
        public function apply_job($userdata)
    {
        $this->db->insert('applied_job', $userdata);
        $afftectedRows = $this->db->affected_rows();
        if ($afftectedRows > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    
}
