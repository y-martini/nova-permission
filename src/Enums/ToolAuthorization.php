<?php

namespace YMartini\Nova\Permission\Enums;

enum ToolAuthorization: string
{
  case see = 'see';

  public static function options(): array
  {
    return array_combine(ToolAuthorization::values(), ToolAuthorization::values());
  }

  public static function values(): array
  {
    return array_map(fn(ToolAuthorization $c) => $c->value, ToolAuthorization::cases());
  }
}
