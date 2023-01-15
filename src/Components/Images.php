<?php 
namespace OSW3\HtmlParser\Components;

use OSW3\HtmlParser\Abstract\AbstractComponent;

class Images extends AbstractComponent
{
    public function list(): array
    {
        $list = array();
        $img = $this->dom->getElementsByTagName('img');
        
        foreach ($img as $node)
        {
            $src = $node->getAttribute('src');
            $count = 1;
            
            if ($key = array_search($src, array_column($list, 'src')))
            {
                $count = $list[$key]['count']++;
            }
            
            if ($count === 1)
            {
                preg_match("/((^data:image\/(svg)\+xml,)|(\.(jpg|jpeg|png|gif|svg|webp)$))/i", $src, $type);
                $type = count($type) ? end($type) : null;
                $src = $this->absoluteUrl($src);

                array_push($list, array(
                    'src' => $src,
                    'count' => $count,
                    'type' => $type,
                ));
            }
        }

        return $list;
    }
}