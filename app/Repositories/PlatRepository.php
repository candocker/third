<?php
declare(strict_types = 1);

namespace ModuleThird\Repositories;

class PlatRepository extends AbstractRepository
{

    protected function _sceneFields()
    {
        return [
            'list' => ['id', 'name', 'code'],
        ];
    }
}
