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
    $("#tanggalTo").val(formattedDate2);
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
        $("#dataTable").empty();

        // Iterasi melalui data dan tambahkan baris ke dalam tabel
        for (var i = 0; i < data.length; i++) {
          $("#dataTable").append(
            `<tr>
          <td>${i + 1}</td>
          <td data-id="${data[i].id}">${data[i].part_number}</td>
          <td data-id="${data[i].id}">${data[i].part_name}</td>
          <td data-id="${data[i].id}">${data[i].uniqe_no}</td>
          <td data-id="${data[i].id}">${data[i].qty}</td>
          <td data-id="${data[i].id}">${data[i].reason}</td>
          <td data-id="${data[i].id}">${data[i].condition}</td>
          <td data-id="${data[i].id}">${data[i].repair}</td>
          <td data-id="${data[i].id}">${data[i].source_type}</td>
          <td data-id="${data[i].id}">${data[i].remarks}</td>
          <td data-id="${data[i].id}">${data[i].material}</td>
          <td data-id="${data[i].id}">${data[i].tanggal}</td>
          <td data-id="${data[i].id}">${data[i].cost_center}</td>
        </tr>`
          );
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
        $("#material").val(data.material);
        $("#costCenter").val(data.cost_center);
        $("#line").val(data.nama_line);

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
            $("#dataTable").empty();

            // Iterasi melalui data dan tambahkan baris ke dalam tabel
            for (var i = 0; i < data.length; i++) {
              $("#dataTable").append(
                `<tr>
              <td>${i + 1}</td>
              <td data-id="${data[i].id}">${data[i].part_number}</td>
              <td data-id="${data[i].id}">${data[i].part_name}</td>
              <td data-id="${data[i].id}">${data[i].uniqe_no}</td>
              <td data-id="${data[i].id}">${data[i].qty}</td>
              <td data-id="${data[i].id}">${data[i].reason}</td>
              <td data-id="${data[i].id}">${data[i].condition}</td>
              <td data-id="${data[i].id}">${data[i].repair}</td>
              <td data-id="${data[i].id}">${data[i].source_type}</td>
              <td data-id="${data[i].id}">${data[i].remarks}</td>
              <td data-id="${data[i].id}">${data[i].material}</td>
              <td data-id="${data[i].id}">${data[i].tanggal}</td>
              <td data-id="${data[i].id}">${data[i].cost_center}</td>
            </tr>`
              );
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
        $("#material").val(data.material);
        $("#lineCode").val(data.line_code);
        $("#line").val(data.nama_line);
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
            $("#dataTable").empty();

            // Iterasi melalui data dan tambahkan baris ke dalam tabel
            for (var i = 0; i < data.length; i++) {
              $("#dataTable").append(
                `<tr>
              <td>${i + 1}</td>
              <td data-id="${data[i].id}">${data[i].part_number}</td>
              <td data-id="${data[i].id}">${data[i].part_name}</td>
              <td data-id="${data[i].id}">${data[i].uniqe_no}</td>
              <td data-id="${data[i].id}">${data[i].qty}</td>
              <td data-id="${data[i].id}">${data[i].reason}</td>
              <td data-id="${data[i].id}">${data[i].condition}</td>
              <td data-id="${data[i].id}">${data[i].repair}</td>
              <td data-id="${data[i].id}">${data[i].source_type}</td>
              <td data-id="${data[i].id}">${data[i].remarks}</td>
              <td data-id="${data[i].id}">${data[i].material}</td>
              <td data-id="${data[i].id}">${data[i].tanggal}</td>
              <td data-id="${data[i].id}">${data[i].cost_center}</td>
            </tr>`
              );
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
        $("#material").val(data.material);
        $("#costCenter").val(data.cost_center);
        $("#lineCode").val(data.line_code);

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
            $("#dataTable").empty();

            // Iterasi melalui data dan tambahkan baris ke dalam tabel
            for (var i = 0; i < data.length; i++) {
              $("#dataTable").append(
                `<tr>
              <td>${i + 1}</td>
              <td data-id="${data[i].id}">${data[i].part_number}</td>
              <td data-id="${data[i].id}">${data[i].part_name}</td>
              <td data-id="${data[i].id}">${data[i].uniqe_no}</td>
              <td data-id="${data[i].id}">${data[i].qty}</td>
              <td data-id="${data[i].id}">${data[i].reason}</td>
              <td data-id="${data[i].id}">${data[i].condition}</td>
              <td data-id="${data[i].id}">${data[i].repair}</td>
              <td data-id="${data[i].id}">${data[i].source_type}</td>
              <td data-id="${data[i].id}">${data[i].remarks}</td>
              <td data-id="${data[i].id}">${data[i].material}</td>
              <td data-id="${data[i].id}">${data[i].tanggal}</td>
              <td data-id="${data[i].id}">${data[i].cost_center}</td>
            </tr>`
              );
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
        $("#dataTable").empty();

        // Iterasi melalui data dan tambahkan baris ke dalam tabel
        for (var i = 0; i < data.length; i++) {
          $("#dataTable").append(
            `<tr>
          <td>${i + 1}</td>
          <td data-id="${data[i].id}">${data[i].part_number}</td>
          <td data-id="${data[i].id}">${data[i].part_name}</td>
          <td data-id="${data[i].id}">${data[i].uniqe_no}</td>
          <td data-id="${data[i].id}">${data[i].qty}</td>
          <td data-id="${data[i].id}">${data[i].reason}</td>
          <td data-id="${data[i].id}">${data[i].condition}</td>
          <td data-id="${data[i].id}">${data[i].repair}</td>
          <td data-id="${data[i].id}">${data[i].source_type}</td>
          <td data-id="${data[i].id}">${data[i].remarks}</td>
          <td data-id="${data[i].id}">${data[i].material}</td>
          <td data-id="${data[i].id}">${data[i].tanggal}</td>
          <td data-id="${data[i].id}">${data[i].cost_center}</td>
        </tr>`
          );
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
        $("#dataTable").empty();
        // Iterasi melalui data dan tambahkan baris ke dalam tabel
        for (var i = 0; i < data.length; i++) {
          $("#dataTable").append(
            `<tr>
          <td>${i + 1}</td>
          <td data-id="${data[i].id}">${data[i].part_number}</td>
          <td data-id="${data[i].id}">${data[i].part_name}</td>
          <td data-id="${data[i].id}">${data[i].uniqe_no}</td>
          <td data-id="${data[i].id}">${data[i].qty}</td>
          <td data-id="${data[i].id}">${data[i].reason}</td>
          <td data-id="${data[i].id}">${data[i].condition}</td>
          <td data-id="${data[i].id}">${data[i].repair}</td>
          <td data-id="${data[i].id}">${data[i].source_type}</td>
          <td data-id="${data[i].id}">${data[i].remarks}</td>
          <td data-id="${data[i].id}">${data[i].material}</td>
          <td data-id="${data[i].id}">${data[i].tanggal}</td>
          <td data-id="${data[i].id}">${data[i].cost_center}</td>
        </tr>`
          );
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
        $("#dataTable").empty();

        // Iterasi melalui data dan tambahkan baris ke dalam tabel
        for (var i = 0; i < data.length; i++) {
          $("#dataTable").append(
            `<tr>
          <td>${i + 1}</td>
          <td data-id="${data[i].id}">${data[i].part_number}</td>
          <td data-id="${data[i].id}">${data[i].part_name}</td>
          <td data-id="${data[i].id}">${data[i].uniqe_no}</td>
          <td data-id="${data[i].id}">${data[i].qty}</td>
          <td data-id="${data[i].id}">${data[i].reason}</td>
          <td data-id="${data[i].id}">${data[i].condition}</td>
          <td data-id="${data[i].id}">${data[i].repair}</td>
          <td data-id="${data[i].id}">${data[i].source_type}</td>
          <td data-id="${data[i].id}">${data[i].remarks}</td>
          <td data-id="${data[i].id}">${data[i].material}</td>
          <td data-id="${data[i].id}">${data[i].tanggal}</td>
          <td data-id="${data[i].id}">${data[i].cost_center}</td>
        </tr>`
          );
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

  //========SEARCH DATA========//
  $(document).ready(function () {
    // Event handler untuk form submission
    $("#searchForm").submit(function (event) {
      // Menghentikan perilaku default formulir
      event.preventDefault();
  
      // Mendapatkan nilai dari input
      const tanggalFrom = $("#tanggal").val();
      const tanggalTo = $("#tanggalTo").val();
      const line = $("#line").val();
      const costCenter = $("#costCenter").val();
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
          costCenter: costCenter,
          shift: shift,
          material: material,
        },
        dataType: "json",
        success: function (data) {
          // Hapus semua baris sebelum menambahkan data baru
          $("#tabelData").DataTable().clear().draw();
  
          // Iterasi melalui data dan tambahkan baris ke dalam tabel
          for (var i = 0; i < data.length; i++) {
            $("#tabelData").DataTable().row.add([
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
              data[i].cost_center
            ]).draw();
          }
        },
        error: function (error) {
          console.log("Error:", error);
        },
      });
    });
  
    // Konfigurasi DataTables
    var table = $("#tabelData").DataTable({
      fixedHeader: true,
      scrollX: true,
      autoWidth: true,
      responsive: true,
      buttons: {
        dom: {
          button: {
            className: "btn btn-success", // Primary class for all buttons
          },
        },
        buttons: [
          {
            // EXCEL
            extend: "excelHtml5",
          },
        ],
      },
      dom:
        "<'row'<'col-3'B><'col-9'f>>" +
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
