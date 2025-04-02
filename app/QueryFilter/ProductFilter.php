<?php

namespace App\QueryFilter;
use App\QueryFilter\QueryFilter;

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
        if (isset($value['min'])) {
            $this->builder->where("price", ">=", $value['min']);
        }
    
        if (isset($value['max'])) {
            $this->builder->where("price", "<=", $value['max']);
        }

        if (!is_array($value)) {
            $this->builder->where("price", ">=",$value);
        }
    }

    public function search($value)
    {
        $this->builder->where(function ($query) use ($value) {
            $query->where("title", "like", "%$value%")
                ->orWhere("body", "like", "%$value%")
                ->orWhere("address", "like", "%$value%");
        });
    }
}