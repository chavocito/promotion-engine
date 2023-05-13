<?php

namespace App\Controller;

use App\DTO\LowestPriceEnquiry;
use App\Service\Serializer\DTOSerializer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductsController extends AbstractController
{
    #[Route('/products/{id}/lowest-price', name: 'lowest-price', methods: 'POST')]
    public function lowestPrice(Request $request, int $id, DTOSerializer $serializer): Response
    {
        if ($request->headers->has('force-fail')) {
            return new JsonResponse(
                ["error" => "Promotions Engine failure message"],
                $request->headers->get('force-fail')
            );
        }

        // Deserialize Enquiry JSON to DTO
        /** @var LowestPriceEnquiry $lowestPriceEnquiry */
        $lowestPriceEnquiry = $serializer->deserialize($request->getContent(), LowestPriceEnquiry::class, 'json');

        // Pass the Enquiry to appropriate Promotion Filter
        

        // Return Modified promotion
        $lowestPriceEnquiry->setDiscountedPrice(50);
        $lowestPriceEnquiry->setPromotionId(3);
        $lowestPriceEnquiry->setPrice(100);
        $lowestPriceEnquiry->setPromotionName('Alaha');

        $responseContent = $serializer->serialize($lowestPriceEnquiry, 'json');

        return new Response($responseContent, 200);
    }
}
