<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'><link rel="stylesheet" href="css/style.css">
<link rel="icon" href="img/user_84308.ico">
</head>
<body class="cuerpo_login">
<div class="container">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">Login</h1>
    <form id="formLogin" method="POST">
    <input type="text" name="tipo_operacion" id="tipo_operacion" value="login" hidden="true">
    <input type="number" hidden="true" name="id">
      <div class="input-container">
        <input type="text" id="user" name="user" required="required" autocomplete="off"/>
        <label for="#{label}">Username</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="password" name="password" required="required" autocomplete="off"/>
        <label for="#{label}">Password</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button type="submit"><span>Entrar</span></button>
      </div>
    </form>
  </div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="js/login.js"></script>
</body>
</html>