@extends('layout.layout_admin')
@section('title','Trang chủ quản trị')

@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Bảng điều khiển</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection


@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        @php($get_posts = DB::table('posts')->count())
                        <div class="inner"><h3>{{$get_posts}} POSTS</h3>
                            <p>Tổng số bài viết</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">Xem thêm<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            @php($get_cate = DB::table('categories')->count())
                            <h3>{{$get_cate}} Category</h3>
                            <p>Số thể loại</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            @php($get_user = DB::table('users')->count())
                            <h3>{{$get_user}} User</h3>
                            <p>Số người dùng</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">Xem thêm<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>Total</h3>
                            <p>Tổng doanh thu</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->

            <!-- Main row -->
            <div class="row">
                <section class="col-lg-12 connectedSortable">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                BÀI VIẾT MỚI NHẤT
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-1">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tác Giả</th>
                                        <th>Loại Bài Viết</th>
                                        <th>Tiêu Đề</th>
                                        <th>Nội Dung</th>
                                        <th>Trạng thái</th>
                                        <th scope="col" colspan="3">Tùy chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($get_post as $key => $data)
                                        <tr>
                                            <td>{{++$key}} </td>
                                            <td>
                                                @php($get_user = DB::table('users')->where('id',$data->author)->first())
                                                {{$get_user->full_name}}
                                            </td>
                                            <td>
                                                @php($get_cate = DB::table('categories')->where('id',$data->cate_id)->first())
                                                {{$get_cate->cate_name}}
                                            </td>
                                            <td>
                                                {{$data->title}}
                                            </td>
                                            <td> {{substr($data->content,0,100)."....."}} </td>
                                            <td>
                                                @if ($data->post_status == 0)
                                                    <b style="color: red;"> Chưa duyệt</b>
                                                @else
                                                    <b style="color: green;">Đã duyệt</b>
                                                @endif
                                            </td>
                                            @if ($data->post_status == 0)
                                            <td>
                                                <a class="btn btn-success btn-sm" href=" {{url('check-post/'.$data->id)}} ">
                                                    <i class="fa fa-check"></i> Duyệt
                                                </a>
                                            </td>
                                        @else
                                            <td>
                                                <a class="btn btn-danger btn-sm" href=" {{url('cancel-post/'.$data->id)}} ">
                                                    <i class="fa fa-trash"></i> Hủy
                                                </a>
                                            </td>
                                        @endif
                                        <td>
                                            <a class="btn btn-danger btn-sm" href=" {{url('delete-post/'.$data->id)}} "  onclick="return confirm('Bạn có chắc muốn xóa không?');">
                                                <i class="fa fa-trash"></i> Xóa
                                            </a>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#edit{{ $data->id }}">
                                                <i class="fas fa-edit"></i> Đổi
                                            </button>
                                        </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
            </div>
            <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection