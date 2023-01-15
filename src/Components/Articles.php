<?php 
namespace OSW3\HtmlParser\Components;

use OSW3\HtmlParser\Abstract\AbstractComponent;

class Articles extends AbstractComponent
{
    private string $document;
    private bool $sanitize;

    public function __construct(string $document, bool $sanitize = true)
    {
        $this->document = $document;
        $this->sanitize = $sanitize;
    }

    public function list(): array
    {
        $document = $this->document;

        // $document = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $document);
        // $document = preg_replace('#<noscript(.*?)>(.*?)</noscript>#is', '', $document);
        // $document = preg_replace('#<style(.*?)>(.*?)</style>#is', '', $document);


        preg_match_all("/<article.*?>(.*?)<\/article>/s", $document, $matches);
        $articles = $matches[0];

        if (empty($articles))
        {
            preg_match("/<main.*\/main>/s", $document, $matches);
            $articles = $matches[0] ?? [];
        }

        if (empty($articles))
        {
            preg_match("/<body.*\/body>/s", $document, $matches);
            $articles = $matches ?? [];
        }

        print_r( $articles );


        return array();
    }
}