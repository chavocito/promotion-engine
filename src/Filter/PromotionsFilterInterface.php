<?php

namespace App\Filter;


use App\DTO\LowestPriceEnquiry;

interface PromotionsFilterInterface
{
    public function apply(LowestPriceEnquiry $enquiry, Promotion ...$promotion): mixed;
}