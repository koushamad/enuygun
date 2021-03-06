<?php

namespace App\Domain\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use App\Domain\Contract\Service\DeveloperServiceContract;
use FOS\RestBundle\Controller\Annotations\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Class DeveloperController
 * @package App\Domain\Controller
 * @Route("/api")
 */
class DeveloperController extends AbstractFOSRestController
{
    /** @var DeveloperServiceContract */
    private DeveloperServiceContract $developerService;

    public function __construct(DeveloperServiceContract $developerService)
    {
        $this->developerService = $developerService;
    }

    /**
     * @Rest\Get("/developers")
     * @return Response
     */
    public function getAll()
    {
        return $this->json(
            $this->developerService->getDevelopers(),
            Response::HTTP_OK,
            ['Content-Type' => 'application/json', 'Access-Control-Allow-Origin' => '*'],
            ['circular_reference_handler' => function ($object) {return $object->getId();}],
        );
    }
}