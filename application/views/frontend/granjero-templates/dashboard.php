<?php $this->load->view(template_frontpath('template/header')); ?>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<style>
    .slick-dots {
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
    }

    .slick-dots li {
        position: relative;
        display: inline-block;
        width: 15px;
        height: 20px;
        margin: 0 5px;
        padding: 0;
        cursor: pointer;
    }

    .slick-dots li button {
        font-size: 0;
        line-height: 0;
        display: block;
        width: 20px;
        height: 20px;
        padding: 5px;
        cursor: pointer;
        color: transparent;
        border: 0;
        outline: none;
        background: transparent;
    }

    .slick-dots li button:before {
        content: '•';
        font-size: 40px;
        line-height: 20px;
        position: absolute;
        top: 0;
        left: 0;
        width: 20px;
        height: 20px;
        text-align: center;
        opacity: .4;
        color: #fff;
    }

    .slick-dots .slick-active button:before {
        opacity: .9;
    }
</style>
<nav class="fixed flex flex-row items-center justify-between w-full h-16 px-6 bg-white shadow top-0 left-0 z-10">
    <div>
        <p class="text-2xl text-green suprema-regular">Wannafarm</p>
    </div>
    <div class="hidden lg:flex w-4/12 h-16 items-center justify-center">
        <input type="text" name="search" id="" class="px-4 py-2 bg-gray-100 text-gray-500 text-base rounded-full w-full suprema-regular outline-none" placeholder="Buscar lugar">
    </div>
    <div class="hidden lg:flex lg:flex flex-row justify-between items-center w-5/12">
        <div class="
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
      ">
            <p class="
          text-base text-green
          suprema-regular
          group-hover:text-white
          transition
          duration-300
          ease-in-out
        ">
                <a href="<?= base_url('/Farmer') ?>"><i class="far fa-home mr-3 text-lg"></i>Home</a>
            </p>
        </div>

        <div class="
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
      ">
            <p class="
          text-base text-green
          suprema-regular
          group-hover:text-white
          transition
          duration-300
          ease-in-out
        ">
                <a href="<?= base_url('/Farmer') ?>"><i class="far fa-hand-holding-seedling mr-3 text-lg"></i>Mis
                    Tierras</a>
            </p>
        </div>
        <div class="
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
      ">
            <p class="
          text-base text-green
          suprema-regular
          group-hover:text-white
          transition
          duration-300
          ease-in-out
        ">
                <a href="<?= base_url('/Farmer') ?>"><i class="far fa-wheat mr-3 text-lg"></i>Mis Cultivos</a>
            </p>
        </div>
        <div class="w-40 ml-4 mr-2 flex items-center justify-center"><img class="rounded-full w-10 h-10" src="<?= getAvatarByName(); ?>" alt="">
        </div>

    </div>
    <div class="lg:hidden block">
        <p class="text-2xl text-green" id="open-sidebar">&#9776;</p>
    </div>
</nav>
<div class="
      bg-green
     fixed 
      left-0
      top-0
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
      z-50
   " id="sidebar">
    <p class="text-white text-4xl absolute top-0 right-3" id="close-sidebar">&times;</p>
    <div class="w-full px-2 px-3 flex items-center justify-center flex-col"><img class="rounded-full w-16 h-16" src="<?= getAvatarByName(); ?>" alt="">
        <p class="text-base text-white suprema-regular mt-3"><?= $dataUser->nombres .
                                                                    ' ' .
                                                                    $dataUser->apellidos ?></p>
    </div>

    <div class="
        mt-3
        px-2
        py-3
        w-full
        text-center
        hover:bg-white
        transition
        duration-300
        ease-in-out
      ">
        <p class="
          text-lg text-white
          suprema-regular
          hover:text-green
          transition
          duration-300
          ease-in-out
        ">
            <a href="<?= base_url('/Farmer') ?>"><i class="far fa-home mr-3 text-xl"></i>Home</a>
        </p>
    </div>

    <div class="
        px-2
        py-3
        w-full
        text-center
        hover:bg-white
        transition
        duration-300
        ease-in-out
      ">
        <p class="
          text-lg text-white
          suprema-regular
          hover:text-green
          transition
          duration-300
          ease-in-out
        ">
            <a href="<?= base_url('/Farmer') ?>"><i class="far fa-hand-holding-seedling mr-3 text-xl"></i>Mis
                Tierras</a>
        </p>
    </div>
    <div class="
        px-2
        py-3
        w-full
        text-center
        hover:bg-white
        transition
        duration-300
        ease-in-out
      ">
        <p class="
          text-lg text-white
          suprema-regular
          hover:text-green
          transition
          duration-300
          ease-in-out
        ">
            <a href="<?= base_url('/Farmer') ?>"><i class="far fa-wheat mr-3 text-xl"></i>Mis Cultivos</a>
        </p>
    </div>

    <div class="
        px-2
        py-3
        w-full
        text-center
        hover:bg-white
        transition
        duration-300
        ease-in-out
      ">
        <p class="
          text-lg text-white
          suprema-regular
          hover:text-green
          transition
          duration-300
          ease-in-out
        ">
            <a href="<?= base_url('/Farmer') ?>"><i class="far fa-cog mr-3 text-xl"></i>Ajustes</a>
        </p>
    </div>
</div>

<div class="mt-16">
    <div class="flex flex-col justify-center items-center w-full px-7">
        <div class="h-22 w-full pt-5">
            <h2 class="text-4xl text-gray-800 suprema-regular"><?= $saludo ?>!</h2>
        </div>
        <div class="flex flex-col justify-center items-start w-full pt-5 md:flex-row md:flex-wrap md:justify-evenly">
            <div class="w-full bg-white mb-4 md:w-80 lg:w-72">
                <div class="carrousel">
                    <img src="<?= base_url('/assets/images/bg-test.jpg') ?>" alt="" class="w-full h-48 object-cover rounded-md">

                    <img src="<?= base_url('/assets/images/bg-test.jpg') ?>" alt="" class="w-full h-48 object-cover rounded-md">
                </div>
                <div class="px-3 py-1 flex flex-col justify-between items-start h-32">
                    <p class="text-lg text-gray-700 suprema-regular">Finca Libertad - Sonsonate</p>
                    <p class="text-base text-gray-700 suprema-medium">Lorem ipsum consequatur mollitia fugit</p>
                    <p class="text-lg text-gray-700 suprema-semibold">$200/Mes</p>
                </div>
            </div>

            <div class="w-full bg-white mb-4 md:w-80 lg:w-72">
                <div class="carrousel">
                    <img src="<?= base_url('/assets/images/bg-test.jpg') ?>" alt="" class="w-full h-48 object-cover rounded-md">

                    <img src="<?= base_url('/assets/images/bg-test.jpg') ?>" alt="" class="w-full h-48 object-cover rounded-md">
                </div>
                <div class="px-3 py-1 flex flex-col justify-between items-start h-32">
                    <p class="text-lg text-gray-700 suprema-regular">Finca Libertad - Sonsonate</p>
                    <p class="text-base text-gray-700 suprema-medium">Lorem ipsum consequatur mollitia fugit</p>
                    <p class="text-lg text-gray-700 suprema-semibold">$200/Mes</p>
                </div>
            </div>
            <div class="w-full bg-white mb-4 md:w-80 lg:w-72">
                <div class="carrousel">
                    <img src="<?= base_url('/assets/images/bg-test.jpg') ?>" alt="" class="w-full h-48 object-cover rounded-md">

                    <img src="<?= base_url('/assets/images/bg-test.jpg') ?>" alt="" class="w-full h-48 object-cover rounded-md">
                </div>
                <div class="px-3 py-1 flex flex-col justify-between items-start h-32">
                    <p class="text-lg text-gray-700 suprema-regular">Finca Libertad - Sonsonate</p>
                    <p class="text-base text-gray-700 suprema-medium">Lorem ipsum consequatur mollitia fugit</p>
                    <p class="text-lg text-gray-700 suprema-semibold">$200/Mes</p>
                </div>
            </div>
            <div class="w-full bg-white mb-4 md:w-80 lg:w-72">
                <div class="carrousel">
                    <img src="<?= base_url('/assets/images/bg-test.jpg') ?>" alt="" class="w-full h-48 object-cover rounded-md">

                    <img src="<?= base_url('/assets/images/bg-test.jpg') ?>" alt="" class="w-full h-48 object-cover rounded-md">
                </div>
                <div class="px-3 py-1 flex flex-col justify-between items-start h-32">
                    <p class="text-lg text-gray-700 suprema-regular">Finca Libertad - Sonsonate</p>
                    <p class="text-base text-gray-700 suprema-medium">Lorem ipsum consequatur mollitia fugit</p>
                    <p class="text-lg text-gray-700 suprema-semibold">$200/Mes</p>
                </div>
            </div>
            <div class="w-full bg-white mb-4 md:w-80 lg:w-72">
                <div class="carrousel">
                    <img src="<?= base_url('/assets/images/bg-test.jpg') ?>" alt="" class="w-full h-48 object-cover rounded-md">

                    <img src="<?= base_url('/assets/images/bg-test.jpg') ?>" alt="" class="w-full h-48 object-cover rounded-md">
                </div>
                <div class="px-3 py-1 flex flex-col justify-between items-start h-32">
                    <p class="text-lg text-gray-700 suprema-regular">Finca Libertad - Sonsonate</p>
                    <p class="text-base text-gray-700 suprema-medium">Lorem ipsum consequatur mollitia fugit</p>
                    <p class="text-lg text-gray-700 suprema-semibold">$200/Mes</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
    const sidebar = document.getElementById('sidebar');
    const open_sidebar = document.getElementById('open-sidebar');
    const close_sidebar = document.getElementById('close-sidebar');


    open_sidebar.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');
    })

    close_sidebar.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');
    })

    $('.carrousel').slick({
        dots: true,
        arrows: false,
    });
</script>
<?php $this->load->view(template_frontpath('template/footer')); ?>