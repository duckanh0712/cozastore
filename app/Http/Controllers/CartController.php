<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Mail\MailNotify;
use App\Order;
use App\OrderDetail;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mail;

class CartController extends GeneralController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index ()
    {
        return view('shop.cart');
    }

    public function addToCart(Request $request)
    {


        $id = $request->id;
        $sizeProdcut = $request->sizeProduct;
        $quantity = $request->quantity;

        $product = Product::find($id);


        if (!$product) {
            return $this->notfound();
        }
        // Kiểm tra tồn tại giỏ hàng cũ
        $_cart = session('cart') ? session('cart') : '';

        // Khởi tạo giỏ hàng
        $cart = new Cart($_cart);
        // Thêm sản phẩm vào giỏ
        $cart->add($product,$quantity);
        // Lưu thông tin vào session
        $request->session()->put('cart', $cart);

        return response()->json(['msg' => 'ok'], 200);
    }
    public function removeToCart(Request $request)
    {

        $id = $request->id;
        // Kiểm tra tồn tại giỏ hàng cũ
        $_cart = session('cart') ? session('cart') : '';
        // Khởi tạo giỏ hàng
        $cart = new Cart($_cart);
        $cart->remove($id);

        if (count($cart->products) > 0) {
            // Lưu thông tin vào session
            $request->session()->put('cart', $cart);
        } else {
            $request->session()->forget('cart');
        }

        return response()->json([
            'status' =>true,
            'html' => view('shop.components.minicart')->render()
        ]);
    }

    // Cập nhật lại giỏ hàng
    public function updateToCart(Request $request)
    {
        // check nhập số lượng không đúng định dạng
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|min:1',
        ]);

        // check số lượng lỗi
        if ($validator->fails()) {
            return response()->json([
                'status'  => false ,
                'data' => $validator
            ]);
        }

        $product_id = $request->id;
        $qty = $request->quantity;

        // Lấy giỏ hàng hiện tại thông qua session
        $_cart = session('cart');
        $cart = new Cart($_cart);
        $cart->store($product_id, $qty);
        $products = $cart->products;
        if (count($cart->products) > 0) {
            // Lưu thông tin vào session
            $request->session()->put('cart', $cart);
        } else {
            $request->session()->forget('cart');
        }

        return response()->json([
            'html' => view('shop.components.minicart')->render()
        ]);

    }

    public function postCheckout(Request $request)
    {
        if (!session('cart')) {
            return redirect('/');
        }
        $request->validate([
            'fullname' => 'required|max:255',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required'
        ]);

        $_cart = session('cart');

        // Lưu vào bảng đơn đặt hàng - orders
        $order = new Order();
        $order->fullname = $request->fullname;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->note = $request->description;
        $order->total = $_cart->totalPrice;
        $order->discount = $_cart->discount;
        $order->coupon = $_cart->coupon;
        $order->order_status_id = 1; // 1 = mới

        if ($order->save()) {

            $order->code = 'COZA-'.$order->id.'-'.date('d').date('m').date('Y');
            $order->save();

            foreach ($_cart->products as $product) {
                $_detail = new OrderDetail();
                $_detail->order_id = $order->id;
                $_detail->name = $product['item']->name;
                $_detail->image = $product['item']->image;
                $_detail->sku = $product['item']->sku;
                $_detail->user_id = $product['item']->user_id;
                $_detail->product_id = $product['item']->id;
                $_detail->qty = $product['qty'];
                $_detail->price = $product['price'];
                $_detail->save();
            }
            Mail::to($request->email)->send(new MailNotify($_cart));
            $request->session()->forget('cart');
            return response()->json(['msg' => 'Cảm ơn bạn đã đặt hàng. Mã đơn hàng của bạn : #'.$order->code], 200);
        }
    }
}


