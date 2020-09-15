<?php
$current_uri = $_SERVER['REQUEST_URI'];
?>

<div _ngcontent-stv-c2="" class="container">
    <div _ngcontent-stv-c2="" class="row">
        <nav _ngcontent-stv-c2="" class="navbar navbar-expand-lg navbar-light bg-white py-0  d-none d-lg-flex ">
            <div _ngcontent-stv-c2="" class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul _ngcontent-stv-c2="" class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li _ngcontent-stv-c2="" class="nav-item <?= $current_uri=='/pizzahut/deals.php' ? 'active':'' ?>" data-target=".navbar-collapse.show" data-toggle="collapse"><a _ngcontent-stv-c2="" class="nav-link active" routerlink="deals.php" href="deals.php">Deals <span _ngcontent-stv-c2="" class="sr-only">(current)</span></a></li>
                    <li _ngcontent-stv-c2="" class="nav-item <?= $current_uri=='/pizzahut/pizzas.php' ? 'active':'' ?>" data-target=".navbar-collapse.show" data-toggle="collapse"><a _ngcontent-stv-c2="" class="nav-link" routerlink="pizzas.php" href="pizzas.php">Pizzas</a></li>
                    <li _ngcontent-stv-c2="" class="nav-item <?= $current_uri=='/pizzahut/sides.php' ? 'active':'' ?>" data-target=".navbar-collapse.show" data-toggle="collapse"><a _ngcontent-stv-c2="" class="nav-link" routerlink="sides.php" href="sides.php">Sides</a></li>
                    <li _ngcontent-stv-c2="" class="nav-item <?= $current_uri=='/pizzahut/desserts.php' ? 'active':'' ?>" data-target=".navbar-collapse.show" data-toggle="collapse"><a _ngcontent-stv-c2="" class="nav-link" routerlink="desserts.php" href="desserts.php">Desserts</a></li>
                    <li _ngcontent-stv-c2="" class="nav-item <?= $current_uri=='/pizzahut/drinks.php' ? 'active':'' ?>" data-target=".navbar-collapse.show" data-toggle="collapse"><a _ngcontent-stv-c2="" class="nav-link" routerlink="drinks.php" href="drinks.php">Drinks</a></li></ul></div></nav></div></div>
