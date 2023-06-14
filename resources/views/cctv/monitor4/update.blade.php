@extends('layouts.main')


@section('content')              
        
<div class="row">
<div class="col-xl-9 mx-auto">
  <a href="/dashboard/cctv" class="btn btn-success btn-sm mb-3"><i class="bi bi-arrow-left"></i> Back</a>
  <h6 class="mb-0 text-uppercase">Update Data CCTV Monitor 4</h6>
  <hr/>
  <div class="card">
    <div class="card-body">
      <div class="p-4 border rounded">
        <form action="/dashboard/cctv4/{{ $dataCctv4->id }}" method="post" class="row g-3 needs-validation">
          @method('PUT')       
            @csrf
              <div class="col-md-4">
                <label for="lokasi4" class="form-label">Lokasi <small class="text-danger">*</small></label>
                <input class="form-control" id="lokasi4" name="lokasi4" placeholder="Lokasi Camera" required value="{{ old('lokasi4', $dataCctv4->lokasi)}}">
              </div>
              <div class="col-md-4">
                <label for="merk4" class="form-label">Merk <small class="text-danger">*</small></label>
                <select class="form-control" id="merk4" name="merk4" placeholder="Merk Camera" required>
                    <option value="{{ $dataCctv4->merk }}" selected>{{ $dataCctv4->merk }}</option>
                    <option value="" disabled>--Select--</option>
                    <option value="Hikvision">Hikvision</option>
                    <option value="Dahua">Dahua</option>
                    <option value="SPC">SPC</option>
                    <option value="Krisbow">Krisbow</option>
                  </select>
              </div>
              <div class="col-md-4">
                <label for="type4" class="form-label">Type <small class="text-danger">*</small></label>
                <select class="form-select" id="type4" name="type4" required>
                  <option value="{{ $dataCctv4->type }}" selected>{{ $dataCctv4->type }}</option>
                    <option value="" disabled>--Select--</option>
                    <option value="Analog">Analog</option>                    
                </select>
              </div>
              <div class="col-md-4">
                <label for="resolusi4" class="form-label">Resolusi</label>
                <select class="form-select" id="resolusi4" name="resolusi4">
                  <option value="{{ $dataCctv4->resolusi }}" selected>{{ $dataCctv4->resolusi }}</option>
                    <option value="" disabled>--Select--</option>
                    <option value="1,5MP">1,5MP</option>
                    <option value="2MP">2MP</option>
                    <option value="4MP">4MP</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="tgl_pemasangan4" class="form-label">Tanggal Pemasangan</label>
                <input class="form-control datepicker" id="tgl_pemasangan4" name="tgl_pemasangan4" placeholder="Tanggal Pemasangan Camera" value="{{ old('tgl_pemasangan4', $dataCctv4->tgl_pemasangan)}}">
              </div>
              <div class="col-md-4">
                <label for="petugas_pemasangan4" class="form-label">Petugas Pemasangan</label>
                <input class="form-control text-capitalize" id="petugas_pemasangan4" name="petugas_pemasangan4" placeholder="Petugas Pemasangan Camera" value="{{ old('petugas_pemasangan4', $dataCctv4->petugas_pemasangan) }}">
              </div>
              <div class="col-md-4">
                <label for="status4" class="form-label">Status <small class="text-danger">*</small></label>
                <select class="form-select" id="status4" name="status4" required>
                  <option value="{{ $dataCctv4->status }}" selected>{{ $dataCctv4->status }}</option>
                    <option value="" disabled>--Select--</option>
                    <option value="Normal">Normal</option>
                    <option value="Rusak">Rusak</option>
                </select>
              </div>
              <div class="col-md-4">
                <label class="form-label">Tanggal Perbaikan</label>
                <input type="text" class="form-control datepicker" id="tgl_perbaikan4" name="tgl_perbaikan4" placeholder="Tanggal Perbaikan" value="{{ old('tgl_perbaikan4', $dataCctv4->tgl_perbaikan) }}">
              </div>
              <div class="col-md-4">
                <label class="form-label">Petugas Perbaikan</label>
                <input type="text" class="form-control" id="petugas_perbaikan4" name="petugas_perbaikan4" placeholder="Masukan petugas.." value="{{ old('petugas_perbaikan4', $dataCctv4->petugas_perbaikan) }}">
              </div>
              <div class="col-md-12">
                <label class="form-label">Sandi DVR</label>
                <input type="text" class="form-control" id="sandi_dvr4" name="sandi_dvr4" placeholder="Kata sandi DVR/NVR" value="{{ old('sandi_dvr4', $dataCctv4->sandi_dvr) }}">
              </div>             
             <div class="col-6">
              <label class="form-label">Kerusakan</label>
              <textarea class="form-control" rows="4" cols="4" id="kerusakan4" name="kerusakan4" placeholder="Kerusakan pada camera!">{{ $dataCctv4->kerusakan }}</textarea>
           </div>
             <div class="col-6">
              <label class="form-label">Catatan <small>(Optional)</small></label>
              <textarea class="form-control" rows="4" cols="4" id="catatan4" name="catatan4">{{ $dataCctv4->catatan }}</textarea>
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
  <script>
          $(document).on('change', function() {
            const status4 = $("#status4").val();
            if(status4 == "Rusak"){
              $("#kerusakan4").attr('required', true);
              $("#kerusakan4").addClass('is-invalid');
              $("#kerusakan4").prop('disabled', false);
              
            }else{
              $("#kerusakan4").removeAttr('required', false);
              $("#kerusakan4").removeClass('is-invalid');
              $("#kerusakan4").prop('disabled', true);
              $("#kerusakan4").val('');
            }
          });
        </script>

@endsection