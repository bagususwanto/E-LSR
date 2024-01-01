<?php
include("koneksi.php");

$query = "SELECT * FROM tb_data_dc;";
$sql = mysqli_query($conn, $query);
$no = 1;


$qry = "SELECT * FROM tb_master_part_dc";
$hasil = mysqli_query($conn, $qry);

if (!$hasil) {
    die("Query gagal " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>E-LSR - Line Supply Request</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="public/img/favicon.png" rel="icon">
    <link href="public/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="public/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="public/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="public/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="public/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="public/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="public/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="home.php" class="logo d-flex align-items-center">
                <img src="public/img/logo.png" alt="LSR">
                <span class="d-none d-lg-block">E-LSR</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number">4</span>
                    </a><!-- End Notification Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            You have 4 new notifications
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-exclamation-circle text-warning"></i>
                            <div>
                                <h4>Lorem Ipsum</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>30 min. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-x-circle text-danger"></i>
                            <div>
                                <h4>Atque rerum nesciunt</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>1 hr. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-check-circle text-success"></i>
                            <div>
                                <h4>Sit rerum fuga</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>2 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-info-circle text-primary"></i>
                            <div>
                                <h4>Dicta reprehenderit</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>4 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="dropdown-footer">
                            <a href="#">Show all notifications</a>
                        </li>

                    </ul><!-- End Notification Dropdown Items -->

                </li><!-- End Notification Nav -->


                <li class="nav-item dropdown nav-item-sm pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="public/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">Bagus U.</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6 id="namUser">Bagus Uswanto</h6>
                            <span id="validLine">CCR & Ordering</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" href="home.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link " href="create-lsr.php">
                    <i class="bi bi-menu-button-wide"></i><span>Create LSR</span>
                </a>
            </li><!-- End Create LSR Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-error-404.php">
                    <i class="bi bi-journal-text"></i><span>Data Center</span>
                </a>
            </li><!-- End Data Center Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-error-404.php">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Master Data</span>
                </a>
            </li><!-- End Master Data Nav -->


            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-error-404.php">
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                </a>
            </li><!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-error-404.php">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>Logout</span>
                </a>
            </li><!-- End Logout Page Nav -->

        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Create LSR</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                    <li class="breadcrumb-item active">Create LSR</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">

                    <Form method="POST" action="proses.php" class="card bg-transparent p-3 card-blur"> <!--Form-->
                        <div class="card-header mb-3 bg-transparent card-blur">
                            Form Input
                        </div>

                        <!-- columns center top -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card"> <!--Card Create LSR-->
                                    <div class="card-header mb-3">
                                        #1
                                    </div>
                                    <div class="row card-body">
                                        <div class="col-3 datepicker-container">
                                            <label for="tanggal" class="form-label col-form-label-sm">Date</label>
                                            <input type="date" id="tanggal" name="tanggal" value=""
                                                class="form-control form-control-sm" />
                                        </div>
                                        <div class="cs-form col-3">
                                            <label for="waktu" class="form-label col-form-label-sm">Time</label>
                                            <input type="time" id="waktu" name="waktu"
                                                class="form-control form-control-sm" value="" />
                                        </div>
                                        <div class="col-3">
                                            <label for="line" class="form-label col-form-label-sm">Line</label>
                                            <select class="form-select form-select-sm" id="line" name="line"
                                                aria-label="Default select example">
                                                <option selected></option>
                                                <option value="1">Main Line</option>
                                                <option value="2">Sub Line</option>
                                                <option value="3">Crankshaft</option>
                                                <option value="4">Cylinder Block</option>
                                                <option value="5">Cylinder Head</option>
                                                <option value="6">Camshaft</option>
                                                <option value="7">Die Casting</option>
                                                <option value="8">Quality</option>
                                                <option value="9">Logistic Operational</option>
                                                <option value="10">Maintenance</option>
                                                <option value="11">Maintenance DC</option>
                                                <option value="12">Engser</option>
                                                <option value="13">Engser casting</option>
                                                <option value="14">Tachnical Support</option>
                                            </select>
                                        </div>

                                        <div class="col-3">
                                            <label for="shift" class="form-label col-form-label-sm">Shift</label>
                                            <select class="form-select form-select-sm" id="shift" name="shift"
                                                aria-label="Default select example">
                                                <option selected></option>
                                                <option value="1">Red</option>
                                                <option value="2">White</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row card-body">
                                        <div class="col-3 pt-3">
                                            <label for="material" class="form-label col-form-label-sm">Material</label>
                                            <select class="form-select form-select-sm" id="material" name="material"
                                                aria-label="Default select example">
                                                <option selected></option>
                                                <option value="1">Assembly</option>
                                                <option value="2">Crankshaft</option>
                                                <option value="3">Cylinder Block</option>
                                                <option value="3">Cylinder Head</option>
                                                <option value="3">Camshaft</option>
                                                <option value="3">Die Casting</option>
                                            </select>
                                        </div>
                                        <div class="col-3 pt-3">
                                            <label for="lineCode" class="form-label col-form-label-sm">Line Code</label>
                                            <select class="form-select form-select-sm" id="lineCode" name="lineCode"
                                                aria-label="Default select example">
                                                <option selected></option>
                                                <option value="1">KML</option>
                                                <option value="1">KSL</option>
                                                <option value="2">MCR</option>
                                                <option value="3">MCB</option>
                                                <option value="3">MCH</option>
                                                <option value="3">MCA</option>
                                                <option value="3">CDC</option>
                                                <option value="3">QC</option>
                                                <option value="3">LOG</option>
                                                <option value="3">MT</option>
                                                <option value="3">MDC</option>
                                                <option value="3">ES</option>
                                                <option value="3">ESC</option>
                                                <option value="3">TS</option>
                                            </select>
                                        </div>

                                        <div class="col-3 pt-3">
                                            <label for="costCenter" class="form-label col-form-label-sm">Cost
                                                Center</label>
                                            <select class="form-select form-select-sm" id="costCenter" name="costCenter"
                                                aria-label="Default select example">
                                                <option selected></option>
                                                <option value="1">AQK200</option>
                                                <option value="1">AQK100</option>
                                                <option value="2">AQM300</option>
                                                <option value="3">AQM100</option>
                                                <option value="3">AQM200</option>
                                                <option value="3">AQM400</option>
                                                <option value="3">AQC100</option>
                                                <option value="3">AWM300</option>
                                                <option value="3">AQN200</option>
                                                <option value="3">AWM300</option>
                                                <option value="3">AWM200</option>
                                                <option value="3">AWC200</option>
                                                <option value="3">ADA403</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="card-footer"></div>
                                </div> <!--Card Create LSR End-->
                            </div>
                        </div>

                        <!-- columns center Midle -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card"> <!--Card #2-->
                                    <div class="card-header mb-3">
                                        #2
                                    </div>
                                    <div class="row card-body">


                                        <div class="col-3">
                                            <label for="partNumber" class="form-label col-form-label-sm">Part
                                                Number</label>
                                            <select class="form-select form-select-sm" id="partNumber" name="partNumber"
                                                aria-label="Default select example">
                                                <option selected>Pilih</option>

                                            </select>
                                        </div>

                                        <div class="col-4">
                                            <label for="partName" class="form-label col-form-label-sm">Part Name</label>
                                            <select class="form-select form-select-sm" id="partName" name="partName"
                                                aria-label="Default select example">
                                                <option selected>Pilih</option>

                                            </select>
                                        </div>

                                        <div class="col-2">
                                            <label for="uniqeNo" class="form-label col-form-label-sm">Uniqe No</label>
                                            <select class="form-select form-select-sm" id="uniqeNo" name="uniqeNo"
                                                aria-label="Default select example">
                                                <option selected>Pilih</option>

                                            </select>
                                        </div>

                                        <!-- Hidden inputs to store selected texts -->
                                        <input type="hidden" id="hiddenPartNumber" name="hiddenPartNumber">
                                        <input type="hidden" id="hiddenPartName" name="hiddenPartName">
                                        <input type="hidden" id="hiddenUniqeNo" name="hiddenUniqeNo">
                                        <input type="hidden" id="hiddenSourceType" name="hiddenSourceType">

                                        <div class="col-1">
                                            <label for="qty" class="form-label col-form-label-sm">Qty</label>
                                            <input class="form-control form-control-sm text-center" name="qty"
                                                type="text" placeholder="" aria-label="default input example">
                                        </div>

                                        <div class="col-2">
                                            <label for="sourceType" class="form-label col-form-label-sm">Souurce
                                                Type</label>
                                            <select class="form-select form-select-sm" id="sourceType" name="sourceType"
                                                aria-label="Default select example">
                                                <option selected>Pilih</option>

                                            </select>
                                        </div>

                                    </div>
                                    <div class="card-footer"></div>
                                </div> <!--Card #2 End-->
                            </div>
                        </div> <!--columns center Midle end-->

                        <!-- columns center Midle 2 -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card"> <!--Card #3-->
                                    <div class="card-header mb-3">
                                        #3
                                    </div>
                                    <div class="row card-body">

                                        <div class="col-4">
                                            <label for="reason" class="form-label col-form-label-sm">Reason</label>
                                            <select class="form-select form-select-sm" name="reason"
                                                aria-label="Default select example">
                                                <option selected>Pilih Reason</option>
                                                <option value="A">A. Shortage / Missing</option>
                                                <option value="B">B. Wrong ( Shortage )</option>
                                                <option value="C">C. Surplus</option>
                                                <option value="D">D. Damage Origin</option>
                                                <option value="E">E. Wrong ( Surplus )</option>
                                                <option value="F">F. Damage Handling</option>
                                                <option value="G">G. Rusted</option>
                                                <option value="H">H. Dented</option>
                                                <option value="I">I. Wet</option>
                                                <option value="Z">Z. Other</option>
                                            </select>
                                        </div>

                                        <div class="col-4">
                                            <label for="condition"
                                                class="form-label col-form-label-sm">Condition</label>
                                            <select class="form-select form-select-sm" name="condition"
                                                aria-label="Default select example">
                                                <option selected>Pilih Condition</option>
                                                <option value="-">- Unknow</option>
                                                <option value="1">1. Good</option>
                                                <option value="2">2. Damage</option>
                                                <option value="3">3. From TMMIN Unpacking</option>
                                            </select>
                                        </div>

                                        <div class="col-4">
                                            <label for="repair" class="form-label col-form-label-sm">Repair</label>
                                            <select class="form-select form-select-sm" name="repair"
                                                aria-label="Default select example">
                                                <option selected>Pilih Repair</option>
                                                <option value="0">0. Unrepairable</option>
                                                <option value="1">1. Plant Repair</option>
                                                <option value="6">6. Unrepairable caused by other parts</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="card-footer"></div>
                                </div> <!--Card #3 End-->
                            </div>
                        </div> <!--columns center Midle 2 end-->

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1"
                                class="form-label col-form-label-sm">Remarks</label>
                            <textarea class="form-control form-control-sm" name="remarks"
                                id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div> <!--remaks end-->

                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" id="getSelectedTextBtn" class="btn btn-primary"
                                    name="add">Add</button>
                                <button type="button" class="btn btn-danger" name="clear">Clear</button>
                            </div>
                        </div>
                    </Form> <!--form end-->


                    <!-- columns center Footer-->
                    <div class="card bg-transparent p-3 card-blur">
                        <div class="card-header mb-3 bg-transparent card-blur">
                            Submit
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card"> <!--Card #4-->
                                    <div class="card-header mb-3">
                                        List Material Updated
                                    </div>
                                    <div class="row card-body">

                                        <table class="table table-bordered table-sm text-center table-responsive-sm">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Part Number</th>
                                                    <th scope="col">Part Name</th>
                                                    <th scope="col">Uniqe No</th>
                                                    <th scope="col">Qty</th>
                                                    <th scope="col">Reason</th>
                                                    <th scope="col">Condition</th>
                                                    <th scope="col">Repair</th>
                                                    <th scope="col">Source</th>
                                                    <th scope="col">Remarks</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($result = mysqli_fetch_assoc($sql)) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $no++; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $result["part_number"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $result["part_name"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $result["uniqe_no"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $result["part_qty"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $result["reason_lsr"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $result["condition_lsr"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $result["repair_lsr"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $result["source_type"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $result["remarks_lsr"]; ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                                <!-- <tr>
                                                    <td>2</td>
                                                    <td>11461-0Y040-00</td>
                                                    <td>DAMPER, CHAIN VIBRATION, NO.2</td>
                                                    <td>S100</td>
                                                    <td>150</td>
                                                    <td>A</td>
                                                    <td>1</td>
                                                    <td>1</td>
                                                    <td>Part Scrap</td>
                                                </tr> -->
                                            </tbody>
                                            <!-- <tfoot>
                                                <th scope="col" colspan="9">Total</th>
                                                <td>999</td>
                                            </tfoot> -->
                                        </table>

                                    </div>
                                    <div class="card-footer"></div>
                                </div> <!--Card #4 End-->
                            </div>
                        </div> <!--columns center footer end-->

                        <div class="row">
                            <div class="col text-center">
                                <button type="button" class="btn btn-success">Submit</button>
                                <button type="button" class="btn btn-warning">Cancel</button>
                            </div>
                        </div>
                    </div>

                </div>





                <!-- Assembly Card -->
                <div class="col-xxl-4 col-md-6">
                </div>
            </div><!-- End Assembly Card -->

            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            Created By <strong><span>PPIC</span></strong> @2023.
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="public/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="public/vendor/chart.js/chart.umd.js"></script>
    <script src="public/vendor/echarts/echarts.min.js"></script>
    <script src="public/vendor/quill/quill.min.js"></script>
    <script src="public/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="public/vendor/tinymce/tinymce.min.js"></script>


    <!-- Template Main JS File -->
    <script src="public/js/main.js"></script>


    <!--================ jQuery======================= -->
    <script src="public/jquery/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function () {
            //============EVENT PART NUMBER CHANGE================================//
            // Fungsi untuk mengisi elemen "Part Number"
            function populatePartNumber() {
                $.ajax({
                    url: 'ajax_handler.php',
                    method: 'GET',
                    data: { action: 'get_part_number' },
                    success: function (data) {
                        $('#partNumber').html(data);
                    }
                });
            }

            // Panggil fungsi untuk mengisi elemen "Part Number"
            populatePartNumber();

            // Tanggapi perubahan pada elemen "Part Number"
            $('#partNumber').on('change', function () {
                var selectedPartNumberId = $(this).val();

                // Fungsi untuk mengisi elemen "part name" berdasarkan "Part Number" yang dipilih
                function populatePartName() {
                    $.ajax({
                        url: 'ajax_handler.php',
                        method: 'GET',
                        data: { action: 'get_part_name', partNumber: selectedPartNumberId },
                        success: function (data) {
                            $('#partName').html(data);
                        }
                    });
                }

                // Fungsi untuk mengisi elemen "Unique No" berdasarkan "Part Number" yang dipilih
                function populateUniqeNo() {
                    $.ajax({
                        url: 'ajax_handler.php',
                        method: 'GET',
                        data: { action: 'get_uniqe_number', partNumber: selectedPartNumberId },
                        success: function (data) {
                            $('#uniqeNo').html(data);
                        }
                    });
                }

                // Fungsi untuk mengisi elemen "source type" berdasarkan "Part Number" yang dipilih
                function populateSourceType() {
                    $.ajax({
                        url: 'ajax_handler.php',
                        method: 'GET',
                        data: { action: 'get_source_type', partNumber: selectedPartNumberId },
                        success: function (data) {
                            $('#sourceType').html(data);
                        }
                    });
                }

                // Panggil fungsi untuk mengisi elemen "Part name"
                populatePartName();

                // Panggil fungsi untuk mengisi elemen "Unique No"
                populateUniqeNo();

                // Panggil fungsi untuk mengisi elemen "source type"
                populateSourceType();
            });


            //============EVENT PART NAME CHANGE================================//
            // Fungsi untuk mengisi elemen "Part Number"
            function populatePartName2() {
                $.ajax({
                    url: 'ajax_handler.php',
                    method: 'GET',
                    data: { action: 'get_part_name2' },
                    success: function (data) {
                        $('#partName').html(data);
                    }
                });
            }

            // Panggil fungsi untuk mengisi elemen "Part Number"
            populatePartName2();

            // Tanggapi perubahan pada elemen "Part Number"
            $('#partName').on('change', function () {
                var selectedPartNameId = $(this).val();

                // Fungsi untuk mengisi elemen "part name" berdasarkan "Part Number" yang dipilih
                function populatePartNumber2() {
                    $.ajax({
                        url: 'ajax_handler.php',
                        method: 'GET',
                        data: { action: 'get_part_number2', partName: selectedPartNameId },
                        success: function (data) {
                            $('#partNumber').html(data);
                        }
                    });
                }

                // Fungsi untuk mengisi elemen "Unique No" berdasarkan "Part Number" yang dipilih
                function populateUniqeNo2() {
                    $.ajax({
                        url: 'ajax_handler.php',
                        method: 'GET',
                        data: { action: 'get_uniqe_number2', partName: selectedPartNameId },
                        success: function (data) {
                            $('#uniqeNo').html(data);
                        }
                    });
                }

                // Fungsi untuk mengisi elemen "source type" berdasarkan "Part Number" yang dipilih
                function populateSourceType2() {
                    $.ajax({
                        url: 'ajax_handler.php',
                        method: 'GET',
                        data: { action: 'get_source_type2', partName: selectedPartNameId },
                        success: function (data) {
                            $('#sourceType').html(data);
                        }
                    });
                }

                // Panggil fungsi untuk mengisi elemen "Part name"
                populatePartNumber2();

                // Panggil fungsi untuk mengisi elemen "Unique No"
                populateUniqeNo2();

                // Panggil fungsi untuk mengisi elemen "source type"
                populateSourceType2();
            });


            //============EVENT UNIQE NO CHANGE================================//
            // Fungsi untuk mengisi elemen "Part Number"
            function populateUniqeNo3() {
                $.ajax({
                    url: 'ajax_handler.php',
                    method: 'GET',
                    data: { action: 'get_uniqe_number3' },
                    success: function (data) {
                        $('#uniqeNo').html(data);
                    }
                });
            }

            // Panggil fungsi untuk mengisi elemen "Part Number"
            populateUniqeNo3();



            //============EVENT SOURCE TYPE CHANGE================================//
            // Fungsi untuk mengisi elemen "Part Number"
            function populatesourceType4() {
                $.ajax({
                    url: 'ajax_handler.php',
                    method: 'GET',
                    data: { action: 'get_source_type4' },
                    success: function (data) {
                        $('#sourceType').html(data);
                    }
                });
            }

            // Panggil fungsi untuk mengisi elemen "Part Number"
            populatesourceType4();
        });

    </script>

    <!-- //============EVENT TOMBOL SUBMIT KLIK================================// -->
    <script>
        $(document).ready(function () {
            $('#getSelectedTextBtn').on('click', function () {
                // Dapatkan teks yang terpilih dari setiap elemen select
                var partNumberText = $('#partNumber option:selected').text();
                var partNameText = $('#partName option:selected').text();
                var uniqeNoText = $('#uniqeNo option:selected').text();
                var sourceTypeText = $('#sourceType option:selected').text();

                // Masukkan nilai ke dalam input tersembunyi sebelum mengirimkan formulir
                $('#hiddenPartNumber').val(partNumberText);
                $('#hiddenPartName').val(partNameText);
                $('#hiddenUniqeNo').val(uniqeNoText);
                $('#hiddenSourceType').val(sourceTypeText);

                $('form').submit();
            });

        });
    </script>

    <!--================ ISI DATA DI FORM #1======================= -->
    <script>
        $(document).ready(function () {
            var lineUser = "$('#validLine').text()";
            var namaUser = "$('#namaUser').text()";

            // Fungsi untuk mengisi elemen "Part Number"
            function populateLine() {
                $.ajax({
                    url: 'ajax_handler.php',
                    method: 'GET',
                    data: { action: 'get_line' },
                    success: function (data) {
                        $('#line').html(data);

                        // // Tetapkan indeks terpilih setelah opsi dimuat
                        // var subLinIndex = $("#line option[value='2']").index();
                        // $("#line").prop('selectedIndex', subLineIndex);

                        // Cari indeks elemen dengan teks "Sub Line"
                        var LineIndex = $("#line option:contains('" + lineUser + "')").index();

                        // Setel elemen terpilih sesuai indeks yang ditemukan
                        $("#line").prop('selectedIndex', LineIndex);
                    }
                });
            }
            // function populateShift() {
            //     $.ajax({
            //         url: 'ajax_handler.php',
            //         method: 'GET',
            //         data: { action: 'get_shift', userShift: namaUser },
            //         success: function (data) {
            //             // Cari indeks elemen dengan teks "Sub Line"
            //             var ShiftIndex = $("#shift option:contains('" + userShift + "')").index();

            //             // Setel elemen terpilih sesuai indeks yang ditemukan
            //             $("#shift").prop('selectedIndex', ShiftIndex);
            //         }
            //     });
            // }
            // function populateMaterial() {
            //     $.ajax({
            //         url: 'ajax_handler.php',
            //         method: 'GET',
            //         data: { action: 'get_material' },
            //         success: function (data) {
            //             $('#shift').html(data);
            //         }
            //     });
            // }
            // function populateLineCode() {
            //     $.ajax({
            //         url: 'ajax_handler.php',
            //         method: 'GET',
            //         data: { action: 'get_line_code' },
            //         success: function (data) {
            //             $('#lineCode').html(data);
            //         }
            //     });
            // }
            // function populateCostCenter() {
            //     $.ajax({
            //         url: 'ajax_handler.php',
            //         method: 'GET',
            //         data: { action: 'get_cost_center' },
            //         success: function (data) {
            //             $('#costCenter').html(data);
            //         }
            //     });
            // }
            // populateCostCenter();
            // populateLineCode();
            // populateMaterial();
            // populateShift();
            populateLine();
        });
    </script>

</body>

</html>