<?php

namespace App\View\Components;

use Illuminate\View\Component;

use App\Models\Category;

class CategoryDropdown extends Component
{
    public function render()
    {
        return view('components.category-dropdown', [
            'categories' => Category::all(),
            'current_category' => Category::where('slug', request('category'))->first()
        ]);
    }
}
