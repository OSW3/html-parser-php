<?php 
namespace OSW3\HtmlParser;

use OSW3\HttpClient\Response;
use OSW3\UrlParser\Parser as UrlParser;
use OSW3\HttpClient\Client as HttpClient;
use OSW3\HtmlParser\Abstract\AbstractParser;

class RemoteHtmlParser extends AbstractParser
{
    protected Response $response;

    public function __construct(string $url, array $options = array())
    {
        $header    = $options['header'];
        $stream    = $options['stream'];
        $client    = new HttpClient();
        $urlParser = new UrlParser();
        $urlInfo   = $urlParser->parse($url, true, true);

        $this->baseHref = $urlInfo['protocol'].$urlInfo['authority'];
        $this->response = $client->get($url, $header, $stream);
        $this->document = $this->response->content();
    }

    /// HttpClient Response
    /// =======================================
    
    public function header()
    {
        return $this->response->header();
    }
    
    public function content()
    {
        return $this->response->content();
    }
    
    public function error()
    {
        return $this->response->error();
    }
    
    public function options()
    {
        return $this->response->options();
    }
    
    public function process()
    {
        return $this->response->process();
    }
}