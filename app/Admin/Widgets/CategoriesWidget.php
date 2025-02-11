<?php

namespace App\Admin\Widgets;

use App\Models\Category;
use Arrilot\Widgets\AbstractWidget;

class CategoriesWidget extends AbstractWidget{
    protected $config = [];

    public function run(){
        $count = Category::count();
        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-news',
            'title' => "Счетчик категорий",
            'text' => "Категорий: {$count}",
            'button' => [
                'text' => 'Перейти к списку',
                'link' => route('voyager.categories.index')  //route('voyager.mews.index')
            ],
            'image' => 'basket-bg.png'
        ]));
    }

    public function shouldBeDisplayed(){
        return true;
    }
}
