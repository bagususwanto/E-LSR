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

                            <FORM id="searchForm">
                                <div class="row card-body pb-0">
                                    <div class="col-2">
                                        <label for="tanggal" class="form-label col-form-label-sm">Date From</label>
                                        <input type="date" id="tanggal" name="tanggal" value=""
                                            class="form-control form-control-sm" />
                                    </div>

                                    <div class="col-2">
                                        <label for="tanggalTo" class="form-label col-form-label-sm">Date To</label>
                                        <input type="date" id="tanggalTo" name="tanggalTo" value=""
                                            class="form-control form-control-sm" />
                                    </div>

                                    <div class="col-3">
                                        <label for="line" class="form-label col-form-label-sm">Line</label>
                                        <select class="form-select form-select-sm" id="line" name="line_lsr"
                                            aria-label="Default select example">
                                            <!-- <option selected></option> -->
                                            <option data-id="0" value="All">All</option>
                                            <?php foreach ($data['lineMaster'] as $lineMaster): ?>
                                                <option value="<?php echo $lineMaster['nama_line']; ?>"
                                                    data-id="<?php echo $lineMaster['id']; ?>">
                                                    <?php echo $lineMaster['nama_line']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="col-2">
                                        <label for="shift" class="form-label col-form-label-sm">Shift</label>
                                        <select class="form-select form-select-sm" id="shift" name="shift"
                                            aria-label="Default select example">
                                            <option value="All">All</option>
                                            <option value="Red">Red</option>
                                            <option value="White">White</option>
                                        </select>
                                    </div>

                                    <div class="col-3">
                                        <label for="material" class="form-label col-form-label-sm">Material</label>
                                        <select class="form-select form-select-sm" id="material" name="material"
                                            aria-label="Default select example">
                                            <option data-id="0" value="All">All</option>
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
                                        <div class="row  mb-0">
                                            <div class="col text-end mb-0">
                                                <button type="submit" id="search" class="btn btn-primary"
                                                    name="search">Search</button>
                                            </div>
                                        </div>
                                    </div>
                            </FORM>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">

                            <div class="col card bg-transparent pt-3">
                                <div class="card-header bg-transparent mb-3">
                                    Data Table
                                </div>
                                <div class="row card-body bg-transparent pb-0">
                                    <table id="tabelData"
                                        class="display nowrap table-sm table-bordered text-center table-striped"
                                        style="width: 100%;">
                                        <thead>
                                            
                                        </thead>
                                        <tbody id="DataTables">

                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer bg-transparent mt-4"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col utama -->
        </div>
    </section>
</main><!-- End #main -->