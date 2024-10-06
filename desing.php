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
            font-size: 6px;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        td.subject {
            text-align: left;
        }
    </style>
    <title>Course Table</title>
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
            <tr>
                <td>BABE501</td>
                <td>3</td>
                <td class="subject">Introduction to Microeconomics</td>
                <td></td>
                <td>BSSM301</td>
                <td>3</td>
                <td class="subject">Mathematics I</td>
                <td></td>
            </tr>
            <tr>
                <td>BSHA100</td>
                <td>3</td>
                <td class="subject">Arabic Language I</td>
                <td></td>
                <td>BSSS100</td>
                <td>3</td>
                <td class="subject">Descriptive Statistics</td>
                <td></td>
            </tr>
            <tr>
                <td>BSHE100</td>
                <td>3</td>
                <td class="subject">English Language I</td>
                <td></td>
                <!-- <td></td> -->
                <!-- <td></td> -->
                <!-- <td></td>
                <td></td> -->
            </tr>
            <tr>
                <td>BSSHS100</td>
                <td>2</td>
                <td class="subject">Sudanese Studies</td>
                <td></td>
                <!-- <td></td> -->
                <!-- <td></td> -->
                <!-- <td></td>
                <td></td> -->
            </tr>
        </table>
    </div>

</body>
</html>
