<?php 
namespace OSW3\HtmlParser\Components;

use OSW3\HtmlParser\Abstract\AbstractComponent;

class Author extends AbstractComponent
{
    public function text(): ?string
    {
        $text = null;

        foreach ($this->meta() as $node)
        {
            if ($node->getAttribute('name') === 'author')
            {
                $text = $node->getAttribute('content');
                continue;
            }
        }

        return $text;
    }
}