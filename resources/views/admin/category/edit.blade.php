@extends('admin.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Sửa - Danh mục
            <small><a href="{{ route('admin.category.index') }}">Danh sách</a></small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin danh mục</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <form role="form" action="{{  route('admin.category.update', ['id' => $category->id ])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">

                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-warning"></i> Lỗi!</h4>
                                    @foreach($errors->all() as $val)
                                        <p>{{ $val }}</p>
                                    @endforeach
                                </div>
                            @endif

                            <div class="form-group">
                                <label>Danh mục cha</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">-- Chọn --</option>
                                    @foreach($all_categories as $item)
                                        <option {{ ($category->parent_id == $item->id) ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input value="{{ $category->name }}" type="text" class="form-control" id="name"
                                       name="name" placeholder="Nhập tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Thay đổi ảnh</label>
                                <input type="file" id="new_image" name="new_image" ><br>

                                @if ($item->image)
                                    <img src="{{ asset($category->image)}} " width="200">
                                @endif
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input {{ ($category->is_active) ? 'checked' : '' }} type="checkbox" value="1"
                                           name="is_active"> Trạng thái
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Vị trí</label>
                                <input value="{{ $category->position }}" type="number" class="form-control" id="position"
                                       name="position" placeholder="Nhập tên vị trí">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->


            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
@endsection
