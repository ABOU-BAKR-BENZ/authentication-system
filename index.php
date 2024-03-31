<?php require "includes/header.php"; ?>
<section style="background-image:url(https://images.pexels.com/photos/7130560/pexels-photo-7130560.jpeg);background-size:cover;height:100vh;">
    <div class="row p-5 align-items-center">
        <div class="col-md-6">
            <h1 class="fw-bold fs-1">Authentication System</h1>
            <p>
                This PHP website includes a streamlined authentication system for secure user access. It verifies identities with usernames and passwords. Crafted with PHP and MySQL, it prioritizes user privacy and safeguards website integrity.</p>
            <?php if (isset($_SESSION['username'])) : ?>
                <div class="mt-4 ms-5">
                    <a href="./logout.php" class="btn btn-dark w-25">Log Out</a>
                </div>
            <?php else : ?>
                <div class="d-flex gap-2 mt-4 justify-content-center">
                    <a href="./login.php" class="btn btn-dark w-25 fw-bold fs-5">Login</a>
                    <a href="./register.php" class="btn btn-outline-dark w-25 fw-bold fs-5">Register</a>
                </div>
            <?php endif ?>
        </div>
        <div class="col-md-6 mt-5 text-center">
            <img src="https://images.pexels.com/photos/18662650/pexels-photo-18662650/free-photo-of-orange-lens-in-the-dark.png" class="img-fluid rounded-circle w-75" alt="">
        </div>
    </div>
</section>

<?php require "includes/footer.php"; ?>