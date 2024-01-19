<?php

namespace App\Livewire\Modals;

use Livewire\Component;

class BaseModal extends Component
{
    public $show = false;

//    public function render()
//    {
//        return view('livewire.modals.base-modal');
//    }

    public function closeModal()
    {
        $this->show= false;
    }

    public function openModal()
    {
        $this->show = true;
    }
}
