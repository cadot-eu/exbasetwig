<?php

namespace Cadotinfo\TwigBundle\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class EnvExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('getenv', [$this, 'getenv']),
            new TwigFunction('url', [$this, 'url'])
        ];
    }

    /**
     * Method getenv for get env superglobal variable
     *
     * @param string $var [variable]
     *
     * @return void
     */
    public function getenv(string $var)
    {
        return $_ENV[$var];
    }








    public function url()
    {
        return ("{% set route =
            path(
              app.request.attributes.get('_route'),
              app.request.attributes.get('_route_params')
            )
          %}
          {% set action =
            path(
              app.request.attributes.get('_route'),
              app.request.attributes.get('_route_params')
            )
              | split('/')
              | last
          %}");
    }
}
