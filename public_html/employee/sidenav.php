  <style>
    @import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
html {
  position: relative;
  min-height: 100%;
}

body {
  overflow-x: hidden;
  font-family: lato;
  background-color: #EEEEEE;
}

.textside {
  margin-left: 25px;
}

.navlogo img {
  margin-bottom: 10px;
  margin-top: 10px;
  width: 60%;
}

.fixed-top {
  position: fixed;
  top: 0;
  right: 0;
  left: 0;
  z-index: 1030;
  background: #FFFFFF;
  height: 60px;
  color: white;
}

.dropdown-menu {
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 1000;
  display: none;
  float: left;
  min-width: 10rem;
  /* min-height: 100vh; */
  padding: 6px 10px;
  margin: 5px 0px 0;
  font-size: 1rem;
  color: #212529;
  text-align: left;
  list-style: none;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid rgba(0,0,0,.15);
  border-radius: .25rem;
}

a {
  color: #7D7D7D;
  text-decoration: none;
  background-color: transparent;
  -webkit-text-decoration-skip: objects;
}

a:hover {
  color: #7D7D7D;
  text-decoration: none;
  background-color: transparent;
  -webkit-text-decoration-skip: objects;
}

.inforide {
  box-shadow: 1px 2px 8px 0px #f1f1f1;
  background-color: white;
  border-radius: 8px;
  height: 125px;
}

.rideone img {
  width: 70%;
}

.ridetwo img {
  width: 60%;
}

.ridethree img {
  width: 50%;
}

.rideone {
  background-color: #6CC785;
  padding-top: 25px;
  border-radius: 8px 0px 0px 8px;
  text-align: center;
  height: 125px;
  margin-left: 15px;
}

.ridetwo {
  background-color: #9A75FE;
  padding-top: 30px;
  border-radius: 8px 0px 0px 8px;
  text-align: center;
  height: 125px;
  margin-left: 15px;
}

.ridethree {
  background-color: #4EBCE5;
  padding-top: 35px;
  border-radius: 8px 0px 0px 8px;
  text-align: center;
  height: 125px;
  margin-left: 15px;
}

.fontsty {
  margin-right: -15px;
}

.fontsty h2{
  color: #6E6E6E;
  font-size: 35px;
  margin-top: 15px;
  text-align: right;
  margin-right: 30px;
}

.fontsty h4{
  color: #6E6E6E;
  font-size: 25px;
  margin-top: 20px;
  text-align: right;
  margin-right: 30px;
}

.content-wrapper {
  min-height: calc(100vh - 56px);
  padding-top: 4rem;
  overflow-x: hidden;
  background: transparent;
}

#mainNav .navbar-collapse {
  overflow: auto;
  max-height: 75vh;
  /* min-width: 100% !important; */
  overflow-y: auto;
}
#mainNav .navbar-collapse .navbar-sidenav{
    background: #100d93 !important;
    height: 100vh !important;
}
/* #mainNav .navbar-collapse .navbar-sidenav li:hover{
    
 
} */

#mainNav .navbar-collapse .navbar-nav .nav-item .nav-link {
  cursor: pointer;
}

#mainNav .navbar-collapse .navbar-sidenav .nav-link-collapse:after {
  float: right;
  content: '\f107';
  font-family: 'FontAwesome';
}

#mainNav .navbar-collapse .navbar-sidenav .nav-link-collapse.collapsed:after {
  content: '\f105';
}

#mainNav .navbar-collapse .navbar-nav > .nav-item.dropdown > .nav-link{
  position: relative;
  min-width: 45px;
}

#mainNav .navbar-collapse .navbar-nav > .nav-item.dropdown > .nav-link:after {
  float: right;
  width: auto;
  content: '\f105';
  border: none;
  font-family: 'FontAwesome';
}

#mainNav .navbar-collapse .navbar-nav > .nav-item.dropdown.show > .nav-link:after {
  content: '\f107';
}

#mainNav.navbar-dark .navbar-collapse .navbar-sidenav .nav-link-collapse:after {
  color: #868e96;
}

#mainNav.navbar-dark .navbar-collapse .navbar-sidenav > .nav-item > .nav-link {
  color: white;
}

#mainNav.navbar-dark .navbar-collapse .navbar-sidenav > .nav-item > .nav-link:hover {
  color: #100d93;
  border-radius: 30px;
  background-color: white;
}

#mainNav.navbar-dark .navbar-collapse .navbar-nav > .nav-item.dropdown > .nav-link:after {
  color: #100d93;
}

#mainNav.navbar-light .navbar-collapse .navbar-sidenav .nav-link-collapse:after {
  color: rgba(0, 0, 0, 0.5);
}

#mainNav.navbar-light .navbar-collapse .navbar-sidenav > .nav-item > .nav-link {
  color: rgba(0, 0, 0, 0.5);
}

#mainNav.navbar-light .navbar-collapse .navbar-sidenav > .nav-item > .nav-link:hover {
  color: rgba(0, 0, 0, 0.7);
}

#mainNav.navbar-light .navbar-collapse .navbar-nav > .nav-item.dropdown > .nav-link:after {
  color: rgba(0, 0, 0, 0.5);
}

body.sidenav-toggled .navbar-sidenav {
  width: 55px;
}

body.sidenav-toggled .navbar-sidenav .nav-link-text {
  display: none;
}

body.sidenav-toggled .navbar-sidenav .nav-item,
body.sidenav-toggled .navbar-sidenav .nav-link {
  width: 55px !important;
}

body.sidenav-toggled .navbar-sidenav .nav-item:after,
body.sidenav-toggled .navbar-sidenav .nav-link:after {
  display: none;
}

body.sidenav-toggled .navbar-sidenav .nav-item {
  white-space: nowrap;
}


@media (min-width: 992px) {

#mainNav .navbar-brand {
  width: 220px;
}

#mainNav .navbar-collapse {
  overflow: visible;
  max-height: none;
}

#mainNav .navbar-collapse .navbar-sidenav {
  position: absolute;
  top: 0;
  left: 0;
  -webkit-flex-direction: column;
  -ms-flex-direction: column;
  flex-direction: column;
  margin-top: 0px;
}

#mainNav .navbar-collapse .navbar-sidenav > .nav-item {
   width: 270px;
   padding: 5px 15px;
   border-bottom: none;
}

#mainNav .navbar-collapse .navbar-sidenav > .nav-item > .nav-link {
   padding: 1em;
}

#mainNav .navbar-collapse .navbar-nav > .nav-item.dropdown > .nav-link {
  min-width: 0;
}

#mainNav .navbar-collapse .navbar-nav > .nav-item.dropdown > .nav-link:after {
  width: 24px;
  text-align: center;
}

#mainNav.fixed-top .navbar-sidenav {
  height: calc(120vh - 150px);
  width: 230px;
}

#mainNav.navbar-dark .navbar-collapse .navbar-sidenav {
  background: #262625;
}

#mainNav.navbar-dark .navbar-collapse .navbar-sidenav li.active a {
  color: white !important;
  background-color: #495057;
}

#mainNav.navbar-dark .navbar-collapse .navbar-sidenav li.active a:focus, #mainNav.navbar-dark .navbar-collapse .navbar-sidenav li.active a:hover {
  color: white;
}

#mainNav.navbar-light .navbar-collapse .navbar-sidenav {
    background: #f8f9fa;
}

#mainNav.navbar-light .navbar-collapse .navbar-sidenav li.active a {
  color: #000 !important;
  background-color: #e9ecef;
}

#mainNav.navbar-light .navbar-collapse .navbar-sidenav li.active a:focus, 
#mainNav.navbar-light .navbar-collapse .navbar-sidenav li.active a:hover {
  color: #000;
}

.content-wrapper {
  margin-left: 250px;
  margin-right: 20px;
}

}

@media screen and (max-device-width: 640px) { 

.navbar-dark .navbar-toggler {
  color: rgba(255,255,255,.5);
  border-color: #E84A5F;
  background: #E84A5F;
}

.navbar-nav {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  padding-left: 0;
  margin-bottom: 0;
  list-style: none;
  background: #262625;
  height: 70vh;
}

.navbar-nav2 {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  padding-left: 0;
  margin-bottom: 0;
  list-style: none;
  background: #262625;
  height: 18vh;
}

}
.bg-dark, .bg-secondary, .btn-dark, .btn-secondary, .dark{
  background-color: #100d93 !important;
}
  </style>
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
     <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav">

          <a class="nav-link navlogo text-center" href="e_dashboard.php">
            <img src="./public_html/images/logo.png">
          </a>

        <li class="nav-item">
          <a class="nav-link sidefrst" href="e_dashboard.php">
            <span class="textside">  <i class="fa fa-dashboard"></i> Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link sidesforth" href="e_dashboard.php?make_sales">
            <span class="textside"> <i class=" fa fa-shopping-basket"></i>Create Invoice</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link sidesforth" href="e_dashboard.php?view_products">
            <span class="textside"> <i class=" fa fa-shopping-cart"></i>View Products</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link sidesecnd" href="e_dashboard.php?view_categories">
            <span class="textside"> <i class="fa fa-database"></i>View Categories</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link sidesthrd" href="e_dashboard.php?view_brands">
            <span class="textside"> <i class="fa fa-code-fork"></i> View Brands</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link sidesthrd" href="e_dashboard.php?manage_invoice">
            <span class="textside"> <i class="fa fa-code-fork"></i>Invoice List</span>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link sidesix" href="e_dashboard.php?manage_edit_profile">
            <span class="textside"> <i class="fa fa-user mx-2"></i>Profile</span>
          </a>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link " href="e_dashboard.php?logout=true">
            <span class="textside"><i class="fa fa-fw fa-power-off"></i>Logout</span>
          </a>
        </li> -->
      </ul>
      
      <ul class="navbar-nav2 ml-auto">
        <li class="nav-item">
          <a class="nav-link" >
          <span class="textside"><i class="fas fa-calendar-alt">&nbsp;</i><span id="time">Admin Dashboard</span></strong></span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav2 ml-auto">
        <!-- <li class="nav-item">
          <a class="nav-link" href="e_dashboard.php?manage_edit_profile">
            <span class="textside"><i class="fa fa-fw fa-user fa-1x font-weight-bold text-dark"></i>Welcome! <strong><?php echo $_SESSION["username"] ?></strong></span>
          </a>
        </li> -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Welcome! <strong><?php echo $_SESSION["username"] ?></strong></span>
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="e_dashboard.php?manage_edit_profile"><i class="fa fa-fw fa-user text-success"></i>Edit Profile</a>
            <form  method="post">
            <button class="dropdown-item" name = "dbbackup" ><i class="fa fa-fw fa-refresh text-warning"></i>Backup Data</button>
            </form>
            <a class="dropdown-item" href="e_dashboard.php?logout=true"><i class="fa fa-fw fa-sign-out text-danger"></i>Sign out</a>
            <!-- <a class="dropdown-item" href="#">Link 3</a> -->
          </div>
        </li>
      </ul>
      
    </div>
  </nav>