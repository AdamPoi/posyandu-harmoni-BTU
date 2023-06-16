<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use App\Exports\UsersExport;

use Excel;
use PDF;

class UserTable extends DataTableComponent
{
  protected $model = User::class;

  public function configure(): void
  {
    $this->setPrimaryKey('id_user');
    $this->setAdditionalSelects(['users.profile_picture as avatar']);
  }

  public function columns(): array
  {
    return [
      Column::make("ID", "id_user")
        ->sortable()->searchable(),
      Column::make("Nama", "nama")
        ->sortable()->searchable(),
      ImageColumn::make('Avatar')
        ->location(
          fn ($row) => asset('images/user/' . $row->avatar)
        )->attributes(fn ($row) => [
          'class' => 'rounded-circle',
          'alt' => $row->name . ' Avatar',
          'width' => 40,
        ]),
      Column::make("Role", "role")
        ->sortable()->searchable(),
      Column::make("Email", "email")
        ->sortable()->searchable(),

      Column::make('Actions')
        ->label(
          function ($row) {
            $delete =
              ' <button class="btn btn-danger btn-icon icon-center"
                                data-action="' . route('user.destroy', ['user' => $row->id_user]) . '" data-toggle="modal"
                                data-target="#confirm-delete-modal"> <i class="fas fa-trash"></i>
                                </button>';
            $edit =
              '<a href="' . route('user.edit', ['user' => $row->id_user]) . '" class="btn btn-icon icon-center btn-warning">
                            <i class="fas fa-pencil-alt"></i>
                        </a>';
            $detail =
              '<a href="' . route('user.show', ['user' => $row->id_user]) . '" class="btn btn-icon icon-center btn-primary">
                            <i class="fas fa-circle-info"></i>
                        </a>';
            return $detail . $edit . $delete;
          }
        )->html(),
    ];
  }
  // public function filters(): array
  // {
  //   return [
  //     DateFilter::make('Dari Tanggal')
  //     ->filter(function (Builder $builder, string $value) {
  //       $builder->where('tanggal', '>=', $value);
  //     }),
  //     DateFilter::make('Sampai Tanggal')
  //     ->filter(function (Builder $builder, string $value) {
  //       $builder->where('tanggal', '<=', $value);
  //     }),
  //   ];
  // }

  public function bulkActions(): array
  {
    return [
      'exportPdf' => 'Export PDF',
      'exportExcel' => 'Export Excel',

    ];
  }

  public function exportPdf()
  {
    $items = $this->getSelected();
    $users = User::whereIn('id_user', $items)->get();
    $this->clearSelected();
    $pdf = PDF::loadview('pages.user.user_pdf', ['users' => $users])->output();

    return response()->streamDownload(
      fn () => print($pdf),
      "data-user.pdf"
    );
  }

  public function exportExcel()
  {
    $items = $this->getSelected();
    $this->clearSelected();
    return Excel::download(new UsersExport($items), 'users.xlsx');
  }
}
