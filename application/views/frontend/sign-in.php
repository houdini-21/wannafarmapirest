<?php $this->load->view(template_frontpath('template/header')); ?>

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
  <div class="bg-white opacity-75 h-96 w-80 p-8 rounded">
    <h2 class="font-semibold text-3xl text-center">Crear Cuenta</h2>
    <form action="<?= base_url("/login/createUser") ?>" method="post" class="h-5/6 flex flex-col justify-evenly py-8">
      <input
        class="
          focus:border-green focus:ring-1 focus:ring-green focus:outline-none
          w-full
          text-base text-black
          placeholder-gray-500
          border border-gray-200
          rounded-md
          py-2
          px-2
          font-medium
        "
        type="text"
        placeholder="Correo"
        name="email"
      />

      <input
        class="
          focus:border-green focus:ring-1 focus:ring-green focus:outline-none
          w-full
          text-base text-black
          placeholder-gray-500
          border border-gray-200
          rounded-md
          py-2
          px-2
          font-medium
          "
        type="password"
        placeholder="Contrasena"
        name="password"
      />
    <button class="focus:bg-green-400 py-2 px-2 rounded bg-green text-white font-medium mt-4" type="submit">Siguiente &rarr;</button>
    </form>
  </div>
</div>
<?php $this->load->view(template_frontpath('template/footer')); ?>
