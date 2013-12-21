<?php

namespace Atomic\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class AtomicUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
