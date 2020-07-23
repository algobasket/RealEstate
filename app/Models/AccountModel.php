<?php namespace App\Models;

use CodeIgniter\Model;

class AccountModel extends Model
{
       protected $users_tb = '_users';
       protected $user_detail_tb = '_user_details';
       protected $users_sess_logs_tb = '_users_session_logs'; 
       protected $countries = '_countries'; 
       protected $states = '_states'; 
       protected $cities = '_cities'; 
        

    
    function getProfileDetail($userId)
    {
         $builder = $this->db->table($this->users_tb);
         $builder->select('*');
         $builder->join($this->user_detail_tb,$this->user_detail_tb.'.user_id = '.$this->users_tb.'.id');
         $builder->where($this->users_tb.'.id',$userId); 
         $query = $builder->get();
          foreach($query->getResultArray() as $r){
            if($r){
             return $data[] = $r;
           }  
        }  
    }

    function saveProfileDetail($data)
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