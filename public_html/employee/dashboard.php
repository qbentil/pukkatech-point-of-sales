<style>
    .card-counter{
    box-shadow: 2px 2px 10px #DADADA;
    margin: 5px;
    padding: 2rem 1rem;
    background-color: #fff;
    height: 14rem;
    border-radius: 5px;
    transition: .3s linear all;
  }
  /* .card-counter:hover{
    box-shadow: 0 0.4rem 1.4rem 0 rgba(0, 0, 255, 0.5);
  } */

  .card-counter:hover{
    box-shadow: 4px 4px 20px #DADADA;
    transition: .3s linear all;
  }

  .card-counter.primary{
    background-color: #007bff;
    color: #FFF;
  }

  .card-counter.danger{
    background-color: #ef5350;
    color: #FFF;
  }  

  .card-counter.success{
    background-color: #66bb6a;
    color: #FFF;
  }  
  .card-counter.dark{
    background-color: #191919;
    color: #FFF;
  }  

  .card-counter.info{
    background-color: #26c6da;
    color: #FFF;
  }  

  .card-counter i{
    font-size: 9em;
    opacity: 0.3;
  }

  .card-counter .count-numbers{
    position: absolute;
    right: 35px;
    top: 20px;
    font-size: 2.5rem;
    font-weight: bold;
    display: block;
  }

  .card-counter .count-name{
    position: absolute;
    right: 35px;
    top: 65px;
    font-style: italic;
    text-transform: capitalize;
    opacity: 0.8;
    display: block;
    font-size: 2rem;
  }
</style>
<div class="row">
    <div class="col-md-6" title = "">
      <a href="?make_sales">
        <div class="card-counter dark">
          <i class="fa fa-shopping-basket"></i>
          <span class="count-numbers"></span>
          <span class="count-name">Create Invoice</span>
        </div>
      </a>
    </div>

    <div class="col-md-6" title = "">
        <a href="?view_products">
          <div class="card-counter info">
            <i class=" fa fa-shopping-cart"></i>
            <span class="count-numbers"><?php echo getTotalRecords("products") ?></span>
            <span class="count-name">Products</span>
          </div>
        </a>
    </div>

    <!-- <div class="col-md-6" title = "Manage Categories">
      <a href="?view_categories">
      <div class="card-counter primary">
        <i class="fa fa-database"></i>
        <span class="count-numbers">6875</span>
        <span class="count-name">Categories</span>
      </div>
      </a>
    </div> -->
    <div class="col-md-6" title = "">
      <a href="?view_out_of_stock">
      <div class="card-counter danger">
        <i class="fa fa-warning"></i>
        <span class="count-numbers"><?php echo getTOOSP() ?></span>
        <span class="count-name">Out of Stock</span>
      </div>
      </a>
    </div>
    <!-- <div class="col-md-6" title = "">
      <a href="?view_sales">
      <div class="card-counter success">
        <i class="fa fa-database"></i>
        <span class="count-numbers">345</span>
        <span class="count-name">Sales</span>
      </div>
      </a>
    </div> -->
  </div>