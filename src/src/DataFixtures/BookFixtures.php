<?php

namespace App\DataFixtures;

use App\Entity\Book;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class BookFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $androidCategory = $this->getReference(BookCategoryFixtures::ANDROID_CATEGORY);
        $devicesCategory = $this->getReference(BookCategoryFixtures::DEVICES_CATEGORY);
        
        $haifengAuthor = $this->getReference(AuthorFixtures::HAIFENG_JIN_AUTHOR);
        $qinguanAuthor = $this->getReference(AuthorFixtures::QINGUAN_SONG_AUTHOR);

        $book = (new Book())
            ->setTitle('RxJAVA for Android Developers')
            ->setPublicationDate(new DateTime('2019-04-01'))
            ->setMeap(false)
            ->setAuthors(new ArrayCollection([$haifengAuthor, $qinguanAuthor]))
            ->setSlug('rxjava-for-android-developers')
            ->setCategories(new ArrayCollection([$androidCategory, $devicesCategory]))
            ->setImage('https://images.manning.com/360/480/resize/book/b/bc57fb7-b239-4bf5-bbf2-886be8936951/Tuominen-RxJava-HI.png');

        $manager->persist($book);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            BookCategoryFixtures::class, 
            AuthorFixtures::class,
        ];
    }
}
