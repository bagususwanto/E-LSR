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

                    <div class="col-xxl-12 col-md-12 pb-3">
                        <button type="button" class="btn btn-outline-primary">2023</button>
                        <button type="button" class="btn btn-outline-primary">2024</button>
                    </div>
                    <div class="col-xxl-12 col-md-6 pb-3">
                        <button type="button" class="btn btn-outline-primary">Jan</button>
                        <button type="button" class="btn btn-outline-primary">Feb</button>
                        <button type="button" class="btn btn-outline-primary">Mar</button>
                        <button type="button" class="btn btn-outline-primary">Apr</button>
                        <button type="button" class="btn btn-outline-primary">May</button>
                        <button type="button" class="btn btn-outline-primary">Jun</button>
                        <button type="button" class="btn btn-outline-primary">Jul</button>
                        <button type="button" class="btn btn-outline-primary">Aug</button>
                        <button type="button" class="btn btn-outline-primary">Sept</button>
                        <button type="button" class="btn btn-outline-primary">Oct</button>
                        <button type="button" class="btn btn-outline-primary">Nov</button>
                        <button type="button" class="btn btn-outline-primary">Dec</button>
                    </div>
                </div>
            </div> <!-- end Button Group -->

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">


                    <!-- Assembly Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card sales-card" id="assemblyCard">

                            <div class="card-body">
                                <h5 class="card-title">Assembly <span>| Amount</span></h5>

                                <input type="hidden" id="assemblyLine" value="Assembly" name="assemblyLine">
                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <img src="<?php echo BASEURL; ?>/img/1NR-VE_Engine-removebg-preview.gif"
                                            alt="1NR-VE_Engine-removebg-preview.gif" width="50px" height="auto">
                                    </div>
                                    <div class="ps-3">
                                        <h6 id="qtyK">65</h6>
                                        <span class="text-success small pt-1 fw-bold">RP. 8.000.000.00</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Assembly Card -->

                    <!-- Machining Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card revenue-card" id="machiningCard">

                            <div class="card-body">
                                <h5 class="card-title">Machining <span>| Amount</span></h5>

                                <input type="hidden" id="machiningLine"
                                    value="Crankshaft,Cylinder Block,Cylinder Head,Camshaft" name="machiningLine">
                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <img src="<?php echo BASEURL; ?>/img/machining.png" alt="machining.png"
                                            width="50px" height="auto">
                                    </div>
                                    <div class="ps-3">
                                        <h6 id="qtyM">156</h6>
                                        <span class="text-success small pt-1 fw-bold">RP. 2.000.000.00</span>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div><!-- End Machining Card -->

                    <!-- Casting Card -->
                    <div class="col-xxl-3 col-xl-12" id="castingCard">

                        <div class="card info-card customers-card">

                            <div class="card-body">
                                <h5 class="card-title">Casting <span>| Amount</span></h5>

                                <input type="hidden" id="castingLine" value="Die Casting" name="castingLine">
                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <img src="<?php echo BASEURL; ?>/img/CB-removebg-preview.gif"
                                            alt="CB-removebg-preview.gif" width="50px" height="auto">
                                    </div>
                                    <div class="ps-3">
                                        <h6 id="qtyC">886</h6>
                                        <span class="text-success small pt-1 fw-bold">RP. 6.000.000.00</span>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div><!-- End Customers Card -->


                    <!-- others Card -->
                    <div class="col-xxl-3 col-xl-12" id="castingCard">

                        <div class="card info-card others-card">

                            <div class="card-body">
                                <h5 class="card-title">Others <span>| Amount</span></h5>

                                <input type="hidden" id="castingLine" value="others" name="castingLine">
                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <img src="<?php echo BASEURL; ?>/img/others.png" alt="others.png" width="50px"
                                            height="auto">
                                    </div>
                                    <div class="ps-3">
                                        <h6 id="qtyX">666</h6>
                                        <span class="text-success small pt-1 fw-bold">RP. 5.000.000.00</span>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div><!-- End others Card -->


                    <!-- Reports -->
                    <div class="col-lg-8">
                        <div class="card">

                            <div class="card-body">
                                <h5 class="card-title">Qty Amount <!--<span>| This Year</span>--></h5>

                                <!-- Line Chart -->
                                <div id="chartBar" style="height:400px;"></div>

                                <script>

                                </script>
                                <!-- End Line Chart -->

                            </div>

                        </div>
                    </div><!-- End Reports -->

                    <!-- Right side columns -->
                    <div class="col-lg-4">

                        <!-- Material Traffic -->
                        <div class="card">

                            <div class="card-body pb-0">
                                <h5 class="card-title">Cost Amount <!--<span>| This Year</span>--></h5>

                                <div id="chartPie" class="echart" style="height:420px;"></div>
                                <!-- class="echart" -->

                                <script>
                                    // document.addEventListener("DOMContentLoaded", () => {
                                    //     echarts.init(document.querySelector("#trafficChart")).setOption({
                                    //         tooltip: {
                                    //             trigger: 'item'
                                    //         },
                                    //         legend: {
                                    //             top: '5%',
                                    //             left: 'center'
                                    //         },
                                    //         series: [{
                                    //             name: 'Access From',
                                    //             type: 'pie',
                                    //             radius: ['40%', '80%'],
                                    //             avoidLabelOverlap: false,
                                    //             label: {
                                    //                 show: false,
                                    //                 position: 'center'
                                    //             },
                                    //             emphasis: {
                                    //                 label: {
                                    //                     show: true,
                                    //                     fontSize: '18',
                                    //                     fontWeight: 'bold'
                                    //                 }
                                    //             },
                                    //             labelLine: {
                                    //                 show: false
                                    //             },
                                    //             data: [{
                                    //                 value: 1048,
                                    //                 name: 'Assembly'
                                    //             },
                                    //             {
                                    //                 value: 735,
                                    //                 name: 'Machining'
                                    //             },
                                    //             {
                                    //                 value: 580,
                                    //                 name: 'Casting'
                                    //             },
                                    //             ]
                                    //         }]
                                    //     });
                                    // });
                                </script>

                            </div>
                        </div><!-- End Material Traffic -->

                    </div><!-- End Right side columns -->

                </div>
            </div><!-- End Left side columns -->



            <!-- Middle -->
            <!-- Recent Transaction -->
            <!-- <div class="col-12">
                <div class="card recent-sales overflow-auto">

                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Recent Transaction <span>| Today</span></h5>

                        <table id="example" class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Line</th>
                                    <th scope="col">Material</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><a href="#">#2457</a></th>
                                    <td>Assmebly</td>
                                    <td><a href="#" class="text-primary">At praesentium minu</a></td>
                                    <td>$64</td>
                                    <td><span class="badge bg-success">Approved</span></td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#">#2147</a></th>
                                    <td>Assembly</td>
                                    <td><a href="#" class="text-primary">Blanditiis dolor omnis
                                            similique</a></td>
                                    <td>$47</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#">#2049</a></th>
                                    <td>Machining</td>
                                    <td><a href="#" class="text-primary">At recusandae consectetur</a></td>
                                    <td>$147</td>
                                    <td><span class="badge bg-success">Approved</span></td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#">#2644</a></th>
                                    <td>Casting</td>
                                    <td><a href="#" class="text-primar">Ut voluptatem id earum et</a></td>
                                    <td>$67</td>
                                    <td><span class="badge bg-danger">Rejected</span></td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#">#2644</a></th>
                                    <td>Casting</td>
                                    <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                                    <td>$165</td>
                                    <td><span class="badge bg-success">Approved</span></td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#">#2644</a></th>
                                    <td>Casting</td>
                                    <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                                    <td>$165</td>
                                    <td><span class="badge bg-success">Approved</span></td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#">#2644</a></th>
                                    <td>Casting</td>
                                    <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                                    <td>$165</td>
                                    <td><span class="badge bg-success">Approved</span></td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#">#2644</a></th>
                                    <td>Casting</td>
                                    <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                                    <td>$165</td>
                                    <td><span class="badge bg-success">Approved</span></td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#">#2644</a></th>
                                    <td>Casting</td>
                                    <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                                    <td>$165</td>
                                    <td><span class="badge bg-success">Approved</span></td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#">#2644</a></th>
                                    <td>Casting</td>
                                    <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                                    <td>$165</td>
                                    <td><span class="badge bg-success">Approved</span></td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#">#2644</a></th>
                                    <td>Casting</td>
                                    <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                                    <td>$165</td>
                                    <td><span class="badge bg-success">Approved</span></td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#">#2644</a></th>
                                    <td>Casting</td>
                                    <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                                    <td>$165</td>
                                    <td><span class="badge bg-success">Approved</span></td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#">#2644</a></th>
                                    <td>Casting</td>
                                    <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                                    <td>$165</td>
                                    <td><span class="badge bg-success">Approved</span></td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#">#2644</a></th>
                                    <td>Casting</td>
                                    <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                                    <td>$165</td>
                                    <td><span class="badge bg-success">Approved</span></td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#">#2644</a></th>
                                    <td>Casting</td>
                                    <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                                    <td>$165</td>
                                    <td><span class="badge bg-success">Approved</span></td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#">#2644</a></th>
                                    <td>Casting</td>
                                    <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                                    <td>$165</td>
                                    <td><span class="badge bg-success">Approved</span></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>End transaction Sales -->


            <!-- Bottom  -->
            <!-- Top Transaction -->
            <!-- <div class="col-12">
                <div class="card top-selling overflow-auto">

                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>

                    <div class="card-body pb-0">
                        <h5 class="card-title">Top Transaction <span>| Today</span></h5>

                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">Preview</th>
                                    <th scope="col">Material</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><a href="#"><img src="<?php echo BASEURL; ?>/img/product-1.jpg"
                                                alt=""></a></th>
                                    <td><a href="#" class="text-primary fw-bold">Ut inventore ipsa voluptas
                                            nulla</a></td>
                                    <td>$64</td>
                                    <td class="fw-bold">124</td>
                                    <td>$5,828</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#"><img src="<?php echo BASEURL; ?>/img/product-2.jpg"
                                                alt=""></a></th>
                                    <td><a href="#" class="text-primary fw-bold">Exercitationem similique
                                            doloremque</a></td>
                                    <td>$46</td>
                                    <td class="fw-bold">98</td>
                                    <td>$4,508</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#"><img src="<?php echo BASEURL; ?>/img/product-3.jpg"
                                                alt=""></a></th>
                                    <td><a href="#" class="text-primary fw-bold">Doloribus nisi
                                            exercitationem</a></td>
                                    <td>$59</td>
                                    <td class="fw-bold">74</td>
                                    <td>$4,366</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#"><img src="<?php echo BASEURL; ?>/img/product-4.jpg"
                                                alt=""></a></th>
                                    <td><a href="#" class="text-primary fw-bold">Officiis quaerat sint rerum
                                            error</a></td>
                                    <td>$32</td>
                                    <td class="fw-bold">63</td>
                                    <td>$2,016</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#"><img src="<?php echo BASEURL; ?>/img/product-5.jpg"
                                                alt=""></a></th>
                                    <td><a href="#" class="text-primary fw-bold">Sit unde debitis delectus
                                            repellendus</a></td>
                                    <td>$79</td>
                                    <td class="fw-bold">41</td>
                                    <td>$3,239</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>End Top Transaction -->
            <!-- end bottom -->

        </div>
    </section>

</main><!-- End #main -->