<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    public function index(Request $request): Response
    {
        $redisKey = 'usuarios';
        $cacheTimeout = 60;

        if (Redis::exists($redisKey)) {
            $usuariosJson = Redis::get($redisKey);
            $usuarios = \json_decode($usuariosJson);
        } else {
            $usuarios = User::all(['id', 'name'])
                ->toArray();

            $usuariosJson = \json_encode($usuarios);

            Redis::set($redisKey, $usuariosJson, 'EX', $cacheTimeout);
        }

        return \response($usuarios, Response::HTTP_OK);
    }
}