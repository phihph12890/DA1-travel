<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<?php
ob_start();
session_start();
include "../../DA1/examples/local.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Thống kê
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/5cd69ad435.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/chart.min.js"
        integrity="sha512-BqNYFBAzGfZDnIWSAEGZSD/QFKeVxms2dIBPfw11gZubWwKUjEgmFUtUls8vZ6xTRZN/jaXGHD/ZaxD9+fDo0A=="
        crossorigin="anonymous"></script>
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo"><a href="../index.php" class="simple-text logo-normal">
                    <img src="../assets/img/logo.png" alt="">
                </a></div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item   ">
                        <a class="nav-link" href="./information.php">
                            <i class="material-icons">dashboard</i>
                            <p>THÔNG TIN CHUNG</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./user.php">
                            <i class="material-icons">person</i>
                            <p>USER</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./tour.php">
                            <i class="material-icons">content_paste</i>
                            <p> QUẢN LÝ TOUR</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./category.php">
                            <i class="material-icons">library_books</i>
                            <p>QUẢN LÝ LOẠI TOUR</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./comment.php">
                            <i class="far fa-comment"></i></i>
                            <p>QUẢN LÝ BÌNH LUẬN</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./Slide.php">
                            <i class="fab fa-slideshare"></i>
                            <p>QUẢN LÝ SLIDE</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./cart.php">
                            <i class="fas fa-shopping-cart"></i>
                            <p>QUẢN LÝ ĐƠN TOUR</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./image.php">
                            <i class="fas fa-images"></i>
                            <p>QUẢN LÝ ẢNH</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./contact.php">
                            <i class="fas fa-id-card-alt"></i>
                            <p>QUẢN LÝ LIÊN HỆ</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./postnews.php">
                            <i class="far fa-newspaper"></i>
                            <p>QUẢN LÝ BÀI VIẾT</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./voucher.php">
                            <i class="fas fa-piggy-bank"></i>
                            <p>QUẢN LÝ VOUCHER</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="./total.php">
                            <i class="fab fa-wolf-pack-battalion"></i>
                            <p>THỐNG KÊ</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand uppercase" href="javascript:;">Thống kê</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <form class="navbar-form">
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                    <i class="material-icons">search</i>
                                    <div class="ripple-container"></div>
                                </button>
                            </div>
                        </form>
                        <ul class="navbar-nav">

                            <li class="nav-item dropdown">
                                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">person</i>
                                    <p class="d-lg-none d-md-block">
                                        Account
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                    <a class="dropdown-item" href="./Profile.php">Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Log out</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title ">Thống kê</h4>
                                </div>
                                <div class="card-body " style="
    height: 700px !important;
">
                                    <div class="table-responsive">
                                        <div>
                                            <h2 class="mt-4 text-xl text-blue-500">Lựa chọn mục cần thống kê</h2>
                                            <div class="">
                                                <form method="POST">
                                                    <div class="flex text-lg items-center">
                                                        <div
                                                            class="border-2 border-green-400 border-opacity-100 text-green-700">
                                                            <select name="search" id="search" class="m-2" required>
                                                                <option value="4">
                                                                    Tổng số đơn tour
                                                                </option>
                                                                <option value="3">
                                                                    Tổng số đơn tour đã hoàn thành
                                                                </option>
                                                                <option value="2">Tổng số đơn tour đã hủy</option>
                                                                <option value="0">Tổng số đơn tour chưa duyệt</option>
                                                                <option value="1">Tổng số đơn tour đã duyệt</option>
                                                            </select>
                                                        </div>
                                                        <div class="flex">
                                                            <div
                                                                class=" mx-20 border-2 border-green-400 border-opacity-100 text-green-700 flex  items-center p-2">
                                                                <label for="#">Từ ngày: <input type="date" name="date1"
                                                                        required></label>
                                                            </div>
                                                            <div class="border-2 border-green-400 border-opacity-100 flex items-center
                                                                text-green-700 px-1">
                                                                <label for="#">Đến ngày: <input type="date" name="date2"
                                                                        required></label>
                                                            </div>
                                                        </div>
                                                        <div class="mx-64">
                                                            <input class="btn btn-primary pull-left" type="submit"
                                                                name="submit" value="Duyệt" id="submit">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <?php
                                        if (isset($_POST['submit'])) {
                                            $search = $_POST['search'];
                                            $date1 = $_POST['date1'];
                                            $date2 = $_POST['date2'];
                                            $today = date('Y-m-d');
                                            if ($date2 < $today) {
                                                echo '<script>
                                                alert("Ngày tháng kết thúc phải bằng hoặc lớn hơn ngày hiện tại");
                                                </script>';
                                            } else {
                                                if ($search == 1) {
                                                    $sql = "select sum(adult_amount)+SUM(child_amount) AS total , count(id_cart) as finish from cart where departure_day>='$date1' and departure_day<='$date2' and cart_status='1'";
                                                } else if ($search == 2) {
                                                    $sql = "select sum(adult_amount)+SUM(child_amount) AS total , count(id_cart) as finish from cart where departure_day>='$date1' and departure_day<='$date2' and cart_status='2'";
                                                } else if ($search == 3) {
                                                    $sql = "select sum(adult_amount)+SUM(child_amount) AS total, count(id_cart) as finish from cart where departure_day>='$date1' and departure_day<='$date2' and cart_status='3'";
                                                } else if ($search == 0) {
                                                    $sql = "select sum(adult_amount)+SUM(child_amount) AS total, count(id_cart) as finish  from cart where departure_day>='$date1' and departure_day<='$date2' and cart_status='0'";
                                                } else {
                                                    $sql = "select sum(adult_amount)+SUM(child_amount) AS total, count(id_cart) as finish from cart where departure_day>='$date1' and departure_day<='$date2'";
                                                }
                                                $sqll = "select sum(sumPrice), cart_status from cart where departure_day>='$date1' and departure_day<='$date2' and cart_status='3'";
                                                $total = $local->query($sql)->fetch();
                                                $totall = $local->query($sqll)->fetch();
                                            }
                                        }
                                        $today = date('Y-m-d');
                                        $todays = mktime(0, 0, 0, date('m'), date('d') - 7, date('Y'));
                                        $todayl7 = date('Y-m-d', $todays);
                                        $todays = mktime(0, 0, 0, date('m'), date('d') - 6, date('Y'));
                                        $todayl6 = date('Y-m-d', $todays);
                                        $todays = mktime(0, 0, 0, date('m'), date('d') - 5, date('Y'));
                                        $todayl5 = date('Y-m-d', $todays);
                                        $todays = mktime(0, 0, 0, date('m'), date('d') - 4, date('Y'));
                                        $todayl4 = date('Y-m-d', $todays);
                                        $todays = mktime(0, 0, 0, date('m'), date('d') - 3, date('Y'));
                                        $todayl3 = date('Y-m-d', $todays);
                                        $todays = mktime(0, 0, 0, date('m'), date('d') - 2, date('Y'));
                                        $todayl2 = date('Y-m-d', $todays);
                                        $todays = mktime(0, 0, 0, date('m'), date('d') - 1, date('Y'));
                                        $todayl1 = date('Y-m-d', $todays);
                                        $showPrice1 = "select cart_status,departure_day, sum(sumPrice) as sumH from cart where departure_day='$todayl1' and cart_status = '3'";
                                        $showP1 = $local->query($showPrice1)->fetch();
                                        $showPrice2 = "select cart_status,departure_day, sum(sumPrice) as sumH from cart where departure_day='$todayl2' and cart_status = '3'";
                                        $showP2 = $local->query($showPrice2)->fetch();
                                        $showPrice3 = "select cart_status,departure_day, sum(sumPrice) as sumH from cart where departure_day='$todayl3' and cart_status = '3'";
                                        $showP3 = $local->query($showPrice3)->fetch();
                                        $showPrice4 = "select cart_status,departure_day, sum(sumPrice) as sumH from cart where departure_day='$todayl4' and cart_status = '3'";
                                        $showP4 = $local->query($showPrice4)->fetch();
                                        $showPrice5 = "select cart_status,departure_day, sum(sumPrice) as sumH from cart where departure_day='$todayl5' and cart_status = '3'";
                                        $showP5 = $local->query($showPrice5)->fetch();
                                        $showPrice6 = "select cart_status,departure_day, sum(sumPrice) as sumH from cart where departure_day='$todayl6' and cart_status = '3'";
                                        $showP6 = $local->query($showPrice6)->fetch();
                                        $showPrice7 = "select cart_status,departure_day, sum(sumPrice) as sumH from cart where departure_day='$todayl7' and cart_status = '3'";
                                        $showP7 = $local->query($showPrice7)->fetch();
                                        ?>
                                        <div class=" <?php if (!empty($date2)) {
                                                            echo "block";
                                                        } else {
                                                            echo 'hidden';
                                                        } ?>">
                                            <table class="table text-center mt-20 text-xl ">

                                                <thead class=" text-primary">
                                                    <tr>
                                                        <th><?php
                                                            if ($search == 0) {
                                                                echo 'Tổng số đơn chưa duyệt';
                                                            } else if ($search == 1) {
                                                                echo 'Tổng số đơn đã duyệt';
                                                            } else if ($search == 2) {
                                                                echo 'Tổng số đơn đã hủy';
                                                            } else if ($search == 3) {
                                                                echo 'Tổng số đơn đã hoàn thành';
                                                            } else {
                                                                echo 'Tổng số đơn tour';
                                                            }
                                                            ?></th>
                                                        <th>Tổng số lượt khách</th>
                                                        <th>Từ ngày</th>
                                                        <th>Đến ngày</th>
                                                        <th>Tổng doanh thu(đã hoàn thành) </th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <td class="text-primary">
                                                            <?php echo $total['finish']; ?></td>
                                                        <td class="text-primary">
                                                            <?php echo $total['total']; ?>
                                                        </td class="text-primary">
                                                        <td class="text-primary">
                                                            <?php echo $date1 ?>
                                                        </td class="text-primary">
                                                        <td class="text-primary">
                                                            <?php echo $date2 ?>
                                                        </td class="text-primary">
                                                        <td class="text-primary">
                                                            <?php echo number_format($totall['sum(sumPrice)'], 0, '.', ',') . 'vnd';  ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div style="width: 1000px;height: 400px;" class="mx-auto mt-4">
                                        <canvas id="myChart" width="1000"></canvas>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="copyright float-center">
                        &copy;
                        <script>
                        document.write(new Date().getFullYear())
                        </script>, made with <i class="material-icons">favorite</i> by
                        <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script>
    var bienx = ['<?php echo $todayl7 ?>', '<?php echo $todayl6 ?>', '<?php echo $todayl5 ?>', '<?php echo $todayl4 ?>',
        '<?php echo $todayl3 ?>', '<?php echo $todayl2 ?>', '<?php echo $todayl1 ?>'
    ];
    var bieny = [<?php if (!empty($showP7['sumH'])) {
                            echo $showP7['sumH'];
                        } else {
                            echo '0';
                        }   ?>, <?php if (!empty($showP6['sumH'])) {
                                    echo $showP6['sumH'];
                                } else {
                                    echo '0';
                                } ?>, <?php if (!empty($showP5['sumH'])) {
                                            echo $showP5['sumH'];
                                        } else {
                                            echo '0';
                                        } ?>, <?php if (!empty($showP4['sumH'])) {
                                                    echo $showP4['sumH'];
                                                } else {
                                                    echo '0';
                                                } ?>, <?php if (!empty($showP3['sumH'])) {
                                                            echo $showP3['sumH'];
                                                        } else {
                                                            echo '0';
                                                        } ?>, <?php if (!empty($showP2['sumH'])) {
                                                                    echo $showP2['sumH'];
                                                                } else {
                                                                    echo '0';
                                                                } ?>, <?php if (!empty($showP1['sumH'])) {
                                                                            echo $showP1['sumH'];
                                                                        } else {
                                                                            echo '0';
                                                                        } ?>];
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: bienx,
            datasets: [{
                label: 'Biểu đồ doanh thu trong 7 ngày gần nhất(VND)',
                data: bieny

            }]
        },
    });
    </script>
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Plugin for the momentJs  -->
    <script src="../assets/js/plugins/moment.min.js"></script>
    <!--  Plugin for Sweet Alert -->
    <script src="../assets/js/plugins/sweetalert2.js"></script>
    <!-- Forms Validations Plugin -->
    <script src="../assets/js/plugins/jquery.validate.min.js"></script>
    <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
    <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    <script src="../assets/js/plugins/fullcalendar.min.js"></script>
    <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
    <script src="../assets/js/plugins/jquery-jvectormap.js"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="../assets/js/plugins/nouislider.min.js"></script>
    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <!-- Library for adding dinamically elements -->
    <script src="../assets/js/plugins/arrive.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chartist JS -->
    <script src="../assets/js/plugins/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="../assets/demo/demo.js"></script>
    <script>
    $(document).ready(function() {
        $().ready(function() {
            $sidebar = $('.sidebar');

            $sidebar_img_container = $sidebar.find('.sidebar-background');

            $full_page = $('.full-page');

            $sidebar_responsive = $('body > .navbar-collapse');

            window_width = $(window).width();

            fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

            if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                    $('.fixed-plugin .dropdown').addClass('open');
                }

            }

            $('.fixed-plugin a').click(function(event) {
                // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                if ($(this).hasClass('switch-trigger')) {
                    if (event.stopPropagation) {
                        event.stopPropagation();
                    } else if (window.event) {
                        window.event.cancelBubble = true;
                    }
                }
            });

            $('.fixed-plugin .active-color span').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-color', new_color);
                }

                if ($full_page.length != 0) {
                    $full_page.attr('filter-color', new_color);
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.attr('data-color', new_color);
                }
            });

            $('.fixed-plugin .background-color .badge').click(function() {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('background-color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-background-color', new_color);
                }
            });

            $('.fixed-plugin .img-holder').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).parent('li').siblings().removeClass('active');
                $(this).parent('li').addClass('active');


                var new_image = $(this).find("img").attr('src');

                if ($sidebar_img_container.length != 0 && $(
                        '.switch-sidebar-image input:checked').length != 0) {
                    $sidebar_img_container.fadeOut('fast', function() {
                        $sidebar_img_container.css('background-image', 'url("' +
                            new_image + '")');
                        $sidebar_img_container.fadeIn('fast');
                    });
                }

                if ($full_page_background.length != 0 && $(
                        '.switch-sidebar-image input:checked').length != 0) {
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find(
                        'img').data('src');

                    $full_page_background.fadeOut('fast', function() {
                        $full_page_background.css('background-image', 'url("' +
                            new_image_full_page + '")');
                        $full_page_background.fadeIn('fast');
                    });
                }

                if ($('.switch-sidebar-image input:checked').length == 0) {
                    var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr(
                        'src');
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find(
                        'img').data('src');

                    $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                    $full_page_background.css('background-image', 'url("' +
                        new_image_full_page + '")');
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                }
            });

            $('.switch-sidebar-image input').change(function() {
                $full_page_background = $('.full-page-background');

                $input = $(this);

                if ($input.is(':checked')) {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar_img_container.fadeIn('fast');
                        $sidebar.attr('data-image', '#');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page_background.fadeIn('fast');
                        $full_page.attr('data-image', '#');
                    }

                    background_image = true;
                } else {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar.removeAttr('data-image');
                        $sidebar_img_container.fadeOut('fast');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page.removeAttr('data-image', '#');
                        $full_page_background.fadeOut('fast');
                    }

                    background_image = false;
                }
            });

            $('.switch-sidebar-mini input').change(function() {
                $body = $('body');

                $input = $(this);

                if (md.misc.sidebar_mini_active == true) {
                    $('body').removeClass('sidebar-mini');
                    md.misc.sidebar_mini_active = false;

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                } else {

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                    setTimeout(function() {
                        $('body').addClass('sidebar-mini');

                        md.misc.sidebar_mini_active = true;
                    }, 300);
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
        });
    });
    </script>
</body>

</html>