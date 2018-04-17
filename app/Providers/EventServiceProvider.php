<?php

namespace App\Providers;

use App\Events\DataTransform;
use App\Models\Category;
use App\Service\Log\Log;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\DataTransform' => [
            'App\Listeners\DataTransformToLog',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        Category::updated(function (Category $category){
            $data = $category->getOriginal();
            $type = $data['deleted_at'] && $category->deleted_at ? '修改分类' : '恢复被软删除的分类数据';
            Event::fire(new DataTransform($data, $type ?? '修改分类'));
        });
        Category::deleted(function (Category $category){
            $data = $category->getOriginal();
            $type = $data['deleted_at'] ? '彻底删除分类' : '软删除分类';
            Event::fire(new DataTransform($category->toArray(), $type));
        });
        Category::creating(function (Category $category){
            Event::fire(new DataTransform($category->toArray(), '添加分类'));
        });
    }
}
