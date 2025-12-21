<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Pengumuman;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::where('is_published', true)
            ->orderByDesc('tanggal')
            ->paginate(6);

        return view('pengumuman.index', [
            'pengumuman' => $pengumuman,
            'title' => 'Pengumuman Desa'
        ]);
    }
    public function show(Pengumuman $pengumuman)
{
    abort_if(!$pengumuman->is_published, 404);

    return view('pengumuman.show', [
        'pengumuman' => $pengumuman,
        'title' => $pengumuman->judul
    ]);
}

}