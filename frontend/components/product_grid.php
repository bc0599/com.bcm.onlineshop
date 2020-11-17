<?php

require_once '../../backend/core/init.php';

$product_apple= new Products('Apple');
$product_beer= new Products('Beer');
$product_water= new Products('Water');
$product_cheese= new Products('Cheese');
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
        case 'inc':
          document.getElementById('inc').value = ++i;
        break;
        
        case 'inc1':
          document.getElementById('inc1').value = ++j;
        break;

        case 'inc2':
          document.getElementById('inc2').value = ++k;
        break;

        case 'inc3':
          document.getElementById('inc3').value = ++m;
        break;
    }

    }

</script>

<script type="text/javascript">

function getProducts(){
      var apple_quan = document.getElementById("inc").value;
          apple_total=apple_quan * 0.30;
          console.log(apple_total)

      var beer_quan = document.getElementById("inc1").value;
          beer_total=beer_quan * 2.00;
          console.log(beer_total)

      var water_quan = document.getElementById("inc2").value;
          water_total=water_quan * 1.00;
          console.log(water_total)

      var cheese_quan = document.getElementById("inc3").value;
          cheese_total=cheese_quan * 3.74;
          console.log(cheese_total)

      var total_amount= apple_total+beer_total+water_total+cheese_total;
      console.log(total_amount)
    }
</script>

<div class="container">
   <div class="card shopping-cart">
            <div class="card-header bg-danger text-light">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                Products
                <div class="clearfix"></div>
            </div>
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
                                    <input type="button" onclick="increment('inc')" value="+" class="plus">
                                    <input type="number" id="inc" step="1" max="99" min="1" value="1" title="Qty" class="qty"
                                           size="4">
                                    <input type="button" value="-" class="minus">
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
                                    <input type="button" onclick="increment('inc1')" value="+" class="plus" >
                                    <input type="number" id="inc1" step="1" max="99" min="1" value="1" title="Qty" class="qty"
                                           size="4">
                                    <input type="button" value="-" class="minus">
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
                                    <input type="button" onclick="increment('inc2')" value="+" class="plus">
                                    <input type="number" id="inc2" step="1" max="99" min="1" value="1" title="Qty" class="qty"
                                           size="4">
                                    <input type="button" value="-" class="minus">
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
                                    <input type="button" onclick="increment('inc3')" value="+" class="plus">
                                    <input type="number" id="inc3" step="1" max="99" min="1" value="1" title="Qty" class="qty"
                                           size="4">
                                    <input type="button" value="-" class="minus">
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
            </div>
            <div class="card-footer">
                <div class="pull-right" style="margin: 10px">
                <button type="button" onclick="getProducts()" class="btn btn-success pull-right">Checkout</button>
                    <div class="pull-right" style="margin: 5px">
                        Total price: <b>50.00€</b>
                    </div>
                </div>
            </div>
        </div>
</div>