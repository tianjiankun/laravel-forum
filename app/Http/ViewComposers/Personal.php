<?php
/**
 * Created by PhpStorm.
 * User: tian
 * Date: 2018/6/17
 * Time: 上午11:52
 */

namespace App\Http\ViewComposers;


use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class Personal
{
    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $user = User::with('post', 'comment')
            ->find(Auth::id());
        $assign = [
            'user' => $user
        ];
        $view->with($assign);
    }
}