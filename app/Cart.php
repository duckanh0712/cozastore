<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $products; // danh sản phẩm
    public $totalPrice = 0; // tông
    public $totalQty = 0; // tổng sô SP
    public $discount = 0; // giá giảm
    public $coupon; // Mã giảm giá

    public function __construct($cart)
    {
        parent::__construct();

        if ($cart) {
            $this->products = $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQty = $cart->totalQty;
            $this->discount = $cart->discount;
            $this->coupon = $cart->coupon;
        }
    }
    // Thêm sản phẩm vào giỏ hàng
    public function add($product,$quantity)
    {

        $_item = [
            'qty' => 0,
            'price' => $product->price,
            'item' => $product
        ];

        if ($this->products && array_key_exists($product->id, $this->products)) {
            $_item = $this->products[$product->id];
        }

        $_item['qty'] = $_item['qty'] + $quantity;

        $_item['price'] = $_item['qty'] * $product->price;

        $this->products[$product->id] = $_item;
        $this->totalPrice = $this->totalPrice + ($quantity * $product->price);
        $this->totalQty = $this->totalQty + $quantity; // tăng lên 1 sản phẩm
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function remove($id)
    {
        // trừ bớt số lượng
        $this->totalQty = $this->totalQty - $this->products[$id]['qty'];
        // trừ giá
        $this->totalPrice = $this->totalPrice - $this->products[$id]['price'];

        unset($this->products[$id]);
    }

    // Cập nhật giỏ hàng
    public function store($id , $qty)
    {
        // Xóa số lượng + giá của thằng hiện tại để cập nhật lại
        $this->totalQty = $this->totalQty - $this->products[$id]['qty'];
        $this->totalPrice = $this->totalPrice - $this->products[$id]['price'];
        // Cập nhật số lượng && giá của sẩn phẩm
        $this->products[$id]['qty'] = $qty;
        $this->products[$id]['price'] = $this->products[$id]['qty'] * $this->products[$id]['item']->price;
        // cập nhật lại giỏ hàng
        $this->totalQty = $this->totalQty + $this->products[$id]['qty'];
        $this->totalPrice = $this->totalPrice + $this->products[$id]['price'];
    }
}
