<?php $this->load->view(template_frontpath('template/header-arrendador')); ?>
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
<link href="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.css" rel="stylesheet" />
<style>
    .swal2-html-container {
        overflow: hidden;
    }
</style>

<h2 class="suprema-regular text-4xl text-green text-center mb-8">Crear Parcela</h2>
<form action="<?= base_url('landlord/guardarParcela') ?>" method="post" enctype="multipart/form-data" id='upload_form'>
    <div class="flex flex-col justify-center items-center w-full px-8 mt-4 md:w-6/12 md:mx-auto md:my-0">
        <input class="
          focus:border-green focus:ring-1 focus:ring-green focus:outline-none
          w-full
          text-base text-gray-700
          placeholder-gray-300
          border border-gray-200
          rounded-md
          py-2
          px-2
          suprema-medium
          mb-4
          " type="number" placeholder="Dimenciones" name="dimenciones" />

        <input class="
          focus:border-green focus:ring-1 focus:ring-green focus:outline-none
          w-full
          text-base text-gray-700
          placeholder-gray-300
          border border-gray-200
          rounded-md
          py-2
          px-2
          suprema-medium
          mb-4
          " type="number" placeholder="Precio" name="precio" />

        <input class="
          focus:border-green focus:ring-1 focus:ring-green focus:outline-none
          w-full
          text-base text-gray-700
          placeholder-gray-300
          border border-gray-200
          rounded-md
          py-2
          px-2
          suprema-medium
          mb-4
          " type="text" placeholder="Ubicacion" name="ubicacion" />
        <textarea name="renstricciones" placeholder="Explica las reglas que debe cumplir quien use tu parcela" cols="20" rows="10" class="
        focus:border-green focus:ring-1 focus:ring-green focus:outline-none
          w-full
          text-base text-gray-700
          placeholder-gray-300
          border border-gray-200
          rounded-md
          py-2
          px-2
          h-40
          mb-4
          suprema-medium"></textarea>
        <div class="w-full">
            <label class="text-base text-gray-600 suprema-medium">Sube las fotos de tu parcela</label>
            <input type="file" class="my-pond w-full mt-2" id='file' name="filepond[]" multiple data-allow-reorder="true" data-max-file-size="5MB" data-max-files="5">
        </div>
        <div class="w-full">
            <label class="text-base text-gray-600 suprema-medium">Sube los comprobantes de tu parcela</label>
            <input type="file" class="my-pond w-full mt-2" id='comprobantes' name="compro[]" multiple data-allow-reorder="true" data-max-file-size="5MB" data-max-files="5">
        </div>
        <textarea name="caracteristicas" placeholder="Escribe una caracteristica de tu parcela que la haga atractiva para ayudar a aumentar el interes" cols="20" rows="10" class="
        focus:border-green focus:ring-1 focus:ring-green focus:outline-none
          w-full
          text-base text-gray-700
          placeholder-gray-300
          border border-gray-200
          rounded-md
          py-2
          px-2
          h-40
          mb-4
          suprema-medium"></textarea>
        <button class="col-span-12 text-center suprema-regular w-full rounded-lg px-4 py-2 bg-green-500 text-white hover:bg-green-600 duration-300 mb-4">Guardar parcela <i class="far fa-save"></i></button>

    </div>
</form>


<!--  jQuery library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<!--  FilePond library -->
<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
<!--  FilePond plugins -->
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-validate-size/dist/filepond-plugin-image-validate-size.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script><!-- include FilePond jQuery adapter -->
<script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function() {

        $.fn.filepond.registerPlugin(FilePondPluginImagePreview,
            FilePondPluginImageExifOrientation,
            FilePondPluginFileValidateSize,
            FilePondPluginImageEdit);
    });
</script>

<script>
    $(document).ready(function() {
        pond1 = FilePond.create(
            document.querySelector('#file'), {
                allowMultiple: true,
                instantUpload: false,
                allowProcess: false,
                labelIdle: 'Arrastra aquí tu imagen o <span class="filepond--label-action" tabindex="0">buscala en tu computadora</span><br>',
            });
        pond2 = FilePond.create(
            document.querySelector('#comprobantes'), {
                allowMultiple: true,
                instantUpload: false,
                allowProcess: false,
                labelIdle: 'Arrastra aquí tus comprobantes o <span class="filepond--label-action" tabindex="0">buscala en tu computadora</span><br>',
            });

        $("#upload_form").submit(function(e) {
            e.preventDefault();
            var fd = new FormData(this);
            // append files array into the form data
            pondFiles1 = pond2.getFiles();
            pondFiles2 = pond2.getFiles();

            for (var i = 0; i < pondFiles1.length; i++) {
                fd.append('file[]', pondFiles1[i].file);
            }
            for (var i = 0; i < pondFiles2.length; i++) {
                fd.append('comprobantes[]', pondFiles2[i].file);
            }
            $.ajax({
                url: base_url + 'landlord/guardarParcela',
                type: 'POST',
                data: fd,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() { //We add this before send to disable the button once we submit it so that we prevent the multiple click
                    Swal.fire({
                        title: 'Espera un momento',
                        text: 'Estamos subiendo tus datos',
                        showCancelButton: false,
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        html: '<i class="fad fa-spinner-third fa-spin" style="font-size:70px; color: #50bf77"></i>',
                    })
                },
                success: function(data) {
                    if (data == 200) {
                        Swal.fire(
                            'Parcela creada!',
                            'Tu parcela fue creada con exito',
                            'success'
                        );
                        setTimeout(function() {
                            window.location.href = base_url + "/landlord/";
                        }, 3000);
                    } else {
                        Swal.fire(
                            'Hubo un error!',
                            'No se pudo crear la parcela, intenta mas tarde',
                            'error'
                        );
                    }
                },
                complete: function() {
                    console.log('complete');
                },
                error: function(data) {
                    //    todo the logic
                }
            });
        });
    })
</script>

<?php $this->load->view(template_frontpath('template/footer-arrendador')); ?>