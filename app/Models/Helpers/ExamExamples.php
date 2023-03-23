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
            "GAMMAR_QUESTIONS" => " Hello, Susan. How are you?a) I’m Mary’s brother.b) I’m going home.c) I’m not very well.d) I don’t know.  | When can we meet again? a) It was two days ago. b) When are you free? c) Can you help me? d) I don’t know. |  Joe ___  at school last week. a) didn't be b) isn’t c) wasn’t d) I don’t know. | . They ___ the TV and watched the program. a) turned on b) looked after c) turned off d) I don’t know"
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
