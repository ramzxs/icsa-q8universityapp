<?php
require_once 'libs.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Q8 University App</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        header {
            color: white;
            background-color: green;
            padding: 10px;
        }

        th {
            background-color: lightgray;
        }

        .hide {
            display: none;
        }
    </style>
</head>
<body>
    <header>
        <h1>Q8 University App</h1>
    </header>

    <h2>STUDENTS LIST</h2>

    <table border="1" cellpadding="10" cellspacing="0" width="75%" align="center">
        <thead>
            <tr>
                <th width="150">STUDENT ID NUMBER</th>
                <th>STUDENT FULL NAME</th>
            </tr>
        </thead>
        <tbody>
            <?php
            try {
                $DBCONN = databaseConnect();

                $sqlList = "SELECT * FROM `student` ORDER BY `id`";
                $statement = $DBCONN->query($sqlList);
                for ($i = 1; $row = $statement->fetch(); $i++) { ?>
                    <tr>
                        <td style="text-align: center">
                            <a href="#" onclick="showInfo('<?= $row['id'] ?>');"><?php echo $row['id']; ?></a>
                        </td>
                        <td id="studentInfoBox_<?php echo $row['id']; ?>">
                        </td>
                    </tr>
                    <?php
                }
            } catch(Exception $e) {
                echo 'ERROR: '. $e->getMessage();
            }
            ?>
        </tbody>
    </table>
    <script>
        async function showInfo(idNumber) {
            document.getElementById('studentInfoBox_' + idNumber).innerHTML 
                = '<img src="loading.gif" height="20"> Loading...';

            const response = await fetch("getinfo.php?id=" + idNumber); // $_GET['id']
            const text = await response.text();

            document.getElementById('studentInfoBox_' + idNumber).innerHTML = text;
        }
    </script>
</body>
</html>