<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class UserTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()->searchable(),
            Column::make("Name", "id")
                ->sortable()
                ->format(function ($value, $row, $column) {
                    if ($row->first_name && $row->last_name) return $row->name;
                    return $row->first_name;
                })->html(),
            Column::make("Email", "email")
                ->sortable()->searchable(),
            Column::make("Gender", "gender")
                ->sortable()->searchable(),
            Column::make("Country id", "country_id")
                ->format(function ($value, $row, $column) {
                    return $row->country->name;
                })->html()
                ->sortable(),
            Column::make("Created at", "created_at")
                ->format(function ($value, $row, $column) {
                    return $value->format('M d, Y H:i:s A');
                })->html()
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->format(function ($value, $row, $column) {
                    return $value->format('M d, Y H:i:s A');
                })->html()
                ->sortable(),
            Column::make("id")
                ->format(function ($value, $row, $column) {
                    $editRoute = route('users.edit',$value);
                    return "<a href='$editRoute' class=''>Edit</a>";
                })->html()
                ->sortable()
        ];
    }

    public function builder(): Builder
    {
        return User::query()->addSelect('first_name', 'last_name');
    }
}
