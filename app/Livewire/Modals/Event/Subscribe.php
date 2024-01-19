<?php

namespace App\Livewire\Modals\Event;

use App\Livewire\Modals\BaseModal;
use Livewire\Component;

class Subscribe extends BaseModal
{
    public function render()
    {
        return view('livewire.modals.event.subscribe');
    }
    protected $listeners = [
        'show' => 'show',
    ];
    public function show($id){
        dd('show');
    }
}
