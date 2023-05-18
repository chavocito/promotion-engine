<?php

namespace App\Tests\unit;

use App\DTO\LowestPriceEnquiry;
use App\Entity\Promotion;
use App\Filter\Modifier\EvenItemsMultiplier;
use App\Tests\ServiceTestCase;

class EvenItemsMultiplierTest extends ServiceTestCase
{
    /** @test */
    public function EvenItemsMultiplier_returns_the_modified_item(): void
    {
        //Given
        $enquiry = new LowestPriceEnquiry();
        $enquiry->setQuantity(5);

        $promotion = new Promotion();
        $promotion->setName('Buy one get one free');
        $promotion->setAdjustment(0.5);
        $promotion->setCriteria(["minimum_quantity" => 2]);
        $promotion->setType('even_items_multiplier');

        $evenItemsMultiplier = new EvenItemsMultiplier();

        //When
        $modifiedPrice = $evenItemsMultiplier->modify(100, 5, $promotion, $enquiry);

        //Then
        $this->assertEquals(300, $modifiedPrice);
    }
}