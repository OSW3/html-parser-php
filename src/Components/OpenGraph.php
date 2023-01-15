<?php 
namespace OSW3\HtmlParser\Components;

use OSW3\HtmlParser\AbstractComponent;

class OpenGraph extends AbstractComponent
{
    private array $list = array();

    public function __construct($document)
    {
        parent::__construct($document);

        foreach ($this->meta() as $node)
        {
            $metaType = null;

            if (($ogTag = $node->getAttribute('property')) && $this->isOpenGraph($node->getAttribute('property')))
            {
                $metaType = "property";
            }
            else if (($ogTag = $node->getAttribute('name')) && $this->isOpenGraph($node->getAttribute('name')))
            {
                $metaType = "name";
            }

            if ($metaType)
            {
                $ogContent  = $node->getAttribute('content');
                $ogTagArr   = explode(":", $ogTag);
                $ogName     = isset($ogTagArr[1]) ? $ogTagArr[1] : null;
                $ogProperty = isset($ogTagArr[2]) ? $ogTagArr[2] : null;

                $item = array(
                    'metaType' => $metaType,
                    'tag' => $ogTag,
                    'name' => $ogName,
                    'content' => $ogContent,
                );

                if ($ogProperty)
                {
                    $item['property'] = $ogProperty;
                }

                array_push($this->list, $item);
            }
        }
    }

    public function list(): array
    {
        return $this->list;
    }

    public function title(): string|array|null
    {
        return $this->getTagValues('title');
    }

    public function type(): string|array|null
    {
        return $this->getTagValues('type');
    }

    public function image(): string|array|null
    {
        return $this->getTagValues('image');
    }

    public function url(): string|array|null
    {
        return $this->getTagValues('url');
    }

    public function description(): string|array|null
    {
        return $this->getTagValues('description');
    }

    public function locale(): string|array|null
    {
        return $this->getTagValues('locale');
    }

    public function site_name(): string|array|null
    {
        return $this->getTagValues('site_name');
    }

    public function audio(): string|array|null
    {
        return $this->getTagValues('audio');
    }

    public function video(): string|array|null
    {
        return $this->getTagValues('video');
    }

    public function determiner(): string|array|null
    {
        return $this->getTagValues('determiner');
    }

    public function updated_time(): string|array|null
    {
        return $this->getTagValues('updated_time');
    }

    public function see_also(): string|array|null
    {
        return $this->getTagValues('see_also');
    }

    public function locality(): string|array|null
    {
        return $this->getTagValues('locality');
    }

    public function region(): string|array|null
    {
        return $this->getTagValues('region');
    }

    public function country_name(): string|array|null
    {
        return $this->getTagValues('country-name');
    }

    private function getTagValues(string $tag, array $properties = array()): string|array|null
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

    private function isOpenGraph($property)
    {
        return preg_match("/^og:/", $property);
    }
}