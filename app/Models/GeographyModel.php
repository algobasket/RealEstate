<?php namespace App\Models;

use CodeIgniter\Model;

class GeographyModel extends Model
{
       protected $users_tb = '_users';
       protected $user_detail_tb = '_user_details';
       protected $users_sess_logs_tb = '_users_session_logs';
       protected $countries = '_countries'; 
       protected $states = '_states'; 
       protected $cities = '_cities';  


    function countries()  
    {
         $builder = $this->db->table($this->countries);
         $query = $builder->get();
          foreach($query->getResultArray() as $r)
               $data[] = $r;
          return $data;  
    }   

    function states()  
    {
         $builder = $this->db->table($this->states);
         $query = $builder->get();
          foreach($query->getResultArray() as $r)
               $data[] = $r;
          return $data;  
    }   

    function cities()   
    {
         $builder = $this->db->table($this->cities);
         $query = $builder->get();
          foreach($query->getResultArray() as $r)
               $data[] = $r;
          return $data;  
    } 

    function countryCities($countryId)      
    {
         $builder = $this->db->table($this->cities);
         $builder->where($this->cities.'.country_id',$countryId);
         $query = $builder->get();
          foreach($query->getResultArray() as $r)
               $data[] = $r;
          return $data;   
    }     


}

