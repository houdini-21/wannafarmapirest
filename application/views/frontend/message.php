<?php $this->load->view(template_frontpath('template/header')); ?>

<div class="h-screen w-screen bg-white flex justify-center items-center">
  <div
    class="
      bg-transparente
      w-8/12
      p-8
      rounded
      flex flex-col
      items-center
      justify-around
    h-full
    "
  >
    <h2 class="suprema-regular text-7xl text-center text-green">Wannafarm</h2>
    <p class="suprema-medium text-4xl text-center text-black"><?= $message ?> </p>
  </div>
</div>
<?php $this->load->view(template_frontpath('template/footer')); ?>
