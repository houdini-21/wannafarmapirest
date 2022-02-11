<?php $this->load->view(template_frontpath("template/header")); ?>
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
  <div class="bg-white opacity-80 h-96 w-72 md:w-80 p-8 rounded flex flex-col items-center justify-center">
    <h2 class="suprema-regular text-3xl text-center text-green">Wannafarm</h2>
    <p class="suprema-medium text-2xl text-center">Iniciar sesion</p>
    <form action="<?= base_url("/login/loginUser") ?>" method="post" class="h-5/6 w-full flex flex-col justify-evenly py-8">
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
          suprema-medium
        "
        type="text"
        placeholder="Correo"
        name="email"
        required
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
          suprema-medium
          "
        type="password"
        placeholder="Contrasena"
        name="password"
        required
      />
    <button class="focus:bg-green-400 py-2 px-2 rounded bg-green text-white suprema-medium mt-4" type="submit">Iniciar sesion</button>
    </form>
    <a class="suprema-medium text-base text-green underline" href="<?= base_url('/login/signin') ?>">Crear una cuenta</a>

  </div>
</div>
<?php $this->load->view(template_frontpath("template/footer")); ?>

