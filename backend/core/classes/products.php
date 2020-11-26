<?php 
class Products{
    private $_db, $_sessionName,$_cookieName, $_isLoggedIn, $_data;

    public function __construct($product=null){

        $this->_db= DB::getInstance();

        if(!is_numeric($product)){
            $this->find($product);
        }

        if(is_numeric($product)){
            $this->avgRating($product);
        }
    }

    public function createRating($fields=array()){
        if(!$this->_db->insert('product_rating', $fields)){
            throw new Exception ('There was a problem creating the rating.');
            }
    }

    public function find($product=null){

        if($product){
            $field=(is_numeric($product)) ? 'ProductId' : 'ProductName';
            $data = $this->_db->get('product', array($field, '=', $product));
            if($data->count()) {
                $this->_data = $data->first();
                return true;
            }
        }
        return false;
    }

    public function avgRating($product=null){


        if($product){
            $field=(is_numeric($product)) ? 'Product' : 'Customer';

            $data = $this->_db->getAvgRating('ProductRating', 'product_rating', array($field, '=', $product));

            if(is_object($data) && $data->count()) {
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