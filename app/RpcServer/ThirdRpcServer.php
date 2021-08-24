<?php

declare(strict_types=1);

namespace ModuleThird\RpcServer;

use Hyperf\RpcServer\Annotation\RpcService;
use ModuleThird\Services\UserPermissionService;

/**
 * @RpcService(name="ThirdRpcServer", protocol="jsonrpc-http", server="jsonrpc-http", publishTo="consul")
 */
class ThirdRpcServer extends AbstractRpcServer
{
    public function getUserById($id): array
    {
        $userPermission = make(UserPermissionService::class);
        $user = $userPermission->getUserById($id);
        if (empty($user)) {
            return ['code' => 400, 'message' => 'Token获取用户失败'];
        }

        return ['code' => '200', 'message' => 'OK', 'data' => $user];
    }
}
