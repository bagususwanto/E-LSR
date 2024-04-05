$(function () {
  $(document).ready(function () {
    // Chart Bar
    var chartBar = document.getElementById("chartBar");
    var initBar = echarts.init(chartBar);
    var optionBar;
    var tahun = "24";

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
          data: [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sept",
            "Oct",
            "Nov",
            "Dec'" + tahun,
          ],
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
          data: [320, 332, 301, 334, 390, 330, 320],
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
          data: [220, 182, 191, 234, 290, 330, 310],
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
          data: [150, 232, 201, 154, 190, 330, 410],
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
          data: [62, 82, 91, 84, 109, 110, 120],
        },
      ],
    };

    optionBar && initBar.setOption(optionBar);

    // Chart Pie
    var chartPie = document.getElementById("chartPie");
    var initPie = echarts.init(chartPie);
    var optionsPie = {
      tooltip: {
        trigger: "item",
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
          data: [
            { value: 1048, name: "Assembly" },
            { value: 735, name: "Machining" },
            { value: 580, name: "Casting" },
            { value: 484, name: "Others" },
          ],
        },
      ],
    };
    optionsPie && initPie.setOption(optionsPie);
    // updateAllData();
  });
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
