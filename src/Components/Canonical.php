<?php 
namespace OSW3\HtmlParser\Components;

use OSW3\HtmlParser\AbstractComponent;

class Canonical extends AbstractComponent
{
    public function url(): ?string
    {
        $href = null;

        foreach ($this->link() as $node)
        {
            if (preg_match("/^canonical$/i", $node->getAttribute('rel')))
            {
                $href = $node->getAttribute('href');
                continue;
            }
        }

        return $href;
    }
}