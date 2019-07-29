<!DOCTYPE html>
<?php 
    session_start();
    $name = $_GET['name'];
    $_SESSION["userName"] = $name;

    // echo print($_SESSION["userName"]);
    $accessKey="d7106a4e23601280fe55916f3287ea92ca48bb96f168857c12151ffb37171a98";
    $unsplashApiUrl = "https://api.unsplash.com/search/photos/?client_id=".$accessKey."&query=house";
    $jsonString = file_get_contents($unsplashApiUrl);
    $json = json_decode($jsonString, true);
    $results = $json['results'];
    $cards = "";
    $counter = 0;
    
    $cart = $_SESSION['cart'];
    foreach($results as $result){
        $url = $result['urls']['regular'];
        $name = $result["sponsored_by"]["name"];
        $id = "house".$counter;
        $quantity = 0;
        $counter++;
        if(!isset($name)){
            $name = "Bajaj";
        }
        $price = rand(15,35);
        if(isset($cart)){
            if(isset($cart[$id])){
                $name = $cart[$id]['name'];
                $price = $cart[$id]['price'];
                $quantity = $cart[$id]['quantity'];
            }
        }

        $template = '<div class="card">
                        <div class="img-wrap" style="background-image: url('.$url.'">
                        </div>
                        <div class="content">
                            <div><h3>Price: &nbsp; &nbsp; &nbsp;<span id="price">'.$price.'</span>CAD</h3></div>
                            <div><h3>Name: &nbsp; &nbsp; &nbsp;<span id="name" style="float: right;">'.$name.'</span></h3></div>
                            <div id="itemId" style="display:none;" >'.$id.'</div>
                            <hr>
                            <div class="quantity-btns">
                                <div class="qbtn minus"><i class="fa fa-minus"></i></div>
                                <div class="qbtn number">'.$quantity.'</div>
                                <div class="qbtn add"><i class="fa fa-plus"></i></div>
                            </div>
                        </div>
                    </div>';
        $cards = $cards.$template;
    }
    // echo print_r($json['results']);
?>
<html>
    <head>
        <title>Assignment 5</title>
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <script type="text/javascript" src="js/index.js"></script>
    </head>
    <body>
        <?php include("header.php"); ?>
        <div class="container">
            <section class="bikes">
                <div class="card-wrap">
                    <?php echo $cards ?>
                </div>
            </section>
        </div>
    </body>
</html>