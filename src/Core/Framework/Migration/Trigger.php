<?php declare(strict_types=1);

namespace Shopware\Core\Framework\Migration;

class Trigger
{
    const TIME_BEFORE = 'BEFORE';
    const TIME_AFTER = 'AFTER';

    const EVENT_INSERT = 'INSERT';
    const EVENT_UPDATE = 'UPDATE';
    const EVENT_DELETE = 'DELETE';

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $table;

    /**
     * @var string
     */
    protected $onTrigger;

    /**
     * @var string
     */
    protected $time;

    /**
     * @var string
     */
    protected $event;

    public function __construct(string $name, string $table, string $time, string $event, string $onTrigger)
    {
        $this->name = $name;
        $this->time = $this->validateArgumentTime($time);
        $this->event = $this->validateArgumentEvent($event);
        $this->table = $table;
        $this->onTrigger = $onTrigger;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getTable(): string
    {
        return $this->table;
    }

    public function getOnTrigger(): string
    {
        return $this->onTrigger;
    }

    public function getTime(): string
    {
        return $this->time;
    }

    public function getEvent(): string
    {
        return $this->event;
    }

    private function validateArgumentTime(string $time): string
    {
        if (!in_array(
            $time,
            [
                self::TIME_AFTER,
                self::TIME_BEFORE,
            ]
        )) {
            throw new \InvalidArgumentException('TriggerDefinition: argument time must be either \'BEFORE\' or \'AFTER\'');
        }

        return $time;
    }

    private function validateArgumentEvent(string $event): string
    {
        if (!in_array(
            $event,
            [
                self::EVENT_INSERT,
                self::EVENT_UPDATE,
                self::EVENT_DELETE,
            ]
        )) {
            throw new \InvalidArgumentException('TriggerDefinition: argument time must be either \'INSERT\', \'UPDATE\' or \'DELETE\'');
        }

        return $event;
    }
}