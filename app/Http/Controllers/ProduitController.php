<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProduitStoreRequest;


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
        $produits = session('produits', []);
        return view("produits.index",compact('produits'));
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

        $produits = session('produits', []);

        $produit = [
            'Id' => uniqid(),
            'Libelle' => $validatedData['libelle'],
            'Marque' => $validatedData['marque'],
            'Prix' => $validatedData['prix'],
            'Stock' => $validatedData['stock'],
        ];
    
        if ($request->hasFile('image')) {
            $produit['Image'] = $request->file('image')->store('ProduitsImages', 'local');
        }
    
    

        $produits[] = $produit;

        session(['produits' => $produits]);

        return redirect('/produits');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produits = session('produits',[]);
        $produit = collect($produits)->firstWhere('Id',$id);
        return view('produits.show', compact('produit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produits = session('produits', []);
        return view('produits.edit', compact('produits', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produits = session('produits', []);

        $index = collect($produits)->search(function ($item) use ($id) {
            return $item['Id'] == $id;
        });

        $data = [
            'Id' => $id,
            'Libelle' => $request->libelle,
            'Marque' => $request->marque,
            'Prix' => $request->prix,
            'Stock' => $request->stock,
        ];
    
        if ($request->hasFile('image')) {
            $data['Image'] = $request->file('image')->store('ProduitsImages', 'local');
        }
    
        $produits[$index] = $data;

        session(['produits' => $produits]);

        return redirect('/produits');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produits = session('produits', []);

        foreach ($produits as $key => $produit) {
            if ($produit['Id'] == $id) {
                unset($produits[$key]);
                break;
            }
        }
        
        session(['produits'=>$produits]);
        
        return redirect('/produits');
    
    }
}
