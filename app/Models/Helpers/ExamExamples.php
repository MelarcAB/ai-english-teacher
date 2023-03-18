<?php

namespace App\Models\Helpers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamExamples extends Model
{

    private $exam_examples = [
        "A1" => [
            "EXAMPLE_READING" => "DR MARTENS AT 50
            Dr Martens boots were introduced into Britain 50 years ago, a half‐century that has seen the country
            transformed, as musical movements have emerged and declined, and fashions come and gone.
            However, DMs have been the footwear of choice for everyone, from punks to policemen. Klaus
            Märtens, the German army doctor who created the original design after a skiing injury, thought of an
            air‐cushioned sole. It provided comfort and absorbed impact from walking and running.
            For the first few years in Britain, Dr Martens were the working men's boots, worn in factories and by
            postmen. When Pete Townshend, from the Who, wore them in 1966, they became fashionable.
            Townshend bought DMs because he was tired of the 1960s clothes. \"I was sick of dressing up as a
            Christmas tree in clothes that disturbed my guitar playing,\" he says. The boots helped him jump
            around on stage, and reminded him of his working‐class origins.
            By the 70s DMs had been adopted and made part of their uniform by several subcultures, such as
            mods, rockers, goths, and the most frightening of all, skinheads. Gavin Watson was a teenage
            skinhead. \"I was 12 when I bought my first DMs,\" Watson says. \"And the rule was to baptize them by
            kicking someone, it didn't matter who.",

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
        ]
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
