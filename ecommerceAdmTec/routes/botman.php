<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});


$botman->hears('Start conversation', BotManController::class.'@startConversation');
$botman->hears('/sedes1', BotManController::class.'@startPagos');
$botman->hears('/distribuidor2', BotManController::class.'@startDistribuidor');
