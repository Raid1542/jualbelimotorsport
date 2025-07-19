<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RekapPenjualanExport implements FromView
{
    protected $pesanan;

    public function __construct($pesanan)
    {
        $this->pesanan = $pesanan;
    }

    public function view(): View
    {
        return view('exports.rekap', [
            'pesanan' => $this->pesanan
        ]);
    }
}
