<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wannafarm</title>
    <link rel="stylesheet" href="<?= base_url('/assets/css/styles.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/assets/css/fontawesome.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('/assets/css/all.css') ?>" />
</head>

<body id="root">
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
            height: 25px;
            margin: 0 5px;
            padding: 0;
            cursor: pointer;
        }

        .slick-dots li button {
            font-size: 0;
            line-height: 0;
            display: block;
            width: 25px;
            height: 25px;
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
    <nav class="bg-white shadow-lg mb-5 fixed top-0 w-full z-10">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between">
                <div class="flex space-x-7">
                    <div>
                        <a href="#" class="flex items-center py-4 px-2">
                            <span class="suprema-regular text-green-500 text-xl">Wannafarm</span>
                        </a>
                    </div>
                    <div class="hidden md:flex items-center space-x-1">
                        <a href="<?= base_url('landlord/') ?>" class="py-4 px-6 text-green-500 border-b-4 border-green-500 suprema-regular capitalize">Mis parcelas</a>
                        <a href="" class="py-4 px-6 text-gray-500 suprema-regular hover:text-green-500 transition duration-300 capitalize">Parcelas en uso</a>
                        <a href="<?= base_url('landlord/crearParcela') ?>" class="py-4 px-6 text-gray-500 suprema-regular hover:text-green-500 transition duration-300 capitalize">Agregar nueva parcela</a>
                    </div>
                </div>
                <div class="hidden md:flex items-center space-x-3 ">
                    <a href="<?= base_url('login/logout') ?>" class="py-2 px-2 suprema-regular text-red-600 rounded hover:bg-red-600 hover:text-white transition duration-300 capitalize"><i class="far fa-sign-out text-2xl"></i></a>
                </div>
                <div class="md:hidden flex items-center">
                    <button class="outline-none mobile-menu-button">
                        <svg class=" w-6 h-6 text-gray-500 hover:text-green-500 " x-show="!showMenu" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- mobile menu -->
        <div class="hidden mobile-menu">
            <ul class="">
                <li class="active"><a href="<?= base_url('landlord/') ?>" class="block text-sm px-2 py-4 text-white bg-green-500 suprema-regular capitalize">Mis parcelas</a></li>
                <li><a href="#" class="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300 suprema-regular capitalize">Parcelas en uso</a></li>
                <li><a href="<?= base_url('landlord/crearParcela') ?>" class="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300 suprema-regular capitalize">Agregar nueva parcela</a></li>
                <li><a href="<?= base_url('login/logout') ?>" class="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300 suprema-regular capitalize">Cerrar sesion</a></li>
            </ul>
        </div>
        <script>
            const btn = document.querySelector("button.mobile-menu-button");
            const menu = document.querySelector(".mobile-menu");

            btn.addEventListener("click", () => {
                menu.classList.toggle("hidden");
            });
        </script>
    </nav>
    <div class="mt-20">
        <?php show_message(); ?>