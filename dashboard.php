    <?php 
    include_once "./public_html/includes/actions.php";
    logout();
    backup();
    session_start();
        if($_SESSION['logedIn'] != session_id()){
            header("location: index.php");
        }elseif ($_SESSION['user_type'] != "Admin") {
            header("location: e_dashboard.php");
        }
        require "./public_html/includes/head.php";
        require "./public_html/includes/sidenav.php";
        // logout();
    ?>


    <div class="content-wrapper">
        <div class="container-fluid">
            <?php
                if(!isset($_GET["sales"]))
                if(!isset($_GET["manage_invoice"]))
                if(!isset($_GET["manage_products"]))
                if(!isset($_GET["manage_brands"]))
                if(!isset($_GET["manage_edit_profile"]))
                if(!isset($_GET["pukka"]))
                if(!isset($_GET["out_of_stock"]))
                if(!isset($_GET["manage_categories"]))
                if(!isset($_GET["manage_employees"]))
                if(!isset($_GET["all_products"]))
                if(!isset($_GET["change_password"]))
                if(!isset($_GET["edit_brand"]))
                if(!isset($_GET["edit_category"]))
                if(!isset($_GET["edit_product"]))
                if(!isset($_GET["view_product"]))
                if(!isset($_GET["edit_employee"]))
                if(!isset($_GET["view_employee"]))
                if(!isset($_GET["filterproducts"]))
                if(!isset($_GET["view_Invoice"]))
                if(!isset($_GET["make_sales"]))
                if(!isset($_GET["delete_item"]))
                if(!isset($_GET["logs"]))
                if(!isset($_GET["reports"]))
                if(!isset($_GET["shop_profile"]))
                if(!isset($_GET["view-products"])){

                require "./public_html/includes/dashboard.php"; 

                }
            ?>
            <?php
                if(isset($_GET["shop_profile"])){
                    require "./public_html/includes/manage-shop.php";
                }
                if(isset($_GET["view-products"])){
                    require "./public_html/includes/display-products.php";
                }
                if(isset($_GET["reports"])){
                    require "./public_html/includes/sales-report.php";
                }
                if(isset($_GET["make_sales"])){
                    require "./public_html/employee/basket.php";
                }
                if(isset($_GET["delete_item"])){
                    require "./public_html/includes/delete-item.php";
                }
                if(isset($_GET["filterproducts"])){
                    require "./public_html/includes/filterproducts.php";
                }
                if(isset($_GET["view_Invoice"])){
                    require "./public_html/includes/view_invoice.php";
                }
                if(isset($_GET["manage_invoice"])){
                    require "./public_html/includes/invoice.php";
                }
                if(isset($_GET["edit_product"])){
                    require "./public_html/includes/edit-product.php";
                }
                if(isset($_GET["view_product"])){
                    require "./public_html/includes/view-product.php";
                }
                if(isset($_GET["edit_employee"])){
                    require "./public_html/includes/edit-employee.php";
                }
                if(isset($_GET["view_employee"])){
                    require "./public_html/includes/view-employee.php";
                }
                if(isset($_GET["manage_categories"])){
                    require "./public_html/includes/manage-categories.php";
                }
                if(isset($_GET["edit_brand"])){
                    require "./public_html/includes/edit-brand.php";
                }
                if(isset($_GET["edit_category"])){
                    require "./public_html/includes/edit-category.php";
                }
                if(isset($_GET["change_password"])){
                    require "./public_html/includes/change-password.php";
                }
                if(isset($_GET["all_products"])){
                    require "./public_html/includes/all-products.php";
                }
                // if(isset($_GET["sales"])){
                //     require "./public_html/includes/manage-sales.php";
                // }
                if(isset($_GET["manage_employees"])){
                    require "./public_html/includes/employees.php";
                }
                if(isset($_GET["out_of_stock"])){
                    require "./public_html/includes/out-of-stock.php";
                }
                if(isset($_GET["manage_products"])){
                    require "./public_html/includes/manage-products.php";
                }
                if(isset($_GET["manage_brands"])){
                    require "./public_html/includes/manage-brands.php";
                }
                if(isset($_GET["manage_edit_profile"])){
                    require "./public_html/includes/editProfile.php";
                }
                if(isset($_GET["pukka"])){
                    require "./public_html/includes/about.php";
                }
                if(isset($_GET["logs"])){
                    require "./public_html/includes/logs.php";
                }
            ?>

        </div>
    </div>

<?php require "./public_html/includes/footer.php"; ?>
