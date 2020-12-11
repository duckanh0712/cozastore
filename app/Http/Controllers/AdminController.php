<?php

namespace App\Http\Controllers;

use App\Article;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    // trang dashboard
    public function index()
    {
        $numOrder = Order::count(); // đếm số đơn hàng
        $numArticle = Article::count(); // số bài viết
        $numProduct = Product::count(); // số sản phẩm
        $numUser = User::count(); // số người dùng

        $data = [
            'numOrder' => $numOrder,
            'numArticle' => $numArticle,
            'numProduct' => $numProduct,
            'numUser' => $numUser
        ];

        return view('admin.dashboard', $data);
    }

    public function login()
    {
        return view('auth.login');
    }
    public function registerForm()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {



        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);



        //luu vào csdl
        $user = new User();
        $user->name = $request->input('name'); // họ tên
        $user->email = $request->input('email'); // email
        $user->password = bcrypt($request->input('password')); // mật khẩu
        $user->save();

        return redirect()->route('admin.login');
    }
    public function postLogin(Request $request)
    {
        //validate du lieu
//        $request->validate([
//            'email' => 'required|string|email|max:255',
//            'password' => 'required|string|min:6'
//        ]);

        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];


        // check success
        if (Auth::attempt($data)) {

            return redirect()->route('dashboard');
        }

        return redirect()->back()->with('msg', 'Email hoặc Password không chính xác');;
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}

