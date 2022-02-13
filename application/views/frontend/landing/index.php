<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Wannafarm | A salvadoran farm-tech company</title>

  <link rel="stylesheet" href="<?= base_url('/assets/landing/css/style.css') ?>" />
</head>

<body>
  <nav class="navbar__box">
    <div class="navbar__logo-box">
      <h2 class="u-font-regular-30 u-green-principal-font">Wannafarm</h2>
    </div>

    <div class="navbar__open" id="openMen">
      <p class="u-font-40 u-green-principal-font">&#9776;</p>
    </div>

    <div class="navbar__items-box">
      <div class="navbar__items-item">
        <a class="u-font-light-18 u-green-principal-font" style="cursor: pointer; text-decoration: none;" href="#we-do">¿Que hacemos?</a>
      </div>
      <div class="navbar__items-item">
        <a class="u-font-light-18 u-green-principal-font" style="cursor: pointer; text-decoration: none;" href="#our-team">Acerca de nosotros</a>
      </div>
      <div class="navbar__items-item">
        <a class="btn btn-small green u-font-light-18" href="<?= base_url() ?>/Login">iniciar sesion</a>
      </div>
    </div>
    <div class="navbar-small" id="menuSide">
      <div class="navbar-small__close" id="closeBtn">
        <p class="u-font-light-45 u-white-1-font">&times;</p>
      </div>
      <div class="navbar-small__box hidden" id="menuSideItems">
        <div class="navbar-small__items-box">
          <a class="u-font-light-25 u-white-1-font" style="cursor: pointer; text-decoration: none;" href="#we-do">¿Que hacemos?</a>
        </div>
        <div class="navbar-small__items-box">
          <a class="u-font-light-25 u-white-1-font" style="cursor: pointer; text-decoration: none;" href="#our-team">Acerca de nosotros</a>
        </div>
        <div class="navbar-small__items-box">
          <a class="u-font-light-25 u-white-1-font" style="cursor: pointer;" href="<?= base_url() ?>/Login">iniciar sesion</a>
        </div>
      </div>
    </div>
  </nav>

  <div class="home__banner">
    <div class="home__banner-small">
      <img class="home__banner-small-img" src="<?= base_url('/assets/landing/public/img/background-home-small.svg') ?>" alt="" />
    </div>
    <div class="home__text-description">
      <h2 class="u-font-regular-60 u-black-1-font" style="line-height: 74px; margin-bottom: 1rem">
        Alquila o renta terrenos
      </h2>
      <p class="u-font-light-18 u-black-1-font" style="line-height: 25px; width: 50rem">
        Wannafarm te ayuda a potenciar tus cultivos con herramientas tecnológicas que
        facilitan el seguimiento de tu cosecha y la venta de tus
        productos.
      </p>

    </div>
  </div>
  <div class="wedo__container" id="we-do">
    <div class="wedo__text-box" style="text-align: center">
      <h2 class="u-font-regular-40 u-black-1-font">¿Que hacemos?</h2>
      <p class="u-font-light-18 u-black-1-font" style="line-height: 22px">
        Somos una empresa tecnológica que proporciona un ecosistema tecnológico que
        para ayudar a los agricultores, ganaderos y
        proveedores de insumos agrícolas.
      </p>
    </div>
    <div class="wedo__box-features">
      <div class="wedo__text-container" style="width: 40rem">
        <h2 class="u-font-regular-40 u-black-1-font">Monitorea tus cultivos</h2>
        <p class="u-font-light-18 u-black-1-font" style="line-height: 20px">
          Con wannafarm, puedes controlar y vigilar tus cultivos, así como
          así como encontrar y gestionar los recursos que le sean de utilidad.
        </p>
      </div>
      <div class="wedo__image-container">
        <img class="wedo__feature-img" src="<?= base_url('/assets/landing/public/img/monitor_your_farm.png') ?>" alt="" />
      </div>
    </div>

    <div class="wedo__box-features ce">
      <div class="wedo__image-container">
        <img class="wedo__feature-img" src="<?= base_url('/assets/landing/public/img/sell_your_crops.png') ?>" alt="" />
      </div>

      <div class="wedo__text-container" style="width: 40rem">
        <h2 class="u-font-regular-40 u-black-1-font">Vende tus cosechas</h2>
        <p class="u-font-light-18 u-black-1-font" style="line-height: 20px">
          Con wannafarm puedes comprar productos directamente de las manos del
          agricultor, así como vender sus cosechas a compradores nacionales e
          compradores nacionales e internacionales.
        </p>
      </div>
    </div>
    <div class="wedo__box-features">
      <div class="wedo__text-container" style="width: 40rem">
        <h2 class="u-font-regular-40 u-black-1-font">Renta una parcela</h2>
        <p class="u-font-light-18 u-black-1-font" style="line-height: 20px">
          Si te ves limitado por la cantidad de
          terreno que posees,con wannafarm puedes rentar
          la cantidad de parcelas que necesites para desarrollar con exito tu proyecto.
        </p>
      </div>
      <div class="wedo__image-container">
        <img class="wedo__feature-img" src="<?= base_url('/assets/landing/public/img/rent_your_farm.png') ?>" alt="" />
      </div>
    </div>
  </div>

  <div class="our-team__container" id="our-team">
    <div class="our-team__container-box">
      <div class="our-team__text-box">
        <h2 class="u-font-regular-40 u-white-1-font">Our Team</h2>
        <p class="u-font-light-18 u-white-1-font" style="line-height: 22px">
          Un equipo de jóvenes visionarios que revolucionará la agricultura
          dotándola de herramientas tecnológicas de vanguardia.
        </p>
      </div>
      <div class="our-team__cards-container">
        <div class="our-team__cards-div">
          <div class="card">
            <div class="card__side card__side--front card__side--front-1"></div>

            <div class="card__side card__side--back card__side--back-1">
              <div class="our-team__about-me-box">
                <h3 class="u-font-regular-25 u-black-1-font">CEO</h3>
                <p class="u-font-light-20 u-black-1-font">Edenilson Batres</p>
                <p class="u-font-light-15 u-black-1-font">
                  Pretendo combinar las tecnologías emergentes con la agricultura
                  con el fin de proporcionar a la gente herramientas para mejorar la
                  producción y comercialización de productos agrícolas.
                </p>
              </div>

              <p class="u-font-regular-15 u-green-principal-font" style="position: absolute; bottom: 20px">
                Wannafarm
              </p>
            </div>
          </div>
        </div>
        <div class="our-team__cards-div">
          <div class="card">
            <div class="card__side card__side--front card__side--front-2"></div>

            <div class="card__side card__side--back card__side--back-1">
              <div class="our-team__about-me-box">
                <h3 class="u-font-regular-25 u-black-1-font">CTO</h3>
                <p class="u-font-light-20 u-black-1-font">
                  Fernando Marinero
                </p>
                <p class="u-font-light-15 u-black-1-font">
                  Me encantan las nuevas tecnologías, por lo que estoy decidido a dotar al
                  de la agronomía con herramientas tecnológicas para revolucionar
                  la forma de hacer agricultura.
                </p>
              </div>
              <p class="u-font-regular-15 u-green-principal-font" style="position: absolute; bottom: 20px">
                Wannafarm
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="form__container" id="contact-us">
    <div class="form__box-div">
      <div class="bg-video">
        <video class="bg-video__content" autoplay muted loop>
          <source src="<?= base_url('/assets/landing/public/img/video-background.mp4') ?>" type="video/mp4" />
        </video>
      </div>
      <div class="form__title-box">
        <h2 class="u-font-thin-35 u-black-1-font">
          El; futuro de la agricultura es
          <span class="u-font-regular-35 u-green-principal-font">Wannafarm</span>
        </h2>
        <p class="u-font-light-25 u-black-1-font">
          Invierte en Wannafarm y construyamos el futuro juntos
        </p>
      </div>
      <button class="btn btn-small green u-font-light-18">Button</button>
    </div>
  </div>

  <script>
    const closeMenu = () => {
      document.getElementById('menuSide').classList.remove('open');
      document.getElementById('menuSideItems').classList.add('hidden');
    };

    const openMenu = () => {
      document.getElementById('menuSide').classList.add('open');
      document.getElementById('menuSideItems').classList.remove('hidden');
    };

    document.getElementById('closeBtn').addEventListener('click', closeMenu);

    document.getElementById('openMen').addEventListener('click', openMenu);
  </script>
</body>

</html>