<?php
class User{
    private $_db, $_sessionName, $_isLoggedIn, $_data;

    public function __construct($user=null){

        $this->_db= DB::getInstance();
        $this->_sessionName= Config::get('session/session_name');

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
            $field=(is_numeric($user)) ? 'CustomerId' : 'CustomerId';
            $data = $this->_db->get('customer', array($field, '=', $user));
            echo gettype($data);
            if($data->count()) {
                $this->_data = $data->first();
                return true;
            }
        }
        return false;
    }

    public function login($username=null, $password=null){
        
        $user=$this->find($username);
        if($user){
            if($this->data()->password=$password){
                Session::put($this->_sessionName, $this->data()->CustomerId);
                return true;
            }

        }
        return false;
    }

    public function data(){
        return $this->_data;
    }

    public function isLoggedIn(){
        return $this->_isLoggedIn;
    }
}