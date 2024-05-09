<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use App\Entity\Status;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ContactFixtures extends Fixture
{
    protected $faker;

    public function __construct()
    {
        // Instantiating Faker with French language settings:
        // $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        // $status = $manager->getRepository(Status::class)->findOneBy(['name' => 'Not read']);
        // if (!$status) {
        //     $status = new Status();
        //     $status->setName('Not read');
        //     $manager->persist($status);
        // }


        // for ($i=0; $i < 10; $i++) {
        //     $contact = new Contact();
        //     $contact->setFirstName($this->faker->firstName());
        //     $contact->setLastName($this->faker->lastName());
        //     $contact->setEmail($this->faker->email());
        //     $contact->setMessage($this->faker->text());
        //     $contact->setStatus($status);

        //     $manager->persist($contact);
        // }

        // $manager->flush();
    }
}
