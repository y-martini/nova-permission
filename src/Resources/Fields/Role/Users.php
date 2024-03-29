<?php

namespace YMartini\Nova\Permission\Resources\Fields\Role;

use Laravel\Nova;

/**
 * @method static static make(string $resource, string $name = 'Users', string $attribute = 'users') 
 */
class Users extends Nova\Fields\MorphedByMany
{
  public function __construct(string $resource, string $name = 'Users', string $attribute = 'users')
  {
    parent::__construct($name, $attribute, $resource);
  }
}
