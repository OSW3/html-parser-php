<?php 
namespace OSW3\HtmlParser\Components;

use OSW3\HtmlParser\Abstract\AbstractComponent;

class Lang extends AbstractComponent
{
    public function code(): ?string
    {
        return $this->html()->getAttribute('lang')
            ? $this->html()->getAttribute('lang')
            : null
        ;
    }

    public function locale(): ?string
    {
        $arr = explode("-", $this->code());
        return $arr[0];
    }

    public function region(): ?string
    {
        $arr = explode("-", $this->code());
        return isset($arr[1]) ? $arr[1] : null;
    }

    public function direction(): string
    {
        return $this->html()->getAttribute('dir')
            ? $this->html()->getAttribute('dir')
            : "ltr"
        ;
    }
}