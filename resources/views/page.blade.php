@extends('layouts.template')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css">
    <style>
        html,
        body {
            height: 100%;
            width: 100%;
            margin: 0;
            background-color: rgb(96, 49, 10);
        }

        .text-body-secondary {
            color: white !important;
        }

        #map {
            height: calc(100vh - 56px);
            width: 100%;
            margin: 0;
        }

        .card-img-top-container {
            height: 350px;
            /* Atur tinggi gambar yang diinginkan */
            overflow: hidden;
        }

        .card-img-top {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
@endsection

@section('content')
    <main>

        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-bold" style="color: white;">GIWIS: Geographic Information of Worship in Kota Semarang</h1>
                    <p class="lead text-body-secondary">WebGIS interaktif untuk eksplorasi persebaran
                        tempat ibadah agama
                        Islam, Kristen, Katholik, Hindu, Buddha, dan Konghucu di Kota Semarang. </p>
                    <p>
                        <a class="btn btn-warning my-2" href="{{ route('map') }}">Peta Interaktif</a>
                    </p>
                </div>
            </div>
        </section>

        <div class="album py-5 bg-body-tertiary">
            <div class="container">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-img-top-container">
                                <img src="https://imgcdn.solopos.com/@space/2022/04/majt-.jpg" class="card-img-top"
                                    alt="Gambar">
                            </div>
                            <div class="card-body" style="height: 100px;">
                                <p class="card-text">Masjid merupakan tempat ibadah bagi umat Islam untuk menjalankan ibadah
                                    salat, mendengarkan khutbah, dan melakukan kegiatan keagamaan lainnya.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-img-top-container">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6e/Exterior_of_Blenduk_Church%2C_Semarang%2C_2014-06-18.jpg/1280px-Exterior_of_Blenduk_Church%2C_Semarang%2C_2014-06-18.jpg"
                                    class="card-img-top" alt="Gambar">
                            </div>
                            <div class="card-body" style="height: 100px;">
                                <p class="card-text">Gereja Kristen adalah tempat ibadah umat Kristen Protestan untuk melaksanakan
                                    kebaktian, ceramah, dan kegiatan keagamaan lainnya.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-img-top-container">
                                <img src="https://asset-2.tstatic.net/tribunjatengwiki/foto/bank/images/gereja-gedangan.jpg"
                                    class="card-img-top" alt="Gambar">
                            </div>
                            <div class="card-body" style="height: 100px;">
                                <p class="card-text">Katedral adalah gereja utama dalam suatu keuskupan atau diocesis
                                    Katolik Roma.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-img-top-container">
                                <img src="https://pariwisata.semarangkota.go.id/backend/web/upload/wisata/1703052253_girinatha.jpg"
                                    class="card-img-top" alt="Gambar">
                            </div>
                            <div class="card-body" style="height: 100px;">
                                <p class="card-text">Pura adalah tempat ibadah umat Hindu untuk memuja para dewa dan
                                    melaksanakan upacara keagamaan.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-img-top-container">
                                <img src="https://airport.id/wp-content/uploads/2014/10/Vihara-Buddhagaya-Watugong-Semarang.jpg"
                                    class="card-img-top" alt="Gambar">
                            </div>
                            <div class="card-body" style="height: 100px;">
                                <p class="card-text">Vihara adalah tempat ibadah umat Buddha untuk melakukan ritual,
                                    meditasi, dan kegiatan keagamaan lainnya.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-img-top-container">
                                <img src="https://asset.kompas.com/crops/wMOd5bqpmKkLYdsN73sHic2pEDw=/12x0:1146x756/750x500/data/photo/2021/02/13/6026cd2f57d6d.jpg"
                                    class="card-img-top" alt="Gambar">
                            </div>
                            <div class="card-body" style="height: 100px;">
                                <p class="card-text">Klenteng adalah tempat ibadah umat Konghucu untuk memuja leluhur dan
                                    melaksanakan upacara keagamaan. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
