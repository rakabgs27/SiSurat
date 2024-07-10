<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KategoriSurat;
use App\Http\Requests\StoreKategoriSuratRequest;
use App\Http\Requests\UpdateKategoriSuratRequest;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Http\Request;

class KategoriSuratController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $kategoriSurats = KategoriSurat::when($search, function ($query, $search) {
            return $query->where('nama_kategori', 'like', '%' . $search . '%');
        })->paginate(10); // Adjust the pagination as needed

        return view('kategori-surat.index', compact('kategoriSurats'));
    }


    public function create()
    {
        $nextId = KategoriSurat::max('id') + 1;
        return view('kategori-surat.create', compact('nextId'));
    }

    public function store(Request $request)
    {
        $messages = [
            'nama_kategori.required' => 'Nama kategori wajib diisi.',
            'nama_kategori.string' => 'Nama kategori harus berupa teks.',
            'nama_kategori.max' => 'Nama kategori tidak boleh lebih dari 255 karakter.',
            'keterangan.required' => 'Keterangan wajib diisi.',
            'keterangan.string' => 'Keterangan harus berupa teks.',
        ];

        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required|string|max:255',
            'keterangan' => 'required|string',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $kategoriSurat = new KategoriSurat;
            $kategoriSurat->nama_kategori = $request->nama_kategori;
            $kategoriSurat->keterangan = $request->keterangan;
            $kategoriSurat->save();

            return redirect()->route('kategori-surat.index')->with('success', 'Kategori surat berhasil ditambahkan');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan kategori surat: ' . $e->getMessage());
        }
    }

    public function show(KategoriSurat $kategoriSurat)
    {
        // Function Kosong
    }

    public function edit($id)
    {
        $kategoriSurat = KategoriSurat::findOrFail($id);
        return view('kategori-surat.edit', compact('kategoriSurat'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'nama_kategori.required' => 'Nama kategori wajib diisi.',
            'nama_kategori.string' => 'Nama kategori harus berupa teks.',
            'nama_kategori.max' => 'Nama kategori tidak boleh lebih dari 255 karakter.',
            'keterangan.required' => 'Keterangan wajib diisi.',
            'keterangan.string' => 'Keterangan harus berupa teks.',
        ];

        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required|string|max:255',
            'keterangan' => 'required|string',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $kategoriSurat = KategoriSurat::findOrFail($id);
            $kategoriSurat->nama_kategori = $request->nama_kategori;
            $kategoriSurat->keterangan = $request->keterangan;
            $kategoriSurat->save();

            return redirect()->route('kategori-surat.index')->with('success', 'Kategori surat berhasil diperbarui');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui kategori surat: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $kategoriSurat = KategoriSurat::findOrFail($id);

            $kategoriSurat->delete();

            return redirect()->route('kategori-surat.index')->with('success', 'Kategori surat berhasil dihapus');
        } catch (Exception $e) {
            return redirect()->route('kategori-surat.index')->with('error', 'Terjadi kesalahan saat menghapus kategori surat: ' . $e->getMessage());
        }
    }
}
