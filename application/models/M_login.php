<?php
	
	/**
	* 
	*/
	class M_login extends CI_Model
	{
		
		function check_user()
        {
            $email= set_value('email');
            $password= set_value('password');
            $gry= $this->db->where('email', $email)
                           ->where('password', $password)      
                           ->limit('1')
                           ->get('users');

            if($gry->num_rows() > 0){
                return $gry->row();
            }else{
                return array();
            }
        }
	}
?>