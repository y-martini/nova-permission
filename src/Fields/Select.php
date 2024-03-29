<?php

namespace YMartini\Nova\Permission\Fields;

class Select extends \Laravel\Nova\Fields\Select
{
  public function __construct(...$args)
  {
    parent::__construct(...$args);

    $this->required()->rules('required');
  }
}
