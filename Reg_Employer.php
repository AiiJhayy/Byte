<!DOCTYPE html>
<html lang = "en">
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <meta charset = "UTF-8">
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <title>ByteMe | Registration Form - Employer</title>
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
        

        <div class = "container">
            <?php if (isset($_POST["submit"])) {
                $employer_first_name = $_POST["first_name"];
                $employer_last_name = $_POST["last_name"];
                $employer_posistion= $_POST["employer_posistion"];
                $company_name = $_POST["company_name"];
                $company_email = $_POST["email"];
                $company_number = $_POST["company_number"];
                $password = $_POST["password"];
                $confirm_password = $_POST["confirm_password"];
                $passwordhash = password_hash($password, PASSWORD_DEFAULT);

                $errors = array();
                    if (empty($employer_first_name) OR empty($employer_last_name) OR empty($company_name) OR empty($company_email) OR  empty($company_number) OR empty($password) OR empty($confirm_password)) {
                        array_push($errors, "All fields are required!");
                    }
                    if (!filter_var($company_email, FILTER_VALIDATE_EMAIL)) {
                        array_push($errors, "Invalid email!");
                    }
                    if (strlen($company_number) < 11) {
                        array_push($errors, "Password must be 11 characters long");
                    }
                    if (strlen($password) < 8) {
                        array_push($errors, "Password must be 8 characters long");
                    }
                    if ($password !== $confirm_password) {
                        array_push($errors, "Password does not much!");
                    }

                    if (count($errors) > 0) {
                        foreach ($errors as $error) {
                            echo "<div class='alert alert-danger'>$error</div>";
                        }
                    }
                    else {
                        require_once "Database.php";
                        $sql = "INSERT INTO employer (first_name, last_name, employer_posistion, company_name, email, company_number, password) VALUES (?, ?, ?, ?, ?, ?, ?)";
                        $stmt = mysqli_stmt_init($connect);
                        $preparestmt = mysqli_stmt_prepare($stmt, $sql);
                            if ($preparestmt) {
                                mysqli_stmt_bind_param($stmt, "sssssss", $employer_first_name, $employer_last_name, $company_name, $company_email, $company_number, $passwordhash);
                                mysqli_stmt_execute($stmt);
                                echo "<div class= 'alert alert-success'>You are registered successfully!</div>";
                            }
                            else {
                                die("SOMETHING WENT WRONG!");
                            }
                    }
                }    
            ?>

            <form action = "Registration.php" method = "post">
                <div class = "form-group">
                    <input type = "text" class = "form-control" name = "first_name" placeholder = "Employer First Name:">
                </div>
                <div class = "form-group">
                    <input type = "text" class = "form-control" name = "last_name" placeholder = "Employer Last Name:">
                </div>
                <div class = "form-group">
                    <input type = "text" class = "form-control" name = "employer_posistion" placeholder = "Employer Posistion:">
                </div>
                <div class = "form-group">
                    <input type = "text" class = "form-control" name = "company_name" placeholder = "Company Name:">
                </div>
                <div class = "form-group">
                    <input type = "text" class = "form-control" name = "email" placeholder = "Company E-mail:">
                </div>
                <div class = "form-group">
                    <input type = "text" class = "form-control" name = "company_number" placeholder = "Company Number:">
                </div>
                <div class = "form-group">
                    <input type = "password" class = "form-control" name = "password" placeholder = "Password:">
                </div>
                <div class = "form-group">
                    <input type = "password" class = "form-control" name = "confirm_password" placeholder = "Confirm Password:">
                </div>
                <div class = "form-group-btn">
                    <input type = "submit" class = "btn btn-primary" name = "submit" placeholder = "SUBMIT">
                </div>
                <div><p>Already Registered? <a href = "LogIn_Employer-Seeker.php">Login Here</a></p></div>
            </form>
        </div>
    </body>

</html>