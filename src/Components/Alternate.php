<?php 
namespace OSW3\HtmlParser\Components;

use OSW3\HtmlParser\AbstractComponent;

class Alternate extends AbstractComponent
{
    public function list(): array
    {
        $list = array();

        foreach ($this->link() as $node)
        {
            if (preg_match("/^alternate$/i", $node->getAttribute('rel')))
            {
                $type = $node->getAttribute('type');
                $href = $node->getAttribute('href');

                array_push($list, array(
                    'type' => $type,
                    'href' => $href,
                ));
            }
        }

        return $list;
    }
}