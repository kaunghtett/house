<?php

namespace App\Filters;

class LocationFilters extends Filters
{
    protected $filters = [
        'address'
    ];

    public function address($address)
    {
        // dd($address);
        $keywords = preg_split("/[\s,]+/", $address);
        // dd($keywords);
        return $this->builder->where(function ($query) use ($keywords) {
            foreach ($keywords as $keyword) {
                $query->where('address', 'LIKE', "%{$keyword}%");
            }
        });
    }
}
