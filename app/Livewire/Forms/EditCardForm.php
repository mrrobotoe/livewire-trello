<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class EditCardForm extends Form
{
    #[Validate('required|string')]
    public string $title = '';

    #[Validate('nullable|string')]
    public ?string $description = '';
}
