<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\product;

use Illuminate\View\View;

use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function index() : View
    {
        //coding untuk ambil data dari model yang namanya product
        $products = product::latest()->paginate(10);

        //coding buat ke interface (view)
        return view('products.index', compact('products'));
    }

    public function create() : view
    {
        #coding buat form tambah produk
        return view('products.tambahproduk');
    }

    public function store(Request $request):RedirectResponse
    {
        //membuat variasi form
        $request->validate([
            'txtnama' => 'required|max:15',
            'textdeskripsi' => 'required|min:5',
            'txtstok' => 'required|numeric',
            'txtharga' => 'required|numeric'
        ]);

        //coding simpan data
        product::create([
            'title' => $request->txtnama,
            'description' => $request->textdeskripsi,
            'price' => $request->txtharga,
            'stock' => $request->txtstok
        ]);

        return redirect()->route('products.index');
    }
    //untuk membuat edit
    public function edit(string $id): View

    {
        //ini coding untuk ambil data ke model berdasarkan id (primary key)
        $products = product::findorFail($id);

        //ini coding menuju inrterface sambil membawa data yang di dapatkan erdasarkan id
        return view('products.editproduk', compact('products'));
    }
     //untuk membuat update
    public function update(Request $request, $id): RedirectResponse
    {
        // untuk membuat form validasi
        $request->validate([
            'txtnama' => 'required|max:15',
            'textdeskripsi' => 'required|min:5',
            'txtstok' => 'required|numeric',
            'txtharga' => 'required|numeric'
        ]);

        //cari dulu data yang mau di edit ada atau tidak berdasarkan id
        $products = product::findorFail($id);

        //coding simpan data
        $products->update([
            'title' => $request->txtnama,
            'description' => $request->textdeskripsi,
            'price' => $request->txtharga,
            'stock' => $request->txtstok
        ]);

        return redirect()->route('products.index');
    }

    public function destroy(string $id): RedirectResponse
    {
         $products = product::findorFail($id);

         $products->delete();

        return redirect()->route('products.index');
    }


}