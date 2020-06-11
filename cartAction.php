<?php
// initialize shopping cart class
include 'Cart-back.php';
$cart = new Cart;
global $db;
// include database configuration file
include 'connect_to_mysql.php';
if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){


    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){
        $productID = $_REQUEST['id'];
		
        // get product details
        $query ="SELECT * FROM products WHERE ProductID = ".$productID;
		$result = $conn->query($query);
        $row = $result->fetch_assoc(); 
       
        $itemData = array(
            'id' => $row['ProductID'],
            'name' => $row['ProductName'],
            'price' => $row['ProductPrice'],
            'qty' => 1
        );

        $insertItem = $cart->insert($itemData);
       
        exit(header("Location:cart.php"));
	}elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){
        $itemData = array(
            'rowid' => $_REQUEST['id'],
            'qty' => $_REQUEST['qty']
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem?'ok':'err';die;
    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){
        $deleteItem = $cart->remove($_REQUEST['id']);
        header("Location: cart.php");
    }elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0){
        // insert order details into database
        $insertOrder ="INSERT INTO orders (customer_id, total_price, created, modified) VALUES ('".$_SESSION['sessCustomerID']."', '".$cart->total()."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')";
        $final = $conn->query($insertOrder);
        if($final){
            $orderID = $db->insert_id;
            $finalresult = '';
            // get cart items
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
                $finalresult= "INSERT INTO order_items (order_id, product_id, quantity) VALUES ('".$orderID."', '".$item['id']."', '".$item['qty']."')";
				echo $orderID;
            }
            // insert order items into database
           
            $output = $conn->query($finalresult);
            if($output){
                $cart->destroy();
                header("Location: orderSuccess.php");
            }else{
                header("Location: Checkout-back.php");
            }
        }else{
            header("Location: Checkout-back.php");
        }
    
	}else{
        header("Location: product_detail.php");
    }
}else{
    header("Location: product_detail.php");
}
?>