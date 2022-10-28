<?php

namespace App;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Bundle\DebugBundle;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;
}
