<tbody>
    @forelse($buku as $index => $item)
        <tr
            style="border-bottom: 1px solid #3d3d3d; transition: 0.2s; background-color: {{ $index % 2 === 0 ? '#2d2d2d' : '#252525' }}">
            <td style="padding: 15px; text-align: center; color: #888;">{{ $index + 1 }}</td>
            <td style="padding: 15px; font-weight: bold; color: #fff;">{{ $item->judul }}</td>
            <td style="padding: 15px; color: #ccc;">{{ $item->penulis }}</td>
            <td style="padding: 15px; color: #ccc;">{{ $item->penerbit }}</td>
            <td style="padding: 15px; text-align: center; color: #ff2d20; font-weight: bold;">{{ $item->tahunTerbit }}
            </td>
            <td style="padding: 15px; text-align: center;">
                <div style="display: flex; gap: 8px; justify-content: center;">
                    <!-- Tombol Edit (Sudah diperbaiki ke BukuId) -->
                    <a href="{{ route('buku.edit', $item->BukuId) }}"
                        style="background-color: #ffa000; color: white; text-decoration: none; padding: 6px 12px; border-radius: 4px; font-size: 12px; font-weight: bold;">
                        Edit
                    </a>

                    <!-- Tombol Hapus (Sudah diperbaiki ke BukuId) -->
                    <form action="{{ route('buku.destroy', $item->BukuId) }}" method="POST" style="margin: 0;"
                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            style="background-color: #d32f2f; color: white; border: none; padding: 6px 12px; border-radius: 4px; font-size: 12px; font-weight: bold; cursor: pointer;">
                            Hapus
                        </button>
                    </form>
                </div>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6" style="padding: 30px; text-align: center; color: #aaa; font-style: italic;">
                Belum ada data koleksi buku di database perpustakaan.
            </td>
        </tr>
    @endforelse
</tbody>
