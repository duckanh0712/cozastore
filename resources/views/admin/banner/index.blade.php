@extends('admin.layouts.main')
@section('content')
<section class="content-header">
    <h1>
        Danh Sách Banner
        <small><a href="{{route('admin.banner.create')}}">Thêm mới</a></small>
    </h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-tools">
                        <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right"
                                   placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>Tên Thương Hiệu</th>
                            <th>Hình ảnh</th>
                            <th>Url</th>
                            <th>Vị trí</th>
                            <th>Trạng thái</th>
                            <th class="text-center">Hành động</th>
                        </tr>
                        </tbody>
                        <!-- Lặp một mảng dữ liệu pass sang view để hiển thị -->
                        @foreach($data as $key => $item)
                            <tr class="item-{{ $item->id }}"> <!-- Thêm Class Cho Dòng -->
                                <td>{{ $item->title }}</td>
                                <td>
                                @if ($item->image) <!-- Kiểm tra hình ảnh tồn tại -->
                                    <img src="{{asset($item->image)}}" width="240" height="120">
                                    @endif
                                </td>
                                <td width="200">{{ $item->url }}</td>
                                <td>{{ $item->position }}</td>
                                <td>{{ ($item->is_active == 1) ? 'Hiển thị' : 'Ẩn' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.product.edit', ['id'=> $item->id]) }}" class="btn btn-flat btn-info">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-flat btn-danger" onclick="destroyModel('banner', {{ $item->id }})" >
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin">
                        {{$data->links()}}
                    </ul>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </div>>
</section>
@endsection

