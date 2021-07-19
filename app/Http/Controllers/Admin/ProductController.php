<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    public function findCategory($category){

        $products = Product::query()->where('category','LIKE', "%{$category}%")->get();

        return view('shop.index', compact('products'));
    }


    public function shop()
    {
        $products = Product::latest()->paginate(5);
        return view('shop.index', compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function showShopProduct($id)
    {
        $products = Product::find($id);
        return view('shop.show', compact('products'));
    }


    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('admin.products.index', compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'category'=>'required',
            'image'=>'required|image|mimes:jpg,jpeg,png,gif,svg|max:5048',
        ]);

        $input = $request->all();

        if($image = $request->file('image')){
            $path = 'storage/img/';
            $filename = date('YmdHis').".".$image->getClientOriginalExtension();
            $image->move($path,$filename);
            $input['image'] = "$filename";
        }

        Product::create($input);

        return redirect()->route('products.index')->with('success', 'Producto Cadastrado com sucesso');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }


    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }


    public function search(Request $request){
        $search = $request->input('search');

        $products = Product::query()
        ->where('name','LIKE', "%{$search}%")->get();

        return view('shop.index', compact('products'));
    }


    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'image'=>'image|mimes:jpg,jpeg,png,gif,svg|max:5048',
        ]);

        $input = $request->all();

        if($image = $request->file('image')){
            $path = 'storage/img/';
            $filename = date('YmdHis').".".$image->getClientOriginalExtension();
            $image->move($path,$filename);
            $input['image'] = "$filename";
        }else{
            unset($input['image']);
        }

        $product->update($input);

        return redirect()->route('products.index')->with('success', 'Producto actualizado');
    }


    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produto deletado');
    }
}
