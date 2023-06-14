@extends('layouts.main')


@section('content')
<?php use Illuminate\Support\Carbon; ?>

            <div class="flash-success" data-success="{{ session('success') }}"></div>
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">              
              <div class="ps-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-table" style="color:#7b378e"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Data Trashed CCTV Monitor 2</li>
                  </ol>
                </nav>
              </div>              
            </div>
            <a href="/dashboard/cctv" class="btn btn-primary btn-sm"><i class="bi bi-arrow-left"></i> Back</a>
            @can('admin')
            <a id="btnDeleteAllCctv2" href="/dashboard/cctv2/trash/deleteAll" class="btn btn-danger btn-sm">Delete All</a>
            @endcan
        <hr/>
        <h6 class="mb-2 text-uppercase">Monitor 2</h6>
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">              
              <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>                    
                    <th>Lokasi</th>
                    <th>Merk</th>                    
                    <th>Type</th>
                    <th>Status</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody> 
                @foreach ($dataTrashMonitor2 as $trashedCctv2)
                    <tr id="idcctv2{{ $trashedCctv2->id }}">
                        <td>{{ $trashedCctv2->lokasi }}</td>
                        <td>{{ $trashedCctv2->merk }}</td>
                        <td>{{ $trashedCctv2->type }}</td>
                        @if ($trashedCctv2->status == "Rusak")
                        <td class="bg-danger text-white">{{ $trashedCctv2->status }}</td>
                        @else
                        <td class="bg-success text-white">{{ $trashedCctv2->status }}</td>
                        @endif
                        <td>
                            <div class="table-actions d-flex align-items-center gap-3 fs-6">                            
                              
                              @can('admin')
                              <a href="javascript:void(0)" class="text-info" onclick="restoreDataCctv2({{ $trashedCctv2->id }})"><i class="bi bi-download"></i></a>
                              @endcan
                                
                              <button id="btnDetailTrashCctv2" class="text-primary border-0 bg-transparent" data-bs-toggle="modal" data-bs-target="#modalDetailDataTrashCctvMonitor2"
                              data-iddetcctv2trash="{{ $trashedCctv2->id }}"
                              data-lokasidetcctv2trash="{{ $trashedCctv2->lokasi }}"
                              data-merkdetcctv2trash="{{ $trashedCctv2->merk }}"
                              data-typedetcctv2trash="{{ $trashedCctv2->type }}"
                              data-statusdetcctv2trash="{{ $trashedCctv2->status }}"
                              data-resolusidetcctv2trash="{{ $trashedCctv2->resolusi }}"
                              data-tglpemasangandetcctv2trash="{{ $trashedCctv2->tgl_pemasangan }}"
                              data-petpemasangandetcctv2trash="{{ $trashedCctv2->petugas_pemasangan }}"
                              data-tglperbaikandetcctv2trash="{{ $trashedCctv2->tgl_perbaikan }}"
                              data-petperbaikandetcctv2trash="{{ $trashedCctv2->petugas_perbaikan }}"
                              data-catatandetcctv2trash="{{ $trashedCctv2->catatan }}"
                              data-kerusakandetcctv2trash="{{ $trashedCctv2->kerusakan }}"
                              data-userdeletedetcctv2trash="{{ $trashedCctv2->user_delete }}/ {{ $trashedCctv2->deleted_at->diffForHumans() }}"
                              data-sandidvrdetcctv2trash="{{ $trashedCctv2->sandi_dvr }}">
                              <i class="bi bi-eye-fill"></i>
                              </button>                     
                                
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


        
           {{-- Modal Detail Trash --}}        
           <div class="modal fade" id="modalDetailDataTrashCctvMonitor2" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Detail Data</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalDetailCctv2">
                  <div class="card">                      
                      <ul class="list-group">                        
                        <li class="list-group-item d-flex justify-content-between align-items-center">Di hapus <span>:</span> <span id="detailDeleteCCTV2Trash"></span>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Tanggal Pemasangan <span>:</span> <span id="detailTanggalPemasanganCCTV2Trash"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Petugas Pemasangan <span>:</span> <span id="detailPetugasPemasanganCCTV2Trash"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Tanggal Perbaikan <span>:</span> <span id="detailTglPerbaikanCCTV2Trash"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Petugas Perbaikan <span>:</span> <span id="detailPetugasPerbaikanCCTV2Trash"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Lokasi <span>:</span> <span id="detailLokasiCCTV2Trash"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Merk <span>:</span> <span id="detailMerkCCTV2Trash"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Type <span>:</span> <span id="detailTypeCCTV2Trash"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Resolusi <span>:</span> <span id="detailResolusiCCTV2Trash"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Status <span>:</span> <span id="detailStatusCCTV2Trash"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Kata Sandi DVR <span>:</span> <span id="detailSandiDvrCCTV2Trash"></span>
                        </li>
                        
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              Kerusakan
                            </button>
                          </h2>
                          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body" id="detailKerusakanCCTV2Trash">
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
                            <div class="accordion-body" id="detailCatatanCCTV2Trash">
                              
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
        

        {{-- end modal detail --}}
        

        <script src="/assets/js/jquery.min.js"></script>  
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>

      function restoreDataCctv2(id)
                {            
                    $.ajax({
                      url:"/dashboard/cctv2/trash/"+id,
                      type: "DELETE",
                      data:{
                        _token : $("input[name=_token]").val()
                      },
                      success : function(response){
                        $("#idcctv2"+id).remove();
                      }
                    });           
                }

        </script>

<script>

  $(document).on("click", "#btnDetailTrashCctv2", function(e) {
      e.preventDefault();
      const iddetcctv2trash = $(this).data("iddetcctv2trash");
      const merkdetcctv2trash = $(this).data('merkdetcctv2trash');
      const lokasidetcctv2trash = $(this).data('lokasidetcctv2trash');
      const typedetcctv2trash = $(this).data('typedetcctv2trash');
      const statusdetcctv2trash = $(this).data('statusdetcctv2trash');
      const resolusidetcctv2trash = $(this).data('resolusidetcctv2trash');
      const tglpemasangandetcctv2trash = $(this).data('tglpemasangandetcctv2trash');
      const petpemasangandetcctv2trash = $(this).data('petpemasangandetcctv2trash');
      const tglperbaikandetcctv2trash = $(this).data('tglperbaikandetcctv2trash');
      const petperbaikandetcctv2trash = $(this).data('petperbaikandetcctv2trash');
      const catatandetcctv2trash = $(this).data('catatandetcctv2trash');
      const kerusakandetcctv2trash = $(this).data('kerusakandetcctv2trash');
      const userdeletedetcctv2trash = $(this).data('userdeletedetcctv2trash');
      const sandidvrdetcctv2trash = $(this).data('sandidvrdetcctv2trash');

      

      $("#detailDeleteCCTV2Trash").html(userdeletedetcctv2trash);      
      $("#detailTanggalPemasanganCCTV2Trash").text(tglpemasangandetcctv2trash);
      $("#detailPetugasPemasanganCCTV2Trash").text(petpemasangandetcctv2trash);
      $("#detailTglPerbaikanCCTV2Trash").text(tglperbaikandetcctv2trash);
      $("#detailPetugasPerbaikanCCTV2Trash").text(petperbaikandetcctv2trash);
      $("#detailLokasiCCTV2Trash").text(lokasidetcctv2trash);
      $("#detailMerkCCTV2Trash").text(merkdetcctv2trash);
      $("#detailTypeCCTV2Trash").text(typedetcctv2trash);
      $("#detailResolusiCCTV2Trash").text(resolusidetcctv2trash);
      $("#detailStatusCCTV2Trash").text(statusdetcctv2trash);
      $("#detailSandiDvrCCTV2Trash").text(sandidvrdetcctv2trash);
      $("#detailKerusakanCCTV2Trash").text(kerusakandetcctv2trash);
      $("#detailCatatanCCTV2Trash").text(catatandetcctv2trash);
      
  });

</script>

<script>

$(document).on('click', '#btnDeleteAllCctv2', function(e) {
            e.preventDefault();
            const href = $(this).attr('href');

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
                window.location.href = href;                
              }
            })

          });

</script>

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

        

@endsection       