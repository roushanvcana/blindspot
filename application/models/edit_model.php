 <?php
	class edit_model extends CI_Model{   

        function modify_data($table, $id){	
           $data =  $this->db->get_where($table, array('id' => $id))->row_array();
           return $data;         
        }

        function update_data($table, $data, $id){	
           $data =  $this->db->update($table, $data, array('id' => $id));
           return $data;
         
         }
         //manage contact email validation
         function is_email_available($email)  
      {  
           $this->db->where('email', $email);  
           $query = $this->db->get("manage_contact");  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }  
      //manage profile email validation
      function is_email_available_Profile($email)  
      {  
           $this->db->where('email', $email);  
           $query = $this->db->get("manage_users");  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }  
      //manage contact email validation
      function is_email_available_Admin($email)  
      {  
           $this->db->where('email', $email);  
           $query = $this->db->get("manage_admin");  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }  
      function   is_email_available1($email)  
      {  
           $this->db->where('email', $email);  
           $query = $this->db->get("manage_admin");  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      } 
   

         //manage page email validation
         function is_email_availablePage($email)  
      {  
           $this->db->where('email', $email);  
           $query = $this->db->get("manage_page");  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }  

   }  
?>