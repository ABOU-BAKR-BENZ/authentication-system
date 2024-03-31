<?php require "includes/header.php"; ?>
<?php require "config.php"; ?>
<?php
if (isset($_SESSION['username'])) {
  header("location: index.php");
}

if (isset($_POST['submit'])) {
  if (!$_POST['email'] or !$_POST['username'] or !$_POST['password']) {
?>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
      </symbol>
    </svg>
    <div class="alert alert-danger d-flex align-items-center justify-content-center fs-5 fw-bold mb-1" role="alert">
      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
        <use xlink:href="#exclamation-triangle-fill" />
      </svg>
      <div>
        Some inputs are empty! Please verify your information.
      </div>
    </div>
    <?php
  } else {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $register = $conn->query("SELECT * FROM users WHERE email = '$email'");
    $register->execute();

    if ($register->rowCount() > 0) {
    ?>
      <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
      </svg>

      <div class="alert alert-danger d-flex align-items-center justify-content-center fs-5 fw-bold mb-1" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
          <use xlink:href="#exclamation-triangle-fill" />
        </svg>
        <div>
          This Email address is registered before, Please try another Email address Or you can <a href="login.php" class="text-danger">Login</a>
        </div>
      </div>
      <?php
    } else {
      $allVerified = true;

      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      ?>
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
          <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
          </symbol>
        </svg>

        <div class="alert alert-warning d-flex align-items-center justify-content-center fs-5 fw-bold mb-1" role="alert">
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
            <use xlink:href="#exclamation-triangle-fill" />
          </svg>
          <div>
            Please enter a valid Email address.
          </div>
        </div>
      <?php
        $allVerified = false;
      }
      if (strlen($password) < 8) {
      ?>
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
          <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
          </symbol>
        </svg>

        <div class="alert alert-warning d-flex align-items-center justify-content-center fs-5 fw-bold mb-1" role="alert">
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
            <use xlink:href="#exclamation-triangle-fill" />
          </svg>
          <div>
            Please enter a valid password.
          </div>
        </div>
      <?php
        $allVerified = false;
      }
      if (strlen($username) < 6) {
      ?>
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
          <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
          </symbol>
        </svg>

        <div class="alert alert-warning d-flex align-items-center justify-content-center fs-5 fw-bold mb-1" role="alert">
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
            <use xlink:href="#exclamation-triangle-fill" />
          </svg>
          <div>
            Please enter a valid username.
          </div>
        </div>
<?php
        $allVerified = false;
      }
      if ($allVerified) {
        $insert = $conn->prepare('INSERT INTO users (email, username, mypassword) VALUES (:email,:username,:mypassword)');
        $insert->execute(
          [
            ':email' => $email,
            ':username' => $username,
            ":mypassword" => password_hash($password, PASSWORD_DEFAULT),
          ]
        );
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;

        header("location:index.php");
      }
    }
  }
}
?>


<main class="form-signin w-50 m-auto">
  <form method="POST" action="register.php">

    <h1 class="h3 mt-5 fw-normal text-center fw-bold fs-2">Please Register</h1>

    <div class="form-floating mb-3">
      <input name="email" type="" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>

    <div class="form-floating mb-3">
      <input name="username" type="text" class="form-control" id=" mb-3Input" placeholder="username">
      <label for="floatingInput">Username</label>
    </div>

    <div class="form-floating mb-3">
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <button name="submit" class="w-100 btn btn-lg btn-dark" type="submit">Register</button>
    <h6 class="mt-3">Aleardy have an account? <a href="login.php">Login</a></h6>

  </form>
</main>
<?php require "includes/footer.php"; ?>