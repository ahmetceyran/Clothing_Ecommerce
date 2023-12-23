<?php

namespace App\Http\Controllers;

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


}
