<?php

namespace Cadotinfo\TwigBundle\Twig;

use Twig\TwigFilter;
use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;
use Doctrine\ORM\EntityManagerInterface;
use Cadotinfo\EntityBundle\reorder;

class ReorderExtension extends AbstractExtension
{
    protected $em, $fe;


    public function getFunctions(): array
    {
        return [
            new TwigFunction('reorder', [$this, 'reorder']),
        ];
    }

    public function reorder($repository, $donnees = '')
    {
        return $this->reorder($repository, $donnees);
    }
}
