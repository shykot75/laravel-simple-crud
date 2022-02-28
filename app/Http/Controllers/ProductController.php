<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    protected $product;
    protected $products;

    public function index(){
        return view('add-product');
    }

    public function create (Request $request){
//       return $request->all();

        $image = $request->file('image'); //store image to a temp location
        $imageName = $image->getClientOriginalName(); //store image name with extention
        $directory = 'product-image/';
        $image->move($directory, $imageName); // move the image with directory and originam name
        $url = $directory.$imageName;     // generate a url for image



        $this->product = new Product();
        $this->product->name = $request->name;
        $this->product->price = $request->price;
        $this->product->description = $request->description;
        $this->product->brand = $request->brand;
        $this->product->category = $request->category;
        $this->product->image =  $url;
        $this->product->save();


        return redirect()->back()->with('message', 'Product Created Successfully');


    }


    public function manage(){
        $this->products = Product::orderby('id', 'desc')->get();
        return view('/manage-product', ['products' => $this->products]);
    }

    public function edit($id){
//        return $id;
        $this->product = Product::find($id);
//        return $this->product;
        return view ('edit-product', ['product' => $this->product]);
    }

    public function update(Request $request, $id){
//        return $id;
        $this->product = Product::find($id);
        $this->product->name = $request->name;
        $this->product->price = $request->price;
        $this->product->description = $request->description;
        $this->product->brand = $request->brand;
        $this->product->category = $request->category;
//        $this->product->image =  $url;
        $this->product->save();

        return redirect('/manage-product')->with('message', 'Product Updated Successfully');

    }

    public function delete($id){
        $this->product = Product::find($id);
        $this->product->delete();
        return redirect('/manage-product')->with('message', 'Product Deleted Successfully');
    }


























}
