<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Menampilkan seluruh riwayat transaksi peminjaman (Admin & Petugas)
     */
    public function index()
    {
        // Mengambil semua data peminjaman beserta relasi user dan bukunya (Eager Loading)
        $transaksi = Peminjaman::with(['user', 'buku'])->latest()->get();
        return view('transaksi.index', compact('transaksi'));
    }

    /**
     * Proses Verifikasi / Mengubah status peminjaman (Contoh: Menyetujui atau Pengembalian)
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|max:50'
        ]);

        $peminjaman = Peminjaman::findOrFail($id);

        $updateData = ['status' => $request->status];

        // Jika statusnya diubah menjadi dikembalikan, otomatis catat tanggal hari ini
        if ($request->status === 'Dikembalikan') {
            $updateData['TanggalPengembalian'] = now()->toDateString();
        }

        $peminjaman->update($updateData);

        return redirect()->back()->with('success', 'Status transaksi berhasil diperbarui!');
    }
    public function cetakLaporan()
    {
        // Ambil semua data transaksi sirkulasi beserta data user dan bukunya
        $transaksi = Peminjaman::with(['user', 'buku'])->latest()->get();

        // Load view khusus cetak laporan dan lempar datanya
        $pdf = Pdf::loadView('transaksi.laporan_pdf', compact('transaksi'));

        // Atur ukuran kertas menjadi A4 dengan orientasi Lanskap (tidur) agar tabel tidak sesak
        $pdf->setPaper('a4', 'landscape');

        // Kembalikan perintah unduh otomatis dengan nama file rapi
        return $pdf->download('Laporan_Sirkulasi_Perpus_' . date('Y-m-d') . '.pdf');
    }
}
