<?php

namespace App\Livewire\Web\Event;

use App\Livewire\Forms\Web\EventForm;
use App\Models\Category;
use App\Models\City;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Create extends Component
{

    public EventForm $form;

    public function getCitiesProperty(): Collection|array
    {
        return City::query()->get();
    }

    public function getCategoriesProperty(): Collection|array
    {
        return Category::query()->get();
    }


    protected $listeners = ['addressUpdated' => 'addressUpdated'];

    public function addressUpdated($placeName)
    {
//        if ($placeName && isset($placeName["city"]) && isset($placeName["display_name"])) {
            $this->form->address_info = $placeName["display_name"];
            $this->form->_address = (object)$placeName;
//        }
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function save()
    {
        $this->form->store();

    }


    public function mount()
    {
        $this->form->start_time = Carbon::now()->format('Y-m-d');
    }

    public function render()
    {

        return view('livewire.web.event.create');
    }
}
