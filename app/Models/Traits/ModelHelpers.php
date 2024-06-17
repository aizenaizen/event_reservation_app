<?php

namespace App\Models\Traits;

trait ModelHelpers
{
    public function matches(self $model): book
    {
        return $this->id === $model->id;
    }
}
