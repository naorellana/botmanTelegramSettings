<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class UMGfechas extends Conversation
{
    /**
     * First question
     */
    public function askReason()
    {
        $question = Question::create("Te compartiré la información de mi calendario. ¿Qué mes deseas consultar?")
            ->fallback('Lo siento, no tengo esa información ')
            ->callbackId('ask_reason')
            ->addButtons([
                Button::create('Enero')->value('Enero'),
                Button::create('Febrero')->value('Febrero'),
                Button::create('Marzo')->value('Marzo'),
                Button::create('Abril')->value('Abril'),
                Button::create('Mayo')->value('Mayo'),
                Button::create('Junio')->value('Junio'),
                Button::create('Julio')->value('Julio'),
                Button::create('Agosto')->value('Agosto'),
                Button::create('Septiembre')->value('Septiembre'),
                Button::create('Octubre')->value('Octubre'),
                Button::create('Noviembre')->value('Noviembre'),
                Button::create('Diciembre')->value('Diciembre'),
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                //opcion
                if ($answer->getValue() === 'Enero') {
                    $this->say('Inscripciones, asignaciones y reasignaciones ordinarias
                    Evaluaciones de recuperación -año anterior- (1ra y 2da semana) 
                    ');
                }
                //opcion
                if ($answer->getValue() === 'Febrero') {
                    $this->say('Inicio de clases primer semestre (1er semana)
                    Inscripciones, asignaciones y reasignaciones extraordinarias (2da y 3er semana)
                    Inscripciones, asignaciones y reasignaciones extemporáneas (4ta semana)
                    ');
                }
                //opcion
                if ($answer->getValue() === 'Marzo') {
                    $this->say('Primer parcial (2da semana)
                    Evaluaciones extraordinarias
                    ');
                }
                //opcion
                if ($answer->getValue() === 'Abril') {
                    $this->say('Segundo Parcial (4ta semana)');
                }
                //opcion
                if ($answer->getValue() === 'Mayo') {
                    $this->say('Segundo parcial (1er semana)
                    Evaluaciones extraordinarias
                    ');
                }
                //opcion
                if ($answer->getValue() === 'Junio') {
                    $this->say('Exámenes finales(1ra y 2da semana)
                    Evaluaciones extraordinarias (3ra y 4ta semana)
                    ');
                }
                //opcion
                if ($answer->getValue() === 'Julio') {
                    $this->say('Inscripciones, Inicio de clases segundo semestre (1er semana)
                    Inscripciones, asignaciones y reasignaciones extraordinarias (2da y 3er semana)
                    Inscripciones, asignaciones y reasignaciones extemporáneas (4ta semana)
                    ');
                }
                //opcion
                if ($answer->getValue() === 'Agosto') {
                    $this->say('Primer parcial (2da semana)
                    Evaluaciones extraordinarias
                    ');
                }
                //opcion
                if ($answer->getValue() === 'Septiembre') {
                    $this->say('Segundo parcial (2da semana)
                    Evaluaciones extraordinarias
                    ');
                }
                //opcion
                if ($answer->getValue() === 'Octubre') {
                    $this->say('');
                }
                //opcion
                if ($answer->getValue() === 'Noviembre') {
                    $this->say('Exámenes finales(1ra y 2da semana)
                    Evaluaciones extraordinarias (Enero Próximo año)
                    ');
                }
                 //opcion
                if ($answer->getValue() === 'Diciembre') {
                    $this->say('');
                }
            }
        });
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askReason();
    }
}
