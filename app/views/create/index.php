<main id="main" class="main">

    <div class="pagetitle">
        <h1>Create</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo BASEURL; ?>">Home</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">

                <form id="formInput" method="POST" action="" class="card bg-transparent p-3 card-blur"> <!--Form-->
                    <div class="card-header mb-3 bg-transparent card-blur">
                        Form Input
                    </div>

                    <div class="row">
                        <div class="col text-center">
                            <?php Flasher::flash(); ?>
                        </div>
                    </div> <!--alert end-->

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
                                        <label for="line_lsr" class="form-label col-form-label-sm">Line</label>
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
                                            foreach ($uniqueMaterials as $material):
                                                if (!empty($material)):
                                                    ?>
                                                    <option data-id="<?php echo $lineMaster['id']; ?>"
                                                        value="<?php echo $material; ?>">
                                                        <?php echo $material; ?>
                                                    </option>
                                                    <?php
                                                endif;
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-3 pt-3">
                                        <label for="line_code" class="form-label col-form-label-sm">Line Code</label>
                                        <select class="form-select form-select-sm" id="lineCode" name="line_code"
                                            aria-label="Disabled select example">
                                            <?php foreach ($data['lineMaster'] as $lineMaster): ?>
                                                <option data-id="<?php echo $lineMaster['id']; ?>"
                                                    value="<?php echo $lineMaster['line_code']; ?>">
                                                    <?php echo $lineMaster['line_code']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="col-3 pt-3">
                                        <label for="cost_center" class="form-label col-form-label-sm">Cost
                                            Center</label>
                                        <select class="form-select form-select-sm" id="costCenter" name="cost_center"
                                            aria-label="Disabled select example">
                                            <?php foreach ($data['lineMaster'] as $lineMaster): ?>
                                                <option data-id="<?php echo $lineMaster['id']; ?>"
                                                    value="<?php echo $lineMaster['cost_center']; ?>">
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
                                        <label for="part_number" class="form-label col-form-label-sm">Part
                                            Number</label>
                                        <select class="form-select form-select-sm" id="partNumber" name="part_number"
                                            aria-label="Default select example">
                                            <option data-id="" value=""></option>
                                        </select>
                                    </div>

                                    <div class="col-4">
                                        <label for="part_name" class="form-label col-form-label-sm">Part Name</label>
                                        <select class="form-select form-select-sm" id="partName" name="part_name"
                                            aria-label="Default select example">
                                            <option data-id="" value=""></option>
                                        </select>
                                    </div>

                                    <div class="col-2">
                                        <label for="uniqe_no" class="form-label col-form-label-sm">Uniqe No</label>
                                        <select class="form-select form-select-sm" id="uniqeNo" name="uniqe_no"
                                            aria-label="Default select example">
                                            <option data-id="" value=""></option>
                                        </select>
                                    </div>

                                    <!-- Hidden inputs to store selected texts -->
                                    <!-- <input type="hidden" id="hiddenPartNumber" name="hiddenPartNumber">
                                    <input type="hidden" id="hiddenPartName" name="hiddenPartName">
                                    <input type="hidden" id="hiddenUniqeNo" name="hiddenUniqeNo">
                                    <input type="hidden" id="hiddenSourceType" name="hiddenSourceType"> -->
                                    <input type="hidden" id="lineUser"
                                        value="<?php echo isset($data['user']['line_user']) ? $data['user']['line_user'] : 'Guest'; ?>"
                                        name="lineUser">
                                    <input type="hidden" id="shiftUser"
                                        value="<?php echo isset($data['user']['shift_user']) ? $data['user']['shift_user'] : 'Guest'; ?>"
                                        name="shiftUser">
                                    <select hidden class="form-select form-select-sm" id="price" name="price"
                                        aria-label="Default select example">
                                        <!-- <option selected>Pilih Part Name</option> -->
                                        <option data-id="" value=""></option>
                                    </select>


                                    <div class="col-1">
                                        <label for="qty" class="form-label col-form-label-sm">Qty</label>
                                        <input required class="form-control form-control-sm text-center" id="qty"
                                            name="qty" type="number" placeholder="" aria-label="default input example">
                                    </div>

                                    <div class="col-2">
                                        <label for="source_type" class="form-label col-form-label-sm">Souurce
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
                                        <select required class="form-select form-select-sm" id="reason" name="reason"
                                            aria-label="Default select example">
                                            <option selected></option>
                                            <option value="A. Shortage / Missing">A. Shortage / Missing</option>
                                            <option value="B. Wrong ( Shortage )">B. Wrong ( Shortage )</option>
                                            <option value="C. Surplus">C. Surplus</option>
                                            <option value="D. Damage Origin">D. Damage Origin</option>
                                            <option value="E. Wrong ( Surplus )">E. Wrong ( Surplus )</option>
                                            <option value="F. Damage Handling">F. Damage Handling</option>
                                            <option value="G. Rusted">G. Rusted</option>
                                            <option value="H. Dented">H. Dented</option>
                                            <option value="I. Wet">I. Wet</option>
                                            <option value="Z. Other">Z. Other</option>
                                        </select>
                                    </div>

                                    <div class="col-4">
                                        <label for="condition" class="form-label col-form-label-sm">Condition</label>
                                        <select required class="form-select form-select-sm" id="condition"
                                            name="condition" aria-label="Default select example">
                                            <option selected></option>
                                            <option value="- Unknow">- Unknow</option>
                                            <option value="1. Good">1. Good</option>
                                            <option value="2. Damage">2. Damage</option>
                                            <option value="3. From TMMIN Unpacking">3. From TMMIN Unpacking</option>
                                        </select>
                                    </div>

                                    <div class="col-4">
                                        <label for="repair" class="form-label col-form-label-sm">Repair</label>
                                        <select required class="form-select form-select-sm" id="repair" name="repair"
                                            aria-label="Default select example">
                                            <option selected></option>
                                            <option value="0. Unrepairable">0. Unrepairable</option>
                                            <option value="1. Plant Repair">1. Plant Repair</option>
                                            <option value="6. Unrepairable caused by other parts">6. Unrepairable caused
                                                by other parts</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="card-footer"></div>
                            </div> <!--Card #3 End-->
                        </div>
                    </div> <!--columns center Midle 2 end-->

                    <div class="mb-3">
                        <label for="remarks" class="form-label col-form-label-sm">Remarks</label>
                        <textarea required class="form-control form-control-sm" name="remarks" id="remarks"
                            rows="3"></textarea>
                    </div> <!--remaks end-->

                    <div class="row">
                        <div class="col text-center">
                            <button type="submit" id="submit" class="btn btn-primary" name="submit">Submit</button>
                            <button id="clear" type="button" class="btn btn-danger" name="clear">Clear</button>
                        </div>
                    </div>
                </form> <!--form end-->

                <div id="error-messages" class="error-message"></div>

                <!-- Modal Bootstrap Alert -->
                <div class="modal fade" id="alertModalSubmit" tabindex="-1" role="dialog" aria-labelledby="alertModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="alertModalLabel">Sukses!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="modalAlertContent">
                                Data berhasil dikirim.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- columns center Footer-->
                <div class="card bg-transparent p-3 card-blur">
                    <div class="card-header mb-3 bg-transparent card-blur">
                        Submited
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card"> <!--Card #4-->
                                <div class="card-header mb-3">
                                    List Material Updated
                                </div>
                                <div class="row card-body">

                                    <table id="tabelData2"
                                        class="display nowrap table-sm table-bordered text-center table-striped"
                                        style="width: 100%;">
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
                                                <th scope="col">Date</th>
                                                <th scope="col">Cost Center</th>
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
                </div>
            </div>

            <!-- Assembly Card -->
            <div class="col-xxl-4 col-md-6">
            </div>
        </div><!-- End Assembly Card -->

        </div>
    </section>

</main><!-- End #main -->