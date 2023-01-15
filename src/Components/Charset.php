<?php
namespace OSW3\HtmlParser\Components;

use OSW3\HtmlParser\AbstractComponent;

class Charset extends AbstractComponent
{
    public function charset(): ?string
    {
        $charset = null;

        foreach ($this->meta() as $node) 
        {
            if ($node->getAttribute('charset'))
            {
                $charset = $node->getAttribute('charset');
                continue;
            }
        }
    
        return $charset;
    }
}