<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Report</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo BASEURL; ?>">Home</a></li>
                <li class="breadcrumb-item active">Data</li>
                <li class="breadcrumb-item active">Report</li>
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

                            <form id="searchReport">
                                <div class="row card-body pb-0">
                                    <div class="col-xxl-2 col-md-4 pb-2">
                                        <label for="tanggal" class="form-label col-form-label-sm">Date From</label>
                                        <input type="" id="tanggal" name="tanggal" value=""
                                            class="form-control form-control-sm" />
                                    </div>

                                    <div class="col-xxl-2 col-md-4 pb-2">
                                        <label for="tanggalTo" class="form-label col-form-label-sm">Date To</label>
                                        <input type="" id="tanggalTo" name="tanggalTo" value=""
                                            class="form-control form-control-sm" />
                                    </div>

                                    <div class="col-xxl-2 col-md-4 pb-2">
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

                                    <div class="col-xxl-2 col-md-4 pb-2">
                                        <label for="shift" class="form-label col-form-label-sm">Shift</label>
                                        <select class="form-select form-select-sm" id="shift" name="shift"
                                            aria-label="Default select example">
                                            <option value="All">All</option>
                                            <option value="Red">Red</option>
                                            <option value="White">White</option>
                                            <option value="NonShift">NonShift</option>
                                        </select>
                                    </div>

                                    <div class="col-xxl-1 col-md-4 pb-2">
                                        <label for="lsrCode" class="form-label col-form-label-sm">LSR Code</label>
                                        <select class="form-select form-select-sm" id="lsrCode" name="lsrCode"
                                            aria-label="Default select example">
                                            <option data-id="0" value="All">All</option>
                                            <option value="K">K</option>
                                            <option value="M">M</option>
                                            <option value="C">C</option>
                                            <option value="X">X</option>
                                        </select>
                                    </div>

                                    <div class="col-xxl-3 col-md-4 pb-2">
                                        <label for="status" class="form-label col-form-label-sm">Status</label>
                                        <select class="form-select form-select-sm" id="status" name="status"
                                            aria-label="Default select example">
                                            <option value="All">All</option>
                                            <option value="Rejected By Section">Rejected By Section</option>
                                            <option value="Waiting Approved">Waiting Approved</option>
                                            <option value="Approved By Section">Approved By Section</option>
                                            <option value="Uploaded To Ifast">Uploaded To Ifast</option>
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


                    <!-- Modal Bootstrap untuk konfirmasi approve-->
                    <div class="modal fade" id="confirmApproveReport" tabindex="-1"
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
                                    <button type="button" class="btn btn-primary" id="approveReportbtn">Approve</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Bootstrap untuk konfirmasi Reject-->
                    <div class="modal fade" id="confirmRejectReport" tabindex="-1"
                        aria-labelledby="confirmationModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmationModalLabel">Konfirmasi Reject</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="modalContent">
                                    Apakah Anda yakin ingin reject baris yang dipilih?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-primary" id="RejectReportbtn">Reject</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">

                            <div class="col card pt-3">
                                <div class="card-header mb-3">
                                    Report Table
                                </div>
                                <div class="row card-body pb-0">
                                    <table id="tabelReport"
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