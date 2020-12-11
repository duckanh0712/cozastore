@extends('admin.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Sửa
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <form role="form" action="{{ route('admin.setting.update' ,['id' => $setting->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">

                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-warning"></i> Lỗi!</h4>
                                    @foreach($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="">Tên công ty</label>
                                <input type="text" class="form-control" id="company" name="company" value="{{$setting->company}}">
                            </div>
                            <div class="form-group">
                                <label for="">Logo</label>
                                <input type="file" id="image" name="image">
                                @if ($setting->image)
                                    <img src="{{asset($setting->image)}}" width="200">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Địa chỉ</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{$setting->address}}">
                            </div>
                            <div class="form-group">
                                <label for="">SĐT</label>
                                <input type="number" class="form-control" id="phone" name="phone" value="{{$setting->phone}}">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{$setting->email}}">
                            </div>
                            <div class="form-group">
                                <label for="">Địa chỉ Facebook</label>
                                <input type="text" class="form-control" id="facebook" name="facebook" value="{{$setting->facebook}}">
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <label for="">Youtube</label>--}}
{{--                                <input type="text" class="form-control" id="name" name="name" value="{{$setting->youtube}}">--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <label for="">Giới thiệu</label>
                                <textarea type="text" class="form-control" id="introduce" name="introduce" value="{{$setting->introduce}}"></textarea>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
