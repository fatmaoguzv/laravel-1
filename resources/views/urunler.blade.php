@include('_header')
<div class="container-fluid py-5">
    <div class="container py-5">
        <h1 class="mb-4">Ürünler</h1>
        
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Başlık</th>
                        <th>İçerik</th>
                        <th>Görsel</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($veriler as $veri)
                    <tr>
                        <td>{{ $veri->baslik }}</td>
                        <td>{{ Str::limit($veri->icerik, 50) }}</td>
                        <td>
                            @if($veri->gorsel)
                                <img src="{{ asset('images/' . $veri->gorsel) }}" alt="{{ $veri->baslik }}" width="50">
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <a href="/urun-guncelle/{{ $veri->id }}" class="btn btn-warning btn-sm">Güncelle</a>
                            <a href="/urun-sil/{{ $veri->id }}" class="btn btn-danger btn-sm" onclick="return confirm('Silmek istediğinize emin misiniz?')">Sil</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-3">
             <a href="/urun-ekle" class="btn btn-primary">Yeni Ürün Ekle</a>
        </div>
    </div>
</div>
@include('_footer')
