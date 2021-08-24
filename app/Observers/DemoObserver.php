<?php

declare(strict_types = 1);

namespace ModuleShop\Observers;

use ModuleShop\Models\Demo;

class DemoObserver
{
    public function deleting(Demo $model)
    {
        //return $model->canDelete();
    }
}
