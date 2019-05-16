<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class DistribuidorInfo extends Conversation
{
 protected $firstname;

    protected $email;

    public function askFirstname()
    {
        $this->bot->typesAndWaits(0);    
        $this->ask('Hola, Dime tu nombre por favor 😊', function(Answer $answer) {
            // Save result
            $this->firstname = $answer->getText();
            $this->bot->typesAndWaits(4);
            $this->say('Bienvenido '.$this->firstname.', Gracias por estar interesado en formar parte de nuestra cadena de distribuidores.');
            $this->askReason();
        });
    }

    

      public function askReason()
    {
        $this->bot->typesAndWaits(3);
        $question = Question::create("¿Deseas visitar nuestro sitio web?")
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
                    $this->bot->typesAndWaits(3);
                    $this->say('Puedes visitar nuestro sitio web ingresando a: http://demo.prestashop.com/es/?view=front
');
                }
                //opcion
                if ($answer->getValue() === 'No') {
                    $this->bot->typesAndWaits(3);
                    $this->say('Puedes solicitar mayor información escribiendo a norellanac@miumg.edu.gt');
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