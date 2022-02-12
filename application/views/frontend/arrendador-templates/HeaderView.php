<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>wannafarm</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'>
  <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css'>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/landing/css/stilo.scss"/> 
  <script src="<?= base_url()?>assets/landing/css/babel.js"></script>


</head>
<!-- partial:index.partial.html -->

<body>
  <nav class="navbar navbar-default no-margin">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header fixed-brand">

      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" id="menu-toggle">
                      <span class="glyphicon glyphicon-th-large" aria-hidden="true">n</span>
                    </button>
      <a class="navbar-brand" href="#">Bienvenido al dashboard</a>
      <h3>
     
      </h3>
    </div>
    <!-- navbar-header-->

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active">
            <button class="navbar-toggle collapse in" data-toggle="collapse" id="menu-toggle-2" onclick="<?php base_url('Login/logout') ?>"> 
            <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
          </button> 
        </li>
        <li>
       </li>
        <li>
          <p class="navbar-text"></p>
          </li>
     <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">mas acciones <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">ir al perfil</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">ir al catalogo de tierras</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php base_url() ?>Landlord/index">volver al dashboard</a></li>
            <li role="separator" class="divider"></li>
            <?php  $url= base_url('Login/logout');?>
            <li><a href="<?php echo $url ?>">salir</a></li>
          </ul>
        </li> 
      </ul> 
    </div>
    <div class="navbar-header">

    </div>

  </nav>
