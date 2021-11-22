# Twig extensions

install by

verify in bundles.php the line
`Cadotinfo\TwigBundle\CadotinfoTwigBundle::class => ['all' => true]`

The extensions are injected automatically, you can use in your code for example `{{upload_max()}}`

## Die and Dump

implementation in twig of diedump and dump

`{{dd("string array...")}}` and `{{dump("string array...")}}`

## ENV

Return env variable

`{{getenv("var")}}` for example return $\_ENV[var]

## VARS

return all variable global

`{{dollar(post,test)}}` for return $_POST['test']
$type is: post,get,request,session,server

## Repository

implementation of function repository of symfony for fast developpement

function find, findone, findby et findall
`{{findall('page')}}` return array of findall of repository

## Editorjs

functions for editorjs

- ejsrender: render the html of json
- firstImage: return first image of text
- firstHeader: return first header of text
- firstText: return first paragraph of text

## Image

### img

for return a img with src with many size for screen size, you can add liipimagein filter, class, style and tooltype

`{{img($image, $size = '', $class = '', $style = '', $tooltip = '')}}`

example:
` {{img('build/template/main_d-adulte_qui_tient_main_d-enfant_opacity.png','','cover')}}`

```html
<img
  src="http://....com/media/cache/resolve/lazy/build/template/main_d-adulte_qui_tient_main_d-enfant.png"
  data-srcset="
               http://....com/media/cache/resolve/mini/build/template/main_d-adulte_qui_tient_main_d-enfant.png 100w,
              http://....com/media/cache/resolve/petit/build/template/main_d-adulte_qui_tient_main_d-enfant.png 300w,
               http://....com/media/cache/resolve/semi/build/template/main_d-adulte_qui_tient_main_d-enfant.png 450w,
             http://....com/media/cache/resolve/moyen/build/template/main_d-adulte_qui_tient_main_d-enfant.png 600w,
             http://....com/media/cache/resolve/grand/build/template/main_d-adulte_qui_tient_main_d-enfant.png 900w"
  class="lazyautosizes lazyloaded"
  data-sizes="auto"
  style="width:100%;height:100%;"
  alt="Main d'adulte qui tient main d'enfant"
  data-toggle="tooltip"
  data-placement="top"
  title=""
  data-original-title=""
  sizes="664px"
  srcset="
    http://....com/media/cache/resolve/mini/build/template/main_d-adulte_qui_tient_main_d-enfant.png  100w,
    http://....com/media/cache/resolve/petit/build/template/main_d-adulte_qui_tient_main_d-enfant.png 300w,
    http://....com/media/cache/resolve/semi/build/template/main_d-adulte_qui_tient_main_d-enfant.png  450w,
    http://....com/media/cache/resolve/moyen/build/template/main_d-adulte_qui_tient_main_d-enfant.png 600w,
    http://....com/media/cache/resolve/grand/build/template/main_d-adulte_qui_tient_main_d-enfant.png 900w
  "
/>
```

### thumbnails

for return a little image with class, style and modal effect on click

`thumbnail($image, $modal = true, $tooltip = '', $size = '', $class = '', $style = '')`

### getico

return a html image of type file
`{{getico($file, $taille = 32)}}`

## objetPropertie

### objetProperties

clean a objet and return array of properties
`{{objetProperties($objets)}}`

### cleanhtml

return cleanhtml
`{{cleanhtml(string)}}`

## Reorder

twig function of cadot.info reorder
`{{reorder($repository, $donnees = '')}}

## Repository functions

implementation of function Repository

`{{findall(repository)}}`
`{{find(repository,id)}}`
`{{findOneBy(repository,$criteria,orderby=null)}}`
`{{findBy(repository,$criteria,orderby=null,limit=null,offset=null)}}`

## String

`{{sanitize(filename)}}`

## template (no documented)

## tinymce (no documented)

## UuploadMaxExtension

`{{{{upload_max()}}}}
Return size maxi of upload mini from server or php

## View

`{{voir(image or file)}}` return a base64 of image or file pdf
