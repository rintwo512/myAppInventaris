@extends('layouts.main')


@section('content')
<?php use Illuminate\Support\Carbon; ?>
<div class="flash-success" data-success="{{ session('success') }}"></div>
<div class="flash-alert" data-alert="{{ session('alert') }}"></div>
    <div class="col-xl-4 mx-auto">
        <h6 class="mb-0 text-uppercase">Update Password</h6>
        <hr/>
        <div class="card">
        <div class="card-body">
            <div class="p-4 border rounded">
            <form action="/settings/changepassword/{{ auth()->user()->id }}" method="post" class="row g-3">
                @csrf
                <div class="col-md-12">
                <input type="hidden" value="{{ auth()->user()->id }}" name="userId">
                <label for="changeOldPass" class="form-label">Old Password</label>
                <input type="password" class="form-control @error('changeOldPass') is-invalid @enderror" id="changeOldPass" required name="changeOldPass">
                @error('changeOldPass')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <div class="col-md-12">
                    <label for="password" class="form-label">New Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" required name="password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="password_confirmation" class="form-label">Password Confirmation</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" required name="password_confirmation">
                    @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="col-12">
                <button class="btn btn-purple" type="submit">Save change</button>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
        <script src="/assets/js/jquery.min.js"></script>  
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            const flashSuccess = document.querySelector('.flash-success');
          const flashNotif = flashSuccess.dataset.success;          
          if(flashNotif){
            Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: flashNotif,
            showConfirmButton: false,
            timer: 4000
            });
          }
        </script>
        <script>
            const flashError = document.querySelector('.flash-alert');
          const flashAlert = flashError.dataset.alert;          
          if(flashAlert){
            Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: flashAlert,
            showConfirmButton: false,
            timer: 7000
            });
          }
        </script>

@endsection       