<?php 
 require('connection.inc.php');
?>
  



<!DOCTYPE html>
<html lang="en">
<head>
 <title>Welcome to e vaccination!!!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Fira+Code&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bangers&display=swap" rel="stylesheet">

    <!-- Internal CSS -->
<style>
        .header__bg {
            position: fixed;
            top: 32%;
            bottom: 0;
            right: 0;
            left: 0;
            width: 100%;
            height: 48%;
        }
   body{   
        background-image: url('');>
        background-size: cover;
         background-attachment : fixed;
         width: 100%;
            height: 48%;
        }
</style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/login/userpage/"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="/login/userpage/">Home <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="/login/contact/">Contact us</a>
        <a class="nav-item nav-link" href="/login/about/">About us</a>
      </div>
    </div>
  </nav>
<div class="container" style="margin-top: 4%;">
  <div class="header__bg"></div>

   <div class="row">
     <div class="col-sm-4"></div>
               <div class="col-sm-4">
                 <div class="card" style="width:400px">
                    <div class="card-body">
                      
                       <form action="login.php" method="POST">
                     <div class="form-group">
                      <P class="d-flex justify-content-center" style="font-size:30px">
                        <b>SIGNIN</b></P>

                        <label for="taxt">Username:</label>
                        <input type="text" class="form-control" id="text" placeholder="Enter Username" name="username">
                     
                        <label for="email">Email address:</label>
                       <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                       
                       <label for="tel">Mobile No:</label>
                       <input type="tel" class="form-control" id="tel" placeholder="Enter Mobile no." name="phone">
                    
                       <label for="pwd">Password:</label>
                       <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                    
                        </div> 
                       <div class="checkbox">
                        <label><input type="checkbox"> Remember me</label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                        <br>
                       </form>
        


                    </div>
                  </div>
               </div>
               <div class="col-sm-4"></div>
      </div>
</body>

</html>



