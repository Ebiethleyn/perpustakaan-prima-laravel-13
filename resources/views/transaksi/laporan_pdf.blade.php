<!DOCTYPE html>
<html>

<head>
    <title>Laporan Sirkulasi Perpustakaan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            font-size: 12px;
        }

        .kop-surat {
            text-align: center;
            margin-bottom: 25px;
            border-bottom: 3px solid #000;
            padding-bottom: 10px;
        }

        .kop-surat h2 {
            margin: 0;
            font-size: 18px;
            text-transform: uppercase;
        }

        .kop-surat p {
            margin: 5px 0 0 0;
            color: #555;
        }

        .table-laporan {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .table-laporan th {
            background-color: #f2f2f2;
            border: 1px solid #999;
            padding: 8px;
            font-weight: bold;
            text-align: left;
        }

        .table-laporan td {
            border: 1px solid #999;
            padding: 8px;
        }

        .badge {
            font-weight: bold;
        }

        .text-center {
            text-align: center;
        }

        .waktu-cetak {
            text-align: right;
            font-style: italic;
            color: #777;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

    <div class="kop-surat">
        <h2>Perpustakaan Digital SMK Prestasi Prima</h2>
        <p>Jl. Raya Cilangkap No.1, Cilangkap, Cipayung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta</p>
    </div>

    <h3 style="text-align: center; text-transform: uppercase; margin-bottom: 20px;">Laporan Rekapitulasi Transaksi
        Sirkulasi Buku</h3>

    <div class="waktu-cetak">
        Tanggal Cetak: {{ \Carbon\Carbon::now()->format('d F Y H:i') }} WIB
    </div>

    <table class="table-laporan">
        <thead>
            <tr>
                <th class="text-center" style="width: 40px;">No</th>
                <th>Nama Anggota Peminjam</th>
                <th>Judul Koleksi Buku</th>
                <th class="text-center">Tanggal Pinjam</th>
                <th class="text-center">Tanggal Kembali</th>
                <th class="text-center" style="width: 110px;">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transaksi as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td><strong>{{ $item->user?->namaLengkap ?? 'User Dihapus' }}</strong></td>
                    <td>{{ $item->buku?->judul ?? 'Buku Dihapus' }}</td>
                    <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggalPeminjaman)->format('d M Y') }}</td>
                    <td class="text-center">
                        {{ $item->TanggalPengembalian ? \Carbon\Carbon::parse($item->TanggalPengembalian)->format('d M Y') : '-' }}
                    </td>
                    <td class="text-center">
                        <span class="badge" style="color: {{ $item->status === 'Dipinjam' ? '#e65100' : '#1b5e20' }};">
                            {{ $item->status }}
                        </span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center" style="font-style: italic; padding: 20px;">
                        Belum ada riwayat data transaksi sirkulasi buku.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>

</html>
