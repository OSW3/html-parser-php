<?php 
namespace OSW3\HtmlParser\Components;

use OSW3\HtmlParser\Abstract\AbstractComponent;

class OEmbed extends AbstractComponent
{
    private const VERSIONS = [
        'application/json+oembed',
        'application/xml+oembed',
        'text/json+oembed',
        'text/xml+oembed',
    ];

    public function list(): array
    {
        $list = array();

        foreach ($this->link() as $node)
        {
            if ($node->getAttribute('rel') === "alternate")
            {
                $type = $node->getAttribute('type');
                $href = $node->getAttribute('href');

                if (in_array($type, self::VERSIONS))
                {
                    array_push($list, array(
                        'type' => $type,
                        'href' => $href,
                    ));
                }
            }
        }

        return $list;
    }
}