<?php

namespace YMartini\Nova\Permission\Resources\Fields\Permission;

use Laravel\Nova;
use YMartini\Nova\Permission\Concerns;
use YMartini\Nova\Permission\Enums;
use YMartini\Nova\Permission\Fields;

/**
 * @method static static make(string $name = 'Value', string|null $attribute = null, callable|null $resolveCallback = null)
 */
class Value extends Fields\Select
{
  use Concerns\InteractsWithPermissionName;

  public function __construct(string $name = 'Value', ?string $attribute = null, ?callable $resolveCallback = null)
  {
    parent::__construct($name, $attribute, $resolveCallback);

    $this
      ->dependsOn('type', function (Value $field, Nova\Http\Requests\NovaRequest $request, Nova\Fields\FormData $formData) {
        switch ($formData->string('type')) {
        case Enums\PermissionType::resource->value:
          $field->show()->options(static::resourcesOptions());
          break;
        case Enums\PermissionType::tool->value:
          $field->show()->options(static::toolsOptions());
          break;
        default:
          $field->hide()->options([]);
          break;
        }
      })
      ->onlyOnForms();
  }

  public function fillModelWithData(mixed $model, mixed $value, string $attribute)
  {
    $model->fill(['name' => static::permissionNameWithValue($model->name, $value)]);
  }

  protected static function resourcesOptions(): array
  {
    return array_combine(Nova\Nova::$resources, Nova\Nova::$resources);
  }

  protected static function toolsOptions(): array
  {
    $values = array_map(function(Nova\Tool $tool) { return $tool::class; }, Nova\Nova::$tools);
    return array_combine($values, $values);
  }
}
