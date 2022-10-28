<?php

namespace App;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Bundle\DebugBundle;
use App\Repository\UserRepository;
use App\Entity\User;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;
}
