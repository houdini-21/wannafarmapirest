

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->load->view(template_frontpath('arrendador-templates/HeaderView')); ?>
    <title>Document</title>
</head>
<body>
<div class="container-fluid">
	
	<div class="row">
		<div class="col-md-12">
			<div class="form-group text-center">
				
                
				<?php 
				$valor = $this->session->userdata('gmail');
				$valor2 = $this->session->userdata('idperson');
				//echo $valor;
			   
				
				?>
				<h3>bienvenido <?php print_r($valor.$valor2); ?>  </h3>
				
			</div>
		</div>
	</div>

	<div class="row">

		<div class="col-md-3">
			<div class="form-group text-success" style="background-color: #EEE; padding: 15px;">
				<div class="row">
					<div class="col-md-12">
						<label for="" >agregar parcelas</label>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6"><?php $url = base_url("parcelasController/index") ?>
					<a type="button" class="btn btn-outline-success" title="clic para agregar una parcela" href="<?php echo $url?>">ir</a>
					</div>
				</div>
			</div>
		</div>

        <div class="col-md-3">
			<div class="form-group text-success" style="background-color: #EEE; padding: 15px;">
				<div class="row">
					<div class="col-md-12">
						<label for="">mis parcelas</label>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
					<a type="button" href="<?php echo base_url("parcelasController/verparcelas") ?>" class="btn btn-outline-success">ir</a>
					</div>
				</div>
			</div>
		</div>

        <div class="col-md-3">
			<div class="form-group text-success" style="background-color: #EEE; padding: 15px;">
				<div class="row">
					<div class="col-md-12">
						<label for="">parcelas ocupadas</label>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
					<a type="button" class="btn btn-outline-success">ir</a>
					</div>
				</div>
			</div>
		</div>

        

	
</div>
</div>

    
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
    

<?php $this->load->view(template_frontpath('arrendador-templates/FooterView')); ?>