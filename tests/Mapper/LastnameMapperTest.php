<?php

namespace Kayrah87\NameParser\Mapper;

use Kayrah87\NameParser\Language\English;
use Kayrah87\NameParser\Part\Salutation;
use Kayrah87\NameParser\Part\Firstname;
use Kayrah87\NameParser\Part\Lastname;
use Kayrah87\NameParser\Part\LastnamePrefix;

class LastnameMapperTest extends AbstractMapperTest
{
    /**
     * @return array
     */
    public function provider()
    {
        return [
            [
                'input' => [
                    'Peter',
                    'Pan',
                ],
                'expectation' => [
                    'Peter',
                    new Lastname('Pan'),
                ],
            ],
            [
                'input' => [
                    new Salutation('Mr'),
                    'Peter',
                    'Pan',
                ],
                'expectation' => [
                    new Salutation('Mr'),
                    'Peter',
                    new Lastname('Pan'),
                ],
            ],
            [
                'input' => [
                    new Salutation('Mr'),
                    new Firstname('Peter'),
                    'Pan',
                ],
                'expectation' => [
                    new Salutation('Mr'),
                    new Firstname('Peter'),
                    new Lastname('Pan'),
                ],
            ],
            [
                'input' => [
                    new Salutation('Mr'),
                    'Lars',
                    'van',
                    'Trier',
                ],
                'expectation' => [
                    new Salutation('Mr'),
                    'Lars',
                    new LastnamePrefix('van'),
                    new Lastname('Trier'),
                ],
            ],
            [
                'input' => [
                    new Salutation('Mr'),
                    'Dan',
                    'Huong',
                ],
                'expectation' => [
                    new Salutation('Mr'),
                    'Dan',
                    new Lastname('Huong'),
                ],
            ],
            [
                'input' => [
                    new Salutation('Mr'),
                    'Von',
                ],
                'expectation' => [
                    new Salutation('Mr'),
                    new Lastname('Von'),
                ],
            ],
            [
                'input' => [
                    'Mr',
                    'Von',
                ],
                'expectation' => [
                    'Mr',
                    new Lastname('Von'),
                ],
            ],
            [
                'input' => [
                    'Kirk'
                ],
                'expectation' => [
                    'Kirk'
                ],
            ],
            [
                'input' => [
                    'Kirk',
                ],
                'expectation' => [
                    new Lastname('Kirk'),
                ],
                'arguments' => [
                    true
                ],
            ]
        ];
    }

    protected function getMapper($matchSingle = false)
    {
        $english = new English();

        return new LastnameMapper($english->getLastnamePrefixes(), $matchSingle);
    }
}
