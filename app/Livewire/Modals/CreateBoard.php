<?php

namespace App\Livewire\Modals;

use App\Livewire\Forms\CreateBoardForm;
use LivewireUI\Modal\ModalComponent;

class CreateBoard extends ModalComponent
{
    public CreateBoardForm $createBoardForm;

    public function render()
    {
        return view('livewire.modals.create-board');
    }

    public function createBoard()
    {
        $this->createBoardForm->validate();

        $board = auth()->user()->boards()->create($this->createBoardForm->only('title'));

        return redirect()->route('boards.show', $board);
    }
}
