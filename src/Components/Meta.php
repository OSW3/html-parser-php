<?php
namespace OSW3\HtmlParser\Components;

use OSW3\HtmlParser\AbstractComponent;

class Meta extends AbstractComponent
{
    public function list(): array
    {
        $list = array();

        foreach ($this->meta() as $node)
        {
            $tagType = null;
            $key     = null;
            $content = null;

            if ($tagType = $node->getAttribute('charset'))
            {
                $type = "charset";
            }
            else if ($tagType = $node->getAttribute('property'))
            {
                $type = "property";
            }
            else if ($tagType = $node->getAttribute('name'))
            {
                $type = "name";
            }
            else if ($tagType = $node->getAttribute('http-equiv'))
            {
                $type = "http-equiv";
            }
            
            switch ($type)
            {
                case 'charset': 
                    $key = 'charset';
                    $content = $tagType;
                break;

                default:
                    $key = $tagType;
                    $content = $node->getAttribute('content');
                break;
            }
            
            array_push($list, array(
                'type' => $type,
                'key' => $key,
                'content' => $content,
            ));
        }

        return $list;
    }
}