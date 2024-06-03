<?php

class jsonFilter
{
    public function filter(object $data)
    {
        $this->filterTrade($data);
    }
    private function filterTrade(object $data)
    {
        var_dump($data);
    }
}

$class = $this->filter();