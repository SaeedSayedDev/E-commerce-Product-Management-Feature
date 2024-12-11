<?php

namespace App\Http\Controllers\Product;
use App\Http\Controllers\Controller;

use App\Http\Requests\Product\ProductRequest ;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //(Create, Read, Update, Delete)
    public function index()
    {
        $products = Product::where('user_id', auth()->id())->paginate(10);
        return view('Product/home', ['products' => $products]);
    }

    public function create()
    {
        return  view('Product/addProduct');
    }


    public function store(ProductRequest $productRequest)
    {
        $data = $productRequest->validated();
        $data['user_id'] = auth()->id();

        Product::create($data);

        session()->flash('Add_success', 'Product Added successfully');
        return back();
    }

    public function update(UpdateProductRequest $productRequest, $product_id)
    {
        $product =  Product::where('user_id', auth()->id())->find($product_id);
        $product->update($productRequest->validated());

        session()->flash('update_success', 'Product Updated successfully');
        return back();
    }


    public function destroy($product_id)
    {
        Product::where('user_id', auth()->id())->find($product_id)->delete();

        session()->flash('delete_success', 'Product Deleted successfully');
        return back();
    }



    public function viewProductDetails($product_id)
    {

        return view('Product/productDetails', ['product_id' => $product_id]);
    }

   
}
