<?php 
namespace OSW3\HtmlParser\Components;

use OSW3\HtmlParser\Abstract\AbstractComponent;

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
        $list = array();

        if (!empty(trim($this->text()))) $list = array_map(
            fn($str) => trim($str), 
            explode(",", $this->text())
        );

        return $list;
    }

    public function length(): int
    {
        return count($this->list());
    }
}