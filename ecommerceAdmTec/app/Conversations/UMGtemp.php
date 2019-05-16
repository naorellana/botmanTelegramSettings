<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class UMGpagos extends Conversation
{
    protected $firstname;

    protected $email;

    public function askReason()
    {
        $question = Question::create("")
            ->fallback('Lo siento, no tengo esa información ')
            ->callbackId('ask_reason')
            ->addButtons([
                Button::create('Enero')->value('Enero'),
                Button::create('Febrero')->value('Febrero'),
            ]);

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

    public function nota()
    {
        $this->ask('nota', function() {

            $this->say('');
        });
    }

    public function run()
    {
        // This will be called immediately
        $this->askReason();
    }
}
