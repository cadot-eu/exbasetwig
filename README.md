# Twig extensions


install by composer

`composer require cadot.eu/twigbundle`

verify in bundles.php the line
`Cadotinfo\TwigBundle\CadotinfoTwigBundle::class => ['all' => true]`

## functions editeur tmce

| twig function     | parameters | description                         |
| ----------------- | ---------- | ----------------------------------- |
| TBtmcerender      | string     | in working                          |
| TBtmcefirstImage  | string     | return first image                  |
| TBtmcefirstHeader | string     | in working                          |
| TBtmcefirstText   | string     | return first texte before pagebreak |

## ancien créateur de template

| twig function | parameters | description |
| ------------- | ---------- | ----------- |
| TBformrow     |            |             |
| TBformcol     |            |             |
| TBformend     | string     |             |

## inplementation de functions du repository

| twig function | parameters                                                                                | description                                            |
| ------------- | ----------------------------------------------------------------------------------------- | ------------------------------------------------------ |
| TBfindall     | string $repository                                                                        | return findall of repository                           |
| TBfind        | string $repository, int $id                                                               | return one entitie from id                             |
| TBfindOneBy   | string $repository, array $criteria, array $orderBy = null                                | return one entity by criteria and by specific order    |
| TBfindBy      | string $repository, array $criteria, array $orderBy = null, $limit = null, $offset = null | return order entiies by criteria with limit and offset |

## implementation de functions php

| twig function | parameters                 | description                        |
| ------------- | -------------------------- | ---------------------------------- |
| TBreorder     | $repository, $donnees = '' | return order datas drom repository |
| TBdd          | string                     | return die and dump of symfony     |
| TBgetenv      | string                     | return variable from $\_ENV        |

## functions d'affichage

| twig function     | parameters                                                                 | description                                               |
| ----------------- | -------------------------------------------------------------------------- | --------------------------------------------------------- |
| TBsanitize        | string                                                                     | return a string clean, without space, character...        |
| TBobjetProperties | object                                                                     | return array of properties object                         |
| TBtxtfromhtml     | string                                                                     | return a string from html decoded and cleaned             |
| TBJsonPretty      | json                                                                       | return a pretty string from json                          |
| TBdatefr          | string date,string format                                                  | return a french date from string with optionnal format    |
| TBimg             | $image, $size = '', $class = '', $style = '', $tooltip = ''                | return img tag with many size with liip and lazy          |
| TBthumbnail       | $image, $modal = true, $tooltip = '', $size = '', $class = '', $style = '' | retunr a tag imag with link and modal preview possibility |
| TBgetico          | $file, $taille = 32                                                        | return a ico from file                                    |
| TBuploadmax       |                                                                            | return the lowest file upload from php and server         |
| TBimgToBase64     |$url,$inline=false                                                          | return a immage code in base64, inline option             |

## functions editeur ejs

| twig function    | parameters                 | description                   |
| ---------------- | -------------------------- | ----------------------------- |
| TBejsrender      | $json, $quality = 'fullhd' | return html from ejs json     |
| TBejsfirstImage  | json                       | return first image from json  |
| TBejsfirstHeader | json                       | return first header from json |
| TBejsfirstText   | json                       | return first test from json   |

## Other functions

| twig function | parameters | description                            |
| ------------- | ---------- | -------------------------------------- |
| TBjsondecode  |            | return a array of json                 |
| TBfaker | string for options | return faker, TBfaker('sentences',3) |
| TBfakeren | string for options | return faker English |

## Tests

` ./vendor/phpunit/phpunit/phpunit tests/functionTest.php `
