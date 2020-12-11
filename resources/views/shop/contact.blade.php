@extends('shop.layouts.main')
@section('title','COZA Store | Contact')
@section('content')
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url({{asset('/fontend/images/bg-01.jpg')}});">
    </section>


    <!-- Content page -->
    <section class="bg0 p-t-104 p-b-116">
        <div class="container">
            <div class="flex-w flex-tr">
                <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                    @csrf
                        <h4 class="mtext-105 cl2 txt-center p-b-30">
                            Contact
                        </h4>
                         <p class='errname'  style='font-size: xx-small; display: none;color: red'>Name is not allowed in !</p>
                        <div class="bor8 m-b-20 how-pos4-parent" id="errname">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="name" id="nameContact" placeholder="Your Name">

                        </div>
                         <p class='errphone' style='font-size: xx-small; display: none ;color: red'>Phone Number name is not allowed in !</p>
                        <div class="bor8 m-b-20 how-pos4-parent" id="errphone">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="phone" id="phoneContact" placeholder="Your phone number">
                        </div>

                        <p class='erremail' style='font-size: xx-small; display: none;color: red'>Email is not allowed in !</p>
                        <div class="bor8 m-b-20 how-pos4-parent" id="erremail">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" id="emailContact" placeholder="Your Email">
                        </div>
                        <p class='errmsg' style='font-size: xx-small; display: none;color: red'>Content is not allowed in !</p>
                        <div class="bor8 m-b-30" id="errmsg">
                            <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg" id="msgContact" placeholder="We can help you ?"></textarea>
                        </div>
                        <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" onclick="sendMsg()">
                            Send
                        </button>

                </div>

                <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                    <div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

                        <div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Address
							</span>

                            <p class="stext-115 cl6 size-213 p-t-18">
                                Coza Store Center 8th floor, 379 Hudson St, New York, NY 10018 US
                            </p>
                        </div>
                    </div>

                    <div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>

                        <div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Lets Talk
							</span>

                            <p class="stext-115 cl1 size-213 p-t-18">
                                +1 800 1236879
                            </p>
                        </div>
                    </div>

                    <div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

                        <div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Sale Support
							</span>

                            <p class="stext-115 cl1 size-213 p-t-18">
                                contact@example.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map -->
    <div class="map">
        <div class="size-303" id="google_map" data-map-x="40.691446" data-map-y="-73.886787" data-pin="images/icons/pin.png" data-scrollwhell="0" data-draggable="1" data-zoom="11"></div>
    </div>
@endsection

