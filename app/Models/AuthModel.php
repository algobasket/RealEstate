<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
       protected $users_tb = '_users';
       protected $user_detail_tb = '_user_details';
       protected $users_sess_logs_tb = '_users_session_logs'; 


    function login($mobile,$password,$role)
    {
        $query = $this->db->query("SELECT * FROM $this->users_tb WHERE mobile = ? AND password= ? AND role = ?",[$mobile,$password,$role]); 
        foreach($query->getResultArray() as $r)
        {
            if($r)
            {
               return $data[] = $r;
            }  
        }   
    }  


    function backendLogin($username,$password,$role,$access_code)         
    {
          $query = $this->db->query("SELECT * FROM $this->users_tb WHERE mobile = ? AND password= ? AND access_code = ?",[$mobile,$password,$role,$access_code]);
          foreach($query->getResultArray() as $r)
          {
            if($r)   
            {
               return $data[] = $r;
            }  
        }   
    }       


    function register($data,$data2) 
    {
       $builder = $this->db->table($this->users_tb);
       $builder->insert($data); 
       $data2['user_id'] = $this->db->insertID();
       $this->saveUserDetail($data2);
       return $data2['user_id']; 
    } 


    function saveUserDetail($data)
    {
        $builder = $this->db->table($this->user_detail_tb);
        $builder->insert($data); 
    } 


    function saveUserSessLog($data)
    {
       $builder = $this->db->table($this->users_sess_logs_tb);
       $builder->insert($data); 
    }     


}

