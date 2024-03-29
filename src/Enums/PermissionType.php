<?php

namespace YMartini\Nova\Permission\Enums;

enum PermissionType: string
{
  case resource = 'resource';
  case tool = 'tool';

  public static function options(): array
  {
    return array_combine(PermissionType::values(), PermissionType::values());
  }

  public static function values(): array
  {
    return array_map(fn(PermissionType $c) => $c->value, PermissionType::cases());
  }
}
