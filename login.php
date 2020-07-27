<?php
include 'includes/templates/header.php';
?>

<div class="center-form">
  <h1>Login</h1>
  <div class="form-container">
    <form action="#" id="users_form" method="POST">
      <div class="input-group">
        <label for="email">Correo</label>
        <input type="email"  for="email" id="email">
      </div>
      <div class="input-group">
        <label for="password">Contraseña</label>
        <input type="password" for="password" id="password">
      </div>
      <input type="hidden" id="tipo" value="login">
      <input type="submit" class="btn btn-block btn-primary" value="Iniciar Sesión">
    </form>
    <a href="signup.php">Crear Cuenta</a>
  </div>
</div>

<?php
include 'includes/templates/footer.php';
?>