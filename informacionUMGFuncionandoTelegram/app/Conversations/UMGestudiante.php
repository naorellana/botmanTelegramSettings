<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class UMGestudiante extends Conversation
{
 protected $firstname;

    protected $email;

    public function askFirstname()
    {
        $this->ask('Hola, Dime tu nombre por favor 😊', function(Answer $answer) {
            // Save result
            $this->firstname = $answer->getText();

            $this->say('Bienvenido '.$this->firstname.', Aquí encontraras información para ingreso a la universidad, información de carreras y centros de estudio. ');
            $this->askReason();
        });
    }

    public function askOther()
    {
        $this->ask('Eres estudiante de ingeniería en sistemas?', function(Answer $answer) {
            // Save result
            $this->email = $answer->getText();
            //opcion
                if ($answer->getValue() === 'si') {
                    $this->say('Crack');
                }
                //opcion
                if ($answer->getValue() === 'no') {
                    $this->say('Puto');
                }

            //$this->say('Great - that is all we need, '.$this->firstname);
        });
        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                //opcion
                if ($answer->getValue() === 'Enero') {
                    $this->say('Inscripciones');
                }
                //opcion
                if ($answer->getValue() === 'Febrero') {
                    $this->say('Inicio');
                }
                 
            }
        });
    }


      public function askReason()
    {
        $question = Question::create("Eres estudiante de ingeniería en sistemas?")
            ->fallback('Lo siento, no tengo esa información ')
            ->callbackId('ask_reason')
            ->addButtons([
                Button::create('Si')->value('Si'),
                Button::create('No')->value('No'),
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                //opcion
                if ($answer->getValue() === 'Si') {
                    $this->say('Bienvenido Ingeniero: 
Descarga la app del pensum Ingeniería en sistemas: https://play.google.com/store/apps/details?id=org.pensumsistemas.pablo.pensumumg 
');
                }
                //opcion
                if ($answer->getValue() === 'No') {
                    $this->say('Pensum De Carreras: https://apps.umg.edu.gt/pensa 
Centros De Estudio: https://www.umg.edu.gt/cu/ 
Facultades: https://www.umg.edu.gt/facultades/ 
Admisiones: http://www.umg.edu.gt/admisiones/#requisitos-de-admision 
');
                }
                 
            }
        });
    }

    public function run()
    {
        // This will be called immediately
        $this->askFirstname();
    }
}