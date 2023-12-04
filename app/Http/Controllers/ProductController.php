<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{

    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        $productos = $query->paginate(10);
        return response()->json($productos);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $product = new Product();
        $validator = Validator::make($request->all(), $product->getRules(), $product->getMessages(), $product->getNames());

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        if ($request->hasFile('image')) {
            $media->media = $request->file('image')->store('images', 'public');
        }

        $product->fill($request->all());
        $product->save();

        return response()->json($product, 201);
    }

    public function show(string $id)
    {
        $product = Product::find($id);
        return response()->json($product, 200);
    }

    public function edit(string $id)
    {

    }

    public function update(Request $request, Product $product)
    {
        $product = Product::find($id);
        $validator = Validator::make($request->all(), $product->getRules(), $product->getMessages(), $product->getNames());

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $product->fill($request->all());
        $product->save();

        return response()->json($product, 200);
    }

    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();

        return response()->json(null, 204);
    }
}
