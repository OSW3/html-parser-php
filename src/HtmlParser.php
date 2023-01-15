<?php 
namespace OSW3\HtmlParser;

use OSW3\HtmlParser\Abstract\AbstractParser;

class HtmlParser extends AbstractParser
{
    public function __construct(string $document = "")
    {
        $this->document = $document;
    }
    
    public function content()
    {
        return $this->document;
    }
}