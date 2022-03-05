<?php $this->load->view(template_frontpath('template/header')); ?>

<div class="h-screen w-screen bg-white flex justify-center items-center">
  <div
    class="
      bg-transparente
      w-10/12
      lg:w-6/12
      p-8 
      flex flex-col
      items-center
      justify-around
    h-full
    "
  >
    <h2 class="suprema-regular lg:text-7xl md:text-6xl text-5xl text-center text-green">Wannafarm</h2>
    <p class="suprema-medium text-3xl lg:text-4xl text-center text-black"><?= $message ?> </p>
  </div>
</div>
<script>
  setTimeout(function() {
    window.location.href = base_url + 'login';
  }, 3000);
</script>
<?php $this->load->view(template_frontpath('template/footer')); ?>
