<?php

namespace Cadotinfo\TwigBundle\Twig;

use DOMDocument;
use Twig\TwigFilter;
use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\DependencyInjection\ContainerInterface;

class AllExtension extends AbstractExtension
{
    private $roles, $container;
    public function __construct(Security $security, ContainerInterface $container)
    {
        $this->container = $container;
        if ($security->getUser() !== null)
            $this->roles = ($security->getUser()->getRoles());
    }

    public function getFunctions(): array
    {
        return [
            /* ------------------------- functions editeur tmce ------------------------- */
            new TwigFunction('TBtmcerender', [$this, 'tmcerender', ['is_safe' => ['html']]]),
            new TwigFunction('TBtmcefirstImage', [$this, 'tmcefirstImage', ['is_safe' => ['html']]]),
            new TwigFunction('TBtmcefirstHeader', [$this, 'tmcefirstHeader', ['is_safe' => ['html']]]),
            new TwigFunction('TBtmcefirstText', [$this, 'tmcefirstText', ['is_safe' => ['html']]]),
            /* ----------------------- ancien créateur de template ---------------------- */
            new TwigFunction('TBformrow', [$this, 'formrow'], ['is_safe' => ['html']]),
            new TwigFunction('TBformcol', [$this, 'formcol'], ['is_safe' => ['html']]),
            new TwigFunction('TBformend', [$this, 'formend'], ['is_safe' => ['html']]),
            /* ---------------- inplementation de functions du repository --------------- */
            new TwigFunction('TBfindall', [$this, 'findall']),
            new TwigFunction('TBfind', [$this, 'find']),
            new TwigFunction('TBfindOneBy', [$this, 'findOneBy']),
            new TwigFunction('TBfindBy', [$this, 'findBy']),
            /* --------------------- implementation de functions php -------------------- */
            new TwigFunction('TBreorder', [$this, 'reorder']),
            new TwigFunction('TBdd', [$this, 'dd']),
            new TwigFunction('TBgetenv', [$this, 'getenv']),
            /* -------------------------- functions d'affichage ------------------------- */
            new TwigFilter('TBsanitize', [$this, 'sanitize']),
            new TwigFilter('TBobjetProperties', [$this, 'objetProperties']),
            new TwigFilter('TBtxtfromhtml', [$this, 'txtfromhtml']),
            new TwigFilter('TBJsonPretty', [$this, 'jsonpretty', ['is_safe' => ['html']]]),
            new TwigFunction('TBdatefr', [$this, 'datefr']),
            new TwigFunction('TBimg', [$this, 'img'], ['is_safe' => ['html']]),
            new TwigFunction('TBthumbnail', [$this, 'thumbnail'], ['is_safe' => ['html']]),
            new TwigFunction('TBgetico', [$this, 'getico', ['is_safe' => ['html']]]),
            new TwigFunction('TBuploadmax', [$this, 'max', ['is_safe' => ['html']]]),
            /* -------------------------- functions editeur ejs ------------------------- */
            new TwigFunction('TBejsrender', [$this, 'ejsrender', ['is_safe' => ['html']]]),
            new TwigFunction('TBejsfirstImage', [$this, 'ejsfirstImage', ['is_safe' => ['html']]]),
            new TwigFunction('TBejsfirstHeader', [$this, 'ejsfirstHeader', ['is_safe' => ['html']]]),
            new TwigFunction('TBejsfirstText', [$this, 'ejsfirstText', ['is_safe' => ['html']]]),
            /* ----------------------------- other-fonctions ----------------------------- */
            new TwigFunction('TBactions', [$this, 'actions', ['is_safe' => ['html']]])



        ];
    }
    /* -------------------------------------------------------------------------- */
    /*                            function editeur tmce                           */
    /* -------------------------------------------------------------------------- */
    public function tmcerender($texte)
    {
        return $texte;
        //ajout des finctionnalitées propre à mickcrud
        //travaille sur les images en ajoutant un filtre liip
    }
    public function tmcefirstImage($texte)
    {
        $htmlDom = new DOMDocument;
        @$htmlDom->loadHTML($texte);
        $img = $htmlDom->getElementsByTagName('img')[0];
        if ($this->roles != null or substr(html_entity_decode($value->data->caption), 0, 2) != '¤')
            return $img->getAttribute('src');
    }
    public function tmcefirstHeader($json)
    {

        return 'à faire';
    }
    public function tmcefirstText($texte)
    {
        //dump($texte);
        $pos = strpos($texte, '<!-- pagebreak -->');
        if ($pos !== false)
            return strip_tags(substr($texte, 0, $pos));
        else
            return strip_tags($texte);
    }
    /* -------------------------------------------------------------------------- */
    /*                         ancien createur de template                        */
    /* -------------------------------------------------------------------------- */
    public function formrow()
    {
        return ('<div class="row">');
    }
    public function formend()
    {
        return ('</div>');
    }

    public function formcol($value)
    {
        return '<div class="col-' . $value . '">';
    }

    /* -------------------------------------------------------------------------- */
    /*                  inplementation de functions du repository                 */
    /* -------------------------------------------------------------------------- */
    /**
     * Method findall
     *
     * @param string $repository 
     *
     * @return array of entities
     */
    public function findall(string $repository)
    {
        return $this->em->getRepository("App:" . ucfirst($repository))->findall();
    }
    /**
     * Method find
     *
     * @param string $repository 
     * @param int $id 
     *
     * @return array of entities
     */
    public function find(string $repository, int $id)
    {
        return $this->em->getRepository("App:" . ucfirst($repository))->find($id);
    }

    /**
     * Method findOneBy
     *
     * @param string $repository 
     * @param array $criteria 
     * @param array $orderBy 
     *
     * @return entitie
     */
    public function findOneBy(string $repository, array $criteria, array $orderBy = null)
    {
        return $this->em->getRepository("" . ucfirst($repository))->findOneBy($criteria,  $orderBy = null);
    }
    /**
     * Method findBy
     *
     * @param string $repository 
     * @param array $criteria 
     * @param array $orderBy 
     * @param int $limit  
     * @param int $offset 
     *
     * @return array of entities
     */
    public function findBy(string $repository, array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        return $this->em->getRepository("App:" . ucfirst($repository))->findBy($criteria,  $orderBy = null, $limit = null, $offset = null);
    }
    /* -------------------------------------------------------------------------- */
    /*                       implementation de functions php                      */
    /* -------------------------------------------------------------------------- */
    public function reorder($repository, $donnees = '')
    {
        return $this->reorder($repository, $donnees);
    }
    public function dd($value)
    {
        dd($value);
    }
    public function getenv(string $var)
    {
        return $_ENV[$var];
    }
    /* -------------------------------------------------------------------------- */
    /*                            functions d'affichage                           */
    /* -------------------------------------------------------------------------- */
    public function max()
    {
        $max_upload = (int)(ini_get('upload_max_filesize'));
        $max_post = (int)(ini_get('post_max_size'));
        $memory_limit = (int)(ini_get('memory_limit'));
        return (min($max_upload, $max_post, $memory_limit));
    }
    public function sanitize($value)
    {
        return $this->sanitize($value);
    }
    public function objetProperties($objets)
    {
        $response = [];
        if (is_array($objets)) $objets = $objets[0];
        foreach ((array)$objets as $key => $value) {
            $string = preg_replace('/[\x00]/u', '\\', $key);
            $clef = substr($string, strrpos($string, '\\') + 1);
            $response[] = $clef;
        }
        return $response;
    }
    public function txtfromhtml($str)
    {
        return strip_tags(html_entity_decode($str, ENT_QUOTES));
    }
    public function jsonpretty($json)
    {
        foreach (json_decode($json) as $key => $value) {
            $td = [];
            // if (\is_object($value)) $value = (array)$value;
            foreach ($value as $k => $v) {
                $td[] = "<b>$k</b>: $v";
            }
            $tr[] = \implode(',', $td);
        }

        return implode('<br>', $tr);
    }
    //convertie une date anglaise en fr
    //de la forme datetime
    public function datefr($date, $format)
    {

        $english_days = array(
            'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'
        );
        $french_days = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche');
        $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $french_months = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
        return str_replace($english_months, $french_months, str_replace($english_days, $french_days, date($format, strtotime($date))));
    }
    // renvoie directement une balise img avec son src avec plusieurs taille en fonction de la largeur d'écran
    // combiné avec liipimagine, supporte les class, les styles et le lazy
    public function img($image, $size = '', $class = '', $style = '', $tooltip = '')
    {
        $taille = '100%';
        if (substr($size, 0, strlen('col')) == 'col')
            $taille = strval(intval(intval(substr($size, 3)) * 100 / 12)) . 'vw';
        if (substr($size, -2) == 'vw')
            $taille = $size;
        if (substr($size, -1) == '%')
            $taille = $size;
        $tab = explode('/', $image);
        $alt = str_replace('_', ' ', explode('.', end($tab))[0]);
        $alt = str_replace('-', "'", $alt);
        $return = '
             <img src="' . $this->CacheManager->getBrowserPath($this->Package->getUrl($image), "lazy") . '" 
             data-srcset="
               ' . $this->CacheManager->getBrowserPath($this->Package->getUrl($image), "mini") . ' 100w,
              ' . $this->CacheManager->getBrowserPath($this->Package->getUrl($image), "petit") . ' 300w,
               ' . $this->CacheManager->getBrowserPath($this->Package->getUrl($image), "semi") . ' 450w,
             ' . $this->CacheManager->getBrowserPath($this->Package->getUrl($image), "moyen") . ' 600w,
             ' . $this->CacheManager->getBrowserPath($this->Package->getUrl($image), "grand") . ' 900w"
             class="lazyload ' . $class . '" data-sizes="auto"
            style="width:' . $taille . ';' . $style . '" alt="' . ucfirst($alt) . '"';
        $return .= 'data-toggle="tooltip" data-placement="top" title="' . $tooltip . '"';
        return $return . ' />';
    }
    // renvoie une image en mini de 100px de large par défaut
    //modal permet de cliquer sur l'image pour avoir un apercu en grand
    // possibilité de donner des tailles par exemple:height:100px
    // on peux donner des classes et des styles
    public function thumbnail($image, $modal = true, $tooltip = '', $size = '', $class = '', $style = '')
    {
        $return = '';
        if ($size) $taille = $size;
        else $taille = 'width:100px';
        //détermination du alt
        $tab = explode('/', $image);
        $alt = str_replace('_', ' ', explode('.', end($tab))[0]);
        $alt = str_replace('-', "'", $alt);
        //si on a un tooltip
        if (!$tooltip) {
            $tooltip = $alt;
        } else {
            $alt = $tooltip;
        }
        //correction du répertoire
        if (isset($image)) {
            if (!file_exists($image)) {
                if (file_exists('/app/public/' . $image)) {
                    $image = '/' . $image;
                }
                if (file_exists('/app/public/uploads/' . $image)) {
                    $image = '/uploads/' . $image;
                }
            }
            $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
            switch ($ext) {
                case 'jpg':
                case 'jpeg':
                case 'gif':
                case 'png':
                    $file = $image;
                    if ($modal !== false) {
                        $return =
                            "<a  data-toggle='popover-hover' style=\"cursor:zoom-in;\" data-img=\"" . $this->CacheManager->getBrowserPath($this->Package->getUrl($file), "grand") . "\">";
                    }
                    $return .= '
             <img title="' . $tooltip . '" src="' .  $this->CacheManager->getBrowserPath($this->Package->getUrl($file), "mini") . '"
             class="' . $class . '" style="' . $taille . ';' . $style . '" alt="' . ucfirst($alt) . '"';

                    if ($modal !== false) {
                        $return .= "/></a>";
                    } else {
                        $return .= 'data-toggle="tooltip" data-placement="top" title="' . $tooltip . '" /></a>';
                    }
                    return $return;
                    break;
                default:
                    return "<img src='" . $this->getico($image) . "'>";
                    break;
            }
        } else return 'image non trouvée';
    }

    /**
     * getico return un html img avec une icone représentant l'extensio ndu fichier
     * si la taille est différente on met une taille à l'img
     *
     * @param   string  $file    fichier sur le disque
     * @param   int=32  $taille  
     *
     * @return  string  img base64
     */
    function getico($file, $taille = 32)
    {
        //pour prendre directement en public
        if (!file_exists($file)) {
            if (file_exists('/app/public' . $file)) {
                $file = '/app/public' . $file;
            }
            if (file_exists('/app/public/' . $file)) {
                $file = '/app/public/' . $file;
            }
            if (file_exists('/app/public/uploads/' . $file)) {
                $file = '/app/public/uploads/' . $file;
            }
        }

        $dom = new DOMDocument('1.0', 'utf-8');
        $adresse = '/app/vendor/wgenial/php-mimetypeicon/icons/scalable/' . str_replace('/', '-', mime_content_type($file)) . '.svg';
        $dom->load($adresse);
        $svg = $dom->documentElement;

        if (!$svg->hasAttribute('viewBox')) { // viewBox is needed to establish
            // userspace coordinates
            $pattern = '/^(\d*\.\d+|\d+)(px)?$/'; // positive number, px unit optional

            $interpretable =  preg_match($pattern, $svg->getAttribute('width'), $width) &&
                preg_match($pattern, $svg->getAttribute('height'), $height);

            if ($interpretable) {
                $view_box = implode(' ', [0, 0, $width[0], $height[0]]);
                $svg->setAttribute('viewBox', $view_box);
            } else { // this gets sticky
                throw new Exception("viewBox is dependent on environment");
            }
        }

        $svg->setAttribute('width', $taille);
        $svg->setAttribute('height', $taille);
        $nom = uniqid();
        $dom->save('/tmp/' . $nom . '.svg');
        // if (!file_exists('/app/vendor/wgenial/php-mimetypeicon/icons/' . $taille)) {
        $adresse = '/app/vendor/wgenial/php-mimetypeicon/icons/scalable/' . str_replace('/', '-', mime_content_type($file)) . '.svg';
        return "data:image/svg+xml;base64," . base64_encode($this->unescape(file_get_contents('/tmp/' . $nom . '.svg')));
        // }

        //ancien système avec image
        // $adresse = '/app/vendor/wgenial/php-mimetypeicon/icons/' . $taille . '/' . str_replace('/', '-', mime_content_type(getcwd() . $file)) . '.png';
        // $imageData = base64_encode(file_get_contents($adresse));
        // return 'data: ' . mime_content_type(getcwd() . $file) . ';base64,' . $imageData;
    }
    /* -------------------------------------------------------------------------- */
    /*                            functions editeur ejs                           */
    /* -------------------------------------------------------------------------- */
    public function ejsrender($json, $quality = 'fullhd')
    {
        //dump($json);
        $tabs = json_decode($json);
        //on liste les objets
        foreach ($tabs->blocks as $num => $tab) {
            $data = '';
            switch ($tab->type) {
                case 'paragraph':
                case 'header':
                    $data = $tab->data->text;
                    if (substr(html_entity_decode($data), 0, 2) == '¤') $tabs->blocks[$num]->data->text = substr($tab->data->text, 2);
                    break;
                case 'image':
                    $data = $tab->data->caption;
                    if (substr(html_entity_decode($data), 0, 2) == '¤') $tabs->blocks[$num]->data->caption = substr($tab->data->caption, 2);
                    $width = getimagesize(getcwd() . $tab->data->url)[0];
                    //limit width
                    if ($width > 1920) {
                        $imagineCacheManager = $this->container->get('liip_imagine.cache.manager');
                        $resolvedPath = $imagineCacheManager->getBrowserPath($tab->data->url, $quality);
                        $tabs->blocks[$num]->data->url = $resolvedPath;
                    }
                    break;
            }
            //si pas le droit de voir on supprime
            if (strpos($data, '¤') !== false)
                if (substr(html_entity_decode($data), 0, 2) == '¤' and $this->roles == null)
                    unset($tabs->blocks[$num]);
        }

        $json = json_encode($tabs);
        $html = null;
        if ($tabs->blocks)
            $html = new \Twig\Markup(Parser::parse($json)->toHtml(), 'UTF-8');
        //ajout des finctionnalitées propre à mickcrud
        //travaille sur les images en ajoutant un filtre liip
        return $html;
    }
    public function ejsfirstImage($json)
    {

        $tab = json_decode($json)->blocks;
        foreach ($tab as $key => $value) {
            if ($value->type == 'image') {
                if ($this->roles != null or substr(html_entity_decode($value->data->caption), 0, 2) != '¤')
                    return $value->data->url;
            }
        }
        //return $html;
    }
    public function ejsfirstHeader($json)
    {
        $tab = json_decode($json)->blocks;
        foreach ($tab as $key => $value) {
            if ($value->type == 'header')
                if ($this->roles != null or substr(html_entity_decode($value->data->text), 0, 2) != '¤')
                    return strip_tags(str_replace('¤', '', $value->data->text));
        }
        //return $html;
    }
    public function ejsfirstText($json)
    {
        $tab = json_decode($json)->blocks;
        foreach ($tab as $key => $value) {
            if ($value->type == 'paragraph')
                if ($this->roles != null or substr(html_entity_decode($value->data->text), 0, 2) != '¤')
                    return strip_tags(str_replace('¤', '', $value->data->text));
        }
    }






    /* -------------------------------------------------------------------------- */
    /*                               sous-founctions                              */
    /* -------------------------------------------------------------------------- */
    //pour le svg
    //nettoie le svg pour pouvoir le convertir en base64
    function unescape($str)
    {
        $ret = '';
        $len = strlen($str);
        for ($i = 0; $i < $len; $i++) {
            if ($str[$i] == '%' && $str[$i + 1] == 'u') {
                $val = hexdec(substr($str, $i + 2, 4));
                if ($val < 0x7f) {
                    $ret .= chr($val);
                } elseif ($val < 0x800) {
                    $ret .= chr(0xc0 | ($val >> 6)) . chr(0x80 | ($val & 0x3f));
                } else {
                    $ret .= chr(0xe0 | ($val >> 12)) . chr(0x80 | (($val >> 6) & 0x3f)) . chr(0x80 | ($val & 0x3f));
                }
                $i += 5;
            } elseif ($str[$i] == '%') {
                $ret .= urldecode(substr($str, $i, 3));
                $i += 2;
            } else {
                $ret .= $str[$i];
            }
        }
        return $ret;
    }

    /* -------------------------------------------------------------------------- */
    /*                               other functions                              */
    /* -------------------------------------------------------------------------- */
    public function url(Twig_Environment $twig)
    {
        return $twig->render("{% set route =
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
