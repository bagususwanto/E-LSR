<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>E-SCRAP</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo BASEURL ?>/img/favicon.png" rel="icon">
    <link href="<?php echo BASEURL ?>/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo BASEURL ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASEURL ?>/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo BASEURL ?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo BASEURL ?>/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?php echo BASEURL ?>/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?php echo BASEURL ?>/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?php echo BASEURL ?>/vendor/select2/css/select2.min.css" rel="stylesheet">
    <link href="<?php echo BASEURL ?>/vendor/jquery/jquery.loadingModal.css" rel="stylesheet">
    <link href="<?php echo BASEURL ?>/vendor/toast/toast-plugin.css" rel="stylesheet">
    <link href="<?php echo BASEURL ?>/vendor/flatpickr/css/flatpickr.min.css" rel="stylesheet">

    <!-- DataTables -->
    <link href="<?php echo BASEURL ?>/vendor/datatables/DataTables-1.13.8/css/dataTables.bootstrap5.min.css"
        rel="stylesheet">
    <link href="<?php echo BASEURL ?>/vendor/datatables/Buttons-2.4.2/css/buttons.bootstrap5.min.css" rel="stylesheet">
    <link href="<?php echo BASEURL ?>/vendor/datatables/Buttons-2.4.2/css/buttons.bootstrap5.min.css" rel="stylesheet">
    <link href="<?php echo BASEURL ?>/vendor/datatables/fixedcolumns-4.3.0/css/fixedColumns.dataTables.min.css"
        rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo BASEURL ?>/css/style.css" rel="stylesheet">

    <script>
        // Menyimpan BASEURL dalam variabel JavaScript
        const BASEURL = "<?= BASEURL ?>";
    </script>

    <!-- =======================================================
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="<?php echo BASEURL ?>" class="logo d-flex align-items-center">
                <img src="<?php echo BASEURL ?>/img/logo.png" alt="LSR">
                <span class="d-none d-lg-block">E-SCRAP</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
            <input type="hidden" id="roleUser"
                value="<?php echo isset($data['user']['role']) ? $data['user']['role'] : 'public'; ?>" name="roleUser">
            <input type="hidden" id="validMaterial"
                value="<?php echo isset($data['userMat']['material']) ? $data['userMat']['material'] : 'Assembly'; ?>"
                name="">
        </div><!-- End Logo -->

        <div class="logo">
            <span class="ms-3 d-none d-lg-block"></span>
        </div>

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span id="notifCount" class="badge bg-primary badge-number" style="font-size: 0.50rem;"></span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            <span id="notifNumber" class="text-primary fw-bold"></span><span id="notifText"></span>
                            <a
                                href="<?php echo BASEURL; ?>/data/report?tanggalFrom=&tanggalTo=&line=<?php echo $data['user']['line_user']; ?>&shift=<?php echo $data['user']['shift_user']; ?>&lsrCode=<?php echo $data['user']['category']; ?>&status=Waiting%20Approved"><span
                                    class="badge rounded-pill bg-primary p-2 ms-2">View
                                    all</span></a>
                        </li>
                        <!-- <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-exclamation-circle text-warning"></i>
                            <div>
                                <h4>Report C000001</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>30 min. ago</p>
                            </div>
                        </li> -->

                    </ul><!-- End Notification Dropdown Items -->

                </li><!-- End Notification Nav -->


                <li class="nav-item dropdown nav-item-sm pe-3">

                    <a id="profileToggle" class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="<?php echo BASEURL ?>/img/profile/<?php echo isset($data['user']['username']) ? $data['user']['username'] : 'Guest'; ?>.jpg"
                            alt="Profile" class="rounded-circle">
                        <span id="userLog" class="d-none d-md-block dropdown-toggle ps-2"
                            data-id="<?php echo isset($data['user']['id']) ? $data['user']['id'] : 'Guest'; ?>">
                            <?php echo isset($data['user']['username']) ? $data['user']['username'] : 'Guest'; ?>
                        </span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <img src="<?php echo BASEURL ?>/img/profile/<?php echo isset($data['user']['username']) ? $data['user']['username'] : 'Guest'; ?>.jpg"
                                alt="Profile" width="60px" class="">
                            <h6>
                                <?php echo isset($data['user']['nama']) ? $data['user']['nama'] : 'Guest'; ?>
                            </h6>
                            <span id="validLine">
                                <?php echo isset($data['user']['line_user']) ? $data['user']['line_user'] : 'Guest'; ?>
                            </span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="<?php echo BASEURL ?>/logout">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Logout</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->