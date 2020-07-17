<?php  

 $host = 'localhost';
 $username = 'root';
 $pass = '';
 $db = 'social';

 $link = mysqli_connect($host,$username,$pass,$db);

?>   

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>


  	<?php  
  		$name = $_GET['name'];
  		$pass = $_GET['password'];


  		$sql = "SELECT * FROM `account` WHERE `name` = '$name' AND `password` = '$pass'";
  		$result = mysqli_query($link,$sql);

  		if (mysqli_num_rows($result) == 1){
  			$row = mysqli_fetch_assoc($result);
  		}

  	?>

    <div class="container">
    <div class="card">
	  <div class="card-body">
	  	<div class="card-img mb-5">
	  		<img src="<?php echo $row['avatar']; ?>" class='img-fluid' width='150' height='150' style='border-radius: 50%;'>
	  	</div>
	    <h5 class="card-title">Name: <?php echo $row['name']; ?></h5>
	    <p class="card-text">Status: <?php echo $row['status']; ?></p>

	    <br>
	    <a href="/social" class="btn btn-dark">Exit</a>
	  </div>
	</div>
	</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>