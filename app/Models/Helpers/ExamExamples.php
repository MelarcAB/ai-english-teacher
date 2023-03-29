<?php

namespace App\Models\Helpers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamExamples extends Model
{

    private $exam_examples = [
        "A1" => [
            "EXAMPLE_READING" => "A trip to Alaska
            Alaska is an extraordinary place. It’s the biggest state in the USA – it has North America’s highest mountain
            and the world’s most dramatic glaciers. In fact nothing in Alaska is small. Even the people are big!
            The population of Alaska is just 610,000. Some people, like the Inuits, live in Arctic villages hundreds of
            kilometres from the nearest town. Other Alaskans live in small cities like Anchorage and Juneau. In places
            like Anchorage everybody has a car, but they also have a plane. There aren’t any roads outside the cities, so
            flying is the only way you can travel. Many people have boat planes, and lakes near towns and cities often
            look like plane car parks.
            One of the most famous places in Alaska is the Denali National Park. The park is one of the most beautiful
            nature reserves in the world, and you can only get there by private plane. Pilots usually land on a riverbank
            and leave you there. Then they pick you up at the same time, in the same place a few days later!
            Alaska is also famous for being cold. The lowest temperature ever recorded was
            -80 ̊ C! It’s also dark. There isn’t much sunlight during winter, although you can see red, green, and blue
            ‘Northern Lights’ in the sky.
            Many tourists visit Alaska in the spring and summer. Few tourists go in winter. From November to
            February, Alaska is so cold that planes often get ‘weathered in’ and can’t fly. Winter holidays in Alaska can
            be longer than you planned!",

            "EXAMPLE_READING_QUESTIONS" => "Since their arrival in Britain, DMs have…
            a) become old‐fashioned.
            b) been transformed.
            c) been worn by all kinds of people.
            d) I don’t know
            Doctor Märtens created the boots…
            a) because of an accident.
            b) for the army.
            c) for runners.
            d) I don’t know
            DMs were first seen in Britain…
            a) as a new fashion.
            b) as footwear for workers.
            c) when the Who started wearing them.
            d) I don’t know
            Skinheads…
            a) attacked anyone with their new DMs.
            b) bought their first DMs before they were 13.
            c) didn’t have rules.
            d) I don’t know
            In the 70s, … wore DMs.
            a) different groups
            b) mods never
            c) only skinheads
            d) I don’t know",
            "GAMMAR_QUESTIONS" => " Hello, Susan. How are you?a) I’m Mary’s brother.b) I’m going home.c) I’m not very well.d) I don’t know.  | When can we meet again? a) It was two days ago. b) When are you free? c) Can you help me? d) I don’t know. |  Joe ___  at school last week. a) didn't be b) isn’t c) wasn’t d) I don’t know. | . They ___ the TV and watched the program. a) turned on b) looked after c) turned off d) I don’t know",
            "WRITING" => "Last year you studied at university in a foreign country. Write a letter to a British friend telling him/her about: the town you lived in, describe your best friend there, the places you visited",
            "VOCABULARY" => "According to ___________ [weather/the climate] forecast, it will clear up tomorrow. | An _____________ [architect/builder] is a person who designs buildings| A synonym of gift is ___________ [gadget/present/] | I enjoyed the concert .It was ___________ [amused/amusing]"
        ],


        "A2" => [
            "EXAMPLE_READING" => "WELCOME TO CYBERSPACE!
            Travel around the magnificent world of the Internet with COMEWITHUS.COM.
            The Internet: a world of information, entertainment and communication. Are you on-line? If not, think
            about what you’re missing. You could get the latest news it even appears TV: you could take part in
            discussions about things that interest you with people from around the world; you could make new
            friends who share your ideas and hobbies; you could send messages to your friends abroad – they
            will reach them immediately, and at a minimum cost; you could go shopping for anything, anywhere
            in the world, and pay much less than you would in a shop.
            All you need to do is call us FREE on 0800-600-600, and we will take care of everything!
            Everything you need will come to your house in 24 hours, and you will be ready to start surfing the
            net! And, with COMEWITHUS.COM, going on the Internet will cost you very little. For £25 a month,
            you can have your own Internet connection, and your own e-mail address. So call us now, on
            0800-600-600, and start exploring the wonderful world of the Internet!",
            "EXAMPLE_READING_QUESTIONS" => " COMEWITHUS.COM sell
            a) TVs b) telephones c) Internet connections |
            2. According to the advertisement, with “COMEWITHUS.COM” you can
            a) make new friends b) travel abroad c) appear on TV |
            3. If you want to connect to the Internet with “COMEWITHUS.COM” you have to
             a) send them a message b) call them c) take part in a discussion |
            4. Calling “COMEWITHUS.COM” on the phone will cost you
            a) a fortune b) very little c) nothing |",
            "GAMMAR_QUESTIONS" => "George is ................ than Nick.
            a) tall b) taller c) tallest |
           2. What time ..... Calais tomorrow afternoon?
           a) do the ferry reach b) is the ferry reaching c) does the ferry reach|
           3. My friend ..................... lives in Australia is a nurse.
           a) who b) which c) whose|
           4. I like walking in the park ............. hot days.
           a) at b) on c) in|
           5. Centuries ago, people ………. animals for food.
           a) transported b) played c) hunted |",
            "WRITING" => "You want to buy some clothes in an English city. Write an email to your English friend, George.
            In your email,
            - Ask George where to buy cheap clothes
            - Ask George how to get there
            - Ask what time the stores stay open",
            "VOCABULARY" => "People used to cook by using wood a hundred yuears ___ a) before  b) past c) ago | It ___ one hour and half to get to the museum but the journey was quite funny. a)passed b)spent c)took| I'm the same ___ as my oldest brother's son. a)age b)birthday c)year"
        ],



        "B1" => [
            "EXAMPLE_READING" => "",
            "EXAMPLE_READING_QUESTIONS" => "",
            "GAMMAR_QUESTIONS" => "",
            "WRITING" => "",
            "VOCABULARY" => ""
        ],
        "B2" => [
            "EXAMPLE_READING" => "",
            "EXAMPLE_READING_QUESTIONS" => "",
            "GAMMAR_QUESTIONS" => "",
            "WRITING" => "",
            "VOCABULARY" => ""
        ],
        "C1" => [
            "EXAMPLE_READING" => "",
            "EXAMPLE_READING_QUESTIONS" => "",
            "GAMMAR_QUESTIONS" => "",
            "WRITING" => "",
            "VOCABULARY" => ""
        ],
        "C2" => [
            "EXAMPLE_READING" => "",
            "EXAMPLE_READING_QUESTIONS" => "",
            "GAMMAR_QUESTIONS" => "",
            "WRITING" => "",
            "VOCABULARY" => ""
        ],

    ];


    public  function getExampleExam($level = "A1")
    {
        $exam_examples = new ExamExamples();
        //verificar que el nivel existe
        if (!array_key_exists($level, $exam_examples->exam_examples)) {
            return [];
        }
        //devolver el ejemplo
        return $exam_examples->exam_examples[$level];
    }
}
