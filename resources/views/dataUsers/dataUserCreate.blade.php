@extends('layouts.main')


@section('content')
<?php use Illuminate\Support\Carbon; ?>

            <div class="flash-success" data-success="{{ session('success') }}"></div>
            
            <a href="/dashboard/users" class="btn btn-info mb-3 text-white"><i class="bi bi-arrow-left"></i> Back</a>
            <div class="col-md-6">
              <div class="card radius-10">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    @if ($user->image != 'default.png')
                    <img src="{{ asset('storage/' . $user->image) }}" class="rounded-circle p-1 border" width="90" height="90" alt="...">
                    @else
                    <img src="{{ asset('assets/images/avatars/' . $user->image) }}" class="rounded-circle p-1 border" width="90" height="90" alt="...">
                    @endif
                    <div class="flex-grow-1 ms-3">
                      <h5 class="mt-0">{{ $user->status_login }}</h5>                   
                      <p class="mb-0">
                        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">              
                          <div class="ps-3">
                            <nav aria-label="breadcrumb">
                              <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-table" style="color:#7b378e"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Data perangkat yang di update oleh : <strong>{{ $user->name }}</strong></li>
                              </ol>
                            </nav>
                          </div>              
                        </div>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        <hr/>                     
        <h6 class="mb-2 text-uppercase">Data AC</h6>
        <div class="card">
          <div class="card-body">
            <div class="table-responsive"> 
              <table id="example" class="table table-striped table-bordered" style="width:100%">
                @if (auth()->user()->role == 3)                  
                <a href="javascript:;" class="btn btn-danger btn-sm mb-3" id="selectDeleteCreateUser">Delete All</a>
                @endif
                <thead>
                  <tr>
                    {{-- <th><input type="checkbox" class="form-check-input" id="checkAllCreateUser" /></th> --}}
                    <th>No.</th>
                    <th>Di Update</th>
                    <th>Wing</th>
                    <th>Lantai</th>
                    <th>Ruangan</th>
                    <th>Merk</th>                    
                    <th>Type</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($dataCreates as $data)
                    <tr id="sid{{ $data->id }}">
                        {{-- <td><input class="form-check-input checkBoxClassCreateUser" type="checkbox" name="ids" value="{{ $data->id }}" /></td> --}}
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ Carbon::parse($data->user_updated_time)->diffForHumans() }}</td>
                        <td>{{ $data->wing }}</td>
                        <td>{{ $data->lantai }}</td>
                        <td>{{ $data->ruangan }}</td>
                        <td>{{ $data->merk }}</td>
                        <td>{{ $data->type }}</td>
                        @if ($data->status == "Rusak")
                        
                        <td class="bg-danger">{{ $data->status }}</td>
                        @else

                        <td class="bg-info">{{ $data->status }}</td>
                        @endif
                    </tr> 
                    @endforeach                                   
                </tbody>
                <tfoot>
                  <tr>
                    {{-- <th></th> --}}
                    <th>No.</th>
                    <th>Di Update</th>
                    <th>Wing</th>
                    <th>Lantai</th>
                    <th>Ruangan</th>
                    <th>Merk</th>                    
                    <th>Type</th>
                    <th>Status</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>

        <h6 class="mb-2 text-uppercase">Data CCTV Monitor 1</h6>
        <div class="card">
          <div class="card-body">
            <div class="table-responsive"> 
              <table id="exampleUserUpdate" class="table table-striped table-bordered" style="width:100%">                
                <thead>
                  <tr>                   
                    <th>No.</th>
                    <th>Di Update</th>
                    <th>Lantai</th>
                    <th>Wing</th>
                    <th>Lokasi</th>
                    <th>Merk</th>                    
                    <th>Type</th>
                    <th>Status</th>                    
                  </tr>
                </thead>
                <tbody>
                    @foreach ($dataCctv1 as $cctv1)
                    <tr>                        
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ Carbon::parse($cctv1->updated_time)->diffForHumans() }}</td>
                        <td>{{ $cctv1->lantai }}</td>
                        <td>{{ $cctv1->wing }}</td>
                        <td>{{ $cctv1->lokasi }}</td>
                        <td>{{ $cctv1->merk }}</td>
                        <td>{{ $cctv1->type }}</td>
                        @if ($cctv1->status == "Rusak")
                        <td class="bg-danger">{{ $cctv1->status }}</td>
                        @else
                        <td class="bg-info">{{ $cctv1->status }}</td>
                        @endif
                    </tr> 
                    @endforeach                                   
                </tbody>
                <tfoot>
                  <tr>                    
                    <th>No.</th>
                    <th>Di Update</th>
                    <th>Lantai</th>
                    <th>Wing</th>
                    <th>Lokasi</th>
                    <th>Merk</th>                    
                    <th>Type</th>
                    <th>Status</th>                    
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>

        <h6 class="mb-2 text-uppercase">Data CCTV Monitor 2</h6>
        <div class="card">
          <div class="card-body">
            <div class="table-responsive"> 
              <table id="exampleUserUpdateCctvMonitor2" class="table table-striped table-bordered" style="width:100%">                
                <thead>
                  <tr>                   
                    <th>No.</th>
                    <th>Di Update</th>                   
                    <th>Lokasi</th>
                    <th>Merk</th>                    
                    <th>Type</th>
                    <th>Status</th>                    
                  </tr>
                </thead>
                <tbody>
                    @foreach ($dataCctv2 as $cctv2)
                    <tr>                        
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ Carbon::parse($cctv2->updated_time)->diffForHumans() }}</td>
                        <td>{{ $cctv2->lokasi }}</td>
                        <td>{{ $cctv2->merk }}</td>
                        <td>{{ $cctv2->type }}</td>
                        @if ($cctv2->status == "Rusak")
                        <td class="bg-danger">{{ $cctv2->status }}</td>
                        @else
                        <td class="bg-info">{{ $cctv2->status }}</td>
                        @endif
                    </tr> 
                    @endforeach                                   
                </tbody>
                <tfoot>
                  <tr>                    
                    <th>No.</th>
                    <th>Di Update</th>                   
                    <th>Lokasi</th>
                    <th>Merk</th>                    
                    <th>Type</th>
                    <th>Status</th>                   
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>


        <h6 class="mb-2 text-uppercase">Data CCTV Monitor 3</h6>
        <div class="card">
          <div class="card-body">
            <div class="table-responsive"> 
              <table id="exampleUserUpdateCctvMonitor3" class="table table-striped table-bordered" style="width:100%">                
                <thead>
                  <tr>                   
                    <th>No.</th>
                    <th>Di Update</th>
                    <th>Lantai</th>
                    <th>Wing</th>
                    <th>Lokasi</th>
                    <th>Merk</th>                    
                    <th>Type</th>
                    <th>Status</th>                    
                  </tr>
                </thead>
                <tbody>
                    @foreach ($dataCctv3 as $cctv3)
                    <tr>                        
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ Carbon::parse($cctv3->updated_time)->diffForHumans() }}</td>
                        <td>{{ $cctv3->lantai }}</td>
                        <td>{{ $cctv3->wing }}</td>
                        <td>{{ $cctv3->lokasi }}</td>
                        <td>{{ $cctv3->merk }}</td>
                        <td>{{ $cctv3->type }}</td>
                        @if ($cctv3->status == "Rusak")
                        <td class="bg-danger">{{ $cctv3->status }}</td>
                        @else
                        <td class="bg-info">{{ $cctv3->status }}</td>
                        @endif
                    </tr> 
                    @endforeach                                   
                </tbody>
                <tfoot>
                  <tr>                    
                    <th>No.</th>
                    <th>Di Update</th>
                    <th>Lantai</th>
                    <th>Wing</th>
                    <th>Lokasi</th>
                    <th>Merk</th>                    
                    <th>Type</th>
                    <th>Status</th>                    
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>


        <h6 class="mb-2 text-uppercase">Data CCTV Monitor 4</h6>
        <div class="card">
          <div class="card-body">
            <div class="table-responsive"> 
              <table id="exampleUserUpdateCctvMonitor4" class="table table-striped table-bordered" style="width:100%">                
                <thead>
                  <tr>                   
                    <th>No.</th>
                    <th>Di Update</th>                   
                    <th>Lokasi</th>
                    <th>Merk</th>                    
                    <th>Type</th>
                    <th>Status</th>                    
                  </tr>
                </thead>
                <tbody>
                    @foreach ($dataCctv4 as $cctv4)
                    <tr>                        
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ Carbon::parse($cctv4->updated_time)->diffForHumans() }}</td>
                        <td>{{ $cctv4->lokasi }}</td>
                        <td>{{ $cctv4->merk }}</td>
                        <td>{{ $cctv4->type }}</td>
                        @if ($cctv4->status == "Rusak")
                        <td class="bg-danger">{{ $cctv4->status }}</td>
                        @else
                        <td class="bg-info">{{ $cctv4->status }}</td>
                        @endif
                    </tr> 
                    @endforeach                                   
                </tbody>
                <tfoot>
                  <tr>                    
                    <th>No.</th>
                    <th>Di Update</th>                   
                    <th>Lokasi</th>
                    <th>Merk</th>                    
                    <th>Type</th>
                    <th>Status</th>                   
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
        

        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-center">
               <h5 class="mb-0">Last Activity</h5>
               
                <div class="ms-auto position-relative">
                  <button id="peekMap" type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleFullScreenModal" data-lat={{ $user->userAgent->lat }} data-long="{{ $user->userAgent->long }}"><i class="bi bi-eye"></i></button>
                </div>
            </div>
            <div class="table-responsive mt-3">
              <table class="table align-middle">
                <thead class="table-secondary">
                  <tr>                                      
                   <th>Lat</th>
                   <th>Long</th>
                   <th>Device</th>
                   {{-- <th>Status</th> --}}
                  </tr>
                </thead>
                <tbody>
                  <tr>                                       
                    <td>{{ $user->userAgent->lat }}</td>
                    <td>{{ $user->userAgent->long }}</td>
                    <td>{{ $user->userAgent->user_agent }}</td>
                    {{-- @if ($user->is_login == NULL)
                    
                    <td>{{ Carbon::parse($user->is_login)->diffForHumans() }}</td>                    
                    
                    @endif --}}
                  </tr>                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      

        <!-- Modal -->
        <div class="modal fade" id="exampleFullScreenModal" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Location</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="card">
                  <div class="card-body">
                    <div id="simple-map" class="gmaps"></div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>     

   

        
        <script src="/assets/js/jquery.min.js"></script>        
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKXKdHQdtqgPVl2HI2RnUa_1bjCxRCQo4&callback=initMap" async defer></script>        
     
        <script>

            $(function(e) {            
              
              $("#checkAllCreateUser").click(function() {
                $(".checkBoxClassCreateUser").prop('checked', $(this).prop('checked'));
              });
              $("#selectDeleteCreateUser").click(function(e) {              
                var checkBox = $('.checkBoxClassCreateUser:checked');
                if(checkBox.length > 0) {                  
                    e.preventDefault();                  
                    Swal.fire({
                    title: 'Are you sure?',
                    text: "Some data will be deleted!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                    // $('input[type=checkbox]').prop('checked', false);
                    if (result.isConfirmed) {
                      var allids = [];
                    $("input:checkbox[name=ids]:checked").each(function() {
                      allids.push($(this).val());
                    });                  
                    
                    $.ajax({
                      url: "{{ route('ac.deleteSelected') }}",
                      type: "DELETE",
                      data : {
                        _token : $("input[name=_token]").val(),
                        ids:allids
                      },
                      success : response => {
                        $.each(allids, (key, val) => {
                          $("#sid"+val).remove();                        
                        })
                      },
                      error : e => {
                        Swal.fire({
                          icon: 'error',
                          title: 'Oops...'
                        })
                      }
                    });
                      
                    }
                  })
                }else{
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Choose at least one data!'  
                  })
                }                       
              })
                                
            });
          </script>

          <script>
$(document).on("click", "#peekMap", function() {
  const lat = $(this).data('lat');
  const long = $(this).data('long');
  console.log(long);
  initMap(lat, long);
});
var map;

function initMap(lat, long) {	
	map = new google.maps.Map(document.getElementById('simple-map'), {
		center: {
			lat: lat,
			lng: long
		},
		zoom: 8
	});	
}
// routes map
// style map
          </script>

<script>
  const queryString = window.location.href.split(/[s,]+/);
  const last = queryString[queryString.length - 1].slice(1);
  const queryString2 = window.location.href;
  
  if(last == queryString2){
    console.log('sama');
  }else{
    console.log('tdk');
  }


</script>
      
@endsection
