@extends('admin.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Cấu hình website
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th>Tên Công ty</th>
                                <th>{{$setting->company}}</th>
                            </tr>
                            <tr>
                                <th>Logo</th>
                                <th style="background: #0b93d5;">@if ($setting->image)
                                        <img src="{{ asset($setting->image) }}" >
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <th>SĐT</th>
                                <th>{{$setting->phone}}</th>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <th>{{$setting->email}}</th>
                            </tr>
                            <tr>
                                <th>Địa chỉ</th>
                                <th>{{$setting->address}}</th>
                            </tr>
                            <tr>
                                <th>Địa chỉ Facebook</th>
                                <th>{{$setting->facebook}}</th>
                            </tr>
                            <tr>
                                <th>Giới thiệu</th>
                                <th>{{$setting->introduce}}</th>
                            </tr>
                            </tbody>
                                <tr colspan="2">

                                    <th class="text-center">
                                        <a href="{{route('admin.setting.edit',['id' => $setting->id])}}" class="btn btn-flat btn-info">
                                            <i class="fa fa-edit">Sửa</i>
                                        </a>
                                    </th>
                                </tr>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin">

                        </ul>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
@endsection
