@extends('layouts.main')


@section('content')

<link href="/assets/plugins/input-tags/css/tagsinput.css" rel="stylesheet" />

<div class="row">
  
<div class="col-xl-9 mx-auto">
  
    <a href="/project" class="btn btn-success btn-sm mb-3"><i class="bi bi-arrow-left"></i> Back</a>
  
  <h6 class="mb-0 text-uppercase">Form Add Data</h6>
  
  <hr/>
  <div class="card">
    <div class="card-body">
      <div class="p-4 border rounded">
        <form action="/project/create" method="post" class="row g-3 needs-validation">           
            @csrf
          <div class="col-md-4">
            <label for="jenis_pek" class="form-label">Jenis Pekerjaan</label>
            <select class="form-select" id="jenis_pek" required name="jenis_pek">
                <option selected disabled value="">--Select--</option>
                <option value="ME">ME</option>
                <option value="Sipil">Sipil</option>
            </select>            
          </div>
          <div class="col-md-4">
            <label for="tgl_mulai" class="form-label">Tanggal Mulai</label>
            <input type="text" class="form-control" id="date-time2" name="tgl_mulai" required placeholder="Masukkan tanggal mulai perkerjaan!">
          </div>
          <div class="col-md-4">
            <label for="tgl_selesai" class="form-label">Tanggal Selesai</label>
            <input class="result form-control tgl_selesai" type="text" name="tgl_selesai" id="date-time" placeholder="Masukkan tanggal selesai perkerjaan!">
          </div>
          <div class="col-md-12">
            <label for="petugas_pek" class="form-label">Petugas <small class="text-danger">(Akhiri nama petugas dengan tanda koma)</small></label>
            <input class="form-control" data-role="tagsinput" id="petugas_pek" name="petugas_pek" placeholder="Masukkan nama petugas!">
          </div>
          <div class="col-md-6">
            <label for="lokasi_pek" class="form-label">Lokasi Pekerjaan</label>
            <input type="text" class="form-control" id="lokasi_pek" name="lokasi_pek" placeholder="Masukkan Lokasi Perkerjaan!">
              @error('lokasi_pek')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
          </div>
          <div class="col-md-6">
            <label for="status_pek" class="form-label">Status Pekerjaan</label>
            <select class="form-select" required name="status_pek" id="status_pek">
                <option selected disabled value="">--Select--</option>
                <option value="Close">Close</option>
                <option value="Pending">Pending</option>
                <option value="Progress">Progress</option>
            </select>         
          </div>                        
          <div class="col-6" id="detail">
            <label class="detail_pek">Detail Pekerjaan</label>
            <textarea class="form-control" name="detail_pek" id="detail_pek" rows="4" cols="4" placeholder="Masukan apa yang Anda kerjaakan!" required></textarea>
          </div>
          <div class="col-6" id="ketPek">
            <label class="des_pek">Keterangan Pekerjaan</label>
            <textarea class="form-control" name="des_pek" id="des_pek" rows="4" cols="4" placeholder="Masukan keterangan pekrjaan Anda!"></textarea>
          </div>         
          <div class="col-12">
              <div class="d-grid">
              <button class="btn btn-purple" type="submit">Submit form</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  
</div>
</div>
<!--end row-->
<script src="/assets/js/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="/assets/plugins/input-tags/js/tagsinput.js"></script>
<script>
    $(document).ready(function() {
        $("#status_pek").on("change", function() {

            $statusPek = $("#status_pek").val();     

            if($statusPek == "Pending"){
                $("#des_pek").attr('required', 'required');
                $("#des_pek").addClass('is-invalid');
                $(".tgl_selesai").attr("disabled", "disabled");
                
            }else{
                $("#des_pek").removeAttr("required");
                $(".tgl_selesai").removeAttr("disabled", "disabled");
            }
            $("#des_pek").keyup(function() {
              $("#des_pek").removeClass("is-invalid"); 
              $("#des_pek").addClass("is-valid"); 
            });
        });        
    });

</script>
@endsection