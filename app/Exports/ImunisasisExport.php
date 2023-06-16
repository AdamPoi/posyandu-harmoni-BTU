<?php

namespace App\Exports;

use App\Models\Imunisasi;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ImunisasisExport implements FromCollection, WithHeadings, WithMapping
{
  public $imunisasis;

  public function __construct($imunisasis)
  {
    $this->imunisasis = $imunisasis;
  }
  /**
   * @return \Illuminate\Support\Collection
   */
  public function map($imunisasi): array
  {
    return [
      $imunisasi->jenis_imunisasi,
      $imunisasi->deskripsi,
      Carbon::parse($imunisasi->tanggal)->locale('id'),
    ];
  }
  public function headings(): array
  {
    return [
      'Jenis Imunisasi',
      'Tanggal',
      'Deskripsi',
    ];
  }
  public function collection()
  {
    return Imunisasi::whereIn('id_imunisasi', $this->imunisasis)->get();
  }
}
