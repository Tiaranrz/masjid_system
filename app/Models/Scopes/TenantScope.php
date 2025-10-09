<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class TenantScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        // Pastikan tenant sudah aktif sebelum menambahkan scope
        if (tenant('id')) {
            $builder->where($model->getTable() . '.tenant_id', tenant('id'));
        }
    }
}
