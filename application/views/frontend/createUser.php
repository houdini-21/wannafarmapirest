<?php $this->load->view(template_frontpath('template/header')); ?>
 <h2>Crear perfil usuario</h2>
    <form action="<?= base_url('/login/createPerson') ?>" method="post">
      <input type="hidden" name="id_cuenta" value="<?= $id ?>" />
      <br />
      <br />
      <input type="text" name="name" placeholder="nombre" />
      <br />
      <br />
      <input type="text" name="lastname" placeholder="apellido" />
      <br />
      <br />
      <input type="number" name="age" placeholder="edad" />
      <br />
      <br />
      <input type="text" name="address" placeholder="direccion" />
      <br />
      <br />
      <input type="numbre" name="phone" placeholder="numero telefono" />
      <br />
      <br />
      <button type="submit">enviar</button>
    </form>
<?php $this->load->view(template_frontpath('template/footer')); ?>
