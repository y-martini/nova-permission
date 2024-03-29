<?php

namespace YMartini\Nova\Permission;

use Laravel\Nova;

abstract class Resource extends Nova\Resource
{
  use Concerns\Authorizable;
}
