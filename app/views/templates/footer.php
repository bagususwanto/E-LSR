<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
        Created By <strong><span>PPIC</span></strong> @2023.
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?php echo BASEURL ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo BASEURL ?>/vendor/quill/quill.min.js"></script>
<script src="<?php echo BASEURL ?>/vendor/jquery/jquery-3.7.1.min.js"></script>
<script src="<?php echo BASEURL ?>/vendor/jquery-validation-1.19.5/jquery.validate.min.js"></script>
<script src="<?php echo BASEURL ?>/vendor/jquery/jquery.loadingModal.js"></script>
<script src="<?php echo BASEURL ?>/vendor/tinymce/tinymce.min.js"></script>
<script src="<?php echo BASEURL ?>/vendor/select2/js/select2.min.js"></script>
<script src="<?php echo BASEURL ?>/vendor/toast/toast-plugin.js"></script>
<script src="<?php echo BASEURL ?>/vendor/flatpickr/js/flatpickr.js"></script>


<!-- DataTables -->
<script src="<?php echo BASEURL ?>/vendor/datatables/DataTables-1.13.8/js/jquery.dataTables.min.js"></script>
<script src="<?php echo BASEURL ?>/vendor/datatables/DataTables-1.13.8/js/dataTables.bootstrap5.min.js"></script>
<script src="<?php echo BASEURL ?>/vendor/datatables/Buttons-2.4.2/js/dataTables.buttons.min.js"></script>
<script src="<?php echo BASEURL ?>/vendor/datatables/Buttons-2.4.2/js/buttons.bootstrap5.min.js"></script>
<script src="<?php echo BASEURL ?>/vendor/datatables/JSZip-3.10.1/jszip.min.js"></script>
<script src="<?php echo BASEURL ?>/vendor/datatables/pdfmake-0.2.7/pdfmake.min.js"></script>
<script src="<?php echo BASEURL ?>/vendor/datatables/pdfmake-0.2.7/vfs_fonts.js"></script>
<script src="<?php echo BASEURL ?>/vendor/datatables/Buttons-2.4.2/js/buttons.html5.min.js"></script>
<script src="<?php echo BASEURL ?>/vendor/datatables/Buttons-2.4.2/js/buttons.print.min.js"></script>
<script src="<?php echo BASEURL ?>/vendor/datatables/Buttons-2.4.2/js/buttons.colVis.min.js"></script>
<script src="<?php echo BASEURL ?>/vendor/datatables/fixedcolumns-4.3.0/js/dataTables.fixedColumns.min.js"></script>



<script>
    function formatCurrency(amount) {
        if (isNaN(amount)) {
            return "RP. 0.00";
        }
        return "RP. " + parseFloat(amount).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
    }

    function RefreshDataMasterMaterial() {
        $.ajax({
            url: BASEURL + "/master/getMasterMaterial",
            method: "POST",
            data: {},
            dataType: "json",
            success: function (data) {
                $("#tabelMasterMaterial").DataTable().clear().draw();

                for (var i = 0; i < data.length; i++) {
                    var price = parseFloat(data[i].price);
                    var formattedPrice = formatCurrency(price);

                    $("#tabelMasterMaterial")
                        .DataTable()
                        .row.add([
                            `<button id="editMasterMaterial" class="btn btn-warning btn-sm edit-btn" type="button" data-id="${data[i].id}">
              <i class="bi bi-pencil-square"></i>
              </button>
              <button id="deleteMasterMaterial" class="btn btn-danger btn-sm delete-btn" type="button" data-id="${data[i].id}">
              <i class="bi bi-trash-fill"></i>
              </button>`,
                            data[i].part_number,
                            data[i].part_name,
                            data[i].uniqe_no,
                            data[i].unit_usage,
                            data[i].source_type,
                            data[i].material,
                            formattedPrice,
                            data[i].created_date,
                            data[i].created_by,
                            data[i].change_date,
                            data[i].change_by,
                        ])
                        .nodes()
                        .to$(); // Dapatkan elemen HTML tr (baris)
                }
                $("#tabelMasterMaterial").DataTable().draw();
            },
            error: function (error) {
                console.log("Error:", error);
            },
        });
    }

    //===========UNTUK NOTIFIKASI TOAST DI BACKEND============//
    $(document).ready(function () {
        <?php if (isset($_SESSION['message'])): ?>
            $.toast({
                title: "Pesan",
                message: "<?php echo $_SESSION['message']['content']; ?>",
                type: "<?php echo $_SESSION['message']['type']; ?>",
                duration: 8000,
            });
            <?php unset($_SESSION['message']); ?> // Hapus pesan setelah ditampilkan
        <?php endif; ?>
    });

    // FUNGSI UNTUK HALAMAN DATA REPORT
    function RefreshTableReport(tanggalFrom, tanggalTo, line, shift, lsrCode, status) {
        // Mengirim permintaan AJAX
        $.ajax({
            url: BASEURL + "/data/getDataReport",
            method: "POST",
            data: {
                tanggalFrom: tanggalFrom,
                tanggalTo: tanggalTo,
                line: line,
                shift: shift,
                lsrCode: lsrCode,
                status: status,
            },
            dataType: "json",
            success: function (data) {
                // Hapus semua baris sebelum menambahkan data baru
                $("#tabelReport").DataTable().clear().draw();

                // Iterasi melalui data dan tambahkan baris ke dalam tabel
                for (var i = 0; i < data.length; i++) {
                    tabelReport;
                    let statusClass = "";

                    // Tentukan kelas berdasarkan nilai status_lsr
                    if (data[i].status_lsr === "Waiting Approved") {
                        statusClass = "";
                    } else if (data[i].status_lsr === "Approved By Section") {
                        statusClass = "bg-warning text-white";
                    } else if (data[i].status_lsr === "Uploaded To Ifast") {
                        statusClass = "bg-success text-white";
                    } else if (data[i].status_lsr === "Rejected By Section") {
                        statusClass = "bg-danger";
                    }

                    $("#tabelReport")
                        .DataTable()
                        .row.add([
                            `<input class="form-check-input checkbox-single" type="checkbox" id="checkboxNoLabel${i}" 
        aria-label="" value="${data[i].no_lsr}">`,
                            data[i].no_lsr,
                            `<a href="${BASEURL}/eform" target="_blank" class="link-dark" data-id="${data[i].id}">
                <button type="button" class="btn btn-outline-dark fw-bold">View</button></a>`,
                            data[i].line_lsr,
                            data[i].cost_center,
                            data[i].shift,
                            data[i].user_lsr,
                            data[i].tanggal,
                            data[i].waktu,
                            data[i].status_lsr,
                        ])
                        .nodes()
                        .to$() // Dapatkan elemen HTML tr (baris)
                        .addClass(statusClass); // Tambahkan kelas status
                }
                $("#tabelReport").DataTable().draw();
            },
            error: function (error) {
                console.log("Error:", error);
            },
        });
    }
</script>

<!-- Main JS File -->
<script src="<?php echo BASEURL ?>/js/main.js"></script>
<script src="<?php echo BASEURL ?>/js/script.js"></script>

</body>

</html>