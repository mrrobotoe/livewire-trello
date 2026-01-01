<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class EditColumnForm extends Form
{
    #[Validate('required|string')]
    public string $title = '';
}
