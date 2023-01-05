<?php

namespace App\Http\Livewire;

use App\Models\Website;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class DeleteAlert extends Component
{
    use LivewireAlert;

    public $name;
    public $website_id;


    protected $listeners = [
        'confirmed'
    ];

    public function check()
    {
        $this->alert('warning', '請確認刪除該網址 ?', [
            'position' => 'top',
            'text' => $this->name,
            'showConfirmButton' => true,
            'confirmButtonText' => 'Confirm',
            'showCancelButton' => true,
            'onConfirmed' => 'confirmed',
            'cancelButtonText' => 'Cancel',
            'onDismissed' => 'cancelled',
            'timer' => '10000',
            'toast' => true,
            'timerProgressBar' => true,
        ]);
    }

    public function confirmed()
    {
        Website::find($this->website_id)->delete();

        $this->flash('success', 'Successfully', [], '/websites');
    }

    public function render()
    {
        return view('livewire.delete-alert');
    }
}
