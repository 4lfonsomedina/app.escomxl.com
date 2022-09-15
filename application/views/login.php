<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="https://sistema.escomxl.com/favicon.ico">
	<title>ESCO Panel de control</title>
</head>
<body>

</body>
</html>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>

<form method="post" action="<?= site_url('Welcome/acceso') ?>">
<div class="box">
<h1>Panel de control</h1>

<input type="text" name="rfc" placeholder="RFC" class="email"/>
  
<input type="password" name="clave" placeholder="clave" class="email"/>

<button type="submit" class="btn">Entrar</button> <!-- End Btn2 -->
  
</div> <!-- End Box -->

<img src="<?= base_url('assets/img/icon.png') ?>" class="img_logo">
  
</form>





<?php if(isset($_GET['e'])){ ?>
            <div class="alert alert-danger error_alert" role="alert" style="text-align: center; bottom: 20px; width: 100%; z-index: 1;">
              <strong>Usuario y/o contraseña invalidos.</strong>
            </div>
            <script type="text/javascript">
              setTimeout(function() {$('.error_alert').fadeOut();}, 5000);
            </script>
          <?php } ?>



<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
<style type="text/css">
	body{
  font-family: 'Open Sans', sans-serif;
  background-image: linear-gradient(90deg, #ffeed4 2.38%, #ffffff 2.38%, #ffffff 50%, #ffeed4 50%, #ffeed4 52.38%, #ffffff 52.38%, #ffffff 100%);
background-size: 42.00px 42.00px;
  margin: 0 auto 0 auto;  
  width:100%; 
  text-align:center;
  margin: 20px 0px 20px 0px;   
}

p{
  font-size:12px;
  text-decoration: none;
  color:#ffffff;
}

h1{
  font-size:1.5em;
  color:#525252;
}
.img_logo{
	margin-top: 20px;
	height: 150px;
}
.box{
  background:white;
  width:300px;
  border-radius:6px;
  margin: 15% auto 0 auto;
  padding:0px 0px 70px 0px;
  border: #d55123 2px solid; 
}

.email{
  background:#ecf0f1;
  border: #ccc 1px solid;
  border-bottom: #ccc 2px solid;
  padding: 8px;
  width:250px;
  color:#AAAAAA;
  margin-top:10px;
  font-size:1em;
  border-radius:4px;
}

.password{
  border-radius:4px;
  background:#ecf0f1;
  border: #ccc 1px solid;
  padding: 8px;
  width:250px;
  font-size:1em;
}

.btn{
  background:#ff7300;
  width:89%;
  padding-top:5px;
  padding-bottom:5px;
  color:white;
  border-radius:4px;
  border: #ff7300 1px solid;
  
  margin-top:20px;
  margin-bottom:20px;
  float:left;
  margin-left:16px;
  font-weight:800;
  font-size:0.8em;
}

.btn:hover{
  background:#ff9900; 
}

#btn2{
  float:left;
  background:#3498db;
  width:90%;  padding-top:5px;
  padding-bottom:5px;
  color:white;
  border-radius:4px;
  border: #2980b9 1px solid;
  
  margin-top:20px;
  margin-bottom:20px;
  margin-left:10px;
  font-weight:800;
  font-size:0.8em;
}

#btn2:hover{ 
background:#3594D2; 
}
</style>