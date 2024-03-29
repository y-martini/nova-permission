<?php

namespace YMartini\Nova\Permission\Concerns;

use YMartini\Nova\Permission\Enums;

trait InteractsWithPermissionName
{
  protected static string $format = 'nova.{type}.{value}.{authorization}';

  protected static function permissionName(Enums\PermissionType $type, string $value, string $authorization): string
  {
    return static::permissionNameWithType(
      static::permissionNameWithValue(
        static::permissionNameWithAuthorization(null, $authorization),
        $value
      ),
      $type->value
    );
  }

  protected static function permissionNameWithAuthorization(?string $name, string $authorization): string
  {
    return str_replace('{authorization}', $authorization, $name ?? static::$format);
  }

  protected static function permissionNameWithType(?string $name, string $type): string
  {
    return str_replace('{type}', $type, $name ?? static::$format);
  }

  protected static function permissionNameWithValue(?string $name, string $value): string
  {
    return str_replace('{value}', $value, $name ?? static::$format);
  }
}
