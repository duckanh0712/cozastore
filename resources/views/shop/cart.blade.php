@extends('shop.layouts.main')
@section('title','COZA Store | Cart')
@section('content')

    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url({{asset('/fontend/images/bg-01.jpg')}});">
    </section>
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
				Cart
			</span>
        </div>
    </div>


    <!-- Shoping Cart -->
    <div class="bg0 p-t-75 p-b-85">

        <div class="container">
            @if(session('cart'))
            <div class="row" >

                <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50" id="my-cart">
                    @include('shop.components.minicart')
                </div>

                <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                    <div class="p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm" style="text-align: center;">
                        <div class="w-full-ssm">
                            <div class="">
                                <p id="errfn" style="display: none;font-size: xx-small;">Name is not allowed in !</p>
                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl2 plh3 size-116 p-l-50 p-r-30" type="text" id="fullnameCart" placeholder="Full Name">
                                </div>

                                <p id="errpn" style="display: none;font-size: xx-small;">Phone number is not allowed in !</p>
                                <div class="bor8 bg0 m-b-12" >
                                    <input class="stext-111 cl2 plh3 size-116 p-l-50 p-r-30" type="number" id="phoneCart" placeholder="Your Phone Number">
                                </div>
                                <p id="errem" style="display: none;font-size: xx-small;">Email is not allowed in !</p>
                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl2 plh3 size-116 p-l-50 p-r-30" type="email" id="emailCart" placeholder="Your Email">
                                </div>
                                <p id="errct" style="display: none;font-size: xx-small;">City is not allowed in !</p>
                                <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                    <select class="js-select2" name="cityCart" id="option-Country">
                                        <option  value="" >City</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                                <p id="errdt" style="display: none;font-size: xx-small;">District is not allowed in !</p>
                                <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                    <select class="js-select2" name="districtCart" id="option-District">
                                        <option value="" id="rm_option-District">District</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                                <p id="errwr" style="display: none;font-size: xx-small;">Ward is not allowed in !</p>
                                <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                    <select class="js-select2" name="wardCart" id="option-Ward">
                                        <option value="" id="rm_option-Ward">Ward</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                                <p id="errar" style="display: none;font-size: xx-small;">Address is not allowed in !</p>
                                <div class="bor8 bg0 m-b-12">
                                    <div class="m-b-30" id="">
                                        <textarea class="stext-111 cl2 plh3 p-lr-28 size-120 p-tb-10" id="detailCart" placeholder="Example: 15, 61 Lane, Định Công street" style="min-height: 80px;"></textarea>
                                    </div>
                                </div>
                                <div class="bor8 bg0 m-b-12">
                                    <div class="m-b-30">
                                        <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-10" id="descriptionCart" placeholder="Note" style="min-height: 100px;"></textarea>
                                    </div>
                                </div>

                            </div>
                            <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" onclick="PostCheckOut()">
                                Proceed to Checkout
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>

            @else
                <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                    <div class="p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm" style="text-align: center;">
                        <h4 class="mtext-109 cl2">
                            Nothing
                        </h4>
                            <a class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" href="/">
                               Go to Home
                            </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
    @include('shop.modal.PostCheckOut');
@endsection
@section('myJs')
    <script>

        function onloadAjax()
        {
            $.ajax({
                url: 'https://vapi.vnappmob.com/api/province/',
                method: 'get',
                dataType: 'json',
                statusCode:{
                    200:function (response) {
                        var arrCity = response.results;
                        arrCity.map(item => {
                           $('#option-Country').append('<option data-id-city="'+item.province_id+'" value="'+item.province_name+'">'+item.province_name+'</option>');

                        });
                    }
                },

            });
        }
        $('#option-Country').change(function () {
            var idCity = $("#option-Country").select2().find(":selected").data("id-city");
            $('#rm_option-District').siblings().remove();
            $('#rm_option-Ward').siblings().remove();
            $.ajax({
                url: 'https://vapi.vnappmob.com/api/province/district/'+idCity,
                method: 'get',
                dataType: 'json',
                statusCode:{
                    200:function (response) {
                        var arrDistrict = response.results;
                        arrDistrict.map(item => {
                            $('#option-District').append('<option  data-id-district="'+item.district_id+'" value="'+item.district_name+'">'+item.district_name+'</option>');
                        });
                    }
                },

            });
        });
        $('#option-District').change(function () {
            var idDistrict = $('#option-District').select2().find(":selected").data("id-district");
            $('#rm_option-Ward').siblings().remove();
            $.ajax({
                url: 'https://vapi.vnappmob.com/api/province/ward/'+idDistrict,
                method: 'get',
                dataType: 'json',
                statusCode:{
                    200:function (response) {
                        var arrWard = response.results;
                        arrWard.map(item => {
                            $('#option-Ward').append('<option value="'+item.ward_name+'">'+item.ward_name+'</option>');

                        });
                    }
                },

            });
        });
    </script>
@endsection
