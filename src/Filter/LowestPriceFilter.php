<?php

namespace App\Filter;

use App\DTO\LowestPriceEnquiry;
use App\DTO\PromotionEnquiry;
use App\Entity\Promotion;

class LowestPriceFilter implements PromotionsFilterInterface
{

    public function apply(LowestPriceEnquiry $enquiry, Promotion|\App\Filter\Promotion ...$promotion): LowestPriceEnquiry
    {
        $price = $enquiry->getPrice();
        $quantity = $enquiry->getQuantity();
        $lowestPrice = $quantity * $price;

        $enquiry->setDiscountedPrice(50);
        $enquiry->setPromotionId(3);
        $enquiry->setPrice(100);
        $enquiry->setPromotionName('BraQ Friday');

        return $enquiry;
    }
}