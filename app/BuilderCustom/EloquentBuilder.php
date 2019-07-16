<?php

namespace App\BuilderCustom;

use Illuminate\Database\Eloquent\Builder;

class EloquentBuild extends Builder
{
    protected function eagerLoadRelation(array $models, $name, \Closure $constraints)
    {
        if ($name === 'pivot') {
            $relations = array_filter(array_keys($this->eagerLoad), function ($relation) {
                return $relation != 'pivot' && str_contains($relation, 'pivot');
            });

            $pivots = $this->getModel()->newCollection(
                array_pluck($models, 'pivot')
            );

            $pivots->load(array_map(function ($relation) {
                return substr($relation, strlen('pivot.'));
            }, $relations));

            return $models;
        }

        return parent::eagerLoadRelation($models, $name, $constraints);
    }
}
