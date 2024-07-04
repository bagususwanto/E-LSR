<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo BASEURL; ?>">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Button Group -->
            <div class="col-lg-8">
                <div class="row">

                    <div class="col-xxl-12 col-md-12 pb-3" id="yearButton">

                    </div>
                    <div class="col-xxl-12 col-md-6 pb-3">
                        <button type="button" class="btn btn-outline-primary btn-month" data-month="1">Jan</button>
                        <button type="button" class="btn btn-outline-primary btn-month" data-month="2">Feb</button>
                        <button type="button" class="btn btn-outline-primary btn-month" data-month="3">Mar</button>
                        <button type="button" class="btn btn-outline-primary btn-month" data-month="4">Apr</button>
                        <button type="button" class="btn btn-outline-primary btn-month" data-month="5">May</button>
                        <button type="button" class="btn btn-outline-primary btn-month" data-month="6">Jun</button>
                        <button type="button" class="btn btn-outline-primary btn-month" data-month="7">Jul</button>
                        <button type="button" class="btn btn-outline-primary btn-month" data-month="8">Aug</button>
                        <button type="button" class="btn btn-outline-primary btn-month" data-month="9">Sept</button>
                        <button type="button" class="btn btn-outline-primary btn-month" data-month="10">Oct</button>
                        <button type="button" class="btn btn-outline-primary btn-month" data-month="11">Nov</button>
                        <button type="button" class="btn btn-outline-primary btn-month" data-month="12">Dec</button>
                    </div>
                </div>
            </div> <!-- end Button Group -->

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">


                    <!-- Assembly Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card K-card" data-id="K" id="assemblyCard">

                            <div class="card-body">
                                <h5 class="card-title">Assembly <span>| Amount</span></h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <img src="<?php echo BASEURL; ?>/img/assembly.gif" alt="assembly.gif"
                                            width="50px" height="auto">
                                    </div>
                                    <div class="ps-3">
                                        <h6 id="qtyK"></h6>
                                        <span id="costK" class="text-success small pt-1 fw-bold"></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Assembly Card -->

                    <!-- Machining Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card M-card" data-id="M" id="machiningCard">

                            <div class="card-body">
                                <h5 class="card-title">Machining <span>| Amount</span></h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <img src="<?php echo BASEURL; ?>/img/machining.png" alt="machining.png"
                                            width="50px" height="auto">
                                    </div>
                                    <div class="ps-3">
                                        <h6 id="qtyM"></h6>
                                        <span id="costM" class="text-success small pt-1 fw-bold"></span>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div><!-- End Machining Card -->

                    <!-- Casting Card -->
                    <div class="col-xxl-3 col-xl-12">

                        <div class="card info-card C-card" data-id="C" id="castingCard">

                            <div class="card-body">
                                <h5 class="card-title">Casting <span>| Amount</span></h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <img src="<?php echo BASEURL; ?>/img/casting.gif" alt="casting.gif" width="50px"
                                            height="auto">
                                    </div>
                                    <div class="ps-3">
                                        <h6 id="qtyC"></h6>
                                        <span id="costC" class="text-success small pt-1 fw-bold"></span>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div><!-- End Customers Card -->


                    <!-- others Card -->
                    <div class="col-xxl-3 col-xl-12">

                        <div class="card info-card X-card" data-id="X" id="othersCard">

                            <div class="card-body">
                                <h5 class="card-title">Others <span>| Amount</span></h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <img src="<?php echo BASEURL; ?>/img/others.gif" alt="others.gif" width="50px"
                                            height="auto">
                                    </div>
                                    <div class="ps-3">
                                        <h6 id="qtyX"><span></span></h6>
                                        <span id="costX" class="text-success small pt-1 fw-bold"></span>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div><!-- End others Card -->


                    <!-- Qty Amount -->
                    <div class="col-lg-8">
                        <div class="card">

                            <div class="card-body">
                                <h5 class="card-title">Qty<span> | Amount</span></h5>

                                <!-- Line Chart -->
                                <div id="chartBar" style="height:400px;"></div>



                            </div>

                        </div>
                    </div><!-- End Qty Amount -->

                    <!-- Right side columns -->
                    <div class="col-lg-4">

                        <!-- Cost Amount -->
                        <div class="card">

                            <div class="card-body text-center">
                                <h5 class="card-title">Cost<span> | Amount</h5>

                                <div id="chartPie" class="echart" style="height:375px;"></div>
                                <span id="costAmount" class="text-success small fw-bold fs-5"></span>
                            </div>
                        </div><!-- End Cost Amount -->

                    </div><!-- End Right side columns -->

                    <div class="col-lg-12">
                        <div class="row card-container">

                        </div>
                    </div>

                </div>
            </div><!-- End Left side columns -->

        </div>
    </section>

</main><!-- End #main -->