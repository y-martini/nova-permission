<?php

namespace YMartini\Nova\Permission\Resources\Fields\Permission;

use Laravel\Nova;
use YMartini\Nova\Permission\Concerns;
use YMartini\Nova\Permission\Enums;
use YMartini\Nova\Permission\Fields;

/**
 * @method static static make(string $name = 'Authorization', string|null $attribute = null, callable|null $resolveCallback = null)
 */
class Authorization extends Fields\Select
{
  use Concerns\InteractsWithPermissionName;

  public function __construct(string $name = 'Authorization', ?string $attribute = null, ?callable $resolveCallback = null)
  {
    parent::__construct($name, $attribute, $resolveCallback);

    $this
      ->dependsOn('type', function (Authorization $field, Nova\Http\Requests\NovaRequest $request, Nova\Fields\FormData $formData) {
        switch ($formData->string('type')) {
        case Enums\PermissionType::resource->value:
          $field->show()->options(static::resourceOptions());
          break;
        case Enums\PermissionType::tool->value:
          $field->show()->options(static::toolOptions());
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
    $model->fill(['name' => static::permissionNameWithAuthorization($model->name, $value)]);
  }

  protected static function resourceOptions(): array
  {
    return Enums\ResourceAuthorization::options();
  }

  protected static function toolOptions(): array
  {
    return Enums\ToolAuthorization::options();
  }
}
