<?php

namespace App\Controller;

use App\Repository\CurrencyRateRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CurrencyRateController
 * @package App\Controller
 * @Route("/api", name="currency_rate_api/")
 */
class CurrencyRateController extends AbstractController
{

    /**
     * @param CurrencyRateRepository $currencyRateRepository
     * @return JsonResponse
     * @Route("/rates", name="rates", methods={"GET"})
     */
    public function getRates(CurrencyRateRepository $currencyRateRepository){
        $data = $currencyRateRepository->findByDate(
            (new \DateTime('now', new \DateTimeZone('Europe/Kiev')))->format("Y-m-d")
        );
        return $this->response($data);
    }

    /**
     * @param CurrencyRateRepository $currencyRateRepository
     * @param $id
     * @return JsonResponse
     * @Route("/rates/{id}", name="rates_get", methods={"GET"})
     */
    public function getRate(CurrencyRateRepository $currencyRateRepository, $id){
        $rate = $currencyRateRepository->find($id);

        if (!$rate){
            $data = [
                'status' => 404,
                'errors' => "Post not found!",
            ];
            return $this->response($data, 404);
        }
        return $this->response($rate);
    }

    /**
     * Returns a JSON response
     *
     * @param array $data
     * @param $status
     * @param array $headers
     * @return JsonResponse
     */
    public function response($data, $status = 200, $headers = [])
    {
        return new JsonResponse($data, $status, $headers);
    }

    /**
     * @param Request $request
     * @return Request
     */
    protected function transformJsonBody(Request $request): Request
    {
        $data = json_decode($request->getContent(), true);

        if ($data === null) {
            return $request;
        }

        $request->request->replace($data);

        return $request;
    }
}
