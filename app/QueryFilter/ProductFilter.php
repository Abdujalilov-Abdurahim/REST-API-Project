<?php

namespace App\QueryFilter;
use app\QueryFilter\QueryFilter;

class ProductFilter extends QueryFilter
{
    public function region_id($value)
    {
        $this->builder->where("region_id", $value);
    }

    public function category_id($value)
    {
        $this->builder->where("category_id", $value);
    }

    public function price($value)
    {
        if (isset($value["min"]) && isset($value["max"])) {
            $this->builder->whereBetween("price", [$value["min"], $value["max"]]);
        }
    }

    public function title($value)
    {
        $this->builder->where("title", "like", "%$value%");
    }
}