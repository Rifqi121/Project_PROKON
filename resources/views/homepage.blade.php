@extends('app')

@section('content')


<!-- Flip Container -->
<div class="flip-container position-relative h-100 w-100" style="perspective: 1000px;">
    <!-- Flip Inner -->
    <div class="flip-inner h-100 w-100"
        style="transition: transform 0.6s; transform-style: preserve-3d; position: relative;">
        <!-- Front Side -->
        <div class="flip-front position-absolute top-0 start-0 h-100 w-100"
            style="background-color: #2A332E; backface-visibility: hidden;">
            <img src="{{ asset('image/Masjid_Al-ukhuwwah2.jpg') }}" class="card-img h-100 w-100" alt="Masjid Image">
            <div class="card-img-overlay d-flex flex-column justify-content-between p-5">
                <h1 class="card-title" style="color:#FBFADA">Yayasan Al-Ukhuwwah</h1>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="col-8">
                        <a href="{{ route('layanan') }}" class="btn p-3 flip-btn" style="background-color: #2A332E; color:#FBFADA">Pelajari Lebih
                            Lanjut</a>
                    </div>
                    <a href="https://maps.app.goo.gl/PHSQQayoAEWWQXwQ9" class="text-decoration-none col-4">
                        <div class="text-end" style="color:#FBFADA">
                            <span>Silahkan klik untuk membuka maps</span>
                            <h6>Komplek GBA Barat RW 14 – Desa Lengong- Bojongsoang</h6>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

</script>
@endsection
