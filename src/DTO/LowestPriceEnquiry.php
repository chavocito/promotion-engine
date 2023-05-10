<?php

namespace App\DTO;

class LowestPriceEnquiry implements PromotionEnquiry
{
    private ?int $quantity;

    private ?string $request_location;

    private ?string $voucher_code;

    private ?string $request_date;

    private ?int $price;

    private ?int $promotion_id;

    private ?int $promotion_name;

    /**
     * @return int|null
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * @param int|null $quantity
     */
    public function setQuantity(?int $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return string|null
     */
    public function getRequestLocation(): ?string
    {
        return $this->request_location;
    }

    /**
     * @param string|null $request_location
     */
    public function setRequestLocation(?string $request_location): void
    {
        $this->request_location = $request_location;
    }

    /**
     * @return string|null
     */
    public function getVoucherCode(): ?string
    {
        return $this->voucher_code;
    }

    /**
     * @param string|null $voucher_code
     */
    public function setVoucherCode(?string $voucher_code): void
    {
        $this->voucher_code = $voucher_code;
    }

    /**
     * @return string|null
     */
    public function getRequestDate(): ?string
    {
        return $this->request_date;
    }

    /**
     * @param string|null $request_date
     */
    public function setRequestDate(?string $request_date): void
    {
        $this->request_date = $request_date;
    }

    /**
     * @return int|null
     */
    public function getPrice(): ?int
    {
        return $this->price;
    }

    /**
     * @param int|null $price
     */
    public function setPrice(?int $price): void
    {
        $this->price = $price;
    }

    /**
     * @return int|null
     */
    public function getPromotionId(): ?int
    {
        return $this->promotion_id;
    }

    /**
     * @param int|null $promotion_id
     */
    public function setPromotionId(?int $promotion_id): void
    {
        $this->promotion_id = $promotion_id;
    }

    /**
     * @return int|null
     */
    public function getPromotionName(): ?int
    {
        return $this->promotion_name;
    }

    /**
     * @param int|null $promotion_name
     */
    public function setPromotionName(?int $promotion_name): void
    {
        $this->promotion_name = $promotion_name;
    }
}