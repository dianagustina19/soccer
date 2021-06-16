@include('header')

<div class="wrapper">
    <div class="demo-header demo-header-image">
            <div class="motto">
                <h1 class="title-uppercase">Football XYZ</h1>
                <h3>Association Football Champion</h3>
            </div>
    </div>
</div>
<div class="wrapper">
    <div class="section section-light-blue">
        <div class="container">
            <div id="menu-dropdown">
                <div class="row">
                    <div class="col-md-12">
                        <div class="container">
                            <canvas id="myChart"></canvas>
                        </div><br><br>
                        <div class="container">
                            <canvas id="inicanvas"></canvas>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    

<div id="carousel">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <div class="carousel slide" data-ride="carousel">

              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <div class="item active">
                  <center><img src="assets/paper_img/1.png" alt="Awesome Image" width="30%"></center>
                </div>
                <div class="item">
                  <center><img src="assets/paper_img/2.jpg" alt="Awesome Image" width="30%"></center>
                </div>
                <div class="item">
                  <center><img src="assets/paper_img/3.png" alt="Awesome Image" width="20%"></center>
                </div>
              </div>

              <!-- Controls -->
              <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="fa fa-angle-left"></span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="fa fa-angle-right"></span>
              </a>
        </div>
    </div> 
</div>


@include('footer')
@include('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script>
    let myChart = document.getElementById('myChart').getContext('2d');
 
    //Global Options
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#777';
    var url = "{{url('stock/chart')}}";
        var nama_tim = new Array();
        var total = new Array();
        $(document).ready(function(){
          $.get(url, function(response){
            response.forEach(function(data){
                nama_tim.push(data.nama_tim);
                total.push(data.total);
        });

    let massPopChart = new Chart(myChart, {
        type: 'bar', //bar, horizontalBar, Pie, Line, Doughnut, Radar, polarArea
        data: {
            labels: nama_tim,
            datasets: [{
                label: 'Jumlah Pemain',
                data: total,
                //backgroundColor: 'blue'
                backgroundColor: [
                    'blue',
                    'green',
                    'yellow'
                ],
                borderWidth: 1,
                borderColor: '#777',
                hoverBorderWidth: 3,
                hoverBorderColor: '#000'
            }]
        },
        options: {
            title: {
                display: true,
                text:'Tim In Indonesia',
                fontSize: 25
            },
            legend: {
                display: true,
                position: 'right',
                labels: {
                    fontColor: '#000'
                }
            },
            layout: {
                padding: {
                    left: 50,
                    right: 0,
                    bottom: 0,
                    top: 0
                }
            },
            tooltips: {
                enabled: true
            }
        }
      });
    });
  });

      let ctx = document.getElementById("inicanvas").getContext("2d");
      var url = "{{url('stock/chart')}}";
      var nama_tim = new Array();
      var total = new Array();
      $(document).ready(function(){
        $.get(url, function(response){  
        nama_tim.push(response.nama_tim);
        total.push(response.total);
    
      // tampilan chart
      var myPieChart = new Chart(ctx, {
      //chart akan ditampilkan sebagai pie chart
      type: 'pie',
      data: {
      //membuat label chart
      labels: nama_tim,
      datasets: [{
          label: 'Data Produk',
          //isi chart
          data: total,
          //membuat warna pada chart
          backgroundColor: [
              'rgb(26, 214, 13)',
              'rgb(235, 52, 110)',
              'rgb(52, 82, 235)',
              'rgb(138, 4, 113)',
              'rgb(214, 134, 13)'
          ],
          //borderWidth: 0, //this will hide border
        }]
      }
    });
      });
    });
    </script>

</body>
</html>
