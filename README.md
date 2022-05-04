# Twig extensions
[![Quality Gate Status](https://sonarcloud.io/api/project_badges/measure?project=cadot-eu_twigbundle&metric=alert_status)](https://sonarcloud.io/summary/new_code?id=cadot-eu_twigbundle)

install by composer

`composer require cadot.eu/twigbundle`

verify in bundles.php the line
`Cadoteu\TwigBundle\CadoteuTwigBundle::class => ['all' => true]`

## implementation de functions php

| twig function | parameters | description                    |
| ------------- | ---------- | ------------------------------ |
| TBdd          | string     | return die and dump of symfony |
| TBgetenv      | string     | return variable from $\_ENV    |

## functions d'affichage

| twig function     | parameters         | description                                        |
| ----------------- | ------------------ | -------------------------------------------------- |
| TBsanitize        | string             | return a string clean, without space, character... |
| TBobjetProperties | object             | return array of properties object                  |
| TBtxtfromhtml     | string             | return a string from html decoded and cleaned      |
| TBJsonPretty      | json               | return a pretty string from json                   |
| TBuploadmax       |                    | return the lowest file upload from php and server  |
| TBimgToBase64     | $url,$inline=false | return a immage code in base64, inline option      |

## Other functions

| twig function | parameters         | description                          |
| ------------- | ------------------ | ------------------------------------ |
| TBjsondecode  |                    | return a array of json               |
| TBfaker       | string for options | return faker, TBfaker('sentences',3) |
| TBfakeren     | string for options | return faker English                 |

## Tests

` ./vendor/phpunit/phpunit/phpunit tests/functionTest.php `
