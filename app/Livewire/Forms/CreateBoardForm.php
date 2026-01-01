<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateBoardForm extends Form
{
    #[Validate('required|string')]
    public string $title = '';
}
