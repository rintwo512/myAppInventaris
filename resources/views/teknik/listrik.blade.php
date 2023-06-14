@extends('layouts.main')


@section('content')
<style>
    p{
        font-size: 20px;
    }
</style>
<h6 class="mb-0 text-uppercase">Proses Listrik</h6>
<hr/>
<div class="card">
  <div class="card-body">
    <ul class="nav nav-tabs nav-danger" role="tablist">
      <li class="nav-item" role="presentation">
        <a class="nav-link active" data-bs-toggle="tab" href="#dangerhome" role="tab" aria-selected="true">
          <div class="d-flex align-items-center">
            <div class="tab-icon"><i class='bx bx-brightness font-18 me-1'></i>
            </div>
            <div class="tab-title">Note</div>
          </div>
        </a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link" data-bs-toggle="tab" href="#dangerprofile" role="tab" aria-selected="false">
          <div class="d-flex align-items-center">
            <div class="tab-icon"><i class='bx bx-image-alt font-18 me-1'></i>
            </div>
            <div class="tab-title">Image</div>
          </div>
        </a>
      </li>
    </ul>
    <div class="tab-content py-3">
      <div class="tab-pane fade show active" id="dangerhome" role="tabpanel">
        <p>Energi listrik dihasilkan oleh pembangkit listrik yang dapat mengubah energi lain menjadi energi listrik seperti PLTU, PLTA, dll yang akan menghasilkan tegangan sebesar 6 - 24 kV. Tegangan tersebut akan disalurkan ke gardu TET (Tegangan Ekstra Tinggi) yang didalamnya terdapat trafo Step-Up yg berfungsi untuk meningkatkan tegangan menjadi 500kv yang menjadi tegangan ekstra tinggi, tujuan menaikkan tegangan agar menghindari rugi-rugi daya akibat jarak yang sangat jauh. Dengan menaikkan tegangan menjadi 500kv maka arus akan turun, sehingga kawat penghantar yang di gunakan menjadi lebih kecil, sehingga bisa menjadi penghematan dari segi material.</p> <p>Kemudian tegangan 500kv tersebut akan di salurkan ke gardu TT(Tegangan Tinggi) yang di dalamnya terdapat Trafo Step-Down. Dimana tegangan akan di turunkan menjadi 150kv, selanjutnya akan di turunkan kembali menjadi 20kV/TM (Tegangan Menengah) oleh gardu induk yang di di dalamnya terdapat trafo Step-Down. Selanjutnya Tegangan 20kV akan di salurkan ke gedung-gedung bisnis, seperti hotel, perkantoran dll (dengan catatan gedung-gedung tersebut mempunyai trafo Step-Down untuk menurunkan tegangan menjadi 380V dan 220V). Selain menyalurkan ke gedung-gedung industri, tegangan 20kV ini juga di salurkan ke gardu distribusi(gardu tiang) yang akan menurunkan tegangan menjadi 220V agar bisa di gunakan oleh rumah-rumah penduduk.</p>
      </div>
      <div class="tab-pane fade" id="dangerprofile" role="tabpanel">
        <div class="card">
            <div class="card-body">
              <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="/assets/images/teknik-listrik.jpg" class="d-block w-100">
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>

{{-- ************************************* --}}

<h6 class="mb-0 text-uppercase">Perbedaan Watt dan VA(Volt Amper)</h6>
<hr/>
<div class="card">
  <div class="card-body">
    <ul class="nav nav-tabs nav-danger" role="tablist">
      <li class="nav-item" role="presentation">
        <a class="nav-link active" data-bs-toggle="tab" href="#notewattva" role="tab" aria-selected="true">
          <div class="d-flex align-items-center">
            <div class="tab-icon"><i class='bx bx-brightness font-18 me-1'></i>
            </div>
            <div class="tab-title">Note</div>
          </div>
        </a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link" data-bs-toggle="tab" href="#imgwattva" role="tab" aria-selected="false">
          <div class="d-flex align-items-center">
            <div class="tab-icon"><i class='bx bx-image-alt font-18 me-1'></i>
            </div>
            <div class="tab-title">Image</div>
          </div>
        </a>
      </li>
    </ul>
    <div class="tab-content py-3">
      <div class="tab-pane fade show active" id="notewattva" role="tabpanel">
        <p><strong>Daya Aktif</strong> adalah daya yang digunakan untuk energi yang sebenarnya, yaitu daya yang digunakan untuk mengkonversi dari satu energi ke energi lainnya. Misalkan lampu 25 watt, jadi 25 watt ini digunakan untuk mengubah energi listrik menjadi energi cahaya. Begitu pun dengan motor listrik 100 Watt yang di konversi dari energi listrik menjadi energi gerak.</p>
        <p><strong>Daya Reaktif</strong> adalah daya yang digunakan untuk pembangkitan fluks magnetik dan biasanya ini disebut daya imajiner. Daya reaktif tidak di gunakan untuk mengkonversi energi listrik menjadi energi lainnya karena yang berperan adalah daya aktif.
        </p>
        <p>
            <strong>Daya Semu</strong> adalah daya aktif + daya reaktif, dengan penjumlahan kuadrat.
        </p>
        <small><Strong>Catatan</Strong> kVAR dibutuhkan oleh beban-beban inductive, karena tanpa kVAR, motor-motor inductive tidak bisa menghasilkan medan magnet untuk memutar rotornya. Namun kenapa di kVAR dibatasi??? Jawabannya adalah Karena produksi kVAR dari sebuah generator/pembangkit Listrik juga terbatas.
        Oleh karenanya, PLN membatasi penggunaan kVAR, terutama pada industri. Bahkan PLN mewajibkan tarif kVARh (tariff meter kVARh sendiri), bahkan pelanggan akan didenda jika Cos Phi nya kurang dari 0.85</small>
      </div>
      <div class="tab-pane fade" id="imgwattva" role="tabpanel">
        <div class="card">
            <div class="card-body">
              <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="/assets/images/watt-va.jpg" class="d-block w-100">
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>

{{-- ****************************** --}}

<h6 class="mb-0 text-uppercase">Pengertian Ah (Ampere Hour) Dan Wh (Watt Hour) Pada Aki / Baterai</h6>
<hr/>
<div class="card">
  <div class="card-body">
    <ul class="nav nav-tabs nav-danger" role="tablist">
      <li class="nav-item" role="presentation">
        <a class="nav-link active" data-bs-toggle="tab" href="#aki" role="tab" aria-selected="true">
          <div class="d-flex align-items-center">
            <div class="tab-icon"><i class='bx bx-brightness font-18 me-1'></i>
            </div>
            <div class="tab-title">Note</div>
          </div>
        </a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link" data-bs-toggle="tab" href="#batt" role="tab" aria-selected="false">
          <div class="d-flex align-items-center">
            <div class="tab-icon"><i class='bx bx-image-alt font-18 me-1'></i>
            </div>
            <div class="tab-title">Image</div>
          </div>
        </a>
      </li>
    </ul>
    <div class="tab-content py-3">
      <div class="tab-pane fade show active" id="aki" role="tabpanel">
        <p></p>
      </div>
      <div class="tab-pane fade" id="batt" role="tabpanel">
        <div class="card">
            <div class="card-body">
              <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="/assets/images/pengertian-Ah.jpg" class="d-block w-100">
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
            
    <script src="/assets/js/jquery.min.js"></script>  
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection       