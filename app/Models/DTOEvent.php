<?php

namespace App\Models;

use App\Models\Event;
use App\Models\Category;
use App\Models\CategoryEvent;

class DTOEvent
{
    public $id;
    public $name;
    public $description;
    public $date;
    public $seats;
    public $categories;

    public function __construct(Event $event)
    {
        $this->id = $event->id;
        $this->name = $event->name;
        $this->description = $event->description;
        $this->date = $event->date;
        $this->seats = $event->seats;
    }

    public function getCategoriesOfEvent()
    {
        $categories = CategoryEvent::where('event_id', 7)->pluck('category_id')->toArray();
        //return $categories;
        $categoryNames = [];
        foreach ($categories as $category) {
            $categoryDb = Category::find($category);
            $categoryNames[] = $categoryDb->name;
        }
        $this->categories = $categoryNames;
        return $this;
    }
}
