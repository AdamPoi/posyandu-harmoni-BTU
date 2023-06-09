<?php

namespace App\Exports;

use App\Models\Jadwal;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class JadwalsExport implements FromCollection, WithHeadings, WithMapping
{
  public $jadwals;

  public function __construct($jadwals)
  {
    $this->jadwals = $jadwals;
  }
  /**
   * @return \Illuminate\Support\Collection
   */
  public function map($jadwal): array
  {
    return [
      Carbon::parse($jadwal->tanggal)->locale('id'),
      $jadwal->kegiatan,
      $jadwal->deskripsi,
    ];
  }
  public function headings(): array
  {
    return [
      'Tanggal',
      'Kegiatan',
      'Deskripsi',
    ];
  }
  public function collection()
  {
    return Jadwal::whereIn('id_jadwal', $this->jadwals)->get();
  }
}
