<?php

namespace App\Livewire;

use Livewire\Component;

class Comment extends Component
{
    public \App\Models\Comment $comment;

    public function replyToComment()
    {
        dd('replied');
    }

    public function render()
    {
        return view('livewire.comment');
    }
}
