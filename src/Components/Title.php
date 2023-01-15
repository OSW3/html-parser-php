<?php
namespace OSW3\HtmlParser\Components;

use OSW3\HtmlParser\Abstract\AbstractComponent;

class Title extends AbstractComponent
{
    public function text(): ?string
    {
        $tag = $this->dom->getElementsByTagName('title')[0];
        
        return $tag 
            ? $tag->textContent 
            : null
        ;
    }

    public function length(): int
    {
        return strlen($this->text());
    }
}