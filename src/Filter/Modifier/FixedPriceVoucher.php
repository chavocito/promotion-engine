<?php

namespace App\Filter\Modifier;

use App\DTO\PromotionEnquiryInterface;
use App\Entity\Promotion;

class FixedPriceVoucher implements PriceModifierInterface
{

    public function modify(int $price, int $quantity, Promotion $promotion, PromotionEnquiryInterface $enquiry): int
    {
        $voucher = $enquiry->getVoucherCode();

        if(!($voucher === $promotion->getCriteria()['code'])) {
            return $price * $quantity;
        }

        return ($price = 100 * $quantity);
    }
}