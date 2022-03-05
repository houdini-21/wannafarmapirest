<?php $this->load->view(template_frontpath('template/header')); ?>
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
<link href="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.css" rel="stylesheet" />
<style>
  .swal2-html-container {
    overflow: hidden;
  }
</style>
<div class="
    min-h-screen
    py-4
    bg-background-1 bg-center bg-cover
    flex
    justify-center
    items-center
  ">
  <form action="<?= base_url('landlord/guardarParcela') ?>" class="
    flex
    justify-center
    items-center
  " method="post" id="upload_form" enctype="multipart/form-data">
    <div class="bg-white opacity-80 h-auto w-72 md:w-80 p-8 rounded flex flex-col items-center justify-center" id="form">
      <h2 class="suprema-regular text-3xl text-center text-green">Wannafarm</h2>
      <p class="suprema-medium text-2xl text-center">Crear cuenta</p>
      <div class="w-full flex flex-col justify-evenly py-8" id="form1">
        <input class="
          focus:border-green focus:ring-1 focus:ring-green focus:outline-none
          w-full
          text-base text-black
          placeholder-gray-500
          border border-gray-200
          rounded-md
          py-2
          px-2
          suprema-medium
          mb-4
        " type="text" placeholder="Correo" name="email" required />
        <input class="
          focus:border-green focus:ring-1 focus:ring-green focus:outline-none
          w-full
          text-base text-black
          placeholder-gray-500
          border border-gray-200
          rounded-md
          py-2
          px-2
          suprema-medium
          mb-4
        " type="password" placeholder="Contrasena" name="password" required />
        <input class="
          focus:border-green focus:ring-1 focus:ring-green focus:outline-none
          w-full
          text-base text-black
          placeholder-gray-500
          border border-gray-200
          rounded-md
          py-2
          px-2
          suprema-medium
          mb-4
        " type="text" placeholder="Nombre" name="name" required />
        <input class="
          focus:border-green focus:ring-1 focus:ring-green focus:outline-none
          w-full
          text-base text-black
          placeholder-gray-500
          border border-gray-200
          rounded-md
          py-2
          px-2
          suprema-medium
          mb-4
        " type="text" placeholder="Apellido" name="lastname" required />
        <input class="
          focus:border-green focus:ring-1 focus:ring-green focus:outline-none
          w-full
          text-base text-black
          placeholder-gray-500
          border border-gray-200
          rounded-md
          py-2
          px-2
          suprema-medium
          mb-4
        " type="number" placeholder="Edad" name="age" min="0" max="100"" required />
        <input class=" focus:border-green focus:ring-1 focus:ring-green focus:outline-none w-full text-base text-black placeholder-gray-500 border border-gray-200 rounded-md py-2 px-2 suprema-medium mb-4 " type=" number" placeholder="Telefono" name="phone" min="0" required />
        <div class="w-full">
          <span class="text-gray-700">Seleccionar rol</span>
          <div class="my-2 flex items-center justify-center">
            <label class="inline-flex items-center">
              <input type="radio" class="form-radio" name="accountType" value="1" />
              <span class="ml-2 mr-4">Productor</span>
            </label>
            <label class="inline-flex items-center lg:ml-6">
              <input type="radio" class="form-radio" name="accountType" value="2" />
              <span class="ml-2">Arrendador</span>
            </label>
          </div>
        </div>
        <button class="focus:bg-green-400 py-2 px-2 rounded bg-green text-white suprema-medium mt-4" type="button" id="btn1">Siguiente &rarr;</button>
      </div>
      <div class="w-full flex flex-col justify-evenly py-8 hidden" id="form2">
        <input class="
          focus:border-green focus:ring-1 focus:ring-green focus:outline-none
          w-full
          text-base text-black
          placeholder-gray-500
          border border-gray-200
          rounded-md
          py-2
          px-2
          suprema-medium
          
        " type="text" placeholder="DUI" name="duin" required />
        <div class="w-full mb-4">
          <label class="text-base text-gray-600 suprema-medium">Sube fotos de parte frontal de tu DUI</label>
          <input type="file" class="my-pond w-full mt-2" id='duif' name="duif" multiple data-allow-reorder="true" data-max-file-size="5MB" data-max-files="1">
        </div>
        <div class="w-full mb-4">
          <label class="text-base text-gray-600 suprema-medium">Sube fotos de parte trasera de tu DUI</label>
          <input type="file" class="my-pond w-full mt-2" id='duit' name="duit" multiple data-allow-reorder="true" data-max-file-size="5MB" data-max-files="1">
        </div>
        <input class="
          focus:border-green focus:ring-1 focus:ring-green focus:outline-none
          w-full
          text-base text-black
          placeholder-gray-500
          border border-gray-200
          rounded-md
          py-2
          px-2
          suprema-medium
          mb-4
        " type="text" placeholder="NIT" name="nitn" required />
        <div class="w-full mb-4">
          <label class="text-base text-gray-600 suprema-medium">Sube fotos de parte frontal de tu NIT</label>
          <input type="file" class="my-pond w-full mt-2" id='nitf' name="nitf" multiple data-allow-reorder="true" data-max-file-size="5MB" data-max-files="1">
        </div>
        <div class="w-full mb-4">
          <label class="text-base text-gray-600 suprema-medium">Sube fotos de parte trasera de tu NIT</label>
          <input type="file" class="my-pond w-full mt-2" id='nitt' name="nitt" multiple data-allow-reorder="true" data-max-file-size="5MB" data-max-files="1">
        </div>
        <button class="focus:bg-green-400 py-2 px-2 rounded bg-green text-white suprema-medium mt-4" type="button" id="btn2">Siguiente &rarr;</button>

      </div>
      <div class="w-full flex flex-col justify-evenly py-8 hidden" id="form3">
        <input class="
          focus:border-green focus:ring-1 focus:ring-green focus:outline-none
          w-full
          text-base text-black
          placeholder-gray-500
          border border-gray-200
          rounded-md
          py-2
          px-2
          suprema-medium
          mb-4
        " type="text" placeholder="Departamento" name="departamento" required />
        <input class="
          focus:border-green focus:ring-1 focus:ring-green focus:outline-none
          w-full
          text-base text-black
          placeholder-gray-500
          border border-gray-200
          rounded-md
          py-2
          px-2
          suprema-medium
          mb-4
        " type="text" placeholder="Municipio" name="municipio" required />
        <input class="
          focus:border-green focus:ring-1 focus:ring-green focus:outline-none
          w-full
          text-base text-black
          placeholder-gray-500
          border border-gray-200
          rounded-md
          py-2
          px-2
          suprema-medium
          mb-4
        " type="text" placeholder="Direccion" name="direccion" required />
        <button class="focus:bg-green-400 py-2 px-2 rounded bg-green text-white suprema-medium mt-4" type="button" id="btn3">Siguiente &rarr;</button>
      </div>

      <a class="suprema-medium text-base text-green underline" href="<?= base_url('/login') ?>">Iniciar sesion</a>

    </div>
    <div class="bg-white h-auto w-11/12 md:w-9/12 p-8 rounded flex flex-col items-center justify-center hidden" id="form4">
      <h2 class="suprema-regular text-3xl md:text-5xl text-center text-green">Wannafarm</h2>
      <p class="suprema-medium text-base md:text-lg text-center text-gray-800">Antes de continuar debes leer y aceptar los terminos y condiciones</p>
      <div class="bg-gray-100 w-full h-96 mt-6 p-4 overflow-auto">
        <p class="text-gray-800 suprema-medium text-base">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur imperdiet neque et leo auctor, et dapibus tortor dapibus. Sed pulvinar sit amet odio sit amet mollis. Proin a mauris libero. Donec tempor nisi vel arcu efficitur, ac pulvinar eros facilisis. Integer quis elementum lorem, eu lobortis ligula. Integer maximus hendrerit nisl, a rhoncus neque convallis ut. In at pretium elit. Phasellus at nibh est. Integer a felis nec sapien gravida cursus ac nec lorem. Nam vestibulum mauris eros, eget laoreet libero luctus a.
          <br>
          <br>
          Duis pulvinar, nisi quis finibus aliquet, dolor justo viverra mauris, eget sagittis erat sem venenatis leo. Quisque auctor urna eget egestas pellentesque. Maecenas venenatis sem tellus, quis dapibus justo accumsan vel. Pellentesque in ipsum sed eros efficitur mollis. Aliquam rhoncus eros quis nisi scelerisque, in congue quam congue. Praesent mauris diam, imperdiet id neque non, mattis euismod purus. Integer tempor dignissim ante, a euismod nunc.
          <br>
          <br>
          Curabitur luctus tellus eros, quis ultrices mi consequat ultricies. Morbi id mi risus. In lorem neque, malesuada vel elit non, vestibulum gravida arcu. Nunc nec enim et est congue scelerisque. Nulla a nulla eu magna iaculis suscipit facilisis sit amet urna. Vestibulum odio ante, molestie sit amet vehicula et, condimentum eget eros. Quisque consectetur pretium lectus sit amet tincidunt. Morbi eget nibh eget ipsum tempor tristique in id nibh. Integer vitae risus dapibus, aliquet magna eget, imperdiet sem. Ut lorem libero, ultrices sed felis quis, elementum placerat dui. Nam nibh sem, aliquam in lacinia eget, semper eget metus. Nullam dictum, tellus et posuere euismod, neque odio finibus nulla, ac sodales justo metus vitae eros.
        </p>
      </div>
      <button class="focus:bg-green-400 py-2 px-12 rounded bg-green text-white suprema-medium mt-4" type="submit">Continuar</button>
    </div>
  </form>

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
  $(function() {

    $.fn.filepond.registerPlugin(FilePondPluginImagePreview,
      FilePondPluginImageExifOrientation,
      FilePondPluginFileValidateSize,
      FilePondPluginImageEdit);
  });


  $(document).ready(function() {
    let btn1 = document.getElementById('btn1');
    let btn2 = document.getElementById('btn2');
    let btn3 = document.getElementById('btn3');

    let form = document.getElementById('form');
    let form1 = document.getElementById('form1');
    let form2 = document.getElementById('form2');
    let form3 = document.getElementById('form3');
    let form4 = document.getElementById('form4');
    //crea funcionalidad de paso de pagina
    btn1.addEventListener('click', () => {
      form1.classList.add('hidden');
      form2.classList.remove('hidden');
    })
    btn2.addEventListener('click', () => {
      form2.classList.add('hidden');
      form3.classList.remove('hidden');
    })
    btn3.addEventListener('click', () => {
      form3.classList.add('hidden');
      form.classList.add('hidden');
      form4.classList.remove('hidden');
    })


    pond1 = FilePond.create(
      document.querySelector('#duif'), {
        allowMultiple: true,
        instantUpload: false,
        allowProcess: false,
        labelIdle: 'Arrastra aquí tus imagenes o <span class="filepond--label-action" tabindex="0">buscala en tu computadora</span><br>',
      });

    pond2 = FilePond.create(
      document.querySelector('#duit'), {
        allowMultiple: true,
        instantUpload: false,
        allowProcess: false,
        labelIdle: 'Arrastra aquí tus imagenes o <span class="filepond--label-action" tabindex="0">buscala en tu computadora</span><br>',
      });


    pond3 = FilePond.create(
      document.querySelector('#nitf'), {
        allowMultiple: true,
        instantUpload: false,
        allowProcess: false,
        labelIdle: 'Arrastra aquí tus imagenes o <span class="filepond--label-action" tabindex="0">buscala en tu computadora</span><br>',
      });
    pond4 = FilePond.create(
      document.querySelector('#nitt'), {
        allowMultiple: true,
        instantUpload: false,
        allowProcess: false,
        labelIdle: 'Arrastra aquí tus imagenes o <span class="filepond--label-action" tabindex="0">buscala en tu computadora</span><br>',
      });


    $("#upload_form").submit(function(e) {
      e.preventDefault();
      var fd = new FormData(this);
      // append files array into the form data and filepond

      pondFiles1 = pond1.getFiles();
      pondFiles2 = pond2.getFiles();
      pondFiles3 = pond3.getFiles();
      pondFiles4 = pond4.getFiles();


      for (var i = 0; i < pondFiles1.length; i++) {
        fd.append('duif[]', pondFiles1[i].file);
      }
      for (var i = 0; i < pondFiles2.length; i++) {
        fd.append('duit[]', pondFiles2[i].file);
      }
      for (var i = 0; i < pondFiles3.length; i++) {
        fd.append('nitf[]', pondFiles3[i].file);
      }
      for (var i = 0; i < pondFiles4.length; i++) {
        fd.append('nitt[]', pondFiles4[i].file);
      }
      //send fd to url base_url + "login/createUser"
      $.ajax({
        url: base_url + "login/createUser",
        type: 'POST',
        data: fd,
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
          Swal.fire({
            title: 'Espera un momento',
            text: 'Estamos creando su cuenta',
            showCancelButton: false,
            showConfirmButton: false,
            allowOutsideClick: false,
            html: '<i class="fad fa-spinner-third fa-spin" style="font-size:70px; color: #50bf77"></i>',
          })
        },
        success: function(data) {
          if (data == 201) {
            Swal.fire(
              'Usuario creado con exito!',
              'Se envio un correo de confirmacion al correo que usastes para registrarte',
              'success'
            );
            //redirect to login page
            setTimeout(function() {
              window.location.href = base_url + "login";
            }, 2000);
          } else if (data == 401) {
            Swal.fire(
              'Error!',
              'El correo que usastes ya esta registrado',
              'error'
            );
            //hide form4 and show form1
            form4.classList.add('hidden');
            form.classList.remove('hidden');
            form1.classList.remove('hidden');
          }
        }
      });
    });
  })
</script>


<?php $this->load->view(template_frontpath('template/footer')); ?>