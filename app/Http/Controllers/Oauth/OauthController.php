<?php

namespace App\Http\Controllers\Oauth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OauthController extends Controller
{
    /**
     * 认证成功后的回调接口（权限方发起的）
     *
     * @param Request $request
     * @return void
     */
    public function oauth(Request $request)
    {
        $post_data = array('client_id' => config('auth.git_cid'),
            'client_secret' => config('auth.git_secret'),
            'code' => $request['code']);

        $token = $this->curl_post(config('auth.git_token_url'),$post_data);

        $result = $this->curl_get('https://api.github.com/user?' . $token);

        $json_data = json_decode($result,1);

        $user_data = array('user_name' => $json_data['login'], 
                    'avator_url' => $json_data['avatar_url'],
                    'user_email' => $json_data['email']);

        session($user_data);

        return back();
    }

    /**
     * 请求github认证
     *
     * @return 重定向到github/login
     */
    public function login_git()
    {
        return redirect(config('auth.git_auth_url'));
    }


    public function logout(Request $request)
    {
        $request->session()->flush();
        return back();
    }

    public function curl_get($url)
    {
        $client = curl_init($url);

        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($client, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_3) 
        AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36');

        $result = curl_exec($client);

        curl_close($client);
        
        return $result;
    }

    public function curl_post($url, $arr_data)
    {
        $post_data = http_build_query($arr_data);

        $client = curl_init();

        curl_setopt($client, CURLOPT_URL, $url);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($client, CURLOPT_POST, 1);
        curl_setopt($client, CURLOPT_POSTFIELDS, $post_data);

        $result = curl_exec($client);

        curl_close($client);

        return $result;

    }
}