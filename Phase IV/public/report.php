<?php

session_start();
include_once("../inc/conn.php");

if (isset($_SESSION['user_id']) && $_SESSION['user_type'] == 'admin') {
?>
    <!DOCTYPE html>

    <head lang="en">
        <title>Users Report</title>
        <meta charset="UTF-8">
        <meta name="description" content="Library Managment About us page">
        <meta name="keywords" content="Books">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../image/index.png" type="image/png">
        <link rel="stylesheet" href="../css/report_style.css">
        <link rel="stylesheet" href="../css/page_structure_style.css">
        <link rel="stylesheet" href="../_fontawesome/css/all.min.css">
        <script src="https://kit.fontawesome.com/72f71d06d5.js" crossorigin="anonymous"></script>
    </head>

    <body>

        <div class="header">
            <div class="logo">
                <a href="../index.php"> My Library</a>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="book_list.php">BOOK LIST</a></li>
                    <li><a href="upload.php">ADD BOOK</a></li>
                    <li><a href="../inc/logout.php">LOG OUT</a></li>
                </ul>
            </div>
            <i class="fas fa-bars" id="menu-dropdown-btn"></i>
        </div>


        <!-- report table -->
        <div class="users_report">
            <h1>Users Report</h1>
            <table>
                <thead>
                    <th>Username</th>
                    <th>Downloaded</th>
                    <th>Read</th>
                    <th>Uploaded</th>
                </thead>
                <tbody>
                    <?php

                    $report_array = array(array('Username', 'Downloaded', 'Read', 'Uploaded'));

                    $query = "SELECT user_id, username FROM $table_name1";

                    $user_result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($user_result)) {

                        $current_user_id = $row['user_id'];

                        $downloaded = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) FROM download_record WHERE user_id=$current_user_id"));

                        $read = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) FROM read_record WHERE user_id=$current_user_id"));

                        $uploaded = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) FROM donate_record WHERE user_id=$current_user_id"));

                        array_push($report_array, [$row['username'], $downloaded['COUNT(*)'], $read['COUNT(*)'], $uploaded['COUNT(*)']]);

                    ?>
                        <tr>
                            <td><?php echo $row['username'] ?></td>
                            <td><?php echo $downloaded['COUNT(*)'] ?></td>
                            <td><?php echo $read['COUNT(*)'] ?></td>
                            <td><?php echo $uploaded['COUNT(*)'] ?></td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>

            <div class="admins_report">
                <h1>Admin Report</h1>
                <table>
                    <thead>
                        <th>Admin Full Name</th>
                        <th>Admin Gender</th>
                    </thead>
                    <tbody>
                        <?php
                        $report_array = array(array('Admins fName', 'Admins lName', 'Admins Gender'));
                        $query1 = "SELECT admin_id FROM $table_name2";
                        $admin_result = mysqli_query($conn, $query1);
                        while ($row = mysqli_fetch_assoc($admin_result)) {
                            $current_admin_id = $row['admin_id'];
                            $fName = mysqli_fetch_assoc(mysqli_query($conn, "SELECT first_name FROM admin WHERE admin_id = $current_admin_id"));
                            $lName = mysqli_fetch_assoc(mysqli_query($conn, "SELECT last_name FROM admin WHERE admin_id  = $current_admin_id"));
                            $Gender = mysqli_fetch_assoc(mysqli_query($conn, "SELECT gender FROM admin WHERE admin_id = $current_admin_id"));
                            array_push($report_array, [$fName['first_name'], $lName['last_name'], $Gender['gender']]);
                        ?>
                            <tr>
                                <td><?php echo $fName['first_name'] . " " . $lName['last_name'] ?></td>
                                <td><?php echo $Gender['gender'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <div class="donation_report">
                <h1>Donation Report</h1>
                <table>
                    <thead>
                        <th>User Full Name</th>
                        <th>Resource Name</th>
                    </thead>
                    <tbody>
                        <?php
                        $report_array = array(array('User fName', 'User lName', 'Resource Name'));
                        $query2 = "SELECT user_id, resource_id FROM $table_name3";
                        $donation_result = mysqli_query($conn, $query2);
                        while ($row = mysqli_fetch_assoc($donation_result)) {
                            $current_user_id = $row['user_id'];
                            $current_resource_id = $row['resource_id'];
                            $fName = mysqli_fetch_assoc(mysqli_query($conn, "SELECT first_name FROM user WHERE user_id=$current_user_id"));
                            $lName = mysqli_fetch_assoc(mysqli_query($conn, "SELECT last_name FROM user WHERE user_id=$current_user_id"));
                            $resourceName = mysqli_fetch_assoc(mysqli_query($conn, "SELECT resource_title FROM resource WHERE resource_id = $current_resource_id"));
                            array_push($report_array, [$fName['first_name'],  $lName['last_name'], $resourceName['resource_title']]);
                        ?>
                            <tr>
                                <td><?php echo $fName['first_name'] . " " . $lName['last_name'] ?></td>
                                <td><?php echo $resourceName['resource_title'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <div class="download_report">
                <h1>Download Report</h1>
                <table>
                    <thead>
                        <th>User Full Name</th>
                        <th>Resource Name</th>
                    </thead>
                    <tbody>
                        <?php
                        $report_array = array(array('User fName', 'User lName', 'Resource Name'));
                        $query3 = "SELECT user_id, resource_id FROM $table_name4";
                        $download_result = mysqli_query($conn, $query3);
                        while ($row = mysqli_fetch_assoc($download_result)) {
                            $current_user_id = $row['user_id'];
                            $current_resource_id = $row['resource_id'];
                            $fName = mysqli_fetch_assoc(mysqli_query($conn, "SELECT first_name FROM user WHERE user_id=$current_user_id"));
                            $lName = mysqli_fetch_assoc(mysqli_query($conn, "SELECT last_name FROM user WHERE user_id=$current_user_id"));
                            $resourceName = mysqli_fetch_assoc(mysqli_query($conn, "SELECT resource_title FROM resource WHERE resource_id = $current_resource_id"));
                            array_push($report_array, [$fName['first_name'],  $lName['last_name'], $resourceName['resource_title']]);
                        ?>
                            <tr>
                                <td><?php echo $fName['first_name'] . " " . $lName['last_name'] ?></td>
                                <td><?php echo $resourceName['resource_title'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <div class="read_report">
                <h1>Read Report</h1>
                <table>
                    <thead>
                        <th>User Full Name</th>
                        <th>Resource Name</th>
                    </thead>
                    <tbody>
                        <?php
                        $report_array = array(array('User fName', 'User lName', 'Resource Name'));
                        $query4 = "SELECT user_id, resource_id FROM $table_name5";
                        $read_result = mysqli_query($conn, $query4);
                        while ($row = mysqli_fetch_assoc($read_result)) {
                            $current_user_id = $row['user_id'];
                            $current_resource_id = $row['resource_id'];
                            $fName = mysqli_fetch_assoc(mysqli_query($conn, "SELECT first_name FROM user WHERE user_id = $current_user_id"));
                            $lName = mysqli_fetch_assoc(mysqli_query($conn, "SELECT last_name FROM user WHERE user_id = $current_user_id"));
                            $resourceName = mysqli_fetch_assoc(mysqli_query($conn, "SELECT resource_title FROM resource WHERE resource_id = $current_resource_id"));
                            array_push($report_array, [$fName['first_name'],  $lName['last_name'], $resourceName['resource_title']]);
                        ?>
                            <tr>
                                <td><?php echo $fName['first_name'] . " " . $lName['last_name'] ?></td>
                                <td><?php echo $resourceName['resource_title'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php

                if (isset($_POST['export_report'])) {
                    header('Content-Type: application/csv; charset=UTF-8');
                    header('Content-Disposition: attachment; filename="website_report.csv";');

                    // clean output buffer
                    ob_end_clean();

                    $handle = fopen('php://output', 'w');

                    foreach ($report_array as $value) {
                        fputcsv($handle, $value);
                    }

                    fclose($handle);

                    // use exit to get rid of unexpected output afterward
                    exit();
                }

                ?>

                <div id='re_graph'><?php include "graph.php"; ?></div><br>
                <div id='ra_pie'><?php include "piechart_rating.php"; ?></div><br>
                <div id='d_graph'><?php include "graphd.php"; ?></div><br>

                <form method="POST">
                    <input type="submit" name="export_report" value="EXPORT" class="export-btn">
                </form>
            </div>


            <script src="javascript/book_list.js"></script>
            <script src="javascript/dropdown.js"> </script>

    </body>

    </html>

<?php

} else
    header("Location: /book_list.php");

?>