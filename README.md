# Twig extensions

install by

`composer require cadot.info/twigbundle`

verify in bundles.php the line
`Cadotinfo\TwigBundle\CadotinfoTwigBundle::class => ['all' => true]`

## functions editeur tmce

| twig function       | parameters | description                         |
| ------------------- | ---------- | ----------------------------------- |
| TW-tmcerender'      | string     | in working                          |
| TW-tmcefirstImage'  | string     | return first image                  |
| TW-tmcefirstHeader' | string     | in working                          |
| TW-tmcefirstText'   | string     | return first texte before pagebreak |

## ancien créateur de template

| twig function | parameters | description |
| ------------- | ---------- | ----------- |
| TW-formrow'   |            |             |
| TW-formcol'   |            |             |
| TW-formend'   | string     |             |

## inplementation de functions du repository

| twig function | parameters                                                                                | description                                            |
| ------------- | ----------------------------------------------------------------------------------------- | ------------------------------------------------------ |
| TW-findall'   | string $repository                                                                        | return findall of repository                           |
| TW-find'      | string $repository, int $id                                                               | return one entitie from id                             |
| TW-findOneBy' | string $repository, array $criteria, array $orderBy = null                                | return one entity by criteria and by specific order    |
| TW-findBy'    | string $repository, array $criteria, array $orderBy = null, $limit = null, $offset = null | return order entiies by criteria with limit and offset |

## implementation de functions php

| twig function | parameters                 | description                        |
| ------------- | -------------------------- | ---------------------------------- |
| TW-reorder'   | $repository, $donnees = '' | return order datas drom repository |
| TW-dd'        | string                     | return die and dump of symfony     |
| TW-getenv'    | string                     | return variable from $\_ENV        |

## functions d'affichage

| twig function       | parameters                                                                 | description                                               |
| ------------------- | -------------------------------------------------------------------------- | --------------------------------------------------------- |
| TW-sanitize'        | string                                                                     | return a string clean, without space, character...        |
| TW-objetProperties' | object                                                                     | return array of properties object                         |
| TW-txtfromhtml'     | string                                                                     | return a string from html decoded and cleaned             |
| TW-JsonPretty'      | json                                                                       | return a pretty string from json                          |
| TW-datefr'          | string date,string format                                                  | return a french date from string with optionnal format    |
| TW-img'             | $image, $size = '', $class = '', $style = '', $tooltip = ''                | return img tag with many size with liip and lazy          |
| TW-thumbnail'       | $image, $modal = true, $tooltip = '', $size = '', $class = '', $style = '' | retunr a tag imag with link and modal preview possibility |
| TW-getico'          | $file, $taille = 32                                                        | return a ico from file                                    |

## functions editeur ejs

| twig function      | parameters                 | description                   |
| ------------------ | -------------------------- | ----------------------------- |
| TW-ejsrender'      | $json, $quality = 'fullhd' | return html from ejs json     |
| TW-ejsfirstImage'  | json                       | return first image from json  |
| TW-ejsfirstHeader' | json                       | return first header from json |
| TW-ejsfirstText'   | json                       | return first test from json   |
