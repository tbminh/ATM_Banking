@extends('layout.layout_admin')
@section('title', 'Quản lý phòng giao dịch')
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
                            <li class="breadcrumb-item active">Quản lý phòng giao dịch</li>
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
                               QUẢN LÝ PHÒNG GIAO DỊCH
                            </h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-1">

                            <style>
                                #map {
                                    height: 300px;
                                    width:100%;

                                    overflow: hidden;

                                }

                                .controls {
                                    background-color: #fff;
                                    border-radius: 2px;
                                    border: 1px solid transparent;
                                    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
                                    box-sizing: border-box;
                                    font-family: Roboto;
                                    font-size: 15px;
                                    font-weight: 300;
                                    height: 29px;
                                    margin-left: 17px;
                                    margin-top: 10px;
                                    outline: none;
                                    padding: 0 11px 0 13px;
                                    text-overflow: ellipsis;
                                    width: 400px;
                                }

                                .controls:focus {
                                    border-color: #4d90fe;
                                }

                                .title {
                                    font-weight: bold;
                                }

                                #infowindow-content {
                                    display: none;
                                }

                                #map #infowindow-content {
                                    display: inline;
                                }
                            </style>

                            <div class="card" >
                                <div class="card-body">
                                    <div style="display: none">
                                        <input
                                            id="pac-input"
                                            class="controls"
                                            type="text"
                                            placeholder="Enter a location"
                                        />
                                    </div>
                                    <div id="map"></div>
                                    <div id="infowindow-content">
                                        <span id="place-name" class="title"></span><br />
                                        <strong>Place ID:</strong> <span id="place-id"></span><br />
                                        <span id="place-address"></span>
                                    </div>
                                    <form method="post" action="{{url('/page-admin/phonggiaodich/update')}}">
                                        @csrf
                                        <div class="form-group">
                                            <label for=""> Tên phòng giao dịch:</label>
                                            <input type="text" name="trans_name" class="form-control" id="trans_name" placeholder="Nhập tên phòng giao dịch" >
                                            <div class="invalid-feedback">Vui lòng nhập tên phòng giao dịch!</div>
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
                                        <div class="form-group">
                                            <label for="">Địa chỉ</label>
                                            <input type="text" name="trans_address" class="form-control" id="trans_address" placeholder="Nhập địa chỉ" >
                                            <div class="invalid-feedback">Vui lòng nhập địa chỉ!</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Place id</label>
                                            <input type="text" name="place_id" class="form-control" id="place_id" placeholder="" >

                                        </div>
                                        <div class="form-group">
                                            <label for="">Số điện thoại </label>
                                            <input type="text" name="trans_number" class="form-control" id="trans_number" placeholder="" >

                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" id="latitude" name="latitude">
                                            <input type="hidden" id="longtitude" name="longtitude">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                                    </form>
                                </div>
                            </div>

                            <script>
                                function initMap() {

                                    const map = new google.maps.Map(
                                        document.getElementById("map"),
                                        {
                                            center: { lat: -33.8688, lng: 151.2195 },
                                            zoom: 13,
                                        }
                                    );


                                    const input = document.getElementById("pac-input");

                                    // Specify just the place data fields that you need.
                                    const autocomplete = new google.maps.places.Autocomplete(input, {
                                        fields: ["place_id", "geometry", "formatted_address", "name"],
                                    });

                                    autocomplete.bindTo("bounds", map);

                                    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

                                    let infowindow = new google.maps.InfoWindow();
                                    const infowindowContent = document.getElementById(
                                        "infowindow-content"
                                    );

                                    infowindow.setContent(infowindowContent);

                                    const marker = new google.maps.Marker({ map: map });

                                    marker.addListener("click", (e) => {

                                        infowindow.open(map, marker);
                                    });

                                    autocomplete.addListener("place_changed", (e) => {
                                        infowindow.close();

                                        const place = autocomplete.getPlace();

                                        if (!place.geometry || !place.geometry.location) {
                                            return;
                                        }

                                        if (place.geometry.viewport) {
                                            map.fitBounds(place.geometry.viewport);
                                        } else {
                                            map.setCenter(place.geometry.location);
                                            map.setZoom(17);
                                        }

                                        // Set the position of the marker using the place ID and location.
                                        // @ts-ignore This should be in @typings/googlemaps.
                                        marker.setPlace({
                                            placeId: place.place_id,
                                            location: place.geometry.location,
                                        });

                                        marker.setVisible(true);

                                        (
                                            infowindowContent.children.namedItem("place-name")
                                        ).textContent = place.name;
                                        (
                                            infowindowContent.children.namedItem("place-id")
                                        ).textContent = place.place_id;
                                        (
                                            infowindowContent.children.namedItem("place-address")
                                        ).textContent = place.formatted_address;



                                        infowindow.open(map, marker);
                                        console.log(infowindowContent.children)
                                        document.getElementById('trans_name').value = infowindowContent.children.namedItem("place-name").innerHTML;
                                        document.getElementById('trans_address').value = document.getElementById('pac-input').value;
                                        document.getElementById('place_id').value = infowindowContent.children.namedItem("place-id").innerHTML;
                                        document.getElementById('latitude').value = place.geometry.location.lat();
                                        document.getElementById('longtitude').value = place.geometry.location.lng();

                                    });
                                }
                            </script>
                            <script
                                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDacd2RibeStMFpb4xOdQk2Gg5Gk-CjJoc&callback=initMap&libraries=places&v=weekly"
                                defer
                            ></script>


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
                                    <th width="25%">Tên phòng giao dịch</th>
                                    <th width="40%">Địa chỉ</th>
                                    <th width="20%">Số điện thoại</th>
                                    <th width="10%">Tùy chọn</th>

                                </tr>
                                </thead>
                                <tbody id="tbody-table">
                                    @foreach($trans as $key=>$data)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$data->trans_name}}</td>
                                            <td>{{$data->trans_address}}</td>
                                            <td>{{$data->trans_phone}}</td>
                                            <td>
                                                <a href="{{url('/page-admin/phonggiaodich/delete/'.$data->id)}}"
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



