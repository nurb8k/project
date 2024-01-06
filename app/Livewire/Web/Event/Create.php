<?php

namespace App\Livewire\Web\Event;

use App\Models\Category;
use App\Models\City;
use App\Models\Type;
use Livewire\Component;

class Create extends Component
{
    public function getCitiesProperty(): \Illuminate\Database\Eloquent\Collection|array
    {
        return City::query()->get();
    }

    public function getCategoriesProperty(): \Illuminate\Database\Eloquent\Collection|array
    {
        return Category::query()->get();
    }
    public function getTypesProperty(): \Illuminate\Database\Eloquent\Collection|array
    {
        return Type::query()->get();
    }
    public function render()
    {
        return view('livewire.web.event.create');
    }
}
