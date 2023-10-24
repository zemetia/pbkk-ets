<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Barang;
use App\Models\Kondisi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    private string $id;
    private string $nama;
    private string $jenis;
    private string $kondisi;
    private string $keterangan;
    private string $kecacatan;
    private int $jumlah;
    private string $path_gambar;

    public function index()
    {
        $barangs = Barang::all();
        return view('barang.barang', [
            'barangList' => $barangs
        ]);
    }


    public function storeView()
    {
        $jenis = Jenis::all();
        $kondisi = Kondisi::all();

        return view('barang.barang-add', [
            "jenis" => $jenis,
            "kondisi" => $kondisi
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "nama" => "required",
            "jenis" => "required",
            "kondisi" => "required",
            "keterangan" => "required",
            "kecacatan" => "required",
            "jumlah" => "required",
            "image" => "required"
        ]);


        $filename = "";
        $nama_slug = Str::slug($request->nama, "_");
        if ($request->file('image')) {
            $extension = $request->file('image')->extension();
            $filename = date('Y-m-d-H-i-s') . "_" . $nama_slug . "." . $extension;
            $request->file('image')->storeAs(
                'public/images',
                $filename
            );
        }

        $barang = Barang::create([
            "nama" => $request->input("nama"),
            "jenis_id" => $request->input("jenis"),
            "kondisi_id" => $request->input("kondisi"),
            "keterangan" => $request->input("keterangan"),
            "kecacatan" => $request->input("kecacatan"),
            "jumlah" => $request->input("jumlah"),
            "path_gambar" => $filename,
        ]);

        return redirect('/barang');
    }

    public function editView($id)
    {
        $barang = Barang::find($id);
        return view('barang.barang-edit', [
            'barang' => $barang
        ]);
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            "nama" => "required",
            "jenis" => "required",
            "kondisi" => "required",
            "keterangan" => "required",
            "kecacatan" => "required",
            "jumlah" => "required",
            "image" => "",
        ]);

        // delete old image
        $barang = Barang::find($id);

        if ($request->file("image") && $barang->path_gambar && file_exists(storage_path('app/public/images/' . $barang->path_gambar))) {
            Storage::delete('public/images/' . $barang->path_gambar);
        }

        // upload new image

        $filename = "";
        $nama_slug = Str::slug($request->nama, "_");
        if ($request->file('image')) {
            $extension = $request->file('image')->extension();
            $filename = date('Y-m-d-H-i-s') . "_" . $nama_slug . "." . $extension;
            $request->file('image')->storeAs(
                'public/images',
                $filename
            );
        }

        $barang = Barang::create([
            "nama" => $request->input("nama"),
            "jenis" => $request->input("jenis"),
            "kondisi" => $request->input("kondisi"),
            "keterangan" => $request->input("keterangan"),
            "kecacatan" => $request->input("kecacatan"),
            "jumlah" => $request->input("jumlah"),
            "path_gambar" => $request->file('image') ? $request->file('image') : $filename,
        ]);

        return redirect('/barang');
    }

    public function deleteView($id)
    {
        $barang = Barang::find($id);

        return view('barang.barang-delete', [
            'barang' => $barang
        ]);
    }

    public function delete($id)
    {
        $barang = Barang::find($id);
        $barang->delete();

        return redirect('/barang');
    }
}
