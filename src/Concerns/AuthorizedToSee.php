<?php

namespace YMartini\Nova\Permission\Concerns;

use Illuminate\Http;
use Laravel\Nova;
use YMartini\Nova\Permission\Enums;

trait AuthorizedToSee
{
  use InteractsWithPermissions;
  use Nova\AuthorizedToSee;

  public function authorizedToSee(Http\Request $request)
  {
    return
      parent::authorizedToSee($request)
      && static::toolAuthorizedByPermission($request, Enums\ToolAuthorization::see);
  }
}
