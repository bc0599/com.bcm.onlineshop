<?php 
class Order{
    private $_db, $_sessionName,$_cookieName, $_isLoggedIn, $_data;

    public function __construct($order=null){

        $this->_db= DB::getInstance();

        if($order){
            $this->find($order);
        }
    }

    public function create($fields=array()){
        if(!$this->_db->insert('customer_order', $fields)){
            throw new Exception ('There was a problem creating the order.');
            }
    }

    public function createOrderItems($fields=array()){
        if(!$this->_db->insert('orderitem', $fields)){
            throw new Exception ('There was a problem creating the order.');
            }
    }

    public function find($order=null){
        if($order){
            $field=(is_numeric($order)) ? 'CustomerId' : 'OrderId';
            $data = $this->_db->get('customer_order', array($field, '=', $order));
            if($data->count()) {
                $this->_data = $data->first();
                return true;
            }
        }
        return false;
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