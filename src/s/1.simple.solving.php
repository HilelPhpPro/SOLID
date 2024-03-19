<?php
namespace Simple2;

class Book
{
    /**
     * @var string
     */
    protected string $title;

    /**
     * @var string
     */
    protected string $author;

    /**
     * Book constructor.
     * @param string $title
     * @param string $author
     */
    public function __construct(string $title, string $author)
    {
        $this->title = $title;
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param int $pageCount
     */
    public function turnPage(int $pageCount = 1)
    {
        // pointer to next page
    }

    /**
     * @return string
     */
    public function getCurrentPage(): string
    {
        return "current page content";
    }
}


interface IPrinter
{
    /**
     * @param string $pageContent
     */
    public function printPage(Book $book);
}


class PlainTextPrinter implements IPrinter
{
    /**
     * @inheritdoc
     */
    public function printPage(Book $book): void
    {
        echo $book->getCurrentPage();
    }
}


class HtmlPrinter implements IPrinter
{
    /**
     * @inheritdoc
     */
    public function printPage(Book $book): void
    {
        echo '<div style="single-page">' . $book->getCurrentPage() . '</div>';
    }

}

$firstBook = new Book("A Super Book", "John Doe");
$firstBook->turnPage(2);

$printer = new PlainTextPrinter();
// or
$printer = new HtmlPrinter();

$printer->printPage($firstBook);
$firstBook->turnPage(3);
$printer->printPage($firstBook);

