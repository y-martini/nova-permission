<?php

namespace YMartini\Nova\Permission\Enums;

enum ResourceAuthorization: string
{
  case view = 'view';
  case create = 'create';
  case update = 'update';
  case delete = 'delete';
  case restore = 'restore';
  case forceDelete = 'forceDelete';

  public static function options(): array
  {
    return array_combine(ResourceAuthorization::values(), ResourceAuthorization::values());
  }

  public static function values(): array
  {
    return array_map(fn(ResourceAuthorization $c) => $c->value, ResourceAuthorization::cases());
  }
}
