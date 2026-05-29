<?php

namespace App\Http\Controllers;

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
}
