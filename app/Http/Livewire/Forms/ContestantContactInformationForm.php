<?php

namespace App\Http\Livewire\Forms;

use App\Models\Contestant;
use App\Models\ContestSubmission;
use Livewire\Component;

class ContestantContactInformationForm extends Component
{
    public $address;

    public $appropriate;

    public Contestant $contestant;

    public $email;

    public $firstName;

    public $lastName;

    public $original;

    public $phone;

    public $role; // Honeypot

    public ContestSubmission $submission;

    public $subscribeToNewsletter = false;

    public $success = false;

    protected $rules = [
        'address' => 'max:4096',
        'appropriate' => 'required',
        'firstName' => 'required',
        'lastName' => 'required',
        'original' => 'required',
        'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        'subscribeToNewsletter' => '',
    ];

    public function mount($submission)
    {
        $this->submission = $submission;
        $this->contestant = Contestant::whereUuid(request()->get('contestant'))->first();
        $this->email = $this->contestant->email;
    }

    public function render()
    {
        return view('livewire.forms.contestant-contact-information-form')
                ->layout('layouts.guest');
    }

    public function save()
    {
        $this->spamFilter();

        $this->validate();

        $this->contestant->fill([
            'email' => $this->email,
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'phone' => $this->phone,
            'address' => $this->address,
            'is_primary_contact' => false,
            'is_original' => $this->original,
            'is_appropriate' => $this->appropriate,
            'subscribe_to_newsletter' => $this->subscribeToNewsletter,
        ]);

        $this->contestant->save();

        $this->success = true;
    }

    public function spamFilter()
    {
        if (! empty($this->role)) {
            abort(422, 'Error processing form');
        }
    }
}
