<?php $this->load->view(template_frontpath("template/header")); ?>
    <h2>crear cuenta</h2>
    <form action="<?= base_url("/login/createUser") ?>" method="post">
      <input type="text" name="email" id="email" placeholder="correo"/>
      <br>
      <br>
      <input type="password" name="password" id="password" placeholder="contrasena"/>
      <br>
      <br>
      <button type="submit">enviar</button>
    </form>
<?php $this->load->view(template_frontpath("template/footer")); ?>

