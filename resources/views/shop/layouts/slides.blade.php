<section class="section-slide">
    <div class="wrap-slick1">
        <div class="slick1">
            @if(!empty($banners))
                @foreach($banners as $banner)
            <div class="item-slick1" style="background-image: url({{asset($banner->image)}});">
                <div class="container h-full">
                    <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Collection 2020
								</span>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                            <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                NEW SEASON
                            </h2>
                        </div>

                    </div>
                </div>
            </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
<div class="sec-banner bg0 p-t-80 p-b-50">
    <div class="container">
        <div class="row">
            @if(!empty($categories))
                @foreach($categories as $category)
                    @if($category->parent_id == 0)
            <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                <!-- Block1 -->

                <div class="block1 wrap-pic-w">
                    <img src="{{$category->image}}" alt="IMG-BANNER">

                    <a href="{{ route('shop.category', ['slug' => $category->slug]) }}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									{{$category->name}}
								</span>
                            <span class="block1-info stext-102 trans-04">
									Spring 2020
								</span>
                        </div>
                        <div class="block1-txt-child2 p-b-4 trans-05">
                            <div class="block1-link stext-101 cl0 trans-09">
                                Shop Now
                            </div>
                        </div>
                    </a>
                </div>
            </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</div>

