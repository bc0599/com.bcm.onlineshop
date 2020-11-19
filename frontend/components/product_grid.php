<?php

require_once '../../backend/core/init.php';

$product_apple= new Products('Apple');
$product_beer= new Products('Beer');
$product_water= new Products('Water');
$product_cheese= new Products('Cheese');
$order_item= new Order();
$order_item= new Order();
$user=new User();

if(isset($_POST['checkout'])){

    $today = date("Ymd");
    $rand= rand();
    $unique = $today . $rand . $user->data()->CustomerId . $product_apple->data()->ProductId;
    
try{
    $order->create(array(
        'OrderId' => $unique,
        'CustomerId'=> $user->data()->CustomerId,
        'TotalAmount'=> $_POST['TotalAmount']
    ));

    if($_POST['Apple']>0){
        $order_item->createOrderItems(array(
            'OrderId'=> $unique,
            'ProductId' => $product_apple->data()->ProductId,
            'Quantity' => $_POST['Apple'],
            'UnitPrice' => 0.30
        ));
    }
    
    if($_POST['Beer']>0){
        $order_item->createOrderItems(array(
            'OrderId'=> $unique,
            'ProductId' => $product_beer->data()->ProductId,
            'Quantity' => $_POST['Beer'],
            'UnitPrice' => 2.00
        ));
    }
    
    if($_POST['Water']>0){
        $order_item->createOrderItems(array(
            'OrderId'=> $unique,
            'ProductId' => $product_water->data()->ProductId,
            'Quantity' => $_POST['Water'],
            'UnitPrice' => 1.00
        ));
    }

    if($user->data()->Balance > $_POST['TotalAmount']){

    $user->update(array(
        'Balance' => $user->data()->Balance - $_POST['TotalAmount']
    ));
     echo $user->data()->Balance;

    }else{
        echo 'Not enough money';
    }

}catch(Exception $e){
    die($e->getMessage());
}

}

?>

<head><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"></head>
<link rel="stylesheet" type="text/css" href="../styles/cart_styles.css">

<script src="https://use.fontawesome.com/c560c025cf.js"></script>

<script type="text/javascript">
    var i = 0;
    var j = 0;
    var k = 0;
    var m = 0;

    function increment(string) {
      switch(string) {

        case 'Apple':

        if(document.getElementById('Apple').value < 99){

          document.getElementById('Apple').value = ++i;
          document.getElementById('TotalAmount').value = (Number(document.getElementById('TotalAmount').value)+ Number(0.3)).toFixed(2);
        }
        break;
        
        case 'Beer':

        if(document.getElementById('Beer').value < 99){

          document.getElementById('Beer').value = ++j;
          document.getElementById('TotalAmount').value = (Number(document.getElementById('TotalAmount').value)+ Number(2.00)).toFixed(2);
        }
        break;

        case 'Water':

        if(document.getElementById('Water').value < 99){

          document.getElementById('Water').value = ++k;
          document.getElementById('TotalAmount').value = (Number(document.getElementById('TotalAmount').value)+ Number(1.00)).toFixed(2);
        }
        break;

        case 'Cheese':

        if(document.getElementById('Cheese').value < 99){

          document.getElementById('Cheese').value = ++m;
          document.getElementById('TotalAmount').value = (Number(document.getElementById('TotalAmount').value)+ Number(3.74)).toFixed(2);
        }
        break;
    }

    }

</script>

<script type="text/javascript">
    var i = 0;
    var j = 0;
    var k = 0;
    var m = 0;

    function decrement(string) {
      switch(string) {
          
        case 'Apple':

        if(document.getElementById('Apple').value > 0){

          document.getElementById('Apple').value = --i;
          console.log(document.getElementById('Apple').value);
          document.getElementById('TotalAmount').value = (Number(document.getElementById('TotalAmount').value)- Number(0.30)).toFixed(2);

        }
        break;
        
        case 'Beer':

        if(document.getElementById('Beer').value > 0){
         
          document.getElementById('Beer').value = --j;
         
          document.getElementById('TotalAmount').value = (Number(document.getElementById('TotalAmount').value)- Number(2.00)).toFixed(2);
        }
        break;

        case 'Water':

        if(document.getElementById('Water').value > 0){

          document.getElementById('Water').value = --k;
          document.getElementById('TotalAmount').value = (Number(document.getElementById('TotalAmount').value)- Number(1.00)).toFixed(2);
        
        }
        break;

        case 'Cheese':

        if(document.getElementById('Cheese').value > 0){

          document.getElementById('Cheese').value = --m;
          document.getElementById('TotalAmount').value = (Number(document.getElementById('TotalAmount').value)- Number(3.74)).toFixed(2);
        
        }
        break;
    }

    }

</script>

<script type="text/javascript">

function getProducts(){
      
      var apple_quan = document.getElementById("Apple").value;
          apple_total=apple_quan * 0.30;

      var beer_quan = document.getElementById("Beer").value;
          beer_total=beer_quan * 2.00;

      var water_quan = document.getElementById("Water").value;
          water_total=water_quan * 1.00;

      var cheese_quan = document.getElementById("Cheese").value;
          cheese_total=cheese_quan * 3.74;

      var total_amount= apple_total+beer_total+water_total+cheese_total;

      document.getElementById("TotalAmount").value= total_amount;
    }
</script>

<div class="container">
   <div class="card shopping-cart">
            <div class="card-header bg-danger text-light">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                Products
                <div class="clearfix"></div>
            </div>

            <form action="" method="post">
            <div class="input-group form-group">

            <div class="card-body">

                    <!-- PRODUCT -->
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-2 text-center">
                                <img class="img-responsive" src="../img/apple.jpg" alt="prewiew" width="120" height="80">
                        </div>
                        <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                            <h4 class="product-name"><strong><?php echo escape($product_apple->data()->ProductName); ?></strong></h4>
                            <h4>
                                <small>The apple is a pome (fleshy) fruit, in which the ripened ovary and surrounding tissue both become fleshy and edible.</small>
                            </h4>
                        </div>
                        <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                            <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                                <h6><strong> <?php echo escape($product_apple->data()->ProductPrice);?><span class="text-muted"> x</span></strong></h6>
                            </div>
                            <div class="col-4 col-sm-4 col-md-4">
                                <div class="quantity">
                                    <input type="button" onclick="increment('Apple')" value="+" class="plus">
                                    <input type="number" style="cursor: default;" readonly id="Apple" name="Apple" step="1" max="99" min="0" value="0" title="Qty" class="qty"
                                           size="4">
                                    <input type="button" onclick="decrement('Apple')" value="-" class="minus">
                                </div>
                            </div>
                            <div class="col-2 col-sm-2 col-md-2 text-right">
                                <button type="button" class="btn btn-outline-danger btn-xs">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- END PRODUCT -->

                    <!-- PRODUCT -->
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-2 text-center">
                                <img class="img-responsive" src="../img/beer.jpg" alt="prewiew" width="120" height="80">
                        </div>
                        <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                            <h4 class="product-name"><strong><?php echo escape($product_beer->data()->ProductName); ?></strong></h4>
                            <h4>
                                <small>An alcoholic beverage, made from malted cereal grain, flavored with hops, and brewed by slow fermentation.</small>
                            </h4>
                        </div>
                        <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                            <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                                <h6><strong><?php echo escape($product_beer->data()->ProductPrice); ?><span class="text-muted">x</span></strong></h6>
                            </div>
                            <div class="col-4 col-sm-4 col-md-4">
                                <div class="quantity">
                                    <input type="button" onclick="increment('Beer')" value="+" class="plus" >
                                    <input type="number" style="cursor: default;" readonly id="Beer" name="Beer" step="1" max="99" min="0" value="0" title="Qty" class="qty"
                                           size="4">
                                    <input type="button" onclick="decrement('Beer')" value="-" class="minus">
                                </div>
                            </div>
                            <div class="col-2 col-sm-2 col-md-2 text-right">
                                <button type="button" class="btn btn-outline-danger btn-xs">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- END PRODUCT -->
                  
                    <!-- PRODUCT -->
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-2 text-center">
                                <img class="img-responsive" src="../img/water.jpg" alt="prewiew" width="120" height="80">
                        </div>
                        <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                            <h4 class="product-name"><strong><?php echo escape($product_water->data()->ProductName); ?></strong></h4>
                            <h4>
                                <small>Drinking water (e.g., well water, distilled water, mineral water, or spring water) packaged in plastic or glass water bottles.</small>
                            </h4>
                        </div>
                        <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                            <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                                <h6><strong><?php echo escape($product_water->data()->ProductPrice); ?> <span class="text-muted">x</span></strong></h6>
                            </div>
                            <div class="col-4 col-sm-4 col-md-4">
                                <div class="quantity">
                                    <input type="button" onclick="increment('Water')" value="+" class="plus">
                                    <input type="number" style="cursor: default;" readonly id="Water" name="Water" step="1" max="99" min="0" value="0" title="Qty" class="qty"
                                           size="4">
                                    <input type="button" onclick="decrement('Water')" value="-" class="minus">
                                </div>
                            </div>
                            <div class="col-2 col-sm-2 col-md-2 text-right">
                                <button type="button" class="btn btn-outline-danger btn-xs">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- END PRODUCT -->

                    <!-- PRODUCT -->
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-2 text-center">
                                <img class="img-responsive" src="../img/cheese.jpg" alt="prewiew" width="120" height="80">
                        </div>
                        <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                            <h4 class="product-name"><strong><?php echo escape($product_cheese->data()->ProductName); ?></strong></h4>
                            <h4>
                                <small>Dairy product, derived from milk and produced in wide ranges of flavors, textures and forms by coagulation of the milk protein casein.</small>
                            </h4>
                        </div>
                        <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                            <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                                <h6><strong><?php echo escape($product_cheese->data()->ProductPrice); ?> <span class="text-muted">x</span></strong></h6>
                            </div>
                            <div class="col-4 col-sm-4 col-md-4">
                                <div class="quantity">
                                    <input type="button" onclick="increment('Cheese')" value="+" class="plus">
                                    <input type="number" style="cursor: default;" readonly id="Cheese" name="Cheese" step="1" max="99" min="0" value="0" title="Qty" class="qty"
                                           size="4">
                                    <input type="button" onclick="decrement('Cheese')" value="-" class="minus">
                                </div>
                            </div>
                            <div class="col-2 col-sm-2 col-md-2 text-right">
                                <button type="button" class="btn btn-outline-danger btn-xs">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- END PRODUCT -->

            <div class="card-footer">
                <div class="pull-right" style="margin: 10px">
                <input type="submit" name="checkout" onclick="getProducts()" class="btn btn-success pull-right" value="Checkout"></input>
                    <div class="pull-right" style="margin: 5px">
                        Total price: <b><input type="number" style="cursor: default;" readonly id="TotalAmount" name="TotalAmount" size="4"></b>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </form>

        </div>
</div>
