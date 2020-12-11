@extends('shop.layouts.main')
@section('content')
    <form role="form" action="{{route('guimail')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <button type="submit" class="btn btn-primary">Gửi</button>
        </div>
    </form>
@endsection

