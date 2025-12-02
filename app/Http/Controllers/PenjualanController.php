<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;

class PenjualanController extends Controller
{
   public function index(Request $request)
{
    $start = $request->input('start_date');
    $end = $request->input('end_date');

    $query = Penjualan::query();

    if ($start && $end) {
        $query->whereBetween('tanggal_penjualan', [$start, $end]);
    }

    $penjualans = $query->orderBy('tanggal_penjualan')->get();

    // Total Penjualan (jumlah * harga)
    $totalPenjualan = $penjualans->sum(fn($item) => $item->jumlah * $item->harga);

    // Total Item Terjual
    $totalItem = $penjualans->sum('jumlah');

    // Rata-rata harga produk
    $rataHarga = $penjualans->avg('harga');

    // Rentang tanggal data
    $tanggalAwal = $penjualans->min('tanggal_penjualan');
    $tanggalAkhir = $penjualans->max('tanggal_penjualan');

    return view('Penjualan.index', compact(
        'penjualans',
        'totalPenjualan',
        'totalItem',
        'rataHarga',
        'tanggalAwal',
        'tanggalAkhir'
    ));
}

}
