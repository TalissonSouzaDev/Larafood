<?php

namespace App\Observers;

use App\Models\category;
use Illuminate\Support\Str;

class CategoryObserver
{
    /**
     * Handle the category "created" event.
     *
     * @param  \App\Models\category  $category
     * @return void
     */
    public function creating(category $category)
    {
       
        $category->url = Str::kebab($category->name);
    }

    /**
     * Handle the category "updated" event.
     *
     * @param  \App\Models\category  $category
     * @return void
     */
    public function updating(category $category)
    {
        $category->url = Str::kebab($category->name);
    }

   
}
