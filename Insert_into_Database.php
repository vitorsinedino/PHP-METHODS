<?php
require_once('include/DB.php');

$nameError = "";
$addresError = "";
$salaryError = "";
$socialError = "";
$deptError = "";
$errorCount = 0;
if (isset($_POST['Submit'])) {
    if (!empty($_POST['EName']) && !empty($_POST['SSN'])) {

        $EName = $_POST["EName"];
        $SSN = $_POST["SSN"];
        $Dept = $_POST["Dept"];
        $Salary = $_POST["Salary"];
        $HomeAddress = $_POST["HomeAddress"];
        if (!preg_match("/[A-Za-z.]/", $EName)) {
            $nameError = "Name can only contain letters";
            $errorCount = 1;
        } elseif (!preg_match("/[A-Za-z0-9]/", $SSN)) {
            $socialError = "Social security can only contain letter and numbers";
            $errorCount++;
        } elseif (!preg_match("/[0-9]/", $Salary)) {
            $salaryError = "salary can only contain numbers";
            $errorCount = 1;
        } elseif (!preg_match("/[A-Za-z0-9]/", $HomeAddress)) {
            $addresError = "Home address can only contain letter and numbers";
            $errorCount = 1;
        } elseif (!preg_match("/[A-Za-z.]/", $Dept)) {
            $deptError = "department can only contain letters";
            $errorCount = 1;
        }
        if ($errorCount == 0) {
            global $ConnectingDB;
            $sql = "INSERT INTO emprecord(ename,ssn,dept,salary,homeaddress)
        VALUES(:enamE,:ssN,:depT,:salarY,:homeaddresS)";
            $stmt = $ConnectingDB->prepare($sql);
            $stmt->bindValue(':enamE', $EName);
            $stmt->bindValue(':ssN', $SSN);
            $stmt->bindValue(':depT', $Dept);
            $stmt->bindValue(':salarY', $Salary);
            $stmt->bindValue(':homeaddresS', $HomeAddress);
            $Execute = $stmt->execute();
            if ($Execute) {
                echo 'Record has been added successfuly' . $errorCount;
            }
        }
    } else {
        echo "<h2 style='display:grid;' >Name and social securyty are mandatory</h2>";
    }
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Contact us</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        html,
        body {
            min-height: 100vh;
            padding: 0;
            margin: 0;
            font-family: Roboto, Arial, sans-serif;
            font-size: 14px;
            color: #666;
        }

        input,
        textarea {
            outline: none;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            /* background: #5a7233; */
        }

        h1 {
            margin-top: 0;
            font-weight: 500;
        }

        form {
            position: relative;
            width: 80%;
            border-radius: 30px;
            background: #fff;
        }

        .form-left-decoration,
        .form-right-decoration {
            content: "";
            position: absolute;
            width: 50px;
            height: 20px;
            border-radius: 20px;
            background: #5a7233;
        }

        .form-left-decoration {
            bottom: 60px;
            left: -30px;
        }

        .form-right-decoration {
            top: 60px;
            right: -30px;
        }

        .form-left-decoration:before,
        .form-left-decoration:after,
        .form-right-decoration:before,
        .form-right-decoration:after {
            content: "";
            position: absolute;
            width: 50px;
            height: 20px;
            border-radius: 30px;
            background: #fff;
        }

        .form-left-decoration:before {
            top: -20px;
        }

        .form-left-decoration:after {
            top: 20px;
            left: 10px;
        }

        .form-right-decoration:before {
            top: -20px;
            right: 0;
        }

        .form-right-decoration:after {
            top: 20px;
            right: 10px;
        }

        .circle {
            position: absolute;
            bottom: 80px;
            left: -55px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #fff;
        }

        .form-inner {
            padding: 40px;
        }

        .form-inner input,
        .form-inner textarea {
            display: block;
            width: 100%;
            padding: 15px;
            margin-bottom: 10px;
            border: none;
            border-radius: 20px;
            background: #d0dfe8;
        }

        .form-inner textarea {
            resize: none;
        }

        button {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            border-radius: 20px;
            border: none;
            border-bottom: 4px solid #3e4f24;
            background: #5a7233;
            font-size: 16px;
            font-weight: 400;
            color: #fff;
        }

        button:hover {
            background: #3e4f24;
        }

        @media (min-width: 568px) {
            form {
                width: 60%;
            }
        }
    </style>
</head>

<body>
    <form action="Insert_into_Database.php" class="decor" method="post">
        <div class="form-left-decoration"></div>
        <div class="form-right-decoration"></div>
        <div class="circle"></div>
        <div class="form-inner">
            <h1>Insert into Database</h1>
            <?php echo $nameError ?>
            <input type="text" placeholder="name" name="EName">
            <?php echo $socialError ?>
            <input type="text" placeholder="Social security" name='SSN'>
            <?php echo $deptError ?>
            <input type="text" placeholder="Department" name='Dept'>
            <?php echo $salaryError ?>
            <input type="text" placeholder="Salary" name='Salary'>
            <?php echo $addresError ?>
            <textarea name="HomeAddress" rows="5"></textarea>
            <input type="submit" name="Submit" value="submit" />
        </div>
    </form>
</body>

</html>