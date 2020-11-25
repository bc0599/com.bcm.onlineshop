<?php

require_once '../../backend/core/init.php';

$rating= DB::getInstance();
$rating->getRating('product_rating', array('Customer', '=' , '13' , 'Product' , '=' , '2'));

if(!$rating->count()){
    echo 'No rating for this product';
}else{

        echo $rating->first()->Product, '<br>';
    
}


