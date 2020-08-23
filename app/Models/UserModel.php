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
       protected $reviews_tb = '_reviews';  
       protected $appointments_tb = '_appointments';  
       protected $lead_source_tb = '_lead_source';   
       protected $roles_tb = '_roles';   
 
    
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
         $data = array();
        if(is_array($query->getResultArray()))
        { 
           foreach($query->getResultArray() as $r)
           {
             $r['images'] = $PropertyModel->getPropertyImages($r['property_id']);
             $data[] = $r;
           }  
            return $data;    
        } 
           
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
         $data = array();
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


    function isUsernameAvailable($username)
    {
         $builder = $this->db->table($this->users_tb);
         $builder->select('username');
         $builder->where($this->users_tb.'.username',$username); 
         $query = $builder->get();
         $count = count($query->getResultArray());
         if($count > 0)
         {
            return false;
         }else{
            return true;
         } 
    }


    function isUserSuspendedOrBanned($userId) 
    {
         $builder = $this->db->table($this->users_tb);
         $builder->select([$this->users_tb.'status',$this->status_tb.'status_name']);
         $builder->join($this->status_tb,$this->status_tb.'.id='.$this->users_tb.'.status','left');  
         $builder->where($this->users_tb.'.id',$userId); 
         $query = $builder->get();
         $result = $query->getResultArray();  
        foreach($result as $r)
        {
           if(in_array($r['status_name'],['Suspended','Banned']))
           {
              exit('Sorry your account is '.$r['status_name'] .'due to vialation of our rules and policies!');
           } 
        }
    }



    function getAllReviews($userType = NULL,$userId = NULL,$status = NULL)
    {
        $builder = $this->db->table($this->reviews_tb);  
        $builder->select([$this->reviews_tb.'.*',$this->user_detail_tb.'.*',$this->status_tb.'.status_name',$this->status_tb.'.status_badge']); 
        $builder->join($this->status_tb,$this->status_tb.'.id='.$this->reviews_tb.'.status','left'); 
        
         if(isset($userType)) 
         {
             if($userType == 'seller')
             {
                $builder->join($this->user_detail_tb,$this->user_detail_tb.'.user_id='.$this->reviews_tb.'.buyer_id','left'); 
                $builder->where($this->reviews_tb.'.seller_id',$userId);
             }
             if($userType == 'buyer') 
             {  
                $builder->join($this->user_detail_tb,$this->user_detail_tb.'.user_id='.$this->reviews_tb.'.seller_id'); 
                $builder->where($this->reviews_tb.'.buyer_id',$userId);
             }
         }
         if(isset($status))
         {
             $builder->where($this->reviews_tb.'.status', $status);
         }
          
        $query = $builder->get();
        $data = array();  
        foreach($query->getResultArray() as $r)
        {
            $data[] = $r;  
        }  
        return $data;     
    } 



    function getAllUserAppointment($userType = NULL,$userId = NULL,$status = NULL)
    { 
        $builder = $this->db->table($this->appointments_tb);  
        $builder->select([$this->appointments_tb.'.*',$this->user_detail_tb.'.*',$this->status_tb.'.status_name',$this->status_tb.'.status_badge']); 
        $builder->join($this->user_detail_tb,$this->user_detail_tb.'.user_id='.$this->appointments_tb.'.buyer_id'); 
        $builder->join($this->status_tb,$this->status_tb.'.id='.$this->appointments_tb.'.status'); 
        if(isset($status))
         {
             $builder->where($this->appointments_tb.'.status', $status);
         }
         if($userType == 'buyer')
         {
            $builder->where($this->appointments_tb.'.buyer_id',$userId);
         } 
         if($userType == 'seller')
         {
            $builder->where($this->appointments_tb.'.seller_id',$userId);
         }  
        //echo $query = $builder->getCompiledSelect(); 
        //exit;
        $query = $builder->get();
        $data = array();
        if(is_array($query->getResultArray()))  
        {
           foreach($query->getResultArray() as $r)
          {
              $data[] = $r;  
          }  
          return $data; 
        }
            
    }


    function userActivity($userId)  
    {
         $builder = $this->db->table($this->user_detail_tb);
         $builder->select('activity');
         $builder->where($this->user_detail_tb.'.user_id',$userId); 
         $query = $builder->get();
         $count = count($query->getResultArray());
         if($count > 0)
         {
           foreach($query->getResultArray() as $r)
           {
              $data = $r['activity'];   
           }
           return $data;   
         }
    } 


    function leadSource()     
    { 
        $builder = $this->db->table($this->lead_source_tb);  
        $builder->select([$this->lead_source_tb.'.*',$this->status_tb.'.status_name',$this->status_tb.'.status_badge']); 
        $builder->join($this->status_tb,$this->status_tb.'.id ='.$this->lead_source_tb.'.status','left');
        $query = $builder->get();  
        foreach($query->getResultArray() as $r)
        {
            $data[] = $r;  
        }   
        return $data;     
    }

    function roleList($type,$status) 
    {
        $builder = $this->db->table($this->roles_tb);  
        $builder->select([$this->roles_tb.'.*',$this->status_tb.'.status_name',$this->status_tb.'.status_badge']); 
        $builder->join($this->status_tb,$this->status_tb.'.id ='.$this->roles_tb.'.status','left'); 
        if($type)
        {
          $builder->where($this->roles_tb.'.role_type',$type); 
        }
        if($status)
        {
          $builder->where($this->roles_tb.'.status',$status);  
        } 
        $query = $builder->get();  
        foreach($query->getResultArray() as $r)
        {
            $data[] = $r;  
        }   
        return $data;    
    }

    


    function userRatings()
    {
      
    }



}