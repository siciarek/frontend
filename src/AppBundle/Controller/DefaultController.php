<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/default")
 */
class DefaultController extends Controller
{

    /**
     * @Route("/data", defaults={"_format":"json"}, name="default.data")
     */
    public function dataAction(Request $request)
    {

        $data = [
            "data" => [
                "items" => [
                    [
                        "id" => 1,
                        "name" => "Alfreds Futterkiste",
                        "city" => "Berlin",
                        "country" => "Germany"
                    ],
                    [
                        "id" => 2,
                        "name" => "Ana Trujillo Emparedados y helados",
                        "city" => "México D.F.",
                        "country" => "Mexico"
                    ],
                    [
                        "id" => 3,
                        "name" => "Antonio Moreno Taquería",
                        "city" => "México D.F.",
                        "country" => "Mexico"
                    ],
                    [
                        "id" => 4,
                        "name" => "Around the Horn",
                        "city" => "London",
                        "country" => "UK"
                    ],
                    [
                        "id" => 5,
                        "name" => "B's Beverages",
                        "city" => "London",
                        "country" => "UK"
                    ],
                    [
                        "id" => 6,
                        "name" => "Berglunds snabbköp",
                        "city" => "Luleå",
                        "country" => "Sweden"
                    ],
                    [
                        "id" => 7,
                        "name" => "Blauer See Delikatessen",
                        "city" => "Mannheim",
                        "country" => "Germany"
                    ],
                    [
                        "id" => 8,
                        "name" => "Blondel père et fils",
                        "city" => "Strasbourg",
                        "country" => "France"
                    ],
                    [
                        "id" => 9,
                        "name" => "Bólido Comidas preparadas",
                        "city" => "Madrid",
                        "country" => "Spain"
                    ],
                    [
                        "id" => 10,
                        "name" => "Bon app'",
                        "city" => "Marseille",
                        "country" => "France"
                    ],
                    [
                        "id" => 11,
                        "name" => "Bottom-Dollar Marketse",
                        "city" => "Tsawassen",
                        "country" => "Canada"
                    ],
                    [
                        "id" => 12,
                        "name" => "Cactus Comidas para llevar",
                        "city" => "Buenos Aires",
                        "country" => "Argentina"
                    ],
                    [
                        "id" => 13,
                        "name" => "Centro comercial Moctezuma",
                        "city" => "México D.F.",
                        "country" => "Mexico"
                    ],
                    [
                        "id" => 14,
                        "name" => "Chop-suey Chinese",
                        "city" => "Bern",
                        "country" => "Switzerland"
                    ],
                    [
                        "id" => 15,
                        "name" => "Comércio Mineiro",
                        "city" => "São Paulo",
                        "country" => "Brazil"
                    ]
                ],
            ]
        ];

        return new Response(json_encode($data));
    }
}
