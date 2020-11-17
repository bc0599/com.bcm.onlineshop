<?php

require_once '../../backend/core/init.php';

$product= new Products('Apple');

 echo $product->data()->ProductName;

