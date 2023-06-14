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
                    <li class="breadcrumb-item active" aria-current="page">Data Trashed CCTV Monitor 4</li>
                  </ol>
                </nav>
              </div>              
            </div>
            <a href="/dashboard/cctv" class="btn btn-primary btn-sm"><i class="bi bi-arrow-left"></i> Back</a>
            @can('admin')
            <a id="btnDeleteAllCctv2" href="/dashboard/cctv4/trash/deleteAll" class="btn btn-danger btn-sm">Delete All</a>
            @endcan
        <hr/>
        <h6 class="mb-2 text-uppercase">Monitor 4</h6>
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
                @foreach ($dataTrashMonitor4 as $trashedCctv4)
                    <tr id="idcctv4{{ $trashedCctv4->id }}">
                        <td>{{ $trashedCctv4->lokasi }}</td>
                        <td>{{ $trashedCctv4->merk }}</td>
                        <td>{{ $trashedCctv4->type }}</td>
                        @if ($trashedCctv4->status == "Rusak")
                        <td class="bg-danger text-white">{{ $trashedCctv4->status }}</td>
                        @else
                        <td class="bg-success text-white">{{ $trashedCctv4->status }}</td>
                        @endif
                        <td>
                            <div class="table-actions d-flex align-items-center gap-3 fs-6">                            
                              
                              @can('admin')
                              <a href="javascript:void(0)" class="text-info" onclick="restoreDataCctv4({{ $trashedCctv4->id }})"><i class="bi bi-download"></i></a>
                              @endcan
                                
                              <button id="btnDetailTrashCctv4" class="text-primary border-0 bg-transparent" data-bs-toggle="modal" data-bs-target="#modalDetailDataTrashCctvMonitor4"
                              data-iddetcctv4trash="{{ $trashedCctv4->id }}"
                              data-lokasidetcctv4trash="{{ $trashedCctv4->lokasi }}"
                              data-merkdetcctv4trash="{{ $trashedCctv4->merk }}"
                              data-typedetcctv4trash="{{ $trashedCctv4->type }}"
                              data-statusdetcctv4trash="{{ $trashedCctv4->status }}"
                              data-resolusidetcctv4trash="{{ $trashedCctv4->resolusi }}"
                              data-tglpemasangandetcctv4trash="{{ $trashedCctv4->tgl_pemasangan }}"
                              data-petpemasangandetcctv4trash="{{ $trashedCctv4->petugas_pemasangan }}"
                              data-tglperbaikandetcctv4trash="{{ $trashedCctv4->tgl_perbaikan }}"
                              data-petperbaikandetcctv4trash="{{ $trashedCctv4->petugas_perbaikan }}"
                              data-catatandetcctv4trash="{{ $trashedCctv4->catatan }}"
                              data-kerusakandetcctv4trash="{{ $trashedCctv4->kerusakan }}"
                              data-userdeletedetcctv4trash="{{ $trashedCctv4->user_delete }}/ {{ $trashedCctv4->deleted_at->diffForHumans() }}"
                              data-sandidvrdetcctv4trash="{{ $trashedCctv4->sandi_dvr }}">
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
           <div class="modal fade" id="modalDetailDataTrashCctvMonitor4" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Detail Data</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalDetailCctv4">
                  <div class="card">                      
                      <ul class="list-group">                        
                        <li class="list-group-item d-flex justify-content-between align-items-center">Di hapus <span>:</span> <span id="detailDeleteCCTV4Trash"></span>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Tanggal Pemasangan <span>:</span> <span id="detailTanggalPemasanganCCTV4Trash"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Petugas Pemasangan <span>:</span> <span id="detailPetugasPemasanganCCTV4Trash"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Tanggal Perbaikan <span>:</span> <span id="detailTglPerbaikanCCTV4Trash"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Petugas Perbaikan <span>:</span> <span id="detailPetugasPerbaikanCCTV4Trash"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Lokasi <span>:</span> <span id="detailLokasiCCTV4Trash"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Merk <span>:</span> <span id="detailMerkCCTV4Trash"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Type <span>:</span> <span id="detailTypeCCTV4Trash"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Resolusi <span>:</span> <span id="detailResolusiCCTV4Trash"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Status <span>:</span> <span id="detailStatusCCTV4Trash"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Kata Sandi DVR <span>:</span> <span id="detailSandiDvrCCTV4Trash"></span>
                        </li>
                        
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              Kerusakan
                            </button>
                          </h2>
                          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body" id="detailKerusakanCCTV4Trash">
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
                            <div class="accordion-body" id="detailCatatanCCTV4Trash">
                              
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

      function restoreDataCctv4(id)
                {            
                    $.ajax({
                      url:"/dashboard/cctv4/trash/"+id,
                      type: "DELETE",
                      data:{
                        _token : $("input[name=_token]").val()
                      },
                      success : function(response){
                        $("#idcctv4"+id).remove();
                      }
                    });           
                }

        </script>

<script>

  $(document).on("click", "#btnDetailTrashCctv4", function(e) {
      e.preventDefault();
      const iddetcctv4trash = $(this).data("iddetcctv4trash");
      const merkdetcctv4trash = $(this).data('merkdetcctv4trash');
      const lokasidetcctv4trash = $(this).data('lokasidetcctv4trash');
      const typedetcctv4trash = $(this).data('typedetcctv4trash');
      const statusdetcctv4trash = $(this).data('statusdetcctv4trash');
      const resolusidetcctv4trash = $(this).data('resolusidetcctv4trash');
      const tglpemasangandetcctv4trash = $(this).data('tglpemasangandetcctv4trash');
      const petpemasangandetcctv4trash = $(this).data('petpemasangandetcctv4trash');
      const tglperbaikandetcctv4trash = $(this).data('tglperbaikandetcctv4trash');
      const petperbaikandetcctv4trash = $(this).data('petperbaikandetcctv4trash');
      const catatandetcctv4trash = $(this).data('catatandetcctv4trash');
      const kerusakandetcctv4trash = $(this).data('kerusakandetcctv4trash');
      const userdeletedetcctv4trash = $(this).data('userdeletedetcctv4trash');
      const sandidvrdetcctv4trash = $(this).data('sandidvrdetcctv4trash');

      

      $("#detailDeleteCCTV4Trash").html(userdeletedetcctv4trash);      
      $("#detailTanggalPemasanganCCTV4Trash").text(tglpemasangandetcctv4trash);
      $("#detailPetugasPemasanganCCTV4Trash").text(petpemasangandetcctv4trash);
      $("#detailTglPerbaikanCCTV4Trash").text(tglperbaikandetcctv4trash);
      $("#detailPetugasPerbaikanCCTV4Trash").text(petperbaikandetcctv4trash);
      $("#detailLokasiCCTV4Trash").text(lokasidetcctv4trash);
      $("#detailMerkCCTV4Trash").text(merkdetcctv4trash);
      $("#detailTypeCCTV4Trash").text(typedetcctv4trash);
      $("#detailResolusiCCTV4Trash").text(resolusidetcctv4trash);
      $("#detailStatusCCTV4Trash").text(statusdetcctv4trash);
      $("#detailSandiDvrCCTV4Trash").text(sandidvrdetcctv4trash);
      $("#detailKerusakanCCTV4Trash").text(kerusakandetcctv4trash);
      $("#detailCatatanCCTV4Trash").text(catatandetcctv4trash);
      
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