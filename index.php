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

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>STUDENT ID NUMBER</th>
                <th>STUDENT FULL NAME</th>
            </tr>
        </thead>
        <tbody>
            <?php
            try {
                $dbConnectionString = 'mysql:host=localhost;dbname=q8universityapp_db';
                $DBCONN = new PDO($dbConnectionString, 'root', '');

                $sqlList = "SELECT * FROM `student` ORDER BY `id`";
                $statement = $DBCONN->query($sqlList);
                for ($i = 1; $row = $statement->fetch(); $i++) { ?>
                    <tr>
                        <td>
                            <a href="#" onclick="showInfo('<?= $row['id'] ?>');"><?php echo $row['id']; ?></a>
                        </td>
                        <td>
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
        function showInfo(idNumber) {
            console.log(idNumber);
        }
    </script>
</body>
</html>