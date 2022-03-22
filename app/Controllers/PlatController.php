<?php

declare(strict_types = 1);

namespace ModuleThird\Controllers;

class PlatController extends AbstractController
{
    public function workCallback()
    {
        //echo $this->request->input('echostr');exit();
        $app = $this->getServiceObj('wechat');
		return $app->server->serve();//->send();
        return $this->success(['OK']);
    }
}
