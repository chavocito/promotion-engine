<?php

namespace App\Tests\unit;

use App\DTO\LowestPriceEnquiry;
use App\Event\AfterDtoCreatedEvent;
use App\Tests\ServiceTestCase;

class DtoSubscriberTest extends ServiceTestCase
{
    public function a_dto_is_validated_after_it_has_been_created(): void
    {
        $dto = new LowestPriceEnquiry();
        $dto->setQuantity(-5);

        $event = new AfterDtoCreatedEvent($dto);

        $aDTO = $event->getDto();
    }
}