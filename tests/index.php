<?php
print_r("--- ============================== ---\n");
print_r("--- TEST : HTML PARSER             ---\n");
print_r("--- ============================== ---\n");
print_r("\n");

require "../vendor/autoload.php";
use OSW3\HtmlParser\HtmlParser;
    

/// ======================================= ///
/// Test : Parser                           ///
/// ======================================= ///

$url     = require "./url.php";

$header  = array();
$stream  = array();
$options = array();


$options['header'] = $header;
$options['stream'] = $stream;

$document = new HtmlParser($url, $options);


// print_r($document->header());
// print_r($document->content());
// print_r($document->error());;
// print_r($document->options());
// print_r($document->process());

// print_r("Charset : ");
// print_r($document->charset());
// print_r("\n\n");

// print_r("Lang (code) : ");
// print_r($document->lang('code'));
// print_r("\n");
// print_r("Lang (locale) : ");
// print_r($document->lang('locale'));
// print_r("\n");
// print_r("Lang (region) : ");
// print_r($document->lang('region'));
// print_r("\n");
// print_r("Lang (direction) : ");
// print_r($document->lang('direction'));
// print_r("\n");
// print_r("Lang : ");
// print_r($document->lang());
// print_r("\n\n");

// print_r("Title (text) : ");
// print_r($document->title('text'));
// print_r("\n");
// print_r("Title (length) : ");
// print_r($document->title('length'));
// print_r("\n");
// print_r("Title : ");
// print_r($document->title());
// print_r("\n");
// print_r("\n\n");

// print_r("Description (text) : ");
// print_r($document->description('text'));
// print_r("\n");
// print_r("Description (length) : ");
// print_r($document->description('length'));
// print_r("\n");
// print_r("Description (words) : ");
// print_r($document->description('words'));
// print_r("\n");
// print_r("Description : ");
// print_r($document->description());
// print_r("\n\n");

// print_r("Keywords (text) : ");
// print_r($document->keywords('text'));
// print_r("\n");
// print_r("Keywords (length) : ");
// print_r($document->keywords('length'));
// print_r("\n");
// print_r("Keywords (list) : ");
// print_r($document->keywords('list'));
// print_r("\n");
// print_r("Keywords : ");
// print_r($document->keywords());
// print_r("\n\n");

// print_r("Favicon (href value): ");
// print_r($document->favicon('href'));
// print_r("\n");
// print_r("Favicon (absolute url): ");
// print_r($document->favicon('url'));
// print_r("\n");
// print_r("Favicon (type): ");
// print_r($document->favicon('type'));
// print_r("\n");
// print_r("Favicon : ");
// print_r($document->favicon());
// print_r("\n\n");

// print_r("Icons : ");
// print_r($document->icons());
// print_r("\n\n");

// print_r("OpenGraph (title) : ");
// print_r($document->openGraph('title'));
// print_r("\n");
// print_r("OpenGraph (type) : ");
// print_r($document->openGraph('type'));
// print_r("\n");
// print_r("OpenGraph (image) : ");
// print_r($document->openGraph('image'));
// print_r("\n");
// print_r("OpenGraph (url) : ");
// print_r($document->openGraph('url'));
// print_r("\n");
// print_r("OpenGraph (description) : ");
// print_r($document->openGraph('description'));
// print_r("\n");
// print_r("OpenGraph (locale) : ");
// print_r($document->openGraph('locale'));
// print_r("\n");
// print_r("OpenGraph (site_name) : ");
// print_r($document->openGraph('site_name'));
// print_r("\n");
// print_r("OpenGraph (audio) : ");
// print_r($document->openGraph('audio'));
// print_r("\n");
// print_r("OpenGraph (video) : ");
// print_r($document->openGraph('video'));
// print_r("\n");
// print_r("OpenGraph (determiner) : ");
// print_r($document->openGraph('determiner'));
// print_r("\n");
// print_r("OpenGraph (updated_time) : ");
// print_r($document->openGraph('updated_time'));
// print_r("\n");
// print_r("OpenGraph (see_also) : ");
// print_r($document->openGraph('see_also'));
// print_r("\n");
// print_r("OpenGraph (locality) : ");
// print_r($document->openGraph('locality'));
// print_r("\n");
// print_r("OpenGraph (region) : ");
// print_r($document->openGraph('region'));
// print_r("\n");
// print_r("OpenGraph (country-name) : ");
// print_r($document->openGraph('country-name'));
// print_r("\n");
// print_r("OpenGraph : ");
// print_r($document->openGraph());
// print_r("\n\n");

// print_r("TwitterCard (card) : ");
// print_r($document->twitterCard('card'));
// print_r("\n");
// print_r("TwitterCard (site) : ");
// print_r($document->twitterCard('site'));
// print_r("\n");
// print_r("TwitterCard (creator) : ");
// print_r($document->twitterCard('creator'));
// print_r("\n");
// print_r("TwitterCard (title) : ");
// print_r($document->twitterCard('title'));
// print_r("\n");
// print_r("TwitterCard (description) : ");
// print_r($document->twitterCard('description'));
// print_r("\n");
// print_r("TwitterCard (image) : ");
// print_r($document->twitterCard('image'));
// print_r("\n");
// print_r("TwitterCard (url) : ");
// print_r($document->twitterCard('url'));
// print_r("\n");
// print_r("TwitterCard (domain) : ");
// print_r($document->twitterCard('domain'));
// print_r("\n");
// print_r("TwitterCard (app) : ");
// print_r($document->twitterCard('app'));
// print_r("\n");
// print_r("TwitterCard : ");
// print_r($document->twitterCard());
// print_r("\n\n");

// print_r("Meta : ");
// print_r($document->meta());
// print_r("\n\n");

// print_r("Canonical : ");
// print_r($document->canonical());
// print_r("\n\n");

// print_r("Alternates : ");
// print_r($document->alternates());
// print_r("\n\n");

// print_r("Feeds (alternate rss) : ");
// print_r($document->feeds());
// print_r("\n\n");

// print_r("oEmbed (alternate oEmbed) : ");
// print_r($document->oEmbed());
// print_r("\n\n");

// print_r("Images : ");
// print_r($document->images());
// print_r("\n\n");

// print_r("Audios : ");
// print_r($document->audios());
// print_r("\n\n");

// print_r("Videos : ");
// print_r($document->videos());
// print_r("\n\n");

// print_r("Links : ");
// print_r($document->links());
// print_r("\n\n");

print_r("Author : ");
print_r($document->author());
print_r("\n\n");



// print_r("Navs : ");
// print_r($document->navs());
// print_r("\n\n");

// print_r("Headings : ");
// print_r($document->headings());
// print_r("\n\n");

// print_r("Forms : ");
// print_r($document->forms());
// print_r("\n\n");

// print_r("Languages : ");
// print_r($document->languages());
// print_r("\n\n");

// print_r("Tags : ");
// print_r($document->tags());
// print_r("\n\n");

// print_r("Tables : ");
// print_r($document->tables());
// print_r("\n\n");

// print_r("List : ");
// print_r($document->list());
// print_r("\n\n");

// print_r("Styles : ");
// print_r($document->styles());
// print_r("\n\n");

// print_r("Scripts : ");
// print_r($document->scripts());
// print_r("\n\n");

// print_r("Pingback : ");
// print_r($document->pingback());
// print_r("\n\n");
