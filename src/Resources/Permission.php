<?php

namespace YMartini\Nova\Permission\Resources;

use YMartini\Nova\Permission\Resource;

abstract class Permission extends Resource
{
  public static string $model = \Spatie\Permission\Models\Permission::class;

  public static $title = 'name';
}
