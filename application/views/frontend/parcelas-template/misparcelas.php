<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>wannafarm</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">


</head>

<body>
  <nav class="navbar navbar-default no-margin">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header fixed-brand">

      <?php $url = base_url("Landlord/index") ?>
      <a class="navbar-brand" href="<?php echo $url ?>" title="click para volver al dashboard">Dashboard</a>
      <a class="navbar-brand" href="#">mis parcelas</a>

    </div>
  </nav>


  <div class="container-fluid">
    <!-- probando cards -->
   

    <div class="container">
      <div class="row">
        

          <?php
          //  iniciando con el mostre de datos ;
          foreach ($consulta->result() as $row) {
          ?>

          <div class="col-sm">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">Ubicacion :<?= $row->ubicacion ?></h5>
                <h6 class="card-subtitle mb-2 text-muted">Identificador :<?= $row->id_parcelas ?></h6>
                <p class="card-text">caracteristicas :<?= $row->caracteristicas ?></p>
                <p class="card-text">restricciones :<?= $row->restricciones ?></p>
                <p class="card-text">dimenciones :<?= $row->dimenciones ?></p>
                <p class="card-text">precio :<?= $row->precio ?></p>
                <a href="#" class="card-link">editar</a>
                <a href="#" class="card-link">eliminar</a>
              </div>
            </div>
            </div>
            <br>


          <?php
          }
          ?>
        
      </div>
    </div>

  </div>



</body>




<?php $this->load->view(template_frontpath('arrendador-templates/FooterView')); ?>