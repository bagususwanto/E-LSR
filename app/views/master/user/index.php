<main id="main" class="main">
    <div class="pagetitle">
        <h1>Master User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Master</li>
                <li id="typeMaster" class="breadcrumb-item active">User</li>
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
                                <table id="tabelMasterUser"
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
                    <div class="modal fade" id="addMasterUserModal" tabindex="-1" aria-labelledby="addModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addModalLabel">Form Add</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form id="formAddUser" method="POST" action="<?php echo BASEURL ?>/master/addDataUser"
                                    enctype="multipart/form-data">
                                    <div class="modal-body" id="modalContent">

                                        <div class="mb-3">
                                            <label for="nama" class="form-label col-form-label-sm">Nama</label>
                                            <input required type="text" class="form-control form-control-sm"
                                                id="namaModal" name="nama">
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="username"
                                                        class="form-label col-form-label-sm">Username</label>
                                                    <input required type="text" class="form-control form-control-sm"
                                                        id="usernameModal" name="username">
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="password"
                                                        class="form-label col-form-label-sm">Password</label>
                                                    <input required type="text" class="form-control form-control-sm"
                                                        id="passwordModal" name="password">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="department"
                                                        class="form-label col-form-label-sm">Department</label>
                                                    <select required class="form-select form-select-sm"
                                                        id="departmentModal" name="department"
                                                        aria-label="Default select example">
                                                        <option value=""></option>
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
                                                    <label for="line_user"
                                                        class="form-label col-form-label-sm">Line</label>
                                                    <select required class="form-select form-select-sm"
                                                        id="lineUserModal" name="line_user"
                                                        aria-label="Default select example">
                                                        <option value=""></option>
                                                        <option value="All">All</option>
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
                                                    <label for="shift_user"
                                                        class="form-label col-form-label-sm">Shift</label>
                                                    <select required class="form-select form-select-sm" id="shiftUser"
                                                        name="shift_user" aria-label="Default select example">
                                                        <option value=""></option>
                                                        <option value="Red">Red</option>
                                                        <option value="White">White</option>
                                                        <option value="NonShift">NonShift</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-5">
                                                <div class="mb-3">
                                                    <label for="position"
                                                        class="form-label col-form-label-sm">Position</label>
                                                    <input required type="text" class="form-control form-control-sm"
                                                        id="positionModal" name="position">
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <label for="role" class="form-label col-form-label-sm">Role</label>
                                                    <select required class="form-select form-select-sm"
                                                        id="categoryCCModal" name="role"
                                                        aria-label="Default select example">
                                                        <option value=""></option>
                                                        <option value="admin">admin</option>
                                                        <option value="common">common</option>
                                                        <option value="public">public</option>
                                                        <option value="approver">approver</option>
                                                        <option value="approveqc">approveqc</option>
                                                        <option value="sight">sight</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-3">
                                                <div class="mb-3">
                                                    <label for="category"
                                                        class="form-label col-form-label-sm">Category</label>
                                                    <select required class="form-select form-select-sm"
                                                        id="categoryCCModal" name="category"
                                                        aria-label="Default select example">
                                                        <option value=""></option>
                                                        <option value="All">All</option>
                                                        <option value="K">K</option>
                                                        <option value="M">M</option>
                                                        <option value="C">C</option>
                                                        <option value="X">X</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="text-center mb-3">
                                                    <label for="profile" class="form-label">Add Profile</label>
                                                    <input class="form-control form-control-sm" id="profilePicture"
                                                        name="profile" type="file" accept="image/jpg">
                                                </div>
                                                <div class="text-center mb-3">
                                                    <img id="profilePreview" src="" alt="profile" width="100px"
                                                        height="auto">
                                                    <p>Preview</p>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="text-center mb-3">
                                                    <label for="signature" class="form-label">Add Signature</label>
                                                    <input class="form-control form-control-sm" id="signPicture"
                                                        name="signature" type="file" accept="image/png">
                                                </div>
                                                <div class="text-center mb-3">
                                                    <img id="signPreview" src="" alt="signature" width="100px"
                                                        height="auto">
                                                    <p>Preview</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer row-6 justify-content-center">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary" id="addBtn">Add</button>
                                    </div>

                                    <input type="hidden" id="idAddUser" value="" name="id">
                                    <input type="hidden" id="userLog"
                                        value="<?php echo isset($data['user']['username']) ? $data['user']['username'] : 'Guest'; ?>"
                                        name="userlog">
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Bootstrap untuk Edit -->
                    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Form edit</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form id="formEditUser" method="POST"
                                    action="<?php echo BASEURL ?>/master/updateDataUser" enctype="multipart/form-data">
                                    <div class="modal-body" id="modalContent">

                                        <div class="mb-3">
                                            <label for="nama" class="form-label col-form-label-sm">Nama</label>
                                            <input required type="text" class="form-control form-control-sm"
                                                id="namaEdit" name="nama">
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="username"
                                                        class="form-label col-form-label-sm">Username</label>
                                                    <input required type="text" class="form-control form-control-sm"
                                                        id="usernameEdit" name="username">
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="password"
                                                        class="form-label col-form-label-sm">Password</label>
                                                    <input required type="text" class="form-control form-control-sm"
                                                        id="passwordEdit" name="password">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="department"
                                                        class="form-label col-form-label-sm">Department</label>
                                                    <select required class="form-select form-select-sm"
                                                        id="departmentEdit" name="department"
                                                        aria-label="Default select example">
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
                                                    <label for="line_user"
                                                        class="form-label col-form-label-sm">Line</label>
                                                    <select required class="form-select form-select-sm"
                                                        id="lineUserEdit" name="line_user"
                                                        aria-label="Default select example">
                                                        <option value="All">All</option>
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
                                                    <label for="shift_user"
                                                        class="form-label col-form-label-sm">Shift</label>
                                                    <select required class="form-select form-select-sm" id="shiftEdit"
                                                        name="shift_user" aria-label="Default select example">
                                                        <option value="Red">Red</option>
                                                        <option value="White">White</option>
                                                        <option value="NonShift">NonShift</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-5">
                                                <div class="mb-3">
                                                    <label for="position"
                                                        class="form-label col-form-label-sm">Position</label>
                                                    <input required type="text" class="form-control form-control-sm"
                                                        id="positionEdit" name="position">
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <label for="role" class="form-label col-form-label-sm">Role</label>
                                                    <select required class="form-select form-select-sm" id="roleEdit"
                                                        name="role" aria-label="Default select example">
                                                        <option value="admin">admin</option>
                                                        <option value="common">common</option>
                                                        <option value="public">public</option>
                                                        <option value="approver">approver</option>
                                                        <option value="approveqc">approveqc</option>
                                                        <option value="sight">sight</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-3">
                                                <div class="mb-3">
                                                    <label for="category"
                                                        class="form-label col-form-label-sm">Category</label>
                                                    <select required class="form-select form-select-sm"
                                                        id="categoryUserEdit" name="category"
                                                        aria-label="Default select example">
                                                        <option value="All">All</option>
                                                        <option value="K">K</option>
                                                        <option value="M">M</option>
                                                        <option value="C">C</option>
                                                        <option value="X">X</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="text-center mb-3">
                                                    <label for="profile" class="form-label">Profile</label>
                                                    <input class="form-control form-control-sm" id="profilePictureEdit"
                                                        name="profile" type="file" accept="image/jpg">
                                                </div>
                                                <div class="text-center mb-3">
                                                    <img id="profilePreviewEdit" src="" alt="profile" width="100px"
                                                        height="auto">
                                                    <p>Preview</p>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="text-center mb-3">
                                                    <label for="signature" class="form-label">Signature</label>
                                                    <input class="form-control form-control-sm" id="signPictureEdit"
                                                        name="signature" type="file" accept="image/png">
                                                </div>
                                                <div class="text-center mb-3">
                                                    <img id="signPreviewEdit" src="" alt="signature" width="100px"
                                                        height="auto">
                                                    <p>Preview</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer row-6 justify-content-center">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary" id="editBtn">Save</button>
                                    </div>

                                    <input type="hidden" id="idEditUser" value="" name="id">
                                    <input type="hidden" id="userLog"
                                        value="<?php echo isset($data['user']['username']) ? $data['user']['username'] : 'Guest'; ?>"
                                        name="userlog">
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div> <!-- end col utama -->
    </section>
</main><!-- End #main -->