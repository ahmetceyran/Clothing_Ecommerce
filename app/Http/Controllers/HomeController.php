<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function redirect()
    {

        $usertype = Auth::user()->usertype;

        if($usertype == 1)
        {

            return view('admin.home');

        }
        else
        {

            $product = Product::paginate(3);
            return view('user.home', compact('product'));

        }

    }

    public function index()
    {

        if(Auth::id())
        {

            return redirect('redirect');

        }
        else
        {

            $product = Product::paginate(3);
            return view('user.home', compact('product'));

        }

    }

    public function search(Request $request)
    {

        $search = $request->search;

        if($search=='')
        {

            $product = Product::paginate(3);
            return view('user.home', compact('product'));

        }

        $product = product::where('title', 'Like', '%'.$search.'%')->get();

        return view('user.home', compact('product'));

    }

    public function addcart(Request $request, $id)
    {

        if(Auth::id())
        {

            $user=Auth::user();

            $product = product::find($id);

            $cart = new cart;

            $cart->name = $user->name;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->product_title = $product->title;
            $cart->price = $product->price;
            $cart->quantity = $request->quantity;

            $cart->save();

            return redirect()->back()->with('message', 'Product Added to Cart Successfully!');

        }
        else
        {

            return redirect('login');

        }

    }

}
