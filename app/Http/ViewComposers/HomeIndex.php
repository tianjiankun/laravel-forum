<?php


namespace App\Http\ViewComposers;


use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;

class HomeIndex
{
    public function compose(View $view)
    {
        $seven = Carbon::now()->subWeek(12)->format('Y-m-d H:i:s');
        $hot = Post::where('created_at', '>', $seven)
            ->orderBy('is_essence')
            ->orderBy('is_top')
            ->limit(10)
            ->get();
        $assign = [
            'hot' => $hot,
        ];
        $view->with($assign);
    }
}