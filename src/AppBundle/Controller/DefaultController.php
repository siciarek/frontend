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

    const GENDER_MALE = 'male';
    const GENDER_FEMALE = 'female';

    protected static $emails = [];
    protected static $usernames = [];

    public function generateUsers($count)
    {
        $faker = $this->get('faker.generator');

        $gender = [
            self::GENDER_MALE,
            self::GENDER_FEMALE,
        ];

        $persons = [];

        foreach (range(1, $count) as $i) {

            $gndr = $gender[array_rand($gender)];

            $firstName = $faker->firstNameMale;
            $lastName = $faker->lastNameMale;

            if ($gndr === self::GENDER_FEMALE) {
                $firstName = $faker->firstNameFemale;
                $lastName = $faker->lastNameFemale;
            }

            $fname = mb_convert_case($firstName, MB_CASE_LOWER, 'UTF-8');
            $lname = mb_convert_case($lastName, MB_CASE_LOWER, 'UTF-8');
            $fname = iconv('UTF-8', 'ASCII//TRANSLIT', $fname);
            $lname = iconv('UTF-8', 'ASCII//TRANSLIT', $lname);

            $username = $fname[0] . $lname;
            $password = '4561237';

            switch (rand(1, 3)) {
                case 1:
                    $email = sprintf('%s@%s', $username, $faker->safeEmailDomain);
                    break;
                case 2:
                    $email = sprintf('%s@%s', $lname, $faker->safeEmailDomain);
                    break;
                case 3:
                    $email = sprintf('%s.%s@%s', $fname, $lname, $faker->safeEmailDomain);
                    break;
            };

            if (array_key_exists($username, self::$usernames)) {
                continue;
            }

            if (array_key_exists($email, self::$emails)) {
                continue;
            }

            self::$emails[$email] = true;
            self::$usernames[$username] = true;

            $user = new \stdClass();
            $user->id = $i;
            $user->username = $username;
            $user->firstName = $firstName;
            $user->lastName = $lastName;
            $user->gender = $gndr;
            $user->email = $email;

            $persons[] = $user;
        }

        return $persons;
    }

    /**
     * @Route("/data", defaults={"_format":"json"}, name="default.data")
     */
    public function dataAction(Request $request)
    {
        $count = rand(20, 35);
        $items = $this->generateUsers($count);

        $data = [
            "data" => [
                "items" => $items,
            ]
        ];

        $data = json_decode(json_encode($data), JSON_OBJECT_AS_ARRAY);


        $xdata = [
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
