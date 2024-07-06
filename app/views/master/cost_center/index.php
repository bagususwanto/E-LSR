<main id="main" class="main">
    <div class="pagetitle">
        <h1>Master Cost Center</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Master</li>
                <li id="typeMaster" class="breadcrumb-item active">Cost Center</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col">
                        <div class="card pt-3">
                            <div class="card-header mb-3">
                                Master Table
                            </div>
                            <div class="row card-body pb-0">
                                <table id="tabelMasterCostCenter"
                                    class="display nowrap table-sm table-bordered text-center table-striped"
                                    style="width: 100%;">
                                    <thead>
                                        <!-- Table Header Content -->
                                    </thead>
                                    <tbody id="DataTables">
                                        <!-- Table Body Content -->
                                    </tbody>
                                </table>
                                <div class="card-footer mt-4"></div>
                            </div>
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

                    <!-- Modal Bootstrap untuk Add -->
                    <div class="modal fade" id="addMasterMaterialModal" tabindex="-1" aria-labelledby="editModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Form Add</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form id="formMasterMaterial" method="POST"
                                    action="<?php echo BASEURL ?>/master/addDataMaterial">
                                    <div class="modal-body" id="modalContent">
                                        <div class="mb-3">
                                            <label for="part_number" class="form-label col-form-label-sm">Part
                                                Number</label>
                                            <input required type="text" class="form-control form-control-sm"
                                                id="partNumberModal" name="part_number">
                                        </div>

                                        <div class="mb-3">
                                            <label for="part_name" class="form-label col-form-label-sm">Part
                                                Name</label>
                                            <input required type="text" class="form-control form-control-sm"
                                                id="partNameModal" name="part_name">
                                        </div>

                                        <div class="row">
                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <label for="uniqe_no" class="form-label col-form-label-sm">Unique
                                                        No</label>
                                                    <input required type="text" class="form-control form-control-sm"
                                                        id="uniqeNoModal" name="uniqe_no">
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <label for="unit_usage" class="form-label col-form-label-sm">Unit
                                                        Usage</label>
                                                    <input required type="number"
                                                        class="form-control form-control-sm text-center" id="unit_usage"
                                                        name="unit_usage" aria-label="Default input example">
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <label for="source_type" class="form-label col-form-label-sm">Source
                                                        Type</label>
                                                    <input required type="number"
                                                        class="form-control form-control-sm text-center"
                                                        id="sourceTypeModal" name="source_type">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <label for="material"
                                                    class="form-label col-form-label-sm">Material</label>
                                                <select required class="form-select form-select-sm" id="materialModal"
                                                    name="material" aria-label="Default select example">
                                                    <option value=""> Pilih Material</option>
                                                    <?php
                                                    $uniqueMaterials = array_unique(array_column($data['lineMaster'], 'material'));
                                                    foreach ($uniqueMaterials as $material):
                                                        if (!empty($material)): ?>
                                                            <option value="<?php echo strtoupper($material); ?>">
                                                                <?php echo strtoupper($material); ?>
                                                            </option>
                                                            <?php
                                                        endif;
                                                    endforeach;
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-6">
                                                <label for="price" class="form-label col-form-label-sm">Price</label>
                                                <input required type="number" class="form-control form-control-sm"
                                                    id="addPrice" name="price">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer row-6 justify-content-center">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary" id="addBtn">Add</button>
                                    </div>

                                    <input type="hidden" id="userName"
                                        value="<?php echo isset($data['user']['username']) ? $data['user']['username'] : 'Guest'; ?>"
                                        name="userName">
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Bootstrap untuk Edit -->
                    <div class="modal fade" id="editCostCenterModal" tabindex="-1" aria-labelledby="editModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Form edit</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form id="formMasterCostCenter" method="POST"
                                    action="<?php echo BASEURL ?>/master/updateDataCostCenter"
                                    enctype="multipart/form-data">
                                    <div class="modal-body" id="modalContent">

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="department"
                                                        class="form-label col-form-label-sm">Department</label>
                                                    <select class="form-select form-select-sm" id="departmentEdit"
                                                        name="department" aria-label="Default select example">
                                                        <?php
                                                        $uniqueDepartment = array_unique(array_column($data['lineMaster'], 'department'));
                                                        foreach ($uniqueDepartment as $department):
                                                            if (!empty($department)):
                                                                ?>
                                                                <option value="<?php echo $department; ?>">
                                                                    <?php echo $department; ?>
                                                                </option>
                                                                <?php
                                                            endif;
                                                        endforeach;
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="nama_line"
                                                        class="form-label col-form-label-sm">Line</label>
                                                    <select required class="form-select form-select-sm" id="lineEdit"
                                                        name="nama_line" aria-label="Default select example">
                                                        <?php foreach ($data['lineMaster'] as $lineMaster): ?>
                                                            <option value="<?php echo $lineMaster['nama_line']; ?>">
                                                                <?php echo $lineMaster['nama_line']; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-3">
                                                <div class="mb-3">
                                                    <label for="line_code" class="form-label col-form-label-sm">Line
                                                        Code</label>
                                                    <input required type="text" class="form-control form-control-sm"
                                                        id="lineCodeEdit" name="line_code" maxlength="3">
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="mb-3">
                                                    <label for="cost_center" class="form-label col-form-label-sm">Cost
                                                        Center</label>
                                                    <input required type="text" class="form-control form-control-sm"
                                                        id="costCenterEdit" name="cost_center"
                                                        aria-label="Default input example" maxlength="6">
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <label for="material"
                                                        class="form-label col-form-label-sm">Material</label>
                                                    <select required class="form-select form-select-sm"
                                                        id="materialModal" name="material"
                                                        aria-label="Default select example">
                                                        <?php
                                                        $uniqueMaterials = array_unique(array_column($data['lineMaster'], 'material'));
                                                        foreach ($uniqueMaterials as $material):
                                                            if (!empty($material)): ?>
                                                                <option value="<?php echo $material; ?>">
                                                                    <?php echo $material; ?>
                                                                </option>
                                                                <?php
                                                            endif;
                                                        endforeach;
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-2">
                                                <div class="mb-3">
                                                    <label for="category"
                                                        class="form-label col-form-label-sm">Category</label>
                                                    <select required class="form-select form-select-sm"
                                                        id="categoryEdit" name="category"
                                                        aria-label="Default select example">
                                                        <option value="K">K</option>
                                                        <option value="M">M</option>
                                                        <option value="C">C</option>
                                                        <option value="X">X</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center mb-3">
                                            <label for="pictureLine" class="form-label">Change Picture</label>
                                            <input class="form-control form-control-sm" id="pictureLine"
                                                name="pictureLine" type="file" accept="image/gif">
                                        </div>
                                        <div class="text-center mb-3">
                                            <img id="lineImagePreview" src="" alt="Line Image" width="100px"
                                                height="auto">
                                            <p>Preview</p>
                                        </div>
                                    </div>

                                    <div class="modal-footer row-6 justify-content-center">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary" id="editBtn">Save</button>
                                    </div>

                                    <input type="hidden" id="idCCMaster" value="" name="id">
                                    <input type="hidden" id="userName"
                                        value="<?php echo isset($data['user']['username']) ? $data['user']['username'] : 'Guest'; ?>"
                                        name="userName">
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div> <!-- end col utama -->
    </section>
</main><!-- End #main -->