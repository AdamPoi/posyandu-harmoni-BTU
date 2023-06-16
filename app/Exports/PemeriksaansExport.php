<?php

namespace App\Exports;

use App\Models\Pemeriksaan;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PemeriksaansExport implements FromCollection, WithHeadings, WithMapping
{
  public $pemeriksaans;

  public function __construct($pemeriksaans)
  {
    $this->pemeriksaans = $pemeriksaans;
  }
  /**
   * @return \Illuminate\Support\Collection
   */
  public function map($pemeriksaan): array
  {
    return [
      $pemeriksaan->ibu_hamil->nama,
      Carbon::parse($pemeriksaan->tanggal)->locale('id'),
      $pemeriksaan->catatan,
    ];
  }
  public function headings(): array
  {
    return [
      'Ibu Hamil',
      'Tanggal',
      'Catatan'
    ];
  }
  public function collection()
  {
    return Pemeriksaan::whereIn('id_pemeriksaan', $this->pemeriksaans)->get();
  }
}
