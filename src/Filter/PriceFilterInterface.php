<?php

namespace App\Filter;

use App\DTO\PriceEnquiryInterface;
use App\Entity\Promotion;

interface PriceFilterInterface extends PromotionsFilterInterface
{
    public function apply(PriceEnquiryInterface $enquiry, Promotion|\App\Filter\Promotion ...$promotion): PriceEnquiryInterface;
}