<?php
require_once('include/DB.php');


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
    <h2><?php echo @$_GET['id']; ?></h2>
    <table width="1000" border="5" align="center">
        <caption>View From Database</caption>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>SSN</th>
            <th>Salary</th>
            <th>HomeAddress</th>
        </tr>
        <?php
        $ConnectingDB;
        $sql = "SELECT * FROM emprecord";
        $stmt = $ConnectingDB->query($sql);
        while ($DataRows = $stmt->fetch()) {
            $Id = $DataRows['id'];
            $EName = $DataRows['ename'];
            $SSN = $DataRows['ssn'];
            $Department = $DataRows['dept'];
            $Salary = $DataRows['salary'];
            $HomeAddress = $DataRows['homeaddress'];
        ?>
            <tr>
                <td><?php echo $Id; ?></td>
                <td><?php echo $EName; ?></td>
                <td><?php echo $SSN; ?></td>
                <td><?php echo $Department; ?></td>
                <td><?php echo $Salary; ?></td>
                <td><?php echo $HomeAddress; ?></td>
                <td><a href="Update.php?id=<?php echo $Id ?>">Update</a></td>
                <td><a href="Delete.php?id=<?php echo $Id ?>">Delete</a></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>