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
//  $date = date('Y-m-d H:i:s');
@endphp


            <div class="flash-success" data-success="{{ session('success') }}"></div>
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">              
              <div class="ps-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-table" style="color:#7b378e"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Data AC</li>
                  </ol>
                </nav>
              </div>              
            </div>            
                     
            <a href="/project/create" class="mb-0 text-uppercase btn btn-primary btn-sm">Tambah Data</a>
        <hr/>
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table id="example" class="table table-striped table-bordered tb-ac" style="width:100%">                                          
                <thead>
                  <tr>                 
                    <th>Jenis Pek</th>
                    <th>Lokasi Pek</th>
                    <th>Detail Pek</th>
                    <th>Status Pek</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($datas as $data)                                                 
                  <tr>                                   
                    <td>{{$data->jenis_pek}}</td> 
                    <td>{{$data->lokasi_pek}}</td> 
                    <td>{{$data->detail_pek}}</td>
                    @if($data->status_pek == "Close") 
                    <td class="text-success"><strong>{{$data->status_pek}}</strong></td>
                    @elseif($data->status_pek == "Progress")
                    <td class="text-warning"><strong>{{$data->status_pek}}</strong></td>
                    @else
                    <td class="text-danger"><strong>{{$data->status_pek}}</strong></td> 
                    @endif
                    <td style="font-size:16px;"> 

                      <a href="javascript::;" id="btnEditPro" class="text-primary btn-delete" 
                      data-id1="{{$data->id}}"
                      data-jenispek1="{{$data->jenis_pek}}"
                      data-lokpek1="{{$data->lokasi_pek}}"
                      data-detpek1="{{$data->detail_pek}}"
                      data-statpek1="{{$data->status_pek}}"
                      data-petugaspek1="{{$data->petugas_pek}}"
                      data-despek1="{{$data->des_pek}}"
                      data-tglmulaipek1="{{$data->tgl_mulai_pek}}"
                      data-tglselesaipek1="{{$data->tgl_akhir_pek}}" data-bs-toggle="modal" data-bs-target="#modalEditPro"><i class="bi bi-pencil-fill"></i></a>

                      <a href="javascript::;" id="btnDetailPek" class="text-info btn-delete" title="Detail"
                      data-id="{{$data->id}}"
                      data-jenispek="{{$data->jenis_pek}}"
                      data-lokpek="{{$data->lokasi_pek}}"
                      data-detpek="{{$data->detail_pek}}"
                      data-statpek="{{$data->status_pek}}"
                      data-petugaspek="{{$data->petugas_pek}}"
                      data-despek="{{$data->des_pek}}"
                      data-tglmulaipek="{{$data->tgl_mulai_pek}}"
                      data-tglselesaipek="{{$data->tgl_akhir_pek}}" data-bs-toggle="modal" data-bs-target="#exampleScrollableModal"><i class="bi bi-eye-fill"></i></a>
                    
                      <a href="/project/delete/{{$data->id}}" id="btnDelPro" class="text-danger btn-delete" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i class="bi bi-x-circle-fill"></i></a>
                  
                    </td> 
                  </tr>
                  @endforeach                           
                </tbody>
                <tfoot>
                  <tr>                   
                  <th>Jenis Pek</th>
                    <th>Lokasi Pek</th>
                    <th>Detail Pek</th>
                    <th>Status Pek</th>
                    <th>Opsi</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>

        {{-- Modal Detail --}}

        <div class="col">          
          <div class="modal fade" id="exampleScrollableModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Detail Data</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="card"> 
                    <div id="bodyDetail">                      
                      <ul class="list-group">                        
                        <li class="list-group-item d-flex justify-content-between align-items-center">Jenis Pekerjaan<i class="bi bi-arrow-right"></i> <strong id="detailJesPek" class="text-capitalize"></strong>
                        </li>                        
                        <li class="list-group-item d-flex justify-content-between align-items-center">Lokasi Pekerjaan <i class="bi bi-arrow-right"></i> <strong id="detailLokPek"></strong>
                        </li>                        
                        <li class="list-group-item d-flex justify-content-between align-items-center">Petugas Pekerjaan <i class="bi bi-arrow-right"></i> <strong id="detailPetPek"></strong>
                        </li>                                              
                        <li class="list-group-item d-flex justify-content-between align-items-center">Tanggal Mulai Pekerjaan <i class="bi bi-arrow-right"></i> <strong id="detailTglMulai"></strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Tanggal Selesai Pekerjaan <i class="bi bi-arrow-right"></i> <strong id="detailTglSelesai"></strong>
                        </li>                        

                        <div class="accordion-item detail-kerusakan">
                          <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              Detail Pekerjaan
                            </button>
                          </h2>
                          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <p class="accordion-body" id="detailPek">
                            </p>
                          </div>
                        </div>
                        <div class="accordion-item detail-keterangan">
                          <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                              Deskripsi Pekerjaan
                            </button>
                          </h2>
                          <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <p class="accordion-body" id="detailDesPek">
                            </p>
                          </div>
                        </div>                                              
                      </ul>
                    </div>                 
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>                 
                </div>
              </div>
            </div>
          </div>
        </div>

        {{-- end modal detail --}}

        {{-- modal edit data --}}
        <div class="modal fade" id="modalEditPro" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Update Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <form class="row g-3 needs-validation" id="formEdit">           
            @csrf
            @method("POST")           
          <div class="col-md-4">
            <label for="jenis_pek" class="form-label">Jenis Pekerjaan</label>
            <select class="form-select" id="edit_jenis_pek" required name="jenis_pek">
                <option selected disabled value="">--Select--</option>
                <option value="ME">ME</option>
                <option value="Sipil">Sipil</option>
            </select>            
          </div>          
          <div class="col-md-4">
            <label for="tgl_mulai" class="form-label">Tanggal Mulai</label>
            <input type="text" class="form-control edit_tgl_mulai" id="date-time2" name="tgl_mulai" required placeholder="Masukkan tanggal mulai perkerjaan!">
          </div>
          <div class="col-md-4">
            <label for="tgl_selesai" class="form-label">Tanggal Selesai</label>
            <input class="result form-control edit_tgl_selesai" type="text" name="tgl_selesai" id="date-time" required placeholder="Masukkan tanggal selesai perkerjaan!">
          </div>
          <div class="col-md-12">
            <label for="petugas_pek" class="form-label">Petugas <small class="text-danger">(Akhiri nama petugas dengan tanda koma)</small></label>
            <input class="form-control" id="edit_petugas_pek" name="petugas_pek" placeholder="Masukkan nama petugas!">
          </div>
          <div class="col-md-6">
            <label for="lokasi_pek" class="form-label">Lokasi Pekerjaan</label>
            <input type="text" class="form-control" id="edit_lokasi_pek" name="lokasi_pek" placeholder="Masukkan Lokasi Perkerjaan!">
              @error('lokasi_pek')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
          </div>
          <div class="col-md-6">
            <label for="status_pek" class="form-label">Status Pekerjaan</label>
            <select class="form-select" required name="status_pek" id="edit_status_pek">
                <option selected disabled value="">--Select--</option>
                <option value="Close">Close</option>
                <option value="Pending">Pending</option>
                <option value="Progress">Progress</option>
            </select>         
          </div>                        
          <div class="col-6" id="detail">
            <label class="detail_pek">Detail Pekerjaan</label>
            <textarea class="form-control" name="detail_pek" id="edit_detail_pek" rows="4" cols="4" placeholder="Masukan apa yang Anda kerjaakan!" required></textarea>
          </div>
          <div class="col-6" id="ketPek">
            <label class="des_pek">Keterangan Pekerjaan</label>
            <textarea class="form-control" name="des_pek" id="edit_des_pek" rows="4" cols="4" placeholder="Masukan keterangan pekrjaan Anda!"></textarea>
          </div>         
          <div class="col-12">
              <div class="d-grid">
              <button class="btn btn-purple" type="submit">Submit form</button>
            </div>
          </div>
        </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
        {{-- end modal range data --}}


        <script src="/assets/js/jquery.min.js"></script>              
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>                
        <script src="{{asset('assets/plugins/flickity/flickity.pkgd.min.js')}}"></script>       

        
          
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

          $(document).on('click', '#btnDelPro', function(e){
            const href = $(this).attr('href');
            e.preventDefault();          
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
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
              }
            })
          });

</script>

<script>
  $(document).ready(function() {
    $(document).on('click', '#btnDetailPek', function() {
      const idPek = $(this).data("id");
      const jenisPek = $(this).data("jenispek");      
      const lokPek = $(this).data("lokpek");
      const detPek = $(this).data("detpek");
      const statPek = $(this).data("statpek");
      const petugasPek = $(this).data("petugaspek");
      const desPek = $(this).data("despek");
      const tglMulaiPek = $(this).data("tglmulaipek");      
      const tglselesaiPek = $(this).data("tglselesaipek");

      

      $('#bodyDetail #detailJesPek').html(jenisPek);
      $('#detailLokPek').html(lokPek);
      $('#detailPetPek').html(petugasPek);
      $('#bodyDetail #detailTglMulai').html(tglMulaiPek);
      $('#bodyDetail #detailTglSelesai').html(tglselesaiPek);
      $('#detailPek').html(detPek);
      $('#detailDesPek').html(desPek);                                                        
    });
  });
</script>
<script>
  $(document).ready(function() {
    $(document).on('click', '#btnEditPro', function() {
      const idPek1 = $(this).data("id1");
      const jenisPek1 = $(this).data("jenispek1");      
      const lokPek1 = $(this).data("lokpek1");
      const detPek1 = $(this).data("detpek1");
      const statPek1 = $(this).data("statpek1");
      var petugasPek1 = $(this).data("petugaspek1");     
      const desPek1 = $(this).data("despek1");
      const tglMulaiPek1 = $(this).data("tglmulaipek1");      
      const tglselesaiPek1 = $(this).data("tglselesaipek1");

      $("#formEdit").attr("action", "/project/update/" +idPek1);
      $("#formEdit").attr("method", "POST");
      $('#edit_id').val(idPek1);
      $('#edit_jenis_pek').val(jenisPek1);
      $('#edit_lokasi_pek').val(lokPek1);
      $('#edit_petugas_pek').val(petugasPek1); 
      $('.edit_tgl_mulai').val(tglMulaiPek1);
      $('.edit_tgl_selesai').val(tglselesaiPek1);
      $('#edit_detail_pek').val(detPek1);
      $('#edit_des_pek').val(desPek1);   
      $('#edit_status_pek').val(statPek1);                                                                  
                                                              
    });
  });
</script>


  <script>
    $(document).ready(function() {
        $("#edit_status_pek").on("change", function() {

            $statusPek = $("#edit_status_pek").val();     

            if($statusPek == "Pending"){
                $("#edit_des_pek").attr('required', 'required');
                $("#edit_des_pek").addClass('is-invalid');
                $(".edit_tgl_selesai").attr("disabled", "disabled");
                $(".edit_tgl_selesai").val("");
                
            }else{
              $("#edit_des_pek").removeAttr("required");
              $(".edit_tgl_selesai").removeAttr("disabled", "disabled");
            
            }
            $("#edit_des_pek").keyup(function() {
              $("#edit_des_pek").removeClass("is-invalid"); 
              $("#edit_des_pek").addClass("is-valid"); 
            });
            
        });
        
        // const des = document.querySelector("#edit_des_pek");
        // des
    });

</script>



         

@endsection       
