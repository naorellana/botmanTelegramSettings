<?php

namespace App\Http\Controllers;

//imagenes y videos
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Attachments\Video;
use BotMan\BotMan\Messages\Attachments\Location;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
//***

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use App\Conversations\ExampleConversation;
use App\Conversations\PaisesCobertura;
use App\Conversations\ DistribuidorInfo;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('info', function (BotMan $bot) {
            $bot->reply('2019, Copyright © Todos los Derechos Reservados  
                Development Team:
                Nery Orellana
                Alaric Rodolfo 
                JDanny Díaz

                San José Pinula, Ingeniería en sistemas');
        });


        //imagenes
        $botman->hears('imagen', function (BotMan $bot) {
            // Create attachment
            $attachment = new Image('https://drive.google.com/file/d/1X9tCyKarjMJwXx9__7sqTUXzJPQd9lFC/view?usp=sharing');

            // Build message object
            $message = OutgoingMessage::create('Nuestras Instalaciones')
                        ->withAttachment($attachment);

            // Reply message object
            $bot->reply($message);
        });

        //timer
        $botman->hears('tiempo', function (BotMan $bot) {
            $bot->typesAndWaits(2);
            $bot->reply("Tell me more!");
        });

        //video
        $botman->hears('video', function (BotMan $bot) {
            
        // Create attachment  //14.554448, -90.403477
            $attachment = new Video('http://www.reactiongifs.com/r/hh.gif', [
                'custom_payload' => true,
            ]);

            // Build message object
            $message = OutgoingMessage::create('This is my text')
                        ->withAttachment($attachment);

            // Reply message object
            $bot->reply($message);
        });

        //ubicacion
        $botman->hears('sede', function (BotMan $bot) {
            
            // Create attachment  //14.554448, -90.403477
                // Create attachment
            $attachment = new Location(14.554448, -90.403477, [
                'custom_payload' => true,
            ]);
            // Create attachment
            $attachment1 = new Image('https://drive.google.com/file/d/1X9tCyKarjMJwXx9__7sqTUXzJPQd9lFC/view?usp=sharing');

            // Build message object
            $message1 = OutgoingMessage::create('San José Pinula, Universidad Mariano Gálvez 
            Ingeniería en sistemas ')->withAttachment($attachment1);


            // Build message object
            $message = OutgoingMessage::create('¿Como llegar?')->withAttachment($attachment);

            // Reply message object
            $bot->reply('Ingeniería en sistemas - Curso de Inteligencia Artificial');
            $bot->reply($message1);
            $bot->reply($message);

        });



        //rescribiendo , segundos       
         $botman->hears('pregunta', function (BotMan $bot) {
            $bot->typesAndWaits(10);
            $bot->reply("Tell me more!");
        });
        


        
        $botman->fallback(function($bot) {
            $bot->types();
            $bot->reply('Lo Siento, aún no puedo responder tu consulta. Por favor intenta con... "/sedes1" "/distribuidor2"  "Sede" "Info"');
        });



        $botman->listen();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tinker()
    {
        return view('tinker');
    }

    /**
     * Loaded through routes/botman.php
     * @param  BotMan $bot
     */
    //conversacion
    public function startConversation(BotMan $bot)
    {
        $bot->startConversation(new ExampleConversation());
    }
    
    public function startPagos(BotMan $bot)
    {
        $bot->typesAndWaits(2);
        $bot->startConversation(new PaisesCobertura());
    }
    public function startDistribuidor(BotMan $bot)
    {
        $bot->typesAndWaits(3);
        $bot->startConversation(new DistribuidorInfo());
    }
    //DistribuidorInfo
}
