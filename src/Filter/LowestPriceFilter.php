<?php

namespace App\Filter;

use App\DTO\PromotionEnquiry;

class LowestPriceFilter implements PromotionsFilterInterface
{

    public function apply(PromotionEnquiry $enquiry): PromotionEnquiryInterface
    {
        $enquiry->setDiscountedPrice(50);
        $enquiry->setPromotionId(3);
        $enquiry->setPrice(100);
        $enquiry->setPromotionName('Alaha');

        return $enquiry;
    }
}