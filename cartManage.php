<?php 
    session_start();
    $cart = array();
    $userName = $_POST['userName'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $id = $_POST['itemId'];
    $type = $_POST['type'];
    $checkSess = $_GET['type'];
    $total = 0;
    if($type == "logout"){
        session_destroy();
        echo "success";
    }
    if($type == "login"){
        $_SESSION['uname'] = $userName;
        echo $userName;
    }
    if(isset($checkSess)){
        echo $_SESSION['uname'];
    }
    if(isset($_SESSION['cart'])){
       $cart = $_SESSION['cart']; 
       
       if($type == "add"){
           if(!isset($cart[$id])){
                $item = array();
                $item['price'] = $price;
                $item['name'] = $name;
                $item['id'] = $id;
                $item['quantity'] = 1;
                $total = $total + $price;
                $cart[$id] = $item;  
           }else{
                $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
           }
           $cart['total'] = $cart['total'] + $price;
           $_SESSION['cart'] = $cart;
           echo json_encode($cart);
       }
       else if($type=="minus") {
            if(!isset($cart[$id])){
                echo "error";
                return;
            }else if(isset($cart[$id])){
                $cart[$id]['quantity'] = $cart[$id]['quantity'] -1;
                if($cart[$id]['quantity'] == 0){
                    unset($cart[$id]);
                }
            }
            $cart['total'] = $cart['total'] - $price;
            $_SESSION['cart'] = $cart;
            echo json_encode($cart);

       }
       
    }
    else{
        if($type == "add"){
            $item = array();
            $item['price'] = $price;
            $item['name'] = $name;
            $item['id'] = $id;
            $item['quantity'] = 1;
            $total = $total + $price;
            $cart[$id] = $item;
            $cart['total'] = $total;
            echo json_encode($cart);
            $_SESSION['cart'] = $cart;
        }else if($type == "minus"){
            echo("error");
            // $item = array();
            // $item['price'] = $price;
            // $item['name'] = $name;
            // $item['id'] = $id;
            // $total = $total - $price;
            // echo json_encode($item);
            // $_SESSION['cart'] = $cart;
        }
        

    }

?>