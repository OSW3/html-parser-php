<?php 
namespace OSW3\HtmlParser\Components;

use OSW3\HtmlParser\AbstractComponent;

class Keywords extends AbstractComponent
{
    public function text(): ?string
    {
        $keywords = null;

        foreach ($this->meta() as $node)
        {
            if (preg_match("/^keywords$/i", $node->getAttribute('name')))
            {
                $keywords = $node->getAttribute('content');
                continue;
            }
        }

        return $keywords;
    }

    public function list(): array
    {
        return array_map(
            fn($str) => trim($str), 
            explode(",", $this->text())
        );
    }

    public function length(): int
    {
        return count($this->list());
    }
}