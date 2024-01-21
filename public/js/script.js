$(function () {
  $(document).ready(function () {
    //====VALIDASI UNTUK USER ROLE======//
    const userRoleElement = $("#roleUser");
    if (userRoleElement.length > 0) {
      const userRole = userRoleElement.val();

      const restrictedPage = BASEURL + "/master";

      if (
        userRole.toLowerCase() === "public" &&
        window.location.href.includes(restrictedPage)
      ) {
        alert("Anda tidak diizinkan mengakses halaman master data.");
        window.location.href = BASEURL; // Redirect jika diakses dari halaman terlarang
      }
    }

    //==== ISI NILAI DARI DATE DAN TIME======//
    // Mendapatkan tanggal dan waktu sekarang
    var currentDate = new Date();
    var hours = currentDate.getHours();
    var minutes = currentDate.getMinutes();

    // Mendapatkan tanggal, bulan, dan tahun
    var day = currentDate.getDate();
    var month = currentDate.getMonth() + 1; // Ingat: bulan dimulai dari 0
    var year = currentDate.getFullYear();
    var year2 = 9999;

    // Mengonversi ke format "yyyy-MM-dd"
    var formattedDate =
      year +
      "-" +
      (month < 10 ? "0" : "") +
      month +
      "-" +
      (day < 10 ? "0" : "") +
      day;

    var formattedDate2 =
      year2 +
      "-" +
      (month < 10 ? "0" : "") +
      month +
      "-" +
      (day < 10 ? "0" : "") +
      day;

    // Mengonversi ke format "HH:mm"
    var formattedTime =
      (hours < 10 ? "0" : "") +
      hours +
      ":" +
      (minutes < 10 ? "0" : "") +
      minutes;

    // Mengatur nilai input tanggal dan waktu
    $("#tanggal").val(formattedDate);
    // $("#tanggalTo").val(formattedDate2);
    $("#waktu").val(formattedTime);

    //==== ISI NILAI DARI LINE DAN SHIFT======//
    // Ambil nilai dari data-id
    const id = $("#userLog").data("id");
    $.ajax({
      url: BASEURL + "/create/getUbahSelectedLine",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#line").val(data.line_user);
        $("#shift").val(data.shift_user);
      },
      error: function (error) {
        console.log("Error:", error);
      },
    });

    //==== ISI NILAI DARI MATERIAL, LINE CODE DAN COST CENTER======//
    // Ambil nilai
    const validLineValue = $("#validLine").text().trim();
    $.ajax({
      url: BASEURL + "/create/getUbahSelectedLineMaster",
      data: { validLineValue: validLineValue },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#material").val(data.material);
        $("#lineCode").val(data.line_code);
        $("#costCenter").val(data.cost_center);
      },
      error: function (error) {
        console.log("Error:", error);
      },
    });

    //==== ISI NILAI DARI PART NUMBER , PART NAME, UNIQE NO, DAN SOURCE TYPE======//
    const validLineValue2 = $("#validLine").text().trim();
    // Konfigurasi objek AJAX
    const ajaxOptions = {
      url: BASEURL + "/create/getMasterPart",
      data: { validLineValue2: validLineValue2 },
      method: "post",
      dataType: "json",
      success: function (data) {
        // Membersihkan dan menambahkan opsi baru ke dalam elemen select
        clearAndAppendOptions("#partNumber", data, "part_number");
        clearAndAppendOptions("#partName", data, "part_name");
        clearAndAppendOptions("#uniqeNo", data, "uniqe_no");
        clearAndAppendOptions("#sourceType", data, "source_type");
      },
      error: function (error) {
        console.log("Error:", error);
      },
    };

    // Memanggil fungsi AJAX dengan menggunakan konfigurasi objek yang telah dibuat
    $.ajax(ajaxOptions);

    // Fungsi untuk membersihkan dan menambahkan opsi ke dalam elemen select
    function clearAndAppendOptions(selectId, data, property) {
      const $select = $(selectId);
      $select.empty();

      for (let i = 0; i < data.length; i++) {
        const optionValue = data[i][property];
        const dataId = data[i].id;

        $select.append(
          `<option value="${optionValue}" data-id="${dataId}">${optionValue}</option>`
        );
      }
    }

    //==== ISI TABEL DATA SUBMIT======//
    // Ambil nilai
    const material = $("#lineUser").val();
    const shiftUser = $("#shiftUser").val();
    const lineUser = $("#lineUser").val();
    const tanggalValue = formattedDate;
    $.ajax({
      url: BASEURL + "/create/getDataTable",
      data: {
        material: material,
        tanggalValue: tanggalValue,
        shiftUser: shiftUser,
        lineUser: lineUser,
      },
      method: "post",
      dataType: "json",
      success: function (data) {
        // Hapus semua baris sebelum menambahkan data baru
        $("#tabelData2").DataTable().clear().draw();

        // Iterasi melalui data dan tambahkan baris ke dalam tabel
        for (var i = 0; i < data.length; i++) {
          $("#tabelData2")
            .DataTable()
            .row.add([
              i + 1,
              data[i].part_number,
              data[i].part_name,
              data[i].uniqe_no,
              data[i].qty,
              data[i].reason,
              data[i].condition,
              data[i].repair,
              data[i].source_type,
              data[i].remarks,
              data[i].material,
              data[i].tanggal,
              data[i].cost_center,
            ])
            .draw();
        }
      },
      error: function (error) {
        console.log("Error:", error);
      },
    });
  });

  //=================EVENT CHANGE===================//
  $("#partNumber").on("change", function () {
    const id = $(this).find(":selected").data("id");
    $.ajax({
      url: BASEURL + "/create/getUbahSelectedMat",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#partName").val(data.part_name);
        $("#uniqeNo").val(data.uniqe_no);
        $("#sourceType").val(data.source_type);
      },
    });
  });

  $("#partName").on("change", function () {
    const id = $(this).find(":selected").data("id");
    $.ajax({
      url: BASEURL + "/create/getUbahSelectedMat",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#partNumber").val(data.part_number);
        $("#uniqeNo").val(data.uniqe_no);
        $("#sourceType").val(data.source_type);
      },
    });
  });

  $("#uniqeNo").on("change", function () {
    const id = $(this).find(":selected").data("id");
    $.ajax({
      url: BASEURL + "/create/getUbahSelectedMat",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#partName").val(data.part_name);
        $("#partNumber").val(data.part_number);
        $("#sourceType").val(data.source_type);
      },
    });
  });

  $("#sourceType").on("change", function () {
    const id = $(this).find(":selected").data("id");
    $.ajax({
      url: BASEURL + "/create/getUbahSelectedMat",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#partName").val(data.part_name);
        $("#partNumber").val(data.part_number);
        $("#uniqeNo").val(data.uniqe_no);
      },
    });
  });

  $("#lineCode").on("change", function () {
    const id = $(this).find(":selected").data("id");
    const lineCode = $(this).val();
    $.ajax({
      url: BASEURL + "/create/changeUbahSelectedLine",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        if (!data) {
          // Set nilai "All" pada elemen-elemen form
          $("#material").val("All");
          $("#line").val("All");
          $("#costCenter").val("All");
        } else {
          // Jika data ada, set nilai sesuai data yang diterima
          $("#material").val(data.material);
          $("#line").val(data.nama_line);
          $("#costCenter").val(data.cost_center);
        }
        //ISI DATATABLE//
        const shiftUser = $("#shift").val();
        const material = $("#material").val();
        const tanggalValue = $("#tanggal").val();
        const lineUser = $("#line").val();
        const costCenter = $("#costCenter").val();
        $.ajax({
          url: BASEURL + "/create/getDataTableChange",
          data: {
            material: material,
            tanggalValue: tanggalValue,
            shiftUser: shiftUser,
            lineUser: lineUser,
            lineCode: lineCode,
            costCenter: costCenter,
          },
          method: "post",
          dataType: "json",
          success: function (data) {
            // Hapus semua baris sebelum menambahkan data baru
            $("#tabelData2").DataTable().clear().draw();

            // Iterasi melalui data dan tambahkan baris ke dalam tabel
            for (var i = 0; i < data.length; i++) {
              $("#tabelData2")
                .DataTable()
                .row.add([
                  i + 1,
                  data[i].part_number,
                  data[i].part_name,
                  data[i].uniqe_no,
                  data[i].qty,
                  data[i].reason,
                  data[i].condition,
                  data[i].repair,
                  data[i].source_type,
                  data[i].remarks,
                  data[i].material,
                  data[i].tanggal,
                  data[i].cost_center,
                ])
                .draw();
            }
          },
          error: function (error) {
            console.log("Error:", error);
          },
        });

        //ADD DATA MASTER MATERIAL//
        const validLineValue2 = $("#material").val();
        // Mengkonfigurasi objek AJAX
        const ajaxOptions = {
          url: BASEURL + "/create/getMasterPart",
          data: { validLineValue2: validLineValue2 },
          method: "post",
          dataType: "json",
          success: function (data) {
            // Membersihkan dan menambahkan opsi baru ke dalam elemen select
            $("#partNumber, #partName, #uniqeNo, #sourceType").empty();

            // Iterasi melalui data dan menambahkan opsi ke dalam elemen select
            for (var i = 0; i < data.length; i++) {
              addOption("#partNumber", data[i].part_number, data[i].id);
              addOption("#partName", data[i].part_name, data[i].id);
              addOption("#uniqeNo", data[i].uniqe_no, data[i].id);
              addOption("#sourceType", data[i].source_type, data[i].id);
            }
          },
          error: function (error) {
            console.log("Error:", error);
          },
        };

        // Memanggil fungsi AJAX dengan menggunakan konfigurasi objek yang telah dibuat
        $.ajax(ajaxOptions);

        // Fungsi untuk menambahkan opsi ke dalam elemen select
        function addOption(selectId, optionValue, dataId) {
          $(selectId).append(
            `<option value="${optionValue}" data-id="${dataId}">${optionValue}</option>`
          );
        }
      },
    });
  });

  $("#costCenter").on("change", function () {
    const id = $(this).find(":selected").data("id");
    const costCenter = $(this).val();
    $.ajax({
      url: BASEURL + "/create/changeUbahSelectedLine",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        // Cek apakah data ada atau tidak
        if (!data) {
          // Set nilai "All" pada elemen-elemen form
          $("#material").val("All");
          $("#line").val("All");
          $("#lineCode").val("All");
        } else {
          // Jika data ada, set nilai sesuai data yang diterima
          $("#material").val(data.material);
          $("#line").val(data.nama_line);
          $("#lineCode").val(data.line_code);
        }

        //ISI DATATABLE//
        const shiftUser = $("#shift").val();
        const material = $("#material").val();
        const tanggalValue = $("#tanggal").val();
        const lineUser = $("#line").val();
        const lineCode = $("#lineCode").val();
        $.ajax({
          url: BASEURL + "/create/getDataTableChange",
          data: {
            material: material,
            tanggalValue: tanggalValue,
            shiftUser: shiftUser,
            lineUser: lineUser,
            lineCode: lineCode,
            costCenter: costCenter,
          },
          method: "post",
          dataType: "json",
          success: function (data) {
            // Hapus semua baris sebelum menambahkan data baru
            $("#tabelData2").DataTable().clear().draw();

            // Iterasi melalui data dan tambahkan baris ke dalam tabel
            for (var i = 0; i < data.length; i++) {
              $("#tabelData2")
                .DataTable()
                .row.add([
                  i + 1,
                  data[i].part_number,
                  data[i].part_name,
                  data[i].uniqe_no,
                  data[i].qty,
                  data[i].reason,
                  data[i].condition,
                  data[i].repair,
                  data[i].source_type,
                  data[i].remarks,
                  data[i].material,
                  data[i].tanggal,
                  data[i].cost_center,
                ])
                .draw();
            }
          },
          error: function (error) {
            console.log("Error:", error);
          },
        });

        //ADD MAASTER MATERIAL//
        const validLineValue2 = $("#material").val();
        // Mengkonfigurasi objek AJAX
        const ajaxOptions = {
          url: BASEURL + "/create/getMasterPart",
          data: { validLineValue2: validLineValue2 },
          method: "post",
          dataType: "json",
          success: function (data) {
            // Membersihkan dan menambahkan opsi baru ke dalam elemen select
            $("#partNumber, #partName, #uniqeNo, #sourceType").empty();

            // Iterasi melalui data dan menambahkan opsi ke dalam elemen select
            for (var i = 0; i < data.length; i++) {
              addOption("#partNumber", data[i].part_number, data[i].id);
              addOption("#partName", data[i].part_name, data[i].id);
              addOption("#uniqeNo", data[i].uniqe_no, data[i].id);
              addOption("#sourceType", data[i].source_type, data[i].id);
            }
          },
          error: function (error) {
            console.log("Error:", error);
          },
        };

        // Memanggil fungsi AJAX dengan menggunakan konfigurasi objek yang telah dibuat
        $.ajax(ajaxOptions);

        // Fungsi untuk menambahkan opsi ke dalam elemen select
        function addOption(selectId, optionValue, dataId) {
          $(selectId).append(
            `<option value="${optionValue}" data-id="${dataId}">${optionValue}</option>`
          );
        }
      },
    });
  });

  $("#line").on("change", function () {
    const id = $(this).find(":selected").data("id");
    const lineUser = $(this).val();
    $.ajax({
      url: BASEURL + "/create/changeUbahSelectedLine",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        // Cek apakah data ada atau tidak
        if (!data) {
          // Set nilai "All" pada elemen-elemen form
          $("#material").val("All");
          $("#costCenter").val("All");
          $("#lineCode").val("All");
        } else {
          // Jika data ada, set nilai sesuai data yang diterima
          $("#material").val(data.material);
          $("#costCenter").val(data.cost_center);
          $("#lineCode").val(data.line_code);
        }

        //ISI DATATABLE//
        const shiftUser = $("#shift").val();
        const material = $("#material").val();
        const tanggalValue = $("#tanggal").val();
        const lineCode = $("#lineCode").val();
        const costCenter = $("#costCenter").val();
        $.ajax({
          url: BASEURL + "/create/getDataTableChange",
          data: {
            material: material,
            tanggalValue: tanggalValue,
            shiftUser: shiftUser,
            lineUser: lineUser,
            lineCode: lineCode,
            costCenter: costCenter,
          },
          method: "post",
          dataType: "json",
          success: function (data) {
            // Hapus semua baris sebelum menambahkan data baru
            $("#tabelData2").DataTable().clear().draw();

            // Iterasi melalui data dan tambahkan baris ke dalam tabel
            for (var i = 0; i < data.length; i++) {
              $("#tabelData2")
                .DataTable()
                .row.add([
                  i + 1,
                  data[i].part_number,
                  data[i].part_name,
                  data[i].uniqe_no,
                  data[i].qty,
                  data[i].reason,
                  data[i].condition,
                  data[i].repair,
                  data[i].source_type,
                  data[i].remarks,
                  data[i].material,
                  data[i].tanggal,
                  data[i].cost_center,
                ])
                .draw();
            }
          },
          error: function (error) {
            console.log("Error:", error);
          },
        });

        // ADD MASTER MATERIAL//
        const validLineValue2 = $("#material").val();
        // Mengkonfigurasi objek AJAX
        const ajaxOptions = {
          url: BASEURL + "/create/getMasterPart",
          data: { validLineValue2: validLineValue2 },
          method: "post",
          dataType: "json",
          success: function (data) {
            // Membersihkan dan menambahkan opsi baru ke dalam elemen select
            $("#partNumber, #partName, #uniqeNo, #sourceType").empty();

            // Iterasi melalui data dan menambahkan opsi ke dalam elemen select
            for (var i = 0; i < data.length; i++) {
              addOption("#partNumber", data[i].part_number, data[i].id);
              addOption("#partName", data[i].part_name, data[i].id);
              addOption("#uniqeNo", data[i].uniqe_no, data[i].id);
              addOption("#sourceType", data[i].source_type, data[i].id);
            }
          },
          error: function (error) {
            console.log("Error:", error);
          },
        };

        // Memanggil fungsi AJAX dengan menggunakan konfigurasi objek yang telah dibuat
        $.ajax(ajaxOptions);

        // Fungsi untuk menambahkan opsi ke dalam elemen select
        function addOption(selectId, optionValue, dataId) {
          $(selectId).append(
            `<option value="${optionValue}" data-id="${dataId}">${optionValue}</option>`
          );
        }
      },
    });
  });

  $("#material").on("change", function () {
    //ADD MASTER MATERIAL//
    const validLineValue2 = $(this).val();
    // Mengkonfigurasi objek AJAX
    const ajaxOptions = {
      url: BASEURL + "/create/getMasterPart",
      data: { validLineValue2: validLineValue2 },
      method: "post",
      dataType: "json",
      success: function (data) {
        // Membersihkan dan menambahkan opsi baru ke dalam elemen select
        $("#partNumber, #partName, #uniqeNo, #sourceType").empty();

        // Iterasi melalui data dan menambahkan opsi ke dalam elemen select
        for (var i = 0; i < data.length; i++) {
          addOption("#partNumber", data[i].part_number, data[i].id);
          addOption("#partName", data[i].part_name, data[i].id);
          addOption("#uniqeNo", data[i].uniqe_no, data[i].id);
          addOption("#sourceType", data[i].source_type, data[i].id);
        }
      },
      error: function (error) {
        console.log("Error:", error);
      },
    };

    // Memanggil fungsi AJAX dengan menggunakan konfigurasi objek yang telah dibuat
    $.ajax(ajaxOptions);

    // Fungsi untuk menambahkan opsi ke dalam elemen select
    function addOption(selectId, optionValue, dataId) {
      $(selectId).append(
        `<option value="${optionValue}" data-id="${dataId}">${optionValue}</option>`
      );
    }
  });

  $("#tanggal").on("change", function () {
    // ISI DATATABLE//
    const tanggalValue = $(this).val();
    const shiftUser = $("#shift").val();
    const material = $("#material").val();
    const lineUser = $("#lineUser").val();
    const lineCode = $("#lineCode").val();
    const costCenter = $("#costCenter").val();
    $.ajax({
      url: BASEURL + "/create/getDataTableChange",
      data: {
        material: material,
        tanggalValue: tanggalValue,
        shiftUser: shiftUser,
        lineUser: lineUser,
        lineCode: lineCode,
        costCenter: costCenter,
      },
      method: "post",
      dataType: "json",
      success: function (data) {
        // Hapus semua baris sebelum menambahkan data baru
        $("#tabelData2").DataTable().clear().draw();

        // Iterasi melalui data dan tambahkan baris ke dalam tabel
        for (var i = 0; i < data.length; i++) {
          $("#tabelData2")
            .DataTable()
            .row.add([
              i + 1,
              data[i].part_number,
              data[i].part_name,
              data[i].uniqe_no,
              data[i].qty,
              data[i].reason,
              data[i].condition,
              data[i].repair,
              data[i].source_type,
              data[i].remarks,
              data[i].material,
              data[i].tanggal,
              data[i].cost_center,
            ])
            .draw();
        }
      },
      error: function (error) {
        console.log("Error:", error);
      },
    });
  });

  $("#shift").on("change", function () {
    //ISI DATATABLE//
    const shiftUser = $(this).val();
    const tanggalValue = $("#tanggal").val();
    const material = $("#material").val();
    const lineUser = $("#lineUser").val();
    const lineCode = $("#lineCode").val();
    const costCenter = $("#costCenter").val();
    $.ajax({
      url: BASEURL + "/create/getDataTableChange",
      data: {
        material: material,
        tanggalValue: tanggalValue,
        shiftUser: shiftUser,
        lineUser: lineUser,
        lineCode: lineCode,
        costCenter: costCenter,
      },
      method: "post",
      dataType: "json",
      success: function (data) {
        // Hapus semua baris sebelum menambahkan data baru
        $("#tabelData2").DataTable().clear().draw();

        // Iterasi melalui data dan tambahkan baris ke dalam tabel
        for (var i = 0; i < data.length; i++) {
          $("#tabelData2")
            .DataTable()
            .row.add([
              i + 1,
              data[i].part_number,
              data[i].part_name,
              data[i].uniqe_no,
              data[i].qty,
              data[i].reason,
              data[i].condition,
              data[i].repair,
              data[i].source_type,
              data[i].remarks,
              data[i].material,
              data[i].tanggal,
              data[i].cost_center,
            ])
            .draw();
        }
      },
      error: function (error) {
        console.log("Error:", error);
      },
    });
  });

  $("#material").on("change", function () {
    const material = $(this).val();
    const tanggalValue = $("#tanggal").val();
    const shiftUser = $("#shift").val();
    const lineUser = $("#line").val();
    const lineCode = $("#lineCode").val();
    const costCenter = $("#costCenter").val();
    $.ajax({
      url: BASEURL + "/create/getDataTableChange",
      data: {
        material: material,
        tanggalValue: tanggalValue,
        shiftUser: shiftUser,
        lineUser: lineUser,
        lineCode: lineCode,
        costCenter: costCenter,
      },
      method: "post",
      dataType: "json",
      success: function (data) {
        // Hapus semua baris sebelum menambahkan data baru
        $("#tabelData2").DataTable().clear().draw();

        // Iterasi melalui data dan tambahkan baris ke dalam tabel
        for (var i = 0; i < data.length; i++) {
          $("#tabelData2")
            .DataTable()
            .row.add([
              i + 1,
              data[i].part_number,
              data[i].part_name,
              data[i].uniqe_no,
              data[i].qty,
              data[i].reason,
              data[i].condition,
              data[i].repair,
              data[i].source_type,
              data[i].remarks,
              data[i].material,
              data[i].tanggal,
              data[i].cost_center,
            ])
            .draw();
        }
      },
      error: function (error) {
        console.log("Error:", error);
      },
    });
  });

  //============EVENT CLICK==================//
  $("#clear").on("click", function () {
    $("#remarks").val("");
    $("#qty").val("");
    $("#reason").val("");
    $("#condition").val("");
    $("#repair").val("");
  });

  //========DATATABLES========//
  $(document).ready(function () {
    function RefreshDataTables() {
      // Memastikan respons dari server menyatakan keberhasilan
      // Mendapatkan nilai dari input
      const tanggalFrom = $("#tanggal").val();
      const tanggalTo = $("#tanggalTo").val();
      const line = $("#line").val();
      const shift = $("#shift").val();
      const material = $("#material").val();

      // Mengirim permintaan AJAX
      $.ajax({
        url: BASEURL + "/data/getDataTable",
        method: "POST",
        data: {
          tanggalFrom: tanggalFrom,
          tanggalTo: tanggalTo,
          line: line,
          shift: shift,
          material: material,
        },
        dataType: "json",
        success: function (data) {
          // Hapus semua baris sebelum menambahkan data baru
          $("#tabelData").DataTable().clear().draw();

          // Iterasi melalui data dan tambahkan baris ke dalam tabel
          for (var i = 0; i < data.length; i++) {
            let statusClass = "";

            // Tentukan kelas berdasarkan nilai status_lsr
            if (data[i].status_lsr === "pending") {
              statusClass = "bg-warning";
            } else if (data[i].status_lsr === "approved") {
              statusClass = "bg-success";
            } else if (data[i].status_lsr === "rejected") {
              statusClass = "bg-danger";
            }

            $("#tabelData")
              .DataTable()
              .row.add([
                `<input class="form-check-input checkbox-single" type="checkbox" id="checkboxNoLabel${i}" 
        aria-label="" value="${data[i].id}">`,
                data[i].part_number,
                data[i].part_name,
                data[i].uniqe_no,
                data[i].qty,
                data[i].reason,
                data[i].condition,
                data[i].repair,
                data[i].source_type,
                data[i].remarks,
                data[i].material,
                data[i].tanggal,
                data[i].waktu,
                data[i].line_lsr,
                data[i].shift,
                data[i].user_lsr,
                data[i].line_code,
                data[i].cost_center,
                data[i].status_lsr,
              ])
              .nodes()
              .to$() // Dapatkan elemen HTML tr (baris)
              .addClass(statusClass); // Tambahkan kelas status
          }
          $("#tabelData").DataTable().draw();
        },
        error: function (error) {
          console.log("Error:", error);
        },
      });
    }

    // Event handler untuk form submission
    $("#searchForm").submit(function (event) {
      // Menghentikan perilaku default formulir
      event.preventDefault();

      // panggil untuk hasiil dari datatables
      RefreshDataTables();
    });

    // konfigurasi DataTbales untuk halaman Data
    var table = $("#tabelData").DataTable({
      // ordering: false,
      fixedHeader: true,
      scrollX: true,
      autoWidth: true,
      responsive: true,
      buttons: [
        {
          extend: "excelHtml5",
          text: '<i class="bi bi-download"></i> Excel',
          className: "btn-sm btn-success",
        },
        {
          text: '<i class="bi bi-pencil-square"></i> Edit',
          className: "btn-sm btn-warning",
          attr: { id: "editSelected" },
        },
        {
          text: '<i class="bi bi-trash"></i> Delete',
          className: "btn-sm btn-danger",
          attr: { id: "deleteSelected" },
        },
        {
          text: '<i class="bi bi-check-circle-fill"></i> Approve',
          className: "btn-sm btn-info",
          attr: { id: "approveSelected" },
        },
      ],
      initComplete: function () {
        var btns = $(".dt-buttons");
        btns.removeClass("btn-group");
      },
      dom:
        "<'row'<'col-6'B><'col-6'f>>" +
        "<'row'<'col-12'tr>>" +
        "<'row'<'col-9'l><'col-3 text-end'i>>" +
        "<'row'<'col-12 pt-3'p>>",
      lengthMenu: [
        [10, 25, 50, 100, 500, -1],
        [10, 25, 50, 100, 500, "All"],
      ],
      columns: [
        {
          title: `<label>
            <input class="form-check-input" type="checkbox" id="checkboxAll" value="" aria-label="">
            </label>`,
          orderable: false,
        },
        { title: "Part Number" },
        { title: "Part Name" },
        { title: "Unique No" },
        { title: "Qty" },
        { title: "Reason" },
        { title: "Condition" },
        { title: "Repair" },
        { title: "Source Type" },
        { title: "Remarks" },
        { title: "Material" },
        { title: "Tanggal" },
        { title: "Waktu" },
        { title: "Line" },
        { title: "Shift" },
        { title: "User" },
        { title: "Line Code" },
        { title: "Cost Center" },
        { title: "Status" },
      ],
    });
    // Mengatur tombol container ke posisi yang sesuai
    table.buttons().container().appendTo("#tabelData_wrapper .col-md-6:eq(0)");

    // Memilih/deselect semua checkbox saat checkboxAll diubah
    $("#checkboxAll").change(function () {
      $(".checkbox-single").prop("checked", $(this).prop("checked"));
    });

    //========FITUR DELETE DATA=======//
    $("#deleteSelected").on("click", function () {
      // Mendapatkan nilai checkbox yang terpilih
      var selectedRows = $(".checkbox-single:checked");

      // Mendapatkan nilai dari setiap checkbox yang terpilih
      var selectedData = [];
      selectedRows.each(function () {
        selectedData.push($(this).val());
      });

      // Menjalankan fungsi editSelectRows
      deleteSelectRows(selectedData);
    });

    function deleteSelectRows(selectedData) {
      try {
        if (selectedData.length === 0) {
          // alert("Pilih setidaknya satu baris untuk dihapus.");
          setModal("Alert", "Pilih setidaknya satu baris untuk dihapus.");
          $("#alertModal").modal("show");
          return;
        }

        // Tampilkan modal konfirmasi
        $("#confirmationModal").modal("show");

        // Tangkap kejadian ketika tombol "Hapus" pada modal diklik
        $("#confirmDeleteBtn")
          .off("click")
          .on("click", function () {
            // Sembunyikan modal konfirmasi
            $("#confirmationModal").modal("hide");

            // Mengirim data terpilih ke server menggunakan AJAX
            sendSelectedDataToServer(selectedData);
          });
      } catch (error) {
        console.error("Error in editSelectRows:", error);
      }
    }

    function sendSelectedDataToServer(selectedData) {
      // Mengirim data terpilih ke server menggunakan AJAX
      $.ajax({
        url: BASEURL + "/data/getDataDelete",
        method: "POST",
        contentType: "application/json",
        data: JSON.stringify({ selectedData: selectedData }),
        success: function (data) {
          // panggil untuk hasiil dari datatables
          RefreshDataTables();

          // Menampilkan notifikasi modal Bootstrap setelah berhasil menghapus
          $("#alertModal").modal("show");
        },
        error: function (error) {
          setModal("Gagal!", "Data gagal dihapus.");
          $("#alertModal").modal("show");
        },
      });
    }

    //========FITUR EDIT DATA=======//
    $("#editSelected").on("click", function () {
      // Mendapatkan nilai checkbox yang terpilih
      var selectedRows = $(".checkbox-single:checked");

      // Mendapatkan nilai dari setiap checkbox yang terpilih
      var selectedData = [];
      selectedRows.each(function () {
        selectedData.push($(this).val());
      });
      // Menjalankan fungsi editSelectRows
      editSelectRows(selectedData);
    });

    function editSelectRows(selectedData) {
      try {
        if (selectedData.length === 0) {
          // alert("Pilih setidaknya satu baris untuk dihapus.");
          setModal("Alert", "Pilih setidaknya satu baris untuk diubah.");
          $("#alertModal").modal("show");
          return;
        }

        if (selectedData.length > 1) {
          setModal("Alert", "Pilih hanya satu baris untuk edit.");
          $("#alertModal").modal("show");
          return;
        }
        // Mengirim data terpilih ke server menggunakan AJAX
        sendEditDataToServer(selectedData);

        // Tangkap kejadian ketika tombol "Save" pada modal diklik
        $("#saveBtn")
          .off("click")
          .on("click", function () {
            // Mengambil data formulir
            var formData = $("#editForm").serialize();
            // Mengirim data ke server menggunakan AJAX
            $.ajax({
              url: BASEURL + "/data/ubah",
              method: "POST",
              data: formData,
              success: function (response) {
                // panggil untuk hasiil dari datatables
                RefreshDataTables();

                // Sembunyikan modal konfirmasi
                $("#editModal").modal("hide");

                // Menampilkan notifikasi modal Bootstrap setelah berhasil
                setModal("Sukses!", "Data berhasil diubah.");
                $("#alertModal").modal("show");
              },
              error: function (error) {
                $("#editModal").modal("hide");
                setModal("Gagal!", "Data gagal diubah.");
                $("#alertModal").modal("show");
                // Handle kesalahan jika diperlukan
                console.log("Error:", error);
              },
            });
          });
      } catch (error) {
        console.error("Error in editSelectRows:", error);
      }
    }

    function setModal(sukses, caption) {
      // Set modal content sesuai dengan parameter content
      $("#alertModalLabel").text(sukses);
      $("#modalAlertContent").text(caption);
    }

    function sendEditDataToServer(selectedData) {
      // Mengirim data terpilih ke server menggunakan AJAX
      $.ajax({
        url: BASEURL + "/data/getDataEdit",
        method: "POST",
        contentType: "application/json",
        data: JSON.stringify({ selectedData: selectedData }),
        success: function (data) {
          $("#partNumber").val(data.success.part_number);
          $("#partName").val(data.success.part_name);
          $("#uniqeNo").val(data.success.uniqe_no);
          $("#qty").val(data.success.qty);
          $("#sourceType").val(data.success.source_type);
          $("#reason").val(data.success.reason);
          $("#condition").val(data.success.condition);
          $("#repair").val(data.success.repair);
          $("#remarks").val(data.success.remarks);
          $("#id").val(data.success.id);

          // Tampilkan modal edit
          $("#editModal").modal("show");
        },
        error: function (error) {
          console.log("Error:", error);
        },
      });
    }

    //========FITUR APPROVE DATA=======//
    $("#approveSelected").on("click", function () {
      // Mendapatkan nilai checkbox yang terpilih
      var selectedRows = $(".checkbox-single:checked");

      // Mendapatkan nilai dari setiap checkbox yang terpilih
      var selectedData = [];
      selectedRows.each(function () {
        selectedData.push($(this).val());
      });

      // Memastikan ada setidaknya satu item yang dipilih
      if (selectedData.length === 0) {
        setModal("Alert", "Pilih setidaknya satu baris untuk approve.");
        $("#alertModal").modal("show");
        return;
      }

      // Tampilkan modal konfirmasi
      $("#confirmationModalApprove").modal("show");

      // Menanggapi klik tombol konfirmasi
      $("#confirmationModalApprove")
        .off("click", "#confirmApproveBtn")
        .on("click", "#confirmApproveBtn", function () {
          // Sembunyikan modal konfirmasi
          $("#confirmationModalApprove").modal("hide");

          // Kirim data terpilih ke server menggunakan AJAX
          $.ajax({
            url: BASEURL + "/data/getDataApprove",
            method: "POST",
            contentType: "application/json",
            data: JSON.stringify({ selectedData: selectedData }),
            success: function (data) {
              // Sembunyikan indikator loading atau pesan
              // ...

              // panggil untuk hasil dari datatables
              RefreshDataTables();

              // Menampilkan notifikasi modal Bootstrap setelah berhasil menghapus
              setModal("Sukses!", "Data Approved.");
              $("#alertModal").modal("show");
            },
            error: function (error) {
              // Sembunyikan indikator loading atau pesan
              // ...

              console.error("Error in AJAX request:", error);
              setModal("Gagal!", "Data gagal approved.");
              $("#alertModal").modal("show");
            },
          });
        });
    });

    // DataTbales untuk halaman Create
    var table = $("#tabelData2").DataTable({
      // ordering: false,
      fixedHeader: true,
      scrollX: true,
      autoWidth: true,
      responsive: true,
      dom:
        "<'row'<'col-12'tr>>" +
        "<'row'<'col-9'l><'col-3 text-end'i>>" +
        "<'row'<'col-12 pt-3'p>>",
      lengthMenu: [
        [5, 10, 25, 50, 100, -1],
        [5, 10, 25, 50, 100, "All"],
      ],
      columns: [
        { title: "#" },
        { title: "Part Number" },
        { title: "Part Name" },
        { title: "Unique No" },
        { title: "Qty" },
        { title: "Reason" },
        { title: "Condition" },
        { title: "Repair" },
        { title: "Source Type" },
        { title: "Remarks" },
        { title: "Material" },
        { title: "Tanggal" },
        { title: "Cost Center" },
      ],
    });

    // Mengatur tombol container ke posisi yang sesuai
    table.buttons().container().appendTo("#tabelData_wrapper .col-md-6:eq(0)");
  });
});
