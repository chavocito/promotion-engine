<?php

namespace App\EventSubscriber;

use App\Event\AfterDtoCreatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Validator\Exception\ValidationFailedException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class DtoSubscriber implements EventSubscriberInterface
{
    public function __construct(private ValidatorInterface $validator)
    {
    }

    public static function getSubscribedEvents():array
    {
        // TODO: Implement getSubscribedEvents() method.
        return [
            AfterDtoCreatedEvent::NAME => 'validateDto'
        ];
    }

    public function validateDto(AfterDtoCreatedEvent $event): void
    {
        $dto = $event->getDto();

        $errors = $this->validator->validate();

        if(count($errors) > 0) {
            throw new ValidationFailedException('Validation Failed', $errors);
        }
    }


}