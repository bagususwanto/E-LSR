$(function () {
  $("#partNumber").on("change", function () {
    const id = $(this).find(":selected").data("id");
    $.ajax({
      url: "http://localhost/e-lsr/public/create/getUbahSelectedMat",
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
      url: "http://localhost/e-lsr/public/create/getUbahSelectedMat",
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
      url: "http://localhost/e-lsr/public/create/getUbahSelectedMat",
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
      url: "http://localhost/e-lsr/public/create/getUbahSelectedMat",
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

  $(document).ready(function () {
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
  });
});

// $("#partName").val(data.part_name);
// $("#partNumber").val(data.part_number);
// $("#uniqeNo").val(data.uniqe_no);
// $("#sourceType").val(data.source_type);
