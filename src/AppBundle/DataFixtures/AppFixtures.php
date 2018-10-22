<?php

namespace AppBundle\DataFixtures;


use AppBundle\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        foreach ($this->getData() as $data) {
            $post = new Post();
            $post->setTitle($data['title'])
                ->setcontent($data['content'])
                ->setbanner($data['banner']);
            $manager->persist($post);
        }

        $manager->flush();
    }

    /**
     * @return array
     */
    private function getData()
    {
        return [
            array(
                'title' => 'THE BEST WII U GAMES OF 2016',
                'content' => <<<EOC
Nintendo's Wii U has a reputation as a bit of a video game industry punching bag. It's much less powerful than the competition, its tablet-like GamePad controller hasn't been utilized well in many games, and most games don't come out on the console.

All of those things, as well as the fact that plenty of people don't realize it's a whole new console, have made it Nintendo's least successful console. But the games that are exclusive to Wii U tend to be really, really good. To that end, we put together a list with the best games to play on the Wii U right now:
EOC
,
                'banner' => 'uploads/sample1.jpg',
            ),
            array(
                'title' => 'VOTING FOR THE PEOPLE\'S CHOICE BEST WII U GAME OF 2016!',
                'content' => <<<EOC
2016 has been another extraordinary year for pop culture. Years-in-the-making games like Overwatch, Stardew Valley, and The Witness were released to critical acclaim, and sequels like Pokemon Sun & Moon, Gears of War 4 and Uncharted 4 breathed new life into long-running franchises.

    In theaters films like Moana and Zootopia elevated the family film, while The Arrival and Moonlight made us think. On the small screen the golden age of television continued thanks to incredible shows Westworld, Stranger Things, and Atlanta. Comic books had another banner year, too, thanks to excellent runs from the big two and dozens of indie creators.

    Below are all of IGN's nominees for 2016's Best Of...Everything. While you're here, be sure to vote in each category's People's Choice poll to make your voice heard! And check back on January 6, 2017 to see the full list of winners.
EOC
,
                'banner' => 'uploads/sample2.jpg',
            ),
            array(
                'title' => 'Gears of War film to rise like a Fenix thanksto Universal',
                'content' => <<<EOC
The idea of a Gears of War film has been thrown about Hollywood for years, dating back to 2007. It now looks like Universal Studios will be the one to take the franchise from your living room to the silver screen.

    Names attached to the project, according to The Hollywood Reporter, are Scott Stuber, producer of comedies like "Central Intelligence", "Ted" and "Role Models", and Dylan Clark, producer of the recent "Rise of the Planet of the Apes" series.


    A Gears of War flick was first attempted back in 2007 by New Line Cinema, though the project was beleaguered by budget cuts and rewrites. New Line seemingly gave up on the project in 2013, and there hasn't been much development, until now.

    The news comes ahead of Gears of War 4, one of the biggest Xbox One games of the year, being released next week. The game follows J.D. Fenix, the son of franchise protagonist Marcus Fenix, 25 years after the events of Gears of War 3.
EOC
,
                'banner' => 'uploads/sample3.jpg',
            ),
            array(
                'title' => 'Trailer Roundup - October 5, 2016',
                'content' => <<<EOC
Today's trailer roundup features merchants trekking through the desert, a creeper creeping on his creepy neighbor, and vikings riding walruses to defeat their enemies.
EOC
,
                'banner' => 'uploads/sample4.jpg',
            ),
            array(
                'title' => 'PlayStation VR: A Hardcore Console Gamer’s Perspective',
                'content' => <<<EOC
The act of console gaming has always been evolving: controllers got more buttons, then they went from digital to analog control. Games were on cartridges and then CDs, before upgrading to DVDs and Blu-ray discs. The biggest change in recent years was the adoption of motion control: Nintendo Wii, PlayStation Move, and then Microsoft Kinect.

With the introduction of virtual reality to consoles comes the next step forward, but does PlayStation VR solidify virtual reality as an integral part of the future for gamers? Or will it be forgotten by the majority of players, like the Kinect?
EOC
,
                'banner' => 'uploads/sample5.jpg',
            ),
        ];
    }
}
