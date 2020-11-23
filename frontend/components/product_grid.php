<?php

require_once '../../backend/core/init.php';

$product_apple= new Products('Apple');
$product_beer= new Products('Beer');
$product_water= new Products('Water');
$product_cheese= new Products('Cheese');
$order= new Order();
$order_item= new OrderItem();
$user=new User();

if(isset($_POST['confirmCheckout'])){   
    
try{

$unique = date("Ymd") . rand() . $user->data()->CustomerId . $product_apple->data()->ProductId;

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
    

    }else{
        echo "<script type='text/javascript'>
        $(document).ready(function(){
            $('#notMoney').modal('show');
        });
        </script>";
    }

}catch(Exception $e){
    die($e->getMessage());
}
}
?>

<head><link rel="stylesheet" href="https:cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"></head>
<link rel="stylesheet" type="text/css" href="../styles/cart_styles.css">

<script src="https:use.fontawesome.com/c560c025cf.js"></script>

<script type="text/javascript">
    var i = 0;
    var j = 0;
    var k = 0;
    var m = 0;
    var b = 0;

    function buttonAction(string) {
      switch(string) {

        case 'delivery':

            document.getElementById('TotalAmount').value = (Number(document.getElementById('TotalAmount').value)+ Number(5)).toFixed(2);
            $("#exampleModal").modal("show");

        break;

        case 'confirm':

        $('#thankYou').modal('show');

        break;

        case 'pickup':

            $("#exampleModal").modal("show");

        break;

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

<div class="container">
   <div class="card shopping-cart">
            <div class="card-header bg-danger text-light">
            <div class="h-25 d-inline-block">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                Products
            </div>
            <div class="h-25 pull-right d-inline-block">
                <p class="text-right font-weight-bold"> Balance: <?php echo escape ($user->data()->Balance);?> </p>
                </div>
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
                                    <input type="button" onclick="buttonAction('Apple')" value="+" class="plus">
                                    <input type="number" style="cursor: default;" readonly id="Apple" name="Apple" step="1" max="99" min="0"  title="Qty" class="qty"
                                           size="4">
                                    <input type="button" onclick="decrement('Apple')" value="-" class="minus">
                                </div>
                            </div>

                            <div class="rating margin-left pull-right">
                                <input type="button" name="rating" value="5" id="5"><label for="5">☆</label>
                                <input type="button" name="rating" value="4" id="4"><label for="4">☆</label> 
                                <input type="button" name="rating" value="3" id="3"><label for="3">☆</label>
                                <input type="button" name="rating" value="2" id="2"><label for="2">☆</label> 
                                <input type="button" name="rating" value="1" id="1"><label for="1">☆</label>
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
                                    <input type="button" onclick="buttonAction('Beer')" value="+" class="plus" >
                                    <input type="number" style="cursor: default;" readonly id="Beer" name="Beer" step="1" max="99" min="0"  title="Qty" class="qty"
                                           size="4">
                                    <input type="button" onclick="decrement('Beer')" value="-" class="minus">
                                </div>
                            </div>

                            <div class="rating margin-left pull-right">
                                <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> 
                                <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> 
                                <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
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
                                    <input type="button" onclick="buttonAction('Water')" value="+" class="plus">
                                    <input type="number" style="cursor: default;" readonly id="Water" name="Water" step="1" max="99" min="0"  title="Qty" class="qty"
                                           size="4">
                                    <input type="button" onclick="decrement('Water')" value="-" class="minus">
                                </div>
                            </div>

                            <div class="rating margin-left pull-right">
                                <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> 
                                <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> 
                                <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
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
                                    <input type="button" onclick="buttonAction('Cheese')" value="+" class="plus">
                                    <input type="number" style="cursor: default;" readonly id="Cheese" name="Cheese" step="1" max="99" min="0"  title="Qty" class="qty"
                                           size="4">
                                    <input type="button" onclick="decrement('Cheese')" value="-" class="minus">
                                </div>
                            </div>


                <div class="rating margin-left pull-right">
                    <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                    <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> 
                    <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                    <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> 
                    <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                </div>
                    
                        </div>
                        
                    </div>
                    <hr>
                    <!-- END PRODUCT -->

            <div class="card-footer">
                <div class="pull-right" style="margin: 10px">
                <input type="button" name="checkout" data-toggle="modal" data-target="#deliveryMethod" class="btn btn-success pull-right" value="Checkout"></input>
                    <div class="pull-right" style="margin: 5px">
                        Total price: <b><input type="number" style="cursor: default;" readonly id="TotalAmount" name="TotalAmount" size="4"></b>
                    </div>
                </div>
            </div>
            </div>
            </div>

    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"  id="exampleModalLabel">Are you sure?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" onclick="buttonAction('confirm')" data-dismiss="modal" name="confirmCheckout" class="btn btn-danger">Checkout</button>
        </div>
        </div>
    </div>
    </div>  

    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="notMoney" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">You do not have enough money</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div> 

        <div class="modal fade" id="thankYou" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
                     </div>
                    <div class="modal-body">
						<div class="thank-you-pop">
							<img src="http://goactionstations.co.uk/wp-content/uploads/2017/03/Green-Round-Tick.png" alt="">
							<h1>Thank You!</h1>
							<p>Your order has been received and we will contact you soon</p>
							<h3 class="cupon-pop">Your Id: <span><?php echo escape($user->data()->CustomerId);?></span></h3>
 						</div>
                    </div>
                </div>
            </div>
        </div>


    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="deliveryMethod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Please choose a retirement method for your order.</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" onclick="buttonAction('delivery')" data-dismiss="modal" name="delivery"  class="btn btn-danger">Delivery (+1$)</button>
            <button type="button" onclick="buttonAction('pickup')" data-dismiss="modal" name="pickup" class="btn btn-danger">Pick-Up (FREE)</button>
        </div>
        </div>
    </div>
    </div>

        </form>

        </div>
</div>
