<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
       protected $users_tb = '_users';
       protected $user_detail_tb = '_user_details';
       protected $users_sess_logs_tb = '_users_session_logs'; 
       protected $countries = '_countries'; 
       protected $states = '_states'; 
       protected $cities = '_cities';    
       protected $property_fav_tb    = '_favourites'; 
       protected $property_interested_tb = '_interested'; 
       protected $properties_tb      = '_properties'; 
       protected $property_ty_tb     = '_property_type';  

    
    function getUserCountry($userId = NULL)
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



    function getLeads($status = NULL)
    {
         $PropertyModel = model('PropertyModel');    
         $builder = $this->db->table($this->property_interested_tb.' as A');   
         $builder->select('A.*,B.title');
         $builder->join(
          $this->properties_tb.' as B',
          'B.id = A.property_id'
        );

         $builder->join(
           $this->users_tb.' as C',
          'C.id = A.user_id'
        );

         $builder->join(
          $this->user_detail_tb.' as D',
          'D.user_id = A.user_id'
        );
         //$builder->where($this->property_interested_tb.'.status',$status);
         $query = $builder->get();

          foreach($query->getResultArray() as $r)
          {
             $r['images'] = $PropertyModel->getPropertyImages($r['property_id']);
             $data[] = $r;
          }
          return $data;     
    } 



}