<?php 
namespace OSW3\HtmlParser;

use OSW3\HtmlParser\Components\Alternate;
use OSW3\HtmlParser\Components\Anchors;
use OSW3\HtmlParser\Components\Audios;
use OSW3\HtmlParser\Components\Author;
use OSW3\HtmlParser\Components\Canonical;
use OSW3\UrlParser\Parser as UrlParser;
use OSW3\HtmlParser\Components\Lang;
use OSW3\HtmlParser\Components\Title;
use OSW3\HtmlParser\Components\Charset;
use OSW3\HtmlParser\Components\Favicon;
use OSW3\HtmlParser\Components\Keywords;
use OSW3\HttpClient\Client as HttpClient;
use OSW3\HttpClient\Response as Document;
use OSW3\HtmlParser\Components\Description;
use OSW3\HtmlParser\Components\Feeds;
use OSW3\HtmlParser\Components\Icons;
use OSW3\HtmlParser\Components\Images;
use OSW3\HtmlParser\Components\Meta;
use OSW3\HtmlParser\Components\OEmbed;
use OSW3\HtmlParser\Components\OpenGraph;
use OSW3\HtmlParser\Components\TwitterCard;
use OSW3\HtmlParser\Components\Videos;

class HtmlParser 
{
    private string $document;
    // private Document $document;
    private array $url;

    // public function __construct(string $url, array $options = array())
    // {
    // }

    public function parseFromUrl(string $url, array $options = array())
    {
        $header = $options['header'];
        $stream = $options['stream'];
        $client = new HttpClient();
        $urlParser = new UrlParser();

        $this->url = $urlParser->parse($url, true, true);
        
        $request = $client->get($url, $header, $stream);
        $this->document = $request->content();
    }
    public function parseFromDom(string $dom, array $options = array())
    {
        // $header = $options['header'];
        // $stream = $options['stream'];
        // $client = new HttpClient();
        // $urlParser = new UrlParser();

        // $this->url = $urlParser->parse($url, true, true);
        // $this->document = $client->get($url, $header, $stream);
        $this->document = $dom;
    }

    /// HttpClient Response
    /// =======================================
    
    // public function header()
    // {
    //     return $this->document->header();
    // }
    
    // public function content()
    // {
    //     return $this->document;
    // }
    
    // public function error()
    // {
    //     return $this->document->error();
    // }
    
    // public function options()
    // {
    //     return $this->document->options();
    // }
    
    // public function process()
    // {
    //     return $this->document->process();
    // }
    
    /// Parser Response
    /// =======================================

    public function charset(): ?string
    {
        $charset = new Charset($this->document);

        return $charset->charset();
    }

    public function lang(): string|array|null
    {
        $arguments = func_get_args();
        $arguments = isset($arguments[0]) ? $arguments[0] : null;

        $lang = new Lang($this->document);

        switch ($arguments)
        {
            case 'code': return $lang->code();
            case 'locale': return $lang->locale();
            case 'region': return $lang->region();
            case 'direction': return $lang->direction();
        }

        return array(
            'code' => $lang->code(),
            'locale' => $lang->locale(),
            'region' => $lang->region(),
            'direction' => $lang->direction(),
        );
    }

    public function title(): string|array|null
    {
        $arguments = func_get_args();
        $arguments = isset($arguments[0]) ? $arguments[0] : null;

        $title = new Title($this->document);

        switch ($arguments)
        {
            case 'text': return $title->text();
            case 'length': return $title->length();
        }

        return array(
            'text' => $title->text(),
            'length' => $title->length(),
        );
    }

    public function description(): string|array|null
    {
        $arguments = func_get_args();
        $arguments = isset($arguments[0]) ? $arguments[0] : null;

        $description = new Description($this->document);

        switch ($arguments)
        {
            case 'text': return $description->text();
            case 'length': return $description->length();
            case 'words': return $description->words();
        }

        return array(
            'text' => $description->text(),
            'length' => $description->length(),
            'words' => $description->words(),
        );
    }

    public function keywords(): string|array|null
    {
        $arguments = func_get_args();
        $arguments = isset($arguments[0]) ? $arguments[0] : null;

        $keywords = new Keywords($this->document);

        switch ($arguments)
        {
            case 'text': return $keywords->text();
            case 'length': return $keywords->length();
            case 'list': return $keywords->list();
        }

        return array(
            'text' => $keywords->text(),
            'length' => $keywords->length(),
            'list' => $keywords->list(),
        );
    }

    public function favicon(): string|array|null
    {
        $arguments = func_get_args();
        $arguments = isset($arguments[0]) ? $arguments[0] : null;

        $favicon = new Favicon(
            $this->document,
            $this->url
        );

        switch ($arguments)
        {
            case 'href': return $favicon->href();
            case 'url': return $favicon->url();
            case 'type': return $favicon->type();
        }

        return array(
            'href' => $favicon->href(),
            'url' => $favicon->url(),
            'type' => $favicon->type(),
        );
    }

    public function icons(): array
    {
        $icons = new Icons(
            $this->document,
            $this->url
        );

        return $icons->list();
    }

    public function openGraph(): string|array|null
    {
        $arguments = func_get_args();
        $arguments = isset($arguments[0]) ? $arguments[0] : null;

        $og = new OpenGraph($this->document);

        switch ($arguments)
        {
            case 'title': return $og->title();
            case 'type': return $og->type();
            case 'image': return $og->image();
            case 'url': return $og->url();
            case 'description': return $og->description();
            case 'locale': return $og->locale();
            case 'site_name': return $og->site_name();
            case 'audio': return $og->audio();
            case 'video': return $og->video();
            case 'determiner': return $og->determiner();
            case 'updated_time': return $og->updated_time();
            case 'see_also': return $og->see_also();
            case 'locality': return $og->locality();
            case 'region': return $og->region();
            case 'country-name': return $og->country_name();
        }

        return array(
            // 'list' => $og->list(),
            'title' => $og->title(),
            'type' => $og->type(),
            'image' => $og->image(),
            'url' => $og->url(),
            'description' => $og->description(),
            'locale' => $og->locale(),
            'site_name' => $og->site_name(),
            'audio' => $og->audio(),
            'video' => $og->video(),
            'determiner' => $og->determiner(),
            'updated_time' => $og->updated_time(),
            'see_also' => $og->see_also(),
            'locality' => $og->locality(),
            'region' => $og->region(),
            'country-name' => $og->country_name(),
        );
    }

    public function twitterCard(): string|array|null
    {
        $arguments = func_get_args();
        $arguments = isset($arguments[0]) ? $arguments[0] : null;

        $twtr = new TwitterCard($this->document);

        switch ($arguments)
        {
            case 'card': return $twtr->card();
            case 'site': return $twtr->site();
            case 'creator': return $twtr->creator();
            case 'title': return $twtr->title();
            case 'description': return $twtr->description();
            case 'image': return $twtr->image();
            case 'url': return $twtr->url();
            case 'domain': return $twtr->domain();
            case 'app': return $twtr->app();
            // case 'determiner': return $og->determiner();
            // case 'updated_time': return $og->updated_time();
            // case 'see_also': return $og->see_also();
            // case 'locality': return $og->locality();
            // case 'region': return $og->region();
            // case 'country-name': return $og->country_name();
        }

        return array(
            'list' => $twtr->list(),
            'card' => $twtr->card(),
            'site' => $twtr->site(),
            'creator' => $twtr->creator(),
            'title' => $twtr->title(),
            'description' => $twtr->description(),
            'image' => $twtr->image(),
            'url' => $twtr->url(),
            'domain' => $twtr->domain(),
            'app' => $twtr->app(),
            // 'determiner' => $og->determiner(),
            // 'updated_time' => $og->updated_time(),
            // 'see_also' => $og->see_also(),
            // 'locality' => $og->locality(),
            // 'region' => $og->region(),
            // 'country-name' => $og->country_name(),
        );
        
    }

    public function feeds(): array
    {
        $feeds = new Feeds($this->document);

        return $feeds->list();
    }

    public function oEmbed(): array
    {
        $oEmbed = new OEmbed($this->document);

        return $oEmbed->list();
    }

    public function meta(): array
    {
        $meta = new Meta($this->document);

        return $meta->list();
    }

    public function canonical(): ?string
    {
        $canonical = new Canonical($this->document);
        
        return $canonical->url();
    }

    public function alternates(): array
    {
        $alternate = new Alternate($this->document);
        
        return $alternate->list();
    }
    
    public function images(): array
    {
        $images = new Images(
            $this->document,
            $this->url
        );

        return $images->list();
    }
    
    public function audios(): array
    {
        $audios = new Audios(
            $this->document,
            $this->url
        );

        return $audios->list();
    }
    
    public function videos(): array
    {
        $videos = new Videos(
            $this->document,
            $this->url
        );

        return $videos->list();
    }
    
    public function links(): array
    {
        $anchors = new Anchors(
            $this->document,
            $this->url
        );

        return $anchors->list();
    }
    
    public function author(): ?string
    {
        $author = new Author($this->document,);

        return $author->text();
    }

    // Sitemap
    // Manifest
    // Navs
    // Headings
    // Forms
    // Languages
    // Tags
    // Tables
    // List
    // Styles
    // Scripts
}
