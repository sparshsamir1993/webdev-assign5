<?php

    $name = $_SESSION["uname"];
?>
<nav>
    <div class="navbar">
        <a class="nav-brand" href="index.php">
            Our Shop
            
        </a>
        <?php if(isset($name)) {?>
            <a class="nav-link" href="page1.php">
                Bikes
            </a>
            <a class="nav-link" href="page2.php">
                Cars
            </a>
            <a class="nav-link" href="page3.php">
                Houses
            </a>
            <a class="nav-link logout" >
                logout
            </a>
            <a class="nav-link cart-total" href="cartPage.php">
                <?php 
                    if(isset($_SESSION['cart'])){

                        echo $_SESSION['cart']['total'];
                    }
                ?>CAD
            </a>
            <a class="nav-link" >
                <?php echo $name ?>
            </a>
        <?php }  ?>
    </div>
</nav>