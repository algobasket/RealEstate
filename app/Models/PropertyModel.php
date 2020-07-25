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
       protected $property_imgs_tb = '_property_images'; 
        

    function addProperty($data)
    {
       $builder = $this->db->table($this->properties_tb); 
       $builder->insert($data);
       return $this->db->insertID();
    }

    function addPropertyImages($data)  
    {
       $builder = $this->db->table($this->property_imgs_tb); 
       $builder->insert($data);
       return true; 
    }

    function getPropertyImages($id)  
    {    
         $data = array();
         $builder = $this->db->table($this->property_imgs_tb); 
         $builder->select('*');
         $builder->where('property_id',$id);
         $query = $builder->get(); 
         if(!empty($query->getResultArray()))
          {
             foreach($query->getResultArray() as $r)
               $data[] = $r;
             return $data;  
          } 
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

    function getAmenitiesByPropertyId($propertyId)  
    {
         $builder = $this->db->table($this->properties_tb);
         $builder->select('amenities');  
         $builder->where(['id' => $propertyId]);
         $query = $builder->get();

          foreach($query->getResultArray() as $r)
               $amenities = json_decode($r['amenities'],true);

          if(is_array($amenities))
          {
               $builder2 = $this->db->table($this->amenities_tb);
               $builder2->select('id,name');  
               $builder2->whereIn('id',$amenities); 
               $query2 = $builder2->get();
               foreach($query2->getResultArray() as $r2)
                     $data2[] = $r2;
                return $data2;   
          }     
    }

    function checkPropertyAccess($propertyId,$userId)
    {   
        $builder = $this->db->table($this->properties_tb);
        $builder->where([]); 
        $query = $builder->get(); 
        return $builder->countAll();
    }


   function getAllFeaturedProperties() 
   {      
         $builder = $this->db->table($this->properties_tb); 
         $builder->where(['status' =>1,'has_ads' => 1]);
         $query = $builder->get();
          if(!empty($query->getResultArray()))
          {
             foreach($query->getResultArray() as $r)
             {
               $r['images'] = $this->getPropertyImages($r['id']);
               $data[] = $r;
             }          
             return $data;  
          }
          
   }

   function getAllSponsoredProperties() 
   {
         $builder = $this->db->table($this->properties_tb); 
         $builder->where(['status' =>1,'has_ads' => 2]);
         $query = $builder->get();
          if(!empty($query->getResultArray()))
          {
             foreach($query->getResultArray() as $r)
               $r['images'] = $this->getPropertyImages($r['id']);
               $data[] = $r;
             return $data;  
          } 
   }


   function getPropertyDetail($propertyId)
   {
         $builder = $this->db->table($this->properties_tb); 
         $builder->where(['id' => $propertyId,'status' => 1]);  
         $query = $builder->get();
          if(!empty($query->getResultArray()))
          {
             foreach($query->getResultArray() as $r)
               $r['images'] = $this->getPropertyImages($r['id']);
               $r['amenitiesName'] = $this->getAmenitiesByPropertyId($r['id']);
               $data[] = $r;
             return $data;   
          } 
   }


   function searchProperty($array)
   {     
         $data = array();
         $builder = $this->db->table($this->properties_tb); 
         $builder->where($array);   
         $query = $builder->get();

         if( null !== $query->getResultArray())
          {   $i = 0;
             foreach($query->getResultArray() as $r)
             {
                $r['images'] = $this->getPropertyImages($r['id']);
                $data[] = $r;
             }
             return $data;  
          } 
   }     


    function saveUserSessLog($data)
    {
       $builder = $this->db->table($this->users_sess_logs_tb); 
       $builder->insert($data);
       return true; 
    }   


}