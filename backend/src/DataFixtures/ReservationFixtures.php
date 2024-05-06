<?php

namespace App\DataFixtures;

use App\Entity\Reservation;
use App\Entity\Status;
use App\Entity\Trip;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ReservationFixtures extends Fixture
{
    protected $faker;

    public function __construct()
    {
        // Instantiating Faker with French language settings:
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        // Find or create the status entity representing "Not read"
        $status = $manager->getRepository(Status::class)->findOneBy(['name' => 'Not read']);
        if (!$status) {
            $status = new Status();
            $status->setName('Not read');
            $manager->persist($status);
        }

        // Loop to create 10 reservation records:
        for ($i = 0; $i < 10; $i++) {
            $reservation = new Reservation();
            $reservation->setFirstName($this->faker->firstName());
            $reservation->setLastName($this->faker->lastName());
            $reservation->setTelephone($this->faker->phoneNumber());
            $reservation->setEmail($this->faker->email());

            // Generate a random tripId between 1 and 3
            $tripId = $this->faker->numberBetween(1, 3); 
            // Find the Trip entity by its id
            $trip = $manager->getRepository(Trip::class)->find($tripId);
            // Set the Trip entity for the reservation
            $reservation->setTrip($trip);

            $reservation->setStatus($status);

            $manager->persist($reservation);
        }

        $manager->flush();
    }
}
