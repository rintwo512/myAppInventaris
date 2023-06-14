@extends('layouts.main')


@section('content')

@php use Illuminate\Support\Carbon; @endphp

<style>
     
     img {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

img:hover {opacity: 0.7;}

/* The Modal (background) 2 */
#image-viewer2 {
    display: none;
    position: fixed;
    z-index: 1;
    padding-top: 100px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.9);
}
.modal-content-img2 {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}
.modal-content-img2 { 
    animation-name: zoom2;
    animation-duration: 0.6s;
}
@keyframes zoom2 {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}


/* The Modal (background) 3 */
#image-viewer3 {
    display: none;
    position: fixed;
    z-index: 1;
    padding-top: 100px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.9);
}
.modal-content-img3 {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}
.modal-content-img3 { 
    animation-name: zoom3;
    animation-duration: 0.6s;
}
@keyframes zoom3 {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Modal (background) 4 */
#image-viewer4 {
    display: none;
    position: fixed;
    z-index: 1;
    padding-top: 100px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.9);
}
.modal-content-img4 {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}
.modal-content-img4 { 
    animation-name: zoom4;
    animation-duration: 0.6s;
}
@keyframes zoom4 {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

</style>


            <meta name="csrf-token" content="{{ csrf_token() }}">
            <div class="flash-success" data-success="{{ session('success') }}"></div>
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">              
              <div class="ps-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-table" style="color:#7b378e"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Data CCTV Treg 7</li>
                  </ol>
                </nav>
              </div>              
            </div>

            {{-- TABEL CCTV1 --}}
            <button class="btn btn-primary btn-sm border-0" data-bs-toggle="modal" data-bs-target="#modalAddDataCctvMonitor1"><i class="bi bi-plus"></i> New Data</button>

            @can('admin')              
            <a href="/dashboard/export/cctv" class="mb-0 text-uppercase btn btn-secondary btn-sm">Export</a>
            @endcan

            <a href="/dashboard/trashed/cctv" class="btn btn-secondary btn-sm"><i class="bi bi-trash"></i></a>

          <div class="col-md-4 mt-3">            
              <div class="input-group mb-3">
                  <button class="btn btn-info text-white" type="button" id="btnRange">Search</button>
                  <input type="text" class="form-control input-range" name="rangeQuery">
              </div>            
          </div>

        <hr/>
        <h6 class="mb-2 text-uppercase">Monitor 1/Area Dalam Gedung</h6>
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">              
              <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>                    
                    <th></th>                    
                    <th>Lantai</th>
                    <th>Wing</th>
                    <th>Lokasi</th>
                    <th>Merk</th>                    
                    <th>Type</th>
                    <th>Status</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody> 
                @foreach ($dataCctv1 as $cctv1)
                    <tr>
                      <td>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox">
                        </div>
                      </td>                      
                        <td>{{ $cctv1->lantai }}</td>                
                        <td>{{ $cctv1->wing }}</td>              
                        <td>{{ $cctv1->lokasi }}</td>
                        <td>{{ $cctv1->merk }}</td>
                        <td>{{ $cctv1->type }}</td>
                        @if ($cctv1->status == "Rusak")
                        <td class="bg-danger text-white">{{ $cctv1->status }}</td>
                        @else
                        <td class="bg-success text-white">{{ $cctv1->status }}</td>
                        @endif
                        <td>
                            <div class="table-actions d-flex align-items-center gap-3 fs-6">                            
                                
                                <button id="btnDetailCctv1" class="text-primary border-0 bg-transparent" data-bs-toggle="modal" data-bs-target="#modalDetailDataCctvMonitor1"
                                data-iddetcctv1="{{ $cctv1->id }}"
                                data-lantaidetcctv1="{{ $cctv1->lantai }}"
                                data-wingdetcctv1="{{ $cctv1->wing }}"
                                data-lokasidetcctv1="{{ $cctv1->lokasi }}"
                                data-merkdetcctv1="{{ $cctv1->merk }}"
                                data-typedetcctv1="{{ $cctv1->type }}"
                                data-statusdetcctv1="{{ $cctv1->status }}"
                                data-resolusidetcctv1="{{ $cctv1->resolusi }}"
                                data-tglpemasangandetcctv1="{{ $cctv1->tgl_pemasangan }}"
                                data-petpemasangandetcctv1="{{ $cctv1->petugas_pemasangan }}"
                                data-tglperbaikandetcctv1="{{ $cctv1->tgl_perbaikan }}"
                                data-petperbaikandetcctv1="{{ $cctv1->petugas_perbaikan }}"
                                data-catatandetcctv1="{{ $cctv1->catatan }}"
                                data-kerusakandetcctv1="{{ $cctv1->kerusakan }}"
                                data-userupdatedetcctv1="{{ $cctv1->user_updated }}/{{ Carbon::parse($cctv1->updated_time)->diffForHumans() }}"
                                data-sandidvrdetcctv1="{{ $cctv1->sandi_dvr }}">
                                <i class="bi bi-eye-fill"></i>
                                </button>
                                
                                <a href="/dashboard/cctv/{{ $cctv1->id }}/edit" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="bi bi-pencil-fill"></i>
                                </a>        
                             
                            @can('admin')                              
                            <form action="javascript:delCctv1({{ $cctv1->id }})" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="text-danger btn-delete bg-transparent border-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i class="bi bi-x-circle-fill"></i></button>
                            </form>                              
                            @endcan
                                
                            </div>
                        </td>
                    </tr>                            
                    @endforeach     
                </tbody>
                <tfoot>
                  <tr>
                    <th></th>                    
                    <th>Lantai</th>
                    <th>Wing</th>
                    <th>Lokasi</th>
                    <th>Merk</th>                    
                    <th>Type</th>
                    <th>Status</th>
                    <th>Opsi</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
        {{-- END TABEL CCTV1 --}}


        {{-- TABEL CCTV2 --}}
        <button class="btn btn-primary btn-sm border-0" data-bs-toggle="modal" data-bs-target="#modalAddDataCctvMonitor2"><i class="bi bi-plus"></i> New Data</button>

        @can('admin')              
        <a href="/dashboard/export/cctv2" class="mb-0 text-uppercase btn btn-secondary btn-sm">Export</a>
        @endcan

        <a href="/dashboard/trashed/cctv2" class="btn btn-secondary btn-sm"><i class="bi bi-trash"></i></a>

      <div class="col-md-4 mt-3">            
          <div class="input-group mb-3">
              <button class="btn btn-info text-white" type="button" id="btnRangeCctv2">Search</button>
              <input type="text" class="form-control input-range-cctv2" name="rangeQueryCctv2">
          </div>            
      </div>

    <hr/>
    <h6 class="mb-2 text-uppercase">Monitor 2/Area Luar Gedung</h6>
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">              
          <table id="monitor2" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>Image</th>
                <th>Lokasi</th>
                <th>Merk</th>                    
                <th>Type</th>
                <th>Status</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($dataCctv2 as $cctv2)
              <tr>
                <td class="productlist">
                  <div class="product-box images2">
                      <img src="/assets/cctv2/{{ $cctv2->image }}">
                  </div>                   
                </td>
                <td>{{ $cctv2->lokasi }}</td>                
                <td>{{ $cctv2->merk }}</td>
                <td>{{ $cctv2->type }}</td>
                @if ($cctv2->status == "Rusak")
                <td class="bg-danger text-white">{{ $cctv2->status }}</td>
                @else
                <td class="bg-success text-white">{{ $cctv2->status }}</td>
                @endif
                <td>
                  <div class="table-actions d-flex align-items-center gap-3 fs-6">
                    <button id="btnDetailCctv2" class="text-primary border-0 bg-transparent" data-bs-toggle="modal" data-bs-target="#modalDetailDataCctvMonitor2"
                    data-iddetcctv2="{{ $cctv2->id }}"
                    data-lokasidetcctv2="{{ $cctv2->lokasi }}"
                    data-merkdetcctv2="{{ $cctv2->merk }}"
                    data-typedetcctv2="{{ $cctv2->type }}"
                    data-statusdetcctv2="{{ $cctv2->status }}"
                    data-resolusidetcctv2="{{ $cctv2->resolusi }}"
                    data-tglpemasangandetcctv2="{{ $cctv2->tgl_pemasangan }}"
                    data-petpemasangandetcctv2="{{ $cctv2->petugas_pemasangan }}"
                    data-tglperbaikandetcctv2="{{ $cctv2->tgl_perbaikan }}"
                    data-petperbaikandetcctv2="{{ $cctv2->petugas_perbaikan }}"
                    data-catatandetcctv2="{{ $cctv2->catatan }}"
                    data-kerusakandetcctv2="{{ $cctv2->kerusakan }}"
                    data-userupdatedetcctv2="{{ $cctv2->user_updated }}/{{ Carbon::parse($cctv2->updated_time)->diffForHumans() }}"
                    data-sandidvrdetcctv2="{{ $cctv2->sandi_dvr }}">
                    <i class="bi bi-eye-fill"></i>
                    </button>
                                
                    <a href="/dashboard/cctv2/{{ $cctv2->id }}/edit" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="bi bi-pencil-fill"></i>
                    </a>        
                             
                    @can('admin')                              
                    <form action="javascript:delCctv2({{ $cctv2->id }})" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="text-danger btn-delete bg-transparent border-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i class="bi bi-x-circle-fill"></i></button>
                    </form>                              
                    @endcan
                  </div>
                </td>
              </tr>                               
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>Lokasi</th>
                <th>Merk</th>                    
                <th>Type</th>
                <th>Status</th>
                <th>Opsi</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
    {{-- END TABEL CCTV2 --}}


    {{-- TABEL CCTV3 --}}
    <button class="btn btn-primary btn-sm border-0" data-bs-toggle="modal" data-bs-target="#modalAddDataCctvMonitor3"><i class="bi bi-plus"></i> New Data</button>

    @can('admin')              
    <a href="/dashboard/export/cctv3" class="mb-0 text-uppercase btn btn-secondary btn-sm">Export</a>
    @endcan

    <a href="/dashboard/trashed/cctv3" class="btn btn-secondary btn-sm"><i class="bi bi-trash"></i></a>

  <div class="col-md-4 mt-3">            
      <div class="input-group mb-3">
          <button class="btn btn-info text-white" type="button" id="btnRangeCctv3">Search</button>
          <input type="text" class="form-control input-range-cctv3" name="rangeQueryCctv3">
      </div>            
  </div>

<hr/>
<h6 class="mb-2 text-uppercase">Monitor 3/Area Dalam Gedung</h6>
<div class="card">
  <div class="card-body">
    <div class="table-responsive">              
      <table id="monitor3" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>                    
            <th>Image</th>
            <th>Lantai</th>
            <th>Wing</th>
            <th>Lokasi</th>
            <th>Merk</th>                    
            <th>Type</th>
            <th>Status</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($dataCctv3 as $cctv3)
          <tr>
              <td class="productlist">
                <div class="product-box images3">
                    <img src="/assets/cctv3/{{ $cctv3->image }}">
                </div>                   
              </td>
              <td>{{ $cctv3->lantai }}</td>                
              <td>{{ $cctv3->wing }}</td>              
              <td>{{ $cctv3->lokasi }}</td>
              <td>{{ $cctv3->merk }}</td>
              <td>{{ $cctv3->type }}</td>
              @if ($cctv3->status == "Rusak")
              <td class="bg-danger text-white">{{ $cctv3->status }}</td>
              @else
              <td class="bg-success text-white">{{ $cctv3->status }}</td>
              @endif
              <td>
                  <div class="table-actions d-flex align-items-center gap-3 fs-6">                            
                      
                      <button id="btnDetailCctv3" class="text-primary border-0 bg-transparent" data-bs-toggle="modal" data-bs-target="#modalDetailDataCctvMonitor3"
                      data-iddetcctv3="{{ $cctv3->id }}"
                      data-lantaidetcctv3="{{ $cctv3->lantai }}"
                      data-wingdetcctv3="{{ $cctv3->wing }}"
                      data-lokasidetcctv3="{{ $cctv3->lokasi }}"
                      data-merkdetcctv3="{{ $cctv3->merk }}"
                      data-typedetcctv3="{{ $cctv3->type }}"
                      data-statusdetcctv3="{{ $cctv3->status }}"
                      data-resolusidetcctv3="{{ $cctv3->resolusi }}"
                      data-tglpemasangandetcctv3="{{ $cctv3->tgl_pemasangan }}"
                      data-petpemasangandetcctv3="{{ $cctv3->petugas_pemasangan }}"
                      data-tglperbaikandetcctv3="{{ $cctv3->tgl_perbaikan }}"
                      data-petperbaikandetcctv3="{{ $cctv3->petugas_perbaikan }}"
                      data-catatandetcctv3="{{ $cctv3->catatan }}"
                      data-kerusakandetcctv3="{{ $cctv3->kerusakan }}"
                      data-userupdatedetcctv3="{{ $cctv3->user_updated }}/{{ Carbon::parse($cctv3->updated_time)->diffForHumans() }}"
                      data-sandidvrdetcctv3="{{ $cctv3->sandi_dvr }}">
                      <i class="bi bi-eye-fill"></i>
                      </button>
                      
                      <a href="/dashboard/cctv3/{{ $cctv3->id }}/edit" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="bi bi-pencil-fill"></i>
                      </a>        
                   
                  @can('admin')                              
                  <form action="javascript:delCctv3({{ $cctv3->id }})" method="post">
                      @method('DELETE')
                      @csrf
                      <button class="text-danger btn-delete bg-transparent border-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i class="bi bi-x-circle-fill"></i></button>
                  </form>                              
                  @endcan
                      
                  </div>
              </td>
          </tr>                            
          @endforeach   
        </tbody>
        <tfoot>
          <tr>
            <th>Image</th>
            <th>Lantai</th>
            <th>Wing</th>
            <th>Lokasi</th>
            <th>Merk</th>                    
            <th>Type</th>
            <th>Status</th>
            <th>Opsi</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>
{{-- END TABEL CCTV3 --}}

{{-- TABEL CCTV4 --}}
<button class="btn btn-primary btn-sm border-0" data-bs-toggle="modal" data-bs-target="#modalAddDataCctvMonitor4"><i class="bi bi-plus"></i> New Data</button>

@can('admin')              
<a href="/dashboard/export/cctv4" class="mb-0 text-uppercase btn btn-secondary btn-sm">Export</a>
@endcan

<a href="/dashboard/trashed/cctv4" class="btn btn-secondary btn-sm"><i class="bi bi-trash"></i></a>

<div class="col-md-4 mt-3">            
  <div class="input-group mb-3">
      <button class="btn btn-info text-white" type="button" id="btnRangeCctv4">Search</button>
      <input type="text" class="form-control input-range-cctv4" name="rangeQueryCctv4">
  </div>            
</div>

<hr/>
<h6 class="mb-2 text-uppercase">Monitor 4/Area Luar Gedung</h6>
<div class="card">
<div class="card-body">
<div class="table-responsive">              
  <table id="monitor4" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>Image</th>
        <th>Lokasi</th>
        <th>Merk</th>                    
        <th>Type</th>
        <th>Status</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($dataCctv4 as $cctv4)
              <tr>
                <td class="productlist">
                    <div class="product-box images4">
                        <img src="/assets/cctv4/{{ $cctv4->image }}">
                    </div>                   
                </td>
                <td>{{ $cctv4->lokasi }}</td>                
                <td>{{ $cctv4->merk }}</td>
                <td>{{ $cctv4->type }}</td>
                @if ($cctv4->status == "Rusak")
                <td class="bg-danger text-white">{{ $cctv4->status }}</td>
                @else
                <td class="bg-success text-white">{{ $cctv4->status }}</td>
                @endif
                <td>
                  <div class="table-actions d-flex align-items-center gap-3 fs-6">
                    <button id="btnDetailCctv4" class="text-primary border-0 bg-transparent" data-bs-toggle="modal" data-bs-target="#modalDetailDataCctvMonitor4"
                    data-iddetcctv4="{{ $cctv4->id }}"
                    data-lokasidetcctv4="{{ $cctv4->lokasi }}"
                    data-merkdetcctv4="{{ $cctv4->merk }}"
                    data-typedetcctv4="{{ $cctv4->type }}"
                    data-statusdetcctv4="{{ $cctv4->status }}"
                    data-resolusidetcctv4="{{ $cctv4->resolusi }}"
                    data-tglpemasangandetcctv4="{{ $cctv4->tgl_pemasangan }}"
                    data-petpemasangandetcctv4="{{ $cctv4->petugas_pemasangan }}"
                    data-tglperbaikandetcctv4="{{ $cctv4->tgl_perbaikan }}"
                    data-petperbaikandetcctv4="{{ $cctv4->petugas_perbaikan }}"
                    data-catatandetcctv4="{{ $cctv4->catatan }}"
                    data-kerusakandetcctv4="{{ $cctv4->kerusakan }}"
                    data-userupdatedetcctv4="{{ $cctv4->user_updated }}/{{ Carbon::parse($cctv4->updated_time)->diffForHumans() }}"
                    data-sandidvrdetcctv4="{{ $cctv4->sandi_dvr }}">
                    <i class="bi bi-eye-fill"></i>
                    </button>
                                
                    <a href="/dashboard/cctv4/{{ $cctv4->id }}/edit" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="bi bi-pencil-fill"></i>
                    </a>        
                             
                    @can('admin')                              
                    <form action="javascript:delCctv4({{ $cctv4->id }})" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="text-danger btn-delete bg-transparent border-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i class="bi bi-x-circle-fill"></i></button>
                    </form>                              
                    @endcan
                  </div>
                </td>
              </tr>                               
              @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th>Image</th>
        <th>Lokasi</th>
        <th>Merk</th>                    
        <th>Type</th>
        <th>Status</th>
        <th>Opsi</th>
      </tr>
    </tfoot>
  </table>
</div>
</div>
</div>
{{-- END TABEL CCTV4 --}}

            <!-- Modal add data cctv1 -->
            <div class="modal fade" id="modalAddDataCctvMonitor1" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">New Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">                                    
                <form action="/dashboard/cctv" class="row g-3 needs-validation" method="post">                    
                  @csrf
                  <div class="col-md-4">
                    <label for="lantai" class="form-label">Lantai <small class="text-danger">*</small></label>
                    <select class="form-select" id="lantai" name="lantai" required>
                        <option value="" disabled selected>--Select--</option>
                        <option value="Lt1">Lt1</option>
                        <option value="Lt2">Lt2</option>
                        <option value="Lt3">Lt3</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="wing" class="form-label">Wing <small class="text-danger">*</small></label>
                    <select class="form-select" id="wing" name="wing" required>
                        <option value="" disabled selected>--Select--</option>
                        <option value="WA">WA</option>
                        <option value="WB">WB</option>
                        <option value="WC">WC</option>
                        <option value="WD">WD</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="lokasi" class="form-label">Lokasi <small class="text-danger">*</small></label>
                    <input class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi Camera" required>
                  </div>
                  <div class="col-md-4">
                    <label for="merk" class="form-label">Merk <small class="text-danger">*</small></label>
                    <select class="form-control" id="merk" name="merk" placeholder="Merk Camera" required>
                      <option value="" disabled selected>--Select--</option>
                      <option value="Hikvision">Hikvision</option>
                      <option value="Dahua">Dahua</option>
                      <option value="SPC">SPC</option>
                      <option value="Krisbow">Krisbow</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="type" class="form-label">Type <small class="text-danger">*</small></label>
                    <select class="form-select" id="type" name="type" required>
                        <option value="" disabled selected>--Select--</option>
                        <option value="Analog">Analog</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="resolusi" class="form-label">Resolusi</label>
                    <select class="form-select" id="resolusi" name="resolusi">
                        <option value="" disabled selected>--Select--</option>
                        <option value="1,5MP">1,5MP</option>
                        <option value="2MP">2MP</option>
                        <option value="4MP">4MP</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="tgl_pemasangan" class="form-label">Tanggal Pemasangan</label>
                    <input class="form-control datepicker" id="tgl_pemasangan" name="tgl_pemasangan" placeholder="Tanggal Pemasangan Camera">
                  </div>
                  <div class="col-md-4">
                    <label for="petugas_pemasangan" class="form-label">Petugas Pemasangan</label>
                    <input class="form-control text-capitalize" id="petugas_pemasangan" name="petugas_pemasangan" placeholder="Petugas Pemasangan Camera">
                  </div>
                  <div class="col-md-4">
                    <label for="status" class="form-label">Status <small class="text-danger">*</small></label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="" disabled selected>--Select--</option>
                        <option value="Normal">Normal</option>
                        <option value="Rusak">Rusak</option>
                    </select>
                  </div>
                  <div class="col-12">
                    <label class="form-label">Sandi DVR</label>
                    <input type="text" class="form-control" id="sandi_dvr" name="sandi_dvr" placeholder="Kata sandi DVR/NVR">
                  </div>
                  <div class="col-12">
                    <label class="form-label">Kerusakan</label>
                    <textarea class="form-control" rows="4" cols="4" id="kerusakan" name="kerusakan" placeholder="Kerusakan pada camera!"></textarea>
                  </div>

                </div>
                <div class="modal-footer">         
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>                                    
                </div>
              </div>
            </div>
            <!-- End modal add data cctv1 -->

            <!-- Modal add data cctv2 -->
            <div class="modal fade" id="modalAddDataCctvMonitor2" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">New Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">                                    
                <form action="/dashboard/cctv2" class="row g-3 needs-validation" method="post">                    
                  @csrf
                  <div class="col-md-4">
                    <label for="lokasi" class="form-label">Lokasi <small class="text-danger">*</small></label>
                    <input class="form-control text-capitalize" id="lokasi2" name="lokasi2" placeholder="Lokasi Camera" required>
                  </div>
                  <div class="col-md-4">
                    <label for="merk2" class="form-label">Merk <small class="text-danger">*</small></label>
                    <select class="form-control text-capitalize" id="merk2" name="merk2" placeholder="Merk Camera" required>
                      <option value="" disabled selected>--Select--</option>
                      <option value="Hikvision">Hikvision</option>
                      <option value="Dahua">Dahua</option>
                      <option value="SPC">SPC</option>
                      <option value="Krisbow">Krisbow</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="type" class="form-label">Type <small class="text-danger">*</small></label>
                    <select class="form-select" id="type2" name="type2" required>
                        <option value="" disabled selected>--Select--</option>
                        <option value="Analog">Analog</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="resolusi2" class="form-label">Resolusi</label>
                    <select class="form-select" id="resolusi2" name="resolusi2">
                        <option value="" disabled selected>--Select--</option>
                        <option value="1,5MP">1,5MP</option>
                        <option value="2MP">2MP</option>
                        <option value="4MP">4MP</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="tgl_pemasangan2" class="form-label">Tanggal Pemasangan</label>
                    <input class="form-control datepicker" id="tgl_pemasangan2" name="tgl_pemasangan2" placeholder="Tanggal Pemasangan Camera">
                  </div>
                  <div class="col-md-4">
                    <label for="petugas_pemasangan2" class="form-label">Petugas Pemasangan</label>
                    <input class="form-control text-capitalize" id="petugas_pemasangan2" name="petugas_pemasangan2" placeholder="Petugas Pemasangan Camera">
                  </div>
                  <div class="col-md-6">
                    <label for="status2" class="form-label">Status <small class="text-danger">*</small></label>
                    <select class="form-select" id="status2" name="status2" required>
                        <option value="" disabled selected>--Select--</option>
                        <option value="Normal">Normal</option>
                        <option value="Rusak">Rusak</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Sandi DVR</label>
                    <input type="text" class="form-control" id="sandi_dvr2" name="sandi_dvr2" placeholder="Kata sandi DVR/NVR">
                  </div>
                  <div class="col-12">
                    <label class="form-label">Kerusakan</label>
                    <textarea class="form-control" rows="4" cols="4" id="kerusakan2" name="kerusakan2" placeholder="Kerusakan pada camera!"></textarea>
                  </div>

                </div>
                <div class="modal-footer">         
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>                                    
                </div>
              </div>
            </div>
            <!-- End modal add data cctv2 -->

            <!-- Modal add data cctv3 -->
            <div class="modal fade" id="modalAddDataCctvMonitor3" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">New Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">                                    
                <form action="/dashboard/cctv3" class="row g-3 needs-validation" method="post">                    
                  @csrf
                  <div class="col-md-4">
                    <label for="lantai3" class="form-label">Lantai <small class="text-danger">*</small></label>
                    <select class="form-select" id="lantai3" name="lantai3" required>
                        <option value="" disabled selected>--Select--</option>
                        <option value="Lt1">Lt1</option>
                        <option value="Lt2">Lt2</option>
                        <option value="Lt3">Lt3</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="wing3" class="form-label">Wing <small class="text-danger">*</small></label>
                    <select class="form-select" id="wing3" name="wing3" required>
                        <option value="" disabled selected>--Select--</option>
                        <option value="WA">WA</option>
                        <option value="WB">WB</option>
                        <option value="WC">WC</option>
                        <option value="WD">WD</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="lokasi3" class="form-label">Lokasi <small class="text-danger">*</small></label>
                    <input class="form-control" id="lokasi3" name="lokasi3" placeholder="Lokasi Camera" required>
                  </div>
                  <div class="col-md-4">
                    <label for="merk3" class="form-label">Merk <small class="text-danger">*</small></label>
                    <select class="form-control" id="merk3" name="merk3" placeholder="Merk Camera" required>
                      <option value="" disabled selected>--Select--</option>
                      <option value="Hikvision">Hikvision</option>
                      <option value="Dahua">Dahua</option>
                      <option value="SPC">SPC</option>
                      <option value="Krisbow">Krisbow</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="type3" class="form-label">Type <small class="text-danger">*</small></label>
                    <select class="form-select" id="type3" name="type3" required>
                        <option value="" disabled selected>--Select--</option>
                        <option value="Analog">Analog</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="resolusi3" class="form-label">Resolusi</label>
                    <select class="form-select" id="resolusi3" name="resolusi3">
                        <option value="" disabled selected>--Select--</option>
                        <option value="1,5MP">1,5MP</option>
                        <option value="2MP">2MP</option>
                        <option value="4MP">4MP</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="tgl_pemasangan3" class="form-label">Tanggal Pemasangan</label>
                    <input class="form-control datepicker" id="tgl_pemasangan3" name="tgl_pemasangan3" placeholder="Tanggal Pemasangan Camera">
                  </div>
                  <div class="col-md-4">
                    <label for="petugas_pemasangan3" class="form-label">Petugas Pemasangan</label>
                    <input class="form-control text-capitalize" id="petugas_pemasangan3" name="petugas_pemasangan3" placeholder="Petugas Pemasangan Camera">
                  </div>
                  <div class="col-md-4">
                    <label for="status3" class="form-label">Status <small class="text-danger">*</small></label>
                    <select class="form-select" id="status3" name="status3" required>
                        <option value="" disabled selected>--Select--</option>
                        <option value="Normal">Normal</option>
                        <option value="Rusak">Rusak</option>
                    </select>
                  </div>
                  <div class="col-12">
                    <label class="form-label">Sandi DVR</label>
                    <input type="text" class="form-control" id="sandi_dvr3" name="sandi_dvr3" placeholder="Kata sandi DVR/NVR">
                  </div>
                  <div class="col-12">
                    <label class="form-label">Kerusakan</label>
                    <textarea class="form-control" rows="4" cols="4" id="kerusakan3" name="kerusakan3" placeholder="Kerusakan pada camera!"></textarea>
                  </div>

                </div>
                <div class="modal-footer">         
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>                                    
                </div>
              </div>
            </div>
            <!-- End modal add data cctv3 -->

            <!-- Modal add data cctv4 -->
            <div class="modal fade" id="modalAddDataCctvMonitor4" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">New Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">                                    
                <form action="/dashboard/cctv4" class="row g-3 needs-validation" method="post">                    
                  @csrf
                  <div class="col-md-4">
                    <label for="lokasi4" class="form-label">Lokasi <small class="text-danger">*</small></label>
                    <input class="form-control text-capitalize" id="lokasi4" name="lokasi4" placeholder="Lokasi Camera" required>
                  </div>
                  <div class="col-md-4">
                    <label for="merk4" class="form-label">Merk <small class="text-danger">*</small></label>
                    <select class="form-control text-capitalize" id="merk4" name="merk4" placeholder="Merk Camera" required>
                      <option value="" disabled selected>--Select--</option>
                      <option value="Hikvision">Hikvision</option>
                      <option value="Dahua">Dahua</option>
                      <option value="SPC">SPC</option>
                      <option value="Krisbow">Krisbow</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="type4" class="form-label">Type <small class="text-danger">*</small></label>
                    <select class="form-select" id="type4" name="type4" required>
                        <option value="" disabled selected>--Select--</option>
                        <option value="Ip Cam">Ip Cam</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="resolusi4" class="form-label">Resolusi</label>
                    <select class="form-select" id="resolusi4" name="resolusi4">
                        <option value="" disabled selected>--Select--</option>
                        <option value="1,5MP">1,5MP</option>
                        <option value="2MP">2MP</option>
                        <option value="4MP">4MP</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="tgl_pemasangan4" class="form-label">Tanggal Pemasangan</label>
                    <input class="form-control datepicker" id="tgl_pemasangan4" name="tgl_pemasangan4" placeholder="Tanggal Pemasangan Camera">
                  </div>
                  <div class="col-md-4">
                    <label for="petugas_pemasangan4" class="form-label">Petugas Pemasangan</label>
                    <input class="form-control text-capitalize" id="petugas_pemasangan4" name="petugas_pemasangan4" placeholder="Petugas Pemasangan Camera">
                  </div>
                  <div class="col-md-6">
                    <label for="status4" class="form-label">Status <small class="text-danger">*</small></label>
                    <select class="form-select" id="status4" name="status4" required>
                        <option value="" disabled selected>--Select--</option>
                        <option value="Normal">Normal</option>
                        <option value="Rusak">Rusak</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Sandi DVR</label>
                    <input type="text" class="form-control" id="sandi_dvr4" name="sandi_dvr4" placeholder="Kata sandi DVR/NVR">
                  </div>
                  <div class="col-12">
                    <label class="form-label">Kerusakan</label>
                    <textarea class="form-control" rows="4" cols="4" id="kerusakan4" name="kerusakan4" placeholder="Kerusakan pada camera!"></textarea>
                  </div>

                </div>
                <div class="modal-footer">         
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>                                    
                </div>
              </div>
            </div>
            <!-- End modal add data cctv4 -->

            



            {{-- Modal Detail cctv1 --}}        
            <div class="modal fade" id="modalDetailDataCctvMonitor1" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Detail Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" id="modalDetailCctv1">
                    <div class="card">                      
                        <ul class="list-group">                        
                          <li class="list-group-item d-flex justify-content-between align-items-center">Di ubah <i class="bi bi-arrow-right"></i> <span id="detailUpdatedCCTV1"></span>
                          <li class="list-group-item d-flex justify-content-between align-items-center">Tanggal Pemasangan <i class="bi bi-arrow-right"></i> <span id="detailTanggalPemasanganCCTV1"></span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center">Petugas Pemasangan <i class="bi bi-arrow-right"></i> <span id="detailPetugasPemasanganCCTV1"></span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center">Tanggal Perbaikan <i class="bi bi-arrow-right"></i> <span id="detailTglPerbaikanCCTV1"></span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center">Petugas Perbaikan <i class="bi bi-arrow-right"></i> <span id="detailPetugasPerbaikanCCTV1"></span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center">Lantai <i class="bi bi-arrow-right"></i> <span id="detailLantaiCCTV1"></span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center">Wing <i class="bi bi-arrow-right"></i> <span id="detailWingCCTV1"></span>
                          </li>                        
                          <li class="list-group-item d-flex justify-content-between align-items-center">Lokasi <i class="bi bi-arrow-right"></i> <span id="detailLokasiCCTV1"></span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center">Merk <i class="bi bi-arrow-right"></i> <span id="detailMerkCCTV1"></span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center">Type <i class="bi bi-arrow-right"></i> <span id="detailTypeCCTV1"></span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center">Resolusi <i class="bi bi-arrow-right"></i> <span id="detailResolusiCCTV1"></span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center">Status <i class="bi bi-arrow-right"></i> <span id="detailStatusCCTV1"></span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center">Kata Sandi DVR <i class="bi bi-arrow-right"></i> <span id="detailSandiDvrCCTV1"></span>
                          </li>
                          
                          <div class="accordion-item detailKerusakanCCTV1">
                            <h2 class="accordion-header" id="headingTwo">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Kerusakan
                              </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                              <div class="accordion-body" id="detailKerusakanCCTV1">
                              </div>
                            </div>
                          </div>

                          <div class="accordion-item detailCatatanCCTV1">
                            <h2 class="accordion-header" id="headingThree">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Catatan
                              </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                              <div class="accordion-body" id="detailCatatanCCTV1">
                                
                              </div>
                            </div>
                          </div>
                          
                        </ul>                      
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>                 
                  </div>
                </div>
              </div>
            </div>        
          {{-- end modal detail cctv1 --}}

          {{-- Modal Detail cctv2 --}}        
          <div class="modal fade" id="modalDetailDataCctvMonitor2" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Detail Data</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalDetailCctv2">
                  <div class="card">                      
                      <ul class="list-group">                        
                        <li class="list-group-item d-flex justify-content-between align-items-center">Di ubah <i class="bi bi-arrow-right"></i> <span id="detailUpdatedCCTV2"></span>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Tanggal Pemasangan <i class="bi bi-arrow-right"></i> <span id="detailTanggalPemasanganCCTV2"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Petugas Pemasangan <i class="bi bi-arrow-right"></i> <span id="detailPetugasPemasanganCCTV2"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Tanggal Perbaikan <i class="bi bi-arrow-right"></i> <span id="detailTglPerbaikanCCTV2"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Petugas Perbaikan <i class="bi bi-arrow-right"></i> <span id="detailPetugasPerbaikanCCTV2"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Lokasi <i class="bi bi-arrow-right"></i> <span id="detailLokasiCCTV2"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Merk <i class="bi bi-arrow-right"></i> <span id="detailMerkCCTV2"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Type <i class="bi bi-arrow-right"></i> <span id="detailTypeCCTV2"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Resolusi <i class="bi bi-arrow-right"></i> <span id="detailResolusiCCTV2"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Status <i class="bi bi-arrow-right"></i> <span id="detailStatusCCTV2"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Kata Sandi DVR <i class="bi bi-arrow-right"></i> <span id="detailSandiDvrCCTV2"></span>
                        </li>
                        
                        <div class="accordion-item detailKerusakanCCTV2">
                          <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              Kerusakan
                            </button>
                          </h2>
                          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body" id="detailKerusakanCCTV2">
                            </div>
                          </div>
                        </div>

                        <div class="accordion-item detailCatatanCCTV2">
                          <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              Catatan
                            </button>
                          </h2>
                          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body" id="detailCatatanCCTV2">
                              
                            </div>
                          </div>
                        </div>
                        
                      </ul>                      
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>                 
                </div>
              </div>
            </div>
          </div>        
        {{-- end modal detail cctv2 --}}

          {{-- Modal Detail cctv3 --}}        
          <div class="modal fade" id="modalDetailDataCctvMonitor3" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Detail Data</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalDetailCctv3">
                  <div class="card">                      
                      <ul class="list-group">                        
                        <li class="list-group-item d-flex justify-content-between align-items-center">Di ubah <i class="bi bi-arrow-right"></i> <span id="detailUpdatedCCTV3"></span>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Tanggal Pemasangan <i class="bi bi-arrow-right"></i> <span id="detailTanggalPemasanganCCTV3"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Petugas Pemasangan <i class="bi bi-arrow-right"></i> <span id="detailPetugasPemasanganCCTV3"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Tanggal Perbaikan <i class="bi bi-arrow-right"></i> <span id="detailTglPerbaikanCCTV3"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Petugas Perbaikan <i class="bi bi-arrow-right"></i> <span id="detailPetugasPerbaikanCCTV3"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Lantai <i class="bi bi-arrow-right"></i> <span id="detailLantaiCCTV3"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Wing <i class="bi bi-arrow-right"></i> <span id="detailWingCCTV3"></span>
                        </li>                        
                        <li class="list-group-item d-flex justify-content-between align-items-center">Lokasi <i class="bi bi-arrow-right"></i> <span id="detailLokasiCCTV3"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Merk <i class="bi bi-arrow-right"></i> <span id="detailMerkCCTV3"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Type <i class="bi bi-arrow-right"></i> <span id="detailTypeCCTV3"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Resolusi <i class="bi bi-arrow-right"></i> <span id="detailResolusiCCTV3"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Status <i class="bi bi-arrow-right"></i> <span id="detailStatusCCTV3"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Kata Sandi DVR <i class="bi bi-arrow-right"></i> <span id="detailSandiDvrCCTV3"></span>
                        </li>
                        
                        <div class="accordion-item detailKerusakanCCTV3">
                          <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              Kerusakan
                            </button>
                          </h2>
                          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body" id="detailKerusakanCCTV3">
                            </div>
                          </div>
                        </div>

                        <div class="accordion-item detailCatatanCCTV3">
                          <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              Catatan
                            </button>
                          </h2>
                          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body" id="detailCatatanCCTV3">
                              
                            </div>
                          </div>
                        </div>
                        
                      </ul>                      
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>                 
                </div>
              </div>
            </div>
          </div>        
        {{-- end modal detail cctv3 --}}

        {{-- Modal Detail cctv4 --}}        
        <div class="modal fade" id="modalDetailDataCctvMonitor4" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Detail Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body" id="modalDetailCctv4">
                <div class="card">                      
                    <ul class="list-group">                        
                      <li class="list-group-item d-flex justify-content-between align-items-center">Di ubah <i class="bi bi-arrow-right"></i> <span id="detailUpdatedCCTV4"></span>
                      <li class="list-group-item d-flex justify-content-between align-items-center">Tanggal Pemasangan <i class="bi bi-arrow-right"></i> <span id="detailTanggalPemasanganCCTV4"></span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">Petugas Pemasangan <i class="bi bi-arrow-right"></i> <span id="detailPetugasPemasanganCCTV4"></span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">Tanggal Perbaikan <i class="bi bi-arrow-right"></i> <span id="detailTglPerbaikanCCTV4"></span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">Petugas Perbaikan <i class="bi bi-arrow-right"></i> <span id="detailPetugasPerbaikanCCTV4"></span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">Lokasi <i class="bi bi-arrow-right"></i> <span id="detailLokasiCCTV4"></span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">Merk <i class="bi bi-arrow-right"></i> <span id="detailMerkCCTV4"></span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">Type <i class="bi bi-arrow-right"></i> <span id="detailTypeCCTV4"></span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">Resolusi <i class="bi bi-arrow-right"></i> <span id="detailResolusiCCTV4"></span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">Status <i class="bi bi-arrow-right"></i> <span id="detailStatusCCTV4"></span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">Kata Sandi DVR <i class="bi bi-arrow-right"></i> <span id="detailSandiDvrCCTV4"></span>
                      </li>
                      
                      <div class="accordion-item detailKerusakanCCTV4">
                        <h2 class="accordion-header" id="headingTwo">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Kerusakan
                          </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                          <div class="accordion-body" id="detailKerusakanCCTV4">
                          </div>
                        </div>
                      </div>

                      <div class="accordion-item detailCatatanCCTV4">
                        <h2 class="accordion-header" id="headingThree">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Catatan
                          </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                          <div class="accordion-body" id="detailCatatanCCTV4">
                            
                          </div>
                        </div>
                      </div>
                      
                    </ul>                      
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>                 
              </div>
            </div>
          </div>
        </div>        
      {{-- end modal detail cctv4 --}}



          {{-- modal range data cctv1--}}
          <div class="modal fade" id="modalRangeData" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="rangeTitle">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="card-body">
                    <table class="table table-bordered mb-0">
                      <thead>
                        <tr>                  
                          <th scope="col">Lantai</th>
                          <th scope="col">Wing</th>                  
                          <th scope="col">Lokasi</th>
                          <th scope="col">Merk</th>
                          <th scope="col">Type</th>
                          <th scope="col">Status</th>
                          <th scope="col">Diperbarui pada</th>
                          <th scope="col">By</th>
                        </tr>
                      </thead>
                      <tbody id="rangeData">
                                        
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
          {{-- end modal range data cctv1--}}


          {{-- modal range data cctv2--}}
          <div class="modal fade" id="modalRangeDataCctv2" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="rangeTitleCctv2">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="card-body">
                    <table class="table table-bordered mb-0">
                      <thead>
                        <tr>                                         
                          <th scope="col">Lokasi</th>
                          <th scope="col">Merk</th>
                          <th scope="col">Type</th>
                          <th scope="col">Status</th>
                          <th scope="col">Diperbarui pada</th>
                          <th scope="col">By</th>
                        </tr>
                      </thead>
                      <tbody id="rangeDataCctv2">
                                        
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
          {{-- end modal range data cctv2--}}


         {{-- modal range data cctv3--}}
         <div class="modal fade" id="modalRangeDataCctv3" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="rangeTitleCctv3">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="card-body">
                  <table class="table table-bordered mb-0">
                    <thead>
                      <tr>                  
                        <th scope="col">Lantai</th>
                        <th scope="col">Wing</th>                  
                        <th scope="col">Lokasi</th>
                        <th scope="col">Merk</th>
                        <th scope="col">Type</th>
                        <th scope="col">Status</th>
                        <th scope="col">Diperbarui pada</th>
                        <th scope="col">By</th>
                      </tr>
                    </thead>
                    <tbody id="rangeDataCctv3">
                                      
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
        {{-- end modal range data cctv3--}}

        {{-- modal range data cctv4--}}
        <div class="modal fade" id="modalRangeDataCctv4" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="rangeTitleCctv4">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="card-body">
                  <table class="table table-bordered mb-0">
                    <thead>
                      <tr>                                         
                        <th scope="col">Lokasi</th>
                        <th scope="col">Merk</th>
                        <th scope="col">Type</th>
                        <th scope="col">Status</th>
                        <th scope="col">Diperbarui pada</th>
                        <th scope="col">By</th>
                      </tr>
                    </thead>
                    <tbody id="rangeDataCctv4">
                                      
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
        {{-- end modal range data cctv4--}}

        {{-- Lightbox --}}
        <div id="image-viewer4">          
          <img class="modal-content-img4" id="full-image4">
        </div>

        <div id="image-viewer3">          
          <img class="modal-content-img3" id="full-image3">
        </div>

        <div id="image-viewer2">          
          <img class="modal-content-img2" id="full-image2">
        </div>
        {{-- End lightbox --}}

        <script src="/assets/js/jquery.min.js"></script>  
        {{-- <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script> --}}
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
        
        {{-- delete cctv1 --}}
        <script>
            function delCctv1(id) {                
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/dashboard/cctv/' + id
                      }
                    })
            };
        </script>
        {{-- delete cctv1 --}}

        {{-- script details cctv1 --}}
        <script>

            $(document).on("click", "#btnDetailCctv1", function(e) {
                e.preventDefault();
                const iddetcctv1 = $(this).data("iddetcctv1");
                const lantaidetcctv1 = $(this).data("lantaidetcctv1");
                const wingdetcctv1 = $(this).data('wingdetcctv1');
                const merkdetcctv1 = $(this).data('merkdetcctv1');
                const lokasidetcctv1 = $(this).data('lokasidetcctv1');
                const typedetcctv1 = $(this).data('typedetcctv1');
                const statusdetcctv1 = $(this).data('statusdetcctv1');
                const resolusidetcctv1 = $(this).data('resolusidetcctv1');
                const tglpemasangandetcctv1 = $(this).data('tglpemasangandetcctv1');
                const petpemasangandetcctv1 = $(this).data('petpemasangandetcctv1');
                const tglperbaikandetcctv1 = $(this).data('tglperbaikandetcctv1');
                const petperbaikandetcctv1 = $(this).data('petperbaikandetcctv1');
                const catatandetcctv1 = $(this).data('catatandetcctv1');
                const kerusakandetcctv1 = $(this).data('kerusakandetcctv1');
                const userupdatedetcctv1 = $(this).data('userupdatedetcctv1');
                const sandidvrdetcctv1 = $(this).data('sandidvrdetcctv1');

                if(userupdatedetcctv1 == "/1 detik yang lalu"){

                  $("#detailUpdatedCCTV1").html('');
                }else{

                  $("#detailUpdatedCCTV1").html(userupdatedetcctv1);
                }

                const statusCctv1 = document.querySelector('#detailStatusCCTV1');
                if(statusdetcctv1 == "Rusak"){
                  statusCctv1.style.backgroundColor = '#E83939';
                  statusCctv1.style.padding = '5px 5px 5px 5px';
                  statusCctv1.style.color = 'white';
                }else{
                  statusCctv1.style.backgroundColor = '#1EC22F';
                  statusCctv1.style.padding = '5px 5px 5px 5px';
                  statusCctv1.style.color = 'white';
                }
                
                $("#modalDetailCctv1 #detailTanggalPemasanganCCTV1").text(tglpemasangandetcctv1);
                $("#modalDetailCctv1 #detailPetugasPemasanganCCTV1").text(petpemasangandetcctv1);
                $("#modalDetailCctv1 #detailTglPerbaikanCCTV1").text(tglperbaikandetcctv1);
                $("#modalDetailCctv1 #detailPetugasPerbaikanCCTV1").text(petperbaikandetcctv1);
                $("#modalDetailCctv1 #detailLantaiCCTV1").text(lantaidetcctv1);
                $("#modalDetailCctv1 #detailWingCCTV1").text(wingdetcctv1);
                $("#modalDetailCctv1 #detailLokasiCCTV1").text(lokasidetcctv1);
                $("#modalDetailCctv1 #detailMerkCCTV1").text(merkdetcctv1);
                $("#modalDetailCctv1 #detailTypeCCTV1").text(typedetcctv1);
                $("#modalDetailCctv1 #detailResolusiCCTV1").text(resolusidetcctv1);
                $("#modalDetailCctv1 #detailStatusCCTV1").text(statusdetcctv1);
                $("#modalDetailCctv1 #detailSandiDvrCCTV1").text(sandidvrdetcctv1);
                $("#modalDetailCctv1 #detailKerusakanCCTV1").text(kerusakandetcctv1);
                $("#modalDetailCctv1 #detailCatatanCCTV1").text(catatandetcctv1);
                
            });

        </script>
        {{-- end script details cctv1 --}}

        {{-- validate cctv1 --}}
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
        {{-- end validate cctv1 --}}

        {{-- date range picker cctv1 --}}
        <script type="text/javascript">
          $(function() {
          
            $('input[name="rangeQuery"]').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                }
            });
          
            $('input[name="rangeQuery"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
            });
          
            $('input[name="rangeQuery"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });
          
          });
          </script>
          {{-- end date range picker cctv1 --}}

          {{-- fungsi cari data dengan range tanggal cctv1 --}}
          <script>
            $(document).on('click', '#btnRange', function() {
              const nilai = $('.input-range').val();              
              const start = nilai.slice(0,11).split('-').join('/');
              const end = nilai.slice(13,23).split('-').join('/');
              
              $.ajax({
                url: "/dashboard/range/cctv/" + nilai,
                type: "GET",               
                success : result => {
                  let card = '';
                  result.forEach(e => {
                    $('#modalRangeData').modal('show');
                    $("#rangeTitle").text(`Data : ${start} - ${end}`);
                    card += updateCard(e);
                  });
                  $("#rangeData").html(card);
                }
              });
            });


            function updateCard(e){
              
              let date = Date.parse(e.updated_at);              
              let newD = new Date(date);
              let year = newD.getFullYear();
              let month = newD.getMonth() + 1;
              let day = newD.getUTCDate();
              return `<tr>                  
                      <td>${e.lantai}</td>
                      <td>${e.wing}</td>
                      <td>${e.lokasi}</td>
                      <td>${e.merk}</td>
                      <td>${e.type}</td>
                      ${e.status == "Rusak" ? `<td style="background:#E72E2E;color:white">${e.status}</td>` : `<td style="background:#11B522;color:white">${e.status}</td>`}
                      <td>${year}-${month}-${day}</td>
                      <td>${e.user_updated}</td>
                      </tr>`;
            }
          </script>
          {{-- fungsi cari data dengan range tanggal cctv1 --}}


          {{-- delete cctv2 --}}
        <script>
          function delCctv2(id) {                
              Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                  if (result.isConfirmed) {
                      window.location.href = '/dashboard/cctv2/' + id
                    }
                  })
          };
      </script>
      {{-- delete cctv2 --}}

      {{-- script details cctv2 --}}
        <script>

          $(document).on("click", "#btnDetailCctv2", function(e) {
              e.preventDefault();
              const iddetcctv2 = $(this).data("iddetcctv2");             
              const merkdetcctv2 = $(this).data('merkdetcctv2');
              const lokasidetcctv2 = $(this).data('lokasidetcctv2');
              const typedetcctv2 = $(this).data('typedetcctv2');
              const statusdetcctv2 = $(this).data('statusdetcctv2');
              const resolusidetcctv2 = $(this).data('resolusidetcctv2');
              const tglpemasangandetcctv2 = $(this).data('tglpemasangandetcctv2');
              const petpemasangandetcctv2 = $(this).data('petpemasangandetcctv2');
              const tglperbaikandetcctv2 = $(this).data('tglperbaikandetcctv2');
              const petperbaikandetcctv2 = $(this).data('petperbaikandetcctv2');
              const catatandetcctv2 = $(this).data('catatandetcctv2');
              const kerusakandetcctv2 = $(this).data('kerusakandetcctv2');
              const userupdatedetcctv2 = $(this).data('userupdatedetcctv2');
              const sandidvrdetcctv2 = $(this).data('sandidvrdetcctv2');

              if(userupdatedetcctv2 == "/1 detik yang lalu"){

                $("#detailUpdatedCCTV2").html('');
              }else{

                $("#detailUpdatedCCTV2").html(userupdatedetcctv2);
              }

              const statusCctv2 = document.querySelector('#detailStatusCCTV2');
              if(statusdetcctv2 == "Rusak"){
                  statusCctv2.style.backgroundColor = '#E83939';
                  statusCctv2.style.padding = '5px 5px 5px 5px';
                  statusCctv2.style.color = 'white';
                }else{
                  statusCctv2.style.backgroundColor = '#1EC22F';
                  statusCctv2.style.padding = '5px 5px 5px 5px';
                  statusCctv2.style.color = 'white';
              }

              $("#modalDetailCctv2 #detailTanggalPemasanganCCTV2").text(tglpemasangandetcctv2);
              $("#modalDetailCctv2 #detailPetugasPemasanganCCTV2").text(petpemasangandetcctv2);
              $("#modalDetailCctv2 #detailTglPerbaikanCCTV2").text(tglperbaikandetcctv2);
              $("#modalDetailCctv2 #detailPetugasPerbaikanCCTV2").text(petperbaikandetcctv2);             
              $("#modalDetailCctv2 #detailLokasiCCTV2").text(lokasidetcctv2);
              $("#modalDetailCctv2 #detailMerkCCTV2").text(merkdetcctv2);
              $("#modalDetailCctv2 #detailTypeCCTV2").text(typedetcctv2);
              $("#modalDetailCctv2 #detailResolusiCCTV2").text(resolusidetcctv2);
              $("#modalDetailCctv2 #detailStatusCCTV2").text(statusdetcctv2);
              $("#modalDetailCctv2 #detailSandiDvrCCTV2").text(sandidvrdetcctv2);
              $("#modalDetailCctv2 #detailKerusakanCCTV2").text(kerusakandetcctv2);
              $("#modalDetailCctv2 #detailCatatanCCTV2").text(catatandetcctv2);
              
          });

      </script>
      {{-- end script details cctv2 --}}

      {{-- validate cctv2 --}}
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
      {{-- end validate cctv2 --}}

      {{-- date range picker cctv2 --}}
      <script type="text/javascript">
        $(function() {
        
          $('input[name="rangeQueryCctv2"]').daterangepicker({
              autoUpdateInput: false,
              locale: {
                  cancelLabel: 'Clear'
              }
          });
        
          $('input[name="rangeQueryCctv2"]').on('apply.daterangepicker', function(ev, picker) {
              $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
          });
        
          $('input[name="rangeQueryCctv2"]').on('cancel.daterangepicker', function(ev, picker) {
              $(this).val('');
          });
        
        });
        </script>
        {{-- end date range picker cctv2 --}}

        {{-- fungsi cari data dengan range tanggal cctv2 --}}
        <script>
          $(document).on('click', '#btnRangeCctv2', function() {
            const nilai = $('.input-range-cctv2').val();              
            const start = nilai.slice(0,11).split('-').join('/');
            const end = nilai.slice(13,23).split('-').join('/');
            
            $.ajax({
              url: "/dashboard/range/cctv2/" + nilai,
              type: "GET",               
              success : result => {
                let card2 = '';
                result.forEach(e => {
                  $('#modalRangeDataCctv2').modal('show');
                  $("#rangeTitleCctv2").text(`Data : ${start} - ${end}`);
                  card2 += updateCardCctv2(e);
                });
                $("#rangeDataCctv2").html(card2);
              }
            });
          });


          function updateCardCctv2(e){
            
            let date = Date.parse(e.updated_at);              
            let newD = new Date(date);
            let year = newD.getFullYear();
            let month = newD.getMonth() + 1;
            let day = newD.getUTCDate();
            return `<tr>                   
                    <td>${e.lokasi}</td>
                    <td>${e.merk}</td>
                    <td>${e.type}</td>
                    ${e.status == "Rusak" ? `<td style="background:#E72E2E;color:white">${e.status}</td>` : `<td style="background:#11B522;color:white">${e.status}</td>`}
                    <td>${year}-${month}-${day}</td>
                    <td>${e.user_updated}</td>
                    </tr>`;
          }
        </script>
        {{-- fungsi cari data dengan range tanggal cctv2 --}}





        {{-- delete cctv3 --}}
        <script>
          function delCctv3(id) {                
              Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                  if (result.isConfirmed) {
                      window.location.href = '/dashboard/cctv3/' + id
                    }
                  })
          };
      </script>
      {{-- delete cctv3 --}}

        {{-- script details cctv3 --}}
        <script>

          $(document).on("click", "#btnDetailCctv3", function(e) {
              e.preventDefault();
              const iddetcctv3 = $(this).data("iddetcctv3");
              const lantaidetcctv3 = $(this).data("lantaidetcctv3");
              const wingdetcctv3 = $(this).data('wingdetcctv3');
              const merkdetcctv3 = $(this).data('merkdetcctv3');
              const lokasidetcctv3 = $(this).data('lokasidetcctv3');
              const typedetcctv3 = $(this).data('typedetcctv3');
              const statusdetcctv3 = $(this).data('statusdetcctv3');
              const resolusidetcctv3 = $(this).data('resolusidetcctv3');
              const tglpemasangandetcctv3 = $(this).data('tglpemasangandetcctv3');
              const petpemasangandetcctv3 = $(this).data('petpemasangandetcctv3');
              const tglperbaikandetcctv3 = $(this).data('tglperbaikandetcctv3');
              const petperbaikandetcctv3 = $(this).data('petperbaikandetcctv3');
              const catatandetcctv3 = $(this).data('catatandetcctv3');
              const kerusakandetcctv3 = $(this).data('kerusakandetcctv3');
              const userupdatedetcctv3 = $(this).data('userupdatedetcctv3');
              const sandidvrdetcctv3 = $(this).data('sandidvrdetcctv3');

              if(userupdatedetcctv3 == "/1 detik yang lalu"){

                $("#detailUpdatedCCTV3").html('');
              }else{

                $("#detailUpdatedCCTV3").html(userupdatedetcctv3);
              }

              const statusCctv3 = document.querySelector('#detailStatusCCTV3');
              if(statusdetcctv3 == "Rusak"){
                statusCctv3.style.backgroundColor = '#E83939';
                statusCctv3.style.padding = '5px 5px 5px 5px';
                statusCctv3.style.color = 'white';
              }else{
                statusCctv3.style.backgroundColor = '#1EC22F';
                statusCctv3.style.padding = '5px 5px 5px 5px';
                statusCctv3.style.color = 'white';
              }
              
              $("#modalDetailCctv3 #detailTanggalPemasanganCCTV3").text(tglpemasangandetcctv3);
              $("#modalDetailCctv3 #detailPetugasPemasanganCCTV3").text(petpemasangandetcctv3);
              $("#modalDetailCctv3 #detailTglPerbaikanCCTV3").text(tglperbaikandetcctv3);
              $("#modalDetailCctv3 #detailPetugasPerbaikanCCTV3").text(petperbaikandetcctv3);
              $("#modalDetailCctv3 #detailLantaiCCTV3").text(lantaidetcctv3);
              $("#modalDetailCctv3 #detailWingCCTV3").text(wingdetcctv3);
              $("#modalDetailCctv3 #detailLokasiCCTV3").text(lokasidetcctv3);
              $("#modalDetailCctv3 #detailMerkCCTV3").text(merkdetcctv3);
              $("#modalDetailCctv3 #detailTypeCCTV3").text(typedetcctv3);
              $("#modalDetailCctv3 #detailResolusiCCTV3").text(resolusidetcctv3);
              $("#modalDetailCctv3 #detailStatusCCTV3").text(statusdetcctv3);
              $("#modalDetailCctv3 #detailSandiDvrCCTV3").text(sandidvrdetcctv3);
              $("#modalDetailCctv3 #detailKerusakanCCTV3").text(kerusakandetcctv3);
              $("#modalDetailCctv3 #detailCatatanCCTV3").text(catatandetcctv3);
              
          });

      </script>
      {{-- end script details cctv3 --}}

      {{-- date range picker cctv3 --}}
      <script type="text/javascript">
        $(function() {
        
          $('input[name="rangeQueryCctv3"]').daterangepicker({
              autoUpdateInput: false,
              locale: {
                  cancelLabel: 'Clear'
              }
          });
        
          $('input[name="rangeQueryCctv3"]').on('apply.daterangepicker', function(ev, picker) {
              $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
          });
        
          $('input[name="rangeQueryCctv3"]').on('cancel.daterangepicker', function(ev, picker) {
              $(this).val('');
          });
        
        });
        </script>
        {{-- end date range picker cctv3 --}}

        {{-- fungsi cari data dengan range tanggal cctv3 --}}
        <script>
          $(document).on('click', '#btnRangeCctv3', function() {
            const nilai = $('.input-range-cctv3').val();              
            const start = nilai.slice(0,11).split('-').join('/');
            const end = nilai.slice(13,23).split('-').join('/');
            
            $.ajax({
              url: "/dashboard/range/cctv3/" + nilai,
              type: "GET",               
              success : result => {
                let card3 = '';
                result.forEach(e => {
                  $('#modalRangeDataCctv3').modal('show');
                  $("#rangeTitleCctv3").text(`Data : ${start} - ${end}`);
                  card3 += updateCardCctv3(e);
                });
                $("#rangeDataCctv3").html(card3);
              }
            });
          });


          function updateCardCctv3(e){
            
            let date = Date.parse(e.updated_at);              
            let newD = new Date(date);
            let year = newD.getFullYear();
            let month = newD.getMonth() + 1;
            let day = newD.getUTCDate();
            return `<tr>                  
                    <td>${e.lantai}</td>
                    <td>${e.wing}</td>
                    <td>${e.lokasi}</td>
                    <td>${e.merk}</td>
                    <td>${e.type}</td>
                    ${e.status == "Rusak" ? `<td style="background:#E72E2E;color:white">${e.status}</td>` : `<td style="background:#11B522;color:white">${e.status}</td>`}
                    <td>${year}-${month}-${day}</td>
                    <td>${e.user_updated}</td>
                    </tr>`;
          }
        </script>
        {{-- fungsi cari data dengan range tanggal cctv3 --}}



        {{-- delete cctv2 --}}
        <script>
          function delCctv4(id) {                
              Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                  if (result.isConfirmed) {
                      window.location.href = '/dashboard/cctv4/' + id
                    }
                  })
          };
      </script>
      {{-- delete cctv2 --}}

        {{-- script details cctv4 --}}
        <script>

          $(document).on("click", "#btnDetailCctv4", function(e) {
              e.preventDefault();
              const iddetcctv4 = $(this).data("iddetcctv4");             
              const merkdetcctv4 = $(this).data('merkdetcctv4');
              const lokasidetcctv4 = $(this).data('lokasidetcctv4');
              const typedetcctv4 = $(this).data('typedetcctv4');
              const statusdetcctv4 = $(this).data('statusdetcctv4');
              const resolusidetcctv4 = $(this).data('resolusidetcctv4');
              const tglpemasangandetcctv4 = $(this).data('tglpemasangandetcctv4');
              const petpemasangandetcctv4 = $(this).data('petpemasangandetcctv4');
              const tglperbaikandetcctv4 = $(this).data('tglperbaikandetcctv4');
              const petperbaikandetcctv4 = $(this).data('petperbaikandetcctv4');
              const catatandetcctv4 = $(this).data('catatandetcctv4');
              const kerusakandetcctv4 = $(this).data('kerusakandetcctv4');
              const userupdatedetcctv4 = $(this).data('userupdatedetcctv4');
              const sandidvrdetcctv4 = $(this).data('sandidvrdetcctv4');

              if(userupdatedetcctv4 == "/1 detik yang lalu"){

                $("#detailUpdatedCCTV4").html('');
              }else{

                $("#detailUpdatedCCTV4").html(userupdatedetcctv4);
              }

              const statusCctv4 = document.querySelector('#detailStatusCCTV4');
              if(statusdetcctv4 == "Rusak"){
                  statusCctv4.style.backgroundColor = '#E83939';
                  statusCctv4.style.padding = '5px 5px 5px 5px';
                  statusCctv4.style.color = 'white';
                }else{
                  statusCctv4.style.backgroundColor = '#1EC22F';
                  statusCctv4.style.padding = '5px 5px 5px 5px';
                  statusCctv4.style.color = 'white';
              }

              $("#modalDetailCctv4 #detailTanggalPemasanganCCTV4").text(tglpemasangandetcctv4);
              $("#modalDetailCctv4 #detailPetugasPemasanganCCTV4").text(petpemasangandetcctv4);
              $("#modalDetailCctv4 #detailTglPerbaikanCCTV4").text(tglperbaikandetcctv4);
              $("#modalDetailCctv4 #detailPetugasPerbaikanCCTV4").text(petperbaikandetcctv4);             
              $("#modalDetailCctv4 #detailLokasiCCTV4").text(lokasidetcctv4);
              $("#modalDetailCctv4 #detailMerkCCTV4").text(merkdetcctv4);
              $("#modalDetailCctv4 #detailTypeCCTV4").text(typedetcctv4);
              $("#modalDetailCctv4 #detailResolusiCCTV4").text(resolusidetcctv4);
              $("#modalDetailCctv4 #detailStatusCCTV4").text(statusdetcctv4);
              $("#modalDetailCctv4 #detailSandiDvrCCTV4").text(sandidvrdetcctv4);
              $("#modalDetailCctv4 #detailKerusakanCCTV4").text(kerusakandetcctv4);
              $("#modalDetailCctv4 #detailCatatanCCTV4").text(catatandetcctv4);
              
          });

      </script>
      {{-- end script details cctv4 --}}

      {{-- date range picker cctv4 --}}
      <script type="text/javascript">
        $(function() {
        
          $('input[name="rangeQueryCctv4"]').daterangepicker({
              autoUpdateInput: false,
              locale: {
                  cancelLabel: 'Clear'
              }
          });
        
          $('input[name="rangeQueryCctv4"]').on('apply.daterangepicker', function(ev, picker) {
              $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
          });
        
          $('input[name="rangeQueryCctv4"]').on('cancel.daterangepicker', function(ev, picker) {
              $(this).val('');
          });
        
        });
        </script>
        {{-- end date range picker cctv4 --}}

        {{-- fungsi cari data dengan range tanggal cctv4 --}}
        <script>
          $(document).on('click', '#btnRangeCctv4', function() {
            const nilai = $('.input-range-cctv4').val();              
            const start = nilai.slice(0,11).split('-').join('/');
            const end = nilai.slice(13,23).split('-').join('/');
            
            $.ajax({
              url: "/dashboard/range/cctv4/" + nilai,
              type: "GET",               
              success : result => {
                let card4 = '';
                result.forEach(e => {
                  $('#modalRangeDataCctv4').modal('show');
                  $("#rangeTitleCctv4").text(`Data : ${start} - ${end}`);
                  card4 += updateCardCctv4(e);
                });
                $("#rangeDataCctv4").html(card4);
              }
            });
          });


          function updateCardCctv4(e){
            
            let date = Date.parse(e.updated_at);              
            let newD = new Date(date);
            let year = newD.getFullYear();
            let month = newD.getMonth() + 1;
            let day = newD.getUTCDate();
            return `<tr>                   
                    <td>${e.lokasi}</td>
                    <td>${e.merk}</td>
                    <td>${e.type}</td>
                    ${e.status == "Rusak" ? `<td style="background:#E72E2E;color:white">${e.status}</td>` : `<td style="background:#11B522;color:white">${e.status}</td>`}
                    <td>${year}-${month}-${day}</td>
                    <td>${e.user_updated}</td>
                    </tr>`;
          }
        </script>
        {{-- end fungsi cari data dengan range tanggal cctv4 --}}


       
{{-- lightbox --}}
<script>
  $(".images3 img").click(function(){
    $("#full-image3").attr("src", $(this).attr("src"));
    $('#image-viewer3').show();
  });
  
  $('#full-image3').on('click', function() {
    $('#image-viewer3').hide(300);
  });

// ----------------------------------------
  
  $(".images4 img").click(function(){
    $("#full-image4").attr("src", $(this).attr("src"));
    $('#image-viewer4').show();
  });

  $('#full-image4').on('click', function() {
    $('#image-viewer4').hide(300);
  });


  // ----------------------------------------
  
  $(".images2 img").click(function(){
    $("#full-image2").attr("src", $(this).attr("src"));
    $('#image-viewer2').show();
  });

  $('#full-image2').on('click', function() {
    $('#image-viewer2').hide(300);
  });

</script>
{{-- end lightbox --}}
        @endsection       