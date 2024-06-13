@extends('layouts.template')

@section('styles')
    <style>
        html,
        body {
            height: 100%;
            width: 100%;
            margin: 0;
        }

        #map {
            height: calc(100vh - 56px);
            width: 100%;
            margin: 0;
        }
    </style>
@endsection

@section('content')
    <div id="map"></div>
@endsection

@section('script')
    <script>
        //Map
        var map = L.map('map').setView([-7.0, 110.4], 12);

        // Basemap
        // Define tile layers
        var osmLayer = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        });

        var mapboxSatelliteLayer = L.tileLayer(
            'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                maxZoom: 19,
                attribution: '&copy; <a href="https://www.mapbox.com/">Mapbox</a>'
            });

        // Add default layer to the map
        osmLayer.addTo(map);

        // Create a layer control and add to the map
        var baseMaps = {
            "OpenStreetMap": osmLayer,
            "Satellite": mapboxSatelliteLayer
        };

        L.control.layers(baseMaps).addTo(map);

        /* GeoJSON Point */
        var point = L.geoJson(null, {
            pointToLayer: function(feature, latlng) {
                var markerOptions = {
                    radius: 8,
                    fillColor: getColor(feature.properties.religion),
                    color: "#000",
                    weight: 1,
                    opacity: 1,
                    fillOpacity: 0.8
                };
                return L.circleMarker(latlng, markerOptions);
            },
            onEachFeature: function(feature, layer) {
                var popupContent = "<h4>" + feature.properties.name + "</h4>" + feature.properties.description +
                    "<br>" +
                    "<img src='{{ asset('storage/images/') }}/" + feature.properties.image +
                    "'class='img-thumbnail' alt='' style='max-height: 200px;'>";
                layer.on({
                    click: function(e) {
                        point.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        point.bindTooltip(feature.properties.name);
                    },
                });
            },
        });
        $.getJSON("{{ route('api.points') }}", function(data) {
            point.addData(data);
            map.addLayer(point);
        });

        function getColor(religion) {
            switch (religion) {
                case 'Konghucu':
                    return "#ff0000"; // Red
                case 'Islam':
                    return "#00ff00"; // Green
                case 'Hindu':
                    return "#0fffff"; // Blue
                case 'Kristen':
                    return "#000fff";
                case 'Khatolik':
                    return "#964b00";
                case 'Buddha':
                    return "#fff000";
                default:
                    return "#000000";
            }
        }


        /* GeoJSON Line */
        var polyline = L.geoJson(null, {
            /* Style polyline */
            style: function(feature) {
                return {
                    color: "#ff0000",
                    weight: 1,
                    opacity: 1,
                };
            },
            onEachFeature: function(feature, layer) {
                var popupContent = "<h4>" + feature.properties.name + "</h4>" + feature.properties.description;
                layer.on({
                    click: function(e) {
                        polyline.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        polyline.bindTooltip(feature.properties.name, {
                            sticky: true,
                        });
                    },
                });
            },
        });
        $.getJSON("{{ route('api.polylines') }}", function(data) {
            polyline.addData(data);
            map.addLayer(polyline);
        });

        /* GeoJSON Polygon */
        var polygon = L.geoJson(null, {
            /* Style polygon */
            style: function(feature) {
                return {
                    color: "#fff000",
                    fillColor: "#fff000",
                    weight: 2,
                    opacity: 1,
                    fillOpacity: 0.2,
                };
            },
            onEachFeature: function(feature, layer) {
                var popupContent = "Name: " + feature.properties.name + "<br>" + "Deskripsi: " + feature
                    .properties.description + "<br>" +
                    "Foto: <img src='{{ asset('storage/images/') }}/" + feature.properties.image +
                    "'class='img-thumbnail' alt=''>";
                layer.on({
                    click: function(e) {
                        polygon.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        polygon.bindTooltip(feature.properties.name, {
                            sticky: true,
                        });
                    },
                });
            },
        });
        $.getJSON("{{ route('api.polygons') }}", function(data) {
            polygon.addData(data);
            map.addLayer(polygon);
        });

        /* GeoJSON Admin */
        var admin = L.geoJson(null, {
            onEachFeature: function(feature, layer) {
                var popupContent = feature.properties.kab_kota;
                layer.on({
                    click: function(e) {
                        admin.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        admin.bindTooltip(feature.properties.kab_kota);
                    },
                });
            },
        });
        $.getJSON("{{ route('api.admin') }}", function(data) {
            admin.addData(data);
            map.addLayer(admin);
        });

        //Layer Controls
        var overlayMaps = {
            "Point": point,
            "Polyline": polyline,
            "Polygon": polygon,
            "Administrasi": admin
        };

        var layerControl = L.control.layers(null, overlayMaps, {
            collapsed: false
        }).addTo(map);
    </script>
@endsection
