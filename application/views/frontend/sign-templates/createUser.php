<?php $this->load->view(template_frontpath('template/header')); ?>
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
<link href="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.css" rel="stylesheet" />
<div
  class="
    h-screen
    w-screen
    bg-background-1 bg-center bg-cover
    flex
    justify-center
    items-center
  "
>
  <div
    class="
      bg-white
      opacity-80
      w-11/12
      lg:w-6/12
      md:w-9/12
      p-8
      rounded
      flex flex-col
      items-center
      justify-center
    "
  >
    <h2 class="suprema-regular text-3xl text-center text-green">Wannafarm</h2>
    <p class="suprema-medium text-2xl text-center">Crear cuenta</p>
    <form
      action="<?= base_url('/login/createPerson') ?>"
      method="post"
      class="h-5/6 w-full flex flex-row justify-evenly flex-wrap py-8"
    >
      <input type="hidden" name="id_cuenta" value="<?= $id ?>" />
      <input
        class="
          focus:border-green focus:ring-1 focus:ring-green focus:outline-none
          md:w-5/12
w-full
          text-base text-black
          placeholder-gray-500
          border border-gray-200
          rounded-md
          py-2
          px-2
          suprema-medium
          m-2
        "
        type="text"
        placeholder="Nombre"
        name="name"
      />

      <input
        class="
          focus:border-green focus:ring-1 focus:ring-green focus:outline-none
          md:w-5/12
w-full
          text-base text-black
          placeholder-gray-500
          border border-gray-200
          rounded-md
          py-2
          px-2
          suprema-medium
          m-2
        "
        type="text"
        placeholder="Apellidos"
        name="lastname"
      />

      <input
        class="
          focus:border-green focus:ring-1 focus:ring-green focus:outline-none
          md:w-5/12
w-full
          text-base text-black
          placeholder-gray-500
          border border-gray-200
          rounded-md
          py-2
          px-2
          suprema-medium
          m-2
        "
        type="number"
        placeholder="Edad"
        name="age"
      />

      <input
        class="
          focus:border-green focus:ring-1 focus:ring-green focus:outline-none
          md:w-5/12
w-full
          text-base text-black
          placeholder-gray-500
          border border-gray-200
          rounded-md
          py-2
          px-2
          suprema-medium
          m-2
        "
        type="number"
        placeholder="Telefono"
        name="phone"
      />
      <input
        class="
          focus:border-green focus:ring-1 focus:ring-green focus:outline-none
          md:w-5/12
          w-full
          text-base text-black
          placeholder-gray-500
          border border-gray-200
          rounded-md
          py-2
          px-2
          suprema-medium
          m-2
        "
        type="text"
        placeholder="Direccion"
        name="address"
      />
      <div class="md:w-5/12 w-full">
        <span class="text-gray-700">Seleccionar rol</span>
        <div class="mt-2">
          <label class="inline-flex items-center">
            <input
              type="radio"
              class="form-radio"
              name="accountType"
              value="1"
            />
            <span class="ml-2">Productor</span>
          </label>
          <label class="inline-flex items-center lg:ml-6">
            <input
              type="radio"
              class="form-radio"
              name="accountType"
              value="2"
            />
            <span class="ml-2">Arrendador</span>
          </label>
        </div>
      </div>
    <button class="focus:bg-green-400 py-2 px-2 rounded bg-green text-white suprema-medium mt-9 w-11/12" type="submit">Iniciar sesion</button>
    </form>
  </div>
</div>

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
    $(document).ready(function() {
        pond = FilePond.create(
            document.querySelector('#file'), {
                allowMultiple: true,
                instantUpload: false,
                allowProcess: false,
                labelIdle: 'Arrastra aquí tu imagen o <span class="filepond--label-action" tabindex="0">buscala en tu computadora</span><br>',
            });
        pond = FilePond.create(
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
            pondFiles = pond.getFiles();
            for (var i = 0; i < pondFiles.length; i++) {
                fd.append('file[]', pondFiles[i].file);
            }
            for (var i = 0; i < pondFiles.length; i++) {
                fd.append('comprobantes[]', pondFiles[i].file);
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
<?php $this->load->view(template_frontpath('template/footer')); ?>
