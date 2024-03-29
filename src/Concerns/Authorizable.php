<?php

namespace YMartini\Nova\Permission\Concerns;

use Illuminate\Http;
use Laravel\Nova;
use YMartini\Nova\Permission\Enums;

trait Authorizable
{
  use InteractsWithPermissions;
  use Nova\Authorizable;

  public function authorizeToViewAny(Http\Request $request)
  {
    parent::authorizeToViewAny($request);
    static::authorizeByPermission($request, Enums\ResourceAuthorization::view);
  }

  public static function authorizedToViewAny(Http\Request $request)
  {
    return 
      parent::authorizedToViewAny($request) 
      && static::resourceAuthorizedByPermission($request, Enums\ResourceAuthorization::view);
  }

  public function authorizeToView(Http\Request $request)
  {
    parent::authorizeToView($request);
    static::authorizeByPermission($request, Enums\ResourceAuthorization::view);
  }

  public function authorizedToView(Http\Request $request)
  {
    return 
      parent::authorizedToView($request) 
      && static::resourceAuthorizedByPermission($request, Enums\ResourceAuthorization::view);
  }

  public static function authorizeToCreate(Http\Request $request)
  {
    parent::authorizeToCreate($request);
    static::authorizeByPermission($request, Enums\ResourceAuthorization::create);
  }

  public static function authorizedToCreate(Http\Request $request)
  {
    return 
      parent::authorizedToCreate($request) 
      && static::resourceAuthorizedByPermission($request, Enums\ResourceAuthorization::create);
  }

  public function authorizeToUpdate(Http\Request $request)
  {
    parent::authorizeToUpdate($request);
    static::authorizeByPermission($request, Enums\ResourceAuthorization::update);
  }

  public function authorizedToUpdate(Http\Request $request)
  {
    return 
      parent::authorizedToUpdate($request) 
      && static::resourceAuthorizedByPermission($request, Enums\ResourceAuthorization::update);
  }

  public function authorizeToDelete(Http\Request $request)
  {
    parent::authorizeToDelete($request);
    static::authorizeByPermission($request, Enums\ResourceAuthorization::delete);
  }

  public function authorizedToDelete(Http\Request $request)
  {
    return 
      parent::authorizedToDelete($request) 
      && static::resourceAuthorizedByPermission($request, Enums\ResourceAuthorization::delete);
  }

  public function authorizedToRestore(Http\Request $request)
  {
    parent::authorizeToRestore($request);
    static::authorizeByPermission($request, Enums\ResourceAuthorization::restore);
  }

  public function authorizedToForceDelete(Http\Request $request)
  {
    parent::authorizeToForceDelete($request);
    static::authorizeByPermission($request, Enums\ResourceAuthorization::forceDelete);
  }

  protected static function authorizeByPermission(Http\Request $request, Enums\ResourceAuthorization $authorization)
  {
    if (!static::resourceAuthorizedByPermission($request, $authorization)) {
      throw new \Illuminate\Auth\Access\AuthorizationException;
    }
  }
}
