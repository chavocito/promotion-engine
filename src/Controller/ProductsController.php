<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ProductsController extends AbstractController
{
    #[Route('/products/{id}/lowest-price', name: 'lowest-price', methods: 'POST')]
    public function lowestPrice(Request $request, int $id, SerializerInterface $serializer): Response
    {
        if ($request->headers->has('force-fail')) {
            return new JsonResponse(
                ["error" => "Promotions Engine failure message"],
                $request->headers->get('force-fail')
            );
        }

        dd($serializer);
        /**
         * Deserialize Enquiry JSON to DTO
         * Pass the Enquiry to appropriate Promotion Filter
         * Return Modified promotion
         */


//        return new JsonResponse(
//            [
//                'quantity' => 1,
//                'request_location' => 'GH',
//                'voucher_code' => 'ou922',
//                'request_date' => '2022-05-05',
//                'product_id' => $id,
//                'price' => 199,
//                'promotion_id' => 'PROMO'.$id,
//                'promotion_name' => 'BFriyay'
//            ], 200);
    }
}
