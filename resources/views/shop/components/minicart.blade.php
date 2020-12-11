@if(session('cart'))
    @php
        $cart = session('cart');
        $products = $cart->products;
        $totalPrice = $cart->totalPrice;
        $totalQty = $cart->totalQty;
        $discount = $cart->discount;
        $coupon = $cart->coupon;
        $payment = $totalPrice - $discount;
    @endphp

    <div>
        <div class="m-l-25 m-r--38 m-lr-0-xl">
            <div class="wrap-table-shopping-cart">
                <table class="table-shopping-cart">
                    <tr class="table_head">
                        <th class="column-1">Product</th>
                        <th class="column-2">Name</th>
                        <th class="column-3">Price</th>
                        <th class="column-4">Quantity</th>
                        <th class="column-5">Total</th>
                        <th class="column-6"></th>
                    </tr>
                @foreach($products as $product)
                    <tr class="table_row"  data-id-product="{{$product['item']->id}}">
                        <td class="column-1">
                            <div class="how-itemcart1">
                                <img src="{{asset($product['item']->image)}}" alt="IMG">
                            </div>
                        </td>
                        <td class="column-2">{{$product['item']->name}}</td>
                        <td class="column-3">{{ number_format($product['item']->price ,0,",",".") }} đ</td>
                        <td class="column-4">
                            <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                <div class="btn-num-product-down cl8 trans-04 flex-c-m" id="num_product" data-id="{{ $product['item']->id }}">
                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                </div>
                                <input class="mtext-104 cl3 txt-center num-product"  type="number" name="num-product1" id="product{{$product['item']->id}}" data-num-product="{{ $product['qty'] }}" value="{{ $product['qty'] }}" min="1">
                                <div class="btn-num-product-up cl8 trans-04 flex-c-m" id="num_product" data-id="{{ $product['item']->id }}">
                                    <i class="fs-16 zmdi zmdi-plus" ></i>
                                </div>
                            </div>
                        </td>
                        <td class="column-5">{{ number_format($product['qty'] * $product['item']->price ,0,",",".") }}</td>
                        <td> <button style="padding-right: 25px;color: red" title="Delete product" onclick="removeProductCart('{{$product['item']->id}}')">x</button></td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                <div class="flex-w flex-m m-r-20 m-tb-5">
                    <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">

                    <div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                        Apply coupon
                    </div>
                </div>
            </div>
            <div class="p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm p-t-20" style="text-align: center;">
                <div class="flex-w flex-t bor12 p-b-13 ">
                    <div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
                    </div>

                    <div class="size-209">
								<span class="mtext-110 cl2">
                                    {{ number_format($totalPrice ,0,",",".") }} đ
								</span>
                    </div>
                </div>
                <div class="flex-w flex-t bor12 p-b-13 p-t-20">
                    <div class="size-208">
								<span class="stext-110 cl2">Discount:</span>
                    </div>

                    <div class="size-209">
								<span class="mtext-110 cl2" id="spanprice">
									0 đ
								</span>
                    </div>
                </div>
                <div class="flex-w flex-t p-t-27 p-b-33">
                    <div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
                    </div>

                    <div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									{{ number_format($payment ,0,",",".") }} đ
								</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endif
