<?php require "includes/header.php"; ?>
<?php require "config.php"; ?>

<?php
if (isset($_SESSION['username'])) {
  header("location: index.php");
}
if (isset($_POST['submit'])) {
  if (!$_POST['email'] or !$_POST['password']) {
?>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
      </symbol>
    </svg>

    <div class="alert alert-danger d-flex align-items-center justify-content-center fs-5 fw-bold" role="alert">
      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
        <use xlink:href="#exclamation-triangle-fill" />
      </svg>
      <div>
        Some inputs are empty! Please verify your credentials.
      </div>
    </div>
    <?php

  } else {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $login = $conn->query("SELECT * FROM users WHERE email = '$email'");
    $login->execute();

    $data = $login->fetch(PDO::FETCH_ASSOC);
    if ($login->rowCount() > 0) {
      if (password_verify($password, $data['mypassword'])) {
        $_SESSION['username'] = $data['username'];
        $_SESSION['email'] = $data['email'];

        header("location:index.php");
      } else {
    ?>
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
          <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
          </symbol>
        </svg>

        <div class="alert alert-danger d-flex align-items-center justify-content-center fs-5 fw-bold" role="alert">
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
            <use xlink:href="#exclamation-triangle-fill" />
          </svg>
          <div>
            Email or passowrd is wrong! Please verify your credentials.
          </div>
        </div>
      <?php
      }
    } else {
      ?>
      <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
      </svg>

      <div class="alert alert-danger d-flex align-items-center justify-content-center fs-5 fw-bold" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
          <use xlink:href="#exclamation-triangle-fill" />
        </svg>
        <div>
          User not found! Please verify your credentials. Or you can <a href="./register.php" class="text-danger">Register</a>
        </div>
      </div>
<?php
    }
  }
}
?>

<main class="form-signin w-50 m-auto">
  <form method="POST" action="login.php">
    <h1 class="h3 mt-5 fw-normal text-center fw-bold fs-2">Please Sign-in</h1>

    <div class="form-floating mb-3">
      <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating mb-3">
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <button name="submit" class="w-100 btn btn-lg btn-dark" type="submit">Sign in</button>
    <h6 class="mt-3">Don't have an account: <a href="register.php" class="">Create your account</a></h6>
  </form>
</main>
<?php require "includes/footer.php"; ?>