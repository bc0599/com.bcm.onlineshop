<?php
class User{
    private $_db, $_sessionName,$_cookieName, $_isLoggedIn, $_data;

    public function __construct($user=null){

        $this->_db= DB::getInstance();
        $this->_sessionName= Config::get('session/session_name');
        $this->_cookieName= Config::get('remember/cookie_name');

        if(!$user){
            if(Session::exists($this->_sessionName)){
                $user= Session::get($this->_sessionName);
                
                if($this->find($user)){
                    $this->_isLoggedIn=true;
                }else{
                    //logout
                }   
        }
    }else{
            $this->find($user);
    }
}

    public function create($fields=array()){
        if(!$this->_db->insert('customer', $fields)){
            throw new Exception ('There was a problem creating the user.');
            }
    }

    public function find($user=null){
        if($user){
            $field=(is_numeric($user)) ? 'CustomerId' : 'Username';
            $data = $this->_db->get('customer', array($field, '=', $user));
            if($data->count()) {
                $this->_data = $data->first();
                return true;
            }
        }
        return false;
    }

    public function login($username=null, $password=null, $remember=false){
        
        if(!$username && !$password && $this->exists()){
            Session::put($this->_sessionName, $this->data()->CustomerId);
        }else{
            $user=$this->find($username);

        if($user){
            if($this->data()->password=$password){
                Session::put($this->_sessionName, $this->data()->CustomerId);
               
                if($remember){

                    $hash= Hash::unique();
                    $hashCheck=$this->_db->get('customer_session', array('CustomerId' , '=', $this->data()->CustomerId));
                    
                    if(!$hashCheck->count()){
                        
                        $this->_db->insert('customer_session', array(
                            'CustomerId' => $this->data()->CustomerId,
                            'Hash'=> $hash
                        ));
                    }
                    else{
                        $hash= $hashCheck->first()->hash;
                    }

                    Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));

                }
                return true;
            }
        }

    }
        return false;
    }

    public function exists(){
        return (!empty($this->_data)) ? true : false;
    }

    public function logout(){
        $this->_db->delete('customer_session', array('CustomerId', '=', $this->data()->CustomerId));

        Session::delete($this->_sessionName);
        Cookie::delete($this->_cookieName);
    }

    public function data(){
        return $this->_data;
    }

    public function isLoggedIn(){
        return $this->_isLoggedIn;
    }
}