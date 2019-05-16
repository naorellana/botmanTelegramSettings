<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class UMGgestion extends Conversation
{
    protected $firstname;

    protected $email;

    public function askReason()
    {
        $question = Question::create("Puedes realizar tus gestiones o solicitudes en: ")
            ->fallback('Lo siento, no tengo esa información ')
            ->callbackId('ask_reason')
            ->addButtons([
                Button::create('Oficina')->value('Oficina'),
                Button::create('Virtual')->value('Virtual'),
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                //opcion
                if ($answer->getValue() === 'Oficina') {
                    $this->say('San José Pinula, Guatemala. 3 calle 3-12 zona 4 - Tel. (502) 6641 5396 -Tel. (502) 6641 5380
pinula@umg.edu.gt

Certificación De cursos 
Asignación de cursos 
Impresión de Boletas para pagos y gestiones requeridas');
                }
                //opcion
                if ($answer->getValue() === 'Virtual') {
                    $this->say('Inscripción:    https://www.bienlinea.bi.com.gt/login/index.aspx?complete=true 
Pagos: https://www.bienlinea.bi.com.gt/login/index.aspx?complete=true
Certificación de cursos (Solo estudiantes): https://apps.umg.edu.gt/acad/certificaciones   
Asignación de Cursos: https://apps.umg.edu.gt/inscripciones/login.php 
Consultar  notas: https://www.umg.edu.gt/informacion-general-y-procedimientos/consulta-de-notas/ 
');
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
