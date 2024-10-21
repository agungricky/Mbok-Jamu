@extends('index')
@section('content')
    <!-- Education-->
    <section class="resume-section" id="education">
        <div class="resume-section-content">
            @php
                // dd($data);
            @endphp
            <h2 class="mb-1 text-center">Hasil Pengecekan</h2>
            <div class="text-center">
                <img src="assets/img/Mbok jamu.png" alt="" style="width: 20%">
            </div>
            <hr class="mb-5">
            <div class="text-center">
                <div class="flex-grow-1">
                    <p class="subheading mb-3">{{ $data[0][1] }}</p>
                    <p>Jamu yang cocok untuk anda</p>
                    <h3>Jamu {{ $data[0][0] }}</h3>
                </div>
            </div>
            <hr class="mb-5">
        </div>
    </section>
    <hr class="m-0" />
    
    <script>
        // Konfigurasi Firebase
        const firebaseConfig = {
          apiKey: "YOUR_API_KEY",
          authDomain: "dahatech-5f699.firebaseapp.com",
          databaseURL: "https://dahatech-5f699-default-rtdb.asia-southeast1.firebasedatabase.app",
          projectId: "dahatech-5f699",
          storageBucket: "dahatech-5f699.appspot.com",
          messagingSenderId: "YOUR_MESSAGING_SENDER_ID",
          appId: "YOUR_APP_ID"
        };
      
        // Inisialisasi Firebase
        const app = firebase.initializeApp(firebaseConfig);
        const database = firebase.database();
      
        // Data Jamu yang akan dikirim
        const dataJamu = {
          Jamu: "Beras Kencur",
          Keterangan: "Nampaknya anda kurang nafsu makan atau Sedang menjaga imun tubuh",
          Nilai: 27.586206896552
        };
      
        // Mengirim data ke Firebase menggunakan Ajax saat halaman diload
        $(document).ready(function() {
          $.ajax({
            url: '', // Anda bisa mengosongkannya karena Ajax berfungsi langsung di view
            type: 'POST',
            data: JSON.stringify(dataJamu),
            contentType: 'application/json',
            success: function(response) {
              // Mengirim data ke Firebase
              const dbRef = firebase.database().ref('jamuList'); // Path di Firebase
              dbRef.push(dataJamu)
                .then(() => {
                  console.log("Data Jamu berhasil dikirim ke Firebase");
                })
                .catch((error) => {
                  console.error("Gagal mengirim data: ", error);
                });
            },
            error: function(error) {
              console.log('Error:', error);
            }
          });
        });
      </script>
@endsection
