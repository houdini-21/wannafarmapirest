<!--  la forma correcta de crear una vista es agreagando templates anteriormente creados,
 asi reciclas codigo y puedes ahorrarte tiempo de escritura de nuevo -->
<?php $this->load->view(template_frontpath('template/header-arrendador')); ?>
<h2 class="suprema-regular text-4xl text-green text-center">Mis Parcelas</h2>
<div class="flex flex-col justify-center items-center md:flex-row md:justify-evenly md:flex-wrap md:w-10/12 md:mx-auto md:my-0 md:mt-4">
	<?php if (count($parcelas) < 0) { ?>
		<?php foreach ($parcelas as $parcela) { ?>
			<div class="flex flex-col justify-center items-center w-4/5 md:w-80 shadow-lg rounded h-auto my-4">
				<img src="https://ihdwall.com/storage/202103/jinx-arcane-netflix-series-4k-wallpaper-3840x2160-15.jpg" alt="" class="w-full h-40 rounded-t-lg object-cover">
				<div class="flex flex-col justify-center items-start w-full px-4 py-3">
					<p class="suprema-regular text-gray-600 text-base mb-2 capitalize">Ubicacion: <span class="suprema-medium"><?= $parcela->ubicacion ?></span></p>
					<p class="suprema-regular text-gray-600 text-base mb-2 capitalize">Caracteristicas: <span class="suprema-medium"><?= $parcela->caracteristicas ?></span></p>
					<p class="suprema-regular text-gray-600 text-base mb-2 capitalize">Restricciones: <span class="suprema-medium"><?= $parcela->restricciones ?></span></p>
					<p class="suprema-regular text-gray-600 text-base mb-2 capitalize">Dimenciones: <span class="suprema-medium"><?= $parcela->dimenciones ?>m2</span></p>
					<p class="suprema-regular text-gray-600 text-base capitalize">Precio: <span class="suprema-medium">$<?= $parcela->precio ?></span></p>
				</div>
				<div class="flex flex-col justify-center items-start w-full py-3 px-4">
					<a href="#" class="col-span-12 text-center suprema-regular w-full rounded-lg px-4 py-2 bg-green-500 text-white hover:bg-green-600 duration-300 mb-4">Ver parcela <i class="far fa-arrow-right"></i></a>
					<a href="#" class="col-span-12 text-center suprema-regular w-full rounded-lg px-4 py-2 border-2 border-blue-500  text-blue-500 hover:bg-blue-500 hover:text-white duration-300">Editar parcela <i class="far fa-edit"></i></a>
				</div>
			</div>
		<?php } ?>
	<?php } else { ?>
		<div class="flex flex-col items-center justify-center mt-20">
			<h3 class="text-2xl text-gray-600 text-center suprema-regular">No posees parcelas</h3>
			<a href="" class="text-base text-green-500 suprema-medium underline">Crear parcela &rarr;</a>
		</div>
	<?php } ?>

</div>
<?php $this->load->view(template_frontpath('template/footer-arrendador')); ?>