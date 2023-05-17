<?php

namespace App\Tests\unit;

use App\DTO\LowestPriceEnquiry;
use App\Entity\Product;
use App\Entity\Promotion;
use App\Filter\Modifier\DateRangeMultiplier;
use App\Filter\Modifier\FixedPriceVoucher;
use App\Tests\ServiceTestCase;

class PriceModifierTest extends ServiceTestCase
{
    /** @test */
    public function FixedPriceVoucher_returns_a_correctly_modified_price(): void
    {
        //Given
        $enquiry = new LowestPriceEnquiry();
        $enquiry->setVoucherCode("OU812");
        $enquiry->setQuantity(5);
        $enquiry->setRequestDate("2022-11-30");

        $promotion = new Promotion();
        $promotion->setName('Voucher OU812');
        $promotion->setAdjustment(100);
        $promotion->setCriteria(["code" => "OU812"]);
        $promotion->setType('fixed_price_voucher');

        $fixedPriceVoucher = new FixedPriceVoucher();

        //When
        $modifiedPrice = $fixedPriceVoucher->modify(150, 5, $promotion, $enquiry);

        //Then
        $this->assertEquals(500, $modifiedPrice);
    }

    /** @test */
    public function DateRangeMultiplier_returns_a_correctly_modified_price(): void
    {
        //Given
        $product = new Product();
        $product->setPrice(100);

        $enquiry = new LowestPriceEnquiry();
        $enquiry->setProduct($product);
        $enquiry->setQuantity(5);
        $enquiry->setRequestDate("2022-11-30");

        $promotion = new Promotion();
        $promotion->setName('BlaQ Friday');
        $promotion->setAdjustment(0.5);
        $promotion->setCriteria(["from" => "2022-11-25", "to"=>"2022-11-29"]);
        $promotion->setType('date_range_multiplier');

        $dateRangeMultiplier = new DateRangeMultiplier();

        //When
        $modifiedPrice = $dateRangeMultiplier->modify(100, 5, $promotion, $enquiry);

        //Then
        $this->assertEquals(500, $modifiedPrice);
    }

}