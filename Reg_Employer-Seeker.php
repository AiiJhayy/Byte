<!DOCTYPE html>
<html>
    <head>
        <title>REGISTER | CreatingPossibility</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="home_style.css" rel="stylesheet">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">   
    </head>

    <style>
        body {
            font-family: Arial;
            color:  white;
        }

        .split {
            height: 100%;
            width: 50%;
            position: fixed;
            z-index: 1;
            top: 0;
            overflow-x: hidden;
            padding-top: 20px;
        }

        .left {
            left: 0;
            background-color: #2b6777;
        }

        .right {
            right: 0;
            background-color: #2b7a78;
        }

        .centered {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
        }

        .centered img {
            width: 200px;
            border-radius: 50%;
        }
    </style>

    <body>
        <a href="Reg_Seeker.php">
            <div class="split left">
                <div class="centered">
                    <img src="Pictures/Seeker.png" alt="APPLICANT">
                    <h2>APPLICANT</h2>
                    <p>Click to register as an Applicant</p>
                </div>
            </div>
        </a>

        <a href="Reg_Employer.php">
            <div class="split right">
                <div class="centered">
                    <img src="Pictures/Employer.png" alt="Employer">
                    <h2>Employer</h2>
                    <p>Click to register as an Employer</p>
                    <p>You can post a job offering and accept any applicants</p>
                </div>
            </div>
        </a>
    </body>

</html>