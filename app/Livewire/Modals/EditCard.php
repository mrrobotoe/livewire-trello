<?php

namespace App\Livewire\Modals;

use App\Livewire\Forms\CreateCommentForm;
use App\Livewire\Forms\EditCardForm;
use App\Models\Card;
use Livewire\Attributes\On;
use LivewireUI\Modal\ModalComponent;

class EditCard extends ModalComponent
{
    public Card $card;

    public EditCardForm $editCardForm;

    public CreateCommentForm $createCommentForm;

    public function mount()
    {
        $this->editCardForm->fill($this->card->only('title', 'description'));
    }

    public function updateCard()
    {
        $this->authorize('update', $this->card);

        $this->editCardForm->validate();

        $this->card->update($this->editCardForm->only('title', 'description'));

        $this->dispatch('card-'.$this->card->id.'-updated');
        $this->dispatch('closeModal');
    }

    public function archiveCard()
    {
        $this->authorize('archive', $this->card);

        $this->card->update([
            'archived_at' => now(),
        ]);

        $this->dispatch('column-'.$this->card->column->id.'-updated');
        $this->dispatch('closeModal');

    }

    #[On('add-comment')]
    public function addComment()
    {
        $this->createCommentForm->validate();

        $comment = $this->card->comments()->make($this->createCommentForm->only('content'));
        $comment->user()->associate(auth()->user());

        $comment->save();
        $this->createCommentForm->reset();
    }

    public function render()
    {
        return view('livewire.modals.edit-card', [
            'comments' => $this->card->comments()->latest()->get(),
        ]);
    }
}
