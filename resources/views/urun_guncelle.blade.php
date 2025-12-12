@include('_header')
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ürün Güncelle</div>
                    <div class="card-body">
                        <form action="/urun-guncelle/{{ $veri->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="baslik" class="form-label">Başlık</label>
                                <input type="text" class="form-control" id="baslik" name="baslik" value="{{ $veri->baslik }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="icerik" class="form-label">İçerik</label>
                                <textarea class="form-control" id="icerik" name="icerik" rows="3" required>{{ $veri->icerik }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="gorsel" class="form-label">Görsel (Değiştirmek istemiyorsanız boş bırakın)</label>
                                <input type="file" class="form-control" id="gorsel" name="gorsel" accept=".jpg,.jpeg,.png">
                                @if($veri->gorsel)
                                    <div class="mt-2">
                                        <img src="{{ asset('images/' . $veri->gorsel) }}" alt="Mevcut Görsel" width="100">
                                        <small class="d-block text-muted">Mevcut Görsel</small>
                                    </div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Güncelle</button>
                            <a href="/urunler" class="btn btn-secondary">İptal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('_footer')
