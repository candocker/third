<?php

declare(strict_types = 1);

namespace ModuleThird\Models;

class Plat extends AbstractModel
{
    protected $table = 'plat';
    protected $fillable = ['name'];

    public function rules()
    {
        return [
            [['app_id', 'name', 'code'], 'required'],
            ['code', 'unique', 'targetClass' => '\foundation\third\models\Plat', 'message' => '代码存在。'],
            [['status', 'merchant_id'], 'default', 'value' => 0],
            [['sort', 'app_secret', 'token', 'merchant_id'], 'safe'],
        ];
    }

	public function getSortInfos()
	{
		return [
			//'subscription' => '订阅号',
			//'service' => '服务号',
			'wechat' => '微信',
			'wminiprogram' => '微信小程序',
			'wechat_open' => '微信平台',
			'alipay' => '支付宝',
			'qq' => 'QQ',
			'weibo' => '微博',
			//'douban' => '豆瓣',
			//'zhihu' => '知乎',
			//'toutiao' => '头条',
			//'twitter' => '推特',
			//'facebook' => 'FACEBOOK',
		];
	}

	public function getTokenValue()
	{
		if (empty($this->token)) {
			$this->token = strtolower(Yii::$app->getSecurity()->generateRandomString(16));
			$this->token = $this->randomString(16);
			$this->update(false);
		}
		return $this->token;
	}

	protected function _getTemplatePointFields()
	{
		return [
			'app_id' => ['type' => 'common'],
			'token' => ['type' => 'inline', 'method' => 'getTokenValue'],
			'entrance_url' => ['type' => 'inline', 'method' => 'getCode'],
			'listNo' => $this->getSceneFields('listNo'),
			'extFields' => ['entrance_url'],
		];
	}

	public function getCode()
	{
		return Yii::getAlias('@restappurl') . '/wechat/entrance/' . $this->code . '.html';
	}

	public function _sceneFields()
	{
		return [
			'listNo' => [
				'createdat', 'updated_at', 'token', 'entrance_url', 'app_secret',
			],
		];
	}

	/*public function _getTemplatePointFields()
	{
		$datas = parent::_getTemplatePointFields();
		$datas['extFields'] = ['operation'];
		return $datas;
	}

    public function formatOperation($view)
    {
        $menuCodes = [
            'third_wechat-fan_dialog' => '',
        ];
        return $this->_formatMenuOperation($view, $menuCodes, ['point_wechat' => 'plat_code', 'id' => 'id'], ['target' => '_blank']);
    }

	public function getMessageDatas()
	{
		$datas = $this->getPointModel('message')->getInfos(['where' => ['or', "'openid_from' = '{$this->openid}'","'openid_to' = '{$this->openid}'"], 'orderBy' => ['created_at' => SORT_DESC]]);
		return $datas;
	}*/
}
