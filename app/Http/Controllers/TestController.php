<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TestController extends Controller
{
    public static function postQQPay($qq,$price,$orderid){
        // [check] 必须参数
        $appkey = '72cf0545757a0f8ccf95fceafc9196f6'; //从聚合申请的话费充值appkey
        $openid = 'JH226d4ff6d053e47030c479590ccb246d'; //注册聚合账号就会分配的openid，在个人中心可以查看
        $cardid = 220612;//qq充值商品编号
        $orderid = "qq" . $qq . $orderid.time();

        $sign = md5($openid.$appkey.$cardid.$price.$orderid.$qq);
        $url = "http://op.juhe.cn/ofpay/game/order";
        $params = array(
            "cardid" => $cardid,//商品编码，对应接口3的cardid
            "cardnum" => $price,//购买数量
            "orderid" => $orderid,//订单号，8-32位数字字母组合
            "game_userid" => $qq,//游戏玩家账号(game_userid=xxx@162.com$xxx001 xxx@162.com是通行证xxx001是玩家账号)
            "game_area" => "",//游戏所在区域，没有则不填，具体参照接口4返回，URLEncode UTF8
            "game_srv" => "",//游戏所在服务器，没有则不填，具体参照接口4返回，URLEncode UTF8
            "key" => $appkey,//应用APPKEY(应用详细页查询)
            "sign" => $sign,//校验值，md5(&lt;b&gt;OpenID&lt;/b&gt;+key+cardid+cardnum+orderid+game_userid+game_area+game_srv)
        );


        $recharge = new recharge($appkey,$openid);
        $paramstring = http_build_query($params);
        //Log::info("==============".$paramstring);
        $content = $recharge->juhecurl($url,$paramstring);
        $result = json_decode($content,true);
        if($result){
            if($result['error_code']=='0'){
                $returnData['succ'] = 1;
                $returnData['info'] = $result['result'];
                return $returnData;
            }else{
                $returnData['succ'] = 0;
                $returnData['info'] = $result['reason'];
                return $returnData;
            }
        }else{
            $returnData['succ'] = 0;
            $returnData['info'] = "请求失败";
            return $returnData;
        }

    }
}
