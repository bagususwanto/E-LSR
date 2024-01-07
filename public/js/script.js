$(function () {
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

  $("#material").on("change", function () {
    const validLineValue2 = $(this).val();
    $.ajax({
      url: BASEURL + "/create/getMasterPart",
      data: { validLineValue2: validLineValue2 },
      method: "post",
      dataType: "json",
      success: function (data) {
        // Mengosongkan dan menambahkan opsi baru ke dalam select
        $("#partNumber").empty();
        $("#partName").empty();
        $("#uniqeNo").empty();
        $("#sourceType").empty();
        for (var i = 0; i < data.length; i++) {
          $("#partNumber").append(
            '<option value="' +
              data[i].part_number +
              '" data-id="' +
              data[i].id +
              '">' +
              data[i].part_number +
              "</option>"
          );
          $("#partName").append(
            '<option value="' +
              data[i].part_name +
              '" data-id="' +
              data[i].id +
              '">' +
              data[i].part_name +
              "</option>"
          );
          $("#uniqeNo").append(
            '<option value="' +
              data[i].uniqe_no +
              '" data-id="' +
              data[i].id +
              '">' +
              data[i].uniqe_no +
              "</option>"
          );
          $("#sourceType").append(
            '<option value="' +
              data[i].source_type +
              '" data-id="' +
              data[i].id +
              '">' +
              data[i].source_type +
              "</option>"
          );
        }
      },
      error: function (error) {
        console.log("Error:", error);
      },
    });
  });

  // Mendapatkan nilai awal dari elemen
  var initialPartName = $("#partName").val();
  var initialpartNumber = $("#partNumber").val();
  var initialuniqeNo = $("#uniqeNo").val();
  var initialsourceType = $("#sourceType").val();

  // Menyimpan nilai awal sebagai data di elemen
  $("#partName").data("initial-value", initialPartName);
  $("#partNumber").data("initial-value", initialpartNumber);
  $("#uniqeNo").data("initial-value", initialuniqeNo);
  $("#sourceType").data("initial-value", initialsourceType);

  $(document).ready(function () {
    //==== ISI NILAI DARI DATE DAN TIME======//
    // Mendapatkan tanggal dan waktu sekarang
    var currentDate = new Date();
    var hours = currentDate.getHours();
    var minutes = currentDate.getMinutes();

    // Mendapatkan tanggal, bulan, dan tahun
    var day = currentDate.getDate();
    var month = currentDate.getMonth() + 1; // Ingat: bulan dimulai dari 0
    var year = currentDate.getFullYear();

    // Mengonversi ke format "yyyy-MM-dd"
    var formattedDate =
      year +
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
    $.ajax({
      url: BASEURL + "/create/getMasterPart",
      data: { validLineValue2: validLineValue2 },
      method: "post",
      dataType: "json",
      success: function (data) {
        // Mengosongkan dan menambahkan opsi baru ke dalam select
        $("#partNumber").empty();
        $("#partName").empty();
        $("#uniqeNo").empty();
        $("#sourceType").empty();
        for (var i = 0; i < data.length; i++) {
          $("#partNumber").append(
            '<option value="' +
              data[i].part_number +
              '" data-id="' +
              data[i].id +
              '">' +
              data[i].part_number +
              "</option>"
          );
          $("#partName").append(
            '<option value="' +
              data[i].part_name +
              '" data-id="' +
              data[i].id +
              '">' +
              data[i].part_name +
              "</option>"
          );
          $("#uniqeNo").append(
            '<option value="' +
              data[i].uniqe_no +
              '" data-id="' +
              data[i].id +
              '">' +
              data[i].uniqe_no +
              "</option>"
          );
          $("#sourceType").append(
            '<option value="' +
              data[i].source_type +
              '" data-id="' +
              data[i].id +
              '">' +
              data[i].source_type +
              "</option>"
          );
        }
      },
      error: function (error) {
        console.log("Error:", error);
      },
    });
  });
});

// $("#partName").val(data.part_name);
// $("#partNumber").val(data.part_number);
// $("#uniqeNo").val(data.uniqe_no);
// $("#sourceType").val(data.source_type);
