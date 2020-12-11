    //----------------- Gui lien he ------------------------//
    $('#nameContact').change(function(){
        $('.errname').css('display','none')
    });
    $('#phoneContact').change(function(){
        $('.errphone').css('display','none')

    });
    $('#emailContact').change(function(){
        $('.erremail').css('display','none')
    });
    $('#msgContact').change(function(){
        $('.errmsg').css('display','none')
    });

    function sendMsg() {
        var data = {};
        var name = $('#nameContact').val();
        var phone = $('#phoneContact').val();
        var email = $('#emailContact').val();
        var msg = $('#msgContact').val();
        var validatorerr = true
        if (!name) {
            $('.errname').css('display','block');
            validatorerr = false;
        }
        if (!phone) {
            $('.errphone').css('display','block');
            validatorerr = false;
        }
        if (!email) {
            $('.erremail').css('display','block');
            validatorerr = false;
        }
        if (!msg) {
            $('.errmsg').css('display','block');
            validatorerr = false;
        }
        if (!validatorerr) { // flag = flase
            return false;
        }
        data = {
            name: name,
            phone: phone,
            email:email,
            msg:msg
        };

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/gui-lien-he',
            type: 'POST',
            data: data, // dữ liệu truyền sang nếu có
            dataType: "json", // kiểu dữ liệu trả về
            success: function (response) { // success : kết quả trả về sau khi gửi request ajax
                if (response.msg != 'undefined' && response.msg == 'ok') {
                    swal("", "Message has been sent !", "success");
                    $('#nameContact').val('');
                    $('#phoneContact').val('');
                    $('#emailContact').val('');
                    $('#msgContact').val('');
                }
            },
            statusCode: {
              500: function (response) {
                    console.log(response.responseText);
                }
            },
            error: function (e) { // lỗi nếu có
                console.log(e.message);
            }
        });
        return false;
    }
    //-----------------------------------------------------//

    //----------Them san pham vao gio hang----------------///
    $('#sizeProduct').change(function(){
        $('#errSizeProduct').css('display','none');
    })
    function addToCart(name) {
        var data = {};
        var idProduct = $('#idProduct').val();
        var sizeProduct = $('#sizeProduct').val();
        var quantity = $('#quantity').val();
        if (!sizeProduct || sizeProduct == 0) {
            $('#errSizeProduct').css('display', 'block');
            return false;
        }
        data = {
            id: idProduct,
            sizeProduct: sizeProduct,
            quantity: quantity
        };
        var totalProduct = $('#totalProduct').attr('data-notify');
        var totalProductM = $('#totalProductM').attr('data-notify');
        var tt = Number(totalProduct);
        var tc = Number(quantity);
        var ttM = Number(totalProductM);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/them-sp-vao-gio-hang',
            type: 'POST',
            data: data, // dữ liệu truyền sang nếu có
            dataType: "json", // kiểu dữ liệu trả về
            success: function (response) { // success : kết quả trả về sau khi gửi request ajax
                if (response.msg != 'undefined' && response.msg == 'ok') {
                    swal(name, "đã được thêm vào giỏ hàng !", "success");
                    tt = tt + tc;
                    $('#totalProduct').attr('data-notify', tt);
                    ttM = ttM + tc;
                    $('#totalProductM').attr('data-notify', ttM);

                }
            },
            error: function (e) { // lỗi nếu có
                console.log(e.message);
            }
        });

        return false;
    }
    function addToCartP() {
        var id = $('#id_productP').val();
        console.log(id);
        var nameProduct = $('#tet').text();
        var sizeProduct = $('#sizeProductP').val();
        var quantity = $('#quantityP').val();
        if (!sizeProduct || sizeProduct == 0) {
            $('#errSizeProduct').css('display', 'block');
            return false;
        }

        data = {
            id: id,
            sizeProduct: sizeProduct,
            quantity: quantity
        };
        var totalProduct = $('#totalProduct').attr('data-notify');
        var tt = Number(totalProduct);
        var tc = Number(quantity);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/them-sp-vao-gio-hang',
            type: 'POST',
            data: data, // dữ liệu truyền sang nếu có
            dataType: "json", // kiểu dữ liệu trả về
            success: function (response) { // success : kết quả trả về sau khi gửi request ajax
                if (response.msg != 'undefined' && response.msg == 'ok') {
                    swal(nameProduct, "\n" + "has been added to the cart !", "success");
                    tt = tt + tc;
                    $('#totalProduct').attr('data-notify', tt);

                }
            },
            error: function (e) { // lỗi nếu có
                console.log(e.message);
            }
        });

        return false;

    }
    //----Xoa sp khoi gio hang---//
    function removeProductCart(id) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/dat-hang/xoa-sp-gio-hang',
                type: 'GET',
                data: {
                    id: id
                },
                success: function (response) { // success : kết quả trả về sau khi gửi request ajax
                    if (response.status == true) {
                        $('#my-cart').html(response.html);
                    }
                },
                error: function (e) { // lỗi nếu có
                    console.log(e.message);
                }
            });
    }
    $(document).on("click", "#num_product", function () {

            var id = $(this).attr('data-id');
            var beforeNum = $('#product'+id).attr('data-num-product');
            var quantity = $('#product'+id).val();


        if (quantity == 0) {
            alert('Nhập số lượng phải lớn hơn 0');
            $(this).val(beforeNum);
            return false;
        }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/dat-hang/cap-nhat-gio-hang',
            type: 'GET',
            data: {
                id: id,
                quantity: quantity
            },
             dataType: "json", // kiểu dữ liệu trả về
            success: function (response) { // success : kết quả trả về sau khi gửi request ajax
                    $('#my-cart').html(response.html);
            },
            error: function (e) { // lỗi nếu có
                console.log(e.message);
            }
        });
    });
    function hideDetailP() {
        $('#modal-test').modal('hide');
    }
    function detailProductPopup(id) {

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/detail-product-popup',
            type: 'GET',
            data: {
                id: id
            },
            success: function (response) {

                if (response.status == true) {
                    $('#id_productP').val(response.product.id);

                    $('#tet').text(response.product.name);

                    $("#tet1").text(formatNumber(response.product.price, '.', ',','vnđ'));

                    $('#img_dt').attr('src', base_url+'/'+response.product.image);
                    $('#modal-test').modal('show');

                }
            },
            error: function (e) {
                console.log(e.message);
            }
        });

    }
    function formatNumber(nStr, decSeperate, groupSeperate) {
        nStr += '';
        x = nStr.split(decSeperate);
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + groupSeperate + '$2');
        }
        return x1 + x2;
    }
    function PostCheckOut() {
        var fullname = $('#fullnameCart').val();
        var phone = $('#phoneCart').val();
        var email = $('#emailCart').val();
        var address = $('#detailCart').val()+', '+$('#option-Ward').val()+', '+$('#option-District').val()+', '+$('#option-Country').val();
        var description = $('#descriptionCart').val();
        var validatorerr = true;
        if (!fullname) {
            $('#errfn').css('display','block');
            validatorerr = false;
        }
        if (!phone) {
            $('#errpn').css('display','block');
            validatorerr = false;
        }
        if (!email) {
            $('#errem').css('display','block');
            validatorerr = false;
        }
        if (!$('#detailCart').val()) {
            $('#errar').css('display','block');
            validatorerr = false;
        }
        if (!$('#option-Ward').val()){
            $('#errwr').css('display','block');
            validatorerr = false;
        }
        if (!$('#option-District').val()){
            $('#errdt').css('display','block');
            validatorerr = false;
        }
        if (!$('#option-Country').val()){
            $('#errct').css('display','block');
            validatorerr = false;
        }
        if (!validatorerr) {
            return false;
        }

        var data = {
            fullname: fullname,
            phone: phone,
            email: email,
            address: address,
            description: description
        }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/thanh-toan',
            type: 'POST',
            data: data, // dữ liệu truyền sang nếu có
            success: function (response) {
                $('#modal-checkout').modal('show')
                },
            error: function (e) {
                console.log(e.message);
            }
        });
    }
    $('#fullnameCart').change(function(){
        $('#errfn').css('display','none')
    });
    $('#phoneCart').change(function(){
        $('#errpn').css('display','none')
    });
    $('#emailCart').change(function(){
        $('#errem').css('display','none')
    });
    $('#option-Country').change(function(){
        $('#errct').css('display','none')
    });
    $('#option-District').change(function(){
        $('#errdt').css('display','none')
    });
    $('#option-Ward').change(function(){
        $('#errwr').css('display','none')
    });
    $('#detailCart').change(function(){
        $('#errar').css('display','none')
    });

