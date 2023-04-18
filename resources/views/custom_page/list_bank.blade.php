<html>
  <head>
    <title>Hệ Thống Phòng Giao Dịch - Trụ ATM địa bàng TPCT</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
  </head>
  <body>
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        #container {
            height: 100%;
            display: flex;
        }

        #sidebar {
            flex-basis: 15rem;
            flex-grow: 1;
            padding: 1rem;
            max-width: 30rem;
            height: 100%;
            box-sizing: border-box;
            overflow: auto;
        }

        #map {
            flex-basis: 0;
            flex-grow: 4;
            height: 100%;
        }

        #floating-panel {
            z-index: 5;
            background-color: #fff;
            position: absolute !important;
            left: 420px !important;
            top: 10px !important;
            border-radius: 5px;
        }

        #sidebar {
            flex: 0 1 auto;
            padding: 0;
        }
        #sidebar > div {
            padding: 0.5rem;
        }
        .image-page{
            padding: 0 !important;
            position: relative;
        }
        .image-res{
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            width: 100%;
            height: 400px;
        }
        .title{
            position: absolute;
            top: 40px;
            right: 500px;
            color: white;
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

    <div class="image-page text-center">
        <img src="{{ url('public/upload/list_bank.jpg') }}" class="image-res">
        <div class="title">
            <h1>Địa điểm các phòng giao dịch</h1>
            <p>Trụ ATM địa bàng Thành Phố Cần Thơ</p>
        </div>
    </div>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <img src="{{ url('public/upload/icon_bank.png') }}" width="50px" height="50px" style="margin-right: 10px;">
        <a class="navbar-brand" href="{{ url('/') }}">Trang Chủ</a>
        <a class="navbar-brand" href="{{ url('list-bank') }}">
            Phòng giao dịch & trụ ATM
        </a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="navbar-brand" href="{{ url('/page-login') }}">
                    <i class="fa fa-sign-in" aria-hidden="true"> Đăng nhập</i> 
                </a>
            </li>
        </ul>
    </nav>

    <div id="container">
        <div id="floating-panel">
            <div style="display: flex; width: 350px;">
                <div style="width:100px;font-weight:500;padding: 10px;">Ngân điểm:</div>
                <select id="end" class="form-control form-control-sm">
                    <option value="">------------ Chọn ngân hàng ------------</option>
                    @php($get_place = DB::table('banks')->get())
                    @foreach ($get_place as $data)
                        <option value="{{ $data->bank_address }}">{{ $data->bank_address }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div id="map"></div>
        <div id="sidebar"></div>
    </div>

    <!--
     The `defer` attribute causes the callback to execute after the full HTML
     document has been parsed. For non-blocking uses, avoiding race conditions,
     and consistent behavior across browsers, consider loading using Promises
     with https://www.npmjs.com/package/@googlemaps/js-api-loader.
    -->

    <script>

        function addvalue(){
            document.getElementById('start').value = document.getElementById('start-show').value
        }

        function initMap() {

            const map = new google.maps.Map(
                document.getElementById("map"),
                {
                    zoom: 15,
                    center: { lat: 10.045162, lng: 105.746857 },
                    disableDefaultUI: true,
                }
            );

            const input = document.getElementById("start");

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



});


            const directionsRenderer = new google.maps.DirectionsRenderer();
            const directionsService = new google.maps.DirectionsService();


            directionsRenderer.setMap(map);
            directionsRenderer.setPanel(
                document.getElementById("sidebar")
            );

            const control = document.getElementById("floating-panel");

            map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);

            const onChangeHandler = function () {
                calculateAndDisplayRoute(directionsService, directionsRenderer);
            };

            // (document.getElementById("start")).addEventListener(
            //     "change",
            //     onChangeHandler
            // );
            (document.getElementById("end")).addEventListener(
                "change",
                onChangeHandler
            );
        }


        function calculateAndDisplayRoute(directionsService, directionsRenderer) {
            const start = document.getElementById("start").value;
            const end = document.getElementById("end").value;

            directionsService.route({
                origin: start,
                destination: end,
                travelMode: google.maps.TravelMode.DRIVING,
            }).then((response) => {
                directionsRenderer.setDirections(response);
            }).catch((e) => window.alert("Vui lòng chọn điểm đến"));
        }
    </script>

    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDacd2RibeStMFpb4xOdQk2Gg5Gk-CjJoc&libraries=places&callback=initMap&v=weekly"
      defer
    ></script>
  </body>
</html>

