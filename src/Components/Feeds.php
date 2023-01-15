<?php 
namespace OSW3\HtmlParser\Components;

use OSW3\HtmlParser\AbstractComponent;

class Feeds extends AbstractComponent
{
    private const VERSIONS = [
        'application/rss+xml'   => ["RSS 0.90", "RSS 2.0"],
        'application/rdf+xml'   => ["RSS 1.0", "RDF"],
        'application/atom+xml'  => ["ATOM"],
        'text/xml'              => ["XML"],
        'application/xml'       => ["XML"],
    ];

    public function list(): array
    {
        $list = array();

        foreach ($this->link() as $node)
        {
            if ($node->getAttribute('rel') === "alternate")
            {
                $type = $node->getAttribute('type');
                $title = $node->getAttribute('title');
                $href = $node->getAttribute('href');

                if (in_array($type, array_keys(self::VERSIONS)))
                {
                    array_push($list, array(
                        'type' => $type,
                        'title' => $title,
                        'href' => $href,
                    ));
                }
            }
        }

        return $list;
    }
}