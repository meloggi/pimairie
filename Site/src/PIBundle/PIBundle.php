<?php

namespace PIBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class PIBundle extends Bundle
{
  public function getParent()
    {
        return 'FOSUserBundle';
    }

}
