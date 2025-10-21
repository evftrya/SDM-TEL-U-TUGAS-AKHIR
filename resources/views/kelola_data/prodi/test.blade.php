<!DOCTYPE html>
<html>

    <head>
        <title>Test Prodi Create</title>
    </head>

    <body>
        <h1>Test Create Prodi Page</h1>
        <p>Jumlah Fakultas: {{ count($fakultas) }}</p>

        @if (count($fakultas) > 0)
            <ul>
                @foreach ($fakultas as $fak)
                    <li>{{ $fak->nama_fakultas }}</li>
                @endforeach
            </ul>
        @else
            <p>Tidak ada fakultas. Silakan tambahkan fakultas terlebih dahulu.</p>
        @endif

        <hr>
        <form method="POST" action="{{ route('manage.prodi.store') }}">
            @csrf
            <label>Fakultas ID:</label>
            <input type="number" name="fakultas_id" required><br><br>

            <label>Nama Prodi:</label>
            <input type="text" name="nama_prodi" required><br><br>

            <button type="submit">Simpan</button>
        </form>
    </body>

</html>
