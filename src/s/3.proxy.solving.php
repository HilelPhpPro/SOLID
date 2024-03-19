<?php

namespace Proxy2;


interface IDownloader
{
    /**
     * @param string $url
     * @return string
     */
    public function download(string $url): string;
}

class SimpleDownloader implements IDownloader
{
    /**
     * @inheritdoc
     */
    public function download(string $url): string
    {
        // Downloading a file from the Internet.
        $result = file_get_contents($url);
        return $result;
    }
}

/**
 * @param IDownloader $downloader
 */
function clientCode(IDownloader $downloader)
{
    // ...
    $downloader->download("https://lms.ithillel.ua/");
    $downloader->download("https://google.com/");
    $downloader->download("https://lms.ithillel.ua/");
    $downloader->download("https://lms.ithillel.ua/");
    $downloader->download("https://google.com/");
    $downloader->download("https://lms.ithillel.ua/");
    $downloader->download("https://lms.ithillel.ua/");
    $downloader->download("https://google.com/");
    $downloader->download("https://lms.ithillel.ua/");
    $downloader->download("https://lms.ithillel.ua/");
    $downloader->download("https://google.com/");
    $downloader->download("https://lms.ithillel.ua/");
    $downloader->download("https://lms.ithillel.ua/");
    $downloader->download("https://google.com/");
    $downloader->download("https://lms.ithillel.ua/");
    // ...
}

class CachingDownloader implements IDownloader
{
    /**
     * @var string[]
     */
    private array $cache = [];

    public function __construct(protected IDownloader $downloader)
    {
    }

    public function download(string $url): string
    {
        if (!isset($this->cache[$url])) {
            $this->cache[$url] = $this->downloader->download($url);
        }
        return $this->cache[$url];
    }
}


$simpleDownloader = new SimpleDownloader();
$downloader = new CachingDownloader($simpleDownloader);
clientCode($downloader);

exit;
