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

class HelloWorld extends Controller
{

    public static function getToken(){
        $key = config('jwt.key');
        $jwtData = [
            'lat' => config('jwt.lat'),
            'nbf' => config('jwt.nbf'),
            'exp' => config('jwt.exp'),
            'uid' => 78,
            'mobile' => 13590620208, //可以加入自己想要获得的用户信息参数
        ];
        $jwtToken = JWT::encode($jwtData, $key);
        return $jwtToken;
    }


    public static function checkToken($token){
        $key  = config('jwt.key');
        $info = JWT::decode($token, $key,['HS256']);
        return $info;

    }


    public function getUserToken(){

        return self::getToken();
    }

    public function checkUserToken($token = null){


        return json(['info' => self::checkToken($token)]);
    }


    function GBsubstr($string, $start, $length) {
        if(strlen($string)>$length){
            $str=null;
            $len=$start+$length;
            for($i=$start;$i<$len;$i++){
                if(ord(substr($string,$i,1))>0xa0){
                    $str.=substr($string,$i,2);
                    $i++;
                }else{
                    $str.=substr($string,$i,1);
                }
            }
            return $str.'...';
        }else{
            return $string;
        }
    }

    function fib($n){

        $array = array();

        $array[0] = 1;

        $array[1] = 1;

        for($i=2;$i<$n;$i++){

            $array[$i] = $array[$i-1]+$array[$i-2] . ',';

        }

        print_r($array);

    }



    function fib_recursive($n){

        if($n==1||$n==2){

            return 1;

        }else{

            return $this->fib_recursive($n-1)+$this->fib_recursive($n-2);

        }

    }

    public function upload($login = null){

//        $a = Db::name('erp_otc_entrust')
//
//            ->fetchSql()
//            ->sum('num * deal_amount');
//
//
//
//        return json($a);


        $id[] = 238;
        $id[] = 237;
        $id[] = 236;
        $id[] = 235;
        $id[] = 234;
        return json($id);


//        $order = Order::where(['status' => [2,100]])->limit(30)->select();

        $a=array(1,2,3);
        $b=array(2,3,4);
        $c=array_merge($a,$b);
        $d = array_unique($c);

        $appeal = Db::name('erp_otc_appeal')
//            ->select();
            ->group('user_id')
            ->column('user_id');

        $be_appeal = Db::name('erp_otc_appeal')
//            ->select();
            ->group('seller_id')
            ->column('seller_id');


        $all = array_unique(array_merge($appeal,$be_appeal));

        return json($all);


        $request = Request::instance()->param('pass');

        return json([
            'login' => $login,
            'pass' => $request
        ]);

        $vedio = 'http://vfx.mtime.cn/Video/2019/02/04/mp4/190204084208765161.mp4';

//        $user = Db::name('message')->where('create_time','between',[1515051256,1538226002])->select();
        $uid = 2;
        $is_auth = 2;  //删除认证信息,保留付费信息

//        echo DB::name('user')->getLastSql();

//        $real_name = DB::name('user_auth')->where("uid={$uid}")->value("real_name");


//
//        $result = $user->save(['user_id' => 22]);

//        $user = UserModel::where(['id' => 1])->find();

//        $result = $user->save(['user_id' => 33]);
//        $sql = DB::name('message')->getLastSql();

//        $event = Db::name('event')->group('org_id')->count();

        list($msec, $sec) = explode(' ', microtime());
        $msectime = (float)sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
        $key = "3434j8" . "3434j88";

        $key2 = "N07898" . "oa6PY5";
        $result = md5($key2 . $msectime);


        $this->success('6666666',[
            $msectime,
            $result
        ]);

        $request = \think\facade\Request::get();

        $id = array_key_exists('id',$request) ? $request['id'] : '';
        $mobile = array_key_exists('mobile',$request) ? $request['mobile'] : '';
        $order_no = array_key_exists('order_no',$request) ? $request['order_no'] : '';
        $type = array_key_exists('type',$request) ? $request['type'] : '';
        $ip = array_key_exists('ip',$request) ? $request['ip'] : '';
        $start_time = array_key_exists('start_time',$request) ? $request['start_time'] : '';
        $end_time = array_key_exists('end_time',$request) ? $request['end_time'] : '';





//        $logs = Db::name('erp_otc_wallet_logs')
//            ->alias('owl')
//            ->join('erp_user u','u.id=owl.user_id')
//            ->field('owl.*,u.real_name,u.login_name')
//            ->limit(15)
//            ->select();

        $map['id'] = ['=', 3];
        $map['user_id'] = ['=', 11];


        $logs = Db::name('erp_otc_wallet_logs')->where($map)->select();

        $this->success('6666666',$logs);
    }


    /**
     * @throws \Exception
     */
    public function get(){



        AlibabaCloud::accessKeyClient('LTAI4G4MZnXQfiQ2U9wtqUmT', '6pZPGEvgPqqznCw5y2Sqm1FBjqPx3u')
            ->regionId('cn-hangzhou')
            ->asDefaultClient();

        try {
            $result = AlibabaCloud::rpc()
                ->product('Dysmsapi')
                ->version('2017-05-25')
                ->action('SendSms')
                ->method('POST')
                ->host('dysmsapi.aliyuncs.com')
                ->options([
                    'query' => [
                        'RegionId' => "cn-hangzhou",
                        'PhoneNumbers' => "13590620208,15626031754",
                        'SignName' => "天音",
                        'TemplateCode' => "SMS_203192342",
                        'TemplateParam' => "{\"code\":\"64533484\"}",
                    ],
                ])
                ->request();
            print_r($result->toArray());
        } catch (ClientException $e) {
            echo $e->getErrorMessage() . PHP_EOL;
        } catch (ServerException $e) {
            echo $e->getErrorMessage() . PHP_EOL;
        }


        $this->success('获取成功');
    }


    public function getMenu(){


        $fields = Db::name('erp_formtpl_fields')->where(['id' => 20561])->find();
//            'create_time' => date("Y-m-d H:i:s"),
//            'update_time' => date("Y-m-d H:i:s"),

//        $createFields = Db::name('erp_formtpl_fields')->insert([
//            'formtpl_id' => 805,
//            'group_id' => 1049,
//            'tables' => 'erp_user',
//            'name' => 'release_chance',
//            'label' => '解绑机会66666',
//            'formtype' => 'text',
//            'sort' => 14
//        ]);


        //->update(['status' => 0])
//
//        $data = Db::name('erp_admin_menu')->where(['name' => ['首页', '区代', '审核', '订单', '财务', '运营', '报表', '工具']])->update(['status' => 0]);
//
//        $sql = Db::name('erp_admin_menu')->getLastSql();


//        $data = Db::name('erp_payment_method')->where($type,'like',"%{$key}%")->where(['delete_time' => null])->limit(100)->select();

        $a = '{"code":"00000","desc":"提交成功","uid":"a025a94922b545e5aec96c8767dbc4b8","result":[{"status":"00000","phone":"13590620208","desc":"提交成功"}]}';

        $b = json_decode($a,true);


        $this->success('',($b['code']));

    }


    public function otcOrder(){

//        return json(Db::name('erp_otc_order')->select());

        return json(Db::name('erp_otc_order')
            ->alias('oo')
            ->join('erp_user_auth u','u.user_id=oo.user_id','LEFT')
            ->join('erp_user ua','ua.id=oo.seller_id','LEFT')
            ->join('erp_otc_entrust e','oo.entrust_id=e.id')
            ->field('oo.*,u.login_name buy,ua.login_name sell,e.entrust_no')
//            ->limit(4000)
            ->select());

        $orders = Db::name('erp_otc_order')
            ->alias('o')
            ->join('erp_user_auth u', 'u.user_id=o.user_id','LEFT')
//            ->join('erp_user_auth u', 'u.user_id=o.seller_id', 'LEFT')
            ->join('erp_otc_entrust e','e.id=o.entrust_id')
            ->field('o.*,u.login_name sell,e.entrust_no')
            ->order('id desc')
            ->limit(5)
            ->select();


        return json($orders);
    }


    public function addOtcOrder(){






        $count = Db::name('erp_otc_order')->count();

        $where = [1,1];

        $limit = count($where) == 0? 20: ($count > 13000 ? 13000 : 5000);




        return $limit;

//        return Db::name('erp_otc_order')->count();



        foreach ($orders as $order){
         Db::name('erp_otc_order')->insert([
             'status' => $order['status'],
             'user_id' => $order['user_id'],
             'entrust_id' => $order['entrust_id'],
             'seller_id' => $order['seller_id'],
             'order_no' => mt_rand(1000000000000000,1000000000000000000),
             'type' => $order['type'],
             'price' => $order['price'],
             'amount' => $order['amount'],
             'num' => $order['num'],
             'coin_id' => $order['coin_id'],
             'cancel_time' => $order['cancel_time'],
             'pay_time' => $order['pay_time'],
             'collect_time' => $order['collect_time'],
             'finished_time' => $order['finished_time'],
             'rate' => $order['rate'],
             'fee' => $order['fee'],
             'entrust_fee' => $order['entrust_fee'],
             'next_time' => $order['next_time'],
             'appeal_id' => $order['appeal_id'],
         ]);
        }
        return json($orders);

    }
}