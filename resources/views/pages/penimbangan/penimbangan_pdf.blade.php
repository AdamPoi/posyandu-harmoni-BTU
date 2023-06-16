<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Penimbangan Posyandu Harmoni - BTU</title>
</head>

<body>
    <style type="text/css">
        .table-bordered {
            border: 1px solid #000000;
            border-collapse: collapse;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #000000;
            text-align: center;
            padding: 8px; /* Atur jarak pada teks dalam tabel */
        }

        .table .tanggal {
              text-align: left; /* Mengatur teks di sebelah kiri untuk kolom tanggal */
              white-space: nowrap; /* Mencegah pemutaran teks ke bawah (terlalu panjang) */
        }
    </style>
    <center>
        <h5>Laporan Data Penimbangan Posyandu Harmoni - BTU</h4>
    </center>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Balita</th>
                <th>Usia</th>
                <th>Berat Badan</th>
                <th>Tinggi Badan</th>
                <th>Tanggal</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($penimbangans as $penimbangan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $penimbangan->balita->nama }}</td>
                    <td>{{ $penimbangan->balita->usia }}</td>
                    <td>{{ $penimbangan->berat_badan }}</td>
                    <td>{{ $penimbangan->tinggi_badan }}</td>
                    <td>{{ $penimbangan->tanggal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
