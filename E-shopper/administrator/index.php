<?php include_once('page/head.php') ?>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="email" value="name@example.com" name="email" />
                                            <label for="inputEmail">Email address</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" type="password" value="password" name="password" />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                            <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                        </div>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <input style="width: 100%;" class="btn btn-primary" type="submit" value="Login" name="login">
                                </div>
                                </form>
                            </div>  
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <?php
    // login
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        if ($email == "name@example.com" && $password == "password") {
            $_SESSION['user'] = $row;
            echo "<script>alert('Login berhasil')</script>";
            echo "<script>window.location.href='dashboard.php'</script>";
        } else {
            echo "<script>alert('Email atau password salah')</script>";
        }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>