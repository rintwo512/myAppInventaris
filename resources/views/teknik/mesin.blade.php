@extends('layouts.main')

@section('content')
        
    <h6 class="mb-0 text-uppercase">Teknik Mesin</h6>
    <hr/>
    <div class="card">
        <div class="card-body">
            <q style="font-style:italic;font-family:Poppins">Genset adalah akronim dari “Generator set”, yaitu suatu mesin atau perangkat yang terdiri dari pembangkit listrik (generator) dengan mesin penggerak yang disusun menjadi satu kesatuan untuk menghasilkan suatu tenaga listrik dengan besaran tertentu. Mesin pembangkit kerja pada genset biasanya berupa motor yang melakukan pembakaran internal, atau mesin diesel yang bekerja dengan bahan bakar solar atau bensin. Generator adalah alat penghasil listrik. Prinsip kerja generator, yaitu mengubah energi gerak (kinetik) menjadi energi listrik.</q>
        </div>
    </div>
    {{-- ******** --}}
    <div class="card">
      <div class="card-body">       
        <div class="row">
          <div class="col-md-6">                              
            <h5>1.1 Definisi Generator Set (Genset)</h5>
            <p style="text-align: justify">Genset (generator set) adalah sebuah perangkat yang berfungsi menghasilkan daya
                listrik. Disebut sebagai generator set dengan pengertian adalah satu set peralatan gabungan dari
                dua perangkat berbeda yaitu engine dan generator atau alternator. Engine sebagai perangkat
                pemutar sedangkan generator atau alternator sebagai perangkat pembangkit. Pada sebuah
                sistem generator set, penggerak atau engine sangat berpengaruh terhadapan sistem kerja
                generator tersebut. Karena pada perputaran generator yang stabil dapat menjadikan output
                generator tersebut menjadi maksimal. 
            </p>
          </div>
          {{-- Kalkulator btu --}}
          <div class="col-md-6">
            <h5>1.2 Kegunaan Genset</h5>            
            <p style="text-align: justify">Kegunaan generator set yang paling utama yaitu menyediakan sumber listrik cadangan
                ketika sumber listrik dari PLN tiba-tiba padam. Ketika berbicara mengenai Genset, maka hal
                yang terlintas dalam Pikiran adalah Alat untuk menghidupkan lampu ketika Listrik Padam,
                meskipun tujuannya tak hanya berfokuskan hanya pada lampu atau penerangan saja, melainkan
                banyak hal lainnya yang membutuhkan daya listrik, seperti misalnya untuk Pengerjaan Luar
                Ruangan yang jauh dari sumber daya listrik. Genset sangat dikenal karena kegunaannya
                sebagai Tenaga Listrik yang bisa diandalkan cukup dengan menggunakan Bahan Bakar Bensin
                / Solar.</p>
          </div>
          {{-- end kalkulator btu --}}
        </div>                
      </div>              
    </div>
    {{-- ******** --}}
    <div class="card">
        <div class="card-body">       
          <div class="row">
            <div class="col-md-6">                              
              <h5>1.3 Sistem Kerja Genset</h5>
              <p style="text-align: justify">Generator Set terdiri atas Engine (Motor Penggerak) dan juga Generator /
                Alternator, seperti yang telah di jelaskan sebelumnya. Mesin Engine yang satu ini
                menggunakan bahan bakar berupa Solar (Mesin Diesel) atau dapat juga menggunakan Bensin,
                sedangkan untuk Generatornya sendiri merupakan sebuah gulungan kawat yang di buat dari
                tembaga yang terdiri atas kumparan statis atau stator dan di lengkapi pula dengan kumparan
                berputar atau rotor. Dalam proses kerjanya, menurut ilmu fisika, Engine memutar Rotor dalam
                sebuah Generator yang selanjutnya hal ini menimbulkan adanya Medan Magnet pada bagian
                kumparan Generator. Selanjutnya Medan Magnet ini kemudian akan melakukan interaksi
                dengan Rotor yang kemudian akan berputar dan akan menghasilkan sebuah arus listrik dimana
                hal ini sesuai dengan hukum Lorentz.
              </p>
            </div>            
            <div class="col-md-6">
              <h5>1.4 Konstruksi Generator</h5>            
              <p>
                Generator terdiri dari dua bagian yang paling utama, yaitu:
                <ol>
                    <li>Bagian yang diam (stator).</li>
                    <li> yang bergerak (rotor)</li>
                </ol>
              </p>
            </div>            
          </div>                
        </div>              
      </div>
    
    {{-- ******** --}}
    <div class="card">
        <div class="card-body">       
          <div class="row">
            <div class="col-md-6">                              
              <h5>1.4.1 Bagian yang diam (Stator)</h5>
              <h6>Bagian yang diam (stator) terdiri dari beberapa bagian, yaitu :</h6>
              <ol>
                <li><strong>Inti stator.</strong></li>
                <p>
                    Bentuk dari inti stator ini berupa cincin laminasi-laminasi yang diikat serapat mungkin
                    untuk menghindari rugi-rugi arus eddy (eddy current losses). Pada inti ini terdapat slot-slot
                    untuk menempatkan konduktor dan untuk mengatur arah medan magnetnya.
                </p>
                <li><strong>Belitan stator.</strong></li>
                <p>
                    Bagian stator yang terdiri dari beberapa batang konduktor yang terdapat di dalam slotslot dan ujung-ujung kumparan. Masing-masing slot dihubungkan untuk mendapatkan
                    tegangan induksi.
                </p>
                <li><strong>Alur stator.</strong></li>
                <p>
                    Merupakan bagian stator yang berperan sebagai tempat belitan stator ditempatkan.
                </p>
                <li><strong>Rumah stator.</strong></li>
                <p>
                    Bagian dari stator yang umumnya terbuat dari besi tuang yang berbentuk silinder. Bagian
                    belakang dari rumah stator ini biasanya memiliki sirip-sirip sebagai alat bantu dalam proses
                    pendinginan.
                </p>
              </ol>
            </div>            
            <div class="col-md-6">
              <h5>1.4.2 Bagian yang bergerak (Rotor)</h5>            
              <h6>Rotor adalah bagian generator yang bergerak atau berputar. Antara rotor dan stator
                dipisahkan oleh celah udara (air gap). Rotor terdiri dari dua bagian umum, yaitu:</h6>
                <ol>
                    <li><strong>Inti kutub</strong></li>
                    <li><strong>Kumparan medan</strong></li>
                    <p>
                        Pada bagian inti kutub terdapat poros dan inti rotor yang memiliki fungsi sebagai jalan
                        atau jalur fluks magnet yang dibangkitkan oleh kumparan medan. Pada kumparan medan ini
                        juga terdapat dua bagian, yaitu bagian penghantar sebagai jalur untuk arus pemacuan dan
                        bagian yang diisolasi. Isolasi pada bagian ini harus benar-benar baik dalam hal kekuatan
                        mekanisnya, ketahanannya akan suhu yang tinggi dan ketahanannya terhadap gaya sentrifugal
                        yang besar.
                    </p>
                    <p>
                        Konstruksi rotor untuk generator yang memiliki nilai putaran relatif tinggi biasanya
                        menggunakan konstruksi rotor dengan kutub silindris atau ”cylinderica poles” dan jumlah
                        kutubnya relatif sedikit (2, 4, 6). Konstruksi ini dirancang tahan terhadap gaya-gaya yang lebih
                        besar akibat putaran yang tinggi.
                    </p>
                </ol>
            </div>            
          </div>                
        </div>              
      </div>
    

    {{-- ******** --}}
    <div class="card">
        <div class="card-body">       
          <div class="row">
            <div class="col-md-6">                              
              <h5>Komponen Genset Beserta Fungsinya</h5>              
              <ul>
                <li><strong>Engine</strong></li>
                <p>
                    Engine berfungsi untuk menghasilkan energi mekanik yang kemudian akan disalurkan dan dikonversi menjadi listrik berkat bantuan generator.
                </p>
                <p>
                    Engine pada genset terbagi menjadi beberapa jenis tergantung dari jenis bahan bakar yang digunakan. Beberapa jenis bahan bakar yang dapat digunakan diantaranya adalah diesel, bensin, propana, biogas dan metana.
                </p>
                <p>
                    Kecepatan putar yang dimiliki motor pada genset merupakan kecepatan yang konstan atau memiliki kecepatan yang stabil dan tidak berubah-ubah yakni 1600 RPM atau 1500 RPM. Motor genset sengaja didesain memiliki Kecepatan putar yang konstan agar dapat menghasilkan aliran listrik yang stabil.
                </p>
                <li><strong>Generator</strong></li>
                <p>
                    Generator merupakan komponen berupa dinamo yang di dalamnya terdapat lilitan kawat tembaga yang dikelilingi oleh magnet atau stator. Ketika turbin berputar maka komponen di dalam alternator akan memiliki beda potensial sehingga elektron dapat mengalir dan menghasilkan listrik.
                </p>
                <p>
                    Proses menghasilkan listrik melalui putaran konduktor pada medan magnet disebut sebagai induksi magnet. Listrik yang dihasilkan adalah jenis listrik bolak-balik atau alternating current (AC).
                </p>
                <li><strong>Valve / Regulator Bahan Bakar</strong></li>
                <p>
                    Komponen satu ini memiliki fungsi yang cukup krusial, yaitu untuk mengatur pasokan bahan bakar ke dalam mesin. Kehadirannya pada sistem bahan bakar akan memastikan distribusi bahan bakar terjadi dengan baik.
                </p>
                <li><strong>Auto Voltage Regulator (AVR)</strong></li>
                <p>
                    AVR merupakan komponen yang berfungsi untuk menjaga stabilitas tegangan listrik yang dihasilkan. cara kerjanya adalah ketika tegangan terlalu tinggi maka AVR genset akan menurunkannya agar stabil, begitu juga sebaliknya.
                </p>
              </ul>
            </div>            
            <div class="col-md-6">              
                <ul>
                    <li><strong>System Lubricant</strong></li>
                    <p>
                        Agar genset tetap halus dan awet, tentu saja dibutuhkan pelumasan. Genset memiliki semacam pompa yang akan mengeluarkan minyak untuk melumasi mesin generator.
                    </p>
                    <li><strong>Baterai</strong></li>
                    <p>
                        Meski genset adalah perangkat yang menghasilkan listrik dan beroperasi menggunakan bahan bakar, namun alat ini tetap membutuhkan baterai sebagai pemicu saat pertama kali dinyalakan. Bahkan genset tidak akan menyala jika baterai rusak.
                    </p>
                    <li><strong>Radiator</strong></li>
                    <p>
                        Radiator ada pada generator yang menggunakan mesin yang dilengkapi sistem berpendingin air. Radiator digunakan untuk mendinginkan mesin saat dijalankan, untuk memastikan tidak menghasilkan alarm suhu berlebih. Jika generator menggunakan pendingin udara atau metode pendinginan alternatif maka radiator tidak akan Anda temukan.
                    </p>
                    <p>
                        Radiator biasanya dilengkapi juga dengan kipas radiator yang digerakkan secara mekanis dari poros engkol mesin melalui katrol dan sabuk, atau dapat juga digerakkan secara elektrik oleh motor listrik. Ada banyak kipas pada radiator, terutama jika digerakkan secara elektrik.
                    </p>
                    <li><strong>Skid/Frame</strong></li>
                    <p>
                        Skid atau kerangka utama pada genset di mana komponen-komponen pada genset seperti alternator, mesin motor, dan tangki bahan bakar disusun menjadi satu. Kerangka ini juga berfungsi sebagai pelindung agar komponen pada genset tersusun rapi dan tidak langsung menyentuh tanah untuk mencegah grounding dan korosi.
                    </p>
                    <p>
                        Komponen ini terbuat dari baja heavy duty yang sangat solid sehingga kokoh dan mampu menopang berat genset saat sedang beroperasi. Skid juga berfungsi untuk meredam getaran yang dihasilkan oleh generator.
                    </p>
                </ul>
            </div>            
          </div>                
        </div>              
      </div>
    
    {{-- ******** --}}
    <div class="card">
        <div class="card-body">       
          <div class="row">
            <div class="col-md-6">                              
              <h5>Control Panel</h5>              
              <ul>
                <li><strong>AMF(Automatic Main Failure)</strong></li>
                <p>
                    Fungsi AMF yaitu untuk mengontrol sistem ON atau OFF pada genset secara otomatis. Dimana bila sumber listrik utama mengalami fail maka AMF akan mengirim sinyal pada genset untuk ON, begitu pun jika sumber listrik utama sudah kembali normal. AMF akan mengirim sinyal untuk masuk ke mode cooling down, bersamaan dengan terputusnya supplay daya genset ke beban dan akhirnya OFF.
                </p>
                
            </ul>
            </div>            
            <div class="col-md-6">              
                <ol>                    
                    <li><strong>ATS(Automatic Transfer Switch)</strong></li>
                    <p>
                        ATS berfungsi untuk mengalihkan secara otomatis beban ke sumber listrik alternatif apabila sumber listrik utama mengalami fail, dan akan mengalihkan kembali beban ke sumber listrik utama apabila sumber listrik utama terdeteksi sudah normal.
                    </p>                   
                </ol>
            </div>            
          </div>                
        </div>              
      </div>
    
  

@endsection