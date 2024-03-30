<?php

namespace YMartini\Nova\Permission\Concerns;

use Illuminate\Http;
use Laravel\Nova;
use Spatie\Permission;
use YMartini\Nova\Permission\Enums;

trait InteractsWithPermissions 
{
  use InteractsWithPermissionName;

  protected static function resourceAuthorizedByPermission(Http\Request $request, Enums\ResourceAuthorization $authorization)
  {
    return static::authorizedByPermission($request, Enums\PermissionType::resource, $authorization->value);
  }

  protected static function toolAuthorizedByPermission(Http\Request $request, Enums\ToolAuthorization $authorization)
  {
    return static::authorizedByPermission($request, Enums\PermissionType::tool, $authorization->value);
  }

  protected static function authorizedByPermission(Http\Request $request, Enums\PermissionType $type, string $authorization)
  {
    $permission = static::permissionName($type, static::class, $authorization);

    if(!($user = Nova\Nova::user($request))) {
      return false;
    }

    if(static::hasPermissionTo($user, $permission)) {
      return true;
    }

    foreach ($user->roles as $role) {
      if (static::hasPermissionTo($role, $permission)) {
        return true;
      }
    }

    return static::userHasntRolesNorPermissions($user);
  }

  protected static function hasPermissionTo($model, string $permission): bool
  {
    try {
      return $model->hasPermissionTo($permission);
    } catch (Permission\Exceptions\PermissionDoesNotExist $e) {}

    return false;
  }

  protected static function userHasntRolesNorPermissions($user): bool
  {
    return $user->roles->isEmpty() && $user->permissions->isEmpty();
  }
}
