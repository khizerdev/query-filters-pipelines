<?php



namespace App\Http\QueryFilters;

use Illuminate\Database\Eloquent\Builder;

class CreatedAtQueryFilter
{
    public function handle(Builder $builder,$next)
    {
        if($orderBy = request()->get('created_at')) {
            
            return $next($builder)
            ->orderBy('created_at' , $orderBy);
        }
        
        return $next($builder); 
        
    }
}