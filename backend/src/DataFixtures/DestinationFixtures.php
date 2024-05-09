<?php

namespace App\DataFixtures;

use App\Entity\Destination;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DestinationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // List of destinations with city, country, and image URLs
        $destinations = [
            
            
            ['city' => 'Bangkok', 'country' => 'Thailand', 'image' => 'https://images.unsplash.com/photo-1523731407965-2430cd12f5e4?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'],
            ['city' => 'Dubai', 'country' => 'United Arab Emirates', 'image' => 'https://images.unsplash.com/flagged/photo-1559717201-fbb671ff56b7?q=80&w=1471&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'],
            ['city' => 'Amsterdam', 'country' => 'Netherlands', 'image' => 'https://images.unsplash.com/photo-1534351590666-13e3e96b5017?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'],
            ['city' => 'Buenos Aires', 'country' => 'Argentina', 'image' => 'https://images.unsplash.com/photo-1610135206707-0f03e4800631?q=80&w=1287&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'],
            ['city' => 'Istanbul', 'country' => 'Turkey', 'image' => 'https://images.unsplash.com/photo-1527838832700-5059252407fa?q=80&w=1298&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'],
            ['city' => 'Prague', 'country' => 'Czech Republic', 'image' => 'https://images.unsplash.com/photo-1600623471616-8c1966c91ff6?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'],
            ['city' => 'Seoul', 'country' => 'South Korea', 'image' => 'https://images.unsplash.com/photo-1570191913384-7b4ff11716e7?q=80&w=1287&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'],
            ['city' => 'Vancouver', 'country' => 'Canada', 'image' => 'https://images.unsplash.com/photo-1559510904-60bd53ecb973?q=80&w=1537&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'],
            ['city' => 'Singapore', 'country' => 'Singapore', 'image' => 'https://images.unsplash.com/photo-1542114740389-9b46fb1e5be7?q=80&w=1332&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'],
            ['city' => 'Budapest', 'country' => 'Hungary', 'image' => 'https://images.unsplash.com/photo-1565426873118-a17ed65d74b9?q=80&w=2076&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'],
            ['city' => 'Florence', 'country' => 'Italy', 'image' => 'https://images.unsplash.com/photo-1537366057310-3501fc868fd8?q=80&w=1315&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'],
            ['city' => 'San Francisco', 'country' => 'USA', 'image' => 'https://images.unsplash.com/photo-1501594907352-04cda38ebc29?q=80&w=1332&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'],
            ['city' => 'Kyoto', 'country' => 'Japan', 'image' => 'https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'],
            ['city' => 'Vienna', 'country' => 'Austria', 'image' => 'https://images.unsplash.com/photo-1516550893923-42d28e5677af?q=80&w=1472&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'],
            ['city' => 'Marrakech', 'country' => 'Morocco', 'image' => 'https://images.unsplash.com/photo-1587974928442-77dc3e0dba72?q=80&w=1524&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'],
            ['city' => 'Berlin', 'country' => 'Germany', 'image' => 'https://images.unsplash.com/photo-1566404791232-af9fe0ae8f8b?q=80&w=1336&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'],
            ['city' => 'Auckland', 'country' => 'New Zealand', 'image' => 'https://images.unsplash.com/photo-1577581739644-d302d8ca8392?q=80&w=1364&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'],
            ['city' => 'Moscow', 'country' => 'Russia', 'image' => 'https://images.unsplash.com/photo-1513326738677-b964603b136d?q=80&w=1349&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'],
            ['city' => 'Dublin', 'country' => 'Ireland', 'image' => 'https://images.unsplash.com/photo-1602797882193-51cb0e037534?q=80&w=1473&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'],
            ['city' => 'Stockholm', 'country' => 'Sweden', 'image' => 'https://images.unsplash.com/photo-1588653818221-2651ec1a6423?q=80&w=1471&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'],
            ['city' => 'Reykjavik', 'country' => 'Iceland', 'image' => 'https://images.unsplash.com/photo-1474690870753-1b92efa1f2d8?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'],
            ['city' => 'Lisbon', 'country' => 'Portugal', 'image' => 'https://images.unsplash.com/photo-1558102400-72da9fdbecae?q=80&w=1396&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'],
            ['city' => 'Santorini', 'country' => 'Greece', 'image' => 'https://images.unsplash.com/photo-1570077188670-e3a8d69ac5ff?q=80&w=1438&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'],
            ['city' => 'Damascus', 'country' => 'Syria', 'image' => 'https://images.unsplash.com/photo-1636052494749-8a6e647efe88?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'],
            ['city' => 'Machu Picchu', 'country' => 'Peru', 'image' => 'https://images.unsplash.com/photo-1587595431973-160d0d94add1?q=80&w=1476&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'],
        ];

        // Loop through each destination and create fixtures
        foreach ($destinations as $destinationData) {
            $destination = new Destination();
            $destination->setCity($destinationData['city']);
            $destination->setCountry($destinationData['country']);
            $destination->setImage($destinationData['image']);

            // Persist the destination
            $manager->persist($destination);
        }

        // Flush all persisted data to the database
        $manager->flush();
    }
}
