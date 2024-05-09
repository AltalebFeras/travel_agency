<?php

namespace App\DataFixtures;

use App\Entity\Trip;
use App\Entity\User;
use App\Repository\CategoryRepository;
use App\Repository\DestinationRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TripFixtures extends Fixture implements DependentFixtureInterface
{
    private DestinationRepository $destinationRepository;
    private CategoryRepository $categoryRepository;

    public function __construct(DestinationRepository $destinationRepository, CategoryRepository $categoryRepository)
    {
        $this->destinationRepository = $destinationRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function load(ObjectManager $manager): void
    {
        // Get all destinations
        $destinations = $this->destinationRepository->findAll();

        // Get all categories
        $categories = $this->categoryRepository->findAll();

        // Trip names and descriptions
        $tripNames = [
            'Romantic Getaway', 'Cultural Experience', 'Adventure Expedition', 'Historical Journey',
            'Nature Exploration', 'Urban Escape', 'Foodie Adventure', 'Relaxing Retreat', 'Family Vacation',
            'Beach Paradise', 'Mountain Adventure', 'Safari Expedition', 'City Tour', 'Luxury Escape',
            'Spiritual Retreat', 'Road Trip', 'Winter Wonderland', 'Tropical Getaway', 'Artistic Discovery',
            'Wellness Retreat', 'Wildlife Safari', 'Scenic Drive', 'Hiking Expedition', 'Photography Tour',
            'Shopping Spree', 'Gastronomic Tour', 'Cruise Experience', 'Backpacking Adventure', 'Desert Safari',
            'Festival Exploration', 'Wine Tasting Tour', 'Island Hopping', 'Architectural Tour',
            'Sporting Adventure', 'Yoga Retreat',
        ];

        $tripDescriptions = [
            'Romantic Getaway' => 'Escape with your loved one to a romantic paradise filled with love and serenity.',
            'Cultural Experience' => 'Immerse yourself in the rich cultural heritage of diverse communities and traditions.',
            'Adventure Expedition' => 'Embark on an adrenaline-fueled journey through untamed landscapes and thrilling escapades.',
            'Historical Journey' => 'Travel back in time to explore the wonders and mysteries of ancient civilizations.',
            'Nature Exploration' => 'Discover the breathtaking beauty and tranquility of pristine natural landscapes.',
            'Urban Escape' => 'Indulge in the vibrant energy and endless possibilities of bustling city life.',
            'Foodie Adventure' => 'Savor the flavors and delights of gastronomic wonders from around the world.',
            'Relaxing Retreat' => 'Rejuvenate your mind, body, and soul in a blissful sanctuary of peace and relaxation.',
            'Family Vacation' => 'Create unforgettable memories with your loved ones on a fun-filled family adventure.',
            'Beach Paradise' => 'Bask in the sun and soak up the laid-back vibes of a tropical beach paradise.',
            'Mountain Adventure' => 'Challenge yourself to conquer towering peaks and rugged terrain in the heart of the mountains.',
            'Safari Expedition' => 'Embark on an epic safari adventure and witness the awe-inspiring beauty of wild animals in their natural habitat.',
            'City Tour' => 'Discover the hidden gems and iconic landmarks of bustling cities on an immersive city tour.',
            'Luxury Escape' => 'Indulge in the ultimate luxury experience and pamper yourself with opulent accommodations and exquisite amenities.',
            'Spiritual Retreat' => 'Find inner peace and enlightenment on a spiritual journey of self-discovery and reflection.',
            'Road Trip' => 'Hit the open road and embark on an epic road trip filled with adventure and unforgettable experiences.',
            'Winter Wonderland' => 'Embrace the magic of winter in a snowy wonderland filled with festive cheer and snowy landscapes.',
            'Tropical Getaway' => 'Escape to a tropical paradise of palm-fringed beaches and crystal-clear waters.',
            'Artistic Discovery' => 'Immerse yourself in the vibrant world of art and creativity as you explore galleries and art districts.',
            'Wellness Retreat' => 'Nurture your body, mind, and soul on a rejuvenating wellness retreat focused on holistic healing.',
            'Wildlife Safari' => 'Embark on a thrilling wildlife safari and encounter majestic creatures in their natural habitat.',
            'Scenic Drive' => 'Take the scenic route and soak in breathtaking views of picturesque landscapes and charming villages.',
            'Hiking Expedition' => 'Challenge yourself to new heights on an exhilarating hiking expedition through rugged terrain and stunning vistas.',
            'Photography Tour' => 'Capture the beauty of the world through the lens of your camera on a photography tour.',
            'Shopping Spree' => 'Indulge in retail therapy and shop till you drop in the world\'s most iconic shopping destinations.',
            'Gastronomic Tour' => 'Embark on a culinary adventure and tantalize your taste buds with gourmet delights from around the world.',
            'Cruise Experience' => 'Set sail on a luxurious cruise ship and explore exotic destinations with all the comforts of home.',
            'Backpacking Adventure' => 'Embark on a journey of self-discovery and adventure as you travel the world with just a backpack.',
            'Desert Safari' => 'Venture into the vast expanse of the desert and experience the thrill of dune bashing and camel rides.',
            'Festival Exploration' => 'Immerse yourself in the vibrant energy of festivals and celebrations around the world.',
            'Wine Tasting Tour' => 'Sip and savor your way through picturesque vineyards and taste the finest wines in the world.',
            'Island Hopping' => 'Hop from one idyllic island paradise to another and discover the beauty of tropical archipelagos.',
            'Architectural Tour' => 'Marvel at the awe-inspiring architecture and iconic landmarks of historic cities.',
            'Sporting Adventure' => 'Get your adrenaline pumping with thrilling sporting adventures and adrenaline-fueled activities.',
            'Yoga Retreat' => 'Reconnect with your inner self and find peace and balance on a rejuvenating yoga retreat.',
        ];

        // Get the current date
        $currentDate = new \DateTime();

        // Create twenty-five trips
        for ($i = 1; $i <= 25; $i++) {
            // Get random departure and coming back dates within the next year
            $departure = clone $currentDate;
            $departure->modify('+' . rand(0, 365) . ' days')->setTime(rand(0, 23), rand(0, 59));
            $comingBack = clone $departure;
            $comingBack->modify('+' . rand(1, 14) . ' days')->setTime(rand(0, 23), rand(0, 59));

            // Get a random destination and remove it from the list
            $randomDestinationIndex = array_rand($destinations);
            $randomDestination = $destinations[$randomDestinationIndex];
            unset($destinations[$randomDestinationIndex]);
            $destinations = array_values($destinations); // Reindex array after removing the selected destination

            $trip = new Trip();
            $trip->setName($tripNames[$i - 1]);
            $trip->setDeparture($departure);
            $trip->setComingBack($comingBack);
            $trip->setDescription($tripDescriptions[$tripNames[$i - 1]]);
            $trip->setPrice(rand(100, 2000)); // Random price between 100 and 2000

            // Assign random categories to the trip
            $randomCategories = $this->getRandomCategories($categories);
            foreach ($randomCategories as $category) {
                $trip->addCategory($category);
            }

            // Set the destination
            $trip->setDestination($randomDestination);

            // Add user (assuming you have a user available, replace 3 with the actual user id)
            $user = $manager->getRepository(User::class)->find(3);
            $trip->setUser($user);

            // Persist the trip
            $manager->persist($trip);
        }

        // Flush all persisted data to the database
        $manager->flush();
    }

    private function getRandomCategories(array $categories): array
    {
        $randomCategories = [];
        foreach ($categories as $category) {
            // Randomly decide whether to assign this category to the trip (adjust probability as needed)
            if (rand(0, 1) === 1) {
                $randomCategories[] = $category;
            }
        }
        return $randomCategories;
    }

    /**
     * @inheritDoc
     */
    public function getDependencies(): array
    {
        return [
            DestinationFixtures::class, // Ensure DestinationFixtures are loaded first
            CategoryFixtures::class, // Ensure CategoryFixtures are loaded first
        ];
    }
}
