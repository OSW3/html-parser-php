<?php 
namespace OSW3\HtmlParser\Components;

use OSW3\HtmlParser\Abstract\AbstractComponent;

class Description extends AbstractComponent
{
    public function text(): ?string
    {
        $text = null;

        foreach ($this->meta() as $node)
        {
            if ($node->getAttribute('name') === 'description')
            {
                $text = $node->getAttribute('content');
                continue;
            }
        }

        return $text;
    }

    public function length(): int
    {
        return strlen($this->text());
    }

    public function words(): int
    {
        $words = explode(" ", $this->text());
        
        return count($words);
    }
}