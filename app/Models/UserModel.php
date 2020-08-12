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
       protected $status_tb = '_status';  
       protected $lead_source_tb = '_lead_source';  

    
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



    function getLeads($status = NULL,$id = NULL)        
    {    //echo $id;exit;
         $PropertyModel = model('PropertyModel');    
         $builder = $this->db->table($this->property_interested_tb.' as A');   
         $builder->select('A.*,B.title,D.firstname,D.lastname,E.status_name,E.status_badge,F.source_name');
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

         $builder->join(
          $this->status_tb.' as E',
          'E.id = A.status'
        );

         $builder->join(
          $this->lead_source_tb.' as F',
          'F.id = A.lead_source_id'
        );
        
        if(isset($status))
         {
             $builder->where('A.status', $status);
         }

         if(isset($id))
         {
             $builder->where('A.id',$id); 
         }

         $query = $builder->get();

        foreach($query->getResultArray() as $r)
        {
           $r['images'] = $PropertyModel->getPropertyImages($r['property_id']);
           $data[] = $r;
        }  
          return $data;       
    }


    function getAllUsersByRole($role)
    {
         $builder = $this->db->table($this->users_tb);  
         $builder->select([$this->users_tb.'.*',$this->user_detail_tb.'.*',$this->status_tb.'.status_name',$this->status_tb.'.status_badge']); 
         $builder->join($this->user_detail_tb,$this->user_detail_tb.'.user_id ='.$this->users_tb.'.id','left');
         $builder->join($this->status_tb,$this->status_tb.'.id ='.$this->users_tb.'.status','left'); 
         $builder->where($this->users_tb.'.role',$role); 
         //$builder->getCompiledSelect();exit;
         $query = $builder->get();
          foreach($query->getResultArray() as $r)
          {
              $data[] = $r;
          } 
          return $data;  
    }  



    function getUserDetail($userId)  
    {
        $builder = $this->db->table($this->users_tb);  
        $builder->select([$this->users_tb.'.*',$this->user_detail_tb.'.*',$this->status_tb.'.status_name',$this->status_tb.'.status_badge']); 
        $builder->join($this->user_detail_tb,$this->user_detail_tb.'.user_id='.$this->users_tb.'.id'); 
        $builder->join($this->status_tb,$this->status_tb.'.id='.$this->users_tb.'.status'); 
        $builder->where($this->users_tb.'.id',$userId);  
        $query = $builder->get();  
        foreach($query->getResultArray() as $r) 
        {
           return $r;
        }   
    }

    function searchUser($txt)
    {
        $builder = $this->db->table($this->users_tb);  
        $builder->select([$this->users_tb.'.id',$this->user_detail_tb.'.firstname',$this->user_detail_tb.'.lastname',$this->users_tb.'.mobile',$this->users_tb.'.email']); 
        $builder->join($this->user_detail_tb,$this->user_detail_tb.'.user_id='.$this->users_tb.'.id'); 
        $builder->like($this->users_tb.'.email', $txt, 'both'); 
        $builder->orLike($this->users_tb.'.mobile', $txt, 'both'); 
        $builder->orLike($this->users_tb.'.username', $txt, 'both');
        $builder->orLike($this->user_detail_tb.'.firstname', $txt, 'both');
        $builder->orLike($this->user_detail_tb.'.lastname', $txt, 'both');
        //echo $builder->getCompiledSelect();  
        $query = $builder->get();  
        foreach($query->getResultArray() as $r)
        {
           $data[] = $r;
        }
        return $data;   
    }

    



}