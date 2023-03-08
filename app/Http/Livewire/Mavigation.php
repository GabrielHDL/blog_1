<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Mavigation extends Component
{
    public $search;

    public $open = false;

    public function updatedSearch($value) {
        // Trigger para abrir la barra de busqueda
        if ($value) {
            $this->open = true;
        }
    }

    public function render()
    {
        if ($this->search) {
            $posts = Post::where('name', 'LIKE' , "%" . $this->search . "%")
                        ->where('status', 2)
                        ->take(4)
                        ->get();
        } else {
            $posts = [];
        }

        // url de post mostrado
        $url = request()->path();
        // $post = Post::find(request()->route('post'));

        return view('livewire.mavigation', compact('url', 'posts'));
    }
}
