<?php

namespace Yiisoft\Yii\Debug\Tests\Collector;

use Psr\EventDispatcher\EventDispatcherInterface;
use Yiisoft\Yii\Debug\Collector\CollectorInterface;

class EventCollectorTest extends AbstractCollectorTestCase
{
    protected function somethingDoTestExport(): void
    {
        $dispatcher = $this->container->get(EventDispatcherInterface::class);
        $dispatcher->dispatch(new \stdClass());
    }

    protected function getCollector(): CollectorInterface
    {
        // Container should return EventDispatcher that implements CollectorInterface.
        $dispatcher = $this->container->get(EventDispatcherInterface::class);
        $this->assertInstanceOf(CollectorInterface::class, $dispatcher);

        return $dispatcher;
    }
}
