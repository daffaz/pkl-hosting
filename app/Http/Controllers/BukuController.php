<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Peminjaman;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Buku::where('judul', 'like', "%$request->search%")->paginate();
            $dataTernak = Buku::where([
                'kategori' => 'Peternakan',
                ['judul', 'LIKE', "%$request->search%"]
            ])->paginate();
            $dataKomunikasi = Buku::where([
                'kategori' => 'Komunikasi',
                ['judul', 'like', "%$request->search%"]
            ])->paginate();
            $dataBisnis = Buku::where([
                'kategori' => 'Bisnis & ekonomi',
                ['judul', 'like', "%$request->search%"]
            ])->paginate();
            $dataEkowisata = Buku::where([
                'kategori' => 'Ekowisata',
                ['judul', 'like', "%$request->search%"]
            ])->paginate();
            $dataTanaman = Buku::where([
                'kategori' => 'Tanaman',
                ['judul', 'like', "%$request->search%"]
            ])->paginate();
            $dataPerikanan = Buku::where([
                'kategori' => 'Perikanan',
                ['judul', 'like', "%$request->search%"]
            ])->paginate();
            $dataVeteriner = Buku::where([
                'kategori' => 'Veteriner',
                ['judul', 'like', "%$request->search%"]
            ])->paginate();
            $dataKomputer = Buku::where([
                'kategori' => 'Komputer & teknologi',
                ['judul', 'like', "%$request->search%"]
            ])->paginate();
            $dataMasakan = Buku::where([
                'kategori' => 'Masakan',
                ['judul', 'like', "%$request->search%"]
            ])->paginate();
            $dataIndustri = Buku::where([
                'kategori' => 'Industri',
                ['judul', 'like', "%$request->search%"]
            ])->paginate();
            $dataPertanian = Buku::where([
                'kategori' => 'Pertanian',
                ['judul', 'like', "%$request->search%"]
            ])->paginate();
            $dataKimia = Buku::where([
                'kategori' => 'Kimia',
                ['judul', 'like', "%$request->search%"]
            ])->paginate();
            $dataLingkungan = Buku::where([
                'kategori' => 'Lingkungan',
                ['judul', 'like', "%$request->search%"]
            ])->paginate();
            $dataAkuntansi = Buku::where([
                'kategori' => 'Akuntansi',
                ['judul', 'like', "%$request->search%"]
            ])->paginate();
            $dataPerkebunan = Buku::where([
                'kategori' => 'Perkebunan',
                ['judul', 'like', "%$request->search%"]
            ])->paginate();
            $dataMasyarakat = Buku::where([
                'kategori' => 'Masyarakat',
                ['judul', 'like', "%$request->search%"]
            ])->paginate();
            $dataTA = Buku::where([
                'kategori' => 'Tugas akhir',
                ['judul', 'LIKE', "%$request->search%"]
            ])->paginate();
        } else {
            $data = Buku::latest()->paginate(24);
            $dataTernak = Buku::where('kategori', 'Peternakan')->latest()->get();
            $dataKomunikasi = Buku::where('kategori', 'Komunikasi')->latest()->get();
            $dataBisnis = Buku::where('kategori', 'Bisnis & ekonomi')->latest()->get();
            $dataEkowisata = Buku::where('kategori', 'Ekowisata')->latest()->get();
            $dataTanaman = Buku::where('kategori', 'Tanaman')->latest()->get();
            $dataPerikanan = Buku::where('kategori', 'Perikanan')->latest()->get();
            $dataKomputer = Buku::where('kategori', 'Komputer & teknologi')->latest()->get();
            $dataMasakan = Buku::where('kategori', 'Masakan')->latest()->get();
            $dataIndustri = Buku::where('kategori', 'Industri')->latest()->get();
            $dataPertanian = Buku::where('kategori', 'Pertanian')->latest()->get();
            $dataKimia = Buku::where('kategori', 'Kimia')->latest()->get();
            $dataLingkungan = Buku::where('kategori', 'Lingkungan')->latest()->get();
            $dataAkuntansi = Buku::where('kategori', 'Akuntansi')->latest()->get();
            $dataVeteriner = Buku::where('kategori', 'Veteriner')->latest()->get();
            $dataPerkebunan = Buku::where('kategori', 'Perkebunan')->latest()->get();
            $dataMasyarakat = Buku::where('kategori', 'Masyarakat')->latest()->get();
            $dataTA = Buku::where('kategori', 'Tugas akhir')->latest()->get();
        }
        return view('buku.katalog_buku_fisik', [
            'buku' => $data,
            'dataTernak' => $dataTernak,
            'dataKomunikasi' => $dataKomunikasi,
            'dataBisnis' => $dataBisnis,
            'dataEkowisata' => $dataEkowisata,
            'dataTanaman' => $dataTanaman,
            'dataPerikanan' => $dataPerikanan,
            'dataVeteriner' => $dataVeteriner,
            'dataKomputer' => $dataKomputer,
            'dataMasakan' => $dataMasakan,
            'dataIndustri' => $dataIndustri,
            'dataPertanian' => $dataPertanian,
            'dataKimia' => $dataKimia,
            'dataLingkungan' => $dataLingkungan,
            'dataAkuntansi' => $dataAkuntansi,
            'dataPerkebunan' => $dataPerkebunan,
            'dataMasyarakat' => $dataMasyarakat,
            'tugas_akhir' => $dataTA
        ]);
    }

    public function bukuTerbaru(Request $request)
    {
        if ($request->has('search')) {
            $data = Buku::where('judul', 'LIKE', "%$request->search%")->paginate();
        } else {
            $data = Buku::latest()->paginate(12);
        }
        return view('buku.buku_fisik_terbaru', [
            'buku' => $data,
        ]);
    }

    public function bukuTA(Request $request)
    {
        if ($request->has('search')) {
            $data = Buku::where([
                'kategori' => 'Tugas akhir',
                ['judul', 'LIKE', "%$request->search%"]
            ])->paginate(12);
        } else {
            $data = Buku::where('kategori', 'Tugas akhir')->paginate(12);
        }
        return view('buku.buku_fisik_tugas_akhir', [
            'buku' => $data
        ]);
    }

    public function bukuNovel(Request $request)
    {
        if ($request->has('search')) {
            $data = Buku::where([
                'kategori' => 'Novel',
                ['judul', 'LIKE', "%$request->search%"]
            ])->paginate();
        } else {
            $data = Buku::where('kategori', 'Novel')->latest()->paginate(12);
        }
        return view('buku.buku_fisik_novel', [
            'buku' => $data,
        ]);
    }

    public function show(Buku $buku)
    {
        return view('buku.show', [
            'buku' => $buku,
            'related' => Buku::where('kategori', $buku->kategori)->latest()->take(5)->get()
        ]);
    }

    public function create()
    {
        return view('admin.buku.buku_create');
    }

    public function store(Request $request)
    {
        $buku = new Buku;
        $gambar = $request->file('gambar');
        // CARA PERTAMA UNTUK INSERT
        // $buku->judul = $request->judul;
        // $buku->slug = \Str::slug($request->judul);
        // $buku->deskripsi = $request->deskripsi;
        // $buku->quantity = $request->quantity;
        // $buku->penerbit = $request->penerbit;
        // $buku->kategori = $request->kategori;
        // $buku->tahun = $request->tahun;
        // $buku->penulis = $request->penulis;
        // $buku->status = $request->status;
        // $buku->gambar = $nama_gambar;
        // $buku->save();
        // CARA KEDUA UNTUK INSERT, KEPADA PENGEMBANG SILAHKAN BEBAS MENGGUNAKAN METODE YANG MANA
        // Buku::create([
        //     'judul' => $request->judul,
        //     'slug' => \Str::slug($request->judul),
        //     'deskripsi' => $request->deskripsi,
        //     'kategori' => $request->kategori,
        //     'quantity' => $request->quantity,
        //     'penerbit' => $request->penerbit,
        //     'tahun' => $request->tahun,
        //     'penulis' => $request->penulis,
        //     'status' => $request->status,
        //     'gambar' => $nama_gambar,
        // ]);
        // CARA KETIGA UNTUK INSERT, LEBIH CLEAN CODE
        $request->validate([
            'judul' => 'required|max:254',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'quantity' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required',
            'penulis' => 'required',
            'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5120|',
        ]);
        if ($gambar) {
            $nama_gambar = time() . "_" . $gambar->getClientOriginalName();
            $tujuan_gambar = 'uploaded/gambar';
            $gambar->move($tujuan_gambar, $nama_gambar);
        }
        // $this->validate($request, [
        //     'judul' => 'required|max:254',
        //     'deskripsi' => 'required',
        //     'kategori' => 'required',
        //     'quantity' => 'required',
        //     'penerbit' => 'required',
        //     'tahun' => 'required',
        //     'penulis' => 'required',
        //     'gambar' => 'required',
        // ]);
        $buku = $request->all();
        $buku['slug'] = \Str::slug($request->judul);
        $buku['gambar'] = $nama_gambar;
        $buku['status'] = 'Tersedia';
        // dd($buku);
        Buku::create($buku);

        session()->flash('success', 'Buku berhasil ditambahkan');

        return redirect()->to('/administrator/buku');
    }

    public function edit(Buku $buku)
    {
        return view('admin.buku.buku_edit', compact('buku'));
    }

    public function update(Buku $buku)
    {
        $gambar = request()->file('gambar');
        // VALIDASI TERLEBIH DAHULU INPUT DARI REQUEST UPDATE
        $data = request()->validate([
            'judul' => 'required|max:254',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'quantity' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required',
            'penulis' => 'required',
            'status' => 'required',
        ]);
        if ($gambar) {
            $nama_gambar = time() . "_" . $gambar->getClientOriginalName();
            $tujuan_gambar = 'uploaded/gambar';
            $gambar->move($tujuan_gambar, $nama_gambar);
        } else {
            $nama_gambar = $buku->gambar;
        }
        $data['gambar'] = $nama_gambar;


        $buku->update($data);

        session()->flash('success', 'Buku berhasil diupdate');

        return redirect()->to('/administrator/buku');
    }

    public function destroy(Buku $buku)
    {
        // dd($buku);
        $buku->delete();
        session()->flash("success", 'Buku berhasil dihapus');
        return redirect()->to('/administrator/buku');
    }

    public function pinjam()
    {
        return view('buku.sedang_dipinjam', [
            'bukuPinjam' => Peminjaman::where(['status' => 'Pinjam', 'allowed' => 1, 'user_id' => request()->user()->id])->latest()->get(),
            'bukuKembali' => Peminjaman::where(['status' => 'Dikembalikan', 'user_id' => request()->user()->id])->latest()->get()
        ]);
    }

    public function peminjamanBuku(Buku $buku)
    {
        $pinjam = request()->all();
        $pinjam['status'] = 'Pinjam';
        $pinjam['allowed'] = '0';

        $buku->quantity -= 1;
        $buku->save();

        $tanggalSekarang = date('Y-m-d');
        $tanggal = date_create($tanggalSekarang);
        $tanggal = date_add($tanggal, date_interval_create_from_date_string('7 days'));
        // dd($tanggal);

        Peminjaman::create([
            'civitas_id' => $pinjam['civitas-id'],
            'buku_id' => $pinjam['buku-id'],
            'user_id' => $pinjam['user-id'],
            'status' => $pinjam['status'],
            'lastreturn' => $tanggal,
        ]);

        session()->flash('success', 'Buku berhasil dipinjam, silahkan ke perpustakaan untuk konfirmasi peminjaman buku');
        return redirect()->to('/kategori-buku');
    }

    public function direquest()
    {
        return view('buku.direquest', [
            'direquest' => Peminjaman::with('buku')->where(['user_id' => request()->user()->id, 'allowed' => '0'])->latest()->get()
        ]);
    }
}
