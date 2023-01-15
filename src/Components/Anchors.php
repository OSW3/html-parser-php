<?php 
namespace OSW3\HtmlParser\Components;

use OSW3\HtmlParser\Abstract\AbstractComponent;

class Anchors extends AbstractComponent
{
    public function list(): array
    {
        $list = array();
        $img = $this->dom->getElementsByTagName('a');
        
        foreach ($img as $node)
        {
            $label = $node->textContent;
            $href = $node->getAttribute('href');
            $title = $node->getAttribute('title');
            $target = $node->getAttribute('target');
            $rel = $node->getAttribute('rel');
            $aria_label = $node->getAttribute('aria-label');
            $url = $this->absoluteUrl($href);

            array_push($list, array(
                'label'     => $label,
                'title'     => $title,
                'href'      => $href,
                'url'       => $url,
                'target'    => $target,
                'rel'       => $rel,
                'aria-label' => $aria_label,
            ));
        }

        return $list;
    }
}