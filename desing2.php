<?php

include ("include/functions.php");


function Get_Course_Name($code){

    global $sis_con;

     $sqli = "SELECT * FROM `course_details` WHERE `course_code` = '$code' ";

    if ($query = mysqli_query($sis_con, $sqli)) {
     $row = mysqli_fetch_array($query);
     return $row['course_name'];

    } else {
        echo $sqli;
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        /* Container div for the table */
        .table-container {
            width: 100%;
            max-width: 600px; /* Set a max width to contain 6 columns */
            overflow-x: auto; /* Allow horizontal scrolling */
            border: 1px solid #ccc; /* Optional: Border for the div */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px; /* Ensure table does not shrink smaller than the container */
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
            font-size: 14px;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        td.subject {
            text-align: left;
        }
    </style>
    <title>Dynamic Course Table</title>
</head>
<body>

    <!-- Div to contain the table -->
    <div class="table-container">
        <table>
            <tr>
                <th>Code</th>
                <th>Cr.H</th>
                <th>Subject</th>
                <th>Grade</th>
                <th>Code</th>
                <th>Cr.H</th>
                <th>Subject</th>
                <th>Grade</th>
            </tr>
            <?php
            // Sample data for demonstration, typically from a database
            $data = [
                ['BABE501', 3, 'Introduction to Microeconomics', 'BSSM301', 3, 'Mathematics I'],
                ['BSHA100', 3, 'Arabic Language I', 'BSSS100', 3, 'Descriptive Statistics'],
                ['BSHE100', 3, 'English Language I', '', '', ''],
                ['BSSHS100', 2, 'Sudanese Studies', '', '', '']
            ];

            // While loop to generate table rows (limited to 10 iterations or available data)
            $i = 0;
            while ($i < count($data) && $i < 10) {
                echo "<tr>";
                echo "<td>{$data[$i][0]}</td>";
                echo "<td>{$data[$i][1]}</td>";
                echo "<td class='subject'>{$data[$i][2]}</td>";
                echo "<td></td>";  // Empty Grade
                echo "<td>{$data[$i][3]}</td>";
                echo "<td>{$data[$i][4]}</td>";
                // echo "<td>{}</td>";
                echo "<td class='subject'>{$data[$i][5]}</td>";
                echo "<td></td>";  // Empty Grade
                echo "</tr>";
                $i++;
            }
            ?>
        </table>
    </div>

</body>
</html>
