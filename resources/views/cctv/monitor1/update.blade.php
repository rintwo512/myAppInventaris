@extends('layouts.main')


@section('content')              
        
<div class="row">
<div class="col-xl-9 mx-auto">
  <a href="/dashboard/cctv" class="btn btn-success btn-sm mb-3"><i class="bi bi-arrow-left"></i> Back</a>
  <h6 class="mb-0 text-uppercase">Update Data CCTV Monitor 1</h6>
  <hr/>
  <div class="card">
    <div class="card-body">
      <div class="p-4 border rounded">
        <form action="/dashboard/cctv/{{ $dataCctv1->id }}" method="post" class="row g-3 needs-validation">
          @method('PUT')       
            @csrf
            <div class="col-md-4">
                <label for="lantai" class="form-label">Lantai <small class="text-danger">*</small></label>
                <select class="form-select" id="lantai" name="lantai" required>
                    <option value="{{ $dataCctv1->lantai }}" selected>{{ $dataCctv1->lantai }}</option>
                    <option value="" disabled>--Select--</option>
                    <option value="Lt1">Lt1</option>
                    <option value="Lt2">Lt2</option>
                    <option value="Lt3">Lt3</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="wing" class="form-label">Wing <small class="text-danger">*</small></label>
                <select class="form-select" id="wing" name="wing" required>
                  <option value="{{ $dataCctv1->wing }}" selected>{{ $dataCctv1->wing }}</option>
                    <option value="" disabled>--Select--</option>
                    <option value="WA">WA</option>
                    <option value="WB">WB</option>
                    <option value="WC">WC</option>
                    <option value="WD">WD</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="lokasi" class="form-label">Lokasi <small class="text-danger">*</small></label>
                <input class="form-control text-capitalize" id="lokasi" name="lokasi" placeholder="Lokasi Camera" required value="{{ old('lokasi', $dataCctv1->lokasi)}}">
              </div>
              <div class="col-md-4">
                <label for="merk" class="form-label">Merk <small class="text-danger">*</small></label>
                <select class="form-control" id="merk" name="merk" placeholder="Merk Camera" required>
                  <option value="{{ $dataCctv1->merk }}" selected>{{ $dataCctv1->merk }}</option>
                  <option value="" disabled>--Select--</option>
                  <option value="Hikvision">Hikvision</option>
                  <option value="Dahua">Dahua</option>
                  <option value="SPC">SPC</option>
                  <option value="Krisbow">Krisbow</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="type" class="form-label">Type <small class="text-danger">*</small></label>
                <select class="form-select" id="type" name="type" required>
                  <option value="{{ $dataCctv1->type }}" selected>{{ $dataCctv1->type }}</option>
                    <option value="" disabled>--Select--</option>
                    <option value="Analog">Analog</option>                    
                </select>
              </div>
              <div class="col-md-4">
                <label for="resolusi" class="form-label">Resolusi</label>
                <select class="form-select" id="resolusi" name="resolusi">
                  <option value="{{ $dataCctv1->resolusi }}" selected>{{ $dataCctv1->resolusi }}</option>
                    <option value="" disabled>--Select--</option>
                    <option value="1,5MP">1,5MP</option>
                    <option value="2MP">2MP</option>
                    <option value="4MP">4MP</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="tgl_pemasangan" class="form-label">Tanggal Pemasangan</label>
                <input class="form-control datepicker" id="tgl_pemasangan" name="tgl_pemasangan" placeholder="Tanggal Pemasangan Camera" value="{{ old('tgl_pemasangan', $dataCctv1->tgl_pemasangan)}}">
              </div>
              <div class="col-md-4">
                <label for="petugas_pemasangan" class="form-label">Petugas Pemasangan</label>
                <input class="form-control text-capitalize" id="petugas_pemasangan" name="petugas_pemasangan" placeholder="Petugas Pemasangan Camera" value="{{ old('petugas_pemasangan', $dataCctv1->petugas_pemasangan) }}">
              </div>
              <div class="col-md-4">
                <label for="status" class="form-label">Status <small class="text-danger">*</small></label>
                <select class="form-select" id="status" name="status" required>
                  <option value="{{ $dataCctv1->status }}" selected>{{ $dataCctv1->status }}</option>
                    <option value="" disabled>--Select--</option>
                    <option value="Normal">Normal</option>
                    <option value="Rusak">Rusak</option>
                </select>
              </div>
              <div class="col-md-4">
                <label class="form-label">Tanggal Perbaikan</label>
                <input type="text" class="form-control datepicker" id="tgl_perbaikan" name="tgl_perbaikan" placeholder="Tanggal Perbaikan" value="{{ old('tgl_perbaikan', $dataCctv1->tgl_perbaikan) }}">
              </div>
              <div class="col-md-4">
                <label class="form-label">Petugas Perbaikan</label>
                <input type="text" class="form-control" id="petugas_perbaikan" name="petugas_perbaikan" placeholder="Masukan petugas.." value="{{ old('petugas_perbaikan', $dataCctv1->petugas_perbaikan) }}">
              </div>
              <div class="col-md-4">
                <label class="form-label">Sandi DVR</label>
                <input type="text" class="form-control" id="sandi_dvr" name="sandi_dvr" placeholder="Kata sandi DVR/NVR" value="{{ old('sandi_dvr', $dataCctv1->sandi_dvr) }}">
              </div>
              <div class="col-6">
                <label class="form-label">Kerusakan</label>
                <textarea class="form-control" rows="4" cols="4" id="kerusakan" name="kerusakan" placeholder="Kerusakan pada camera!">{{ $dataCctv1->kerusakan }}</textarea>
             </div>
             <div class="col-6">
              <label class="form-label">Catatan <small>(Optional)</small></label>
              <textarea class="form-control" rows="4" cols="4" id="catatan" name="catatan">{{ $dataCctv1->catatan }}</textarea>
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
            const status = $("#status").val();
            if(status == "Rusak"){
              $("#kerusakan").attr('required', true);
              $("#kerusakan").addClass('is-invalid');
              $("#kerusakan").prop('disabled', false);
              
            }else{
              $("#kerusakan").removeAttr('required', false);
              $("#kerusakan").removeClass('is-invalid');
              $("#kerusakan").prop('disabled', true);
              $("#kerusakan").val('');
            }
          });
        </script>

@endsection