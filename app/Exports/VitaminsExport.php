<?php

namespace App\Exports;

use App\Models\Vitamin;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class VitaminsExport implements FromCollection, WithHeadings, WithMapping
{
  public $vitamins;

  public function __construct($vitamins)
  {
    $this->vitamins = $vitamins;
  }
  /**
   * @return \Illuminate\Support\Collection
   */
  public function map($vitamin): array
  {
    return [
      $vitamin->jenis_vitamin,
      $vitamin->deskripsi,
    ];
  }
  public function headings(): array
  {
    return [
      'Kegiatan',
      'Deskripsi',
    ];
  }
  public function collection()
  {
    return Vitamin::whereIn('id_vitamin', $this->vitamins)->get();
  }
}
