<?php

namespace App\Controller;

use App\DTO\LowestPriceEnquiry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ProductController extends AbstractController
{
    #[Route('/products/{id}/lowest-price', name: 'lowest-price', methods: 'POST')]
    public function lowestPrice(Request $request, int $id, SerializerInterface $serializer): Response
    {
        if($request->headers->has('force_fail')) {
            return new JsonResponse(
                ['error' => 'Promotion Engine failure message'],
                $request->headers->get('force_fail')
            );
        }

        // dd($serializer);

        // 1. Deserialize json data into a enquiry data transfer object
        $lowestPriceEnquiry = $serializer->deserialize($request->getContent(), LowestPriceEnquiry::class, 'json');
         dd($lowestPriceEnquiry);
        // 2. Pass enquiry into a promotions filter and the app promotion applies
        // 3. Return the modified enquiry

        return new JsonResponse([
            "quantity" => 5,
            "request_location" => "UK",
            "voucher_code" => "QU812",
            "request_date" => "2022-05-08",
            "product-id" => $id,
            "price" => 100,
            "discounted_price" => 50,
            "promotion_id" => 3,
            "promotion_name" => 'Black Friday half price sale'
        ], 200);
    }
}