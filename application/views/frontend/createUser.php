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
  <div
    class="
      bg-white
      opacity-80
      w-6/12
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
          w-5/12
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
          w-5/12
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
          w-5/12
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
          w-5/12
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
          w-5/12
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
      <div class="w-5/12">
        <span class="text-gray-700">Seleccionar rol</span>
        <div class="mt-2">
          <label class="inline-flex items-center">
            <input
              type="radio"
              class="form-radio"
              name="accountType"
              value="1"
            />
            <span class="ml-2">Agricultor</span>
          </label>
          <label class="inline-flex items-center ml-6">
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
<?php $this->load->view(template_frontpath('template/footer')); ?>
