@extends('admin.component.layout')

@push('customCSS')
<link rel="stylesheet" href="{{asset('admin/css/plugins/switchery/switchery.css')}}">
@endpush


@section('content')

    <x-admin.breadcrumb title="Quản lý thành viên"
        name2="Thành viên"
        name3="Danh sách thành viên"
        route1="admin.dashboard"
        route2="admin.user.index"
        route3="admin.user.index"
        />
    {{-- <div class="wrapper wrapper-content"> --}}
        
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        
                        <div class="ibox-title">
                            <h5>{{ config('apps.user.tableHeading') }}</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="filter-wrapper">
                                <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                    <div class="perpage">
                                        <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                            <select name="perpage" class="form-control input-sm perpage filter-wrapper mr10" id="">
                                                @for ($i = 20; $i<=200;$i+=20)
                                                    <option value="{{$i}}">{{$i}} bản ghi</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="action">
                                        <div class="uk-flex uk-flex-middle">
                                            <div class="uk-search uk-flex uk-flex-middle mr5">
                                                <select name="user_catelogue_id" id="" class="form-control">
                                                    <option value="0" selected>Chọn nhóm thành viên</option>
                                                    <option value="1">Quản trị viên</option>
                                                    <option value="2">Khách hàng</option>
                                                </select>
                                            </div>
                                            <div class="uk-search uk-flex uk-flex-middle mr5">
                                                <div class="input-group">
                                                    <input type="text" name="keyword" placeholder="Nhập từ khóa bạn tìm kiếm..." class="form-control">
                                                    <span class="input-group-btn">
                                                        <button type="submit" name="search" value="search" class="btn btn-success btn-sm">Tìm kiếm</button>
                                                    </span>
                                                </div>
                                            </div>
                                            <a href="{{route('admin.user.create')}}" class="btn btn-primary"><i class="fa fa-plus">Thêm mới thành viên</i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table id="user_table" class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox" id="checkAll" class="input-checkbox">
                                        </th>
                                        <th>ID</th>
                                        <th>Họ tên</th>
                                        <th>Hình ảnh</th>
                                        <th>Số điện thoại</th>
                                        <th class="text-center">Tình trạng</th>
                                        <th class="text-center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                <input type="checkbox" id="checkAll" class="input-checkbox">
                                            </td>
                                            <td>{{$user->id}}</td>
                                            <td>
                                                <div class="user-item">{{$user->name}}</div>
                                            </td>
                                            <td>
                                                <div class="user-item"><img src="{{$user->image}}" alt="" width="50px"></div>
                                            </td>
                                            <td>{{$user->phone}}</td>
                                            <td class="text-center">
                                                <input type="checkbox" class="js-switch" checked>
                                            </td>
                                            <td class="text-center">
                                                <a href="" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                                <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            
                            {{ $users->links('pagination::bootstrap-4')}}

                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    {{-- </div> --}}
@endsection

@push('customJS')

    <script src="{{asset('admin/js/plugins/switchery/switchery.js')}}"></script>
    <script>
        $().ready(function(){
            var siwtchs = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
            siwtchs.forEach(function(e) {
                var switchery = new Switchery(e, { color: '#1AB394' });
            });
        })
        
    </script>

@endpush