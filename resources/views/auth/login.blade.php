@extends('auth.main')


@section('content')
<main class="authentication-content">
    <div class="container-fluid">
      <div class="authentication-card">
        <div class="card shadow rounded-0 overflow-hidden">
          <div class="row g-0">
            <div class="col-lg-6 bg-login d-flex align-items-center justify-content-center">
              <img src="assets/images/error/login-img.jpeg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6">
              <div class="card-body p-4 p-sm-5">
                <h5 class="card-title">Sign In</h5>
                <p class="card-text mb-5">Do not forget to be happy!</p>
                <div class="flashError" data-error="{{ session('loginError') }}"></div>
                {{-- @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif --}}               
                <form method="post" action="/" class="form-body">
                    @csrf
                  <div class="d-flex justify-content-center">
                      <img src="assets/images/logo-form.png" alt="">
                  </div>
                  <div class="login-separater text-center mb-4"> <span>My App</span>
                    <hr>
                  </div>
                    <div class="row g-3">
                      <div class="col-12">
                        <input type="hidden" name="lat" id="lat">
                        <input type="hidden" name="long" id="long">
                        <div class="ms-auto position-relative">
                          <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-person"></i></div>
                          <input type="text" class="form-control radius-30 ps-5 @error('nik') is-invalid @enderror" id="nik" placeholder="NIK" name="nik" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{ old('nik') }}">                          
                        </div>                        
                      </div>
                      <div class="col-12">              
                        <div class="ms-auto position-relative">
                          <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-eye-slash" id="togglePassword"></i></div>
                          <input type="password" class="form-control radius-30 ps-5 @error('password') is-invalid @enderror" id="password" placeholder="Enter Password" name="password">                          
                        </div>
                      </div>
                      <small id="message1" class="text-danger">
                        
                    </small>
                      <div class="col-12">
                        <div class="d-grid">
                          <button type="submit" class="btn btn-primary radius-30" id="btnSub">Sign In</button>
                        </div>
                      </div>
                      <div class="col-12">
                        <p class="mb-0">Don't have an account yet? <a href="javascript:void(0)" id="btnSignUp">Sign up here</a></p>
                      </div>
                    </div>
                </form>
             </div>
            </div>
          </div>
        </div>
      </div>
    </div>    
   </main>
   <script src="/assets/js/jquery.min.js"></script>
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
       
  


   <script>
     console.log(window.location.href);
    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else { 
        alert('fdf');
      }
    }
  
    function showPosition(position) {
      document.querySelector('#lat').value = position.coords.latitude;
      document.querySelector('#long').value = position.coords.longitude;
      
    }
  
    document.addEventListener('load', getLocation());
  
  
  </script>

   <script>
       const flash = document.querySelector('.flashError');
       const message = flash.dataset.error;
       if(message){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            html: message
            })
       }

       const btnSignUp = document.querySelector('#btnSignUp');

       btnSignUp.addEventListener('click', function() {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please contact admin!'
          });
       });

       const togglePassword = document.querySelector("#togglePassword");
       const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });        

   </script>

<script>

  const password1 = document.querySelector('#password');
  const message1 = document.querySelector('#message1');

password1.addEventListener('keyup', function (e) {
  if (e.getModifierState('CapsLock')) {
      message1.textContent = 'Caps lock is on';      
  } else {
      message1.textContent = '';      
  }
});
</script>

<script>

  $('#nik').on('keypress', function() {
    
    var checknumber = $('#nik').val();    
    if(jQuery.isNumeric(checknumber) == true){
      $('#nik').removeClass('is-invalid');
    }else{
      $('#nik').addClass('is-valid');

    }
			
    
  });
  $('#password').on('keyup', function() {
    $('#password').removeClass('is-invalid');
    $('#password').addClass('is-valid');
  });

</script>

   
@endsection   