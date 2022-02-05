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

<body>
  <nav class="navbar navbar-default no-margin">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header fixed-brand">

      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" id="menu-toggle">
                      <span class="glyphicon glyphicon-th-large" aria-hidden="true">n</span>
                    </button>
					<?php $url = base_url("Landlord/index") ?>
      <a class="navbar-brand" href="<?php echo $url?>" title="click para volver al dashboard">Dashboard</a>
	  <a class="navbar-brand" href="#">Subiendo una nueva parcela</a>
     
    </div>
	</nav>
	<body>
	<div class="container-fluid">
	
	<div class="row">
		<div class="col-md-12">
			<div class="form-group text-center">
				
            <h1>agregar tierras</h1>
			</div>
		</div>
	</div>

	<!-- formulario para el registro de las parcelas -->
	<div class="row">
		<div class="col-md-12">
			<!-- contenedor de separacion -->
			<div class="row">
		<div class="col-md-12">
			<div class="form-group text-center">
				
            <h4>informacion de las parcelas</h4>
			</div>
		</div>
	</div>
<!-- contenedor de los controles -->
<form action="<?php echo base_url();?>parcelasController/almacenandoParcelas" method="POST" enctype="multipart/form-data">
		<div class="col-md-4">
		        <div class="form-group">
					<label for="exampleFormControlInput1">medidas en varas cuadradas</label>
					<input type="number" class="form-control" id="exampleFormControlInput1" placeholder="25" name="dimenciones">
					
				</div>
			

	     </div>
		 <div class="col-md-4">
		        <div class="form-group">
					<label for="exampleFormControlInput1">precio</label>
					<input type="number" class="form-control" id="exampleFormControlInput1" placeholder="$" name="precio">
				</div>

	     </div>

		 <div class="col-md-4">
		        <div class="form-group">
					<label for="exampleFormControlInput1">ubicacion</label>
					<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="sonsonate" name="ubicacion">
				</div>

	     </div>

		 <div class="col-md-4">
		        <div class="form-group">
					<label for="exampleFormControlInput1">restricciones</label>
					<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" title="explica las reglas que debe cumplir quien use tu parcela" name="restricciones"></textarea>
				</div>

	     </div>

		 <div class="col-md-4">
		        <div class="form-group">
				<label for="exampleFormControlFile1">selecciona las fotos de tu parcela</label>
 			   <input type="file" class="form-control-file" id="exampleFormControlFile1" accept="image/*" name="fotosparcela">
				</div>

	     </div>

		 
		 <div class="col-md-4">
		        <div class="form-group">
				<label for="exampleFormControlFile1">caracteristicas que resaltan en tu parcela</label>
 			   <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" title="una buena caracteristica ayudar aumentar el interes de las personas" name="caracteristicas"></textarea>
				</div>

	     </div>




	
		</div>

		<!-- formulario para el registro del registrador -->
			<div class="row">
				<div class="col-md-12">
					<!-- contenedor de separacion -->
					<div class="row">
				<div class="col-md-12">
					<div class="form-group text-center">
						
					<h4>comprobantes</h4>
					</div>
				</div>
			</div>

			<div class="col-md-4">
		        <div class="form-group">
					<label for="exampleFormControlInput1">comprobante de propiedad</label>
					<input type="file" class="form-control-file" id="exampleFormControlInput1" placeholder="25" accept="image/jpeg" name="comprobantepropiedad">
					
				</div>
			

	        </div>
		 <div class="col-md-4">
		        <div class="form-group">
					<label for="exampleFormControlInput1">foto decumento de identidad frontal</label>
					<input type="file" class="form-control-file" id="exampleFormControlInput1" placeholder="$" accept="image/jpeg" name="fotofrontal">
				</div>

				

	     </div>

		 <div class="col-md-4">
		      <div class="form-group">
					<label for="exampleFormControlInput1">foto documento de identidad reverso</label>
					<input type="file" class="form-control-file" id="exampleFormControlInput1" placeholder="$" accept="image/jpeg" name="fotoreverso">
			  </div>
			

	        </div>
			
		</div>
		
		<div class="col-md-4">
		     
		</div>
		
		<div class="col-md-4">
		      <div class="form-group">
			  <br>
			  <input  class="btn btn-primary btn-block " type="submit" onclick=""></button>
			  </div>
			

	        </div>
			
		</div>
   </form>
<!-- probando errores -->
   <div class="row">
				<div class="col-md-12">
					
					<div class="row">
				<div class="col-md-12">
					<div class="form-group text-center">
					<h4 class="text-success"><?php echo $success ?></h4>
					</div>
				</div>
			</div>

    
</body>
<script>
	function verificacion(){
		alert("formulario enviado, esperando verificacion del sistema para su publicacion");
	}

</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
    

<?php $this->load->view(template_frontpath('arrendador-templates/FooterView')); ?>