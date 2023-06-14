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
                    <li class="breadcrumb-item active" aria-current="page">Data Trashed CCTV Monitor 1</li>
                  </ol>
                </nav>
              </div>              
            </div>
            <a href="/dashboard/cctv" class="btn btn-primary btn-sm"><i class="bi bi-arrow-left"></i> Back</a>
            @can('admin')
            <a id="btnDeleteAllCctv" href="/dashboard/cctv/trash/deleteAll" class="btn btn-danger btn-sm">Delete All</a>
            @endcan
        <hr/>
        <h6 class="mb-2 text-uppercase">Monitor 1</h6>
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">              
              <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>                    
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
                @foreach ($dataTrashMonitor1 as $trashedCctv1)
                    <tr id="idRes{{ $trashedCctv1->id }}">                    
                        <td>{{ $trashedCctv1->lantai }}</td>                
                        <td>{{ $trashedCctv1->wing }}</td>              
                        <td>{{ $trashedCctv1->lokasi }}</td>
                        <td>{{ $trashedCctv1->merk }}</td>
                        <td>{{ $trashedCctv1->type }}</td>
                        @if ($trashedCctv1->status == "Rusak")
                        <td class="bg-danger text-white">{{ $trashedCctv1->status }}</td>
                        @else
                        <td class="bg-success text-white">{{ $trashedCctv1->status }}</td>
                        @endif
                        <td>
                            <div class="table-actions d-flex align-items-center gap-3 fs-6">                            
                              
                              @can('admin')
                              <a href="javascript:void(0)" class="text-info" onclick="restoreData({{ $trashedCctv1->id }})"><i class="bi bi-download"></i></a>
                              @endcan
                                
                              <button id="btnDetailTrashCctv1" class="text-primary border-0 bg-transparent" data-bs-toggle="modal" data-bs-target="#modalDetailDataTrashCctvMonitor1"
                              data-iddetcctv1trash="{{ $trashedCctv1->id }}"
                              data-lantaidetcctv1trash="{{ $trashedCctv1->lantai }}"
                              data-wingdetcctv1trash="{{ $trashedCctv1->wing }}"
                              data-lokasidetcctv1trash="{{ $trashedCctv1->lokasi }}"
                              data-merkdetcctv1trash="{{ $trashedCctv1->merk }}"
                              data-typedetcctv1trash="{{ $trashedCctv1->type }}"
                              data-statusdetcctv1trash="{{ $trashedCctv1->status }}"
                              data-resolusidetcctv1trash="{{ $trashedCctv1->resolusi }}"
                              data-tglpemasangandetcctv1trash="{{ $trashedCctv1->tgl_pemasangan }}"
                              data-petpemasangandetcctv1trash="{{ $trashedCctv1->petugas_pemasangan }}"
                              data-tglperbaikandetcctv1trash="{{ $trashedCctv1->tgl_perbaikan }}"
                              data-petperbaikandetcctv1trash="{{ $trashedCctv1->petugas_perbaikan }}"
                              data-catatandetcctv1trash="{{ $trashedCctv1->catatan }}"
                              data-kerusakandetcctv1trash="{{ $trashedCctv1->kerusakan }}"
                              data-userdeletedetcctv1trash="{{ $trashedCctv1->user_delete }}/ {{ $trashedCctv1->deleted_at->diffForHumans() }}"
                              data-sandidvrdetcctv1trash="{{ $trashedCctv1->sandi_dvr }}">
                              <i class="bi bi-eye-fill"></i>
                              </button>                     
                                
                            </div>
                        </td>
                    </tr>                            
                    @endforeach     
                </tbody>
                <tfoot>
                  <tr>
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


        
           {{-- Modal Detail Trash --}}        
           <div class="modal fade" id="modalDetailDataTrashCctvMonitor1" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Detail Data</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalDetailCctv1">
                  <div class="card">                      
                      <ul class="list-group">                        
                        <li class="list-group-item d-flex justify-content-between align-items-center">Di hapus <span>:</span> <span id="detailDeleteCCTV1Trash"></span>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Tanggal Pemasangan <span>:</span> <span id="detailTanggalPemasanganCCTV1Trash"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Petugas Pemasangan <span>:</span> <span id="detailPetugasPemasanganCCTV1Trash"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Tanggal Perbaikan <span>:</span> <span id="detailTglPerbaikanCCTV1Trash"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Petugas Perbaikan <span>:</span> <span id="detailPetugasPerbaikanCCTV1Trash"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Lantai <span>:</span> <span id="detailLantaiCCTV1Trash"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Wing <span>:</span> <span id="detailWingCCTV1Trash"></span>
                        </li>                        
                        <li class="list-group-item d-flex justify-content-between align-items-center">Lokasi <span>:</span> <span id="detailLokasiCCTV1Trash"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Merk <span>:</span> <span id="detailMerkCCTV1Trash"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Type <span>:</span> <span id="detailTypeCCTV1Trash"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Resolusi <span>:</span> <span id="detailResolusiCCTV1Trash"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Status <span>:</span> <span id="detailStatusCCTV1Trash"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Kata Sandi DVR <span>:</span> <span id="detailSandiDvrCCTV1Trash"></span>
                        </li>
                        
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              Kerusakan
                            </button>
                          </h2>
                          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body" id="detailKerusakanCCTV1Trash">
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
                            <div class="accordion-body" id="detailCatatanCCTV1Trash">
                              
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

      function restoreData(id)
                {            
                    $.ajax({
                      url:"/dashboard/cctv/trash/"+id,
                      type: "DELETE",
                      data:{
                        _token : $("input[name=_token]").val()
                      },
                      success : function(response){
                        $("#idRes"+id).remove();
                      }
                    });           
                }

        </script>

<script>

  $(document).on("click", "#btnDetailTrashCctv1", function(e) {
      e.preventDefault();
      const iddetcctv1trash = $(this).data("iddetcctv1trash");
      const lantaidetcctv1trash = $(this).data("lantaidetcctv1trash");
      const wingdetcctv1trash = $(this).data('wingdetcctv1trash');
      const merkdetcctv1trash = $(this).data('merkdetcctv1trash');
      const lokasidetcctv1trash = $(this).data('lokasidetcctv1trash');
      const typedetcctv1trash = $(this).data('typedetcctv1trash');
      const statusdetcctv1trash = $(this).data('statusdetcctv1trash');
      const resolusidetcctv1trash = $(this).data('resolusidetcctv1trash');
      const tglpemasangandetcctv1trash = $(this).data('tglpemasangandetcctv1trash');
      const petpemasangandetcctv1trash = $(this).data('petpemasangandetcctv1trash');
      const tglperbaikandetcctv1trash = $(this).data('tglperbaikandetcctv1trash');
      const petperbaikandetcctv1trash = $(this).data('petperbaikandetcctv1trash');
      const catatandetcctv1trash = $(this).data('catatandetcctv1trash');
      const kerusakandetcctv1trash = $(this).data('kerusakandetcctv1trash');
      const userdeletedetcctv1trash = $(this).data('userdeletedetcctv1trash');
      const sandidvrdetcctv1trash = $(this).data('sandidvrdetcctv1trash');

      

      $("#detailDeleteCCTV1Trash").html(userdeletedetcctv1trash);      
      $("#detailTanggalPemasanganCCTV1Trash").text(tglpemasangandetcctv1trash);
      $("#detailPetugasPemasanganCCTV1Trash").text(petpemasangandetcctv1trash);
      $("#detailTglPerbaikanCCTV1Trash").text(tglperbaikandetcctv1trash);
      $("#detailPetugasPerbaikanCCTV1Trash").text(petperbaikandetcctv1trash);
      $("#detailLantaiCCTV1Trash").text(lantaidetcctv1trash);
      $("#detailWingCCTV1Trash").text(wingdetcctv1trash);
      $("#detailLokasiCCTV1Trash").text(lokasidetcctv1trash);
      $("#detailMerkCCTV1Trash").text(merkdetcctv1trash);
      $("#detailTypeCCTV1Trash").text(typedetcctv1trash);
      $("#detailResolusiCCTV1Trash").text(resolusidetcctv1trash);
      $("#detailStatusCCTV1Trash").text(statusdetcctv1trash);
      $("#detailSandiDvrCCTV1Trash").text(sandidvrdetcctv1trash);
      $("#detailKerusakanCCTV1Trash").text(kerusakandetcctv1trash);
      $("#detailCatatanCCTV1Trash").text(catatandetcctv1trash);
      
  });

</script>

<script>

$(document).on('click', '#btnDeleteAllCctv', function(e) {
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