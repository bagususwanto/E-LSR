$(function () {
  function fetchData(year, month) {
    $.ajax({
      url: BASEURL + "/home/getDataHome",
      method: "post",
      data: {
        year: year,
        month: month,
      },
      dataType: "json",
      success: function (response) {
        var qtyK = 0;
        var costK = 0;
        var qtyM = 0;
        var costM = 0;
        var qtyC = 0;
        var costC = 0;
        var qtyX = 0;
        var costX = 0;

        var seriesDataBar = {
          Jan: [0, 0, 0, 0],
          Feb: [0, 0, 0, 0],
          Mar: [0, 0, 0, 0],
          Apr: [0, 0, 0, 0],
          May: [0, 0, 0, 0],
          Jun: [0, 0, 0, 0],
          Jul: [0, 0, 0, 0],
          Aug: [0, 0, 0, 0],
          Sept: [0, 0, 0, 0],
          Oct: [0, 0, 0, 0],
          Nov: [0, 0, 0, 0],
          Dec: [0, 0, 0, 0],
        };
        response.forEach(function (item) {
          var dateString = item.tanggal;
          var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"];
          var month = monthNames[new Date(dateString).getMonth()];

          var line = item.line_lsr;
          var qty = parseInt(item.qty);
          var totalPrice = parseFloat(item.total_price);

          switch (line) {
            case "Main Line":
            case "Sub Line":
              qtyK += qty;
              costK += totalPrice;
              seriesDataBar[month][0] += qty;
              break;
            case "Cylinder Block":
            case "Crankshaft":
            case "Cylinder Head":
            case "Camshaft":
              qtyM += qty;
              costM += totalPrice;
              seriesDataBar[month][1] += qty;
              break;
            case "Die Casting":
              qtyC += qty;
              costC += totalPrice;
              seriesDataBar[month][2] += qty;
              break;
            default:
              qtyX += qty;
              costX += totalPrice;
              seriesDataBar[month][3] += qty;
          }
        });

        // CHART BAR
        var chartBar = document.getElementById("chartBar");
        var initBar = echarts.init(chartBar);
        var optionBar;

        optionBar = {
          tooltip: {
            trigger: "axis",
            axisPointer: {
              type: "shadow",
            },
          },
          legend: {},
          grid: {
            left: "3%",
            right: "4%",
            bottom: "3%",
            containLabel: true,
          },
          xAxis: [
            {
              type: "category",
              data: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"],
            },
          ],
          yAxis: [
            {
              type: "value",
            },
          ],
          series: [
            {
              label: {
                show: true,
                formatter: "{c}",
                position: "inside",
                fontWeight: "bold",
                color: "white",
              },
              name: "Assembly",
              type: "bar",
              stack: "qty",
              emphasis: {
                focus: "series",
              },
              data: [],
            },
            {
              label: {
                show: true,
                formatter: "{c}",
                position: "inside",
                fontWeight: "bold",
                color: "white",
              },
              label: {
                show: true,
                formatter: "{c}",
                position: "inside",
                fontWeight: "bold",
                color: "white",
              },
              name: "Machining",
              type: "bar",
              stack: "qty",
              emphasis: {
                focus: "series",
              },
              data: [],
            },
            {
              label: {
                show: true,
                formatter: "{c}",
                position: "inside",
                fontWeight: "bold",
                color: "white",
              },
              name: "Casting",
              type: "bar",
              stack: "qty",
              emphasis: {
                focus: "series",
              },
              data: [],
            },
            {
              label: {
                show: true,
                formatter: "{c}",
                position: "inside",
                fontWeight: "bold",
                color: "white",
              },
              name: "Others",
              type: "bar",
              stack: "qty",
              emphasis: {
                focus: "series",
              },
              data: [],
            },
          ],
        };

        optionBar.series.forEach(function (series, index) {
          series.data = Object.keys(seriesDataBar).map(function (month) {
            var value = seriesDataBar[month][index];
            return value !== 0 ? value : null;
          });
        });

        initBar.setOption(optionBar);

        // CHART PIE
        var seriesDataPie = [
          { value: costK, name: "Assembly" },
          { value: costM, name: "Machining" },
          { value: costC, name: "Casting" },
          { value: costX, name: "Others" },
        ];

        var chartPie = document.getElementById("chartPie");
        var initPie = echarts.init(chartPie);
        var optionsPie = {
          tooltip: {
            trigger: "item",
            formatter: function (params) {
              return params.seriesName + "<br/>" + params.marker + params.name + ": " + formatCurrency(params.value);
            },
          },
          legend: {
            top: "5%",
            left: "center",
          },
          series: [
            {
              name: "Cost",
              type: "pie",
              radius: ["30%", "80%"],
              avoidLabelOverlap: false,
              label: {
                show: true,
                formatter: "{d}%",
                position: "inside",
                fontWeight: "bold",
                color: "white",
              },
              emphasis: {
                label: {
                  show: true,
                  fontSize: 20,
                  fontWeight: "bold",
                },
              },
              labelLine: {
                show: false,
              },
              data: seriesDataPie,
            },
          ],
        };
        optionsPie && initPie.setOption(optionsPie);

        $("#qtyK").text(qtyK);
        $("#costK").text(formatCurrency(costK));
        $("#qtyM").text(qtyM);
        $("#costM").text(formatCurrency(costM));
        $("#qtyC").text(qtyC);
        $("#costC").text(formatCurrency(costC));
        $("#qtyX").text(qtyX);
        $("#costX").text(formatCurrency(costX));

        $("#qtyK2").text(qtyK);
        $("#costK2").text(formatCurrency(costK));

        // EVENT KLIK MENU DASHBOARD DETAIL
        var reponseData = {};
        var reponseData2 = {};
        response.forEach(function (item) {
          var lineLsr = item.line_lsr;
          var partNumber = item.part_number;
          var partName = item.part_name;
          var qty = parseInt(item.qty);
          var totalCost = parseFloat(item.total_price);

          if (reponseData[lineLsr]) {
            reponseData[lineLsr].qty += qty;
            reponseData[lineLsr].totalCost += totalCost;
          } else {
            reponseData[lineLsr] = {
              qty: qty,
              totalCost: totalCost,
            };
          }

          if (reponseData2[lineLsr]) {
            // Cari apakah partNumber sudah ada dalam array
            var existingData = reponseData2[lineLsr].find(function (data) {
              return data.partNumber === partNumber;
            });

            if (existingData) {
              // Jika partNumber sudah ada, tambahkan qty dan totalCost
              existingData.qty += qty;
              existingData.totalCost += totalCost;
            } else {
              // Jika partNumber belum ada, tambahkan data baru ke array
              reponseData2[lineLsr].push({
                partNumber: partNumber,
                partName: partName,
                qty: qty,
                totalCost: totalCost,
                lineLsr: lineLsr,
              });
            }
          } else {
            // Jika belum ada, inisialisasi array baru untuk lineLsr tersebut
            reponseData2[lineLsr] = [
              {
                partNumber: partNumber,
                partName: partName,
                qty: qty,
                totalCost: totalCost,
                lineLsr: lineLsr,
              },
            ];
          }
        });

        // Urutkan data berdasarkan totalCost terbanyak
        Object.keys(reponseData2).forEach(function (lineLsr) {
          reponseData2[lineLsr].sort(function (a, b) {
            return b.totalCost - a.totalCost;
          });
        });

        var title, imageSource, cardClass;

        switch (getCardType()) {
          case "assemblyCard":
            title = ["Main Line", "Sub Line"];
            imageSource = [BASEURL + "/img/assembly.gif", BASEURL + "/img/assembly.gif"];
            cardClass = "sales-card";
            break;
          case "machiningCard":
            title = ["Crankshaft", "Cylinder Block", "Cylinder Head", "Camshaft"];
            imageSource = [
              BASEURL + "/img/Crankshaft.gif",
              BASEURL + "/img/Cylinder Block.gif",
              BASEURL + "/img/Cylinder Head.gif",
              BASEURL + "/img/Camshaft.gif",
            ];
            cardClass = "revenue-card";
            break;

          case "castingCard":
            title = ["Die Casting", "Low Pressure"];
            imageSource = [BASEURL + "/img/casting.gif", BASEURL + "/img/Cylinder Head.gif"];
            cardClass = "customers-card";
            break;
          case "othersCard":
            title = [
              "Quality",
              "Logistic Operational",
              "Maintenance",
              "Engser",
              "Technical Support",
              "Engser Casting",
              "Maintenance DC",
              "CCR & Ordering",
            ];
            imageSource = [
              BASEURL + "/img/others.png",
              BASEURL + "/img/others.png",
              BASEURL + "/img/others.png",
              BASEURL + "/img/others.png",
              BASEURL + "/img/others.png",
              BASEURL + "/img/others.png",
              BASEURL + "/img/others.png",
              BASEURL + "/img/others.png",
            ];
            cardClass = "others-card";
            break;
          default:
            // console.log("Card type not recognized.");
            return;
        }

        var cardContainer = $(".card-container");
        cardContainer.empty(); // Menghapus konten sebelumnya (jika ada)

        for (var i = 0; i < title.length; i++) {
          if (reponseData2[title[i]] && reponseData2[title[i]].length > 0) {
            var cardHTML = `
              <div class="col-xxl-12 col-md-12" id="cardBottom">
                  <div class="card amount-card ${cardClass}">
                      <div class="card-body row">
                          <div class="col-lg-3">
                              <h5 class="card-title">${title[i]} <span>| Amount </span></h5>
                              <div class="d-flex align-items-center">
                                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                      <img src="${imageSource[i]}" alt="${title[i]}" width="50px" height="auto">
                                  </div>
                                  <div class="ps-3">
                                      <h6 id="qty${i}">${reponseData[title[i]] ? reponseData[title[i]].qty : 0}</h6>
                                      <span id="cost${i}" class="text-success small pt-1 fw-bold">${
              reponseData[title[i]] ? formatCurrency(reponseData[title[i]].totalCost) : "RP. 0.00"
            }</span>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-8">
                              <h5 class="card-title text-center">Top 5 Transaction</h5>
                              <table class="table table-borderless text-center table-responsive">
                                  <thead>
                                      <tr class="fw-bold">
                                          <th scope="col">#</th>
                                          <th scope="col">Part Number</th>
                                          <th scope="col">Part Name</th>
                                          <th scope="col">Qty</th>
                                          <th scope="col">Cost</th>
                                      </tr>
                                  </thead>
                                  <tbody>
          `;

            // Menambahkan baris-baris data ke dalam tabel dengan batasan maksimum 5 baris
            var rowCount = 0;
            if (reponseData2[title[i]]) {
              reponseData2[title[i]].forEach(function (item, index) {
                if (rowCount < 5) {
                  cardHTML += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${item.partNumber}</td>
                        <td>${item.partName}</td>
                        <td class="fw-bold">${item.qty}</td>
                        <td class="text-success fw-bold">${formatCurrency(item.totalCost)}</td>
                    </tr>
                `;
                  rowCount++;
                }
              });
            }

            cardHTML += `
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    `;

            cardContainer.append(cardHTML); // Menambahkan kartu ke dalam container
          }
        }
      },
      error: function (error) {
        console.error("Error:", error);
      },
    });
  }

  function formatCurrency(amount) {
    return "RP. " + amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
  }

  $(document).ready(function () {
    // get year untuk button
    $.ajax({
      url: BASEURL + "/home/getDataYear",
      method: "post",
      data: {},
      dataType: "json",
      success: function (response) {
        response.sort(function (a, b) {
          return a.year - b.year;
        });
        $.each(response, function (index, data) {
          var dataYear = data.year;

          var button = $("<button>", {
            class: "btn btn-outline-primary btn-year me-1",
            text: dataYear,
          });

          if (dataYear == new Date().getFullYear()) {
            button.addClass("active");
          }

          $("#yearButton").append(button);
        });
      },
    });

    var currentYear = [new Date().getFullYear()];
    fetchData(currentYear, []);
  });

  $(document).on("click", ".btn-year", function () {
    $(this).toggleClass("active");
    var years = $(".btn-year.me-1.active")
      .map(function () {
        return $(this).text();
      })
      .get();
    var months = $(".btn-month.active")
      .map(function () {
        return $(this).data("month");
      })
      .get();
    fetchData(years, months);
  });

  $(".btn-month").click(function () {
    $(this).toggleClass("active");
    var years = $(".btn-year.me-1.active")
      .map(function () {
        return $(this).text();
      })
      .get();
    var months = $(".btn-month.active")
      .map(function () {
        return $(this).data("month");
      })
      .get();
    fetchData(years, months);
  });

  // Set text for year buttons
  var currentYear = new Date().getFullYear();
  $("#lastYear").text(currentYear - 1);
  $("#currentYear").text(currentYear);

  function getActiveYears() {
    return $(".btn-year.me-1.active")
      .map(function () {
        return $(this).text();
      })
      .get();
  }

  function getActiveMonths() {
    return $(".btn-month.active")
      .map(function () {
        return $(this).data("month");
      })
      .get();
  }

  function getCardType() {
    return clickedCardID;
  }

  setInterval(function () {
    fetchData(getActiveYears(), getActiveMonths());
  }, 60000);

  var clickedCardID = "";

  $(".info-card").click(function () {
    clickedCardID = $(this).attr("id");
    fetchData(getActiveYears(), getActiveMonths());
    var cardContainer = $(".card-container");
    cardContainer.show(function () {
      $("#cardBottom")[0].scrollIntoView();
    });
  });
  $(document).ready(function () {});

  // //==== ISI CARD DASHBOARD ======//
  // function updateAllData() {
  //   function updateCardTitle(lineType, filter) {
  //     let titleText = "This Year";
  //     if (filter === "today") {
  //       titleText = "Today";
  //     } else if (filter === "thisMonth") {
  //       titleText = "This Month";
  //     }
  //     $(`#${lineType}Card .card-title span`).text(`| ${titleText}`);
  //   }

  //   function updateMachiningData(filter, data) {
  //     $("#qtyM").text(data.qtyM);
  //     $("#machiningFilterText").text(`| ${filter}`);
  //     updateCardTitle("machining", filter);
  //   }

  //   function updateCastingData(filter, data) {
  //     $("#qtyC").text(data.qtyC);
  //     $("#castingFilterText").text(`| ${filter}`);
  //     updateCardTitle("casting", filter);
  //   }

  //   function updateAssemblyData(filter, data) {
  //     $("#qtyK").text(data.qtyK);
  //     $("#assemblyFilterText").text(`| ${filter}`);
  //     updateCardTitle("assembly", filter);
  //   }

  //   function updateData(filter, lineType) {
  //     const lineValues = $(`#${lineType}Line`).val();

  //     $.ajax({
  //       url: BASEURL + "/home/getDataCardHome",
  //       data: {
  //         machiningLineValues: lineType === "machining" ? lineValues : "",
  //         castingLineValues: lineType === "casting" ? lineValues : "",
  //         assemblyLineValues: lineType === "assembly" ? lineValues : "",
  //         filter: filter,
  //       },
  //       method: "post",
  //       dataType: "json",
  //       success: function (data) {
  //         switch (lineType) {
  //           case "machining":
  //             updateMachiningData(filter, data);
  //             break;
  //           case "casting":
  //             updateCastingData(filter, data);
  //             break;
  //           case "assembly":
  //             updateAssemblyData(filter, data);
  //             break;
  //         }
  //       },
  //       error: function (error) {
  //         console.log("Error:", error);
  //       },
  //     });
  //   }

  //   function updateFilterText(filter, lineType) {
  //     $(`#${lineType}FilterText`).text(`| ${filter}`);
  //     updateData(filter, lineType);
  //   }

  //   $(".card-filter").on("click", function (event) {
  //     event.preventDefault();
  //     const filter = $(this).data("filter");
  //     const lineType = $(this).closest(".filter").data("line-type");

  //     updateFilterText(filter, lineType);
  //   });

  //   updateFilterText("thisYear", "machining");
  //   updateFilterText("thisYear", "casting");
  //   updateFilterText("thisYear", "assembly");

  //   // LINE CHART
  //   $.ajax({
  //     url: BASEURL + "/home/getDataChart",
  //     method: "GET",
  //     dataType: "json",
  //     success: function (jsonData) {
  //       var seriesData = {
  //         Assembly: [],
  //         Machining: [],
  //         Casting: [],
  //       };

  //       var allDates = new Set();

  //       jsonData.forEach(function (item) {
  //         var materialCategory = getMaterialCategory(item.material);

  //         if (materialCategory) {
  //           var dateObject = new Date(
  //             Date.UTC(item.tahun, item.bulan - 1, item.hari)
  //           );

  //           seriesData[materialCategory].push({
  //             x: dateObject.getTime(),
  //             y: parseInt(item.total_qty),
  //           });

  //           allDates.add(dateObject.getTime());
  //         }
  //       });

  //       var uniqueDates = Array.from(allDates).sort();

  //       var seriesArray = [];
  //       for (var category in seriesData) {
  //         seriesArray.push({
  //           name: category,
  //           data: seriesData[category],
  //         });
  //       }

  //       new ApexCharts(document.querySelector("#reportsChart"), {
  //         series: seriesArray,
  //         chart: {
  //           height: 350,
  //           type: "area",
  //           toolbar: {
  //             show: false,
  //           },
  //         },
  //         markers: {
  //           size: 4,
  //         },
  //         fill: {
  //           type: "gradient",
  //           gradient: {
  //             shadeIntensity: 1,
  //             opacityFrom: 0.3,
  //             opacityTo: 0.4,
  //             stops: [0, 90, 100],
  //           },
  //         },
  //         dataLabels: {
  //           enabled: false,
  //         },
  //         stroke: {
  //           curve: "smooth",
  //           width: 2,
  //         },
  //         xaxis: {
  //           type: "datetime",
  //           categories: uniqueDates,
  //         },
  //         tooltip: {
  //           x: {
  //             format: "dd MMM yyyy",
  //           },
  //         },
  //       }).render();
  //     },
  //     error: function (error) {
  //       console.log(error);
  //     },
  //   });

  //   function getMaterialCategory(material) {
  //     if (
  //       ["Crankshaft", "Cylinder Block", "Cylinder Head", "Camshaft"].includes(
  //         material
  //       )
  //     ) {
  //       return "Machining";
  //     } else if (material === "Die Casting") {
  //       return "Casting";
  //     } else if (material === "Assembly") {
  //       return "Assembly";
  //     }
  //     return null;
  //   }

  //   function getPieMaterialCategory(material) {
  //     if (
  //       ["Crankshaft", "Cylinder Block", "Cylinder Head", "Camshaft"].includes(
  //         material
  //       )
  //     ) {
  //       return "Machining";
  //     } else if (material === "Die Casting") {
  //       return "Casting";
  //     } else if (material === "Assembly") {
  //       return "Assembly";
  //     }
  //     return null;
  //   }

  //   // PIE CHART
  //   $.ajax({
  //     url: BASEURL + "/home/getPieChartData",
  //     method: "GET",
  //     dataType: "json",
  //     success: function (jsonData) {
  //       var pieChartData = {
  //         Assembly: [],
  //         Machining: [],
  //         Casting: [],
  //       };

  //       jsonData.forEach(function (item) {
  //         var pieCategory = getPieMaterialCategory(item.material);

  //         if (pieCategory) {
  //           if (!pieChartData[pieCategory]) {
  //             pieChartData[pieCategory] = 0;
  //           }
  //           pieChartData[pieCategory] += parseInt(item.total_qty);
  //         }
  //       });

  //       var pieChartArray = Object.keys(pieChartData).map(function (key) {
  //         return {
  //           value: pieChartData[key],
  //           name: key,
  //         };
  //       });

  //       echarts.init(document.querySelector("#trafficChart")).setOption({
  //         tooltip: {
  //           trigger: "item",
  //         },
  //         legend: {
  //           top: "5%",
  //           left: "center",
  //         },
  //         series: [
  //           {
  //             name: "Material",
  //             type: "pie",
  //             radius: ["40%", "80%"],
  //             avoidLabelOverlap: false,
  //             label: {
  //               show: false,
  //               position: "center",
  //             },
  //             emphasis: {
  //               label: {
  //                 show: true,
  //                 fontSize: "18",
  //                 fontWeight: "bold",
  //               },
  //             },
  //             labelLine: {
  //               show: false,
  //             },
  //             data: pieChartArray,
  //           },
  //         ],
  //       });
  //     },
  //     error: function (error) {
  //       console.log(error);
  //     },
  //   });
  // }

  // setInterval(updateAllData, 60000);
});
