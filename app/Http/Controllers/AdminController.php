<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function product_view()
    {

        return view('admin.products_view');

    }

    public function add_product(Request $request)
    {

        if(Auth::id())
        {

            $product = new product;

        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->quantity=$request->quantity;

        $image=$request->image;

        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product', $imagename);
        $product->image=$imagename;

        $product->save();

        return redirect()->back()->with('message','Product Added Successfully');


        }

        else
        {
            return redirect('login');
        }

    }

    public function show_products()
    {

        if(Auth::id())
        {

            $product=product::all();
            return view('admin.show_products', compact('product'));

        }

        else
        {
            return redirect('login');
        }

    }

    public function delete_product($id)
    {

        if(Auth::id())
        {

            $product=product::find($id);

        $product->delete();

        return redirect()->back()->with('message', 'Product Deleted Successfully');

        }

        else
        {
            return redirect('login');
        }


    }

    public function update_product($id)
    {

        if(Auth::id())
        {

            $product=product::find($id);

            return view('admin.update_product', compact('product'));

        }

        else
        {
            return redirect('login');
        }


    }

    public function update_product_confirm(Request $request,$id)
    {

        if(Auth::id())
        {

            $product=product::find($id);

        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->quantity=$request->quantity;

        $image=$request->image;

        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('product', $imagename);

            $product->image=$imagename;
        }


        $product->save();

        return redirect()->back()->with('message', 'Product Updated Successfully');


        }

        else
        {
            return redirect('login');
        }

    }

}
