@include('_header')
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row g-4 mb-5">
            <div class="col-lg-8 col-xl-9">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="border rounded">
                            <a href="#">
                                @if($veri->gorsel)
                                    <img src="{{ asset('images/' . $veri->gorsel) }}" class="img-fluid rounded" alt="{{ $veri->baslik }}">
                                @else
                                    <img src="{{ asset('img/fruite-item-5.jpg') }}" class="img-fluid rounded" alt="Image">
                                @endif
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h4 class="fw-bold mb-3">{{ $veri->baslik }}</h4>
                        <p class="mb-3">Kategori: Meyve</p> <!-- Kategori dinamik değilse statik kalabilir -->
                        <h5 class="fw-bold mb-3">3.35 $</h5> <!-- Fiyat dinamik değilse statik -->
                        <div class="d-flex mb-4">
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <p class="mb-4">{{ $veri->icerik }}</p>
                        <a href="#" class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Sepete Ekle</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('_footer')
