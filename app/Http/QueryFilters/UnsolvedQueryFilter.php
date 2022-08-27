<?php



namespace App\Http\QueryFilters;

use Illuminate\Database\Eloquent\Builder;

class UnsolvedQueryFilter
{
    public function handle(Builder $builder,$next)
    {
        if(request()->has('unsolved')) {
            return $next($builder)
            ->whereNull('solved_at');
        }
        
        return $next($builder); 
        
    }
}