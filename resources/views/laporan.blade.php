@extends('app')

@section('content')
    <div class="card h-100" style="background-color: #2A332E;">
        <div class="p-4">
            <h2 style="font-size: 1.5rem; font-weight: bold; color: #FBFADA; margin-bottom: 1.5rem;">Laporan</h2>
            <div style="padding: 1rem; border-radius: 10px;">
                <div class="row justify-content-center g-3 pt-md-3">
                    <!-- Button Card: Infaq & Shodaqoh -->
                    <div class="col-12">
                        <a href="{{ route('infaq-shodaqoh') }}" class="text-decoration-none">
                            <div class="card text-center p-3 hover-effect"
                                style="border: 1px solid #FBFADA; border-radius: 10px; cursor: pointer;">
                                <span>Infaq & Shodaqoh</span>
                            </div>
                        </a>
                    </div>

                    <!-- Button Card: Zakat -->
                    <div class="col-12">
                        <a href="{{ route('zakat') }}" class="text-decoration-none">
                            <div class="card text-center p-3 hover-effect"
                                style="border: 1px solid #FBFADA; border-radius: 10px; cursor: pointer;">
                                <span>Zakat</span>
                            </div>
                        </a>
                    </div>

                    <!-- Button Card: Kematian -->
                    <div class="col-12">
                        <a href="{{ route('kematian') }}" class="text-decoration-none">
                            <div class="card text-center p-3 hover-effect"
                                style="border: 1px solid #FBFADA; border-radius: 10px; cursor: pointer;">
                                <span>Kematian</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
