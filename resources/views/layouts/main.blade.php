
<!doctype html>
<html lang="en">

<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">  

  

  <link href="/assets/plugins/datetimepicker/css/classic.css" rel="stylesheet" />
  <link href="/assets/plugins/datetimepicker/css/classic.time.css" rel="stylesheet" />
  <link href="/assets/plugins/datetimepicker/css/classic.date.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link href="/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
  <link href="/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />  
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="/assets/css/bootstrap-extended.css" rel="stylesheet" />
  <link href="/assets/css/style.css" rel="stylesheet" />
  <link href="/assets/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>	 
	<link href="/assets/css/pace.min.css" rel="stylesheet" />  
  <link href="/assets/css/dark-theme.css" rel="stylesheet" />
  <link href="/assets/css/light-theme.css" rel="stylesheet" />
  <link href="/assets/css/semi-dark.css" rel="stylesheet" />
  <link rel="stylesheet" href="/assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css">
  <!-- <link href="/assets/css/jqueryCSS.css" rel="stylesheet" /> -->
 

  <title>{{ $title }}</title> 
  <meta name="csrf-token" content="{{csrf_token()}}">

 
</head>

<body>


  <!--start wrapper-->
  <div class="wrapper">
    <!--start top header-->
     @include('layouts.header')
       <!--end top header-->

        <!--start sidebar -->
        @include('layouts.sidebar')
       <!--start sidebar -->

       <!--start content-->
          <main class="page-content" id="site-landing">
           
            
            @yield('content')
            
            <!--end row-->                           
            
          </main>
       <!--end page main-->

       <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
       <!--end overlay-->

       <!--Start Back To Top Button-->
		     <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
       <!--End Back To Top Button-->

       <!--start switcher-->
       {{-- @include('layouts.switcher') --}}
       <!--end switcher-->

       

  </div>
  <!--end wrapper-->


  
  <script src="/assets/js/bootstrap.bundle.min.js"></script>  
  <script src="/assets/js/jquery.min.js"></script>
  <script src="/assets/plugins/simplebar/js/simplebar.min.js"></script>
  
  <script src="/assets/plugins/peity/jquery.peity.min.js"></script>
  <script src="/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="/assets/js/pace.min.js"></script>
  <script src="/assets/plugins/datetimepicker/js/legacy.js"></script>
  <script src="/assets/plugins/datetimepicker/js/picker.js"></script>
  <script src="/assets/plugins/datetimepicker/js/picker.time.js"></script>
  <script src="/assets/plugins/datetimepicker/js/picker.date.js"></script>
  <script src="/assets/plugins/bootstrap-material-datetimepicker/js/moment.min.js"></script>
  <script src="/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js"></script>
  <script src="/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>  
  
  <script src="/assets/js/table-datatable.js"></script>
  <script src="/assets/js/form-date-time-pickes.js"></script>
  <script src="/assets/js/app.js"></script>
  <script src="/assets/js/index.js"></script>

  <!-- JQUERY SCRIPT -->
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
  <script src="/assets/js/jqueryScript/jquery.eraser.js"></script>
  <script src="/assets/js/jqueryScript/sketchpad.js"></script>
  <!-- END JQUERY SCRIPT -->
  

  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  


  <script>

    if(localStorage.getItem('theme') == 'dark-theme'){
        setDark()
    }

    function setDark()
    {
        const icon = document.querySelector('.bi-moon-fill');
        const btn = icon.classList.toggle('bi-sun-fill');
        if(btn){
            
            $("html").attr("class", "dark-theme");
            localStorage.setItem('theme', 'dark-theme');

        }else{
            
		    $("html").attr("class", "default-theme");
            localStorage.setItem('theme', 'default-theme');
	
        }
       
    }

    if(localStorage.getItem('toggle') == 'toggled'){
      setWrapper()
    }

    function setWrapper(){
      $(".wrapper").toggleClass("toggled")
      localStorage.setItem('toggle', 'toggled');
    }

  </script>

<script type = "text/javascript">

$(function(){
  $('#redux').eraser({
    progressFunction: function(p) {
      $('#progress').html(Math.round(p*100)+'%');
    }
  });

  $('#resetBtn').click(function(event) {
    $('#redux').eraser('reset');
      $('#progress').html('0%');
    event.preventDefault();
  });

  $('#clearBtn').click(function(event) {
    $('#redux').eraser('clear');
      $('#progress').html('100%');
    event.preventDefault();
  });

  $('#toggleBtn').click(function(event) {
    var $redux = $('#redux'),
      $toggleBtn = $('#toggleBtn');

    if ($redux.eraser('enabled')) {
      $toggleBtn.text(' ENABLE ');
      $redux.eraser('disable');
    } else {
      $toggleBtn.text(' DISABLE ');
      $redux.eraser('enable');
    }

    event.preventDefault();
  });

});

</script>


<script>
  var sketchpad = new Sketchpad({
  element: '#sketchpad',
  width: 500,
  height: 300,
});
function recover(event) {
        var settings = sketchpad.toObject();
        settings.element = '#sketchpad2';
        var otherSketchpad = new Sketchpad(settings);
        $('#recover-button').hide();
      }
</script>

</body>

</html>