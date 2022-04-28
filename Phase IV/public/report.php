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
                    <li><a href="upload.html">ADD BOOK</a></li>
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

                    $query = "SELECT user_id, username FROM $table_name";

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