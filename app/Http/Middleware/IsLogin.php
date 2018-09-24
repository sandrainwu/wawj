<?php

namespace App\Http\Middleware;

use Closure;
use Auth;


class IsLogin
{
    /**
     * Handle an incoming request.
     *判断用户是否属于给定用户组之一，且处于登录状态
     多个用户组guard用"_"符号隔开，如user_agent_admin，表示判断用户是否登录，属于任何一个用户组都可以
     用于一些公共操作，例如  getAgencyDetail，该操作user、agent和agency都可以进行，但是其他用户组或者未登录不可以

     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guards)
    {
        
        //这里存放中间件验证之前执行的代码
        //$response=$next($request);
        //这里存放经过中间件验证之后执行的代码
        $guard=explode('_', $guards);
        foreach($guard as $t){
            if(Auth::guard($t)->check()){
                $request->attributes->add(['guardname'=>$t]);
                return $next($request);
            }
        }
        return redirect(route('/'));
    }
}
