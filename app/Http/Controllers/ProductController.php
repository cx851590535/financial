<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProductController extends Controller
{
    //获取商品列表
    public function getList(Request $request){
        $httpClient = new Client();
        $response = $httpClient->get('http://www.51meihou.com/fx/open.php?c=product&a=index',['query' => 'sign=a6cbAFZVBAgJAwZWBAFbAABSWgMGVgYGAFJVAAcGWgwSB1ATAzZ8dUhH']);
        $result = json_decode($response->getBody()->getContents());
        dd($result) ;
        if($result['code'] == 0){
            return null;
        }

        return $result['data'];
        $res = $client -> request('GET','http://www.51meihou.com/fx/open.php?c=product&a=index',['query' => 'sign=a6cbAFZVBAgJAwZWBAFbAABSWgMGVgYGAFJVAAcGWgwSB1ATAzZ8dUhH']);
        echo $res->getStatusCode();
// "200"
        //Secho $res->getHeader('content-type');
// 'application/json; charset=utf8'
        dd($res->getBody()) ;

    }
}
