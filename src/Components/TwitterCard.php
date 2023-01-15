<?php 
namespace OSW3\HtmlParser\Components;

use OSW3\HtmlParser\AbstractComponent;

class TwitterCard extends AbstractComponent
{
    private array $list = array();

    public function __construct($document)
    {
        parent::__construct($document);

        foreach ($this->meta() as $node)
        {
            if (($twtrTag = $node->getAttribute('name')) && $this->isTwitterCard($node->getAttribute('name')))
            {
                $twtrContent  = $node->getAttribute('content');
                $twtrTagArr   = explode(":", $twtrTag);
                $twtrName     = isset($twtrTagArr[1]) ? $twtrTagArr[1] : null;

                array_push($this->list, array(
                    'tag' => $twtrTag,
                    'name' => $twtrName,
                    'content' => $twtrContent,
                ));
            }
        }
    }

    public function list(): array
    {
        return $this->list;
    }

    public function card(): ?string
    {
        return $this->getTagValues('card');
    }

    public function site(): ?string
    {
        return $this->getTagValues('site');
    }

    public function creator(): ?string
    {
        return $this->getTagValues('creator');
    }

    public function title(): ?string
    {
        return $this->getTagValues('title');
    }

    public function description(): ?string
    {
        return $this->getTagValues('description');
    }

    public function image(): ?string
    {
        return $this->getTagValues('image');
    }

    public function url(): ?string
    {
        return $this->getTagValues('url');
    }

    public function domain(): ?string
    {
        return $this->getTagValues('domain');
    }

    public function app(): ?string
    {
        return $this->getTagValues('app');
    }



    // twitter:app:name:iphone" content="App Name"/>
    // twitter:app:id:iphone" content="App ID"/>
    // twitter:app:name:ipad" content="App Name"/>
    // twitter:app:id:ipad" content="App ID"/>
    // twitter:app:name:googleplay" content="App Name"/>
    // twitter:app:id:googleplay" content="App ID"/>

    // twitter:player" content="URL of the player"/>
    // twitter:player:width" content="Width of the player"/>
    // twitter:player:height" content="Height of the player"/>
    // twitter:player:stream" content="URL of the stream"/>
    // twitter:player:stream:content_type" content="Content type of the stream"/>

    // twitter:image:src" content="Image URL"/>
    // twitter:image:width" content="Width of the image"/>
    // twitter:image:height" content="Height of the image"/>
    // twitter:image0" content="Image URL"/>
    // twitter:image1" content="Image URL"/>
    // twitter:image2" content="Image URL"/>
    // twitter:image3" content="Image URL"/>

    // twitter:data1" content="Data 1 Value"/>
    // twitter:label1" content="Data 1 Label"/>
    // twitter:data2" content="Data 2 Value"/>
    // twitter:label2" content="Data 2 Label"/>


    private function getTagValues(string $tag): string|array|null
    {
        $data = array();

        foreach ($this->list as $item)
        {
            if ($item['name'] === $tag && !isset($item['property']))
            {
                array_push($data, $item['content']);
            }
        }

        switch (count($data))
        {
            case 0: return null;
            case 1: return $data[0];
            default:return $data;
        }
    }

    private function isTwitterCard($property)
    {
        return preg_match("/^twitter:/", $property);
    }
}