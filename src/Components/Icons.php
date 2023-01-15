<?php 
namespace OSW3\HtmlParser\Components;

use DOMElement;
use OSW3\HtmlParser\AbstractComponent;

class Icons extends AbstractComponent
{
    // private array $url = [];

    // public function __construct($document, $url)
    // {
    //     parent::__construct($document);

    //     $this->url = $url;
    // }

    public function list(): array
    {
        $list = array();

        foreach ($this->link() as $node)
        {
            if (preg_match("/^(icon|shortcut icon|fluid-icon|apple-touch-icon|image_src|logo)$/i",$node->getAttribute('rel')))
            {
                $rel = $node->getAttribute('rel');
                $href = $node->getAttribute('href');
                $url = $this->url($href);
                $type = $this->type($node);

                array_push($list, array(
                    'rel' => $rel,
                    'href' => $href,
                    'url' => $url,
                    'type' => $type,
                ));
            }
        }
        
        return $list;
    }

    // public function url($href): ?string
    // {
    //     if (!$href)
    //     {
    //         return null;
    //     }

    //     if (preg_match("/^http(s)?/", $href))
    //     {
    //         return $href;
    //     }

    //     $url = $this->url['protocol'];
    //     $url.= $this->url['authority'];

    //     if (substr($href, 0, 1) !== "/")
    //     {
    //         $url.= "/";
    //     }

    //     $url.= $href;
        
    //     return $url;
    // }

    public function type(DOMElement $node): ?string
    {
        return $node !== null 
            ? $node->getAttribute('type')
            : null 
        ;
    }
}