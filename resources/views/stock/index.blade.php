@extends('layouts.main')


@section('content')   
<link href="/assets/plugins/input-tags/css/tagsinput.css" rel="stylesheet" />
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
@endphp


            <div class="flash-success" data-success="{{ session('success') }}"></div>
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">              
              <div class="ps-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-table" style="color:#7b378e"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Stock Barang</li>
                  </ol>
                </nav>
              </div>              
            </div>            
                   
            <button class="btn btn-primary btn-sm border-0" data-bs-toggle="modal" data-bs-target="#modalAddStock"><i class="bi bi-plus"></i> Tambah Stock</button>
            
                        
            
        <hr/>
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table id="example" class="table table-striped table-bordered tb-ac" style="width:100%">               
                <thead>
                  <tr>                                      
                    <th>Nama</th>
                    <th>Merk</th>                    
                    <th>Jumlah</th>                   
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($dataStock as $stock)
                    
                    <tr>
                        <td>{{ $stock->nama }}</td>
                        <td>{{ $stock->merk }}</td>
                        <td>{{ $stock->jumlah }}</td>
                        <td>
                            <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                
                                <button id="btnDetailStock" class="text-primary border-0 bg-transparent" data-bs-toggle="modal" data-bs-target="#modalDetailStock"
                                data-detailtglpembelian="{{ $stock->tgl_pembelian }}"
                                data-detailnama="{{ $stock->nama }}"
                                data-detailjumlah="{{ $stock->jumlah }}"
                                data-detailmerk="{{ $stock->merk }}"
                                data-detailspek="{{ $stock->spesifikasi }}"
                                data-detailketerangan="{{ $stock->keterangan }}"
                                data-detailcatatan="{{ $stock->catatan }}">
                                <i class="bi bi-eye-fill"></i>
                                </button>
                                
                                <button id="btnUpdateStock" class="text-warning border-0 bg-transparent" data-bs-toggle="modal" data-bs-target="#modalEditStock"
                                data-updateid="{{ $stock->id }}"
                                data-updatetglpembelian="{{ $stock->tgl_pembelian }}"
                                data-updatenama="{{ $stock->nama }}"
                                data-updatejumlah="{{ $stock->jumlah }}"
                                data-updatemerk="{{ $stock->merk }}"
                                data-updatespek="{{ $stock->spesifikasi }}"
                                data-updateketerangan="{{ $stock->keterangan }}"
                                data-updatecatatan="{{ $stock->catatan }}">
                                <i class="bi bi-pencil-fill"></i>
                                </button>

                                   
                             
                            @can('admin')                              
                            <form action="javascript:delStock({{ $stock->id }})" method="post">
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
              </table>
            </div>
          </div>
        </div>


        <!-- Modal add stock -->
        <div class="modal fade" id="modalAddStock" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">New Data</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">                                    
              <form action="/dashboard/stock" class="row g-3 needs-validation" method="post">                    
                @csrf
                <div class="col-md-4">
                  <label for="nama" class="form-label">Nama Barang <small class="text-danger">*</small></label>
                  <input class="form-control" id="nama" name="nama" required>
                </div>
                <div class="col-md-4">
                  <label for="merk" class="form-label">Merk</label>
                  <input class="form-control" id="merk" name="merk">
                </div>
                <div class="col-md-4">
                  <label for="lokasi" class="form-label">Jumlah <small class="text-danger">*</small></label>
                  <input class="form-control" id="jumlah" name="jumlah" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
                </div>
                
                <div class="col-md-12">
                    <label for="spek" class="form-label">Spesifikasi</label>
                    <input class="form-control" data-role="tagsinput" id="spek" name="spek">
                </div>
                
                <div class="col-md-12">
                  <label for="tgl_pembelian" class="form-label">Tanggal Pembelian</label>
                  <input class="form-control datepicker" id="tgl_pembelian" name="tgl_pembelian">
                </div>
               
               
                <div class="col-12">
                  <label class="form-label">Keterangan</label>
                  <textarea class="form-control" rows="4" cols="4" id="keterangan" name="keterangan" placeholder="keterangan pada camera!"></textarea>
                </div>

                <div class="col-12">
                    <label class="form-label">Catatan</label>
                    <textarea class="form-control" rows="4" cols="4" id="catatan" name="catatan"></textarea>
                  </div>

              </div>
              <div class="modal-footer">         
              <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>                                    
              </div>
            </div>
          </div>
          <!-- End modal add stock -->

          <!-- Modal update stock -->
        <div class="modal fade" id="modalEditStock" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Update Data</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalBodyStockUpdate">       
              <form id="formStockUpdate" class="row g-3 needs-validation" method="post">
                @method("PUT")                    
                @csrf
                <div class="col-md-4">
                  <label for="nama" class="form-label">Nama Barang <small class="text-danger">*</small></label>
                  <input class="form-control" id="namaUpdate" name="nama" required>
                </div>
                <div class="col-md-4">
                  <label for="merk" class="form-label">Merk</label>
                  <input class="form-control" id="merkUpdate" name="merk">
                </div>
                <div class="col-md-4">
                  <label for="lokasi" class="form-label">Jumlah <small class="text-danger">*</small></label>
                  <input class="form-control" id="jumlahUpdate" name="jumlah" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
                </div>
                
                <div class="col-md-12">
                    <label for="spek" class="form-label">Spesifikasi</label>
                    <input class="form-control satu" data-role="tagsinput" id="spekUpdate" name="spesifikasi" required>
                </div>
                
                <div class="col-md-12">
                  <label for="tgl_pembelian" class="form-label">Tanggal Pembelian</label>
                  <input class="form-control datepicker" id="tgl_pembelianUpdate" name="tgl_pembelian">
                </div>
               
               
                <div class="col-12">
                  <label class="form-label">Keterangan</label>
                  <textarea class="form-control" rows="4" cols="4" id="keteranganUpdate" name="keterangan"></textarea>
                </div>

                <div class="col-12">
                    <label class="form-label">Catatan</label>
                    <textarea class="form-control" rows="4" cols="4" id="catatanUpdate" name="catatan"></textarea>
                  </div>

              </div>
              <div class="modal-footer">         
              <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>                                    
              </div>
            </div>
          </div>
          <!-- End modal update stock -->

          {{-- Modal Detail stock --}}        
          <div class="modal fade" id="modalDetailStock" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Detail Data</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalBodyDetailStock">
                  <div class="card">                      
                      <ul class="list-group">                        
                       
                        
                        <li class="list-group-item d-flex justify-content-between align-items-center">Tanggal pembelian <i class="bi bi-arrow-right"></i> <span id="detailStockTglPembelian"></span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">Nama barang <i class="bi bi-arrow-right"></i> <span id="detailStockNamaBarang"></span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">Jumlah <i class="bi bi-arrow-right"></i> <span id="detailStockJumlah"></span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">Merk <i class="bi bi-arrow-right"></i> <span id="detailStockMerk"></span>
                        </li>
                        
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              Spesifikasi
                            </button>
                          </h2>
                          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body" id="detailStockSpek">
                                
                            </div>
                          </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                Keterangan
                              </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                              <div class="accordion-body" id="detailStockKet">
                                  
                              </div>
                            </div>
                          </div>

                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              Catatan
                            </button>
                          </h2>
                          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body" id="detailStockCatatan">
                              
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
        {{-- end modal detail stock --}}

        <script src="/assets/js/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="/assets/plugins/input-tags/js/tagsinput.js"></script>

        {{-- SCRIPT JIKA DATA BERHASIL --}}
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
        {{-- END SCRIPT JIKA DATA BERHASIL --}}

        {{-- SCRIPT LIHAT DETAIL DATA --}}
        <script>
            $(document).on("click", "#btnDetailStock", function() {
                const detailtglpem = $(this).data('detailtglpembelian');
                const detailnama = $(this).data('detailnama');
                const detailjumlah = $(this).data('detailjumlah');
                const detailmerk = $(this).data('detailmerk');
                const detailspek = $(this).data('detailspek');
                const detailketerangan = $(this).data('detailketerangan');
                const detailcatatan = $(this).data('detailcatatan');
                const ds = detailspek.split(',');
                
                let spekCard = '';
               
                ds.forEach(e => {
                    spekCard += `<ul><li>${e}</li></ul>`;
                });

                $("#modalBodyDetailStock #detailStockTglPembelian").text(detailtglpem);
                $("#modalBodyDetailStock #detailStockNamaBarang").text(detailnama);
                $("#modalBodyDetailStock #detailStockJumlah").text(detailjumlah);
                $("#modalBodyDetailStock #detailStockMerk").text(detailmerk);
                $("#modalBodyDetailStock #detailStockSpek").html(spekCard);
                $("#modalBodyDetailStock #detailStockKet").text(detailketerangan);
                $("#modalBodyDetailStock #detailStockCatatan").text(detailcatatan);
            });
        </script>
        {{-- END SCRIPT LIHAT DETAIL DATA --}}

        {{-- SCRIPT DELETE DATA --}}
        <script>
            function delStock(id) {                
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
                        window.location.href = '/dashboard/stock/' + id
                    }
                    })
            };
        </script>
        {{-- END SCRIPT DELETE DATA --}}

        {{-- SCRIPT UPDATE DATA --}}
        <script>
            $(document).on("click", "#btnUpdateStock", function() {
                const updateid = $(this).data('updateid');
                const updatetglpem = $(this).data('updatetglpembelian');
                const updatenama = $(this).data('updatenama');
                const updatejumlah = $(this).data('updatejumlah');
                const updatemerk = $(this).data('updatemerk');
                const updatespek = $(this).data('updatespek');
                const updateketerangan = $(this).data('updateketerangan');
                const updatecatatan = $(this).data('updatecatatan');
                const dd = updatespek.split(',');
                console.log(dd);
                
                $("#formStockUpdate").attr("action", "/dashboard/stock/" + updateid);
                $("#modalBodyStockUpdate #namaUpdate").val(updatenama);
                $("#modalBodyStockUpdate #merkUpdate").val(updatemerk);
                $("#modalBodyStockUpdate #jumlahUpdate").val(updatejumlah);
                $("#modalBodyStockUpdate .bootstrap-tagsinput input").attr("value",updatespek);
                
               
                $("#modalBodyStockUpdate #tgl_pembelianUpdate").val(updatetglpem);
                $("#modalBodyStockUpdate #keteranganUpdate").val(updateketerangan);
                $("#modalBodyStockUpdate #catatanUpdate").val(updatecatatan);
            });
        </script>
        {{-- END SCRIPT UPDATE DATA --}}
    

@endsection       