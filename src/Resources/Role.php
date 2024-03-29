<?php

namespace YMartini\Nova\Permission\Resources;

use YMartini\Nova\Permission\Resource;

abstract class Role extends Resource
{
  public static string $model = \Spatie\Permission\Models\Role::class;

  public static $title = 'name';
}
