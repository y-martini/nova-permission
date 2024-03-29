<?php

namespace YMartini\Nova\Permission\Resources\Fields\Permission;

use YMartini\Nova\Permission\Concerns;
use YMartini\Nova\Permission\Enums;
use YMartini\Nova\Permission\Fields;

/**
 * @method static static make(string $name = 'Type', string|null $attribute = null, callable|null $resolveCallback = null)
 */
class Type extends Fields\Select
{
  use Concerns\InteractsWithPermissionName;

  public function __construct(string $name = 'Type', ?string $attribute = null, ?callable $resolveCallback = null)
  {
    parent::__construct($name, $attribute, $resolveCallback);

    $this->options(Enums\PermissionType::options())->onlyOnForms();
  }

  public function fillModelWithData(mixed $model, mixed $value, string $attribute)
  {
    $model->fill(['name' => static::permissionNameWithType($model->name, $value)]);
  }
}
