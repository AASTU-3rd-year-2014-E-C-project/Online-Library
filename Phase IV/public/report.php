<!--
=========================================================
* * Black Dashboard - v1.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/black-dashboard
* Copyright 2019 Creative Tim (https://www.creative-tim.com)


* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<?php

session_start();
include_once("../inc/conn.php");

if (isset($_SESSION['user_id']) && $_SESSION['user_type'] == 'admin') {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../image/index.png">
    <title>
      AASTU Digital Library Stats
    </title>
    <!-- CSS Files -->
    <link rel="stylesheet" href="../css/page_structure_style.css">
    <link href="../css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  </head>

  <body class="">
    <div class="wrapper">
      <div class="main-panel" id="main-background-panel">
        
        <div class="header">
            <div class="logo">
                <a href="../index.php"> AASTU Digital Library</a>
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
        <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <i class="tim-icons icon-simple-remove"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- End Navbar -->
        <div class="main-content">
          <div class="row">
            <div class="col-12">
              <div class="card card-chart">
                <div class="card-header ">
                  <div class="row">
                    <div class="col-sm-6 text-left">
                      <h5 class="card-category">User Activity Report</h5>
                      <h2 class="card-title">Current Year (<?= date('Y') ?>)</h2>
                    </div>
                    <div class="col-sm-6">
                      <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                        <label class="btn btn-sm btn-primary btn-simple active" id="0">
                          <input type="radio" name="options" checked>
                          <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Resources Read</span>
                          <span class="d-block d-sm-none">
                            <i class="tim-icons icon-single-02"></i>
                          </span>
                        </label>
                        <label class="btn btn-sm btn-primary btn-simple" id="1">
                          <input type="radio" class="d-none d-sm-none" name="options">
                          <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Resources Downloaded</span>
                          <span class="d-block d-sm-none">
                            <i class="tim-icons icon-gift-2"></i>
                          </span>
                        </label>
                        <label class="btn btn-sm btn-primary btn-simple" id="2">
                          <input type="radio" class="d-none" name="options">
                          <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Resources Shared</span>
                          <span class="d-block d-sm-none">
                            <i class="tim-icons icon-tap-02"></i>
                          </span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="chartBig1"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
              <div class="card card-chart">
                <div class="card-header">
                  <h5 class="card-category">Last 7 days</h5>
                  <h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i>Read</h3>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="chartLinePurple"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card card-chart">
                <div class="card-header">
                  <h5 class="card-category">Last 7 days</h5>
                  <h3 class="card-title"><i class="tim-icons icon-delivery-fast text-info"></i>Downloaded</h3>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="CountryChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card card-chart">
                <div class="card-header">
                  <h5 class="card-category">Last 7 days</h5>
                  <h3 class="card-title"><i class="tim-icons icon-send text-success"></i>Shared</h3>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="chartLineGreen"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <?php include "piechart.php" ?>
          </div>
        </div>
      </div>
    </div>
    <!--   Core JS Files   -->
    <script src="../javascript/core/jquery.min.js"></script>
    <script src="../javascript/core/popper.min.js"></script>
    <script src="../javascript/core/bootstrap.min.js"></script>
    <script src="../javascript/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Chart JS -->
    <script src="../javascript/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../javascript/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../javascript/black-dashboard.min.js"></script><!-- Black Dashboard DEMO methods, don't include it in your project! -->
    <script src="../javascript/demo/demo.js"></script>
    <script>
      $(document).ready(function() {
        $().ready(function() {
          $sidebar = $('.sidebar');
          $navbar = $('.navbar');
          $main_panel = $('.main-panel');

          $full_page = $('.full-page');

          $sidebar_responsive = $('body > .navbar-collapse');
          sidebar_mini_active = true;
          white_color = false;

          window_width = $(window).width();

          fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();



          $('.fixed-plugin a').click(function(event) {
            if ($(this).hasClass('switch-trigger')) {
              if (event.stopPropagation) {
                event.stopPropagation();
              } else if (window.event) {
                window.event.cancelBubble = true;
              }
            }
          });

          $('.fixed-plugin .background-color span').click(function() {
            $(this).siblings().removeClass('active');
            $(this).addClass('active');

            var new_color = $(this).data('color');

            if ($sidebar.length != 0) {
              $sidebar.attr('data', new_color);
            }

            if ($main_panel.length != 0) {
              $main_panel.attr('data', new_color);
            }

            if ($full_page.length != 0) {
              $full_page.attr('filter-color', new_color);
            }

            if ($sidebar_responsive.length != 0) {
              $sidebar_responsive.attr('data', new_color);
            }
          });

          $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
            var $btn = $(this);

            if (sidebar_mini_active == true) {
              $('body').removeClass('sidebar-mini');
              sidebar_mini_active = false;
              blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
            } else {
              $('body').addClass('sidebar-mini');
              sidebar_mini_active = true;
              blackDashboard.showSidebarMessage('Sidebar mini activated...');
            }

            // we simulate the window Resize so the charts will get updated in realtime.
            var simulateWindowResize = setInterval(function() {
              window.dispatchEvent(new Event('resize'));
            }, 180);

            // we stop the simulation of Window Resize after the animations are completed
            setTimeout(function() {
              clearInterval(simulateWindowResize);
            }, 1000);
          });

          $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
            var $btn = $(this);

            if (white_color == true) {

              $('body').addClass('change-background');
              setTimeout(function() {
                $('body').removeClass('change-background');
                $('body').removeClass('white-content');
              }, 900);
              white_color = false;
            } else {

              $('body').addClass('change-background');
              setTimeout(function() {
                $('body').removeClass('change-background');
                $('body').addClass('white-content');
              }, 900);

              white_color = true;
            }


          });

          $('.light-badge').click(function() {
            $('body').addClass('white-content');
          });

          $('.dark-badge').click(function() {
            $('body').removeClass('white-content');
          });
        });
      });
    </script>
    <script>
      $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

      });
      window.TrackJS &&
        TrackJS.install({
          token: "ee6fab19c5a04ac1a32a645abde4613a",
          application: "black-dashboard-free"
        });
    </script>
  </body>

  </html>
<?php

} else
  header("Location: book_list.php");

?>