<?php namespace App\Models;

use CodeIgniter\Model;

class PropertyModel extends Model
{
       protected $users_tb = '_users';
       protected $user_detail_tb = '_user_details';
       protected $users_sess_logs_tb = '_users_session_logs'; 
       protected $countries = '_countries'; 

       protected $states = '_states'; 
       protected $cities = '_cities'; 

       protected $properties_tb = '_properties'; 
       protected $property_ty_tb = '_property_type'; 
       protected $amenities_tb = '_amenities'; 
       protected $property_ty_mp_tb = '_property_type_map'; 
        

    function addProperty($data)
    {
       $builder = $this->db->table($this->properties_tb); 
       $builder->insert($data);
    }

    function getPropertyType() 
    {
       $builder = $this->db->table($this->property_ty_tb); 
         $query = $builder->get();
          foreach($query->getResultArray() as $r)
               $data[] = $r;
          return $data;  
    }

   function getPropertyAmeneties()  
    {
       $builder = $this->db->table($this->amenities_tb); 
         $query = $builder->get();
          foreach($query->getResultArray() as $r)
               $data[] = $r;
          return $data;  
    }


    function saveUserSessLog($data)
    {
       $builder = $this->db->table($this->users_sess_logs_tb); 
       $builder->insert($data); 
    }   


}