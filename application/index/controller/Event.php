<?php
/*
 * YiFan-Volunteer-Tp6
 * ============================================================================
 * 版权所有 2017-2019 佛山市益帆网络有限公司，并保留所有权利。
 * 网站地址: http://www.yifanps.com
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用 .
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 */

namespace app\index\controller;


use app\index\Model\Order;
use app\index\Model\UserModel;
use Firebase\JWT\JWK;
use Firebase\JWT\JWT;
use think\console\command\make\Model;
use think\Controller;
use think\Db;
use think\Request;

use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;



use Flc\Alidayu\Client;
use Flc\Alidayu\App;
use Flc\Alidayu\Requests\AlibabaAliqinFcSmsNumSend;
use think\Validate;

class Event extends Cross
{

    public function index(){
        return 66666;
    }

    public function demo(Request $request){
        $username = $request->param('username');
        $pass = $request->param('pass');



        return json([
            'code' => 200,
            'msg' => '请求成功',
            'data' => [
                'id' => 1111,
                'username' => $username,
                'pass' => $pass
            ]
        ]);
    }
}