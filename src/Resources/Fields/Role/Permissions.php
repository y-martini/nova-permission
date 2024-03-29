<?php

namespace YMartini\Nova\Permission\Resources\Fields\Role;

use Laravel\Nova;

/**
 * @method static static make(string $resource, string $name = 'Permissions', string $attribute = 'permissions') 
 */
class Permissions extends Nova\Fields\BelongsToMany
{
  public function __construct(string $resource, string $name = 'Permissions', string $attribute = 'permissions')
  {
    parent::__construct($name, $attribute, $resource);
  }
}
