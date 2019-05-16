<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

//imagenes y videos
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Attachments\Video;
use BotMan\BotMan\Messages\Attachments\Location;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
//***

class PaisesCobertura extends Conversation
{
    protected $firstname;

    protected $email;

    public function askReason()
    {   
        $this->bot->typesAndWaits(0);
        $question = Question::create("Te compartiré la información de nuestras oficinas internacionales. ¿Qué país deseas consultar?")
            ->fallback('Lo siento, no tengo esa información ')
            ->callbackId('ask_reason')
            ->addButtons([
                Button::create('Guatemala')->value('Guatemala'),
                Button::create('Honduras')->value('Honduras'),
                Button::create('Nicaragua')->value('Nicaragua'),
                Button::create('España')->value('España'),
                Button::create('Estados Unidos')->value('Estados Unidos'),
                Button::create('Alemania')->value('Alemania'),
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                //opcion
                if ($answer->getValue() === 'Guatemala') {
                    // Create attachment  //ubicacion
                    $attachment = new Location(14.554448, -90.403477, [
                        'custom_payload' => true,
                    ]);
                    // Create attachment IMAGEN
                    $attachment1 = new Image('https://drive.google.com/file/d/1X9tCyKarjMJwXx9__7sqTUXzJPQd9lFC/view?usp=sharing');

                    // Descripcion de imagen
                    $message1 = OutgoingMessage::create('San José Pinula, Universidad Mariano Gálvez 
                    Ingeniería en sistemas ')->withAttachment($attachment1);


                    // Build message object
                    $message = OutgoingMessage::create('¿Como llegar?')->withAttachment($attachment);
                    $this->say('Guatemala');
                    $this->bot->typesAndWaits(3);
                    $this->say($message);
                    $this->say($message1);
                }
                //opcion
                if ($answer->getValue() === 'Honduras') {
                    // Create attachment  //ubicacion
                    $attachment = new Location(14.102303, -87.187391, [
                        'custom_payload' => true,
                    ]);
                    // Create attachment IMAGEN
                    $attachment1 = new Image('https://lh5.googleusercontent.com/p/AF1QipNpz7s5pB3meEUPbvfR8Vo-tf5tt9OrMS3wNhgF=w408-h281-k-no');

                    // Descripcion de imagen
                    $message1 = OutgoingMessage::create('Hyatt Place Tegucigalpa')->withAttachment($attachment1);


                    // Build message object
                    $message = OutgoingMessage::create('¿Como llegar?')->withAttachment($attachment);
                    $this->bot->typesAndWaits(3);
                    $this->say('Honduras');
                    $this->say($message);
                    $this->say($message1);
                }
                //opcion
                if ($answer->getValue() === 'Nicaragua') {
                    // Create attachment  //ubicacion
                    $attachment = new Location(12.123618, -86.264931, [
                        'custom_payload' => true,
                    ]);
                    // Create attachment IMAGEN
                    $attachment1 = new Image('https://lh5.googleusercontent.com/p/AF1QipOjwOb1ILUFPgKYrd-kIPZalFSjloLnbhje9UOw=w425-h240-k-no');

                    // Descripcion de imagen
                    $message1 = OutgoingMessage::create('Hilton Princess Managua')->withAttachment($attachment1);


                    // Build message object
                    $message = OutgoingMessage::create('¿Como llegar?')->withAttachment($attachment);
                    $this->bot->typesAndWaits(3);
                    $this->say('Nicaragua');
                    $this->say($message);
                    $this->say($message1);
                }
                //opcion
                if ($answer->getValue() === 'España') {
                    // Create attachment  //ubicacion
                    $attachment = new Location(40.427260, -3.714492, [
                        'custom_payload' => true,
                    ]);
                    // Create attachment IMAGEN
                    $attachment1 = new Image('https://lh5.googleusercontent.com/p/AF1QipOuckmIkuTMf-ARyAOs-8YoWl3jxyqn7y2lSys=w408-h272-k-no');

                    // Descripcion de imagen
                    $message1 = OutgoingMessage::create('Meliá Madrid Princesa')->withAttachment($attachment1);


                    // Build message object
                    $message = OutgoingMessage::create('¿Como llegar?')->withAttachment($attachment);
                    $this->bot->typesAndWaits(3);
                    $this->say('España');
                    $this->say($message);
                    $this->say($message1);
                }
                //opcion
                if ($answer->getValue() === 'Estados Unidos') {
                    // Create attachment  //ubicacion
                    $attachment = new Location(31.823511, -106.506921, [
                        'custom_payload' => true,
                    ]);
                    // Create attachment IMAGEN
                    $attachment1 = new Image('https://lh5.googleusercontent.com/p/AF1QipNpZEQJuhC26e_gYaEFOk9qR_wiiFrpBeVAls4_=w408-h271-k-no');

                    // Descripcion de imagen
                    $message1 = OutgoingMessage::create('El Paso, Texas, EE. UU.')->withAttachment($attachment1);


                    // Build message object
                    $message = OutgoingMessage::create('¿Como llegar?')->withAttachment($attachment);
                    $this->bot->typesAndWaits(3);
                    $this->say('Estados Unidos');
                    $this->say($message);
                    $this->say($message1);
                }
                //opcion
                if ($answer->getValue() === 'Alemania') {
                    // Create attachment  //ubicacion
                    $attachment = new Location(51.064365, 9.927194, [
                        'custom_payload' => true,
                    ]);
                    // Create attachment IMAGEN
                    $attachment1 = new Image('https://lh5.googleusercontent.com/p/AF1QipOXJrdNlcm-5fIXSSbpdWcNO7fmK5ZqL7jfplXF=w408-h689-k-no');

                    // Descripcion de imagen
                    $message1 = OutgoingMessage::create('Región de Kassel, Alemania')->withAttachment($attachment1);


                    // Build message object
                    $message = OutgoingMessage::create('¿Como llegar?')->withAttachment($attachment);
                    $this->bot->typesAndWaits(3);
                    $this->say('Alemania');
                    $this->say($message);
                    $this->say($message1);
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
