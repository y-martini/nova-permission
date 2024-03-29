<?php

namespace YMartini\Nova\Permission\Resources\Fields\Permission;

use Laravel\Nova;

/**
 * @method static static make(string $name = 'Name', string|null $attribute = null, callable|null $resolveCallback = null)
 */
class Name extends Nova\Fields\Text
{
  public function __construct(string $name = 'Name', ?string $attribute = null, ?callable $resolveCallback = null)
  {
    parent::__construct($name, $attribute, $resolveCallback);

    $this->exceptOnForms();
  }
}
