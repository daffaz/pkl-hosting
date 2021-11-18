@extends('layouts.master')
@section('title', 'Kebijakan Privasi')
@section('content')
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-caret-up"></i></button>
    <div class="container">
        <p class="judul">Kebijakan Privasi</p>
        <p class="isi">
        <p class="isi">Maca.apps.ipb.ac.id . Menetapkan Kebijakan Privasi ("Kebijakan") ini untuk menangani Informasi
            Pengguna (termasuk informasi pribadi) dalam layanan yang disediakan oleh Perusahaan ("Layanan").</p>
        <p class="sub">1. Informasi Pengguna yang akan Dikumpulkan dan Cara Pengumpulannya</p>
        <p class="isi">"Informasi Pengguna" di dalam Kebijakan ini berarti informasi mengenai identitas pengguna,
            riwayat tindakan pengguna pada layanan telekomunikasi, atau informasi apa pun yang dibuat atau disimpan
            dalam perangkat pengguna terkait dengan pengguna atau perangkat pengguna, dan yang Perusahaan kumpulkan
            sesuai dengan Kebijakan ini.</p>
        <p class="isi">Informasi Pengguna yang Perusahaan kumpulkan dalam Layanan akan berisi, terkait masing-masing
            cara pengumpulannya, hal-hal berikut ini:</p>
        <p class="isi">(1) Informasi yang disediakan oleh pengguna:</p>
        <ul class="isi">
            <li>Nama;</li>
            <li>Alamat Surel;</li>
            <li>Informasi lain yang dengan persetujuan oleh pengguna, yang dimasukkan oleh pengguna dalam bentuk yang
                ditentukan oleh Perusahaan.</li>
        </ul>
        <p class="isi">(2) Informasi yang, sesuai cara penggunaan Layanan yang diizinkan oleh pengguna dalam menautkan
            Layanan dengan layanan lain, disediakan oleh layanan lainnya:</p>
        <ul class="isi">
            <li>ID yang digunakan oleh pengguna pada layanan pihak ketiga; dan</li>
            <li>Informasi yang ketentuan layanan tertaut tersebut diizinkan oleh pengguna berdasarkan preferensi privasi
                dari layanan pihak ketiga.</li>
        </ul>
        <p class="isi">(3) Informasi penggunaan Layanan oleh pengguna yang Perusahaan kumpulkan:</p>
        <ul class="isi">
            <li>Informasi peramban;</li>
            <li>Informasi log;</li>
            <li>Informasi perangkat;</li>
            <li>Informasi lokasi; dan</li>
            <li>Kuki dan ID anonim.</li>
        </ul>
        <p class="isi">Demi mengembangkan kegunaan Layanan, Perusahaan akan menyimpan dan menggunakan Kuki, mengakses
            analitik, dan data statistik. Perusahaan dapat mengumpulkan riwayat tindakan pengguna menggunakan Kuki,
            JavaScript, dan teknologi lainnya. Namun, riwayat ini tidak berisi informasi pribadi.</p>
        <p class="isi">(4) Informasi atribut pengguna yang dikumpulkan dari Google Analytics</p>
        <p class="isi">Informasi atribut pengguna berikut ini akan dikumpulkan dari Google Analytics yang digunakan oleh
            Layanan untuk mengumpulkan data trafik pada pengguna:
        <ul class="isi">
            <li>Usia;</li>
            <li>Jenis Kelamin; dan</li>
            <li>Minat.</li>
        </ul>
        <p class="isi">Data ini akan dikumpulkan setelah diproses sehingga individu tidak dapat diidentifikasi dari data
            tersebut. Untuk informasi selengkapnya mengenai Google Analytics, lihat Ketentuan Layanan Google Analytics.
        </p>
        <p class="sub">2. Tujuan Penggunaan</p>
        <p class="isi">Informasi Pengguna yang dikumpulkan dari pengguna akan digunakan untuk tujuan berikut:</p>
        <ul class="isi">
            <li>Menyediakan, memelihara, melindungi, atau meningkatkan Layanan, termasuk penerimaan pendaftaran dan
                verifikasi identitas;</li>
            <li>Memberikan panduan Layanan atau untuk menangani pertanyaan pelanggan;</li>
            <li>Menangani pelanggaran atas syarat dan ketentuan dan kebijakan ("S&K") Perusahaan yang berkaitan dengan
                Layanan;</li>
            <li>Menyampaikan pengumuman penting kepada pengguna, seperti perubahan S&K Layanan atau pemeliharaan sistem;
            </li>
            <li>Menyediakan fungsi komunitas dalam Layanan;</li>
            <li>Mendistribusikan pengumuman dan publikasi surat mengenai layanan lainnya, seminar, dan sekolah milik
                Perusahaan;</li>
            <li>Membuat data statistik, sehubungan dengan layanan perusahaan, yang telah diproses sedemikian rupa
                sehingga individu tidak dapat diidentifikasi;</li>
            <li>Menyampaikan kepada pengguna mengenai kampanye dsb., dari Perusahaan atau pihak ketiga, atau untuk
                menyebarkan unsur kebaruan;</li>
            <li>Mendistribusikan atau menampilkan iklan Perusahaan atau pihak ketiga;</li>
            <li>Digunakan untuk pemasaran layanan yang Perusahaan atau pihak ketiga sediakan atau akan sediakan di masa
                depan; dan</li>
            <li>Digunakan untuk tujuan yang terkait dengan hal tersebut di atas.</li>
        </ul>
        <p class="sub">3. Pengungkapan kepada Pihak Ketiga</p>
        <p class="isi">Perusahaan tidak akan, kecuali apabila diizinkan berdasarkan Pasal 26 Undang-Undang Nomor 11 tahun
            2009 tentang Informasi dan Transaksi Electronik, mengungkapkan informasi pribadi apa pun (yang berisi Informasi
            Pengguna) kepada pihak ketiga tanpa terlebih dahulu mendapatkan persetujuan dari pengguna. Namun, hal di atas
            tidak berlaku apabila:
        <ul>
            <p class="isi">Perusahaan tidak akan, kecuali apabila diizinkan berdasarkan Pasal 26 Undang-Undang Nomor 11
                tahun 2009 tentang Informasi dan Transaksi Electronik, mengungkapkan informasi pribadi apa pun (yang berisi
                Informasi Pengguna) kepada pihak ketiga tanpa terlebih dahulu mendapatkan persetujuan dari pengguna. Namun,
                hal di atas tidak berlaku apabila:</p>
            <ul class="isi">
                <li>Perusahaan memercayakan seluruh atau sebagian dari penanganan informasi pribadi dalam ruang lingkup yang
                    diperlukan guna mencapai tujuan penggunaan;</li>
                <li>Informasi pribadi yang diberikan disertai dengan suksesi bisnis yang disebabkan oleh merger atau alasan
                    lain;</li>
                <li>Diperlukan kerja sama dengan organisasi pemerintah pusat atau pemerintah daerah, atau orang yang mereka
                    percayakan dalam menjalankan urusan yang ditentukan oleh undang-undang dan peraturan, dan ketika ada
                    kemungkinan bahwa/ mendapatkan persetujuan pengguna akan mengganggu pelaksanaan urusan tersebut; atau
                </li>
                <li>Diperlukan kerja sama dengan organisasi pemerintah pusat atau pemerintah daerah, atau orang yang mereka
                    percayakan dalam menjalankan urusan yang ditentukan oleh undang-undang dan peraturan, dan ketika ada
                    kemungkinan bahwa mendapatkan persetujuan pengguna akan mengganggu pelaksanaan urusan tersebut.</li>
            </ul>
            <p class="sub">4. Koreksi dan Penangguhan Informasi Pribadi Pengguna</p>
            <p class="isi">Apabila ada pengguna yang meminta Perusahaan untuk mengoreksi atau menangguhkan penggunaan
                informasi pribadi apa pun, Perusahaan akan memastikan bahwa permintaan tersebut dibuat oleh pengguna itu
                sendiri, dan menjalankan penyelidikan yang diperlukan tanpa penundaan. Perusahaan kemudian akan mengoreksi
                atau menangguhkan penggunaan informasi pribadi, lalu memberi tahu pengguna. Apabila Perusahaan memutuskan
                untuk tidak mengoreksi atau menangguhkan penggunaan informasi pribadi atas dasar yang wajar, Perusahaan akan
                menyampaikan hal serupa kepada pengguna.Apabila ada pengguna yang meminta Perusahaan untuk menghapus
                informasi pribadi pengguna, dan Perusahaan menganggap perlu untuk mematuhi permintaan tersebut, Perusahaan
                akan memastikan bahwa permintaan tersebut dibuat oleh pengguna. Perusahaan kemudian akan menghapus informasi
                pribadi tersebut dan memberi tahu pengguna</p>
            <p class="sub">5. Pengecualian Tanggung Jawab</p>
            <p class="isi">Perusahaan tidak akan bertanggung jawab sehubungan dengan perolehan informasi pribadi oleh pihak
                ketiga apabila:</p>
            <ul class="isi">
                <li>Pengguna sendiri yang menyediakan informasi pribadi kepada pihak ketiga dengan menggunakan fungsi
                    layanan apa pun atau cara lain apa pun;</li>
                <li>Pengguna diidentifikasi secara kebetulan, berdasarkan informasi yang dimasukkan oleh pengguna itu pada
                    Layanan, atau informasi aktivitas dsb;</li>
                <li>Pihak ketiga memperoleh informasi pribadi atau Informasi lainnya milik Pengguna melalui sarana di luar
                    Layanan; atau</li>
                <li>Siapa pun selain pengguna itu sendiri memperoleh informasi yang mengidentifikasi pengguna tersebut
                    (termasuk ID, kata sandi dsb.).</li>
            </ul>
            <P class="sub">6. Prosedur Amendemen Kebijakan Privasi</P>
            <p class="isi">Perusahaan meninjau penanganan Informasi Pengguna dari waktu ke waktu dan berupaya
                mengembangkannya secara berkelanjutan. Apabila dianggap perlu, Perusahaan dapat mengamendemen Kebijakan ini
                kapan saja. Setiap amendemen Kebijakan akan diumumkan di situs web maca.ipb.ac.id.</p>
            <p class="sub">7. Kontak</p>
            <p class="isi">Apabila ada pertanyaan mengenai Kebijakan dan Informasi Pengguna ini, silakan menghubungi kami
                melalui formulir kontak.</p>
            </p>
            </p>
            <br>
            <br>
            <script>
                //Get the button
                var mybutton = document.getElementById("myBtn");
                // When the user scrolls down 20px from the top of the document, show the button
                window.onscroll = function() {
                    scrollFunction()
                };

                function scrollFunction() {
                    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                        mybutton.style.display = "block";
                    } else {
                        mybutton.style.display = "none";
                    }
                }
                // When the user clicks on the button, scroll to the top of the document
                function topFunction() {
                    document.body.scrollTop = 0;
                    document.documentElement.scrollTop = 0;
                }

            </script>
    </div>
@endsection
