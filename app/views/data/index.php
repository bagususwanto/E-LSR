<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo BASEURL; ?>">Home</a></li>
                <li class="breadcrumb-item active">Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">


                <!-- columns center top -->
                <div class="row">
                    <div class="col-12">
                        <div class="card bg-transparent"> <!--Card Create LSR-->
                            <div class="card-header bg-transparent mb-3">
                                Search
                            </div>

                            <div class="row card-body">
                                <div class="col-3">
                                    <label for="tanggal" class="form-label col-form-label-sm">Date From</label>
                                    <input type="date" id="tanggal" name="tanggal" value=""
                                        class="form-control form-control-sm" />
                                </div>

                                <div class="col-3">
                                    <label for="tanggalTo" class="form-label col-form-label-sm">Date To</label>
                                    <input type="date" id="tanggalTo" name="tanggalTo" value=""
                                        class="form-control form-control-sm" />
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
                                    <label for="costCenter" class="form-label col-form-label-sm">Cost
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

                                <div class="col-3 mt-3">
                                    <label for="shift" class="form-label col-form-label-sm">Shift</label>
                                    <select class="form-select form-select-sm" id="shift" name="shift"
                                        aria-label="Default select example">
                                        <option value="Red">Red</option>
                                        <option value="White">White</option>
                                    </select>
                                </div>

                                <div class="col-3 mt-3">
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
                                <div class="card-footer bg-transparent mt-4">
                                    <div class="row mb-0">
                                        <div class="col text-end mb-0">
                                            <button type="submit" id="search" class="btn btn-success"
                                                name="search">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div> <!--Card Create LSR End-->
                </div>
            </div>
        </div>



        </div>
    </section>

</main><!-- End #main -->\