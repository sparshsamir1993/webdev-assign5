<!DOCTYPE html>
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
        <?php 
             
            session_start();
            include("header.php");
            $cart = $_SESSION['cart'];
            $rows = "";
            $total = $cart['total'];
            foreach($cart as $key => $value){
                if($key != "total"){
                $template = "<tr>
                                <td>".$key."-".$value['name']."</td>
                                <td>".$value['quantity']."</td>
                                <td>".$value['quantity']*$value['price']."</td>
                            </tr>";

                $rows = $rows.$template;
                }

            }

        ?>
        <div class="container">
            <section class="cartInfo">
                <table>
                    <thead>
                        <th>Name</th>
                        <th>quantity</th>
                        <th>price</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php echo $rows ?>
                        <tr></tr>
                        <tr></tr>
                        <tr><td>Total</td><td></td><td><strong><?php echo $total ?></strong></td></tr>
                    </tbody>
                </table>
                
            </section>
        </div>
    </body>
</html>