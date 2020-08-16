<?php namespace App\Models;

use CodeIgniter\Model;

class StatisticModel extends Model
{
    protected $settings_tb = '_settings';
    protected $status = '_status';
    

    function userProfitByEachProperty($type)  
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

    function userTargetByEachProperty($type)  
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

    function userTotalProfit($type)  
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

    function userTotalTarget($type)  
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

   
}