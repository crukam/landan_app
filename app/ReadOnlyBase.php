<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReadOnlyBase 
{
    //
    protected $titles_array = [];

    public function all()
    {
        return $this->titles_array;
    }

    public function get(int $id) 
    {
        return $this->title_array[$id];
    }
}
