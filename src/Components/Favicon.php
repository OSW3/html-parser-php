<?php 
namespace OSW3\HtmlParser\Components;

use DOMElement;
use OSW3\HtmlParser\Abstract\AbstractComponent;

class Favicon extends AbstractComponent 
{
    private ?DOMElement $tag = null;
    private array $url = [];

    public function __construct($document, $url)
    {
        parent::__construct($document);

        $this->url = $url;

        foreach ($this->link() as $node)
        {
            if (preg_match("/^(shortcut icon|fluid-icon|apple-touch-icon)$/i",$node->getAttribute('rel')))
            {
                $this->tag = $node;
                continue;
            }
            else if (
                preg_match("/^icon$/i",$node->getAttribute('rel')) &&
                in_array($node->getAttribute('type'), ['image/png', 'image/x-icon'])
            )
            {
                $this->tag = $node;
                continue;
            }
        }

    }

    public function href(): ?string
    {
        return $this->tag !== null
            ? $this->tag->getAttribute('href')
            : null 
        ;
    }

    public function url(): ?string
    {
        if (!$href = $this->href())
        {
            return null;
        }

        if (preg_match("/^http(s)?/", $href))
        {
            return $href;
        }

        $url = $this->url['protocol'];
        $url.= $this->url['authority'];

        if (substr($href, 0, 1) !== "/")
        {
            $url.= "/";
        }

        $url.= $href;
        
        return $url;
    }

    public function type(): ?string
    {
        return $this->tag !== null 
            ? $this->tag->getAttribute('type')
            : null 
        ;
    }
}