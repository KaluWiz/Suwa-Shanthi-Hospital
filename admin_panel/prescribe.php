<?php include('include/header.php'); ?>
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Prescriptions </li>
    </ol>
    <?php if($_SESSION['user_role']=="Admin"){ ?>

           <!-- ./User welcome section -->

<?php } include('include/footer.php'); ?>

<script>
  // Display users information
  $.ajax({
    url:"admin_action.php",
    method:"POST",
    data:{action:'add_info'},
    dataType: "json",
    success:function(data){
      $('#view_total_users').text(data['total_users']);
      $('#view_total_active_users').text(data['total_active_users']);
      $('#view_total_inactive_users').text(data['total_inactive_users']);
      $('#view_total_new_users').text(data['total_new_users']);
    }
  });

  // Monthly Created Users
  $.ajax({
    url:"admin_action.php",
    method:"POST",
    data:{action:'monthly_total_users'},
    dataType: "json",
    success:function(data){

      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = '#292b2c';

      // Line Chart Created Users
      var monthly_created_users_chart = document.getElementById("monthly_created_users_chart");
      var myLineChart = new Chart(monthly_created_users_chart, {
        type: 'line',
        data: {
          labels: data.date,
          datasets: [{
            label: "Users Created",
            lineTension: 0.3,
            backgroundColor: "rgba(2,117,216,0.2)",
            borderColor: "rgba(2,117,216,1)",
            pointRadius: 5,
            pointBackgroundColor: "rgba(2,117,216,1)",
            pointBorderColor: "rgba(255,255,255,0.8)",
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(2,117,216,1)",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: data.users,
          }],
        },
        options: {
          scales: {
            xAxes: [{
              time: {
                unit: 'date'
              },
              gridLines: {
                display: false
              },
              ticks: {
                maxTicksLimit: 7
              }
            }],
            yAxes: [{
              ticks: {
                min: 0,
                max: 100,
                maxTicksLimit: 5
              },
              gridLines: {
                color: "rgba(0, 0, 0, .125)",
              }
            }],
          },
          legend: {
            display: false
          }
        }
      });
    }
  });

  // Latest Users
  $.ajax({
    url:"admin_action.php",
    method:"POST",
    data:{action:'latest_users'},
    success:function(data){
      $('#latest_users').html(data);
    }
  });

  // Display Gender Distribution
  $.ajax({
    url:"admin_action.php",
    method:"POST",
    data:{action:'gender_info'},
    dataType: "json",
    success:function(data){
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = '#292b2c';

      // Pie Chart of Gender Distribution
      var gender_distribution = document.getElementById("gender_distribution");
      var gender_distribution = new Chart(gender_distribution, {
        type: 'doughnut',
        data: {
          labels: ["Male", "Female"],
          datasets: [{
            data: [data.total_male, data.total_female],
            backgroundColor: ['#007bff', '#dc3545'],
          }],
        },
      });
    }
  });
</script>