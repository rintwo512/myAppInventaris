@extends('layouts.main')


@section('content')              
        
<div class="row">
<div class="col-xl-9 mx-auto">
  <a href="/dashboard/cctv" class="btn btn-success btn-sm mb-3"><i class="bi bi-arrow-left"></i> Back</a>
  <h6 class="mb-0 text-uppercase">Update Data CCTV Monitor 2</h6>
  <hr/>
  <div class="card">
    <div class="card-body">
      <div class="p-4 border rounded">
        <form action="/dashboard/cctv2/{{ $dataCctv2->id }}" method="post" class="row g-3 needs-validation">
          @method('PUT')       
            @csrf
              <div class="col-md-4">
                <label for="lokasi2" class="form-label">Lokasi <small class="text-danger">*</small></label>
                <input class="form-control" id="lokasi2" name="lokasi2" placeholder="Lokasi Camera" required value="{{ old('lokasi2', $dataCctv2->lokasi)}}">
              </div>
              <div class="col-md-4">
                <label for="merk2" class="form-label">Merk <small class="text-danger">*</small></label>
                <select class="form-control" id="merk2" name="merk2" placeholder="Merk Camera" required>
                    <option value="{{ $dataCctv2->merk }}" selected>{{ $dataCctv2->merk }}</option>
                    <option value="" disabled>--Select--</option>
                    <option value="Hikvision">Hikvision</option>
                    <option value="Dahua">Dahua</option>
                    <option value="SPC">SPC</option>
                    <option value="Krisbow">Krisbow</option>
                  </select>
              </div>
              <div class="col-md-4">
                <label for="type2" class="form-label">Type <small class="text-danger">*</small></label>
                <select class="form-select" id="type2" name="type2" required>
                  <option value="{{ $dataCctv2->type }}" selected>{{ $dataCctv2->type }}</option>
                    <option value="" disabled>--Select--</option>
                    <option value="Analog">Analog</option>                    
                </select>
              </div>
              <div class="col-md-4">
                <label for="resolusi2" class="form-label">Resolusi</label>
                <select class="form-select" id="resolusi2" name="resolusi2">
                  <option value="{{ $dataCctv2->resolusi }}" selected>{{ $dataCctv2->resolusi }}</option>
                    <option value="" disabled>--Select--</option>
                    <option value="1,5MP">1,5MP</option>
                    <option value="2MP">2MP</option>
                    <option value="4MP">4MP</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="tgl_pemasangan2" class="form-label">Tanggal Pemasangan</label>
                <input class="form-control datepicker" id="tgl_pemasangan2" name="tgl_pemasangan2" placeholder="Tanggal Pemasangan Camera" value="{{ old('tgl_pemasangan2', $dataCctv2->tgl_pemasangan)}}">
              </div>
              <div class="col-md-4">
                <label for="petugas_pemasangan2" class="form-label">Petugas Pemasangan</label>
                <input class="form-control text-capitalize" id="petugas_pemasangan2" name="petugas_pemasangan2" placeholder="Petugas Pemasangan Camera" value="{{ old('petugas_pemasangan2', $dataCctv2->petugas_pemasangan) }}">
              </div>
              <div class="col-md-4">
                <label for="status2" class="form-label">Status <small class="text-danger">*</small></label>
                <select class="form-select" id="status2" name="status2" required>
                  <option value="{{ $dataCctv2->status }}" selected>{{ $dataCctv2->status }}</option>
                    <option value="" disabled>--Select--</option>
                    <option value="Normal">Normal</option>
                    <option value="Rusak">Rusak</option>
                </select>
              </div>
              <div class="col-md-4">
                <label class="form-label">Tanggal Perbaikan</label>
                <input type="text" class="form-control datepicker" id="tgl_perbaikan2" name="tgl_perbaikan2" placeholder="Tanggal Perbaikan" value="{{ old('tgl_perbaikan2', $dataCctv2->tgl_perbaikan) }}">
              </div>
              <div class="col-md-4">
                <label class="form-label">Petugas Perbaikan</label>
                <input type="text" class="form-control" id="petugas_perbaikan2" name="petugas_perbaikan2" placeholder="Masukan petugas.." value="{{ old('petugas_perbaikan2', $dataCctv2->petugas_perbaikan) }}">
              </div>
              <div class="col-md-12">
                <label class="form-label">Sandi DVR</label>
                <input type="text" class="form-control" id="sandi_dvr2" name="sandi_dvr2" placeholder="Kata sandi DVR/NVR" value="{{ old('sandi_dvr2', $dataCctv2->sandi_dvr) }}">
              </div>
              <div class="col-6">
                <label class="form-label">Kerusakan</label>
                <textarea class="form-control" rows="4" cols="4" id="kerusakan2" name="kerusakan2" placeholder="Kerusakan pada camera!">{{ $dataCctv2->kerusakan }}</textarea>
             </div>
             <div class="col-6">
              <label class="form-label">Catatan <small>(Optional)</small></label>
              <textarea class="form-control" rows="4" cols="4" id="catatan2" name="catatan2">{{ $dataCctv2->catatan }}</textarea>
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
            const status2 = $("#status2").val();
            if(status2 == "Rusak"){
              $("#kerusakan2").attr('required', true);
              $("#kerusakan2").addClass('is-invalid');
              $("#kerusakan2").prop('disabled', false);
              
            }else{
              $("#kerusakan2").removeAttr('required', false);
              $("#kerusakan2").removeClass('is-invalid');
              $("#kerusakan2").prop('disabled', true);
              $("#kerusakan2").val('');
            }
          });
        </script>

@endsection