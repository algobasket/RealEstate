<?php namespace App\Models;

use CodeIgniter\Model;

class StatisticModel extends Model
{
    protected $settings_tb = '_settings';
    protected $status = '_status';
    

    function profitByEachPropertyByUser($userId)    
    {
         $PropertyModel = model('PropertyModel');
         $properties = $PropertyModel->getPropertiesByUserId($userId);
         $data = array();
         if(is_array($properties))
         {
           foreach($properties as $property){
             if($property['listing_type'] == "sell")
             {
                 $profit = $property['total_price'] - $property['old_total_price'];
             }
             if($property['listing_type'] == "rent") 
             {
                 $profit  = $property['rent_per_mon'] - $property['old_total_price'];  
             }
             $property['profit'] = $profit;
             $data[] = $property;
           }
           return $data;
         }
    }

    function targetAmountByEachPropertyByUser($type)  
    {
         // $builder = $this->db->table($this->settings_tb);
         // $builder->select([$this->settings_tb.'.*',$this->status.'.status_name',$this->status.'.status_badge']);
         // $builder->join($this->status,$this->status.'.id='.$this->settings_tb.'.status','left');
         // $builder->whereIn($this->settings_tb.'.setting_type',$type);
         // $query = $builder->get();
         //  foreach($query->getResultArray() as $r) 
         //       $data[] = $r; 
         //  return $data;
         return 10000000;  
    }

    function totalProfitByUser($type)  
    {
         $builder = $this->db->table($this->settings_tb);
         $builder->select([$this->settings_tb.'.*',$this->status.'.status_name',$this->status.'.status_badge']);
         $builder->join($this->status,$this->status.'.id='.$this->settings_tb.'.status','left');
         $builder->whereIn($this->settings_tb.'.setting_type',$type);
         $query = $builder->get();
          foreach($query->getResultArray() as $r) 
               $data[] = $r; 
          return $data;  
    }

   
    function totalActualAmountByUser($userId)      
    {
         $PropertyModel = model('PropertyModel');
         return $PropertyModel->totalSalesAmountByUser($userId);
    }


    function totalTargetAmountByUser($userId)    
    { 
         $PropertyModel = model('PropertyModel');
         $properties = $PropertyModel->getPropertiesByUserId($userId);
         $data = array();
         if(is_array($properties))
         {
           foreach($properties as $property){
             if($property['listing_type'] == "sell")
             {
                 $target = $property['total_price'];
             }
             if($property['listing_type'] == "rent") 
             {
                 $target  = $property['rent_per_mon'];  
             }
             $data[] = $target;
           }
            $total =  array_sum($data);
         }
         return @$total; 
    }

   
}