@extends('layouts.main')


@section('content')

     {{-- BTU/h --}}
     <div class="col-md-6">
        <div class="card">
          <div class="card-body">              
           <div class="pasang-ac-custom-column" id="pasang_ac_column_tipe">
             <div style="margin-bottom:0px;"  class="pasang-ac-value-ladder">
                 <div class="row">                        
                     <div style="float:right;">
                         <div style="margin:0px 0px 0px 5px;" class="onoffswitch">
                             <input type="checkbox" name="on_off_advanced" class="onoffswitch-checkbox form-check-input" id="on_off_advanced">
                             <label class="onoffswitch-label form-check-label" style="height:25px;" for="on_off_advanced">
                                 Advanced Mode
                                 <span class="onoffswitch-inner"></span>
                                 <span class="onoffswitch-switch"></span>
                             </label>
                         </div>
                     </div>                        
                 </div>                                        
                 
                 <div class="row" style="font-size:26px;font-weight:bold;"> 
                    
                     <div class="col-xs-4 text-primary" style="text-align:center;padding:0px;" id="pasang_ac_range_output">
                     </div>                       
                    
                 </div>
                 
                 <div class="row">
                     <div style="margin:10px 0px" class="slidecontainer">
                         <input type="range" min="3" max="100" value="3" class="slider form-range" id="myRange">
                     </div>                        
                 </div>

                 <div class="row" style="font-size:26px;font-weight:bold;">                                            

                   <div class="col-xs-4 text-primary" style="text-align:center;padding:0px;" id="pasang_ac_range_output_lebar">
                   </div>
                  
               </div>

                 <div class="row">
                   <div style="margin:10px 0px" class="slidecontainerLebar">
                       <input type="range" min="3" max="100" value="3" class="slider form-range" id="myRangeLebar">
                   </div>                        
               </div>
                 
                 <div style="display:none" id="advanced_mode_container">
                     <div class="text-primary" style="font-size:26px;font-weight:bold;text-align:center;" id="pasang_ac_range_output_plafon">
                     </div>
                     <div class="row">
                         <div style="margin:10px 0px" class="slidecontainer">
                             <input type="range" min="2.0" max="10.0" step="0.1" value="3" class="slider form-range" id="myRange_plafon">
                         </div>                            
                     </div>
                     
                     <div style="text-align:left" class="mb-2">
                         <div class="advanced-column mb-3">
                             <div class="pasang-ac-value-ladder-title"><b>Suhu Yang Di inginkan</b></div>
                             <label><input type="radio" class="advanced-radio" name="radio_suhu" value="low" /> 25-26&#8451; &nbsp;</label>
                             <label><input type="radio" class="advanced-radio" name="radio_suhu" value="medium" /> 23-24&#8451; &nbsp;</label>
                             <label><input type="radio" class="advanced-radio" name="radio_suhu" value="high" /> > 23&#8451;</label>
                         </div>
                         
                         <div class="advanced-column mb-3">
                             <div class="pasang-ac-value-ladder-title"><b>Berapa orang (per 10m2)</b></div>
                             <label><input type="radio" class="advanced-radio" name="radio_orang" value="low" /> 1-2 &nbsp;</label>
                             <label><input type="radio" class="advanced-radio" name="radio_orang" value="medium" /> 3-6 &nbsp;</label>
                             <label><input type="radio" class="advanced-radio" name="radio_orang" value="high" /> 10</label>
                         </div>
                         
                         <div class="advanced-column mb-3">
                             <div class="pasang-ac-value-ladder-title"><b>Aktivitas</b></div>
                             <label><input type="radio" class="advanced-radio" name="radio_aktivitas" value="low" /> Santai &nbsp;</label>
                             <label><input type="radio" class="advanced-radio" name="radio_aktivitas" value="medium" /> Office &nbsp;</label>
                             <label><input type="radio" class="advanced-radio" name="radio_aktivitas" value="high" />Olahraga</label>
                         </div>
                         
                         <div class="advanced-column mb-3">
                             <div class="pasang-ac-value-ladder-title"><b>Posisi Ruangan Menghadap</b></div>
                             <label><input type="radio" class="advanced-radio" name="radio_arah" value="low" /> Utara, Selatan &nbsp;</label>
                             <label><input type="radio" class="advanced-radio" name="radio_arah" value="medium" /> Tenggara,Timur Laut, Barat Daya, Barat Laut &nbsp;</label>
                             <label><input type="radio" class="advanced-radio" name="radio_arah" value="high" /> Barat, Timur</label>
                         </div>
                         
                         <div class="advanced-column mb-3">
                             <div class="pasang-ac-value-ladder-title"><b>Jenis Lampu Yang digunakan</b></div>
                             <label><input type="radio" class="advanced-radio" name="radio_lampu" value="low" /> LED &nbsp;</label>
                             <label><input type="radio" class="advanced-radio" name="radio_lampu" value="medium" /> Neon &nbsp;</label>
                             <label><input type="radio" class="advanced-radio" name="radio_lampu" value="high" /> Spot Light</label>
                         </div>
                         
                         <div class="advanced-column mb-3">
                             <div class="pasang-ac-value-ladder-title"><b>Jam Penggunaan</b></div>
                             <label><input type="radio" class="advanced-radio" name="radio_hour" value="low" /> Malam &nbsp;</label>
                             <label><input type="radio" class="advanced-radio" name="radio_hour" value="medium" /> Pagi &nbsp;</label>
                             <label><input type="radio" class="advanced-radio" name="radio_hour" value="high" /> 24 Jam</label>
                         </div>
                         
                         <div class="advanced-column mb-3">
                             <div class="pasang-ac-value-ladder-title"><b>Jenis Kaca</b></div>
                             <label><input type="radio" class="advanced-radio" name="radio_glass" value="low" /> Low-E Double Glass &nbsp;</label>
                             <label><input type="radio" class="advanced-radio" name="radio_glass" value="medium" /> Double Glass &nbsp;</label>
                             <label><input type="radio" class="advanced-radio" name="radio_glass" value="high" /> Clear</label>
                         </div>
                     </div>
                 </div>
                 
                 <div class="d-flex justify-content-center btn btn-primary hitung-button pasang-ac-button my-2">
                     Hitung
                 </div>                                        
             </div>
         </div>
         
         <div style="display:none" class="pasang-ac-custom-column" id="pasang_ac_custom_column_result">
             <div style="text-align:left;margin-bottom:0px;"" class="pasang-ac-value-ladder">
                 <div id="pk_calculator_result_title" class="pasang-ac-value-ladder-title"><b>Calculator&trade;</b></div>
                 
                 <div style="font-size:24px;" class="pasang-ac-value-ladder-title">
                     <b>Daya : <span class="count text-primary" id="count_btu"></span> Btu/h</b>
                 </div>
                 <div id="pk_result" style="font-size:24px;display:none" class="pasang-ac-value-ladder-title"><b>Kapasitas : <span class="text-primary" id="count_pk"></span> PK</b></div>
                 
                 <div style="border-radius: 5px;margin-bottom:10px;padding:5px 10px;background-color:#d9edf7;color:#3a87ad;border-color:#bce8f1">
                     Perhitungan ini untuk ruangan yang pintu tidak terbuka tutup dengan tinggi plafon max 3m. Untuk ruangan yang sering terbuka tutup tambahkan 10% dari luas ruangan tersebut.
                 </div>
               </div>
             </div>                                            
          </div>              
        </div>
     </div>
      {{-- End BTU/h --}}

    {{-- Karakter Freon --}}
    <h6 class="mb-0 text-uppercase">Karakteristik jenis-jenis freon</h6>
    <hr/>
    <div class="card">
      <div class="card-body">
        <p class="mt-2">Masing-masing dari tiga jenis freon tersebut memiliki perbedaan pendinginan yang diukur dengan istilah cooling index. Semakin tinggi angka cooling index-nya, semakin cepat proses pendinginannya.</p>
        <table class="table table-bordered mb-0">
          <thead>
            <tr>
              <th>#</th>
              <th>Jenis Freon</th>
              <th>ODP</th>
              <th>GWP</th>
              <th>Cooling Index</th>
              <th>Flammability</th>
              <th>Standar PSi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>R22</td>
              <td>0.05</td>
              <td>1810</td>
              <td>100</td>
              <td><i class="bi bi-x"></i></td>
              <td>70 - 80</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>R32</td>
              <td>-</td>
              <td>675</td>
              <td>150</td>
              <td><i class="bi bi-check"></i></td>
              <td>150 - 160</td>
            </tr> 
            <tr>
              <th scope="row">3</th>
              <td>R410</td>
              <td>-</td>
              <td>2090</td>
              <td>92</td>
              <td><i class="bi bi-x"></i></td>
              <td>140 - 150</td>
            </tr> 
          </tbody>
        </table>                
      </div>
      <div class="row">
      <div class="col-md-6">
      <ul>
        <h6>Keterangan : </h6>
        <li>ODP merupakan Ozone Depletion Potential atau potensi perusakan ozon</li>
        <li>GWP merupakan Global Warming Potential atau potensi global warming</li>
        <li>Cooling index merupakan tingkat pendinginan freon</li>
        <li>Flammability merupakan tingkat kemudahan terbakar freonnya</li>
      </ul>
    </div>
    <div class="col-md-6">
      <ul>
        <h6>Kesimpulan : </h6>
        <li>Freon R32 jauh lebih ramah lingkungan dibanding freon R410a karena tingkat GWP-nya lebih rendah dibandingkan freon R22 dan freon R410a</li>
        <li>Freon R32 memiliki cooling index yang lebih tinggi dibandingkan dengan freon R22 dan freon R410a</li>
        <li>Freon R32 memiliki potensi mudah terbakar dibandingkan dengan freon R22 dan freon R410a, namun untuk tingkat flammability-nya sedikit rendah</li>
      </ul>
    </div>
  </div>
    </div>
  {{-- End Karater Freon --}}

  {{-- BTU/h --}}
  <h6 class="mb-0 text-uppercase">Menentukan Kapasitas AC Dengan BTU</h6>
  <hr/>
  <div class="card">
    <div class="card-body">
      <p class="mt-2">BTU/h (British Thermal Unit per hour), Bisa dikatakan daya pendingin ac, BTU menyatakan kemampuan mengurangi panas / mendinginkan ruangan dengan luas dan kondisi tertentu selama 1 jam. Daya listrik (Watt), Besarnya tenaga yang dibutuhkan ketika AC dalam kondisi menyala.</p>
      <div class="row">
        <div class="col-md-6">                  
          <table class="table table-bordered mb-0">
            <thead>
              <tr>                      
                <th>Kapasitas AC</th>
                <th>BTU/h</th>                      
              </tr>
            </thead>
            <tbody>
              <tr>                      
                <td>1/2 PK</td>
                <td>5.000</td>                      
              </tr>
              <tr>                      
                <td>3/4 PK</td>
                <td>7.000</td>                      
              </tr>
              <tr>                      
                <td>1 PK</td>
                <td>9.000</td>                      
              </tr>
              <tr>                      
                <td>1,5 PK</td>
                <td>12.000</td>                      
              </tr>
              <tr>                      
                <td>2 PK</td>
                <td>18.000</td>                      
              </tr>
              <tr>                      
                <td>2,5 PK</td>
                <td>24.000</td>                      
              </tr>
              <tr>                      
                <td>3 PK</td>
                <td>27.000</td>                      
              </tr>
              <tr>                      
                <td>5 PK</td>
                <td>45.000</td>                      
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col">
        <div class="col-md-12">
          <h6>Rumus : Panjang(p) x Lebar(L) x Tinggi(t) x 200 atau 500</h6>
          <span>Contoh :</span>
          <small>Sebuah kamar dengan panjang 4m, lebar 3m, tinggi 3m dan di huni oleh 2 orang. Kapasitas AC yang ideal untuk kamar tersebut adalah : 4 x 3 x 3 x 200 = 7200 Btu/h = 1pk</small>
        </div>
        <div class="col-md-12 mt-3">
          <h6>Keterangan :</h6>
          <span>Satuan 200 digunakan apabila ruangan terisi dengan sedikit orang misalnya saja kurang dari 5 orang didalamnya. Bila lebih, dan dalam kamar tersebut banyak barang elektronik yang menghasilkan panas kamu harus mengkalikan jumlah tersebut dengan 500.</span>                   
        </div>
        <div class="col-md-12 mt-3">
          <h6>Kesimpulan :</h6>
          <span>Selain cara menghitung BTU AC, ada beberapa poin yang dipertimbangkan ketika membeli AC. Sebagai contoh, posisi rumah perlu dilihat, apakah menghadap ke utara atau ke barat. Pasalnya, rumah yang menghadap ke barat akan jauh lebih panas. Semakin banyak kaca, maka sinar matahari semakin mudah masuk ke dalam ruangan. Alhasil, AC bekerja lebih keras untuk mendinginkan ruangan tersebut.</span>                   
        </div>
      </div>
      </div>                
    </div>              
  </div>
{{-- End BTU/h --}}

<div class="row">
    <div class="col-md-6">
      <h6 class="mb-0 text-uppercase">Ukuran Pipa AC Daikin</h6>
  <hr/>
  <div class="card">
    <div class="card-body">
      <table class="table table-sm mb-0">
        <thead>
          <tr>                                  
            <th scope="col">PK(Paard Kracht)</th>
            <th scope="col">Ukuran Pipa(Liquid & Gas)</th>
          </tr>
        </thead>
        <tbody class="ukuran-daikin-body">
                         
        </tbody>
      </table>
    </div>
  </div>
  </div>
  <div class="col-md-6">
    <h6 class="mb-0 text-uppercase">Ukuran Pipa AC Umum</h6>
<hr/>
<div class="card">
  <div class="card-body">
    <table class="table table-sm mb-0">
      <thead>
        <tr>                                  
          <th scope="col">PK(Paard Kracht)</th>
          <th scope="col">Ukuran Pipa(Liquid & Gas)</th>
        </tr>
      </thead>
      <tbody class="ukuran-umum-body">
        <tr>                 
          <td></td>                
          <td></td>                
        </tr>               
      </tbody>
    </table>
  </div>
</div>
</div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <h6 class="mb-0 text-uppercase">Ukuran Capasitor AC</h6>
  <hr/>
  <div class="card">
    <div class="card-body">
      <table class="table table-sm mb-0">
        <thead>
          <tr>                                  
            <th scope="col">PK(Paard Kracht)</th>
            <th scope="col">uF(Micro Farad)</th>
          </tr>
        </thead>
        <tbody class="kapasitor-body">
                         
        </tbody>
      </table>
    </div>
  </div>
  </div>
  <div class="col-md-6">          
<div class="card">
  <div class="card-body">
    <div>
      <h5 class="card-title">Penyebab Kapasitor AC Rusak</h5>
    </div>
    <ol>
      <li>Sirkuit sistem yang terlalu panas</li>
      <li>Korsleting dalam sistem pendingin</li>
      <li>Lonjakan daya</li>
      <li>Sambaran petir</li>
      <li>Suhu luar ruangan yang sangat tinggi</li>
      <li>umur dari kapasitor tersebut</li>
    </ol>
  </div>
</div>
</div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <div>
            <h5 class="card-title">Cara Memeriksa Kondisi Kapasitor AC</h5>
          </div>
          <ol>
            <li>Konsletkan terlebih dulu untuk membuang sisa muatan listrik. Caranya, hubungkan kedua socket kapasitor menggunakan obeng.</li>&nbsp
            <li>Selanjutnya, periksa menggunakan muliti tester. Caranya, posisikan multi tester pada satuan oHm. lalu hubungkan kabel merah pada socket kapasitor, dan juga kabel yang berwarna hitam pada socket satunya.</li>&nbsp
            <li>Jika jarum pada multi tester jika menunjukan pergerakan ke atas kemudian balik lagi ke bawah, itu berarti kapasitor bagus. Namun jika jarum multitester tidak ada tanda pergerakan sama sekali, bisa jadi kapasitor rusak atau lemah.</li>
          </ol>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">              
        <div class="card-body">
          <div>
            <h5 class="card-title">Cara Mencari CSR pada kompresor AC</h5>
          </div>
          <ol>
            <li>Posisikan selector multitester pada posisi 1 kilo ohm. Terminal pertama yang akan kita cari adalah terminal <strong class="text-danger">C</strong>, dengan cara mencari hambatan yang paling besar dari ketiga terminal yang ada pada kompresor. Setelah hambatan yang paling besar sudah di temukan maka terminal yang tidak diukur adalah terminal <strong class="text-danger">C</strong></li>&nbsp
            <li>Selanjutnya, cari hambatan yang sedang dengan cara tempatkan salah satu jack di terminal <strong class="text-danger">C</strong>. Kemudian tempatkan jack yang satunya lagi ke salah satu terminal pada kompresor dan cari hambatan yang sedang. Setelah hambatan yang sedang ditemukan maka terminal tersebut adalah <strong class="text-danger">S</strong></li>&nbsp
            <li>Sekarang tempatkan salah satu jack ke terminal <strong class="text-danger">C</strong> dan jack yang satunya lagi ke terminal yang belum kita temukan, harusnya hambatannya paling kecil dari terminal <strong class="text-danger">C</strong> ke <strong class="text-danger">R</strong></li>
          </ol>
          <img style="width: 185px;" src="/assets/images/csr.png" class="card-img-top">
          <img style="width: 185px;" src="/assets/images/csr1.png" class="card-img-top">
          <img style="width: 185px;" src="/assets/images/csr2.png" class="card-img-top">
        </div>
      </div>
    </div>
  </div>
            
    <script src="/assets/js/jquery.min.js"></script>  
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        fetch('/assets/kapasitor-ac.json')
          .then(success => success.json())
          .then(result => {
            let cardKap = '';
            result.forEach(e => {
              cardKap += `<tr>                 
                            <td>${e.pk}</td>
                            <td>${e.uf}</td>
                          </tr>`;
            });
            document.querySelector('.kapasitor-body').innerHTML = cardKap;
          });
      </script>
      <script>
        fetch('/assets/ukuran-pipa-ac.json')
          .then(success => success.json())
          .then(result => {
            let cardUmum = '';
            result.umum.forEach(p => {
              cardUmum += `<tr>                 
                            <td>${p.pk}</td>
                            <td>${p.pipa}</td>
                          </tr>`;
            });
            document.querySelector('.ukuran-umum-body').innerHTML = cardUmum;

            let cardDaikin = '';
            result.daikin.forEach(d => {
              cardDaikin += `<tr>                 
                            <td>${d.pk}</td>
                            <td>${d.pipa}</td>
                          </tr>`;
            });
            document.querySelector('.ukuran-daikin-body').innerHTML = cardDaikin;
          });
      </script>

<script>

    var slider = document.getElementById("myRange");                  
    var output = document.getElementById("pasang_ac_range_output");
    output.innerHTML = 'Panjang : ' + slider.value + ' m';                  
    slider.oninput = function() {
        output.innerHTML = 'Panjang : ' + this.value + ' m';
    }

    var sliderLebar = document.getElementById('myRangeLebar');
    var outputLebar = document.getElementById("pasang_ac_range_output_lebar");
    outputLebar.innerHTML = 'Lebar : ' + sliderLebar.value + ' m';
    sliderLebar.oninput = function() {
      outputLebar.innerHTML = 'Lebar : ' + this.value + ' m';
    }
    
    var slider_plafon = document.getElementById("myRange_plafon");
    var output_plafon = document.getElementById("pasang_ac_range_output_plafon");
    output_plafon.innerHTML = 'Tinggi : ' + slider_plafon.value + ' m';
    slider_plafon.oninput = function() {
        output_plafon.innerHTML = 'Tinggi : ' + this.value + ' m';
    }
    
    $('#on_off_advanced').change(function(){
        if($(this).prop('checked')){
            $('#advanced_mode_container').show();
        }else{
            $('#advanced_mode_container').hide();
        }
    });
    $('.hitung-button').on('click', function(){
        
   
        var luas = slider.value;                      
        var lebar = sliderLebar.value;                      
        var type = '';
        
        var radio_low = 0;
        var radio_medium = 0;
        var radio_high = 0;
        
        $('.advanced-radio:checked').each(function(){
            var radio_value = $(this).val();
            console.log(radio_value);
            if (radio_value == 'low') {
                radio_low += 1;
            }else if (radio_value == 'medium') {
                radio_medium += 1;
            }else if (radio_value == 'high') {
                radio_high += 1;
            }
        });
        
        var heat_load_calculation = 0;
        var flag = '';
        
        if (radio_low == radio_medium && radio_medium == radio_high) {
            flag = 'low';
        }else if (radio_low > radio_medium) {
            flag = 'low';
        }else{
            flag = 'medium';
            if (radio_medium > radio_high) {
                flag = 'medium';
            }else{
                flag = 'high';
            }
        }
        
        if (flag == 'low') {
            heat_load_calculation = 537;
        }else if (flag == 'medium') {
            heat_load_calculation = 591;
        }else if (flag == 'high') {
            heat_load_calculation = 698;
        }
        

        $('.hide-vika-recommendation').hide();
        $('#pk_result').hide();
        $('.check-button').hide();
        $('#pasang_ac_custom_column_recommendation').hide();
        var plafon = slider_plafon.value;
        var plafon_coefficient = plafon / 3 ;
        var btu = Math.ceil(lebar * luas * heat_load_calculation * plafon_coefficient);
        console.log(btu);
        var pk = 0;           
        $('#count_btu').html(btu);
        
        //Menghitung kebutuhan PK
        if (btu <= 5500) {
            pk = '1/2';               
        }else if (btu > 5500 & btu <= 7500) {
            pk = '3/4';
           
        }else if (btu > 7500 & btu <= 9500){
            pk = '1';              
        }else if (btu > 9500 & btu <= 12500) {
            pk = '1,5';               
        }else if (btu > 12500 & btu <= 18500){
            pk = '2';               
        }else if (btu > 18500 & btu <= 24000) {
            pk = '2,5';                
        }else{
            pk = Math.ceil(btu / 9000 *2)/2;              
        }                                         
        $('#count_pk').html(pk); 
        $('#vika_explanation_pk').html('+'+pk + ' PK');
        $('#pasang_ac_custom_column_result').show();
        $('.count').each(function () {
            $(this).prop('Counter',0).animate({
                Counter: $(this).text()
            }, {
                duration: 2000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now).toLocaleString('id'));
                },
                complete : function (){
                    $('#pk_result').fadeIn();
                    $('.hide-vika-recommendation').fadeIn();
                    
                    $('html, body').animate({
                        scrollTop: $('#pk_calculator_result_title').offset().top - 100
                    }, 'slow');
                    
                    setTimeout(function(){
                        //$('#pasang_ac_custom_column_recommendation').fadeIn();
                        $('.check-button').fadeIn();
                        
                        $('.slick-brand').flickity('resize');
                        $('.slick-product').flickity('resize');
                    }, 1000);                                                            
                }
            });
        });
    });

    </script>

@endsection       