<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProduitStoreRequest;
use App\Http\Requests\ProduitUpdateRequest;
use Illuminate\Support\Facades\DB;


class ProduitController extends Controller
{

    // protected $lastId;

    // public function __construct()
    // {
    //     $this->lastId = session('lastId', 0);
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = DB::table('produits')->get();
        return view('produits.index', ['produits' => $produits]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produits.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProduitStoreRequest $request)
    {
        $validatedData = $request->validated();

        $produit = [
            'libelle' => $validatedData['libelle'],
            'marque' => $validatedData['marque'],
            'prix' => $validatedData['prix'],
            'stock' => $validatedData['stock'],
        ];
    
        if ($request->hasFile('image')) {
            $produit['image'] = $request->file('image')->store('ProduitsImages', 'local');
        }
    
        
        $productId = DB::table('produits')->insertGetId($produit);
    
        return redirect('/produits/' . $productId)->with('success', 'Le produit a été créé avec succès.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produit = DB::table('produits')->where('id',$id)->first();

        return view('produits.show',compact('produit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $produit = DB::table('produits')->where('id',$id)->first();

        return view('produits.edit',compact('produit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProduitUpdateRequest $request, string $id)
    {
        
        $produit = DB::table('produits')->where('id',$id)->first();

        $data = [
            'id' => $id,
            'libelle' => $request->libelle,
            'marque' => $request->marque,
            'prix' => $request->prix,
            'stock' => $request->stock,
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('ProduitsImages','local');
        }

        DB::table('produits')->where('id',$id)->update($data);

        return redirect('/produits/' . $id)->with('success', 'Le produit a été mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('produits')->where('id',$id)->delete();

        return redirect('/produits')->with('success', 'Le produit a été supprimé avec succès.');
    
    }
}
