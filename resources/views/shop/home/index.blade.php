@extends('shop.layouts.main')
@section('title','COZA Store')
@section('content')
<!-- Product -->
<section class="bg0 p-t-23 p-b-140">
    <div class="container">
        @foreach($list as $item)
        <div class="p-b-10">
            <h3 class="ltext-103 cl5">{{$item['category']->name}}</h3>
        </div>
        <div class="row isotope-grid">
            @foreach($item['products'] as $product)
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="{{asset($product->image)}}" alt="{{$product->name}}">
                        <button class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04" onclick="detailProductPopup('{{$product->id}}')" id="quickView">
                            Quick View</button>
                    </div>

                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="{{ route('shop.product', ['slug' => $product->slug , 'id' => $product->id]) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">{{$product->name}}</a>

                            <span class="stext-105 cl3">
									{{number_format($product->price,0,",",".")}}
								</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
        @endforeach
            <section class="sec-blog bg0 p-t-60 p-b-90">
                <div class="container">
                    <div class="p-b-66">
                        <h3 class="ltext-105 cl5 txt-center respon1">
                            Blog
                        </h3>
                    </div>

                    <div class="row">
                        @foreach($articles as $article)
                        <div class="col-sm-6 col-md-4 p-b-40">
                            <div class="blog-item">
                                <div class="hov-img0">
                                    <a href="{{ route('shop.article.detail', ['slug' => $article->slug , 'id' => $article->id]) }}">
                                        <img src="{{asset($article->image)}}" alt="IMG-BLOG">
                                    </a>
                                </div>

                                <div class="p-t-15">
                                    <div class="stext-107 flex-w p-b-14">
								<span class="m-r-3">
									<span class="cl4">
										By
									</span>

									<span class="cl5">
										Nancy Ward
									</span>
								</span>

                                        <span>
									<span class="cl4">
										on
									</span>

									<span class="cl5">
										{{$article->created_at}}
									</span>
								</span>
                                    </div>

                                    <h4 class="p-b-12">
                                        <a href="blog-detail.html" class="mtext-101 cl2 hov-cl1 trans-04">
                                            {{$article->title}}
                                        </a>
                                    </h4>

                                    <p class="stext-108 cl6">
                                        Duis ut velit gravida nibh bibendum commodo. Suspendisse pellentesque mattis augue id euismod. Interdum et male-suada fames
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>>
            </section>
    </div>
</section>
@include('shop.modal.PostCheckOut');
@endsection
