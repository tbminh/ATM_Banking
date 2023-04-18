@extends('layout.layout_admin')
@section('title', 'Quản lý thẻ atm')
@section('content_admin')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('page-admin')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Quản lý thẻ atm</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-12 connectedSortable">

                <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                               QUẢN LÝ THẺ ATM
                            </h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-1">

                            <div class="card" >
                                <div class="card-body">
                                    <form method="post" action="{{url('/page-admin/theatm/update')}}">
                                        @csrf
                                        <div class="form-group">
                                            <label for=""> Tên thẻ atm:</label>
                                            <input type="text" name="card_name" class="form-control" id="card_name" placeholder="Nhập tên thẻ atm" >

                                        </div>
                                        <div class="form-group">
                                            <label for="">Ngân hàng:</label>
                                            <select class="form-control" name="bank_id" id="bank_id">
                                                <option value="">Chọn</option>
                                                @foreach($banks as $key=>$data)
                                                    <option value="{{$data->id}}">{{$data->bank_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                                    </form>
                                </div>
                            </div>

                            @if ($message = Session::get('message'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            <table class="table">
                                <thead>
                                <tr>
                                    <th width="5%">STT</th>
                                    <th width="25%">Tên thẻ atm</th>
                                    <th width="10%">Tùy chọn</th>

                                </tr>
                                </thead>
                                <tbody id="tbody-table">
                                    @foreach($cards as $key=>$data)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$data->card_name}}</td>
                                            <td>
                                                <a href="{{url('/page-admin/theatm/delete/'.$data->id)}}"
                                                   title="Xóa" data-id="{{$data->id}}" class="btn btn-danger btn-delete btn-xs" onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
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
        </section>
    </div>

    <!-- Modal -->

@endsection



@section('script')
    <script src="{{url('resources/js/nganhang.js')}}"></script>
@endsection



