<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Http\Requests\StoreSuratRequest;
use App\Http\Requests\UpdateSuratRequest;
use App\Models\KategoriSurat;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SuratController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');
        $Arsips = Surat::when($search, function ($query, $search) {
            return $query->where('judul_surat', 'like', '%' . $search . '%');
        })->with('kategori')->paginate(10);

        return view('surat.index', compact('Arsips'));
    }

    public function create()
    {
        $kategoriSurats = KategoriSurat::all();
        return view('surat.create', compact('kategoriSurats'));
    }

    public function store(Request $request)
    {
        $messages = [
            'nomor_surat.required' => 'Nomor surat wajib diisi.',
            'nomor_surat.string' => 'Nomor surat harus berupa teks.',
            'nomor_surat.max' => 'Nomor surat tidak boleh lebih dari 255 karakter.',
            'id_kategori_surat.required' => 'Kategori surat wajib diisi.',
            'id_kategori_surat.integer' => 'Kategori surat harus berupa angka.',
            'judul_surat.required' => 'Judul surat wajib diisi.',
            'judul_surat.string' => 'Judul surat harus berupa teks.',
            'judul_surat.max' => 'Judul surat tidak boleh lebih dari 255 karakter.',
            'file_surat.required' => 'File surat wajib diunggah.',
            'file_surat.file' => 'File surat harus berupa file.',
            'file_surat.mimes' => 'File surat harus berformat PDF.',
        ];

        $validator = Validator::make($request->all(), [
            'nomor_surat' => 'required|string|max:255',
            'id_kategori_surat' => 'required|integer',
            'judul_surat' => 'required|string|max:255',
            'file_surat' => 'required|file|mimes:pdf',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $path = '';
            $fileName = '';
            if ($request->hasFile('file_surat')) {
                $file = $request->file('file_surat');
                $fileName = $file->getClientOriginalName();
                $path = $file->storeAs('file_surat', $fileName, 'public');
            }

            Surat::create([
                'nomor_surat' => $request->nomor_surat,
                'id_kategori_surat' => $request->id_kategori_surat,
                'judul_surat' => $request->judul_surat,
                'file_surat' => $path,
                'file_name' => $fileName,
            ]);

            return redirect()->route('surat.index')->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengunggah surat: ' . $e->getMessage());
        }
    }


    public function show($id)
    {
        $surat = Surat::findOrFail($id);
        return view('surat.detail', compact('surat'));
    }


    public function edit($id)
    {
        $surat = Surat::findOrFail($id);
        $kategoriSurats = KategoriSurat::all();
        return view('surat.edit', compact('surat', 'kategoriSurats'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'id_kategori_surat' => 'required|integer',
            'judul_surat' => 'required|string|max:255',
            'file_surat' => 'nullable|file|mimes:pdf',
        ]);

        $surat = Surat::findOrFail($id);

        if ($request->hasFile('file_surat')) {
            Storage::delete($surat->file_surat);
            $file = $request->file('file_surat');
            $path = $file->store('public/surats');
            $surat->file_surat = $path;
        }

        $surat->nomor_surat = $request->nomor_surat;
        $surat->id_kategori_surat = $request->id_kategori_surat;
        $surat->judul_surat = $request->judul_surat;
        $surat->save();

        return redirect()->route('surat.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        try {
            $Surat = Surat::findOrFail($id);

            $Surat->delete();

            return redirect()->route('surat.index');
        } catch (Exception $e) {
            return redirect()->route('surat.index')->with('error', 'Terjadi kesalahan saat menghapus surat: ' . $e->getMessage());
        }
    }

    public function download($id)
    {
        $surat = Surat::findOrFail($id);
        $filePath = $surat->file_surat;

        if (Storage::disk('public')->exists($filePath)) {
            return Storage::disk('public')->download($filePath);
        }

        return redirect()->route('surat.show', $id)->with('error', 'File tidak ditemukan.');
    }
}
