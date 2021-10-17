<?php $this->load->view(template_frontpath('template/header')); ?>
  <nav
    class="fixed flex flex-row items-center justify-between w-full h-16 px-6 bg-white shadow "
  >
    <div><p class="text-2xl text-green suprema-regular">Wannafarm</p></div>
<div class="hidden lg:flex w-4/12 h-16 items-center justify-center">
<input type="text" name="search" id="" class="px-4 py-2 bg-gray-100 text-gray-500 text-base rounded-full w-full suprema-regular outline-none" placeholder="Buscar lugar">
</div>
<div class="hidden lg:flex lg:flex flex-row justify-between items-center w-6/12">
    <div
      class="
        flex
        items-center
        justify-center       
        h-16
        group
        w-full
        text-center
        hover:bg-green
        transition
        duration-300
        ease-in-out
      "
    >
      <p
        class="
          text-lg text-green
          suprema-regular
          group-hover:text-white
          transition
          duration-300
          ease-in-out
        "
      >
        <a href="<?= base_url('/Farmer') ?>"
          ><i class="far fa-home mr-3 text-xl"></i>Home</a
        >
      </p>
    </div>

    <div
      class="
        flex
        items-center
        justify-center       
        h-16
        w-full
        group
        text-center
        hover:bg-green
        transition
        duration-300
        ease-in-out
      "
    >
      <p
        class="
          text-lg text-green
          suprema-regular
          group-hover:text-white
          transition
          duration-300
          ease-in-out
        "
      >
        <a href="<?= base_url('/Farmer') ?>"
          ><i class="far fa-hand-holding-seedling mr-3 text-xl"></i>Mis Tierras</a
        >
      </p>
    </div>
    <div
      class="
        flex
        items-center
        justify-center       
        h-16
        w-full
        text-center
        group
        hover:bg-green
        transition
        duration-300
        ease-in-out
      "
    >
      <p
        class="
          text-lg text-green
          suprema-regular
          group-hover:text-white
          transition
          duration-300
          ease-in-out
        "
      >
        <a href="<?= base_url('/Farmer') ?>"
          ><i class="far fa-wheat mr-3 text-xl"></i>Mis Cultivos</a
        >
      </p>
    </div>
    <div class="w-40 ml-4 mr-2 flex items-center justify-center"><img class="rounded-full w-10 h-10" src="https://ui-avatars.com/api/?name=<?= $dataUser->nombres .
      ' ' .
      $dataUser->apellidos ?>&background=57BF77&color=fff" alt="">
</div>

</div>
    <div class="lg:hidden block"><p class="text-2xl text-green" id="open-sidebar">&#9776;</p></div>
  </nav>
  <div
    class="
      bg-green
      absolute
      left-0
      h-full
      transform
      -translate-x-full
      transition
      duration-200
      ease-in-out
      md:w-5/12
      sm:w-5/12
      w-7/12
      py-5
      flex flex-col
      items-center
      justify-start
   "
    id="sidebar"
  >
    <p class="text-white text-4xl absolute top-0 right-3" id="close-sidebar">&times;</p>
    <div class="w-full px-2 px-3 flex items-center justify-center flex-col"><img class="rounded-full w-16 h-16" src="https://ui-avatars.com/api/?name=<?= $dataUser->nombres .
      ' ' .
      $dataUser->apellidos ?>&background=fff&color=57BF77" alt="">
    <p class="text-base text-white suprema-regular mt-3"><?= $dataUser->nombres .
      ' ' .
      $dataUser->apellidos ?></p>
</div>

    <div
      class="
        mt-3
        px-2
        py-3
        w-full
        text-center
        hover:bg-white
        transition
        duration-300
        ease-in-out
      "
    >
      <p
        class="
          text-lg text-white
          suprema-regular
          hover:text-green
          transition
          duration-300
          ease-in-out
        "
      >
        <a href="<?= base_url('/Farmer') ?>"
          ><i class="far fa-home mr-3 text-xl"></i>Home</a
        >
      </p>
    </div>

    <div
      class="
        px-2
        py-3
        w-full
        text-center
        hover:bg-white
        transition
        duration-300
        ease-in-out
      "
    >
      <p
        class="
          text-lg text-white
          suprema-regular
          hover:text-green
          transition
          duration-300
          ease-in-out
        "
      >
        <a href="<?= base_url('/Farmer') ?>"
          ><i class="far fa-hand-holding-seedling mr-3 text-xl"></i>Mis Tierras</a
        >
      </p>
    </div>
    <div
      class="
        px-2
        py-3
        w-full
        text-center
        hover:bg-white
        transition
        duration-300
        ease-in-out
      "
    >
      <p
        class="
          text-lg text-white
          suprema-regular
          hover:text-green
          transition
          duration-300
          ease-in-out
        "
      >
        <a href="<?= base_url('/Farmer') ?>"
          ><i class="far fa-wheat mr-3 text-xl"></i>Mis Cultivos</a
        >
      </p>
    </div>

    <div
      class="
        px-2
        py-3
        w-full
        text-center
        hover:bg-white
        transition
        duration-300
        ease-in-out
      "
    >
      <p
        class="
          text-lg text-white
          suprema-regular
          hover:text-green
          transition
          duration-300
          ease-in-out
        "
      >
        <a href="<?= base_url('/Farmer') ?>"
          ><i class="far fa-cog mr-3 text-xl"></i>Ajustes</a
        >
      </p>
    </div>
  </div>

<div class="flex flex-col justify-center items-center w-full">
</div>

<script>
const sidebar = document.getElementById('sidebar');
const open_sidebar = document.getElementById('open-sidebar');
const close_sidebar = document.getElementById('close-sidebar');


open_sidebar.addEventListener('click', ()=>{
    sidebar.classList.toggle('-translate-x-full');
})

close_sidebar.addEventListener('click', ()=>{
    sidebar.classList.toggle('-translate-x-full');
})


</script>
<?php $this->load->view(template_frontpath('template/footer')); ?>