<?php 

namespace App\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
abstract class QueryFilter
{
    protected Builder $builder;
    protected array $filters = [];

    public function __construct(array $filters = [])
    {   
        $this->filters = $filters;
    }

    public function apply(Builder $query)
    {
        $this->builder = $query;
        foreach ($this->filters as $filter => $value) {
            if (method_exists($this, $filter) && $value !== null) {
                $this->$filter($value);
            }
        }
    
        return $this->builder;
    }
    
}