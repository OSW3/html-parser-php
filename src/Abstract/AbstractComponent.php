<?php
namespace OSW3\HtmlParser\Abstract;

use DOMDocument;
use DOMNodeList;

abstract class AbstractComponent
{
    protected DOMDocument $dom;
    protected string|null $value = null;
    protected $baseHref;


    public function __construct($document, $baseHref = "/")
    {
        libxml_use_internal_errors(true);
        $this->dom = new \DOMDocument;
        $this->dom->loadHTML($document);

        $this->baseHref = $baseHref;
    }

    protected function html()
    {
        return $this->dom->getElementsByTagName('html')[0];
    }

    /**
     * Return <meta> tags
     *
     * @return void
     */
    protected function meta(): DOMNodeList
    {
        return $this->dom->getElementsByTagName('meta');
    }

    /**
     * Return <link> tags
     *
     * @return void
     */
    protected function link(): DOMNodeList
    {
        return $this->dom->getElementsByTagName('link');
    }

    protected function absoluteUrl($href): ?string
    {
        if (!$href)
        {
            return null;
        }

        if (preg_match("/^http(s)?/", $href))
        {
            return $href;
        }

        $url = $this->baseHref;

        if (substr($href, 0, 1) !== "/")
        {
            $url.= "/";
        }

        $url.= $href;
        
        return $url;
    }
}
