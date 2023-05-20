<!DOCTYPE html>
<html lang = "en">
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <meta charset = "UTF-8">
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <title>ByteMe | LogIn - Employer</title>
    </head>

    <style>
        
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 150px;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }

        .form-group {
            margin-bottom: 30px;
        }
    </style>

    <body>

        <?php 
            if (isset($_POST ["login"])) {
                $company_email = $_POST["email"];
                $password = $_POST["password"];
                require_once "Database.php";
                $sql = "SELECT * FROM employer WHERE email = '$company_email'";
                $result = mysqli_query($connect, $sql);
                $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    if ($user) {
                        if (password_verify($password, $user["password"])) {
                            header("Location: Index.php");
                            die();
                        }
                        else {
                            echo "<div class = 'alert alert-danger'>Password does not much!</div>";
                        }
                    }
                    else {
                        echo "<div class = 'alert alert-danger'>Email does not much!</div>";
                    }
            }
        ?>

        <div class = "container">
            <form action = "LogIn_Employer.php" method = "post">
                <div class = "form-group">
                    <input type = "email" placeholder = "Enter Company Email: " name = "email" class = "form-control">
                </div>
                <div class = "form-group">
                    <input type = "password" placeholder = "Enter Password: " name = "password" class = "form-control">
                </div>
                <div class = "form-btn">
                    <input type = "submit" value = "Login" name = "login" class = "btn btn-primary">
                </div>
            </form>
            <div><p>Not registered yet? <a href = "Reg_Employer-Seeker.php">Register Here</a></p></div>
        </div>
    </body>

</html>