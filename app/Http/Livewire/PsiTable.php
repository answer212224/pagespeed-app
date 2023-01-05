<?php

namespace App\Http\Livewire;

use App\Models\PagespeedInsight;
use App\Models\Website;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class PsiTable extends DataTableComponent
{

    protected $model = Website::class;

    public function __construct()
    {
        parent::__construct();
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {

        return [
            // Looks for the address column on the address relationship of User.
            // $user->address->address
            Column::make('LCP', 'pagespeedinsights.LCP_category'),

        ];
    }
}
