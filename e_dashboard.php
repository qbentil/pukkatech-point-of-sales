<?php 
    include_once "./public_html/includes/actions.php";
    logout();
    backup();
    session_start();
        if($_SESSION['logedIn'] != session_id()){
            header("location: index.php");
        }elseif ($_SESSION['user_type'] == "Admin") {
            header("location: dashboard.php");
        }
        require "./public_html/includes/head.php";
        require "./public_html/employee/sidenav.php";
        // logout();
    ?>


    <div class="content-wrapper">
        <div class="container-fluid">
            <?php
                if(!isset($_GET["view_sales"])){
                if(!isset($_GET["view_orders"])){
                if(!isset($_GET["view_products"])){
                if(!isset($_GET["view_brands"])){
                if(!isset($_GET["manage_edit_profile"])){
                if(!isset($_GET["pukka"])){
                if(!isset($_GET["view_out_of_stock"])){
                if(!isset($_GET["view_categories"])){
                if(!isset($_GET["all_products"])){
                if(!isset($_GET["change_password"])){
                if(!isset($_GET["make_sales"])){
                if(!isset($_GET["filterproducts"])){
                if(!isset($_GET["manage_invoice"])){
                if(!isset($_GET["view_product"])){
                if(!isset($_GET["view_Invoice"])){
                if(!isset($_GET["view-products"])){

                require "./public_html/employee/dashboard.php"; 

                }}}}}}}}}}}}}}}}
            ?>
            <?php
                if(isset($_GET["view_Invoice"])){
                    require "./public_html/includes/view_invoice.php";
                }
                if(isset($_GET["view-products"])){
                    require "./public_html/employee/products.php";
                }
                if(isset($_GET["view_product"])){
                    require "./public_html/includes/view-product.php";
                }
                if(isset($_GET["filterproducts"])){
                    require "./public_html/employee/filterproducts.php";
                }
                if(isset($_GET["manage_invoice"])){
                    require "./public_html/employee/invoice.php";
                }
                if(isset($_GET["view_categories"])){
                    require "./public_html/employee/view-categories.php";
                }
                if(isset($_GET["change_password"])){
                    require "./public_html/includes/change-password.php";
                }
                if(isset($_GET["all_products"])){
                    require "./public_html/employee/products.php";
                }
                if(isset($_GET["view_sales"])){
                    require "./public_html/employee/manage-sales.php";
                }
                if(isset($_GET["make_sales"])){
                    require "./public_html/employee/basket.php";
                }
                if(isset($_GET["view_out_of_stock"])){
                    require "./public_html/employee/out-of-stock.php";
                }
                if(isset($_GET["view_products"])){
                    require "./public_html/employee/view-products.php";
                }
                if(isset($_GET["view_brands"])){
                    require "./public_html/employee/view-brands.php";
                }
                if(isset($_GET["manage_edit_profile"])){
                    require "./public_html/includes/editProfile.php";
                }
                if(isset($_GET["pukka"])){
                    require "./public_html/employee/about.php";
                }
            ?>

        </div>
    </div>

<?php require "./public_html/includes/footer.php"; ?>
