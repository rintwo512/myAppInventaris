<aside class="sidebar-wrapper">
    <div class="iconmenu"> 
      <div class="nav-toggle-box">
        <div class="nav-toggle-icon" onclick="setWrapper()"><i class="bi bi-list"></i></div>
      </div>
      <ul class="nav nav-pills flex-column">
        <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Home">
          <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-dashboards" type="button"><i class="bi bi-house-door-fill"></i></button>
        </li>
        <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Menu">
          <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-application" type="button"><i class="bi bi-grid-fill"></i></button>
        </li>
        @can('admin')          
        <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Menu Admin">
          <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-adminMenu" type="button"><i class="bi bi-person-plus-fill"></i></button>
        </li>
        <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Charts">
          <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-charts" type="button"><i class="bi bi-bar-chart-steps"></i></button>
        </li>       
        @endcan
        <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Teknik">         
          <button type="button" data-bs-toggle="pill" data-bs-target="#pills-teknik" class="nav-link" ><i class="bi bi-wrench pl-10"></i></button>          
      </li>
        <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Tools">         
          <button type="button" data-bs-toggle="pill" data-bs-target="#pills-tools" class="nav-link" ><i class="bi bi-tools pl-10"></i></button>          
      </li>  
        <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Settings">
          <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-settings" type="button"><i class="bi bi-gear-fill"></i></button>
        </li>
        <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Log Out" id="logSidebar">
          <form action="/logout/{{ auth()->user()->id }}" method="post">
            @csrf
            <button type="button" id="btnLog1" class="nav-link" ><i class="bi bi-box-arrow-in-right"></i></button>
          </form>
        </li>        
      </ul>
    </div>
    <div class="textmenu">
      <div class="brand-logo">
        <img src="/assets/images/r-app.png" style="margin-left: 10px" width="160" alt=""/>
      </div>
      <div class="tab-content">
        <div class="tab-pane fade" id="pills-dashboards">
          <div class="list-group list-group-flush">
            <div class="list-group-item">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-0">Home</h5>
              </div>                    
            </div>
            <a href="/dashboard" class="list-group-item {{ Request::is('dashboard') ? 'active' : '' }}"><i class="bi bi-house-door"></i> Dashboard</a>                             
          </div>
        </div>
        <div class="tab-pane fade" id="pills-application">
            <div class="list-group list-group-flush">
              <div class="list-group-item">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-0">Database</h5>
                </div>                    
              </div>
              <a href="/ac" class="list-group-item {{ Request::is('ac*') ? 'active' : '' }}"><i class="bi bi-server"></i> Data AC</a>
              <a href="/dashboard/cctv" class="list-group-item list-group-item {{ Request::is('dashboard/cctv*') ? 'active' : '' }}"><i class="bi bi-server"></i> Data CCTV</a>
              <a href="/dashboard/stock" class="list-group-item list-group-item {{ Request::is('dashboard/stock*') ? 'active' : '' }}"><i class="bi bi-server"></i> Stock Barang</a>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-adminMenu">
          <div class="list-group list-group-flush">
            <div class="list-group-item">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-0">Menu Admin</h5>
              </div>                    
            </div>
            <a href="/dashboard/users" class="list-group-item {{ Request::is('/dashboard/users*') ? 'active' : '' }}"><i class="bi bi-person-lines-fill"></i> Data Users</a>

            <a href="javascript:void(0)" class="list-group-item" data-bs-toggle="modal" data-bs-target="#modalAddUser"><i class="bi bi-person-plus"></i> Add User</a>          
          </div>
      </div>
      <div class="tab-pane fade" id="pills-charts">
        <div class="list-group list-group-flush">
          <div class="list-group-item">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-0">Menu Admin</h5>
            </div>                    
          </div>
          <a href="/dashboard/charts" class="list-group-item {{ Request::is('/dashboard/charts*') ? 'active' : '' }}"><i class="bi bi-bar-chart-fill"></i> Update Charts</a>          
        </div>
      </div>
      <div class="tab-pane fade" id="pills-settings">
        <div class="list-group list-group-flush">
          <div class="list-group-item">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-0">Settings</h5>
            </div>                    
          </div>
          <a href="/settings/profile" class="list-group-item {{ Request::is('settings/profile*') ? 'active' : '' }}"><i class="bi bi-person-lines-fill"></i> Profile</a>
          <a href="/settings/changepassword" class="list-group-item list-group-item {{ Request::is('settings/changepassword*') ? 'active' : '' }}"><i class="bi bi-lock"></i> Change Password</a>
        </div>
    </div>
    <div class="tab-pane fade" id="pills-tools">
      <div class="list-group list-group-flush">
        <div class="list-group-item">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-0">Tools</h5>
          </div>                    
        </div>

        <a href="/tools/konver-cosine" class="list-group-item {{ Request::is('/tools/konver-cosine*') ? 'active' : '' }}"><i class="bi bi-gear-wide"></i> Cos Kalkulator</a>

        <a href="/tools/amper-to-va" class="list-group-item {{ Request::is('/tools/amper-to-va*') ? 'active' : '' }}"><i class="bi bi-gear-wide"></i> Konversi Amper - VA</a>

        <a href="/tools/watt-to-amper" class="list-group-item {{ Request::is('/tools/watt-to-amper*') ? 'active' : '' }}"><i class="bi bi-gear-wide"></i> Konversi Watt - Amper</a>

        <a href="/tools/amper-to-watt" class="list-group-item {{ Request::is('/tools/amper-to-watt*') ? 'active' : '' }}"><i class="bi bi-gear-wide"></i> Konversi Amper - Watt</a>

        <a href="/tools/watt-to-va" class="list-group-item {{ Request::is('/tools/watt-to-va*') ? 'active' : '' }}"><i class="bi bi-gear-wide"></i> Konversi Watt - VA</a>

        <a href="/tools/konsumsi-energi" class="list-group-item {{ Request::is('/tools/konsumsi-energi*') ? 'active' : '' }}"><i class="bi bi-gear-wide"></i> Konsumsi Energi</a>

        <a href="/tools/ohm-law" class="list-group-item {{ Request::is('/tools/ohm-law*') ? 'active' : '' }}"><i class="bi bi-gear-wide"></i> Ohm law</a>

        <a href="/tools/voltage-divider" class="list-group-item {{ Request::is('/tools/voltage-divider*') ? 'active' : '' }}"><i class="bi bi-gear-wide"></i> Voltage Divider</a>

        <a href="/tools/celcius-fahrenheit" class="list-group-item {{ Request::is('/tools/celcius-fahrenheit*') ? 'active' : '' }}"><i class="bi bi-gear-wide"></i>Celcius - Fahrenheit</a>

        <a href="/tools/btu-to-pk" class="list-group-item {{ Request::is('/tools/btu-to-pk*') ? 'active' : '' }}"><i class="bi bi-gear-wide"></i> Konversi Btu - PK</a>

        <a href="/tools/watt-to-btu" class="list-group-item {{ Request::is('/tools/watt-to-btu*') ? 'active' : '' }}"><i class="bi bi-gear-wide"></i> Konversi Watt To Btu/h</a>

        <a href="/tools/btu-to-watt" class="list-group-item {{ Request::is('/tools/btu-to-watt*') ? 'active' : '' }}"><i class="bi bi-gear-wide"></i> Konversi Btu/h To Watt</a>

        <a href="/tools/watts-to-kWh" class="list-group-item {{ Request::is('/tools/watts-to-kWh*') ? 'active' : '' }}"><i class="bi bi-gear-wide"></i> Konversi Watts To kWh</a>

        <a href="/tools/joules-to-watt" class="list-group-item {{ Request::is('/tools/joules-to-watt*') ? 'active' : '' }}"><i class="bi bi-gear-wide"></i> Joules To Watt</a>
      </div>
    </div>
    <div class="tab-pane fade" id="pills-teknik">
      <div class="list-group list-group-flush">
        <div class="list-group-item">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-0">Note</h5>
          </div>                    
        </div>
        <a href="/teknik/listrik" class="list-group-item {{ Request::is('/teknik/listrik*') ? 'active' : '' }}"><i class="bi bi-gear-wide"></i> Teknik Listrik</a>
        <a href="/teknik/pendingin" class="list-group-item {{ Request::is('/teknik/pendingin*') ? 'active' : '' }}"><i class="bi bi-gear-wide"></i> Teknik Pendingin</a>
        <a href="/teknik/mesin" class="list-group-item {{ Request::is('/teknik/mesin*') ? 'active' : '' }}"><i class="bi bi-gear-wide"></i> Teknik Mesin</a>
      </div>
    </div>
    </div>
  </div>
 </aside>


 <div class="col">
  <!-- Modal -->
  <div class="modal fade" id="modalAddUser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">                                    
      <form action="/dashboard/users" method="post" class="row g-3 needs-validation">
        @csrf
        <div class="col-md-6">
          <label for="name" class="form-label">Full Name</label>
          <input type="text" class="form-control @error('name') is-invalid
          @enderror" id="name" value="{{ old('name') }}" required name="name" placeholder="Name">
        </div>
        <div class="col-md-6">
          <label for="nik" class="form-label">NIK</label>
          <input type="text" class="form-control @error('name') is-invalid
          @enderror" id="nik" value="{{ old('nik') }}" required name="nik" placeholder="NIK" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>                    
        </div>
        <div class="col-12">
          <label for="password" class="form-label">Enter Password</label>                        
          <div class="ms-auto position-relative">
            <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-eye-slash" id="togglePassword"></i></div>
            <input type="password" class="form-control ps-5 @error('password') is-invalid @enderror" id="password" placeholder="Enter Password" name="password" required>                          
          </div>
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

<script>

  // $(document).on('click', function() {
  //   const dd = $('#isActive').is(":checked");    
  // });

  const togglePassword = document.querySelector("#togglePassword");
       const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });        
</script>
<script>
  $(document).on("click","#logSidebar", function() {
    
    if(confirm('Are you sure?')){
      $('#btnLog1').removeAttr('type');
    }

  });
</script>