<?php

namespace App\Livewire\Forms\Web;


use App\Models\City;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EventForm extends Form
{
//
//'title',//'description',//'short_description',//'comment',//'status',//'priority',
////'user_id',//'capacity',//'start_time',//'end_time',
    public $title = 'ss';

    public $description = '';

    public $short_description = '';

    public $comment = '';

    public $status = 1;

    public $priority = 1;

    public $capacity = 1;

    public $start_time = null;

    public $end_time = null;

    public $type_code = null;
    public $category_id = null;

    public $_address = '';

    public $address_info = '';
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
        $city = City::query()->where("name->en", "like", "%{$this->_address->city}%")
            ->orWhere("name->ru", "like", "%{$this->_address->city}%")->first();
        Log::info($city."city1111111111");
        $event->address()->create([
            'city_id' => $city->id??null,
            'description' => $this->address_info,
            'street' => $this->_address->road??null,
            'house_number' => $this->_address->house_number??null,
            'amenity' => $this->_address->amenity??null,
            'city_district' => $this->_address->city_district??null,
            'suburb' => $this->_address->suburb??null,
            '_address_type' => $this->_address->address_type??null,
            '_coordinates' => $this->_address->coordinates??null,
            'building' => $this->_address->building??null,
            '_info'=> json_encode($this->_address),
        ]);
        return redirect()->route('home');

//        $this->validate();

    }


   public function rules():array
   {
         return [
              'title' => 'required|min:5',
              'description' => 'required|min:5',
              'short_description' => 'required|min:5',
              'capacity' => 'required|integer|min:1|max:30',
              'start_time' => 'required|date|after:today',
              'end_time' => 'required|date|after:start_time',
              'address_info' => [
                  'required', 'string',
                    function ($attribute, $value, $fail) {
                      //check exists attribute city in object
                        if (!isset($this->_address->city)) {
                            $fail(__('A city is required.'));
                        }elseif (!(isset($this->_address->country_code) && $this->_address->country_code === 'kz')){
                            $fail(__('A country of Kazakhstan is required.'));
                        }
                    }
                  ],
         ];
   }
   public function messages(): array
   {
        return [
            'title.*' => __('A title is required and must be at least 5 characters.'),
            'description.*' => __('A description is required. and must be at least 5 characters.'),
            'short_description.*' => __('A short description is required. and must be at least 5 characters.'),
            'start_time.required' =>__('A start time is required.'),
            'end_time.required' => __('A end time is required.'),
            'address_info.required' => __('A address is required.'),
            'start_time.after' => __('A start time must be after today.'),
            'end_time.after' => __('A end time must be after start time.'),
            'capacity.*' => __('A capacity must be integer and between 1 and 30.'),
        ];
   }



}
