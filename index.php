<?php

require_once __DIR__.'/vendor/autoload.php';

$utilisateur = new Application\Utility\User();

echo beautiful(bold('salut ludo'));

$util = new Util();

echo $util->camelize('bonjour ludo');



//use debug SYmfony 2
use Symfony\Component\Debug\Debug;

// Initialize Debugging by SYmfony 2...
Debug::enable();

// Tester un affichage d'erreur
//new Users();

dump($utilisateur);


/**
 * Use Log
 */
// create a log channel
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('name');
$log->pushHandler(new StreamHandler('logs/dev.log'));
// add records to the log
$log->addWarning('Coucou');
$log->addError('3WA Powaaa!!!');


/**
 * Injection des dépendances
 */
use Symfony\Component\DependencyInjection\ContainerBuilder;
$container = new ContainerBuilder();
$container
    //add User Object
    ->register('user', "Application\Utility\User")
    ->addArgument('Julien')
    ->addArgument('Boyer');

$objectuser = $container->get('user');
$objectuser2 = $container->get('user');
$objectuser3 = $container->get('user');

dump($objectuser);
dump($objectuser2);
dump($objectuser3);


/**
 * Templating
 */
use Symfony\Component\Templating\PhpEngine;
use Symfony\Component\Templating\TemplateNameParser;
use Symfony\Component\Templating\Loader\FilesystemLoader;


$loader = new FilesystemLoader(__DIR__.'/views/%name%');

$templating = new PhpEngine(new TemplateNameParser(), $loader);

echo $templating->render('hello.php', array('firstname' => 'Ludo'));



/**
 * Twig
 */
$loader = new Twig_Loader_Filesystem(__DIR__.'/views/');
$twig = new Twig_Environment($loader, array(
    'cache' => __DIR__.'caches/',
    'debug' => true
));

echo $twig->render('index.html.twig', array('firstname' => 'Julien'));

