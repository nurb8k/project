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
    public string $title = 'ss';

    public string $description = '';

    public string $short_description = '';

    public string $comment = '';

    public int $status = 1;

    public int $priority = 1;

    public int $capacity = 1;

    public $start_time = null;

    public $end_time = null;

//    public $type_code = null;
    public int $category_id;

    public bool $is_private = false;
    public bool $is_commendable = false;
    public string $private_key = '';
    public int $command_count = 2;
    public object $_address;
    public string $address_info = '';

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
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
            'is_private' => $this->is_private,
            'is_commendable' => $this->is_commendable,
            'private_key' => $this->private_key,
        ]);
//        $event->types()->attach($this->type_code);
        $event->categories()->attach($this->category_id);
        $city = City::query()->where("name->en", "like", "%{$this->_address->city}%")
            ->orWhere("name->ru", "like", "%{$this->_address->city}%")->first();

        $event->address()->create([
            'city_id' => $city->id ?? null,
            'description' => $this->address_info,
            'street' => $this->_address->road ?? null,
            'house_number' => $this->_address->house_number ?? null,
            'amenity' => $this->_address->amenity ?? null,
            'city_district' => $this->_address->city_district ?? null,
            'suburb' => $this->_address->suburb ?? null,
            '_address_type' => $this->_address->address_type ?? null,
            '_coordinates' => $this->_address->coordinates ?? null,
            'building' => $this->_address->building ?? null,
            '_info' => json_encode($this->_address),
        ]);
        if ($this->is_commendable) {
            if ($this->capacity % $this->command_count != 0)
                for ($i = 0; $i < $this->command_count; $i++) {
                    $divisionCapacity = $this->capacity % $this->command_count;
                    $capacity = $this->capacity / $this->command_count;
                if ($divisionCapacity > 0) {
                  if($i<$divisionCapacity)
                      $capacity = $capacity + 1;
                }
                    $event->commands()->create([
                        'name' => 'command ' . $i,
                        'capacity' => $capacity,
                    ]);
                }
        }else{
            $event->commands()->create([
                'name' => 'command 1',
                'capacity' => $this->capacity,
            ]);
        }
        if ($event->commands()->count() > 0) {
            $firstCommand = $event->commands()->first();
            $firstCommand->members()->create([
                'user_id' => auth()->user()->id,
                'event_id' => $event->id,
                'status' => "1",
            ]);
        }
        return redirect()->route('home');

    }


    public function rules(): array
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
                    } elseif (!(isset($this->_address->country_code) && $this->_address->country_code === 'kz')) {
                        $fail(__('A country of Kazakhstan is required.'));
                    }
                }],
            'category_id' => 'required|integer|exists:categories,id',
            'private_key' => 'required_if:is_private,true|string|min:5|max:255',
            'command_count' => [
                'required_if:is_commendable,true', 'integer', 'min:2', 'max:5',
                function ($attribute, $value, $fail) {
                    if ($value > $this->capacity) {
                        $fail(__('A command count must be less than capacity.'));
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
            'start_time.required' => __('A start time is required.'),
            'end_time.required' => __('A end time is required.'),
            'address_info.required' => __('A address is required.'),
            'start_time.after' => __('A start time must be after today.'),
            'end_time.after' => __('A end time must be after start time.'),
            'capacity.*' => __('A capacity must be integer and between 1 and 30.'),
        ];
    }


}
