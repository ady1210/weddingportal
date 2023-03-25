<?php 

//index.php

include('database_connection.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
     <link rel="icon" type="image/x-icon" href="../images/favicon.png">

    <title>The Best Wedding Hub | Vendors</title>

    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href = "css/jquery-ui.css" rel = "stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        header
        {
            position:fixed;
            top:0;
            width:100%;
            z-index:2;
        }
        .navbar {
    position: relative;
    min-height: 74px !important;
    margin-bottom: 20px;
    border: 1px solid transparent;
    background-color:#d45149 !important;
    border-radius:0 !important;
}
    </style>
</head>

<body>
    <header>
        <nav class="navbar">
  <div class="container-fluid ">
    <a class="navbar-brand" href="../index.php">
      <img src="../images/wedding-final-1213-1.png" alt="" width="100%" height="50" class="d-inline-block align-text-top">
    </a>
  </div>
</nav>

    </header>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
        	<br/>
        	<h2 align="center">Search Vendor Near you </h2>
        	<br/>
            <div class="col-md-3 col-sm-3">                				
				<!-- <div class="list-group">
					<h3>Price</h3>
					<input type="hidden" id="hidden_minimum_price" value="0" />
                    <input type="hidden" id="hidden_maximum_price" value="65000" />
                    <p id="price_show">1000 - 65000</p>
                    <div id="price_range"></div>
                </div>	 -->			
                <div class="list-group">
					<h3>Service Name</h3>
                    <div style="height: 250px; overflow-y: auto; overflow-x: hidden;">
					<?php

                    $query = "SELECT DISTINCT(product_brand) FROM product WHERE product_status = '1' ORDER BY product_id DESC";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector brand" value="<?php echo $row['product_brand']; ?>"  > <?php echo $row['product_brand']; ?></label>
                    </div>
                    <?php
                    }

                    ?>
                    </div>
                </div>

				<div class="list-group" >
					<h3>State</h3>
					<div style="height: 100px; overflow-y: auto; overflow-x: hidden;">
                    <?php

                    $query = "
                    SELECT DISTINCT(state) FROM product WHERE product_status = '1' ORDER BY state DESC
                    ";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector ram" value="<?php echo $row['state']; ?>" > <?php echo $row['state']; ?></label>
                    </div>
                    <?php    
                    }

                    ?>
                </div>
                </div>
				
				<div class="list-group">
					 <h3>City</h3> 
					<?php
                    $query = "
                    SELECT DISTINCT(city) FROM product WHERE product_status = '1' ORDER BY phone DESC
                    ";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    // ?>
                  <div class="list-group-item checkbox">
                     <label><input type="checkbox" class="common_selector storage" value="<?php echo $row['city']; ?>"  > <?php echo $row['city']; ?></label>
                 </div>
                    <?php
                    }
                    ?>	
                </div>
            </div>

            <div class="col-md-9 col-sm-9">
            	<br />
                <div class="row filter_data">

                </div>
            </div>
        </div>

    </div>
<style>
#loading
{
	text-align:center; 
	background: url('loader.gif') no-repeat center; 
	height: 150px;
}
</style>

<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var brand = get_filter('brand');
        var ram = get_filter('ram');
        var storage = get_filter('storage');
        $.ajax({
            url:"fetch_data.php",
            method:"POST",
            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, brand:brand, ram:ram, storage:storage},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

    $('#price_range').slider({
        range:true,
        min:1000,
        max:65000,
        values:[1000, 65000],
        step:500,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });

});
</script>

</body>

</html>
