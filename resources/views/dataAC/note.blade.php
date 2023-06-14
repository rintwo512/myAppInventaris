@extends('layouts.main')


@section('content')
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
                    <li class="breadcrumb-item active" aria-current="page">Data Maintenance Outdoor AC</li>
                  </ol>
                </nav>
              </div>              
            </div>                       
            <a href="/ac" class="mb-0 text-uppercase btn btn-secondary btn-sm"><i class="bi bi-arrow-left"></i></a>

            <button class="mb-0 text-uppercase btn btn-primary btn-sm"><i class="bi bi-plus" data-bs-toggle="modal" data-bs-target="#modalAddNoteAc"></i></button>

        <hr/>
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="unlockBtnNote" value="true">
                  </div>
              <table id="example" class="table table-striped table-bordered tb-ac" style="width:100%">              
                <thead>
                  <tr>                
                    <th>Aksi</th>
                    <th>Petugas</th>
                    <th>Tanggal</th>
                    <th>Opsi</th>                    
                  </tr>
                </thead>
                <tbody>
                    @foreach($dataNote as $note)
                    <tr>                   
                        <td>{{ $note->aksi }}</td>
                        <td>{{ $note->petugas }}</td>
                        <td>{{ Carbon::parse($note->tanggal)->diffForHumans() }}</td>
                        <td>
                        <div class="table-actions d-flex align-items-center gap-3 fs-6">
                        <button id="btnUpdateNote" class="text-info btn-delete bg-transparent border-0" data-bs-toggle="modal" data-bs-target="#modalUpdateNoteAc"
                        data-id="{{ $note->id }}"
                        data-petugas="{{ $note->petugas }}"
                        data-tanggal="{{ $note->tanggal }}"
                        data-aksi="{{ $note->aksi }}"><i class="bi bi-pencil"></i></button>
                        @can('admin')
                        <form action="/ac/note/{{ $note->id }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="text-danger btn-delete bg-transparent border-0 note-delete" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" style="display: none"><i class="bi bi-x-circle-fill"></i></button>
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



         <!-- Modal add data note ac -->
         <div class="modal fade" id="modalAddNoteAc" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">New Data</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">                                    
              <form action="/ac/note" class="row g-3 needs-validation" method="post">    
                @csrf                
                <div class="col-6">
                  <label class="form-label">Petugas <small class="text-danger">*</small></label>
                  <input type="text" class="form-control" id="petugas" name="petugas">
                </div>
                <div class="col-6">
                    <label class="form-label">Tanggal <small class="text-danger">*</small></label>
                    <input type="text" class="form-control" id="date-time" name="tanggal">
                  </div>
                <div class="col-12">
                  <label class="form-label">Aksi <small class="text-danger">*</small></label>
                  <textarea class="form-control" rows="4" cols="4" id="aksi" name="aksi"></textarea>
                </div>

              </div>
              <div class="modal-footer">         
              <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>                                    
              </div>
            </div>
          </div>
          <!-- End Modal add data note ac -->

          <!-- Modal update data note ac -->
         <div class="modal fade" id="modalUpdateNoteAc" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Update Data</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalUpdate">
              <form id="formNote" class="row g-3 needs-validation" method="post">
                @method("PUT")
                @csrf                
                <div class="col-6">
                    <input type="hidden" name="noteid" id="noteId">
                  <label class="form-label">Petugas <small class="text-danger">*</small></label>
                  <input type="text" class="form-control" id="petugas" name="petugas">
                </div>
                <div class="col-6">
                    <label class="form-label">Tanggal <small class="text-danger">*</small></label>
                    <input type="text" class="form-control" id="date-time2" name="tanggal">
                  </div>
                <div class="col-12">
                  <label class="form-label">Aksi <small class="text-danger">*</small></label>
                  <textarea class="form-control" rows="4" cols="4" id="aksi_update" name="aksi"></textarea>
                </div>

              </div>
              <div class="modal-footer">         
              <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>                                    
              </div>
            </div>
          </div>
          <!-- End Modal update data note ac -->

<script src="/assets/js/jquery.min.js"></script>
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

<script>
    $(document).on('click', '#btnUpdateNote', function() {
        const noteID = $(this).data('id');        
        const notePetugas = $(this).data('petugas');        
        const noteTanggal = $(this).data('tanggal');        
        const noteAksi = $(this).data('aksi');
        $("#formNote").attr('action', '/ac/note/' + noteID);
        $("#modalUpdate #noteId").val(noteID);
        $("#modalUpdate #petugas").val(notePetugas);
        $("#modalUpdate #date-time2").val(noteTanggal);
        $("#modalUpdate #aksi_update").val(noteAksi);
    });

    $(document).ready(function() {
                $('#unlockBtnNote').change(function() {
                    if($(this).prop("checked")){
                        $('.note-delete').removeAttr('style');
                    }else{
                        $('.note-delete').css('display','none');
                    }
                })
            });
</script>
@endsection