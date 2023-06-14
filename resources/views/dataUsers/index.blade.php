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
                    <li class="breadcrumb-item active" aria-current="page">Data Users</li>
                  </ol>
                </nav>
              </div>              
            </div>                        
        <hr/>
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">              
              <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>                    
                    <th>Name</th>
                    <th>NIK</th>
                    <th>Status</th>
                    <th>Role</th>                    
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($dataUsers as $user)
                  @if ($user->id != 1)                                      
                  <tr id="iduser{{ $user->id }}">                    
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->nik }}</td>
                    @if ($user->is_active === 1)
                    <td>Active</td>                    
                    @else
                    <td class="bg-danger">Inactive</td>                    
                    @endif
                    @if ($user->role === 1)
                    <td>Admin</td>                    
                    @else
                    <td>Member</td>                    
                    @endif                                      
                    <td>
                        <div class="table-actions d-flex align-items-center gap-3 fs-6">                            
                           @if ($user->name == auth()->user()->name || $user->status_login == 'online')
                            
                           
                           <a href="/dashboard/users/{{ $user->id }}" class="text-info" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Lihat Aktivitas"><i class="bi bi-file-earmark-richtext"></i></a>
                           
                           
                           @else
                           @if ($user->is_active !=  0) 
                           <a href="/dashboard/users/{{ $user->id }}" class="text-info" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Lihat Aktivitas"><i class="bi bi-file-earmark-richtext"></i></a>
                           @endif
                           <a href="javascript:void(0)" class="text-warning" data-bs-toggle="modal" data-bs-target="#modalUpdateUser" id="btnEditUser"
                            data-iduser="{{ $user->id }}"
                            data-activeuser="{{ $user->is_active }}"
                            data-roleuser="{{ $user->role }}"
                            data-nameuser="{{ $user->name }}"
                           ><i class="bi bi-gear"></i></a>

                           <a href="javascript:void(0)" onclick="delUser({{ $user->id }})" class="text-danger"><i class="bi bi-x-circle-fill"></i></a>                           

                           @endif


                        </div>
                    </td>
                  </tr>
                  @endif
                  @endforeach                 
                </tbody>
                <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>NIK</th>
                    <th>Status</th>
                    <th>Role</th>                    
                    <th>Opsi</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>


        <div class="col">
            <!-- Modal -->
            <div class="modal fade" id="modalUpdateUser" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="userTitle">Update User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">                                    
                <form class="row g-3 needs-validation" id="formEdit" method="post">
                    @method('PUT')
                  @csrf
                  <div class="col-md-6">
                    <label for="isActiveCheck" class="form-label">Status </label>
                    <select class="form-select" id="isActiveCheck" name="isActive">                        
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="role" class="form-label">Role </label>
                    <select class="form-select" id="role" name="role">                        
                    </select>
                  </div>                               
                </div>
                <div class="modal-footer">         
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>                                    
                </div>
              </div>
            </div>
          </div>

        <script src="/assets/js/jquery.min.js"></script>  
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>


            $(document).on("click", "#btnEditUser", function(){
                const id = $(this).data('iduser');
                const active = $(this).data('activeuser');
                let cardAct = '';
                if(active == 1){
                  cardAct += `<option value="1">Active</option><option value="0">Inactive</option>`;
                  $('#isActiveCheck').html(cardAct);
                }else{
                  cardAct += `<option value="0">Inactive</option><option value="1">Active</option>`;
                  $('#isActiveCheck').html(cardAct);
                }


                const role = $(this).data('roleuser');
                let cardRole = '';
                if(role == 1){
                  cardRole += `<option value="1">Admin</option>
                        <option value="0">Member</option>`;
                  $('#role').html(cardRole);
                }else{
                  cardRole += `<option value="0">Member</option><option value="1">Admin</option>`;
                  $('#role').html(cardRole);
                }


                const name = $(this).data('nameuser');
                $('#formEdit').attr('action', `users/${id}`);
                $('#userTitle').html(`Update Data ${name}`);
            });

            
        </script>
        
        <script>
           function delUser(id)
          {         
            
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
                    $.ajax({
                        url:"/dashboard/users/delete/"+id,
                        type: "DELETE",
                        data:{
                        _token : $("input[name=_token]").val()
                        },
                        success : function(response){
                        $("#iduser"+id).remove();
                        }
                    });
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
                })                                 
          }
        </script>
        
        

@endsection       