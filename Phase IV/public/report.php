<?php

session_start();

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
                <a href="../index.html"> My Library</a>
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
                    <tr>
                        <td>Nahom</td>
                        <td>12</td>
                        <td>2</td>
                        <td>4</td>
                    </tr>
                </tbody>
            </table>

            <input type="submit" value="EXPORT" class="export-btn">
        </div>


        <script src="javascript/book_list.js"></script>
        <script src="javascript/dropdown.js"> </script>

    </body>

    </html>

<?php

} else
    header("Location: /book_list.php");

?>