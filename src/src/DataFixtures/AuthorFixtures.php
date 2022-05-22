<?php

namespace App\DataFixtures;

use App\Entity\Author;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AuthorFixtures extends Fixture
{
    public const QINGUAN_SONG_AUTHOR = 'Qingquan Song';
    public const HAIFENG_JIN_AUTHOR = 'Haifeng Jin';
    public const XIA_HU_AUTHOR = 'Xia Hu';

    public function load(ObjectManager $manager): void
    {
        $authors = [
            self::QINGUAN_SONG_AUTHOR => (new Author())->setName('Qingquan Song')->setSlug('qingquan-song'),
            self::HAIFENG_JIN_AUTHOR => (new Author())->setName('Haifeng Jin')->setSlug('haifeng-jin'),
            self::XIA_HU_AUTHOR => (new Author())->setName('Xia Hu')->setSlug('xia-hu'),
        ];

        foreach ($authors as $author) {
            $manager->persist($author);
        }

        $manager->flush();

        foreach ($authors as $code => $author) {
            $this->addReference($code, $author);
        }
    }
}
