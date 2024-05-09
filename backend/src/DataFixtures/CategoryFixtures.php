<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categoriesData = [
            [
                'name' => 'Beach Holidays',
                'description' => 'Relaxing vacations by the sea with sun, sand, and surf.',
            ],
            [
                'name' => 'Adventure Travel',
                'description' => 'Exciting trips for adrenaline junkies seeking thrill and excitement.',
            ],
            [
                'name' => 'Cultural Tours',
                'description' => 'Immersive journeys to explore diverse cultures, traditions, and heritage sites.',
            ],
            [
                'name' => 'Wildlife Safaris',
                'description' => 'Experiences to observe and appreciate the wonders of the natural world.',
            ],
            [
                'name' => 'Urban Exploration',
                'description' => 'Discovering the vibrant energy and unique charm of cities around the globe.',
            ],
            [
                'name' => 'Wellness Retreats',
                'description' => 'Rejuvenating escapes focused on health, relaxation, and self-care.',
            ],
            [
                'name' => 'Eco-Tourism',
                'description' => 'Responsible travel promoting conservation, sustainability, and environmental awareness.',
            ],
            [
                'name' => 'Food and Wine Tours',
                'description' => 'Gastronomic adventures to savor delicious cuisines and fine wines.',
            ],
            [
                'name' => 'Historical Journeys',
                'description' => 'Journeys through time to explore the rich history and heritage of civilizations.',
            ],
            [
                'name' => 'Mountain Expeditions',
                'description' => 'Challenging treks and climbs to conquer majestic peaks and breathtaking landscapes.',
            ],
        ];

        foreach ($categoriesData as $categoryData) {
            $category = new Category();
            $category->setName($categoryData['name']);
            $category->setDescription($categoryData['description']);
            $manager->persist($category);
        }

        $manager->flush();
    }
}
