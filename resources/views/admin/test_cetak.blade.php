<body style="margin-top: 0px;padding-top: 0px">
<style>
    table, td, th {
  border: 1px solid black;
  font-weight: normal;
}
table {
  width: 100%;
  border-collapse: collapse;
}
    /* .ono{
  border: 1px solid black;
  font-weight: normal;
} */
</style>
    <div style="background-color: white;margin:0 auto; padding:0px 0px 10px 0px; text-align: center;">
        <div style="line-height: 4px">
            <div style="display:flex; border: red solid;">
                <div>
                    <img src="https://macabuku.xyz/images/ipb.png" style="position:absolute;right: 560px;top:10px"
                        height="85px" width="85px">
                </div>
                <div>
                    <h3 style="font-weight: normal">KEMENTRIAN PENDIDIKAN DAN KEBUDAYAAN</h3>
                    <h3 style="font-weight: normal">INSTITUT PERTANIAN BOGOR</h3>
                    <h3 style="font-weight: bolder">SEKOLAH VOKASI</h3>
                    <p>Kampus IPB Cilibende, Jl. Kumbang No.14 Bogor 16151</p>
                    <p>Telp. (0251) 8329101, 8329051, Fax (0251) 8329101</p>
                    <div style="position: relative; margin-bottom: 6px">
                        <div style="border-bottom: 2px solid black;width: 90%;margin:0 auto;"></div>
                        <div
                            style="border-bottom: 4px solid black;width: 90%; position: absolute;top: 3px; right: 50%; transform: translateX(-50%);margin:0 auto;">
                        </div>
                    </div>
                    <br>
                    <br />
                    <div style="margin-top: 19px">
                        <h3>PERPUSTAKAAN SEKOLAH VOKASI IPB</h3>
                        <h3>SURAT KETERANGAN BEBAS PUSTAKA</h3>
                        <h5>No. 00{{ $nosurat }}/Perp.SV./<?php 
                        function integerToRoman($integer)
                            {
                             // Convert the integer into an integer (just to make sure)
                             $integer = intval($integer);
                             $result = '';
                             
                             // Create a lookup array that contains all of the Roman numerals.
                             $lookup = array('M' => 1000,
                             'CM' => 900,
                             'D' => 500,
                             'CD' => 400,
                             'C' => 100,
                             'XC' => 90,
                             'L' => 50,
                             'XL' => 40,
                             'X' => 10,
                             'IX' => 9,
                             'V' => 5,
                             'IV' => 4,
                             'I' => 1);
                             
                             foreach($lookup as $roman => $value){
                              // Determine the number of matches
                              $matches = intval($integer/$value);
                             
                              // Add the same number of characters to the string
                              $result .= str_repeat($roman,$matches);
                             
                              // Set the integer to be the remainder of the integer and the value
                              $integer = $integer % $value;
                             }
                             
                             // The Roman numeral should be built, return it
                             return $result;
                            }
                            ;?>{{ integerToRoman(date('m')) }}/<?php echo date("Y"); ?></h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="data-mahasiswa-document" style="text-align: justify;width: 90%;margin: 0 auto;margin-top: 25px;">
            <p>Yang bertanda tangan dibawah ini, menerangkan bahwa :
            </p>
            <br>

            <p>Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $nama }}
            </p>
            <p>Program studi : Manajemen Informatika </p>
            <p>NIM &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                J3C118124 </p>

            <br>
            <p>Tidak mempunyai pinjaman Bahan Pustaka pada Perpustakaan Sekolah Vokasi IPB.
                Demikian Surat Keterangan Bebas Pustaka ini dibuat untuk dipergunakan sebagaimana
                mestinya.
            </p>
        </div>
        <div class="data-footer-document" style="margin: 0 auto ;width:90%;margin-top:80px;text-align: right;">
            <div style="padding-right: 30px;line-height: 6px">
                @php
                    setLocale(LC_ALL, 'IND');
                    // $bulan = sprintf('%02s', $row['month']);
                    // $tanggal = date('d F Y');
                    $tanggal = date("Y/m/d");
                    
                    $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
                    $next_date = date('Y-m-d', strtotime($date .' +3 day'));
                @endphp
                <p>Bogor, {{ $tanggal }}</p>
                <p>Pengelola Perpustakaan</p>
                <p>Sekolah Vokasi IPB</p>
                <div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                </div>
                <p>(___________________________)</p>
                <p>NIP: ................................................</p>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <table class="">
            <tr class="">
                <th class="">No. Revisi : 00</th>
                <th class="">Hal: 1/1</th>
                <th class="">Tanggal Berlaku :&nbsp;{{ $next_date }}</th>
            </tr>
        </table>
        </div>
    </div>

</body>
