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
        $question = Question::create("Esta información no  es oficial y los campos con * Pueden cambiar sin previo aviso ")
            ->fallback('Lo siento, no tengo esa información ')
            ->callbackId('ask_reason')
            ->addButtons([
                Button::create('Precios')->value('Precios'),
                Button::create('Recargos')->value('Recargos'),
                Button::create('Donde Pagar')->value('Pagar'),
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                //opcion
                if ($answer->getValue() === 'Precios') {
                    $this->say('*Inscripción Q 600.00
*Mensualidad Q 500.00
Examen extraordinario Q100
Certificación de cursos Q50.00
');
                }
                //opcion
                if ($answer->getValue() === 'Recargos') {
                    $this->say('Mora mensualidad Q 25.00 
Nota ingresada al estar insolvente Q 25.00
 ');
                }
                 
                 //opcion
                if ($answer->getValue() === 'Pagar') {
                    $this->say('Bancos:
GyT Continental
Banco Industrial
Banco Agromercantil
');                 
                    $this->say('Si tu banco lo permite, por medio de la banca virtual puedes hacer efectivo tu pago de:
Inscripción 
Mensualidad
Certificación de cursos
Pago de Multas
');
                }
            }
        });
    }



    public function run()
    {
        // This will be called immediately
        $this->askReason();
    }
}
