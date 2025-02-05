<!DOCTYPE html>
<html>

<head>
    <title>PDF Template</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
            color: #333;
        }

        .header {
            text-align: center;
            background-color: #c8102e;
            /* TUP red */
            color: #fff;
            padding: 20px 0;
        }

        .header h4 {
            margin: 0;
            font-size: 16px;
        }

        .header p {
            margin: 5px 0;
            font-size: 14px;
        }

        .table-container {
            width: 80%;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .content-title {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
        }

        .content-subtitle {
            text-align: center;
            font-size: 14px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            font-size: 14px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            /* Soft gray for the header */
            font-weight: bold;
            text-align: center;
        }

        tr:hover {
            background-color: #f5f5f5;
            /* Subtle hover effect */
        }

        .tup-id-column {
            white-space: nowrap;
            /* Prevent TUP ID from breaking into multiple lines */
        }

        .footer {
            text-align: center;
            font-size: 12px;
            margin-top: 20px;
            color: #777;
        }
    </style>
</head>

<body>

    <div class="header">
        <h4>Republic of the Philippines</h4>
        <h4>TECHNOLOGICAL UNIVERSITY OF THE PHILIPPINES - TAGUIG</h4>
        <p>Km. 14 East Service Rd., Western Bicutan, Taguig City 1630</p>
        <p>http://www.tupt.edu.ph | Telefax: (632) 8823-2456</p>
    </div>

    <div class="table-container">
        <div class="content-title">
            <h3>LIST OF GRADUATES</h3>
        </div>

        <div class="content-subtitle">
            <h4>BASIC ARTS & SCIENCES DEPARTMENT</h4>
        </div>

        <table>
            <thead>
                <tr>
                    <th class="tup-id-column">TUPT-ID</th>
                    <th>NAME</th>
                    <th>PROGRAM</th>
                    <th>DATE OF GRADUATION</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($members as $member): ?>
                    <tr>
                        <td class="tup-id-column"><?= $member['tupt_id'] ?></td>
                        <td><?= $member['full_name'] ?></td>
                        <td style="text-align: center;"><?= $member['major'] ?></td>
                        <td style="text-align: center;"><?= $member['year_graduated'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <p style="text-align: center; font-style: italic; margin-top: 20px;">******* Nothing Follows *******</p>
    </div>

    <div class="footer">
        <p>&copy; 2025 Technological University of the Philippines - Taguig. All rights reserved.</p>
    </div>

</body>

</html>