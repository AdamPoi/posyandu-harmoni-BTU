<?php

namespace App\Exports;

use App\Models\Penimbangan;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PenimbangansExport implements FromCollection, WithHeadings, WithMapping
{
  public $penimbangans;

  public function __construct($penimbangans)
  {
    $this->penimbangans = $penimbangans;
  }
  /**
   * @return \Illuminate\Support\Collection
   */
  public function map($penimbangan): array
  {
    return [
      $penimbangan->balita->nama,
      $penimbangan->berat_badan . ' Kg',
      $penimbangan->tinggi_badan . ' Cm',
      $penimbangan->lingkar_kepala . ' Cm',

      Carbon::parse($penimbangan->tanggal)->locale('id'),
    ];
  }
  public function headings(): array
  {
    return [
      'Balita',
      'Berat Badan',
      'Tinggi Badan',
      'Lingkar Kepala',
      'Tanggal',
    ];
  }
  public function collection()
  {
    return Penimbangan::whereIn('id_penimbangan', $this->penimbangans)->get();
  }
}
