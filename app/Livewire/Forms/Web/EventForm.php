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
    public $title = 'tt';

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
        dd($this->validate());
//        $this->validate();

    }
}
