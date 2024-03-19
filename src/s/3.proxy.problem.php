<?php
namespace Proxy1;



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

    // implement logic for create cache
    // implement logic for invalidate cache
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


$downloader = new SimpleDownloader();
clientCode($downloader);

exit;

