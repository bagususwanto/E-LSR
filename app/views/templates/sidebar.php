<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" id="dashboard" href="<?php echo BASEURL ?>">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item create">
            <a class="nav-link collapsed" id="create" href="<?php echo BASEURL ?>/create">
                <i class="bi bi-menu-button-wide"></i><span>Create</span>
            </a>
        </li><!-- End Create LSR Nav -->

        <!-- <li class="nav-item">
            <a class="nav-link collapsed" id="data" href="<?php echo BASEURL ?>/data">
                <i class="bi bi-journal-text"></i><span>Data</span>
            </a>
        </li>End Data Center Nav -->

        <li class="nav-item">
            <a id="trace" class="nav-link collapsed" data-bs-target="#forms-nav-data" data-bs-toggle="collapse"
                href="#">
                <i class="bi bi-journal-text"></i><span>Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav-data" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a id="report" class="nav-link collapsed" href="<?php echo BASEURL ?>/data/report">
                        <i class="bi bi-circle"></i><span>Report</span>
                    </a>
                </li>
                <li>
                    <a id="traceability" class="nav-link collapsed" href="<?php echo BASEURL ?>/data/traceability">
                        <i class="bi bi-circle"></i><span>Traceability</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Data Center Nav -->

        <!-- <li class="nav-item">
            <a class="nav-link collapsed" id="master" href="<?php echo BASEURL ?>/master">
                <i class="bi bi-layout-text-window-reverse"></i><span>Master</span>
            </a>
        </li>End Master Data Nav -->

        <li class="nav-item master-data">
            <a id="expand" class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-database-fill"></i><span>Master</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a class="nav-link collapsed" id="master" href="<?php echo BASEURL ?>/master/material">
                        <i class="bi bi-circle"></i><span>Material</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo BASEURL ?>">
                        <i class="bi bi-circle"></i><span>Cost Center</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->


        <li class="nav-heading">User</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?php echo BASEURL ?>/logout">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Logout</span>
            </a>
        </li><!-- End Logout Page Nav -->

    </ul>

</aside><!-- End Sidebar-->