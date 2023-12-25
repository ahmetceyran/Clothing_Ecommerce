<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\order;
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
            $user_phone = Auth::user()->phone;

            $count = cart::where('phone', $user_phone)->count();

            $product = Product::paginate(3);

            return view('user.home', compact('product', 'count'));

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
            $cart->price = $product->price * $request->quantity;
            $cart->quantity = $request->quantity;

            $cart->save();

            return redirect()->back()->with('message', 'Product Added to Cart Successfully!');

        }
        else
        {

            return redirect('login');

        }

    }

    public function show_cart()
    {
        if(Auth::id())
        {
            $user_phone = Auth::user()->phone;

            $cart=cart::where('phone','=',$user_phone)->get();

            $count = cart::where('phone', $user_phone)->count();

            return view('user.showcart',compact('cart', 'count'));
        }
        else
        {
            return redirect('login');
        }

    }

    public function remove_cart($id)
    {
        $cart=cart::find($id);

        $cart->delete();

        return redirect()->back()->with('message', 'Product Removed Successfully!');
    }

    public function cash_order()
    {
        $user=Auth::user();

        $user_phone=$user->phone;

        $data=cart::where('phone','=',$user_phone)->get();

        foreach($data as $data)
        {
            $order=new order;

            $order->name=$data->name;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->product_name=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->status='not delivered';

            $order->save();


            $cart_id=$data->id;
            $cart=cart::find($cart_id);
            $cart->delete();

        }

        return redirect()->back()->with('message', 'Your order has been received. We will connect with you soon :)');


    }

}
