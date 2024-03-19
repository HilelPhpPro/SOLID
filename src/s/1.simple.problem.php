<?php
namespace Simple1;

class Book
{
    public function __construct(protected string $title, protected string $author)
    {
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function turnPage(int $pageCount = 1)
    {
        // pointer to next page
    }

    public function printCurrentPage(): void
    {
        echo "current page content";
    }

}

$firstBook = new Book("A Super Book", "John Doe");
$firstBook->turnPage(2);
$firstBook->printCurrentPage();
$firstBook->turnPage();
$firstBook->printCurrentPage();

