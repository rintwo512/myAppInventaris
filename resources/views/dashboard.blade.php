@extends('layouts.main')

@section('content')
<div class="row">
<div class="col-md-8">
<div class="ratio ratio-16x9 mb-4">
  <iframe src="https://www.youtube.com/embed/r28RWd9lXbw" title="YouTube video" allowfullscreen></iframe>
</div>
</div>
<div class="col-md-4">
  <div class="card">
    <div class="card-body">
      <p data-period="1000"><span class="title_run" data-period="3000"
        data-type='["Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus asperiores vel est facere hic laboriosam possimus sint earum neque nostrum? Dolorum nam a consequatur illum quidem magnam eum ipsam asperiores. Saepe libero adipisci nihil laborum, pariatur repellat error omnis autem obcaecati illo suscipit corrupti atque recusandae iste, accusantium rerum corporis."]'></span></p>
    </div>
  </div>
</div>
</div>
@can('admin')  
{{-- Chart --}}
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="col-md-2 mb-3">  
  <select class="form-select" name="tahun" id="tahun">
    <option value="">--Select--</option>
    {{-- @foreach ($list_tahun as $tahun)
        <option value="{{ $tahun->tahun }}">{{ $tahun->tahun }}</option>
    @endforeach   --}}
  </select>               
</div>
<div class="card">
  <div class="card-body">
    <div class="chart-container1">
      <div id="chart6"></div>
    </div>
  </div>
</div>
{{-- End Chart --}}
@endcan
<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-4">  
  <div class="col">
    <div class="card radius-10">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="">
            <p class="mb-1">Data AC Tireg 7</p>
            <h6 class="mb-0">Total <i class="bi bi-arrow-right"></i> {{ $countData }} Unit</h6>
          </div>
          <div class="ms-auto fs-2 text-primary">
            <i class="bi bi-table"></i>
          </div>
        </div>
        <div class="border-top my-2"></div>
        <a href="/ac" class="text-view"><small class="mb-0"><span class="text-primary"><i class="bi bi-eye"></i></span> View Data</small></a>
      </div>
    </div>
   </div>
   <div class="col">
    <div class="card radius-10">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="">
            <p class="mb-1">Data Trash AC</p>
            <h6 class="mb-0">{{ $countTrash }} unit</h6>
          </div>
          <div class="ms-auto fs-2 text-danger">
            <i class="bi bi-trash"></i>
          </div>
        </div>
        <div class="border-top my-2"></div>
        <a href="/ac/trash" class="text-danger"><small class="mb-0"><span class="text-danger"><i class="bi bi-trash"></i></span> Delete Trash</small></a>
      </div>
    </div>
   </div>
   <div class="col">
    <div class="card radius-10">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="">
            <p class="mb-1">Total Maintenance</p>
            @if ($kalTahun === 1)
            <h6 class="mb-0">{{ $kal }} unit total AC yang di maintenance tahun ini.</h6>
            @else
            <h6 class="mb-0">{{ $kal }} unit total AC yang di maintenance dalam {{ $kalTahun }} tahun.</h6>
            @endif
          </div>
          <div class="ms-auto fs-2 text-primary">
            <i class="bi bi-hammer"></i>
          </div>
        </div>
        <div class="border-top my-2"></div>
        <small class="mb-0 text-primary"><span class="text-primary"><i class="bi bi-gear"></i></span> Data Maint AC</small>
      </div>
    </div>
   </div>
   <div class="col">
    <div class="card radius-10">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="">
            <p class="mb-1">{{ $countAcRusak == 0 ? 'Semua perangkat AC Normal' : 'Perlu diperhatikan' }}</p>
            <h6 class="mb-0">{{ $countAcRusak == 0 ? 'Awesome!' :  $countAcRusak . ' ' . 'Unit AC yang masih tidak normal.'}}</h6>
          </div>
          <div class="ms-auto fs-2 text-danger">
            <i class="bi bi-gear"></i>
          </div>
        </div>
        <div class="border-top my-2"></div>
        <small class="mb-0 text-danger"><span class="text-danger"><i class="bi bi-gear"></i></span> Data AC tidak aktif</small>
      </div>
    </div>
   </div>

   {{-- CCTV --}}
   <div class="col-md-4">
    <div class="card radius-10">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="">
            <p class="mb-1">Data CCTV Tireg 7</p>
            <h6 class="mb-0">Total CCTV <i class="bi bi-arrow-right"></i> {{ $countAll }} Unit</h6>
          </div>
          <div class="ms-auto fs-2 text-info">
            <i class="bi bi-camera-video"></i>
          </div>
        </div>
        <div class="border-top my-2"></div>
        <a href="/dashboard/cctv"><small class="mb-0 text-info"><span class="text-info"><i class="bi bi-camera-video"></i></span> View Data</small></a>
      </div>
    </div>
   </div>
   <div class="col-md-4">
    <div class="card radius-10">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="">
            <p class="mb-1">Data Trash CCTV</p>
            <h6 class="mb-0">{{ $countTrashCctvAll }} Unit</h6>
          </div>
          <div class="ms-auto fs-2 text-info">
            <i class="bi bi-trash"></i>
          </div>
        </div>
        <div class="border-top my-2"></div>
        <small class="mb-0 text-info"><span class="text-info"><i class="bi bi-trash"></i></span> Delete Trash</small>
      </div>
    </div>
   </div>
   <div class="col-md-4">
    <div class="card radius-10">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="">
            <p class="mb-1">{{ $countCctvAllRusak == 0 ? 'Semua perangkat CCTV Normal' : 'Perlu diperhatikan' }}</p>
            <h6 class="mb-0">{{ $countCctvAllRusak == 0 ? 'Awesome!' : $countCctvAllRusak . ' ' . 'Unit CCTV yang masih tidak normal.' }}</h6>
          </div>
          <div class="ms-auto fs-2 text-info">
            <i class="bi bi-gear"></i>
          </div>
        </div>
        <div class="border-top my-2"></div>
        <small class="mb-0 text-info"><span class="text-info"><i class="bi bi-gear"></i></span> Data CCTV tidak aktif</small>
      </div>
    </div>
   </div>
   {{-- END CCTV --}}
   <div class="col-12">
    <div class="card radius-10">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="">
            <p class="mb-1">Users Registration</p>
            <h4 class="mb-0">{{ $countUsers }}</h4>
          </div>
          <div class="ms-auto fs-2 text-info">
            <i class="bi bi-people"></i>
          </div>
        </div>
        <div class="border-top my-2"></div>
        <small class="mb-0 text-success"><span class="text-success"> <i class="bi bi-eye"></i></span> List Users Registration</small>
      </div>
    </div>
   </div>   
</div>



<script src="/assets/js/jquery.min.js"></script>
{{-- <script src="/assets/plugins/chartjs/js/Chart.min.js"></script>
<script src="/assets/plugins/chartjs/js/Chart.extension.js"></script> --}}
<script src="/assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>



<script>

function chartAc(year, title){
   
   $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });

   $.ajax({
     method: "POST",
     url: "/dashboard",
     data : {
       tahun : year
     },
     dataType : "JSON",
     success : result => {       
       drawChart(result, title, year);      
     }
   })

 }


function drawChart(result, title, year){
  console.log(result);
  var total = result.map(item => parseInt(item.total));
  var kalkulasi = total.reduce((acc, curr) => acc + curr);
  var bulan = result.map(item => item.bulan);
  var options = {
      series: [{
        name: 'Column',
        type: 'column',
        data: total
      }, {
        name: 'Line',
        type: 'line',
        data: total
      }],
      chart: {
        foreColor: '#9ba7b2',
        height: 350,
        type: 'line',
        zoom: {
          enabled: false
        },
        toolbar: {
          show: true
        },
      },
      stroke: {
        width: [0, 4]
      },
      plotOptions: {
        bar: {
          //horizontal: true,
          columnWidth: '35%',
          endingShape: 'rounded'
        }
      },
      colors: ["#0d6efd", "#212529"],
      title: {
        text: `${title} - Total = ${kalkulasi} Unit`
      },
      dataLabels: {
        enabled: true,
        enabledOnSeries: [1]
      },
      labels: bulan,
      xaxis: {
        type: 'dd/MM'
      },
      yaxis: [{
        title: {
          text: 'Rata-rata',
        },
      }, {
        opposite: true,
        title: {
          text: 'Rata-rata'
        }
      }]
    };
    var chart = new ApexCharts(document.querySelector("#chart6"), options);
    chart.render();
  }
</script>

<script>

  $(document).ready(function() {
    $('#tahun').change(function() {
      var year = $(this).val();
      
        if(year != ''){
          chartAc(year, `Statistic Bulanan Maintenance AC : Tahun ${year}`);
        }
    });
    
    const d = new Date();
    let tahun = d.getFullYear();    
    chartAc(tahun, `Statistic Bulanan Maintenance AC : Tahun ${tahun}`);
  });
</script>

{{-- <script type="text/javascript">
function chartAc(year, title){
   
   $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });

   $.ajax({
     method: "POST",
     url: "/dashboard",
     data : {
       tahun : year
     },
     dataType : "JSON",
     success : result => {
       
       drawChart(result, title, year);
     }
   })

 }
 

function drawChart(result, title, year){
var total = result.map(item => parseInt(item.total));
var kalkulasi = total.reduce((acc, curr) => acc + curr);

var bulan = result.map(item => item.bulan);
new Chart(document.getElementById("chart7"), {
  type: 'horizontalBar',
  data: {
    labels: bulan,
    datasets: [{
      label: '',
      backgroundColor: ["#55DD28", "#D83218", "#0048BA", "#FFBF00	", "#9966CC","#3DDC84", "#841B2D", "#00FFFF", "#FF9966", "#DA1884","#3D2B1F	", "#1B4D3E"],
      data: total
    }]
  },
  options: {
    maintainAspectRatio: false,
    legend: {
      display: false
    },
    title: {
      display: true,
      text: `${title}/Total = ${kalkulasi} Unit`
    }
  }
});
}


</script>

<script>

  $(document).ready(function() {
    $('#tahun').change(function() {
      var year = $(this).val();
      
        if(year != ''){
          chartAc(year, `Statistic Bulanan Maintenance AC : ${year}`);
        }
    });
    
    const d = new Date();
    let tahun = d.getFullYear();    
    chartAc(tahun, `Statistic Bulanan Maintenance AC : ${tahun}`);
  });
</script> --}}

<script>
  var textType = function(el, runText, periode) {
      this.runText = runText;
      this.el = el;
      this.loopNum = 0;
      this.periode = parseInt(periode, 10) || 1000;
      this.txt = ' ';
      this.tick();
      this.isDeleting = false;
  };
  textType.prototype.tick = function() {
      var i = this.loopNum % this.runText.length;
      var fullText = this.runText[i];
      if (this.isDeleting) {
          this.txt = fullText.substring(0, this.txt.length - 1);
      } else {
          this.txt = fullText.substring(0, this.txt.length + 1);
      }

      this.el.innerHTML = '<span class="rtx">' + this.txt + '</span>';
      var that = this;
      var dell = 10 - Math.random() + 50;
      if (this.isDeleting) {
          dell /= 1;
      }
      if (!this.isDeleting && this.txt === fullText) {
          dell = this.periode;
          this.isDeleting = true;
      } else if (this.isDeleting && this.txt === '') {
          this.isDeleting = false;
          this.loopNum++;
          dell = 500;
      }
      setTimeout(function() {
          that.tick();
      }, dell);
  };
  window.onload = function() {
      var elements = document.getElementsByClassName('title_run');
      for (var i = 0; i < elements.length; i++) {
          var runText = elements[i].getAttribute('data-type');
          var periode = elements[i].getAttribute('data-period');
          if (runText) {
              new textType(elements[i], JSON.parse(runText), periode);
          }
      }

      var css = document.createElement('style');
      css.type = "text/css";
      css.innerHTML =
          ".title_run > .rtx {border-right: 0.05em solid #fff;}";
      document.body.appendChild(css);
  };
  </script>

  


@endsection

