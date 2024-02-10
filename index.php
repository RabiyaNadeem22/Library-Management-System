<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php
    $emailmsg = "";
    $pasdmsg = "";
    $msg = "";

    $ademailmsg = "";
    $adpasdmsg = "";


    if (!empty($_REQUEST['ademailmsg'])) {
        $ademailmsg = $_REQUEST['ademailmsg'];
    }

    if (!empty($_REQUEST['adpasdmsg'])) {
        $adpasdmsg = $_REQUEST['adpasdmsg'];
    }

    if (!empty($_REQUEST['emailmsg'])) {
        $emailmsg = $_REQUEST['emailmsg'];
    }

    if (!empty($_REQUEST['pasdmsg'])) {
        $pasdmsg = $_REQUEST['pasdmsg'];
    }

    if (!empty($_REQUEST['msg'])) {
        $msg = $_REQUEST['msg'];
    }

    ?>


    <div class="container  login-container">
    <h1>Library Management System</h1>
        <hr>
        <br>
        <div class="row ">
            <h4><?php echo $msg ?></h4>
        </div>
        <div class="row ">
            <div class="col-md-5 login-form-1">
                <h3>Student Login</h3>
                <form action="login_server_page.php" method="get">
                    <div class="form-group">
                        <input type="text" class="form-control" name="login_email" placeholder="Your Email Address" value="" />
                    </div>
                    <Label style="color:red"><?php echo $emailmsg ?></label>
                    <div class="form-group">
                        <input type="password" class="form-control" name="login_pasword" placeholder="Your Password " value="" />
                    </div>
                    <Label style="color:red"><?php echo $pasdmsg ?></label>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit " value="Login" />
                    </div>
                </form>
            </div>
            <div class="col-md-2 "></div>
            <div class="col-md-5 login-form-2">
                <h3>Admin Login</h3>
                <form action="loginadmin_server_page.php" method="get">
                    <div class="form-group">
                        <input type="text" class="form-control" name="login_email" placeholder="Your Email " value="" />
                    </div>
                    <Label style="color:red"><?php echo $ademailmsg ?></label>
                    <div class="form-group">
                        <input type="password" class="form-control" name="login_pasword" placeholder="Your Password " value="" />
                    </div>
                    <Label style="color:red"><?php echo $adpasdmsg ?></label>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Login" />
                    </div>
                    <div class="form-group">


                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>