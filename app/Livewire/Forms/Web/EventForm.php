<?php

namespace App\Livewire\Forms\Web;

use Carbon\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EventForm extends Form
{
//
//'title',//'description',//'short_description',//'comment',//'status',//'priority',
////'user_id',//'capacity',//'start_time',//'end_time',
    #[Validate('required|min:5')]
    public $title = '';

    #[Validate('required|min:5')]
    public $description = '';

//    #[Validate('min:5')]
    public $short_description = '';

    public $comment = '';

    public $status = 1;

    public $priority = 1;

    #[Validate('required|integer|min:1|max:30')]
    public $capacity = 1;

    #[Validate('required|date|after:today')]
    public $start_time = null;

    #[Validate('required|date|after:start_time')]
    public $end_time = null;

    public $type_code = null;

    public $category_id = null;

    public $city_id = 1;

    public function store()
    {
        $this->validate();
        $event = auth()->user()->events()->create([
            'title' => $this->title,
            'description' => $this->description,
            'short_description' => $this->short_description,
            'comment' => $this->comment,
            'status' => $this->status,
            'priority' => $this->priority,
            'capacity' => $this->capacity,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
        ]);
        $event->types()->attach($this->type_code);
        $event->categories()->attach($this->category_id);
        $event->address()->create([
            'city_id' => $this->city_id,
        ]);
        return redirect()->route('home');

//        $this->validate();

    }


}
