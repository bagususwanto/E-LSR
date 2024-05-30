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
                        <div class="card"> <!--Card Create LSR-->
                            <div class="card-header mb-3">
                                Search
                            </div>

                            <form id="searchForm">
                                <div class="row card-body pb-0">
                                    <div class="col-2">
                                        <label for="tanggal" class="form-label col-form-label-sm">Date From</label>
                                        <input type="" id="tanggal" name="tanggal" value=""
                                            class="form-control form-control-sm" />
                                    </div>

                                    <div class="col-2">
                                        <label for="tanggalTo" class="form-label col-form-label-sm">Date To</label>
                                        <input type="" id="tanggalTo" name="tanggalTo" value=""
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
                            </form>
                        </div>
                    </div>

                    <!-- Modal Bootstrap Alert -->
                    <div class="modal fade" id="alertModal" tabindex="-1" role="dialog"
                        aria-labelledby="alertModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="alertModalLabel">Sukses!</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="modalAlertContent">
                                    Data berhasil dihapus.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Bootstrap untuk konfirmasi hapus-->
                    <div class="modal fade" id="confirmationModal" tabindex="-1"
                        aria-labelledby="confirmationModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmationModalLabel">Konfirmasi Hapus</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="modalContent">
                                    Apakah Anda yakin ingin menghapus baris yang dipilih?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Bootstrap untuk konfirmasi approve-->
                    <div class="modal fade" id="confirmationModalApprove" tabindex="-1"
                        aria-labelledby="confirmationModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmationModalLabel">Konfirmasi Approve</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="modalContent">
                                    Apakah Anda yakin ingin approve baris yang dipilih?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-primary"
                                        id="confirmApproveBtn">Approve</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Bootstrap untuk edit -->
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Form Edit</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form id="editForm" method="POST" action="">
                                    <div class="modal-body" id="modalContent">
                                        <input type="hidden" name="id" id="id">
                                        <div class="mb-3">
                                            <label for="part_number" class="form-label col-form-label-sm">Part
                                                Number</label>
                                            <input class="form-control form-control-sm" id="partNumberModal"
                                                name="part_number" aria-label="Disabled input example" disabled
                                                readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="part_name" class="form-label col-form-label-sm">Part
                                                Name</label>
                                            <input class="form-control form-control-sm" id="partNameModal"
                                                name="part_name" aria-label="Disabled input example" disabled readonly>
                                        </div>

                                        <div class="row">
                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <label for="uniqe_no" class="form-label col-form-label-sm">Unique
                                                        No</label>
                                                    <input class="form-control form-control-sm" id="uniqeNoModal"
                                                        name="uniqe_no" aria-label="Disabled input example" disabled
                                                        readonly>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <label for="qty" class="form-label col-form-label-sm">Qty</label>
                                                    <input required type="number"
                                                        class="form-control form-control-sm text-center" id="qty"
                                                        name="qty" aria-label="Default input example">
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <label for="source_type" class="form-label col-form-label-sm">Source
                                                        Type</label>
                                                    <input class="form-control form-control-sm" id="sourceType"
                                                        name="source_type" aria-label="Disabled input example" disabled
                                                        readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-4">
                                                <label for="reason" class="form-label col-form-label-sm">Reason</label>
                                                <select required class="form-select form-select-sm" id="reason"
                                                    name="reason" aria-label="Default select example">
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
                                                <label for="condition"
                                                    class="form-label col-form-label-sm">Condition</label>
                                                <select required class="form-select form-select-sm" id="condition"
                                                    name="condition" aria-label="Default select example">
                                                    <option value="- Unknow">- Unknow</option>
                                                    <option value="1. Good">1. Good</option>
                                                    <option value="2. Damage">2. Damage</option>
                                                    <option value="3. From TMMIN Unpacking">3. From TMMIN Unpacking
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="col-4">
                                                <label for="repair" class="form-label col-form-label-sm">Repair</label>
                                                <select required class="form-select form-select-sm" id="repair"
                                                    name="repair" aria-label="Default select example">
                                                    <option value="0. Unrepairable">0. Unrepairable</option>
                                                    <option value="1. Plant Repair">1. Plant Repair</option>
                                                    <option value="6. Unrepairable caused by other parts">6.
                                                        Unrepairable caused
                                                        by other parts</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <label for="remarks"
                                                    class="form-label col-form-label-sm">Remarks</label>
                                                <textarea required class="form-control form-control-sm" name="remarks"
                                                    id="remarks" rows="3"></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <label for="status"
                                                        class="form-label col-form-label-sm">Status</label>
                                                    <select required class="form-select form-select-sm" id="status"
                                                        name="status" aria-label="Default select example">
                                                        <option value="pending">pending</option>
                                                        <option value="approved">approved</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer row-6 justify-content-center">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-primary" id="saveBtn">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col">

                            <div class="col card pt-3">
                                <div class="card-header mb-3">
                                    Data Table
                                </div>
                                <div class="row card-body pb-0">
                                    <table id="tabelData"
                                        class="display nowrap table-sm table-bordered text-center table-striped"
                                        style="width: 100%;">
                                        <thead>

                                        </thead>
                                        <tbody id="DataTables">

                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer mt-4"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col utama -->
        </div>
    </section>
</main><!-- End #main -->