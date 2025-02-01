<!DOCTYPE html>
<html>

<head>

    <title>PDF Template</title>
    <style>
        .header {
            margin-bottom: 20px;
            /* Adjust the margin as needed */
            overflow: hidden;
            /* Clearfix */
        }

        .logo {
            float: left;
            /* Align the logo to the left */
        }

        .logo img {
            max-width: 100px;
            height: 100px;
            display: block;
        }

        .centered-text {
            text-align: center;
            margin: 0;
            display: inline-block;
            vertical-align: middle;
        }

        .header:after {
            content: "";
            display: table;
            clear: both;
        }

        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 4px;
            font-family: 'Poppins';
        }

        th {
            background-color: #f2f2f2;
            /* Add background color to table header */
            font-family: 'Poppins';
        }

        .list-group-item-action:hover {
            background-color: #f5f5f5;
            /* Add hover effect */
        }

        .margin {
            margin-top: 2;
            margin-bottom: 2;
            font-family: 'Poppins';
        }
    </style>
</head>

<body>

    <div class="header">
        <!-- <div class="logo">
        <img src="/assets/img/icons/tupt-logo.png" alt=""/>
    </div> -->
        <div style="text-align: center;">
            <h4 class="margin">Republic of the Philippines</h4>
            <h4 class="margin">TECHNOLOGICAL UNIVERSITY OF THE PHILIPPINES - TAGUIG</h4>
            <p class="margin">Km. 14 East Service Rd., Western Bicutan, Taguig City 1630</p>
            <p class="margin">http: www.tupt.edu.ph Telefax: (632) 8823-2456</p>
        </div>
    </div>
    <hr style="margin-bottom: 2;">
    <h4 style="text-align: center; font-family: 'Poppins';"> REGISTRATION AND ADMISSION SECTION</h4>

    <div>
        <h3 class="margin" style="text-align: center; font-family: 'Poppins';"> LIST OF GRADUATES SY:
            <?= session()->get('from') ?> - <?= session()->get('to') ?>
        </h3>
        <h3 style="text-align: center; margin-top: 2; font-family: 'Poppins';"> BASIC ARTS & SCIENCES DEPARTMENT</h3>
    </div>
    <div class="card mt-2">
        <div class="table-responsive text-nowrap list-group-item-action">
            <table>
                <thead>
                    <tr>
                        <th>TUPT-ID</th>
                        <th>NAME</th>
                        <th>PROGRAM</th>
                        <th>DATE OF GRADUATION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($members as $member): ?>
                        <tr class="list-group-item-action">
                            <td><?= $member['tupt_id'] ?></td>
                            <td><?= $member['full_name'] ?></td>
                            <td style="text-align: center;"><?= $member['major'] ?></td>
                            <td style="text-align: center;"><?= $member['year_graduated'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p style="text-align: center;"> ******* Nothing Follows ******* </p>
        </div>
    </div>

</body>

</html>