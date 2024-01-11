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
                                            <!-- <option selected></option> -->
                                            <?php foreach ($data['lineMaster'] as $lineMaster): ?>
                                                <option value="<?php echo $lineMaster['nama_line']; ?>"
                                                    data-id="<?php echo $lineMaster['id']; ?>">
                                                    <?php echo $lineMaster['nama_line']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="col-3">
                                        <label for="shift" class="form-label col-form-label-sm">Shift</label>
                                        <select class="form-select form-select-sm" id="shift" name="shift"
                                            aria-label="Default select example">
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
                                            <?php
                                            $uniqueMaterials = array_unique(array_column($data['lineMaster'], 'material'));

                                            foreach ($uniqueMaterials as $material): ?>
                                                <?php if (!empty($material)): ?>
                                                    <option value="<?php echo $material; ?>">
                                                        <?php echo $material; ?>
                                                    </option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-3 pt-3">
                                        <label for="lineCode" class="form-label col-form-label-sm">Line Code</label>
                                        <select class="form-select form-select-sm" id="lineCode" name="line_code"
                                            aria-label="Default select example">
                                            <?php foreach ($data['lineMaster'] as $lineMaster): ?>
                                                <option value="<?php echo $lineMaster['line_code']; ?>">
                                                    <?php echo $lineMaster['line_code']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="col-3 pt-3">
                                        <label for="costCenter" class="form-label col-form-label-sm">Cost
                                            Center</label>
                                        <select class="form-select form-select-sm" id="costCenter" name="cost_center"
                                            aria-label="Default select example">
                                            <?php foreach ($data['lineMaster'] as $lineMaster): ?>
                                                <option value="<?php echo $lineMaster['cost_center']; ?>">
                                                    <?php echo $lineMaster['cost_center']; ?>
                                                </option>
                                            <?php endforeach; ?>
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
                                            <option data-id="" value=""></option>
                                        </select>
                                    </div>

                                    <div class="col-4">
                                        <label for="partName" class="form-label col-form-label-sm">Part Name</label>
                                        <select class="form-select form-select-sm" id="partName" name="part_name"
                                            aria-label="Default select example">
                                            <!-- <option selected>Pilih Part Name</option> -->
                                            <option data-id="" value=""></option>
                                        </select>
                                    </div>

                                    <div class="col-2">
                                        <label for="uniqeNo" class="form-label col-form-label-sm">Uniqe No</label>
                                        <select class="form-select form-select-sm" id="uniqeNo" name="uniqe_no"
                                            aria-label="Default select example">
                                            <!-- <option selected>Pilih Uniqe No</option> -->
                                            <option data-id="" value=""></option>
                                        </select>
                                    </div>

                                    <!-- Hidden inputs to store selected texts -->
                                    <!-- <input type="hidden" id="hiddenPartNumber" name="hiddenPartNumber">
                                    <input type="hidden" id="hiddenPartName" name="hiddenPartName">
                                    <input type="hidden" id="hiddenUniqeNo" name="hiddenUniqeNo">
                                    <input type="hidden" id="hiddenSourceType" name="hiddenSourceType"> -->
                                    <input type="hidden" id="hiddenUser"
                                        value="<?php echo isset($data['user']['username']) ? $data['user']['username'] : 'Guest'; ?>"
                                        name="hiddenUser">

                                    <div class="col-1">
                                        <label for="qty" class="form-label col-form-label-sm">Qty</label>
                                        <input required class="form-control form-control-sm text-center" name="qty"
                                            type="number" placeholder="" aria-label="default input example">
                                    </div>

                                    <div class="col-2">
                                        <label for="sourceType" class="form-label col-form-label-sm">Souurce
                                            Type</label>
                                        <select class="form-select form-select-sm" id="sourceType" name="source_type"
                                            aria-label="Default select example">
                                            <!-- <option selected>Pilih Source Type</option> -->
                                            <option data-id="" value=""></option>
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
                        <textarea required class="form-control form-control-sm" name="remarks"
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
                                                <th scope="col">Material</th>
                                                <th scope="col">Tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody id="dataTable">
                                            <!-- <tr>
                                                <td>
                                                </td>
                                                <td>
                                                        <button type="button" class="btn btn-success btn-sm"
                                                            style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .8rem; --bs-btn-font-size: .75rem;">Edit</button>
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Delete</button>
                                                    </td>
                                            </tr> -->
                                        </tbody>
                                    </table>

                                </div>
                                <div class="card-footer"></div>
                            </div> <!--Card #4 End-->
                        </div>
                    </div> <!--columns center footer end-->

                    <div class="row">
                        <div class="col text-center">
                            <form action="<?php echo BASEURL; ?>/create/submit" method="post" id="myForm">
                                <input type="hidden" id="hiddenUser2"
                                    value="<?php echo isset($data['user']['username']) ? $data['user']['username'] : 'Guest'; ?>"
                                    name="hiddenUser2">
                                <button id="submitBtn" type="submit" class="btn btn-success">Submit</button>
                                <button type="button" class="btn btn-warning">Cancel</button>
                            </form>
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