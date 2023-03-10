<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Buku;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
    
        $books = Buku::orderBy('id', 'desc')
                      ->when($search, function ($query, $search) {
                          return $query->where('judul', 'like', '%'.$search.'%')
                                       ->orWhere('pengarang', 'like', '%'.$search.'%')
                                       ->orWhere('penerbit', 'like', '%'.$search.'%');
                      })
                      ->paginate(10);
    
        return view('admin/contacts/index', compact('books'));
    }

    public function indexPublic(Request $request)
    {
    $search = $request->get('search');

    $books = Buku::where('judul', 'like', "%$search%")
        ->orWhere('pengarang', 'like', "%$search%")
        ->orWhere('penerbit', 'like', "%$search%")
        ->orderBy('created_at', 'desc')
        ->paginate(10);

    return view('index', ["title" => "Beranda"], compact('books'));
    }
    
    public function showPublic($id)
    {
        $book = Buku::where('id', $id)->first();
    
        if ($book) {
            return view('show', compact('book'));
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/contacts/create', [
            "title"=> "Book"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'pengarang' => 'required|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:50000',
        ]);

        $path = $request->file('gambar')->store('public/images');

        $book = new Buku;
        $book->judul = $validatedData['judul'];
        $book->penerbit = $validatedData['penerbit'];
        $book->pengarang = $validatedData['pengarang'];
        $book->gambar = $path;
        $book->save();

        return redirect()->route('buku.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Buku::findOrFail($id);
        return view('admin/contacts/edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Buku::findOrFail($id);
        $book->update($request->all());
        $book->save();

        return redirect()->route('buku.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Buku::findOrFail($id);
        $book->delete();

        return redirect()->route('buku.index');
    }
}
