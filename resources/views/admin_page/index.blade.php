@extends('layout.layout_admin')
@section('content_admin')

    <div class="content-wrapper">

        <section class="content">

<script>
    function initMap() {
        console.log("initMap");
        const map = new google.maps.Map(
            document.getElementById("map"),
            {
                center: { lat: -33.8688, lng: 151.2195 },
                zoom: 13,
            }
        );

    console.log(map);
    const input = document.getElementById("pac-input");


        </section>

    </div>
@endsection
