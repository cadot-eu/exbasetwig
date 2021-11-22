<?php

namespace Cadotinfo\TwigBundle\Twig;

use Twig\TwigFilter;
use Twig\Extension\AbstractExtension;
use cadotinfo\filebundle\sanitize;

class StringExtension extends AbstractExtension
{
    protected $FileFunctions;



    public function getFilters(): array
    {
        return [
            new TwigFilter('sanitize', [$this, 'sanitize']),
        ];
    }


    public function sanitize($value)
    {
        return $this->sanitize($value);
    }
}
