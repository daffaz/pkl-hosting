<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use App\Models\FavoritEbook;
use Illuminate\Http\Request;

class EbookController extends Controller
{
    public function indexEbook(Request $request)
    {
        if ($request->has('search')) {
            $data = Ebook::where('judul', 'like', "%$request->search%")->paginate();
             $dataJurnal = Ebook::where([
                'kategori' => 'Jurnal',
                ['judul', 'like', "%$request->search%"]
            ])->paginate();
            $dataTernak = Ebook::where([
                'kategori' => 'Peternakan',
                ['judul', 'LIKE', "%$request->search%"]
            ])->paginate();
            $dataKomunikasi = Ebook::where([
                'kategori' => 'Komunikasi',
                ['judul', 'like', "%$request->search%"]
            ])->paginate();
            $dataBisnis = Ebook::where([
                'kategori' => 'Bisnis & ekonomi',
                ['judul', 'like', "%$request->search%"]
            ])->paginate();
            $dataEkowisata = Ebook::where([
                'kategori' => 'Ekowisata',
                ['judul', 'like', "%$request->search%"]
            ])->paginate();
            $dataTanaman = Ebook::where([
                'kategori' => 'Tanaman',
                ['judul', 'like', "%$request->search%"]
            ])->paginate();
            $dataPerikanan = Ebook::where([
                'kategori' => 'Perikanan',
                ['judul', 'like', "%$request->search%"]
            ])->paginate();
            $dataVeteriner = Ebook::where([
                'kategori' => 'Veteriner',
                ['judul', 'like', "%$request->search%"]
            ])->paginate();
            $dataKomputer = Ebook::where([
                'kategori' => 'Komputer & teknologi',
                ['judul', 'like', "%$request->search%"]
            ])->paginate();
            $dataMasakan = Ebook::where([
                'kategori' => 'Masakan',
                ['judul', 'like', "%$request->search%"]
            ])->paginate();
            $dataIndustri = Ebook::where([
                'kategori' => 'Industri',
                ['judul', 'like', "%$request->search%"]
            ])->paginate();
            $dataPertanian = Ebook::where([
                'kategori' => 'Pertanian',
                ['judul', 'like', "%$request->search%"]
            ])->paginate();
            $dataKimia = Ebook::where([
                'kategori' => 'Kimia',
                ['judul', 'like', "%$request->search%"]
            ])->paginate();
            $dataLingkungan = Ebook::where([
                'kategori' => 'Lingkungan',
                ['judul', 'like', "%$request->search%"]
            ])->paginate();
            $dataAkuntansi = Ebook::where([
                'kategori' => 'Akuntansi',
                ['judul', 'like', "%$request->search%"]
            ])->paginate();
            $dataPerkebunan = Ebook::where([
                'kategori' => 'Perkebunan',
                ['judul', 'like', "%$request->search%"]
            ])->paginate();
            $dataMasyarakat = Ebook::where([
                'kategori' => 'Masyarakat',
                ['judul', 'like', "%$request->search%"]
            ])->paginate();
            $dataTugasAkhir = Ebook::where([
                'kategori' => 'Tugas akhir',
                ['judul', 'like', "%$request->search%"]
            ])->paginate();
        } else {
            $data = Ebook::latest()->paginate(24);
            $dataJurnal = Ebook::where('kategori', 'Jurnal')->latest()->get();
            $dataTernak = Ebook::where('kategori', 'Peternakan')->latest()->get(); 
            $dataKomunikasi = Ebook::where('kategori', 'Komunikasi')->latest()->get();
            $dataBisnis = Ebook::where('kategori', 'Bisnis & ekonomi')->latest()->get();
            $dataEkowisata = Ebook::where('kategori', 'Ekowisata')->latest()->get();
            $dataTanaman = Ebook::where('kategori', 'Tanaman')->latest()->get();
            $dataPerikanan = Ebook::where('kategori', 'Perikanan')->latest()->get();
            $dataKomputer = Ebook::where('kategori', 'Komputer & teknologi')->latest()->get();
            $dataMasakan = Ebook::where('kategori', 'Masakan')->latest()->get();
            $dataIndustri = Ebook::where('kategori', 'Industri')->latest()->get();
            $dataKimia = Ebook::where('kategori', 'Kimia')->latest()->get();
            $dataLingkungan = Ebook::where('kategori', 'Lingkungan')->latest()->get();
            $dataAkuntansi = Ebook::where('kategori', 'Akuntansi')->latest()->get();
            $dataPertanian = Ebook::where('kategori', 'Pertanian')->latest()->get();
            $dataVeteriner = Ebook::where('kategori', 'Veteriner')->latest()->get();
            $dataKimia = Ebook::where('kategori', 'Kimia')->latest()->get();
            $dataPerkebunan = Ebook::where('kategori', 'Perkebunan')->latest()->get();
            $dataMasyarakat = Ebook::where('kategori', 'Masyarakat')->latest()->get();
            $dataTugasAkhir = Ebook::where('kategori', 'Tugas akhir')->latest()->get();
        }
        return view('ebook.ebook', [
            'ebook' => $data,
            'jurnal' => $dataJurnal,
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
            'tugas_akhir' => $dataTugasAkhir
        ]);
    }
    // Detil ebook
    public function show(Ebook $ebook)
    {
        return view('ebook.show', [
            'ebook' => $ebook,
            'related' => Ebook::where('kategori', $ebook->kategori)->latest()->take(5)->get(),
            'status' => FavoritEbook::where(['user_id' => request()->user()->id, 'ebook_id' => $ebook->id])->latest()->first(),
        ]);
    }
    public function create()
    {
        return view('admin.ebook.ebook_create');
    }

    public function dibaca()
    {
        return view('ebook.sedang_dibaca', [
            'ebook' => Ebook::latest()->paginate(6),
        ]);
    }

    public function store(Request $request)
    {
        $buku = new Ebook;
        $gambar = $request->file('gambar');
        $pdf = $request->file('pdf');

        $request->validate([
            'judul' => 'required|max:254',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required',
            'penulis' => 'required',
            'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5120|',
            'pdf' => 'required|mimes:pdf|max:25600'
        ]);
        
        if ($gambar && $pdf) {
            $nama_gambar = time() . "_" . $gambar->getClientOriginalName();
            $nama_pdf = time() . "_" . $pdf->getClientOriginalName();

            $tujuan_gambar = 'uploaded/gambar';
            $gambar->move($tujuan_gambar, $nama_gambar);

            $tujuan_pdf = 'uploaded/pdf';
            $pdf->move($tujuan_pdf, $nama_pdf);
        }

        
        // $this->validate($request, [
        //     'judul' => 'required|max:254',
        //     'deskripsi' => 'required',
        //     'kategori' => 'required',
        //     'penerbit' => 'required',
        //     'tahun' => 'required',
        //     'penulis' => 'required',
        // ]);
        $buku = $request->all();
        $buku['slug'] = \Str::slug($request->judul);
        $buku['gambar'] = $nama_gambar;
        $buku['pdf'] = $nama_pdf;
        // dd($buku);
        Ebook::create($buku);

        session()->flash('success', $buku['kategori'] == 'Jurnal' ? 'Jurnal berhasil ditambahkan' : 'Ebook berhasil ditambahkan');

        return redirect()->to('/administrator/ebook');
    }

    public function edit(Ebook $ebook)
    {
        return view('admin.ebook.ebook_edit', compact('ebook'));
    }

    public function update(Ebook $ebook)
    {
        $gambar = request()->file('gambar');
        $pdf = request()->file('pdf');
        
        $pdf = request()->file('pdf');
        
        // VALIDASI TERLEBIH DAHULU INPUT DARI REQUEST UPDATE..
        $data = request()->validate([
            'judul' => 'required|max:254',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required',
            'penulis' => 'required',
            'gambar' => 'image|mimes:jpg,png,jpeg,gif,svg|max:5120|',
            'pdf' => 'mimes:pdf|max:25600'
        ]);
        
        if ($gambar && $pdf) {
            $nama_gambar = time() . "_" . $gambar->getClientOriginalName();
            $nama_pdf = time() . "_" . $pdf->getClientOriginalName();

            $tujuan_gambar = 'uploaded/gambar';
            $gambar->move($tujuan_gambar, $nama_gambar);

            $tujuan_pdf = 'uploaded/pdf';
            $pdf->move($tujuan_pdf, $nama_pdf);
        }else {
            $nama_gambar = $ebook->gambar;
            $nama_pdf = $ebook->pdf;
        }
        $data['gambar'] = $nama_gambar;
        $data['pdf'] = $nama_pdf;

        $ebook->update($data);

        session()->flash('success', 'Ebook berhasil diupdate');

        return redirect()->to('/administrator/ebook');
    }
    public function destroy(Ebook $ebook)
    {
        $ebook->delete();
        session()->flash('success', 'Ebook berhasil dihapus');
        return redirect()->to('/administrator/ebook');
    }
    public function favorit(FavoritEbook $fav, Request $request)
    {
        // echo "wassup man";
        // dd($request->user()->id);
        $status = $request->status;
        // echo $status;
        $status = $status == "0" ? "1" : "0";
        // dd($status);
        // if ($status == "0") {
        //     $fav->where('user_id', $request->user()->id)
        //         ->where('ebook_id', $request->ebook_id)
        //         ->update(['status' => $status]);
        // } else {
        //     $fav->updateOrCreate(
        //         [
        //             'user_id' => $request->user()->id,
        //             'ebook_id' => $request->ebook_id
        //         ],
        //         [
        //             "status" => $status
        //         ]
        //     );
        // }
        $fav->updateOrCreate(
            [
                'user_id' => $request->user()->id,
                'ebook_id' => $request->ebook_id
            ],
            [
                "status" => $status
            ]
        );
        // $status == 0 ? $status = 1 : $status = 0;
        // dd($status);
        // dd($status);
        $status == "1" ? session()->flash('success', 'Berhasil menambahkan ke favorit') : '';
        return redirect()->back();
    }
}
