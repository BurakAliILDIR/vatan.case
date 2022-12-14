<?php

namespace App\Http\Controllers;

use App\Enum\Common\ResponseTypeEnum;
use App\Helper\Common\ResponseHelper;
use App\Http\Requests\User\UserInsertRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Models\User;

class UserController extends Controller
{
    function list()
    {
        $users = User::query()->get();
        return ResponseHelper::json_response(ResponseTypeEnum::SUCCESS, 'Kullanıcılar listelendi.', $users);
    }

    function insert( UserInsertRequest $request )
    {
        $user = User::query()->create($request->validated());
        return ResponseHelper::json_response(ResponseTypeEnum::SUCCESS, 'Kullanıcı başarıyla eklendi.', $user);
    }

    function update( UserUpdateRequest $request, User $user )
    {
        $user->update($request->validated());
        return ResponseHelper::json_response(ResponseTypeEnum::SUCCESS, 'Kullanıcı bilgisi güncellendi.', NULL);
    }

    function delete( User $user )
    {
        $user->delete();
        return ResponseHelper::json_response(ResponseTypeEnum::SUCCESS, 'Kullanıcı silindi.', NULL);
    }

    function destroy( User $all_user_find )
    {
        $all_user_find->forceDelete();
        return ResponseHelper::json_response(ResponseTypeEnum::SUCCESS, 'Kullanıcı tamamen silindi.', NULL);
    }
}
