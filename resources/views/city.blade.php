<!DOCTYPE html>
<html lang="tr">
<head>
    <title>{{ $sehir_adi }} Bilgileri</title>
    <style>
        .sehir-listesi {
            list-style-type: none;
            padding: 0;
            column-count: 3; /* Listeyi 3 sütuna ayırır */
            max-width: 800px;
            margin: 20px auto;
        }
        .sehir-listesi li {
            padding: 5px 0;
            border-bottom: 1px dotted #ccc;
        }
    </style>
</head>
<body>
    <h1>Şehir Plaka Sorgulama</h1>
    
    <p>Girilen Plaka Kodu: <strong>{{ $sehir_id }}</strong></p>
    
    <h2 style="color: purple;">Karşılığı: {{ $sehir_adi }}</h2>
    
    <hr>
    
    <h2>Türkiye'deki Tüm Plaka Kodları (81 İl)</h2>
    
    <ul class="sehir-listesi">
        @foreach ($tum_sehirler as $plaka_kodu => $adi)
            <li>
                <strong>{{ $plaka_kodu }}</strong> - {{ $adi }}
            </li>
        @endforeach
    </ul>
</body>
</html>