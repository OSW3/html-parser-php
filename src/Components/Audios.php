<?php 
namespace OSW3\HtmlParser\Components;

use OSW3\HtmlParser\Abstract\AbstractComponent;

class Audios extends AbstractComponent
{
    public function list(): array
    {
        $list = array();

        $audioTags = $this->dom->getElementsByTagName('audio');
        
        foreach ($audioTags as $node)
        {
            // TODO: try with <audio autoplay="false">
            $autoplay   = $node->hasAttribute('autoplay');
            $controls   = $node->hasAttribute('controls');
            $loop       = $node->hasAttribute('loop');
            $muted      = $node->hasAttribute('muted');
            $preload    = $node->getAttribute('preload');
            $sources    = array();

            if ($src = $node->getAttribute('src'))
            {
                $type = $node->getAttribute('type');

                $srcset = $node->getAttribute('srcset');
                $srcset = $this->absoluteUrl($srcset);
                
                $src = $this->absoluteUrl($src);

                array_push($sources, array(
                    'src' => $src,
                    'srcset' => $srcset,
                    'type' => $type,
                ));
            }

            $sourceTags = $node->getElementsByTagName('source');
            foreach ($sourceTags as $sourceTag)
            {
                $type = $sourceTag->getAttribute('type');

                $src = $sourceTag->getAttribute('src');
                $src = $this->absoluteUrl($src);
                
                $srcset = $sourceTag->getAttribute('srcset');
                $srcset = $this->absoluteUrl($srcset);

                array_push($sources, array(
                    'src' => $src,
                    'srcset' => $srcset,
                    'type' => $type,
                ));
            }

            array_push($list, array(
                'autoplay' => $autoplay,
                'controls' => $controls,
                'loop' => $loop,
                'muted' => $muted,
                'preload' => $preload,
                'sources' => $sources,
            ));
            // }
        }

        return $list;
    }
}