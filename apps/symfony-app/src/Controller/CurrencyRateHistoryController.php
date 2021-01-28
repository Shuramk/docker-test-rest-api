<?php

namespace App\Controller;

use App\Repository\CurrencyRateRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CurrencyRateHistoryController extends AbstractController
{

    /**
     * @param Request $request
     * @param CurrencyRateRepository $currencyRateRepository
     * @param $id
     * @return JsonResponse
     * @Route("/api/rates_history", name="currency_rate_api/rates_history", methods={"GET"})
     */
    public function getRate(Request $request, CurrencyRateRepository $currencyRateRepository){
        $date = $request->get('date');

        $rates = $currencyRateRepository->findByDate($date);

        if (!$rates){
            $data = [
                'status' => 404,
                'errors' => "Not found",
            ];
            return new JsonResponse($data, 404);
        }
        return new JsonResponse($rates, 200);
    }
}
