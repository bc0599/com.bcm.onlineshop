<?php 
class OrderItem{
    private $_db, $_sessionName,$_cookieName, $_isLoggedIn, $_data;

    public function __construct($order=null){

        $this->_db= DB::getInstance();

        if($order){
            $this->find($order);
        }
    }

    public function createOrderItems($fields=array()){
        if(!$this->_db->insert('orderitem', $fields)){
            throw new Exception ('There was a problem creating the order.');
            }
    }

    public function exists(){
        return (!empty($this->_data)) ? true : false;
    }

    public function data(){
        return $this->_data;
    }

    public function isLoggedIn(){
        return $this->_isLoggedIn;
    }

}