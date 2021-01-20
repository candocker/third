<?php
declare(strict_types = 1);

namespace App\Repositories;

class PlatRepository extends AbstractRepository
{

    protected function _sceneFields()
    {
        return [
            'list' => ['id', 'name', 'code'],
        ];
    }
}
