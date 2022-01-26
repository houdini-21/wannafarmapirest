<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wannafarm | Una startup salvadorena</title>
    <link rel="stylesheet" href="<?= base_url('/assets/landing/css/style.css')?>"/> 
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  </head>
  <body>
    <nav class="navbar__box">
      <div class="navbar__logo-box">
        <h2 class="u-font-regular-30 u-green-principal-font">Wannafarm</h2>
      </div>
      <div class="navbar__items-box">
        <div class="navbar__items-item">
          <p class="u-font-light-18 u-green-principal-font">¿que hacemos?</p>
        </div>
        <div class="navbar__items-item">
          <p class="u-font-light-18 u-green-principal-font">hacerca de nosotros</p>
        </div>
        <div class="navbar__items-item">
          <a class="btn btn-small green u-font-light-18" href="<?= base_url()?>index.php/Login">iniciar sesion</a>
        </div>
      </div>
    </nav>
    <div class="home__banner">
      <div
        class="home__text-description"
        data-aos="fade-left"
        data-aos-offset="300"
        data-aos-easing="ease-in-sine"
      >
        <h4
          class="u-font-regular-60 u-black-1-font"
          style="line-height: 50px; margin-bottom: 1rem"
        >
          Alquila terrenos que no ocupes o renta terrenos para tus proyectos agricolas
        </h4>
        <p
          class="u-font-light-18 u-black-1-font"
          style="line-height: 20px; width: 60rem"
        >
          wannafarm pone a tu dispocicion una gama de herramientas para convertir tus parecelas que no ocupas en una fuente de ingreso
        </p>

        <a
          class="btn btn-small green u-font-light-18"
          style="margin: 1.8rem; margin-left: 0"
          href="<?= base_url()?>index.php/Login"
          >Comenzar &rarr;</a>
      </div>
    </div>
    <div class="wedo__container">
      <div class="wedo__text-box" style="width: 40%; text-align: center">
        <h2 class="u-font-regular-40 u-black-1-font">¿que hacemos?</h2>
        <p class="u-font-light-18 u-black-1-font" style="line-height: 22px">
         en wannafarm puedes encontrar el terreno que tu decees en dimenciones, calidad, tamaño, precio segun sean tus necesidades
        </p>
      </div>
      <div
        class="wedo__box-features"
        data-aos="fade-left"
        data-aos-offset="300"
        data-aos-easing="ease-in-sine"
      >
        <div class="wedo__text-container" style="width: 40rem">
          <h2 class="u-font-regular-40 u-black-1-font">Alquila tu parcela</h2>
          <p class="u-font-light-18 u-black-1-font" style="line-height: 20px">
            si tienes una extencion de terreno que no ocupes, puedes ponerla  a dispocicion  de otros productores para que la trabajen y tu obtienes un ingreso por ella
          </p>
          <a
          class="btn btn-small green u-font-light-18"
          style="margin: 1.8rem; margin-left: 0"
          href="<?= base_url()?>index.php/Login"
          >Comenzar &rarr;</a>

            
        </div>
        <div class="wedo__image-container">
          <img
            class="wedo__feature-img"
            src="<?= base_url('/assets/landing/public/img/monitor_your_farm.png')?>"
            alt=""
          />
        </div>
      </div>

      <img
        class="wedo_lines-img"
        src="<?= base_url('/assets/landing/public/img/lineas.png')?>"
        alt=""
        style="position: absolute; top: 26%; height: 42rem"
      />
      <div
        class="wedo__box-features"
        data-aos="fade-left"
        data-aos-offset="300"
        data-aos-easing="ease-in-sine"
      >
        <div class="wedo__image-container">
          <img
            class="wedo__feature-img"
            src="<?= base_url('/assets/landing/public/img/sell_your_crops.png')?>"
            alt=""
          />
        </div>

        <div class="wedo__text-container" style="width: 40rem">
          <h2 class="u-font-regular-40 u-black-1-font">Renta una parcela</h2>
          <p class="u-font-light-18 u-black-1-font" style="line-height: 20px">
            si eres un productor que se ve limitado por la cantidad de terreno que posees, no te preocupes, en wannafarm puedes rentar la cantidad de parcelas que necestes para desarrollar con exito tu proyecto
          </p>
          <a
          class="btn btn-small green u-font-light-18"
          style="margin: 1.8rem; margin-left: 0"
          href="<?= base_url()?>index.php/Login"
          >Comenzar &rarr;</a>
        </div>
      </div>

      <img
        class="wedo_lines-img"
        src="<?= base_url('/assets/landing/public/img/lineas-reverse.png')?>"
        alt=""
        style="position: absolute; height: 42rem; bottom: 19%"
      />
      <div
        class="wedo__box-features"
        data-aos="fade-right"
        data-aos-offset="300"
        data-aos-easing="ease-in-sine"
      >
        <div class="wedo__text-container" style="width: 40rem">
          <h2 class="u-font-regular-40 u-black-1-font">Te preocupa tu cultivo o tu ganado</h2>
          <p class="u-font-light-18 u-black-1-font" style="line-height: 20px">
            En wannafarm encuentras herramientas tecnologicas para monitorear tus cultivos o tus animales sin  importar la distancia a la que se encuentren
          </p>
          <a
          class="btn btn-small green u-font-light-18"
          style="margin: 1.8rem; margin-left: 0"
          href="<?= base_url()?>index.php/Login"
          >Comenzar &rarr;</a>
        </div>
        <div class="wedo__image-container">
          <img
            class="wedo__feature-img"
            src="<?= base_url('/assets/landing/public/img/rent_your_farm.png')?>"
            alt=""
          />
        </div>
      </div>
    </div>

    <div class="our-team__container">
      <div class="our-team__container-box">
        <div class="our-team__text-box">
          <h2 class="u-font-regular-40 u-white-1-font">Our Team</h2>
          <p class="u-font-light-18 u-white-1-font" style="line-height: 22px">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut
            scelerisque nisl lacus, arcu.
          </p>
        </div>
        <div class="our-team__cards-container">
          <div class="our-team__cards-div">
            <div class="card">
              <div
                class="card__side card__side--front card__side--front-1"
              ></div>

              <div class="card__side card__side--back card__side--back-1">
                <div class="our-team__about-me-box">
                  <h3 class="u-font-regular-25 u-black-1-font">CEO</h3>
                  <p class="u-font-light-20 u-black-1-font">Edenilson Batres</p>
                  <p class="u-font-light-15 u-black-1-font">
                    Lorem ipsum dolor sit amet, consectetur adipiscing
                    elit.Lorem ipsum dolor sit amet, consectetur adipiscing
                    elit.
                  </p>
                </div>

                <p
                  class="u-font-regular-15 u-green-principal-font"
                  style="position: absolute; bottom: 20px"
                >
                  Wannafarm
                </p>
              </div>
            </div>
          </div>
          <div class="our-team__cards-div">
            <div class="card">
              <div
                class="card__side card__side--front card__side--front-2"
              ></div>

              <div class="card__side card__side--back card__side--back-1">
                <div class="our-team__about-me-box">
                  <h3 class="u-font-regular-25 u-black-1-font">CTO</h3>
                  <p class="u-font-light-20 u-black-1-font">
                    Fernando Marinero
                  </p>
                  <p class="u-font-light-15 u-black-1-font">
                    Lorem ipsum dolor sit amet, consectetur adipiscing
                    elit.Lorem ipsum dolor sit amet, consectetur adipiscing
                    elit.
                  </p>
                </div>
                <p
                  class="u-font-regular-15 u-green-principal-font"
                  style="position: absolute; bottom: 20px"
                >
                  Wannafarm
                </p>
              </div>
            </div>
          </div>

          <div class="our-team__cards-div">
            <div class="card">
              <div
                class="card__side card__side--front card__side--front-3"
              ></div>

              <div class="card__side card__side--back card__side--back-1">
                <div class="our-team__about-me-box">
                  <h3 class="u-font-regular-25 u-black-1-font">CCO</h3>
                  <p class="u-font-light-20 u-black-1-font">Francesca Madrid</p>
                  <p class="u-font-light-15 u-black-1-font">
                    Lorem ipsum dolor sit amet, consectetur adipiscing
                    elit.Lorem ipsum dolor sit amet, consectetur adipiscing
                    elit.
                  </p>
                </div>

                <p
                  class="u-font-regular-15 u-green-principal-font"
                  style="position: absolute; bottom: 20px"
                >
                  Wannafarm
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="form__container">
      <div class="form__box-div">
        <div class="bg-video">
          <video class="bg-video__content" autoplay muted loop>
            <source src="./public/img/video-background.mp4" type="video/mp4" />
          </video>
        </div>
        <div class="form__title-box">
          <h2 class="u-font-thin-35 u-black-1-font">
            The future of farming is
            <span class="u-font-regular-35 u-green-principal-font"
              >Wannafarm</span
            >
          </h2>
          <p class="u-font-light-25 u-black-1-font">
            Invest in Wannafarm and let's build the future together
          </p>
        </div>
        <button class="btn btn-small green u-font-light-18">Button</button>
      </div>
    </div>
    <footer class="footer">
      <div class="footer__text-box">
        <h2 class="u-font-regular-45 u-white-1-font">Wannafarm</h2>
        <div class="footer__links-page">
          <a class="u-font-light-20 u-white-1-font link" href="">What we do</a>
          <a class="u-font-light-20 u-white-1-font link" href="">About us</a>
          <a class="u-font-light-20 u-white-1-font link" href="">Contact us</a>
        </div>
        <div class="footer__links-social">
          <a href="#">
            <img
              class="footer__social-icons"
              src="./public/img/twitter.png"
              alt=""
            />
          </a>

          <a href="">
            <img
              class="footer__social-icons"
              src="./public/img/youtube.png"
              alt=""
            />
          </a>
        </div>
      </div>

      <p
        class="footer__special u-font-light-16 u-white-1-font"
        style="left: 1rem"
      >
        Wannafarm 2021 &copy;
      </p>
      <p
        class="footer__special u-font-light-16 u-white-1-font"
        style="right: 1rem"
      >
        Site developed and designed by houdini-21
      </p>
    </footer>
    <script>
      AOS.init();
    </script>
  </body>
</html>
