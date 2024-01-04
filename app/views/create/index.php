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

                <Form method="POST" action="<?php echo BASEURL; ?>/create/tambah"
                    class="card bg-transparent p-3 card-blur"> <!--Form-->
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
                                    <div class="col-3">
                                        <label for="tanggal" class="form-label col-form-label-sm">Date</label>
                                        <input type="date" id="tanggal" name="tanggal" value=""
                                            class="form-control form-control-sm" />
                                    </div>
                                    <div class="cs-form col-3">
                                        <label for="waktu" class="form-label col-form-label-sm">Time</label>
                                        <input type="time" id="waktu" name="waktu" class="form-control form-control-sm"
                                            value="" />
                                    </div>
                                    <div class="col-3">
                                        <label for="line" class="form-label col-form-label-sm">Line</label>
                                        <select class="form-select form-select-sm" id="line" name="line_lsr"
                                            aria-label="Default select example">
                                            <option selected></option>
                                            <option value="Main Line">Main Line</option>
                                            <option value="Sub Line">Sub Line</option>
                                            <option value="Crankshaft">Crankshaft</option>
                                            <option value="Cylinder Block">Cylinder Block</option>
                                            <option value="Cylinder Head">Cylinder Head</option>
                                            <option value="Camshaft">Camshaft</option>
                                            <option value="Die Casting">Die Casting</option>
                                            <option value="Quality">Quality</option>
                                            <option value="Logistic Operational">Logistic Operational</option>
                                            <option value="Maintenance">Maintenance</option>
                                            <option value="Maintenance DC">Maintenance DC</option>
                                            <option value="Engser">Engser</option>
                                            <option value="Engser casting">Engser casting</option>
                                            <option value="Technical Support">Technical Support</option>
                                        </select>
                                    </div>

                                    <div class="col-3">
                                        <label for="shift" class="form-label col-form-label-sm">Shift</label>
                                        <select class="form-select form-select-sm" id="shift" name="shift"
                                            aria-label="Default select example">
                                            <option selected></option>
                                            <option value="Red">Red</option>
                                            <option value="White">White</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row card-body">
                                    <div class="col-3 pt-3">
                                        <label for="material" class="form-label col-form-label-sm">Material</label>
                                        <select class="form-select form-select-sm" id="material" name="material"
                                            aria-label="Default select example">
                                            <option selected></option>
                                            <option value="Assembly">Assembly</option>
                                            <option value="Crankshaft">Crankshaft</option>
                                            <option value="Cylinder Block">Cylinder Block</option>
                                            <option value="Cylinder Head">Cylinder Head</option>
                                            <option value="Camshaft">Camshaft</option>
                                            <option value="Die Casting">Die Casting</option>
                                        </select>
                                    </div>
                                    <div class="col-3 pt-3">
                                        <label for="lineCode" class="form-label col-form-label-sm">Line Code</label>
                                        <select class="form-select form-select-sm" id="lineCode" name="line_code"
                                            aria-label="Default select example">
                                            <option selected></option>
                                            <option value="KML">KML</option>
                                            <option value="KSL">KSL</option>
                                            <option value="MCR">MCR</option>
                                            <option value="MCB">MCB</option>
                                            <option value="MCH">MCH</option>
                                            <option value="MCA">MCA</option>
                                            <option value="CDC">CDC</option>
                                            <option value="QC">QC</option>
                                            <option value="LOG">LOG</option>
                                            <option value="MT">MT</option>
                                            <option value="MDC">MDC</option>
                                            <option value="ES">ES</option>
                                            <option value="ESC">ESC</option>
                                            <option value="TS">TS</option>
                                        </select>
                                    </div>

                                    <div class="col-3 pt-3">
                                        <label for="costCenter" class="form-label col-form-label-sm">Cost
                                            Center</label>
                                        <select class="form-select form-select-sm" id="costCenter" name="cost_center"
                                            aria-label="Default select example">
                                            <option selected></option>
                                            <option value="AQK200">AQK200</option>
                                            <option value="AQK100">AQK100</option>
                                            <option value="AQK100">AQM300</option>
                                            <option value="AQM100">AQM100</option>
                                            <option value="AQM200">AQM200</option>
                                            <option value="AQM400">AQM400</option>
                                            <option value="AQC100">AQC100</option>
                                            <option value="AWM300">AWM300</option>
                                            <option value="AQN200">AQN200</option>
                                            <option value="AWM300">AWM300</option>
                                            <option value="AWM200">AWM200</option>
                                            <option value="AWC200">AWC200</option>
                                            <option value="ADA403">ADA403</option>
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
                                        <select class="form-select form-select-sm" id="partNumber" name="part_number"
                                            aria-label="Default select example">
                                            <!-- <option selected>Pilih Part Number</option> -->
                                            <?php foreach ($data['matMaster'] as $matMaster): ?>
                                                <option value="<?php echo $matMaster['part_number']; ?>"
                                                    data-id="<?php echo $matMaster['id']; ?>">
                                                    <?php echo $matMaster['part_number']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="col-4">
                                        <label for="partName" class="form-label col-form-label-sm">Part Name</label>
                                        <select class="form-select form-select-sm" id="partName" name="part_name"
                                            aria-label="Default select example">
                                            <!-- <option selected>Pilih Part Name</option> -->
                                            <?php foreach ($data['matMaster'] as $matMaster): ?>
                                                <option value="<?php echo $matMaster['part_name']; ?>"
                                                    data-id="<?php echo $matMaster['id']; ?>">
                                                    <?php echo $matMaster['part_name']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="col-2">
                                        <label for="uniqeNo" class="form-label col-form-label-sm">Uniqe No</label>
                                        <select class="form-select form-select-sm" id="uniqeNo" name="uniqe_no"
                                            aria-label="Default select example">
                                            <!-- <option selected>Pilih Uniqe No</option> -->
                                            <?php foreach ($data['matMaster'] as $matMaster): ?>
                                                <option value="<?php echo $matMaster['uniqe_no']; ?>"
                                                    data-id="<?php echo $matMaster['id']; ?>">
                                                    <?php echo $matMaster['uniqe_no']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <!-- Hidden inputs to store selected texts -->
                                    <!-- <input type="hidden" id="hiddenPartNumber" name="hiddenPartNumber">
                                    <input type="hidden" id="hiddenPartName" name="hiddenPartName">
                                    <input type="hidden" id="hiddenUniqeNo" name="hiddenUniqeNo">
                                    <input type="hidden" id="hiddenSourceType" name="hiddenSourceType"> -->

                                    <div class="col-1">
                                        <label for="qty" class="form-label col-form-label-sm">Qty</label>
                                        <input class="form-control form-control-sm text-center" name="qty" type="number"
                                            placeholder="" aria-label="default input example">
                                    </div>

                                    <div class="col-2">
                                        <label for="sourceType" class="form-label col-form-label-sm">Souurce
                                            Type</label>
                                        <select class="form-select form-select-sm" id="sourceType" name="source_type"
                                            aria-label="Default select example">
                                            <!-- <option selected>Pilih Source Type</option> -->
                                            <?php foreach ($data['matMaster'] as $matMaster): ?>
                                                <option value="<?php echo $matMaster['source_type']; ?>"
                                                    data-id="<?php echo $matMaster['id']; ?>">
                                                    <?php echo $matMaster['source_type']; ?>
                                                </option>
                                            <?php endforeach; ?>
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
                                        <label for="condition" class="form-label col-form-label-sm">Condition</label>
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
                        <label for="exampleFormControlTextarea1" class="form-label col-form-label-sm">Remarks</label>
                        <textarea class="form-control form-control-sm" name="remarks" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
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

                                    <table class="table table-bordered table-sm text-center table-responsive-sm"
                                        style="font-size: .85rem;">
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
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($data['mat'] as $mat): ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $no++; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $mat["part_number"]; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $mat["part_name"]; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $mat["uniqe_no"]; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $mat["qty"]; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $mat["reason"]; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $mat["condition"]; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $mat["repair"]; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $mat["source_type"]; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $mat["remarks"]; ?>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-success btn-sm"
                                                            style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .8rem; --bs-btn-font-size: .75rem;">Edit</button>
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Delete</button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
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

                    <!-- <div class="row">
                        <div class="col text-center">
                            <button type="button" class="btn btn-success">Submit</button>
                            <button type="button" class="btn btn-warning">Cancel</button>
                        </div>
                    </div> -->
                </div>
            </div>

            <!-- Assembly Card -->
            <div class="col-xxl-4 col-md-6">
            </div>
        </div><!-- End Assembly Card -->

        </div>
    </section>

</main><!-- End #main -->