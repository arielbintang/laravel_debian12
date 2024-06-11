<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $barangs = Barang::where('seri', 'LIKE', "%{$query}%")->get();
        $kategoris = Kategori::where('deskripsi', 'LIKE', "%{$query}%")->get();

        if ($barangs->isEmpty() && $kategoris->isEmpty()) {
            return redirect()->route('dashboard')->with('error', 'Barang atau kategori tidak ditemukan');
        }

        return view('dashboard', compact('barangs', 'kategoris', 'query'));
    }
}
