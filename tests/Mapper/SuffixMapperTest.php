<?php

namespace Kayrah87\NameParser\Mapper;

use Kayrah87\NameParser\Language\English;
use Kayrah87\NameParser\Part\Lastname;
use Kayrah87\NameParser\Part\Firstname;
use Kayrah87\NameParser\Part\Suffix;

class SuffixMapperTest extends AbstractMapperTest
{
    /**
     * @return array
     */
    public function provider()
    {
        return [
            [
                'input' => [
                    'Mr.',
                    'James',
                    'Blueberg',
                    'PhD',
                ],
                'expectation' => [
                    'Mr.',
                    'James',
                    'Blueberg',
                    new Suffix('PhD'),
                ],
                [
                    'matchSinglePart' => false,
                    'reservedParts' => 2,
                ]
            ],
            [
                'input' => [
                    'Prince',
                    'Alfred',
                    'III',
                ],
                'expectation' => [
                    'Prince',
                    'Alfred',
                    new Suffix('III'),
                ],
                [
                    'matchSinglePart' => false,
                    'reservedParts' => 2,
                ]
            ],
            [
                'input' => [
                    new Firstname('Paul'),
                    new Lastname('Smith'),
                    'Senior',
                ],
                'expectation' => [
                    new Firstname('Paul'),
                    new Lastname('Smith'),
                    new Suffix('Senior'),
                ],
                [
                    'matchSinglePart' => false,
                    'reservedParts' => 2,
                ]
            ],
            [
                'input' => [
                    'Senior',
                    new Firstname('James'),
                    'Norrington',
                ],
                'expectation' => [
                    'Senior',
                    new Firstname('James'),
                    'Norrington',
                ],
                [
                    'matchSinglePart' => false,
                    'reservedParts' => 2,
                ]
            ],
            [
                'input' => [
                    'Senior',
                    new Firstname('James'),
                    new Lastname('Norrington'),
                ],
                'expectation' => [
                    'Senior',
                    new Firstname('James'),
                    new Lastname('Norrington'),
                ],
                [
                    'matchSinglePart' => false,
                    'reservedParts' => 2,
                ]
            ],
            [
                'input' => [
                    'James',
                    'Norrington',
                    'Senior',
                ],
                'expectation' => [
                    'James',
                    'Norrington',
                    new Suffix('Senior'),
                ],
                [
                    false,
                    2,
                ]
            ],
            [
                'input' => [
                    'Norrington',
                    'Senior',
                ],
                'expectation' => [
                    'Norrington',
                    'Senior',
                ],
                [
                    false,
                    2,
                ]
            ],
            [
                'input' => [
                    new Lastname('Norrington'),
                    'Senior',
                ],
                'expectation' => [
                    new Lastname('Norrington'),
                    new Suffix('Senior'),
                ],
                [
                    false,
                    1,
                ]
            ],
            [
                'input' => [
                    'Senior',
                ],
                'expectation' => [
                    new Suffix('Senior'),
                ],
                [
                    true,
                ]
            ],
        ];
    }

    protected function getMapper($matchSinglePart = false, $reservedParts = 2)
    {
        $english = new English();

        return new SuffixMapper($english->getSuffixes(), $matchSinglePart, $reservedParts);
    }
}
