<?php

use Illuminate\Support\Facades\Storage;


class jsonFilter
{
    public function filter()
    {
        $data = asset();
        $this->filterTrade($data);
    }
    private function filterTrade(object $data)
    {
        var_dump($data);
    }
}