@extends('layouts.main')


@section('content')
<style>
  .tb-ac tbody tr:hover{
    cursor: pointer;
    background-color: rgba(0,0,0,0.2);
  }
  html.dark-theme body .tb-ac tbody tr:hover{
    cursor: pointer;
    background-color: rgba(255,255,255,0.2);
  }
</style>
@php
 use Illuminate\Support\Carbon; 
//  $date = date('Y-m-d H:i:s');
@endphp

            <div class="flash-success" data-success="{{ session('success') }}"></div>
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">              
              <div class="ps-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-table" style="color:#7b378e"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Kode Error</li>
                  </ol>
                </nav>
              </div>              
            </div>                
            <a href="/ac" class="mb-0 text-uppercase btn btn-primary btn-sm"><i class="bi bi-arrow-left"></i> Back</a>                        
        <hr/>
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table id="example" class="table table-striped table-bordered tb-ac" style="width:100%">             
                <thead>
                  <tr>                    
                    <th>Kode</th>
                    <th>Penyebab</th>
                    <th>Kerusakan</th>                    
                  </tr>
                </thead>
                <tbody class="error-body">                  
                                                 
                </tbody>               
              </table>
            </div>
          </div>
        </div>

       

        <script src="/assets/js/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            $.ajax({
                url : "/assets/kode-error.json",
                success : result => {
                    let cardKode = '';
                    for(r of result){
                        cardKode += `<tr>                   
                                        <td>${r.kode}</td>
                                        <td>${r.penyebab}</td>
                                        <td>${r.perbaikan}</td>
                                    </tr>`;
                    }
                    $('.error-body').html(cardKode);
                },
                error : err => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: `Kode error ${err.statusText}!`
                    });                    
                }
            })
        </script>
@endsection       