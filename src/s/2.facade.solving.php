<?php
namespace Facade2;

use JetBrains\PhpStorm\Pure;

class CPU
{
    public function freeze()
    {
        // difficult logic for CPU freeze
    }

    /**
     * @param $address
     */
    public function jump($address)
    {
        // difficult logic for CPU jump to $address
    }

    public function execute()
    {
        // difficult logic for CPU execute
    }
}

class Memory
{
    const DEFAULT_MEMORY_SIZE = 4;
    public function __construct(protected int $memorySize = self::DEFAULT_MEMORY_SIZE)
    {

    }
    /**
     * @param $address
     * @param $data
     */
    public function load($address, $data)
    {
        // Loading address $address with data: $data
    }
}
class NewMemory extends Memory
{
    const DEFAULT_MEMORY_SIZE = 8;

    public function __construct(protected int $memorySize = self::DEFAULT_MEMORY_SIZE)
    {
        parent::__construct($memorySize);
    }
}

class Disk
{
    /**
     * @param $sector
     * @param $size
     * @return string
     */
    public function read($sector, $size)
    {
        return "data from sector $sector ($size)";
    }
}

// Facade
class Computer
{
    const BOOT_ADDRESS = 0;
    const BOOT_SECTOR = 1;
    const SECTOR_SIZE = 16;
    protected string $mouse;
    protected string $display;
    protected string $keyboard;

    /**
     * Computer constructor.
     * @param CPU $cpu
     * @param Memory $mem
     * @param Disk $hd
     */
    public function __construct(
        protected CPU $cpu,
        protected Memory $mem,
        protected Disk $hd
    )
    {
        //dooSomething
    }

    public function startComputer(): void
    {
        $this->cpu->freeze();
        $dataForStart = $this->hd->read(
            static::BOOT_SECTOR,
            static::SECTOR_SIZE
        );
        $this->mem->load(
            static::BOOT_ADDRESS,
            $dataForStart
        );
        $this->cpu->jump(self::BOOT_ADDRESS);
        $this->cpu->execute();
    }

    public function getMouse(): string
    {
        return $this->mouse;
    }

    public function setMouse(string $mouse)
    {
        $this->mouse = $mouse;
    }

    /**
     * @return string
     */
    public function getDisplay(): string
    {
        return $this->display;
    }

    /**
     * @param string $display
     */
    public function setDisplay(string $display): void
    {
        $this->display = $display;
    }

    /**
     * @return string
     */
    public function getKeyboard(): string
    {
        return $this->keyboard;
    }

    /**
     * @param string $keyboard
     */
    public function setKeyboard(string $keyboard): void
    {
        $this->keyboard = $keyboard;
    }
}

class Notebook extends Computer
{
    const DEFAULT_DIAGONAL = 13;

    public function __construct(CPU $cpu, Memory $memory, Disk $disk, protected int $diagonal = self::DEFAULT_DIAGONAL)
    {
        parent::__construct($cpu,  $memory,  $disk);
    }
}

// Usage example
$pc = new Computer(
    new CPU(),
    new NewMemory(16),
    new Disk()
);
$pc->startComputer();
$pc->setMouse('Logitech');
$pc->setDisplay('Sony');
$pc->setKeyboard('Logitech');
