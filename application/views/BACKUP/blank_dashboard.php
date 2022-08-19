<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Gapara - Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/start/vendors/feather/feather.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/start/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/start/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/start/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/start/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/start/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/start/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/start/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/start/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url(); ?>assets/img/GAPLOGO1.png" />

  <!-- <script src="<?= base_url(); ?>assets/search/jquery.min.js"></script>
  <script src="<?= base_url(); ?>assets/search/jquery.searcher.js"></script> -->

</head>
<body>
  <div class="container-scroller"> 
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row" style="background-color:#041562;">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start" style="background-color:#041562;">
        <div class="me-3">
          <!-- <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button> -->
        </div>
        <div>
          <a class="navbar-brand" href="#">
            <!-- <img src="<?= base_url(); ?>assets/images/gexim-new-icc.png" style="margin-left: 20px; height:100px; width:250px;" alt="logo" /> -->
          </a>
          <a class="navbar-brand brand-logo-mini" href="#">
            <!-- <img src="<?= base_url(); ?>assets/images/gexim-new-icc.png" style="height:100px; width:200px;" alt="logo" /> -->
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top justify-content-start" style="background-color:#ffcd00;"> 
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h2 class="welcome-text" style="color:#041562;">Welcome, <span class="text-black fw-bold" style="color:#041562;">Gonusa Export & Import</span></h2>
            <h3 class="welcome-sub-text" style="color:#041562;">Your dashboard : NIP </h3>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item d-none d-lg-block">
            <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
              <span class="input-group-addon input-group-prepend border-right">
                <span class="icon-calendar input-group-text calendar-icon"></span>
              </span>
              <input type="text" class="form-control" disabled>
            </div>
          </li>
        
          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        
                            <i class="ti-lock"></i>
              <!-- <img class="img-xs rounded-circle" src="<?= base_url(); ?>assets/images/vip-user.png" height="50px;" alt="Profile image"> </a> -->
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" style="width: 300px; padding:20px; background-color:#ffcd00;" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <img class="img-md rounded-circle" src="<?= base_url(); ?>assets/images/gexim-new-icc.png" style="width:200px;" alt="Profile image">
                <p class="mb-1 mt-3 font-weight-semibold">NAME</p>
                <p class="fw-light text-muted mb-0">NIP</p>
              </div>
              <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile </a>
              <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper" style="background-color:#ffcd00;">
      <!-- partial:partials/_settings-panel.html -->
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color:#ffcd00; width:280px;">
        <ul class="nav">

        <div class="dropdown-header text-center">
              <img class="img-md rounded-circle" src="<?= base_url(); ?>assets/images/gexim-new-icc.png" style="width:210px;" alt="Profile image">
                <p style="margin-left:30px;" class="mb-1 mt-3 font-weight-semibold"><?php echo $this->session->userdata('logged_gapara_in')->gpr_usr_name; ?></p>
                <p style="margin-left:30px;" class="fw-light text-muted mb-0"><?php echo $this->session->userdata('logged_gapara_in')->gpr_usr_nip; ?></p>
        </div>
        
        <br>

        <?php 
        include "mastermenus2.php";
        ?>

        </ul>
      </nav>
      <!-- partial -->

<div class="main-panel">
<div class="content-wrapper">

        <div class="row">
          <div class="col-sm-12">


                    <div class="col-lg-12 d-flex flex-column">
                      <div class="row flex-grow">
                        <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                          <div class="card card-rounded">
                            <div class="card-body">

                              <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                          <h4 class="card-title card-title-dash">Listing Jurnal :   </h4>     
                                          <br>
                                          <label><input id="tablesearchinput" type="text" placeholder="search" class="form-control" /></label>
                                  </div>    
                              </div>

<!-- Table -->
<div class="table-responsive" style="height: 330px;">
                    <table class="table" id="tabledata">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Tanggal</th>
                          <th>NIP</th>
                          <th>Aktivitas</th>
                          <th>Keterangan</th>
                          <th>Photo 01</th>
                          <th>Photo 02</th>
                          <th>Created At</th>
                          <!-- <th>Actions</th> -->
                        </tr>
                      </thead>
                      <tbody>

<!-- <?php
        if( ! empty($ls_jurnal_bycomp)){
          // Jika data pada database tidak sama dengan empty (alias ada datanya)
          $no_urut=1;
          foreach($ls_jurnal_bycomp as $gaa){
          echo "<tr>";
          echo "<td scope='row'>".$no_urut++."</td>";
          echo "<td>".$gaa->gpr_jurnal_date."</td>";
          echo "<td>".$gaa->gpr_jurnal_createdBy."</td>";
          echo "<td>".$gaa->gpr_jurnal_aktivitas."</td>";
          echo "<td>".$gaa->gpr_jurnal_keterangan."</td>";
          echo "<td>".$gaa->gpr_jurnal_photo01."</td>";
          echo "<td>".$gaa->gpr_jurnal_photo02."</td>";
          echo "<td>".$gaa->gpr_jurnal_createdAt."</td>";
        //   echo "<td>".$gaa->gpr_contract_no."</td>";
        //   echo "<td>".$gaa->gpr_contract_client_name."</td>";
        //   echo "<td>".$gaa->gpr_contract_start."</td>";
        //   echo "<td>".$gaa->gpr_contract_end."</td>";
        //   echo "<td>".$gaa->gpr_contract_valuecontr."</td>";
        //   echo "<td>";
        //     if($gaa->gpr_contract_appr==2){
        //       echo "<div class='badge badge-opacity-warning'>On Progress</div>";
        //     }elseif($gaa->gpr_contract_appr==1){
        //       echo "<div class='badge badge-opacity-success'>Approved</div>";
        //     }else{
        //       echo "Reject";
        //     }
        //   echo"</td>";
        //   echo "<td>".$gaa->gpr_contract_updatedAt."</td>";
        //   echo "<td style='text-align:center; font-size:14px;'><a style='font-size:14px;' class='btn btn-sm btn-info shadow-sm' href='".base_url("MasterGroup/Editmastergroup/".$gaa->gpr_contract_id)."'><i class='fa fa-pencil-square-o'></i> Approve</a></td>";
          echo "</tr>";
          }
        }else{ // Jika data tidak ada
          echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
        }
?> -->
                        
                        <!-- <tr>
                          <td>Jacob</td>
                          <td>53275531</td>
                          <td>12 May 2017</td>
                          <td><label class="badge badge-danger">Pending</label></td>
                        </tr> -->
                        
                      </tbody>
                    </table>
                  </div>

<!-- End Table -->
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>


          </div>
      </div>

</div>
</div>


      
      <!-- <?php 
        include "grafik_company.php";
      ?> -->


        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">PT GARDA PAKSI NUSANTARA </span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="<?= base_url(); ?>assets/start/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?= base_url(); ?>assets/search/jquery.min.js"></script>
  <script src="<?= base_url(); ?>assets/search/jquery.searcher.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="<?= base_url(); ?>assets/start/vendors/chart.js/Chart.min.js"></script>
  <script src="<?= base_url(); ?>assets/start/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="<?= base_url(); ?>assets/start/vendors/progressbar.js/progressbar.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?= base_url(); ?>assets/start/js/off-canvas.js"></script>
  <script src="<?= base_url(); ?>assets/start/js/hoverable-collapse.js"></script>
  <script src="<?= base_url(); ?>assets/start/js/template.js"></script>
  <script src="<?= base_url(); ?>assets/start/js/settings.js"></script>
  <script src="<?= base_url(); ?>assets/start/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- <script src="<?= base_url(); ?>assets/start/js/dashboard.js"></script> -->
  <script src="<?= base_url(); ?>assets/start/js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->

  <script>
			$("#tabledata").searcher({
				inputSelector: "#tablesearchinput"
			});
  </script>
  <script>
			$("#tabledata2").searcher({
				inputSelector: "#tablesearchinput2"
			});
  </script>

<script>
$(function() {
    if ($("#performaneLine").length) {
      var graphGradient = document.getElementById("performaneLine").getContext('2d');
      var graphGradient2 = document.getElementById("performaneLine").getContext('2d');
      var saleGradientBg = graphGradient.createLinearGradient(5, 0, 5, 100);
      saleGradientBg.addColorStop(0, 'rgba(26, 115, 232, 0.18)');
      saleGradientBg.addColorStop(1, 'rgba(26, 115, 232, 0.02)');
      var saleGradientBg2 = graphGradient2.createLinearGradient(100, 0, 50, 150);
      saleGradientBg2.addColorStop(0, 'rgba(0, 208, 255, 0.19)');
      saleGradientBg2.addColorStop(1, 'rgba(0, 208, 255, 0.03)');
      var salesTopData = {
          labels: ["SUN","sun", "MON", "mon", "TUE","tue", "WED", "wed", "THU", "thu", "FRI", "fri", "SAT"],
          datasets: [{
              label: 'Active',
              data: [50, 110, 60, 290, 200, 115, 130, 170, 90, 210, 240, 280, 200],
              backgroundColor: saleGradientBg,
              borderColor: [
                  '#1F3BB3',
              ],
              borderWidth: 1.5,
              fill: true, // 3: no fill
              pointBorderWidth: 1,
              pointRadius: [4, 4, 4, 4, 4,4, 4, 4, 4, 4,4, 4, 4],
              pointHoverRadius: [2, 2, 2, 2, 2,2, 2, 2, 2, 2,2, 2, 2],
              pointBackgroundColor: ['#1F3BB3)', '#1F3BB3', '#1F3BB3', '#1F3BB3','#1F3BB3)', '#1F3BB3', '#1F3BB3', '#1F3BB3','#1F3BB3)', '#1F3BB3', '#1F3BB3', '#1F3BB3','#1F3BB3)'],
              pointBorderColor: ['#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff',],
          },{
            label: 'Not Active',
            data: [30, 150, 190, 250, 120, 150, 130, 20, 30, 15, 40, 95, 180],
            backgroundColor: saleGradientBg2,
            borderColor: [
                '#52CDFF',
            ],
            borderWidth: 1.5,
            fill: true, // 3: no fill
            pointBorderWidth: 1,
            pointRadius: [0, 0, 0, 4, 0],
            pointHoverRadius: [0, 0, 0, 2, 0],
            pointBackgroundColor: ['#52CDFF)', '#52CDFF', '#52CDFF', '#52CDFF','#52CDFF)', '#52CDFF', '#52CDFF', '#52CDFF','#52CDFF)', '#52CDFF', '#52CDFF', '#52CDFF','#52CDFF)'],
              pointBorderColor: ['#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff',],
        }]
      };
  
      var salesTopOptions = {
        responsive: true,
        maintainAspectRatio: false,
          scales: {
              yAxes: [{
                  gridLines: {
                      display: true,
                      drawBorder: false,
                      color:"#F0F0F0",
                      zeroLineColor: '#F0F0F0',
                  },
                  ticks: {
                    beginAtZero: false,
                    autoSkip: true,
                    maxTicksLimit: 4,
                    fontSize: 10,
                    color:"#6B778C"
                  }
              }],
              xAxes: [{
                gridLines: {
                    display: false,
                    drawBorder: false,
                },
                ticks: {
                  beginAtZero: false,
                  autoSkip: true,
                  maxTicksLimit: 7,
                  fontSize: 10,
                  color:"#6B778C"
                }
            }],
          },
          legend:false,
          legendCallback: function (chart) {
            var text = [];
            text.push('<div class="chartjs-legend"><ul>');
            for (var i = 0; i < chart.data.datasets.length; i++) {
              console.log(chart.data.datasets[i]); // see what's inside the obj.
              text.push('<li>');
              text.push('<span style="background-color:' + chart.data.datasets[i].borderColor + '">' + '</span>');
              text.push(chart.data.datasets[i].label);
              text.push('</li>');
            }
            text.push('</ul></div>');
            return text.join("");
          },
          
          elements: {
              line: {
                  tension: 0.4,
              }
          },
          tooltips: {
              backgroundColor: 'rgba(31, 59, 179, 1)',
          }
      }
      var salesTop = new Chart(graphGradient, {
          type: 'line',
          data: salesTopData,
          options: salesTopOptions
      });
      document.getElementById('performance-line-legend').innerHTML = salesTop.generateLegend();
    }


    if ($("#doughnutChart").length) {
      var doughnutChartCanvas = $("#doughnutChart").get(0).getContext("2d");
      var doughnutPieData = {
        datasets: [{
          data: [70, 20],
          backgroundColor: [
            "#1F3BB3",
            // "#FDD0C7"
            "#52CDFF"
            // "#81DADA"
          ],
          borderColor: [
            "#1F3BB3",
            // "#FDD0C7"
            "#52CDFF"
            // "#81DADA"
          ],
        }],
  
        // These labels appear in the legend and in the tooltips when hovering different arcs
        labels: [
          'Male',
          'Woman',
          // 'Gross',
          // 'AVG',
        ]
      };
      var doughnutPieOptions = {
        cutoutPercentage: 50,
        animationEasing: "easeOutBounce",
        animateRotate: true,
        animateScale: false,
        responsive: true,
        maintainAspectRatio: true,
        showScale: true,
        legend: false,
        legendCallback: function (chart) {
          var text = [];
          text.push('<div class="chartjs-legend"><ul class="justify-content-center">');
          for (var i = 0; i < chart.data.datasets[0].data.length; i++) {
            text.push('<li><span style="background-color:' + chart.data.datasets[0].backgroundColor[i] + '">');
            text.push('</span>');
            if (chart.data.labels[i]) {
              text.push(chart.data.labels[i]);
            }
            text.push('</li>');
          }
          text.push('</div></ul>');
          return text.join("");
        },
        
        layout: {
          padding: {
            left: 0,
            right: 0,
            top: 0,
            bottom: 0
          }
        },
        tooltips: {
          callbacks: {
            title: function(tooltipItem, data) {
              return data['labels'][tooltipItem[0]['index']];
            },
            label: function(tooltipItem, data) {
              return data['datasets'][0]['data'][tooltipItem['index']];
            }
          },
            
          backgroundColor: '#fff',
          titleFontSize: 14,
          titleFontColor: '#0B0F32',
          bodyFontColor: '#737F8B',
          bodyFontSize: 11,
          displayColors: false
        }
      };
      var doughnutChart = new Chart(doughnutChartCanvas, {
        type: 'doughnut',
        data: doughnutPieData,
        options: doughnutPieOptions
      });
      document.getElementById('doughnut-chart-legend').innerHTML = doughnutChart.generateLegend();
    }

    if ($("#marketingOverview").length) {
      var marketingOverviewChart = document.getElementById("marketingOverview").getContext('2d');
      var marketingOverviewData = {
          labels: ["JAN","FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"],
          datasets: [{
              label: 'Positif',
              data: [110, 220, 200, 190, 220, 110, 210, 110, 205, 202, 201, 150],
              backgroundColor: "#52CDFF",
              borderColor: [
                  '#52CDFF',
              ],
              borderWidth: 0,
              fill: true, // 3: no fill
              
          },{
            label: 'Negatif',
            data: [215, 290, 210, 250, 290, 230, 290, 210, 280, 220, 190, 300],
            backgroundColor: "#1F3BB3",
            borderColor: [
                '#1F3BB3',
            ],
            borderWidth: 0,
            fill: true, // 3: no fill
        }]
      };
  
      var marketingOverviewOptions = {
        responsive: true,
        maintainAspectRatio: false,
          scales: {
              yAxes: [{
                  gridLines: {
                      display: true,
                      drawBorder: false,
                      color:"#F0F0F0",
                      zeroLineColor: '#F0F0F0',
                  },
                  ticks: {
                    beginAtZero: true,
                    autoSkip: true,
                    maxTicksLimit: 5,
                    fontSize: 10,
                    color:"#6B778C"
                  }
              }],
              xAxes: [{
                stacked: true,
                barPercentage: 0.35,
                gridLines: {
                    display: false,
                    drawBorder: false,
                },
                ticks: {
                  beginAtZero: false,
                  autoSkip: true,
                  maxTicksLimit: 12,
                  fontSize: 10,
                  color:"#6B778C"
                }
            }],
          },
          legend:false,
          legendCallback: function (chart) {
            var text = [];
            text.push('<div class="chartjs-legend"><ul>');
            for (var i = 0; i < chart.data.datasets.length; i++) {
              console.log(chart.data.datasets[i]); // see what's inside the obj.
              text.push('<li class="text-muted text-small">');
              text.push('<span style="background-color:' + chart.data.datasets[i].borderColor + '">' + '</span>');
              text.push(chart.data.datasets[i].label);
              text.push('</li>');
            }
            text.push('</ul></div>');
            return text.join("");
          },
          
          elements: {
              line: {
                  tension: 0.4,
              }
          },
          tooltips: {
              backgroundColor: 'rgba(31, 59, 179, 1)',
          }
      }
      var marketingOverview = new Chart(marketingOverviewChart, {
          type: 'bar',
          data: marketingOverviewData,
          options: marketingOverviewOptions
      });
      document.getElementById('marketing-overview-legend').innerHTML = marketingOverview.generateLegend();
    }

    if ($('#totalVisitors').length) {
      var bar = new ProgressBar.Circle(totalVisitors, {
        color: '#fff',
        // This has to be the same size as the maximum width to
        // prevent clipping
        strokeWidth: 15,
        trailWidth: 15, 
        easing: 'easeInOut',
        duration: 1400,
        text: {
          autoStyleContainer: false
        },
        from: {
          color: '#52CDFF',
          width: 15
        },
        to: {
          color: '#677ae4',
          width: 15
        },
        // Set default step function for all animate calls
        step: function(state, circle) {
          circle.path.setAttribute('stroke', state.color);
          circle.path.setAttribute('stroke-width', state.width);
  
          var value = Math.round(circle.value() * 100);
          if (value === 0) {
            circle.setText('');
          } else {
            circle.setText(value);
          }
  
        }
      });
  
      bar.text.style.fontSize = '0rem';
      bar.animate(.64); // Number from 0.0 to 1.0
    }

    if ($('#visitperday').length) {
      var bar = new ProgressBar.Circle(visitperday, {
        color: '#fff',
        // This has to be the same size as the maximum width to
        // prevent clipping
        strokeWidth: 15,
        trailWidth: 15,
        easing: 'easeInOut',
        duration: 1400,
        text: {
          autoStyleContainer: false
        },
        from: {
          color: '#34B1AA',
          width: 15
        },
        to: {
          color: '#677ae4',
          width: 15
        },
        // Set default step function for all animate calls
        step: function(state, circle) {
          circle.path.setAttribute('stroke', state.color);
          circle.path.setAttribute('stroke-width', state.width);
  
          var value = Math.round(circle.value() * 100);
          if (value === 0) {
            circle.setText('');
          } else {
            circle.setText(value);
          }
  
        }
      });
  
      bar.text.style.fontSize = '0rem';
      bar.animate(.34); // Number from 0.0 to 1.0
    }

    if ($("#datepicker-popup").length) {
      $('#datepicker-popup').datepicker({
        enableOnReadonly: true,
        todayHighlight: true,
      });
      $("#datepicker-popup").datepicker("setDate", "0");
    }

});

</script>


</body>

</html>

