<?php

namespace AppBundle\Controller;

use Exception;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LuckyController extends Controller
{

    /**
     * @Route("/lucky/number/{max}", requirements={"max"="\d+"})
     * @param int $max
     * @param LoggerInterface $logger
     * @return Response
     * @throws Exception
     */
    public function numberAction($max = 100, LoggerInterface $logger)
    {
        $logger->info('We are logging!');

        $number = random_int(0, $max);

        return $this->render('lucky/number.html.twig', [
            'number' => $number
        ]);

//        return new Response(
//            '<html><body>Lucky number: '.$number.'</body></html>'
//        );
    }

    /**
     * @Route("/lucky/number/json/{max}", requirements={"max"="\d+"})
     * @param int $max
     * @return JsonResponse
     * @throws Exception
     */
    public function numberJsonAction($max = 100)
    {
        return $this->json(['number' => random_int(0, $max)]);
    }
}
