<?php

namespace App\Http\ViewComposers;

use App\Models\Category;
use Illuminate\Contracts\View\View;

class Home
{
    public function compose(View $view)
    {
        $category = Category::select('id', 'name')
            ->get();
        $assign = [
            'category' => $category
        ];
        $view->with($assign);
    }
}