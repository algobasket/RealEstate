<?php namespace App\Models;

use CodeIgniter\Model;

class MessageModel extends Model
{
       protected $users_tb           = '_users';
       protected $user_detail_tb     = '_user_details';
       protected $users_sess_logs_tb = '_users_session_logs'; 
       protected $countries          = '_countries'; 
       protected $states             = '_states'; 
       protected $cities             = '_cities';  
       protected $properties_tb      = '_properties'; 
       protected $property_ty_tb     = '_property_type'; 
       protected $amenities_tb       = '_amenities'; 
       protected $property_ty_mp_tb  = '_property_type_map'; 
       protected $property_imgs_tb   = '_property_images'; 
       protected $property_fav_tb    = '_favourites'; 
       protected $property_interested_tb = '_interested';    
       protected $messages_tb            = '_messages';    
       protected $settings_tb            = '_settings';       
        

    
    function getChatUsers($userId)   
    {     
         $userPropertiesIds = $this->userPropertiesIds($userId);   
         $builder = $this->db->table($this->property_interested_tb);
         $builder->select('*');  
         $builder->join($this->users_tb,$this->users_tb.'.id = '.$this->property_interested_tb.'.user_id');
         $builder->join($this->user_detail_tb,$this->user_detail_tb.'.user_id = '.$this->property_interested_tb.'.user_id');
         $builder->join($this->properties_tb,$this->properties_tb.'.id = '.$this->property_interested_tb.'.property_id');
         $builder->whereIn($this->properties_tb.'.id',$userPropertiesIds); 
         $query = $builder->get();
          foreach($query->getResultArray() as $r)
                 $data[] = $r;
          return $data;    
    } 



    function userPropertiesIds($userId) 
    {
       $builder = $this->db->table($this->properties_tb); 
       $builder->where('user_id',$userId);  
       $query = $builder->get(); 
        if(!empty($query->getResultArray()))
        {
           foreach($query->getResultArray() as $r)
           { 
              $data[] = $r['id'];  
           }  
           return $data;   
        }  
    }

    function getMessages($propertyId,$fkUserId,$userId)
    {
       $builder = $this->db->table($this->messages_tb); 
       $builder->where(['property_id'=>$propertyId]);
       $builder->groupStart();  
            $builder->where(['from_user_id'=>$userId,'to_user_id'=>$fkUserId]);  
            $builder->orWhere(['from_user_id'=>$fkUserId,'to_user_id'=>$userId]);
       $builder->groupEnd();  
       $query = $builder->get();  
        if(!empty($query->getResultArray()))
        {
           foreach($query->getResultArray() as $r)
           { 
              $data[] = $r;  
           }  
           return $data;   
        }   
    } 


    function createMessage($propertyId,$fkUserId,$userId,$message)
    {
       $builder = $this->db->table($this->messages_tb); 
       $builder->insert([
        'property_id'  => $propertyId,
        'from_user_id' => $userId,
        'to_user_id'   => $fkUserId,
        'message'      => $message,
        'created_at '  => date('Y-m-d h:i:s'),
        'updated_at '  => date('Y-m-d h:i:s'),
        'status '      => 1 
      ]);
    }



    function getlocalTextApi()    
    { 
        $builder = $this->db->table($this->settings_tb);               
        $builder->where('setting_name','TextLocal');   
        $query = $builder->get();      
        if(!empty($query->getResultArray()))
        {
           foreach($query->getResultArray() as $r)
           { 
              $data = json_decode($r['setting_json'],true);      
           }  
           return $data;   
        }  
    } 


    public function localTextApi($to,$msg)       
    {
        $getlocalTextApi = $this->getlocalTextApi(); 
        //print_r($getlocalTextApi); 
        $apiKey = urlencode($getlocalTextApi['apikey']);
        // Message details
        $numbers = array($to); 
        $sender = urlencode($getlocalTextApi['sender']);     
        $message = rawurlencode($msg);
        $numbers = implode(',', $numbers);
        $data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender, 'message' => $message);
        // Send the POST request with cURL 
        $ch = curl_init('https://api.textlocal.in/send/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $array = json_decode($response,true); 
        //return $array['status'];  
        return $response;    
    }



    public function isOtpValid($userId,$otp)
    {
        $builder = $this->db->table($this->users_tb);               
        $builder->select('otp');   
        $builder->where('id',$userId);   
        $query = $builder->get();      
        if(!empty($query->getResultArray()))
        {
           foreach($query->getResultArray() as $r)
              $otp_s = $r['otp'];      
           if($otp_s == $otp)
           {
              return true;   
           }    
        }  
    } 

    public function sendEmail($from,$to,$cc,$bcc,$subject,$msg)
    {
        $email = \Config\Services::email(); 
        
        $smtpSettings = json_decode(getSettings('EmailSmtpSettings')[0]['setting_json'],true);
        
        $config['protocol'] = $smtpSettings['protocol'];
        $config['SMTPHost'] = $smtpSettings['smtpHost']; 
        $config['SMTPUser'] = $smtpSettings['smtpUser'];
        $config['SMTPPass'] = $smtpSettings['smtpPass']; 
        $config['SMTPPort'] = $smtpSettings['smtpPort'];
        $config['mailType'] = $smtpSettings['mailType'];             
    
        $email->initialize($config);    

        $email->setFrom($smtpSettings['smtpUser'],$from['name']); 
        $email->setTo($to);  
        if(isset($cc)){ 
          $email->setCC($cc);   
        }
        if(isset($bcc)){
          $email->setBCC($bcc); 
        }
        $email->setSubject($subject);
        $email->setMessage($msg); 
        if($email->send())
        {
          return true;  
        }
    }     


}