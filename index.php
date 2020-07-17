<?php  

$host = 'localhost';
$username = 'root';
$password = '';
$db = 'social';

$link = mysqli_connect($host,$username,$password,$db);

//registration

if(isset($_POST['usernameForReg'])){
  $new_user = mysqli_real_escape_string($link,$_POST['usernameForReg']);
  $new_pass = md5(mysqli_real_escape_string($link,$_POST['passwordForReg']));
  $status = mysqli_real_escape_string($link,$_POST['status']);
  $avatar = mysqli_real_escape_string($link,$_POST['myAvatar']);

  if($new_pass == md5($_POST['passwordForRegRep'])){
    $sql = "INSERT INTO `account` (`name`,`password`,`status`,`avatar`) VALUES ('$new_user','$new_pass','$status','$avatar')";
    mysqli_query($link,$sql);
  
  }else{
    ?>
    <script type="text/javascript">alert('passwords dont match!');</script>
    <?php
  }

}

//login

if(isset($_POST['username'])){
  $user = mysqli_real_escape_string($link,$_POST['username']);
  $pass = mysqli_real_escape_string($link,$_POST['password']);
  $pass = md5($pass);

  $sql = "SELECT * FROM account WHERE name = '$user' AND password = '$pass' ";

  $result = mysqli_query($link,$sql);


  if($result){

    $count = mysqli_num_rows($result);

    if ($count == 1){
      header("Location: page.php?name=$user&password=$pass");
    }

  }


}

?>

<!doctype html>
<html lang="en" class="h-100">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <style type="text/css">
    .div-wrapper {
    height: 200px;
    margin-top: 40px;
    border: 2px dashed #ddd;
    border-radius: 8px;
}
 
.div-to-align {
    width: 75%;
    padding: 40px 20px;
 
    /* .... */
}
  </style>
  <body class="h-100">
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-6 col-lg-6 col-sm-12">
                <!-- Form -->
                <form class="form-example shadow p-3 mb-5 bg-white rounded p-5"  method="POST">
                    <h1 class="text-center text-primary ">LOGIN</h1>
                    
                    <div class="form-group mt-5">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control username" id="username" placeholder="Username..." name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control password" id="password" placeholder="Password..." name="password">
                    </div>
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                      Registration
                    </button>
                    <center>
                    <input type="submit" class="btn btn-primary btn-customized mt-5" value='Login'></input>
                    </center>

                </form>
                <!-- Form end -->
            </div>
            <div class="collapse" id="collapseExample">
                <!-- Form -->
                <form class="form-example shadow p-3 mb-5 bg-white rounded p-5"  method="POST">
                    <h1 class="text-center text-primary ">REGISTRATION</h1>
                    
                    <div class="form-group mt-5">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control username" id="username" placeholder="Username..." name="usernameForReg">
                    </div>
                    <div class="form-group" >
                      <label for="exampleFormControlSelect2">Example multiple select</label>
                      <select multiple class="form-control" id="exampleFormControlSelect2" name='status'>
                        <option>Hacker</option>
                        <option>Programmer</option>
                        <option>Full Stack Developer</option>
                      </select>
                    </div>
                    <div class="form-group mt-5">
                        <label for="username">Select Avatar</label>
                        <input type="text" class="form-control username" id="username" placeholder="URL" name="myAvatar">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control password" id="password" placeholder="Password..." name="passwordForReg">
                    </div>
                    <div class="form-group">
                        <label for="password">Repeat Password:</label>
                        <input type="password" class="form-control password" id="password" placeholder="Password..." name="passwordForRegRep">
                    </div>
                    <center>
                    <input type="submit" class="btn btn-primary btn-customized mt-5" value='Create Account'></input>
                    </center>

                </form>
                <!-- Form end -->
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