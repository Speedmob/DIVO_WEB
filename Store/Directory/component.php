<?php
    // create a function that holds the container which has all information of each product
    function Component($productname ,$productprice,$product_img){
        $element='
            <div>
                <form action=\"Store_Cart.php\" method=\"POST\">    
                <div class=\"box\">
                    <img src=\"$product_img\">
                    <h2>$productname</h2>
                    <p>Lorem ipsum, dolor amet  consect etur adipisicing sit elit.</p>
                    <span>$productprice</span>
                    <div class=\"rate\">
                        <i class=\"filled fas fa-star\"></i>
                        <i class=\"filled fas fa-star\"></i>
                        <i class=\"filled fas fa-star\"></i>
                        <i class=\"filled fas fa-star\"></i>
                        <i class=\"fa-regular fa-star\"></i>
                    </div>
                    <div class=\"options\">
                        <!-- <a href=\"#\">Buy It Now</a> -->
                        <button type=\"submit\" class=\"add\">Add to Cart
                            <i class=\"fa-solid fa-cart-shopping\"></i>
                        </button>
                    </div>
                </div>
                </form>
            </div>    
    ';                   
  echo $element;
    }

?>