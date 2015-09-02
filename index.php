<?php

include("login.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>My secret diary!</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">

        .navbar-brand {
            font-size: 1.8em;
        }

        #topContainer {
            background-image: url("images/39H.jpg");
            width: 100%;
            background-size: cover;
        }

        #topRow {
            margin-top: 100px;
            text-align: center;
            color: #737373;
            font-size: 1.5em;
        }

        #topRow h1 {
            font-size: 300%;
        }

        .bold {
            font-weight: bold;
        }

        .marginTop {
            margin-top: 30px;
        }

        .center {
            text-align: center;
        }

        .title {
            margin-top: 100px;
            font-size: 300%;
        }

        #footer {
            background-color: #0078A8;
            padding-top: 70px;
            width: 100%;
        }

        .marginBottom {
            margin-bottom: 30px;
        }

        .appStoreImage {
            width: 250px;
        }
    </style>
</head>
<body>

<div class="navbar navbar-default navbar-fixed-top">
    <div class="container" >
        <div class="navbar-header" >
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" >
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">Secret Diary</a>
        </div>
        <div class="collapse navbar-collapse">
            <form class="navbar-form navbar-right" method="post">
                <div class="form-group">
                    <input type="email" class="form-control" name="loginemail" id="loginemail" value="<?php echo addslashes($_POST['loginemail']); ?>"
                           placeholder="Email"/>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="loginpassword" placeholder="Password"/>
                </div>
                <input type="submit" name="submit" class="btn btn-success" value="Log In"/>
            </form>
        </div>
    </div>
</div>

<div id="topContainer" class="container contentContainer">
    <div class="row">
        <div class="col-md-6 col-md-offset-3" id="topRow">
            <h1 class="marginTop">Secret Diary</h1>

            <p class="lead">Your own private diary</p>

            <?php
            if ($error) {
                echo '<div class="alert alert-danger">'.addslashes($error)."</div>";
            }
            if ($message) {
                echo '<div class="alert alert-success">'.addslashes($message)."</div>";
            }
            ?>

            <p>Interested? Sign up below!</p>

            <form class="marginTop" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo addslashes($_POST['email']); ?>"
                        placeholder="Your email"/>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Your password" />
                </div>

                <input type="submit" name="submit" class="btn btn-success btn-lg marginTop" value="Sign Up"/>
            </form>
        </div>
    </div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(".contentContainer").css("min-height", $(window).height());
</script>

</body>
</html>