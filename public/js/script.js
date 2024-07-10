$(function () {
  $(document).ready(function () {
    refreshNotif();
    //==== ISI NILAI DARI DATE DAN TIME======//
    // Mendapatkan tanggal dan waktu sekarang
    var currentDate = new Date();
    var hours = currentDate.getHours();
    var minutes = currentDate.getMinutes();

    // Mengurangi 7 jam
    currentDate.setHours(currentDate.getHours() - 7);

    // Mendapatkan tanggal, bulan, dan tahun
    var day = currentDate.getDate();
    var month = currentDate.getMonth() + 1; // Ingat: bulan dimulai dari 0
    var year = currentDate.getFullYear();
    var year2 = 9999;

    // Mengonversi ke format "yyyy-MM-dd"
    var formattedDate = year + "-" + (month < 10 ? "0" : "") + month + "-" + (day < 10 ? "0" : "") + day;

    var formattedDate2 = year2 + "-" + (month < 10 ? "0" : "") + month + "-" + (day < 10 ? "0" : "") + day;

    // Mengonversi ke format "HH:mm"
    var formattedTime = (hours < 10 ? "0" : "") + hours + ":" + (minutes < 10 ? "0" : "") + minutes;

    // Mengatur nilai input tanggal dan waktu
    $("#tanggal").val(formattedDate);
    $("#tanggalSub").val(formattedDate);
    // $("#tanggalTo").val(formattedDate2);
    $("#waktu").val(formattedTime);
    $("#waktuSub").val(formattedTime);

    // konfigurasi flatpickr untuk date&time picker
    flatpickr("#tanggal", {
      maxDate: "today",
      dateFormat: "Y-m-d",
      allowInput: true,
      onChange: function (selectedDates, dateStr, instance) {
        const categoryVal = $("#category").val();
        getIDnoLsr(categoryVal);
      },
    });

    flatpickr("#tanggalTo", {
      maxDate: "today",
      dateFormat: "Y-m-d",
      allowInput: true,
    });

    flatpickr("#waktu", {
      enableTime: true,
      noCalendar: true,
      dateFormat: "H:i",
      time_24hr: true,
      defaultDate: formattedTime,
    });

    //==== ISI NILAI DARI LINE DAN SHIFT======//
    // Ambil nilai dari data-id
    const id = $("#userLog").data("id");
    const validLine = $("#validLine").text().trim();
    $.ajax({
      url: BASEURL + "/create/getUbahSelectedLine",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        const lineExists =
          $("#line option").filter(function () {
            return $(this).val() === data.line_user;
          }).length > 0;

        if (lineExists) {
          $("#line").val(data.line_user);
        } else {
          $("#line").val("All");
        }

        $("#lineSub").val(data.line_user);
        $("#shift").val(data.shift_user);
        $("#lsrCode").val(data.category); // untuk halaman report
        $("#department").val(data.department); // untuk halaman report

        if ($("#search").length > 0) {
          if ($("#shift").val() === "NonShift") {
            $("#shift").val("All");
          }
        }
      },
      error: function (error) {
        console.log("Error:", error);
      },
    });

    //==== ISI NILAI DARI MATERIAL, LINE CODE, COST CENTER, CATEGORY======//
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
        $("#category").val(data.category);
      },
      error: function (error) {
        console.log("Error:", error);
      },
    });

    //==== ISI NILAI DARI NO LSR======//
    const categoryVal = $("#validCategory").val();
    getIDnoLsr(categoryVal);

    //==== ISI NILAI DARI PART NUMBER , PART NAME, UNIQE NO, DAN SOURCE TYPE======//
    const validLineValue2 = $("#validMaterial").val();
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
        clearAndAppendOptions("#price", data, "price");
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

        $select.append(`<option value="${optionValue}" data-id="${dataId}">${optionValue}</option>`);
      }
    }

    //==== ISI TABEL DATA SUBMIT======//
    // Ambil nilai
    const material = $("#validMaterial").val();
    const shiftUser = $("#shiftUser").val();
    const lineUser = $("#lineUser").val();
    const tanggalValue = formattedDate;
    RefreshDataSubmit(tanggalValue, shiftUser, lineUser);
  });

  //=================EVENT CHANGE===================//
  $("#partNumber, #partName, #uniqeNo, #sourceType").on("change", function () {
    $("body").loadingModal({
      text: "Loading...",
    });
    const id = $(this).find(":selected").data("id");
    $.ajax({
      url: BASEURL + "/create/getUbahSelectedMat",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#partNumber").val(data.part_number);
        $("#partName").val(data.part_name);
        $("#uniqeNo").val(data.uniqe_no);
        $("#sourceType").val(data.source_type);
        $("#price").val(data.price);

        $("#partNumber, #partName, #uniqeNo").select2();
        $("body").loadingModal("hide");
      },
    });
  });

  $("#lineCode").on("change", function () {
    $("body").loadingModal({
      text: "Loading...",
    });
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
          $("#category").val(data.category);
          $("#department").val(data.department);
        }
        //ISI DATATABLE//
        const shiftUser = $("#shift").val();
        const material = $("#material").val();
        const tanggalValue = $("#tanggal").val();
        const lineUser = $("#line").val();
        const costCenter = $("#costCenter").val();
        RefreshDataSubmitChange(tanggalValue, shiftUser, lineUser, lineCode, costCenter);

        addMasterMaterial();
        $("body").loadingModal("hide");
      },
    });
  });

  $("#costCenter").on("change", function () {
    $("body").loadingModal({
      text: "Loading...",
    });
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
          $("#category").val(data.category);
          $("#department").val(data.department);
        }

        //ISI DATATABLE//
        const shiftUser = $("#shift").val();
        const material = $("#material").val();
        const tanggalValue = $("#tanggal").val();
        const lineUser = $("#line").val();
        const lineCode = $("#lineCode").val();
        RefreshDataSubmitChange(tanggalValue, shiftUser, lineUser, lineCode, costCenter);

        addMasterMaterial();
        $("body").loadingModal("hide");
      },
    });
  });

  $("#line").on("change", function () {
    $("body").loadingModal({
      text: "Loading...",
    });
    const id = $(this).find(":selected").data("id");
    const lineUser = $(this).val();
    const validLineValue = $(this).val();
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
          $("#category").val(data.category);
          $("#department").val(data.department);
        }

        $("#lineSub").val(lineUser);

        //ISI DATATABLE//
        const shiftUser = $("#shift").val();
        const material = $("#material").val();
        const tanggalValue = $("#tanggal").val();
        const lineCode = $("#lineCode").val();
        const costCenter = $("#costCenter").val();
        RefreshDataSubmitChange(tanggalValue, shiftUser, lineUser, lineCode, costCenter);

        const categoryVal = data.category;
        getIDnoLsr(categoryVal);

        addMasterMaterial();
        $("body").loadingModal("hide");
      },
    });
  });

  $("#material").on("change", function () {
    $("body").loadingModal({
      text: "Loading...",
    });
    const material = $(this).val();
    const shiftUser = $("#shift").val();
    const tanggalValue = $("#tanggal").val();
    const lineUser = $("#line").val();
    const lineCode = $("#lineCode").val();
    const costCenter = $("#costCenter").val();
    RefreshDataSubmitChange(tanggalValue, shiftUser, lineUser, lineCode, costCenter);
    addMasterMaterial();
    $("body").loadingModal("hide");
  });

  $("#tanggal").on("change", function () {
    $("body").loadingModal({
      text: "Loading...",
    });
    // ISI DATATABLE//
    const tanggalValue = $(this).val();
    const shiftUser = $("#shift").val();
    const material = $("#material").val();
    const lineUser = $("#line").val();
    const lineCode = $("#lineCode").val();
    const costCenter = $("#costCenter").val();
    RefreshDataSubmitChange(tanggalValue, shiftUser, lineUser, lineCode, costCenter);
    $("body").loadingModal("hide");
  });

  $("#shift").on("change", function () {
    $("body").loadingModal({
      text: "Loading...",
    });
    //ISI DATATABLE//
    const shiftUser = $(this).val();
    const tanggalValue = $("#tanggal").val();
    const material = $("#material").val();
    const lineUser = $("#line").val();
    const lineCode = $("#lineCode").val();
    const costCenter = $("#costCenter").val();
    RefreshDataSubmitChange(tanggalValue, shiftUser, lineUser, lineCode, costCenter);
    $("body").loadingModal("hide");
  });

  $("#material").on("change", function () {
    $("body").loadingModal({
      text: "Loading...",
    });
    const material = $(this).val();
    const tanggalValue = $("#tanggal").val();
    const shiftUser = $("#shift").val();
    const lineUser = $("#line").val();
    const lineCode = $("#lineCode").val();
    const costCenter = $("#costCenter").val();
    RefreshDataSubmitChange(tanggalValue, shiftUser, lineUser, lineCode, costCenter);
    $("body").loadingModal("hide");
  });

  function RefreshDataSubmitChange(tanggalValue, shiftUser, lineUser, lineCode, costCenter) {
    $.ajax({
      url: BASEURL + "/create/getDataTableChange",
      data: {
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
          if (data[i].status_lsr === "Waiting Approved") {
            statusClass = "";
          } else if (data[i].status_lsr === "Approved By Section") {
            statusClass = "bg-warning text-white";
          } else if (data[i].status_lsr === "Uploaded To Ifast") {
            statusClass = "bg-success text-white";
          } else if (data[i].status_lsr === "Rejected By Section") {
            statusClass = "bg-danger";
          }

          $("#tabelData2")
            .DataTable()
            .row.add([
              i + 1,
              data[i].no_lsr,
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
              data[i].cost_center,
              data[i].status_lsr,
              `<button type="button" class="btn btn-danger btn-sm btn-delete" data-id="${data[i].id}">
              <i class="bi bi-trash"></i></button>`,
            ])
            .nodes()
            .to$() // Dapatkan elemen HTML tr (baris)
            .addClass(statusClass); // Tambahkan kelas status
        }
        $("#tabelData2").DataTable().draw();
        checkStatus();
      },
      error: function (error) {
        console.log("Error:", error);
      },
    });
  }

  //ADD DATA MASTER MATERIAL//
  function addMasterMaterial() {
    const validLineValue2 = $("#material").val();
    // Mengkonfigurasi objek AJAX
    const ajaxOptions = {
      url: BASEURL + "/create/getMasterPart",
      data: { validLineValue2: validLineValue2 },
      method: "post",
      dataType: "json",
      success: function (data) {
        // Membersihkan dan menambahkan opsi baru ke dalam elemen select
        $("#partNumber, #partName, #uniqeNo, #sourceType, #price").empty();

        // Iterasi melalui data dan menambahkan opsi ke dalam elemen select
        for (var i = 0; i < data.length; i++) {
          addOption("#partNumber", data[i].part_number, data[i].id);
          addOption("#partName", data[i].part_name, data[i].id);
          addOption("#uniqeNo", data[i].uniqe_no, data[i].id);
          addOption("#sourceType", data[i].source_type, data[i].id);
          addOption("#price", data[i].price, data[i].id);
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
      $(selectId).append(`<option value="${optionValue}" data-id="${dataId}">${optionValue}</option>`);
    }
  }

  //==== ISI NILAI DARI NO LSR======//
  function getIDnoLsr(categoryVal) {
    $.ajax({
      url: BASEURL + "/create/getIdReport",
      data: { categoryVal: categoryVal },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#noLsr").val(data.no_lsr);
        // $("#noLSRSub").val(data.no_lsr);
      },
      error: function (error) {
        console.log("Error:", error);
      },
    });
  }

  //=====UNTUK REFRESH TABLE SUBMIT=====//
  function RefreshDataSubmit(tanggalValue, shiftUser, lineUser) {
    $.ajax({
      url: BASEURL + "/create/getDataTable",
      data: {
        tanggalValue: tanggalValue,
        shiftUser: shiftUser,
        lineUser: lineUser,
      },
      method: "post",
      dataType: "json",
      success: function (data) {
        // Hapus semua baris sebelum menambahkan data baru
        $("#tabelData2").DataTable().clear().draw();

        let statusClass = "";
        // Iterasi melalui data dan tambahkan baris ke dalam tabel
        for (var i = 0; i < data.length; i++) {
          if (data[i].status_lsr === "Waiting Approved") {
            statusClass = "";
          } else if (data[i].status_lsr === "Approved By Section") {
            statusClass = "bg-warning text-white";
          } else if (data[i].status_lsr === "Uploaded To Ifast") {
            statusClass = "bg-success text-white";
          } else if (data[i].status_lsr === "Rejected By Section") {
            statusClass = "bg-danger";
          }

          $("#tabelData2")
            .DataTable()
            .row.add([
              i + 1,
              data[i].no_lsr,
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
              data[i].cost_center,
              data[i].status_lsr,
              `<button type="button" class="btn btn-danger btn-sm btn-delete" data-id="${data[i].id}">
               <i class="bi bi-trash"></i></button>`,
            ])
            .nodes()
            .to$() // Dapatkan elemen HTML tr (baris)
            .addClass(statusClass); // Tambahkan kelas status
        }
        $("#tabelData2").DataTable().draw();
        checkStatus();
      },
      error: function (error) {
        console.log("Error:", error);
      },
    });
  }

  // CHECK STATUS DATA
  function checkStatus() {
    $("#tabelData2")
      .DataTable()
      .rows()
      .every(function () {
        var data = this.data();
        var status_lsr = data[data.length - 2]; // Ambil status dari data terakhir (sebelum kolom tombol)
        var btnDelete = $(this.node()).find(".btn-delete");

        if (status_lsr != "Waiting Approved") {
          // Jika status sudah disetujui, nonaktifkan tombol hapus
          btnDelete.prop("disabled", true);
        } else {
          // Jika status belum disetujui, aktifkan tombol hapus
          btnDelete.prop("disabled", false);
        }
      });
  }

  // UPDATE TOMBOL SUBMIT LIVE BERDASARKAN TABEL
  // function checkTablePageCreate() {
  //   var submitButton = $("#submitReport");

  //   var tableBody = $("#dataTable");

  //   if (tableBody.find("td").length < 2) {
  //     submitButton.hide();
  //   } else {
  //     submitButton.show();
  //   }
  // }

  // $(document).ready(function () {
  //   // Membuat observer untuk memantau perubahan di dalam tabel
  //   var observer = new MutationObserver(function (mutations) {
  //     checkTablePageCreate();
  //   });

  //   var config = {
  //     childList: true,
  //     subtree: true,
  //   };

  //   observer.observe(document.getElementById("dataTable"), config);

  //   // $("#data").on("click", function () {
  //   //   observer.disconnect();
  //   // });
  // });

  //============INPUT FORM WITH JQUERY==================//
  $(document).ready(function () {
    $("#formInput").validate({
      rules: {
        remarks: "required",
        qty: "required",
        reason: "required",
        condition: "required",
        repair: "required",
        line_lsr: "required",
        tanggal: "required",
      },
      messages: {
        remarks: "<span class='error'>Harap isi field ini.</span>",
        qty: "<span class='error'>Harap isi field ini.</span>",
        reason: "<span class='error'>Harap isi field ini.</span>",
        condition: "<span class='error'>Harap isi field ini.</span>",
        repair: "<span class='error'>Harap isi field ini.</span>",
        line_lsr: "<span class='error'>Harap isi field ini.</span>",
        tanggal: "<span class='error'>Harap isi field ini.</span>",
      },
      errorPlacement: function (error, element) {
        if (element.is("input") || element.is("select") || element.is("textarea")) {
          error.insertAfter(element);
        } else {
          error.appendTo("#error-messages");
        }
      },
      submitHandler: function (form) {
        $("body").loadingModal({
          text: "Loading...",
        });

        $("#material").prop("disabled", false);
        $("#shift").prop("disabled", false);
        $("#line").prop("disabled", false);
        $("#lineCode").prop("disabled", false);
        $("#costCenter").prop("disabled", false);
        $("#noLsr").prop("disabled", false);

        const noLsr = $("#noLsr").val();
        const lineLsr = $("#line").val();

        $.ajax({
          url: BASEURL + "/create/checkNoLsr",
          method: "POST",
          data: { noLsr: noLsr },
          success: function (response) {
            if (noLsr == response.no_lsr && lineLsr != response.line_lsr) {
              $("#material").prop("disabled", true);
              $("#shift").prop("disabled", true);
              $("#line").prop("disabled", true);
              $("#lineCode").prop("disabled", true);
              $("#costCenter").prop("disabled", true);
              $("#noLsr").prop("disabled", true);

              $.toast({
                title: "Pesan",
                message: "Gagal menambahkan data.",
                type: "error",
                duration: 8000,
              });
              $.toast({
                title: "Pesan",
                message: "No LSR: " + noLsr + " sudah digunakan line lain, harap refresh browser dan input ulang.",
                type: "warning",
                duration: 15000,
              });
              $("body").loadingModal("hide");
              return;
            } else {
              // Continue only if the validation passed
              var formData = $(form).serialize();
              $.ajax({
                url: BASEURL + "/create/tambah",
                method: "POST",
                data: formData,
                success: function (response) {
                  $("body").loadingModal("hide");

                  if (response.status === "success") {
                    $.toast({
                      title: "Pesan",
                      message: response.message,
                      type: "success",
                      duration: 8000,
                    });
                    setTimeout(function () {
                      $("#dataTable")[0].scrollIntoView();
                    }, 100); // Tunda 100 milidetik sebelum menggulir

                    const material = $("#material").val();
                    const shiftUser = $("#shift").val();
                    const lineUser = $("#line").val();
                    const tanggalValue = $("#tanggal").val();
                    RefreshDataSubmit(tanggalValue, shiftUser, lineUser);
                    roleValidtionPageCreate();
                    // checkTablePageCreate();

                    // $("#remarks").val("");
                    $("#qty").val("");
                    // $("#reason").val("");
                    // $("#condition").val("");
                    // $("#repair").val("");
                    $("#lineCode").prop("disabled", true);
                    $("#costCenter").prop("disabled", true);
                    $("#noLsr").prop("disabled", true);
                  } else {
                    $.toast({
                      title: "Pesan",
                      message: response.message,
                      type: "error",
                      duration: 8000,
                    });
                  }
                },
                error: function (error) {
                  console.log(error);
                  $.toast({
                    title: "Pesan",
                    message: "Gagal menambahkan data terjadi kesalahan.",
                    type: "error",
                    duration: 8000,
                  });
                },
              });
            }
          },
        });
      },
    });
  });

  //=============SUBMIT FORM==============//
  $(document).ready(function () {});

  function setModalSubmit(sukses, caption) {
    // Set modal content sesuai dengan parameter content
    $("#alertModalLabel").text(sukses);
    $("#modalAlertContent").text(caption);
  }

  //============EVENT CLICK==================//
  $("#clear").on("click", function () {
    $("#remarks").val("");
    $("#qty").val("");
    $("#reason").val("");
    $("#condition").val("");
    $("#repair").val("");
  });

  $("#tabelData2").on("click", ".btn-delete", function () {
    var id = $(this).data("id");
    $.ajax({
      url: BASEURL + "/create/getDataDelete",
      method: "POST",
      data: { id: id },
      success: function (response) {
        const material = $("#material").val();
        const shiftUser = $("#shift").val();
        const lineUser = $("#line").val();
        const tanggalValue = $("#tanggal").val();
        RefreshDataSubmit(tanggalValue, shiftUser, lineUser);
        $.toast({
          title: "Pesan",
          message: "Berhasil menghapus data.",
          type: "success",
          duration: 8000,
        });
      },
      error: function (error) {
        console.log("Error:", error);
      },
    });
  });

  //========DATATABLES========//
  $(document).ready(function () {
    function RefreshDataTables() {
      // Mendapatkan nilai dari input
      const tanggalFrom = $("#tanggal").val();
      const tanggalTo = $("#tanggalTo").val();
      const line = $("#line").val();
      const shift = $("#shift").val();
      const material = $("#material").val();
      const status = $("#status").val();

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
          status: status,
        },
        dataType: "json",
        success: function (data) {
          // Hapus semua baris sebelum menambahkan data baru
          $("#tabelData").DataTable().clear().draw();

          // Iterasi melalui data dan tambahkan baris ke dalam tabel
          for (var i = 0; i < data.length; i++) {
            tabelData;
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

            // Tentukan elemen checkbox
            //  let checkboxElement = `<input class="form-check-input checkbox-single" type="checkbox" id="checkboxNoLabel${i}" aria-label="" value="${data[i].id}">`;
            //  if (data[i].status_lsr === "Waiting Approved") {
            //    checkboxElement = ""; // Hilangkan checkbox jika status adalah "Waiting Approved"
            //  }

            $("#tabelData")
              .DataTable()
              .row.add([
                `<input class="form-check-input checkbox-single" type="checkbox" id="checkboxNoLabel${i}" 
        aria-label="" value="${data[i].id}">`,
                data[i].no_lsr,
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
                data[i].change_by,
                data[i].change_date,
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

    //========EVENT SEARCH DATA===========//
    $("#searchForm").submit(function (event) {
      $("body").loadingModal({
        text: "Loading...",
      });
      event.preventDefault();

      RefreshDataTables();
      $("body").loadingModal("hide");
    });

    $("#searchReport").submit(function (event) {
      // Mendapatkan nilai dari input
      const tanggalFrom = $("#tanggal").val();
      const tanggalTo = $("#tanggalTo").val();
      const department = $("#department").val();
      const line = $("#line").val();
      const shift = $("#shift").val();
      const lsrCode = $("#lsrCode").val();
      const status = $("#status").val();

      $("body").loadingModal({
        text: "Loading...",
      });
      event.preventDefault();

      RefreshTableReport(tanggalFrom, tanggalTo, department, line, shift, lsrCode, status);
      $("body").loadingModal("hide");
    });

    var tableReport = $("#tabelReport").DataTable({
      // ordering: false,
      fixedColumns: {
        left: 1,
      },
      scrollCollapse: true,
      fixedHeader: true,
      scrollX: true,
      scrollY: "50vh",
      autoWidth: true,
      responsive: true,
      buttons: [
        {
          text: '<i class="bi bi-x-lg"></i> Reject',
          className: "btn-sm btn-danger",
          attr: { id: "rejectReport" },
        },
        {
          text: '<i class="bi bi-check-circle-fill"></i> Approve',
          className: "btn-sm btn-warning",
          attr: { id: "approveReport" },
        },
      ],
      initComplete: function () {
        var btns = $(".dt-buttons");
        btns.removeClass("btn-group");
      },
      dom: "<'row'<'col-6'B><'col-6'f>>" + "<'row'<'col-12't>>" + "<'row'<'col-9 pt-3'l><'col-3 text-end'i>>" + "<'row'<'col-12 pt-3'p>>",
      lengthMenu: [
        [10, 25, 50, 100, 500, -1],
        [10, 25, 50, 100, 500, "All"],
      ],
      columnDefs: [
        {
          targets: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
          className: "text-center",
        },
      ],
      columns: [
        {
          title: `<label>
            <input class="form-check-input" type="checkbox" id="checkboxAll" value="" aria-label="">
            </label>`,
          orderable: false,
        },
        { title: "No LSR" },
        { title: "E-Form" },
        { title: "Department" },
        { title: "Line" },
        { title: "Cost Center" },
        { title: "Shift" },
        { title: "Pic" },
        { title: "Date" },
        { title: "Time" },
        { title: "Approved" },
        { title: "Received" },
        { title: "Status" },
      ],
    });
    // Mengatur tombol container ke posisi yang sesuai
    tableReport.buttons().container().appendTo("#tabelReport_wrapper .col-md-6:eq(0)");

    // ambil nilai tanggal dan tanggalTo
    const tanggalPicker = flatpickr("#tanggal", {
      maxDate: "today",
      dateFormat: "Y-m-d",
      allowInput: true,
      onChange: function (selectedDates, dateStr, instance) {
        const categoryVal = $("#category").val();
        getIDnoLsr(categoryVal);
        dateStr;
      },
    });

    const tanggalToPicker = flatpickr("#tanggalTo", {
      maxDate: "today",
      dateFormat: "Y-m-d",
      allowInput: true,
      onChange: function (selectedDates, dateStr, instance) {
        dateStr;
      },
    });

    function getTanggalValue() {
      return tanggalPicker.input.value;
    }

    function getTanggalToValue() {
      return tanggalToPicker.input.value;
    }

    $("#tanggal").on("change", function () {
      getTanggalValue();
    });

    $("#tanggalTo").on("change", function () {
      getTanggalToValue();
    });
    // end

    var table = $("#tabelData").DataTable({
      // ordering: false,
      fixedColumns: {
        left: 1,
      },
      scrollCollapse: true,
      fixedHeader: true,
      scrollX: true,
      scrollY: "50vh",
      autoWidth: true,
      responsive: true,
      buttons: [
        {
          extend: "excelHtml5",
          text: '<i class="bi bi-download"></i> Excel',
          className: "btn-sm btn-success",
          title: function () {
            var tanggalValue = getTanggalValue();
            var tanggalToValue = getTanggalToValue();
            return "Data LSR " + tanggalValue + " - " + tanggalToValue;
          },
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
          text: '<i class="bi bi-check-circle-fill"></i> Accept',
          className: "btn-sm btn-success",
          attr: { id: "approveSelected" },
        },
      ],
      initComplete: function () {
        var btns = $(".dt-buttons");
        btns.removeClass("btn-group");
      },
      dom: "<'row'<'col-6'B><'col-6'f>>" + "<'row'<'col-12't>>" + "<'row'<'col-9 pt-3'l><'col-3 text-end'i>>" + "<'row'<'col-12 pt-3'p>>",
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
        { title: "No LSR" },
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
        { title: "Date" },
        { title: "Time" },
        { title: "Line" },
        { title: "Shift" },
        { title: "User" },
        { title: "Line Code" },
        { title: "Cost Center" },
        { title: "Status" },
        { title: "Change By" },
        { title: "Change Date" },
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
          $.toast({
            title: "Pesan",
            message: "Pilih setidaknya satu baris untuk delete.",
            type: "warning",
            duration: 8000,
          });
          return;
        }

        $("#confirmationModal").modal("show");

        $("#confirmDeleteBtn")
          .off("click")
          .on("click", function () {
            $("#confirmationModal").modal("hide");

            sendSelectedDataToServer(selectedData);
          });
      } catch (error) {
        console.error("Error in editSelectRows:", error);
      }
    }

    function sendSelectedDataToServer(selectedData) {
      $.ajax({
        url: BASEURL + "/data/getDataDelete",
        method: "POST",
        contentType: "application/json",
        data: JSON.stringify({ selectedData: selectedData }),
        success: function (data) {
          if (data.status === "success") {
            $.toast({
              title: "Pesan",
              message: data.message,
              type: "success",
              duration: 8000,
            });
            RefreshDataTables();
            $("#editModal").modal("hide");
          } else {
            $.toast({
              title: "Pesan",
              message: data.message,
              type: "error",
              duration: 8000,
            });
          }
        },
        error: function (error) {
          $.toast({
            title: "Pesan",
            message: "Data gagal dihapus error." + error,
            type: "error",
            duration: 8000,
          });
        },
      });
    }

    //========FITUR EDIT DATA=======//
    $("#editSelected").on("click", function () {
      var selectedRows = $(".checkbox-single:checked");

      var selectedData = [];
      selectedRows.each(function () {
        selectedData.push($(this).val());
      });
      editSelectRows(selectedData);
    });

    function editSelectRows(selectedData) {
      try {
        if (selectedData.length === 0) {
          $.toast({
            title: "Pesan",
            message: "Pilih setidaknya satu baris untuk edit.",
            type: "warning",
            duration: 8000,
          });
          return;
        }

        if (selectedData.length > 1) {
          $.toast({
            title: "Pesan",
            message: "Pilih hanya satu baris untuk edit.",
            type: "warning",
            duration: 8000,
          });
          return;
        }
        sendEditDataToServer(selectedData);

        $("#saveBtn")
          .off("click")
          .on("click", function () {
            var formData = $("#editForm").serialize();
            $.ajax({
              url: BASEURL + "/data/ubah",
              method: "POST",
              data: formData,
              success: function (response) {
                if (response.status === "success") {
                  $.toast({
                    title: "Pesan",
                    message: response.message,
                    type: "success",
                    duration: 8000,
                  });
                  RefreshDataTables();
                  $("#editModal").modal("hide");
                } else {
                  $.toast({
                    title: "Pesan",
                    message: response.message,
                    type: "error",
                    duration: 8000,
                  });
                }
                $("#editModal").modal("hide");
              },
              error: function (error) {
                $("#editModal").modal("hide");
                $.toast({
                  title: "Pesan",
                  message: "Gagal mengubah data error " + error,
                  type: "error",
                  duration: 8000,
                });
              },
            });
          });
      } catch (error) {
        console.error("Error in editSelectRows:", error);
      }
    }

    function setModal(sukses, caption) {
      $("#alertModalLabel").text(sukses);
      $("#modalAlertContent").text(caption);
    }

    function sendEditDataToServer(selectedData) {
      $.ajax({
        url: BASEURL + "/data/getDataEdit",
        method: "POST",
        contentType: "application/json",
        data: JSON.stringify({ selectedData: selectedData }),
        success: function (data) {
          $("#partNumberModal").val(data.success.part_number);
          $("#partNameModal").val(data.success.part_name);
          $("#uniqeNoModal").val(data.success.uniqe_no);
          $("#qty").val(data.success.qty);
          $("#sourceType").val(data.success.source_type);
          $("#reason").val(data.success.reason);
          $("#condition").val(data.success.condition);
          $("#repair").val(data.success.repair);
          $("#remarks").val(data.success.remarks);
          $("#statusModal").val(data.success.status_lsr);
          $("#id").val(data.success.id);

          $("#editModal").modal("show");
        },
        error: function (error) {
          console.log("Error:", error);
        },
      });
    }

    //========FITUR APPROVE DATA=======//
    $("#approveSelected").on("click", function () {
      var selectedRows = $(".checkbox-single:checked");
      const user = $("#userLog").text().trim();
      var selectedData = [];
      var invalidData = false;

      selectedRows.each(function () {
        var row = $(this).closest("tr");
        var status = row.find("td:eq(19)").text().trim(); // Mengambil nilai status dari kolom terakhir
        if (status != "Approved By Section") {
          invalidData = true;
        }
        selectedData.push({ id: $(this).val(), user: user });
      });

      if (selectedData.length === 0) {
        $.toast({
          title: "Pesan",
          message: "Pilih setidaknya satu baris untuk accept.",
          type: "warning",
          duration: 8000,
        });
        return;
      }

      if (invalidData) {
        $.toast({
          title: "Pesan",
          message: "Tidak dapat accept baris selain status 'Approved By Section'.",
          type: "warning",
          duration: 8000,
        });
        return;
      }

      $("#confirmationModalApprove").modal("show");

      $("#confirmationModalApprove")
        .off("click", "#confirmApproveBtn")
        .on("click", "#confirmApproveBtn", function () {
          $("#confirmationModalApprove").modal("hide");

          $.ajax({
            url: BASEURL + "/data/getDataApprove",
            method: "POST",
            contentType: "application/json",
            data: JSON.stringify({ selectedData: selectedData }),
            success: function (data) {
              if (data.status === "success") {
                $.toast({
                  title: "Pesan",
                  message: data.message,
                  type: "success",
                  duration: 8000,
                });
                RefreshDataTables();
                $("#editModal").modal("hide");
              } else {
                $.toast({
                  title: "Pesan",
                  message: data.message,
                  type: "error",
                  duration: 8000,
                });
              }
            },
            error: function (error) {
              $.toast({
                title: "Pesan",
                message: "Gagal accept data error." + error,
                type: "error",
                duration: 8000,
              });
            },
          });
        });
    });

    // approve report
    $("#approveReport").on("click", function () {
      var selectedRows = $(".checkbox-single:checked");
      const user = $("#userLog").text().trim();
      var selectedData = [];
      var invalidData = false;
      const statusVal = "Approved By Section";

      selectedRows.each(function () {
        var row = $(this).closest("tr");
        var status = row.find("td:eq(11)").text().trim(); // Ambil nilai status dari kolom terakhir
        if (status === "Uploaded To Ifast") {
          invalidData = true; // Setel flag jika ada status "Uploaded To Ifast"
        }
        selectedData.push({ noLsr: $(this).val(), statusVal: statusVal, user: user });
      });

      if (selectedData.length === 0) {
        $.toast({
          title: "Pesan",
          message: "Pilih setidaknya satu baris untuk approve.",
          type: "warning",
          duration: 8000,
        });
        return;
      }

      if (invalidData) {
        $.toast({
          title: "Pesan",
          message: "Tidak dapat approve baris dengan status 'Uploaded To Ifast'.",
          type: "warning",
          duration: 8000,
        });
        return;
      }

      $("#confirmApproveReport").modal("show");

      $("#confirmApproveReport")
        .off("click", "#approveReportbtn")
        .on("click", "#approveReportbtn", function () {
          $("#confirmApproveReport").modal("hide");
          $.ajax({
            url: BASEURL + "/data/approveReport",
            method: "POST",
            contentType: "application/json",
            data: JSON.stringify({ selectedData: selectedData }),
            success: function (response) {
              if (response.status === "success") {
                $.toast({
                  title: "Pesan",
                  message: response.message,
                  type: "success",
                  duration: 8000,
                });

                const tanggalFrom = $("#tanggal").val();
                const tanggalTo = $("#tanggalTo").val();
                const department = $("#department").val();
                const line = $("#line").val();
                const shift = $("#shift").val();
                const lsrCode = $("#lsrCode").val();
                const status = $("#status").val();
                RefreshTableReport(tanggalFrom, tanggalTo, department, line, shift, lsrCode, status);
              } else {
                $.toast({
                  title: "Pesan",
                  message: response.message,
                  type: "error",
                  duration: 8000,
                });
              }
            },
            error: function (error) {
              console.log(error);
              $.toast({
                title: "Pesan",
                message: "Gagal approve data karena terjadi kesalahan.",
                type: "error",
                duration: 8000,
              });
            },
          });
        });
    });

    // reject report
    $("#rejectReport").on("click", function () {
      var selectedRows = $(".checkbox-single:checked");
      const user = "";
      var selectedData = [];
      var invalidData = false;
      const statusVal = "Rejected By Section";

      selectedRows.each(function () {
        var row = $(this).closest("tr");
        var status = row.find("td:eq(11)").text().trim(); // Mengambil nilai status dari kolom terakhir
        if (status === "Uploaded To Ifast") {
          invalidData = true; // Set flag jika ada status "Uploaded To Ifast"
        }
        selectedData.push({ noLsr: $(this).val(), statusVal: statusVal, user: user });
      });
      if (selectedData.length === 0) {
        $.toast({
          title: "Pesan",
          message: "Pilih setidaknya satu baris untuk reject.",
          type: "warning",
          duration: 8000,
        });
        return;
      }

      if (invalidData) {
        $.toast({
          title: "Pesan",
          message: "Tidak dapat reject baris dengan status 'Uploaded To Ifast'.",
          type: "warning",
          duration: 8000,
        });
        return;
      }

      $("#confirmRejectReport").modal("show");

      $("#confirmRejectReport")
        .off("click", "#RejectReportbtn")
        .on("click", "#RejectReportbtn", function () {
          $("#confirmRejectReport").modal("hide");

          $.ajax({
            url: BASEURL + "/data/rejectReport",
            method: "POST",
            contentType: "application/json",
            data: JSON.stringify({ selectedData: selectedData }),
            success: function (response) {
              if (response.status === "success") {
                $.toast({
                  title: "Pesan",
                  message: response.message,
                  type: "success",
                  duration: 8000,
                });

                const tanggalFrom = $("#tanggal").val();
                const tanggalTo = $("#tanggalTo").val();
                const department = $("#department").val();
                const line = $("#line").val();
                const shift = $("#shift").val();
                const lsrCode = $("#lsrCode").val();
                const status = $("#status").val();
                RefreshTableReport(tanggalFrom, tanggalTo, department, line, shift, lsrCode, status);
              } else {
                $.toast({
                  title: "Pesan",
                  message: response.message,
                  type: "error",
                  duration: 8000,
                });
              }
            },
            error: function (error) {
              console.log(error);
              $.toast({
                title: "Pesan",
                message: "Gagal reject data error.",
                type: "error",
                duration: 8000,
              });
            },
          });
        });
    });

    // DataTbales untuk halaman Create
    var table2 = $("#tabelData2").DataTable({
      // ordering: false,
      fixedColumns: {
        left: 0,
        right: 1,
      },
      scrollCollapse: true,
      fixedHeader: true,
      scrollX: true,
      scrollY: "50vh",
      autoWidth: true,
      responsive: true,
      dom: "<'row'<'col-12't>>" + "<'row'<'col-9 pt-3'l><'col-3 text-end'i>>" + "<'row'<'col-12 pt-3'p>>",
      lengthMenu: [
        [5, 10, 25, 50, 100, -1],
        [5, 10, 25, 50, 100, "All"],
      ],
      columns: [
        { title: "No" },
        { title: "No LSR" },
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
        { title: "Date" },
        { title: "Time" },
        { title: "Cost Center" },
        { title: "Status" },
        { title: "Action" },
      ],
    });

    table2.buttons().container().appendTo("#tabelData2_wrapper .col-md-6:eq(0)");
  });

  //====VALIDASI UNTUK USER ROLE======//
  $(document).ready(function () {
    const userRoleElement = $("#roleUser");

    // halaman master validasi
    if (userRoleElement.length > 0) {
      const userRole = userRoleElement.val();
      const restrictedPage = BASEURL + "/master";

      if (userRole.toLowerCase() != "admin") {
        if ($(".master-data").length > 0) {
          $(".master-data").empty();
        }
      }

      if (userRole.toLowerCase() === "approver" || userRole.toLowerCase() === "approveqc" || userRole.toLowerCase() === "sight") {
        if ($(".create").length > 0) {
          $(".create").empty();
        }
      }
    }

    if (userRoleElement.length > 0 && $("#approveReport").length > 0) {
      const userRole = userRoleElement.val();
      if (userRole.toLowerCase() != "admin") {
        $("#shift").prop("disabled", true);
        $("#line").prop("disabled", true);
        $("#lsrCode").prop("disabled", true);
        $("#department").prop("disabled", true);
      }
    }

    // fitur di halaman data validasi
    if (userRoleElement.length > 0) {
      const userRole = userRoleElement.val();
      if (userRole.toLowerCase() === "admin") {
        $("#approveReport").prop("disabled", true);
        $("#rejectReport").prop("disabled", true);
      } else if (userRole.toLowerCase() === "approver" || userRole.toLowerCase() === "approveqc") {
        $("#approveReport").prop("disabled", false);
        $("#rejectReport").prop("disabled", false);
        $("#editSelected").prop("disabled", true);
        $("#deleteSelected").prop("disabled", true);
        $("#approveSelected").prop("disabled", true);
      } else {
        $("#editSelected").prop("disabled", true);
        $("#deleteSelected").prop("disabled", true);
        $("#approveSelected").prop("disabled", true);
        $("#approveReport").prop("disabled", true);
        $("#rejectReport").prop("disabled", true);
      }
    }

    roleValidtionPageCreate();
  });

  // item select halaman create validasi
  function roleValidtionPageCreate() {
    const userRoleElement = $("#roleUser");

    if (userRoleElement.length > 0 && $("#submitBtn").length > 0) {
      const userRole = userRoleElement.val();
      if (userRole.toLowerCase() === "public") {
        $("#material").prop("disabled", true);
        $("#shift").prop("disabled", true);
        $("#line").prop("disabled", true);
        $("#lineCode").prop("disabled", true);
        $("#costCenter").prop("disabled", true);
      } else if (userRole.toLowerCase() === "common") {
        $("#shift").prop("disabled", true);
        $("#line").prop("disabled", true);
        $("#lineCode").prop("disabled", true);
        $("#costCenter").prop("disabled", true);
      }
    }
  }

  //=======SELECT2============//
  $(document).ready(function () {
    // Initialize Select2 on both elements
    $("#partNumber, #partName, #uniqeNo").select2();
    // $("#line, #shift, #material").select2();
  });

  //======= TABLE PAGE MASTER======//
  var typeMaster = $("#typeMaster").text();
  var tableMasterMaterial = $("#tabelMasterMaterial").DataTable({
    // ordering: false,
    fixedColumns: {
      left: 1,
    },
    scrollCollapse: true,
    fixedHeader: true,
    scrollX: true,
    scrollY: "50vh",
    autoWidth: false,
    responsive: false,
    // columns: [null, null, null, null, null, null, null, { width: "20%" }, null, null, null, null],
    buttons: [
      {
        text: '<i class="bi bi-plus-circle-dotted"></i> Add New',
        className: "btn-sm btn-primary",
        attr: { id: "addMasterMaterial", "data-toggle": "modal", "data-target": "#addMasterMaterialModal" },
      },
      {
        extend: "excelHtml5",
        text: '<i class="bi bi-download"></i> Excel',
        className: "btn-sm btn-success",
        title: "Master Data " + typeMaster,
      },
    ],
    initComplete: function () {
      var btns = $(".dt-buttons");
      var btnsAdd = $("#addMasterMaterial");
      btns.removeClass("btn-group");
      btnsAdd.removeClass("btn-secondary");
    },
    dom: "<'row'<'col-6'B><'col-6'f>>" + "<'row'<'col-12't>>" + "<'row'<'col-9 pt-3'l><'col-3 text-end'i>>" + "<'row'<'col-12 pt-3'p>>",
    lengthMenu: [
      [10, 25, 50, 100, 500, -1],
      [10, 25, 50, 100, 500, "All"],
    ],
    columns: [
      { title: "Action", width: "100px" },
      { title: "Part Number", width: "100px" },
      { title: "Part Name", width: "100px" },
      { title: "Unique No", width: "100px" },
      { title: "Unit Usage", width: "100px" },
      { title: "Source Type", width: "100px" },
      { title: "Material", width: "100px" },
      { title: "Price", width: "100px" },
      { title: "Created Date", width: "100px" },
      { title: "Created By", width: "100px" },
      { title: "Change Date", width: "100px" },
      { title: "Change By", width: "100px" },
    ],
  });
  // Mengatur tombol container ke posisi yang sesuai
  tableMasterMaterial.buttons().container().appendTo("#tabelMasterMaterial_wrapper .col-md-6:eq(0)");

  // master cost center
  var tableMasterCostCenter = $("#tabelMasterCostCenter").DataTable({
    // ordering: false,
    fixedColumns: {
      left: 1,
    },
    scrollCollapse: true,
    fixedHeader: true,
    scrollX: true,
    scrollY: "50vh",
    autoWidth: false,
    responsive: false,
    // columns: [null, null, null, null, null, null, null, { width: "20%" }, null, null, null, null],
    buttons: [
      {
        text: '<i class="bi bi-plus-circle-dotted"></i> Add New',
        className: "btn-sm btn-primary",
        attr: { id: "addMasterCC", "data-toggle": "modal", "data-target": "#addMasterCCModal" },
      },
      {
        extend: "excelHtml5",
        text: '<i class="bi bi-download"></i> Excel',
        className: "btn-sm btn-success",
        title: "Master Data " + typeMaster,
      },
    ],
    initComplete: function () {
      var btns = $(".dt-buttons");
      var btnsAdd = $("#addMasterCC");
      btns.removeClass("btn-group");
      btnsAdd.removeClass("btn-secondary");
    },
    dom: "<'row'<'col-6'B><'col-6'f>>" + "<'row'<'col-12't>>" + "<'row'<'col-9 pt-3'l><'col-3 text-end'i>>" + "<'row'<'col-12 pt-3'p>>",
    lengthMenu: [
      [10, 25, 50, 100, 500, -1],
      [10, 25, 50, 100, 500, "All"],
    ],
    columns: [
      { title: "Action", width: "100px" },
      { title: "Department", width: "100px" },
      { title: "Line", width: "100px" },
      { title: "Line Code", width: "100px" },
      { title: "Cost Center", width: "100px" },
      { title: "Material", width: "100px" },
      { title: "Picture", width: "100px" },
      { title: "Category", width: "100px" },
      { title: "Created Date", width: "100px" },
      { title: "Created By", width: "100px" },
      { title: "Change Date", width: "100px" },
      { title: "Change By", width: "100px" },
    ],
    columnDefs: [
      {
        targets: [0, 1, 2, 3, 4, 5, 6, 7],
        className: "text-center",
      },
    ],
  });
  // Mengatur tombol container ke posisi yang sesuai
  tableMasterCostCenter.buttons().container().appendTo("#tabelMasterCostCenter_wrapper .col-md-6:eq(0)");

  // master cost center
  var tableMasterUser = $("#tabelMasterUser").DataTable({
    // ordering: false,
    fixedColumns: {
      left: 1,
    },
    scrollCollapse: true,
    fixedHeader: true,
    scrollX: true,
    scrollY: "50vh",
    autoWidth: false,
    responsive: false,
    // columns: [null, null, null, null, null, null, null, { width: "20%" }, null, null, null, null],
    buttons: [
      {
        text: '<i class="bi bi-plus-circle-dotted"></i> Add New',
        className: "btn-sm btn-primary",
        attr: { id: "addMasterUser", "data-toggle": "modal", "data-target": "#addMasterUserModal" },
      },
      {
        extend: "excelHtml5",
        text: '<i class="bi bi-download"></i> Excel',
        className: "btn-sm btn-success",
        title: "Master Data " + typeMaster,
      },
    ],
    initComplete: function () {
      var btns = $(".dt-buttons");
      var btnsAdd = $("#addMasterUser");
      btns.removeClass("btn-group");
      btnsAdd.removeClass("btn-secondary");
    },
    dom: "<'row'<'col-6'B><'col-6'f>>" + "<'row'<'col-12't>>" + "<'row'<'col-9 pt-3'l><'col-3 text-end'i>>" + "<'row'<'col-12 pt-3'p>>",
    lengthMenu: [
      [10, 25, 50, 100, 500, -1],
      [10, 25, 50, 100, 500, "All"],
    ],
    columns: [
      { title: "Action", width: "100px" },
      { title: "Profile", width: "100px" },
      { title: "Signature", width: "100px" },
      { title: "Username", width: "100px" },
      { title: "Password", width: "100px" },
      { title: "Nama", width: "100px" },
      { title: "Department", width: "100px" },
      { title: "Line", width: "100px" },
      { title: "Shift", width: "100px" },
      { title: "Position", width: "100px" },
      { title: "Role", width: "100px" },
      { title: "Category", width: "100px" },
      { title: "Created Date", width: "100px" },
      { title: "Created By", width: "100px" },
      { title: "Change Date", width: "100px" },
      { title: "Change By", width: "100px" },
    ],
    columnDefs: [
      {
        targets: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
        className: "text-center",
      },
    ],
  });
  // Mengatur tombol container ke posisi yang sesuai
  tableMasterUser.buttons().container().appendTo("#tabelMasterUser_wrapper .col-md-6:eq(0)");

  // ====FUNGSI EDIT TABEL MASTER============//
  $(document).on("click", "#editMasterMaterial", function () {
    var id = $(this).data("id");
    var row = $(this).closest("tr");

    // Tangkap data dari baris
    var partNumber = row.find("td:eq(1)").text();
    var partName = row.find("td:eq(2)").text();
    var uniqueNo = row.find("td:eq(3)").text();
    var unitUsage = row.find("td:eq(4)").text();
    var sourceType = row.find("td:eq(5)").text();
    var material = row.find("td:eq(6)").text();
    var price = row.find("td:eq(7)").text();

    // Bersihkan harga untuk membuatnya menjadi nilai numerik
    var numericPrice = price.replace("RP. ", "").replace(/\./g, "").replace(",", ".").replace(".", "").replace(/00$/, "");

    // Isi bidang input modal dengan data yang ditangkap
    $("#partNumberModalEdit").val(partNumber);
    $("#partNameModalEdit").val(partName);
    $("#uniqueNoModal").val(uniqueNo);
    $("#unitUsageModal").val(unitUsage);
    $("#sourceTypeModalEdit").val(sourceType);
    $("#materialModalEdit").val(material);
    $("#editPrice").val(numericPrice);
    $("#idMaterialMaster").val(id);

    // Tampilkan modal
    $("#editMasterMaterialModal").modal("show");
  });

  // ==tabel master cost center==//
  $(document).on("click", "#editMasterCC", function () {
    var id = $(this).data("id");
    var row = $(this).closest("tr");

    // Tangkap data dari baris
    var departmentEdit = row.find("td:eq(1)").text();
    var lineEdit = row.find("td:eq(2)").text();
    var lineCodeEdit = row.find("td:eq(3)").text();
    var costCenterEdit = row.find("td:eq(4)").text();
    var materialEdit = row.find("td:eq(5)").text();
    var imageSrc = row.find("td:eq(6) img").attr("src");
    var categoryEdit = row.find("td:eq(7)").text();

    // Isi bidang input modal dengan data yang ditangkap
    $("#departmentEdit").val(departmentEdit);
    $("#lineEdit").val(lineEdit);
    $("#lineCodeEdit").val(lineCodeEdit);
    $("#costCenterEdit").val(costCenterEdit);
    $("#materialEdit").val(materialEdit);
    $("#materialEdit").val(materialEdit);
    $("#categoryEdit").val(categoryEdit);
    $("#lineImagePreview").attr("src", imageSrc);
    $("#idCCMaster").val(id);

    // Tampilkan modal
    $("#editCostCenterModal").modal("show");
  });

  $(document).on("click", "#editMasterUser", function () {
    var row = $(this).closest("tr");

    // Tangkap data dari baris
    var profileSrc = row.find("td:eq(1) img").attr("src");
    var signSrc = row.find("td:eq(2) img").attr("src");
    var username = row.find("td:eq(3)").text();
    var password = row.find("td:eq(4)").text();
    var nama = row.find("td:eq(5)").text();
    var department = row.find("td:eq(6)").text();
    var line = row.find("td:eq(7)").text();
    var shift = row.find("td:eq(8)").text();
    var position = row.find("td:eq(9)").text();
    var role = row.find("td:eq(10)").text();
    var category = row.find("td:eq(11)").text();

    // Isi bidang input modal dengan data yang ditangkap
    $("#profilePreviewEdit").attr("src", profileSrc);
    $("#signPreviewEdit").attr("src", signSrc);
    $("#usernameEdit").val(username);
    $("#passwordEdit").val(password);
    $("#namaEdit").val(nama);
    $("#departmentEdit").val(department);
    $("#lineUserEdit").val(line);
    $("#shiftEdit").val(shift);
    $("#positionEdit").val(position);
    $("#roleEdit").val(role);
    $("#categoryUserEdit").val(category);

    // Tampilkan modal
    $("#editCostCenterModal").modal("show");
  });

  //fungsi preview picture line
  function handleImagePreview(inputSelector, imgSelector) {
    $(inputSelector).on("change", function () {
      var input = this;
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $(imgSelector).attr("src", e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
      }
    });
  }

  handleImagePreview("#pictureLine", "#lineImagePreview");
  handleImagePreview("#pictureLineCC", "#lineImagePreviewCC");
  handleImagePreview("#profilePicture", "#profilePreview");
  handleImagePreview("#signPicture", "#signPreview");
  handleImagePreview("#profilePictureEdit", "#profilePreviewEdit");
  handleImagePreview("#signPictureEdit", "#signPreviewEdit");

  //======FUNGSI ADD DATA TABEL MASTER=======//
  $(document).on("click", "#addMasterMaterial", function () {
    $("#addMasterMaterialModal").modal("show");
  });

  $(document).on("click", "#addMasterCC", function () {
    $("#addMasterCCModal").modal("show");
  });

  $(document).on("click", "#addMasterUser", function () {
    $("#addMasterUserModal").modal("show");
  });

  //======FUNGSI DELETE DATA TABEL MASTER=======//
  $(document).on("click", "[id^=deleteMaster]", function () {
    const id = $(this).data("id");
    const row = $(this).closest("tr");
    let data = { id: id };
    let url = "";
    let refreshFunction = null;

    switch (this.id) {
      case "deleteMasterMaterial":
        data.partNumber = row.find("td:eq(1)").text();
        url = BASEURL + "/master/masterMaterialDelete";
        refreshFunction = RefreshDataMasterMaterial;
        break;
      case "deleteMasterCC":
        data.lineCC = row.find("td:eq(2)").text();
        url = BASEURL + "/master/masterCCDelete";
        refreshFunction = RefreshDataMasterCostCenter;
        break;
      case "deleteMasterUser":
        data.username = row.find("td:eq(3)").text();
        url = BASEURL + "/master/masterUserDelete";
        refreshFunction = RefreshDataMasterUser;
        break;
      default:
        console.log("Unrecognized delete action");
        return;
    }

    $.ajax({
      url: url,
      method: "POST",
      data: data,
      dataType: "json",
      success: function (response) {
        if (response.status === "success") {
          $.toast({
            title: "Pesan",
            message: response.message,
            type: "success",
            duration: 8000,
          });
          if (refreshFunction) refreshFunction();
        } else {
          $.toast({
            title: "Pesan",
            message: response.message,
            type: "error",
            duration: 8000,
          });
        }
      },
      error: function (error) {
        $.toast({
          title: "Pesan",
          message: "Gagal menghapus data.",
          type: "error",
          duration: 8000,
        });
        console.log("Error:", error);
      },
    });
  });

  //==== FUNGSI NOTIFICATION======//
  function refreshNotif() {
    // $("#viewAllLink").attr("href", BASEURL + "/data/report");
    const id = $("#userLog").data("id");
    $.ajax({
      url: BASEURL + "/create/getUbahSelectedLine",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (response) {
        const line = response.line_user;
        let shift = response.shift_user;
        const lsrCode = response.category;
        const department = response.department;
        const status = "Waiting Approved";

        if (shift === "NonShift") {
          shift = "All";
        }
        $.ajax({
          url: BASEURL + "/data/getDataReport",
          method: "POST",
          data: {
            shift: shift,
            lsrCode: lsrCode,
            status: status,
            line: line,
            department: department,
          },
          dataType: "json",
          success: function (data) {
            const unapprovedReports = data.length;
            if (unapprovedReports != 0) {
              $("#viewAllLink").show();
              $("#notifCount").text(unapprovedReports);
              $("#notifNumber").text(unapprovedReports);
              $("#notifText").text(" report belum approve");
            } else {
              $("#viewAllLink").hide();
              $("#notifText").text("Tidak ada notifikasi");
              $("#notifCount").text("");
              $("#notifNumber").text("");
            }
          },
        });
      },
      error: function (error) {
        console.log("Error:", error);
      },
    });
  }
  setInterval(function () {
    refreshNotif();
  }, 3000);

  // FUNGSI UNTUK HALAMAN DATA REPORT
  function RefreshTableReport(tanggalFrom, tanggalTo, department, line, shift, lsrCode, status) {
    // Mengirim permintaan AJAX
    $.ajax({
      url: BASEURL + "/data/getTableReport",
      method: "POST",
      data: {
        tanggalFrom: tanggalFrom,
        tanggalTo: tanggalTo,
        department: department,
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
              `<a href="${BASEURL}/eform?no_lsr=${data[i].no_lsr}" target="_blank" class="link-dark" data-id="${data[i].id}">
            <button type="button" class="btn btn-outline-dark fw-bold">View</button></a>`,
              data[i].department,
              data[i].line_lsr,
              data[i].cost_center,
              data[i].shift,
              data[i].user_lsr,
              data[i].tanggal,
              data[i].waktu,
              data[i].approved_by,
              data[i].received_by,
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

  function RefreshTableReportByUrl(tanggalFrom, tanggalTo, department, line, shift, lsrCode, status) {
    $.ajax({
      url: BASEURL + "/data/getDataReport",
      method: "POST",
      data: {
        tanggalFrom: tanggalFrom,
        tanggalTo: tanggalTo,
        department: department,
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
              `<a href="${BASEURL}/eform?no_lsr=${data[i].no_lsr}" target="_blank" class="link-dark" data-id="${data[i].id}">
            <button type="button" class="btn btn-outline-dark fw-bold">View</button></a>`,
              data[i].department,
              data[i].line_lsr,
              data[i].cost_center,
              data[i].shift,
              data[i].user_lsr,
              data[i].tanggal,
              data[i].waktu,
              data[i].approved_by,
              data[i].received_by,
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

  // get data by url untuk report
  $(document).ready(function () {
    // Mendapatkan nilai dari query string URL
    const urlParams = new URLSearchParams(window.location.search);
    const tanggalFrom = urlParams.get("tanggalFrom");
    const tanggalTo = urlParams.get("tanggalTo");
    const department = urlParams.get("department");
    const line = urlParams.get("line");
    const shift = urlParams.get("shift");
    const lsrCode = urlParams.get("lsrCode");
    const status = urlParams.get("status");
    // Periksa apakah setidaknya satu nilai dari query string URL ada
    if (tanggalFrom || tanggalTo || department || line || shift || lsrCode || status) {
      RefreshTableReportByUrl(tanggalFrom, tanggalTo, department, line, shift, lsrCode, status);
      $("#tanggal").val(tanggalFrom);
      $("#tanggalTo").val(tanggalTo);
      $("#department").val(department);
      $("#line").val(line);
      $("#shift").val(shift);
      $("#lsrCode").val(lsrCode);
      $("#status").val(status);
    }
  });

  // untuk toggle sidebar menggunakan browser type lama
  // $(document).ready(function () {
  //   $("#expand").click(function () {
  //     $("#forms-nav").toggleClass("show");
  //   });
  // });
});
