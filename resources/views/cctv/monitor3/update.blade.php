@extends('layouts.main')


@section('content')              
        
<div class="row">
<div class="col-xl-9 mx-auto">
  <a href="/dashboard/cctv" class="btn btn-success btn-sm mb-3"><i class="bi bi-arrow-left"></i> Back</a>
  <h6 class="mb-0 text-uppercase">Update Data CCTV Monitor 3</h6>
  <hr/>
  <div class="card">
    <div class="card-body">
      <div class="p-4 border rounded">
        <form action="/dashboard/cctv3/{{ $dataCctv3->id }}" method="post" class="row g-3 needs-validation">
          @method('PUT')       
            @csrf
            <div class="col-md-4">
                <label for="lantai3" class="form-label">Lantai <small class="text-danger">*</small></label>
                <select class="form-select" id="lantai3" name="lantai3" required>
                    <option value="{{ $dataCctv3->lantai }}" selected>{{ $dataCctv3->lantai }}</option>
                    <option value="" disabled>--Select--</option>
                    <option value="Lt1">Lt1</option>
                    <option value="Lt2">Lt2</option>
                    <option value="Lt3">Lt3</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="wing3" class="form-label">Wing <small class="text-danger">*</small></label>
                <select class="form-select" id="wing3" name="wing3" required>
                  <option value="{{ $dataCctv3->wing }}" selected>{{ $dataCctv3->wing }}</option>
                    <option value="" disabled>--Select--</option>
                    <option value="WA">WA</option>
                    <option value="WB">WB</option>
                    <option value="WC">WC</option>
                    <option value="WD">WD</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="lokasi3" class="form-label">Lokasi <small class="text-danger">*</small></label>
                <input class="form-control text-capitalize" id="lokasi3" name="lokasi3" placeholder="Lokasi Camera" required value="{{ old('lokasi3', $dataCctv3->lokasi)}}">
              </div>
              <div class="col-md-4">
                <label for="merk3" class="form-label">Merk <small class="text-danger">*</small></label>
                <select class="form-control" id="merk3" name="merk3" placeholder="Merk Camera" required>
                  <option value="{{ $dataCctv3->merk }}" selected>{{ $dataCctv3->merk }}</option>
                  <option value="" disabled>--Select--</option>
                  <option value="Hikvision">Hikvision</option>
                  <option value="Dahua">Dahua</option>
                  <option value="SPC">SPC</option>
                  <option value="Krisbow">Krisbow</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="type3" class="form-label">Type <small class="text-danger">*</small></label>
                <select class="form-select" id="type3" name="type3" required>
                  <option value="{{ $dataCctv3->type }}" selected>{{ $dataCctv3->type }}</option>
                    <option value="" disabled>--Select--</option>
                    <option value="Analog">Analog</option>                    
                </select>
              </div>
              <div class="col-md-4">
                <label for="resolusi3" class="form-label">Resolusi</label>
                <select class="form-select" id="resolusi3" name="resolusi3">
                  <option value="{{ $dataCctv3->resolusi }}" selected>{{ $dataCctv3->resolusi }}</option>
                    <option value="" disabled>--Select--</option>
                    <option value="1,5MP">1,5MP</option>
                    <option value="2MP">2MP</option>
                    <option value="4MP">4MP</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="tgl_pemasangan3" class="form-label">Tanggal Pemasangan</label>
                <input class="form-control datepicker" id="tgl_pemasangan3" name="tgl_pemasangan3" placeholder="Tanggal Pemasangan Camera" value="{{ old('tgl_pemasangan3', $dataCctv3->tgl_pemasangan)}}">
              </div>
              <div class="col-md-4">
                <label for="petugas_pemasangan3" class="form-label">Petugas Pemasangan</label>
                <input class="form-control text-capitalize" id="petugas_pemasangan3" name="petugas_pemasangan3" placeholder="Petugas Pemasangan Camera" value="{{ old('petugas_pemasangan3', $dataCctv3->petugas_pemasangan) }}">
              </div>
              <div class="col-md-4">
                <label for="status3" class="form-label">Status <small class="text-danger">*</small></label>
                <select class="form-select" id="status3" name="status3" required>
                  <option value="{{ $dataCctv3->status }}" selected>{{ $dataCctv3->status }}</option>
                    <option value="" disabled>--Select--</option>
                    <option value="Normal">Normal</option>
                    <option value="Rusak">Rusak</option>
                </select>
              </div>
              <div class="col-md-4">
                <label class="form-label">Tanggal Perbaikan</label>
                <input type="text" class="form-control datepicker" id="tgl_perbaikan3" name="tgl_perbaikan3" placeholder="Tanggal Perbaikan" value="{{ old('tgl_perbaikan3', $dataCctv3->tgl_perbaikan) }}">
              </div>
              <div class="col-md-4">
                <label class="form-label">Petugas Perbaikan</label>
                <input type="text" class="form-control" id="petugas_perbaikan3" name="petugas_perbaikan3" placeholder="Masukan petugas.." value="{{ old('petugas_perbaikan3', $dataCctv3->petugas_perbaikan) }}">
              </div>
              <div class="col-md-4">
                <label class="form-label">Sandi DVR</label>
                <input type="text" class="form-control" id="sandi_dvr3" name="sandi_dvr3" placeholder="Kata sandi DVR/NVR" value="{{ old('sandi_dvr3', $dataCctv3->sandi_dvr) }}">
              </div>
              <div class="col-6">
                <label class="form-label">Kerusakan</label>
                <textarea class="form-control" rows="4" cols="4" id="kerusakan3" name="kerusakan3" placeholder="Kerusakan pada camera!">{{ $dataCctv3->kerusakan }}</textarea>
             </div>
             <div class="col-6">
              <label class="form-label">Catatan <small>(Optional)</small></label>
              <textarea class="form-control" rows="4" cols="4" id="catatan3" name="catatan3">{{ $dataCctv3->catatan }}</textarea>
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
            const status3 = $("#status3").val();
            if(status3 == "Rusak"){
              $("#kerusakan3").attr('required', true);
              $("#kerusakan3").addClass('is-invalid');
              $("#kerusakan3").prop('disabled', false);
              
            }else{
              $("#kerusakan3").removeAttr('required', false);
              $("#kerusakan3").removeClass('is-invalid');
              $("#kerusakan3").prop('disabled', true);
              $("#kerusakan3").val('');
            }
          });
        </script>

@endsection