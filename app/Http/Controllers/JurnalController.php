<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use Illuminate\Http\Request;

class JurnalController extends Controller
{
    public function create()
    {
        return view('admin.jurnal.jurnal_create');
    }

    public function store(Request $request)
    {
        $pdf = request()->file('pdf');

        if ($pdf) {
            $nama_pdf = time() . "_" . $pdf->getClientOriginalName();
            $tujuan_pdf = 'uploaded/pdf';
            $pdf->move($tujuan_pdf, $nama_pdf);
        }
        $this->validate($request, [
            'judul' => 'required|max:254',
            'deskripsi' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required',
            'penulis' => 'required',
            'pdf' => 'required|mimes:pdf|max:25600'

        ]);

        $jurnal = $request->all();
        $jurnal['slug'] = \Str::slug($request->judul);
        $jurnal['kategori'] = 'Jurnal';
        $jurnal['pdf'] = $nama_pdf;
        $jurnal['gambar'] = "jurnal.PNG";
        // dd($jurnal);
        Ebook::create($jurnal);

        session()->flash('success', 'Jurnal berhasil ditambahkan');

        return redirect()->to('/administrator/jurnal');
    }

    public function edit(Ebook $ebook)
    {
        return view('admin.jurnal.jurnal_edit', compact('ebook'));
    }

    public function update(Request $request, Ebook $ebook)
    {
        $pdf = request()->file('pdf');

        if ($pdf) {
            $nama_pdf = time() . "_" . $pdf->getClientOriginalName();
            $tujuan_pdf = 'uploaded/pdf';
            $pdf->move($tujuan_pdf, $nama_pdf);
        }else {
            $nama_pdf = $ebook->pdf;
        }
        
        $ebook['pdf'] = $nama_pdf;
        $ebook->save();
        // $ebook->update($data);

        session()->flash('success', 'Jurnal berhasil diupdate');

        return redirect()->to('/administrator/jurnal');
    }
    public function destroy(Ebook $ebook)
    {
        $ebook->delete();
        session()->flash('success', 'Jurnal berhasil terhapus');
        return redirect()->to('/administrator/jurnal');
    }
}
