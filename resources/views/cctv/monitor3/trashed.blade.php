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
                    <li class="breadcrumb-item active" aria-current="page">Data Trashed CCTV Monitor 3</li>
                  </ol>
                </nav>
              </div>              
            </div>
            <a href="/dashboard/cctv" class="btn btn-primary btn-sm"><i class="bi bi-arrow-left"></i> Back</a>
            @can('admin')
            <a id="btnDeleteAllCctv3" href="/dashboard/cctv3/trash/deleteAll" class="btn btn-danger btn-sm">Delete All</a>
            @endcan
        <hr/>
        <h6 class="mb-2 text-uppercase">Monitor 3</h6>
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
                @foreach ($dataTrashMonitor3 as $trashedCctv3)
                    <tr id="idcctv3{{ $trashedCctv3->id }}">                    
                        <td>{{ $trashedCctv3->lantai }}</td>                
                        <td>{{ $trashedCctv3->wing }}</td>              
                        <td>{{ $trashedCctv3->lokasi }}</td>
                        <td>{{ $trashedCctv3->merk }}</td>
                        <td>{{ $trashedCctv3->type }}</td>
                        @if ($trashedCctv3->status == "Rusak")
                        <td class="bg-danger text-white">{{ $trashedCctv3->status }}</td>
                        @else
                        <td class="bg-success text-white">{{ $trashedCctv3->status }}</td>
                        @endif
                        <td>
                            <div class="table-actions d-flex align-items-center gap-3 fs-6">                            
                              
                              @can('admin')
                              <a href="javascript:void(0)" class="text-info" onclick="restoreDataCctv3({{ $trashedCctv3->id }})"><i class="bi bi-download"></i></a>
                              @endcan
                                
                              <button id="btnDetailTrashCctv3" class="text-primary border-0 bg-transparent" data-bs-toggle="modal" data-bs-target="#modalDetailDataTrashCctvMonitor3"
                              data-iddetcctv3trash="{{ $trashedCctv3->id }}"
                              data-lantaidetcctv3trash="{{ $trashedCctv3->lantai }}"
                              data-wingdetcctv3trash="{{ $trashedCctv3->wing }}"
                              data-lokasidetcctv3trash="{{ $trashedCctv3->lokasi }}"
                              data-merkdetcctv3trash="{{ $trashedCctv3->merk }}"
                              data-typedetcctv3trash="{{ $trashedCctv3->type }}"
                              data-statusdetcctv3trash="{{ $trashedCctv3->status }}"
                              data-resolusidetcctv3trash="{{ $trashedCctv3->resolusi }}"
                              data-tglpemasangandetcctv3trash="{{ $trashedCctv3->tgl_pemasangan }}"
                              data-petpemasangandetcctv3trash="{{ $trashedCctv3->petugas_pemasangan }}"
                              data-tglperbaikandetcctv3trash="{{ $trashedCctv3->tgl_perbaikan }}"
                              data-petperbaikandetcctv3trash="{{ $trashedCctv3->petugas_perbaikan }}"
                              data-catatandetcctv3trash="{{ $trashedCctv3->catatan }}"
                              data-kerusakandetcctv3trash="{{ $trashedCctv3->kerusakan }}"
                              data-userdeletedetcctv3trash="{{ $trashedCctv3->user_delete }}/ {{ $trashedCctv3->deleted_at->diffForHumans() }}"
                              data-sandidvrdetcctv3trash="{{ $trashedCctv3->sandi_dvr }}">
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
           <div class="modal fade" id="modalDetailDataTrashCctvMonitor3" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Detail Data</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalDetailCctv3">
                  <div class="card">                      
                      <ul class="list-group">                        
                        <li class="list-group-item d-flex justify-content-between align-items-center">Di hapus <span>:</span> <span id="detailDeleteCCTV3Trash"></span>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Tanggal Pemasangan <span>:</span> <span id="detailTanggalPemasanganCCTV3Trash"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Petugas Pemasangan <span>:</span> <span id="detailPetugasPemasanganCCTV3Trash"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Tanggal Perbaikan <span>:</span> <span id="detailTglPerbaikanCCTV3Trash"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Petugas Perbaikan <span>:</span> <span id="detailPetugasPerbaikanCCTV3Trash"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Lantai <span>:</span> <span id="detailLantaiCCTV3Trash"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Wing <span>:</span> <span id="detailWingCCTV3Trash"></span>
                        </li>                        
                        <li class="list-group-item d-flex justify-content-between align-items-center">Lokasi <span>:</span> <span id="detailLokasiCCTV3Trash"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Merk <span>:</span> <span id="detailMerkCCTV3Trash"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Type <span>:</span> <span id="detailTypeCCTV3Trash"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Resolusi <span>:</span> <span id="detailResolusiCCTV3Trash"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Status <span>:</span> <span id="detailStatusCCTV3Trash"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Kata Sandi DVR <span>:</span> <span id="detailSandiDvrCCTV3Trash"></span>
                        </li>
                        
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              Kerusakan
                            </button>
                          </h2>
                          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body" id="detailKerusakanCCTV3Trash">
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
                            <div class="accordion-body" id="detailCatatanCCTV3Trash">
                              
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

      function restoreDataCctv3(id)
                {            
                    $.ajax({
                      url:"/dashboard/cctv3/trash/"+id,
                      type: "DELETE",
                      data:{
                        _token : $("input[name=_token]").val()
                      },
                      success : function(response){
                        $("#idcctv3"+id).remove();
                      }
                    });           
                }

        </script>

<script>

  $(document).on("click", "#btnDetailTrashCctv3", function(e) {
      e.preventDefault();
      const iddetcctv3trash = $(this).data("iddetcctv3trash");
      const lantaidetcctv3trash = $(this).data("lantaidetcctv3trash");
      const wingdetcctv3trash = $(this).data('wingdetcctv3trash');
      const merkdetcctv3trash = $(this).data('merkdetcctv3trash');
      const lokasidetcctv3trash = $(this).data('lokasidetcctv3trash');
      const typedetcctv3trash = $(this).data('typedetcctv3trash');
      const statusdetcctv3trash = $(this).data('statusdetcctv3trash');
      const resolusidetcctv3trash = $(this).data('resolusidetcctv3trash');
      const tglpemasangandetcctv3trash = $(this).data('tglpemasangandetcctv3trash');
      const petpemasangandetcctv3trash = $(this).data('petpemasangandetcctv3trash');
      const tglperbaikandetcctv3trash = $(this).data('tglperbaikandetcctv3trash');
      const petperbaikandetcctv3trash = $(this).data('petperbaikandetcctv3trash');
      const catatandetcctv3trash = $(this).data('catatandetcctv3trash');
      const kerusakandetcctv3trash = $(this).data('kerusakandetcctv3trash');
      const userdeletedetcctv3trash = $(this).data('userdeletedetcctv3trash');
      const sandidvrdetcctv3trash = $(this).data('sandidvrdetcctv3trash');

      

      $("#detailDeleteCCTV3Trash").html(userdeletedetcctv3trash);      
      $("#detailTanggalPemasanganCCTV3Trash").text(tglpemasangandetcctv3trash);
      $("#detailPetugasPemasanganCCTV3Trash").text(petpemasangandetcctv3trash);
      $("#detailTglPerbaikanCCTV3Trash").text(tglperbaikandetcctv3trash);
      $("#detailPetugasPerbaikanCCTV3Trash").text(petperbaikandetcctv3trash);
      $("#detailLantaiCCTV3Trash").text(lantaidetcctv3trash);
      $("#detailWingCCTV3Trash").text(wingdetcctv3trash);
      $("#detailLokasiCCTV3Trash").text(lokasidetcctv3trash);
      $("#detailMerkCCTV3Trash").text(merkdetcctv3trash);
      $("#detailTypeCCTV3Trash").text(typedetcctv3trash);
      $("#detailResolusiCCTV3Trash").text(resolusidetcctv3trash);
      $("#detailStatusCCTV3Trash").text(statusdetcctv3trash);
      $("#detailSandiDvrCCTV3Trash").text(sandidvrdetcctv3trash);
      $("#detailKerusakanCCTV3Trash").text(kerusakandetcctv3trash);
      $("#detailCatatanCCTV3Trash").text(catatandetcctv3trash);
      
  });

</script>

<script>

$(document).on('click', '#btnDeleteAllCctv3', function(e) {
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