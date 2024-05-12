<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CategoryProduct;
use App\Models\Category;
use App\Models\Type;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        // dd($products);
        return view('admins.index', [
            'products'=>$products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $categories = Category::all();
        return view('admins.create', [
            'types'=>$types,
            'categories'=>$categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $types = Type::pluck('name')->toArray();
        $categories = Category::pluck('id')->toArray();
        

        $request->validate([
            'name' => 'required|string|max:255',
            'type' => ['required', 'string', Rule::in($types)], 
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'weight' => 'required|string',
            'image' => 'required|image|max:2048',
            'categories' => ['array', Rule::in($categories)],
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // dd($imagePath);

        $product = Product::create([
            'id' => Str::uuid(),
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'imagePath' => $imagePath,
            'weight' => $request->input('weight'),
        ]);

        $categories = $request->input('categories');
        if($categories)
        foreach ($categories as $categoryId) {
            CategoryProduct::create([
                'productId' => $product->id,
                'categoryId' => $categoryId,
            ]);
        }

        // return redirect('/admins/'.$task->id);
        return redirect('/admins');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('admins.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // dd($product);
        $types = Type::all();
        $product = Product::find($id);
        $categories = Category::all();

        return view('admins.edit', [
            'product' => $product,
            'types'=> $types,
            'categories'=>$categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        $types = Type::pluck('name')->toArray();
        $categories = Category::pluck('id')->toArray(); 

        

        $request->validate([
            'name' => 'required|string|max:255',
            'type' => ['required', 'string', Rule::in($types)],
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'weight' => 'required|string',
            'categories' => ['array', Rule::in($categories)],
        ]);

        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $product = Product::find($id);

        $product->name = $request->name;
        $product->type = $request->type;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->weight = $request->weight;
        $product->imagePath = $imagePath ?? $product->imagePath;

        $product->save();

        if ($request->has('categories')) {
            $product->categories()->sync($request->categories);
        } else {
            $product->categories()->detach();
        }
        
        // $request->session()->flash('message', 'Product was successfully updated.');
        
        return redirect('admins');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $product = Product::find($id);
        $product->categories()->detach();
        Storage::disk('public')->delete($product->imagePath);
        $product->delete();
        // $request->session()->flash('message', 'Úloha bola úspešne vymazaná.');
        return redirect('admins');
    }

    public function search(Request $Request)
    {
        $user = Auth::user();
        $searchTerm = $Request->input('search');

        DB::statement('CREATE EXTENSION IF NOT EXISTS unaccent');

        $sql = "SELECT * 
        FROM products 
        WHERE unaccent(name) ILIKE unaccent('%' || ? || '%')";
        
        $products = DB::select($sql, [$searchTerm]);
        
        //dd($products);
        return view('admins.index', [
            'products' => $products,
        ]);
    }
}