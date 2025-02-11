<?php

namespace App\Admin\Widgets;

use App\Models\Product;
use Arrilot\Widgets\AbstractWidget;

class ProductsWidget extends AbstractWidget{
    protected $config = [];

    public function run(){
        $count = Product::count();
        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-news',
            'title' => "Счетчик продуктов",
            'text' => "Продуктов: {$count}",
            'button' => [
                'text' => 'Перейти к списку',
                'link' => route('voyager.products.index')  //route('voyager.mews.index')
            ],
            'image' => 'news-bg.png'
        ]));
    }

    public function shouldBeDisplayed(){
        return true;
    }
}
