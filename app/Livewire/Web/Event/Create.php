<?php

namespace App\Livewire\Web\Event;

use App\Livewire\Forms\Web\EventForm;
use App\Models\Category;
use App\Models\City;
use App\Models\Type;
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
    public function getTypesProperty(): Collection|array
    {
        return Type::query()->get();
    }

    public function save()
    {

        $this->form->store();
//        return $this->redirect('/posts');
    }

    public function render()
    {
        return view('livewire.web.event.create');
    }
}
