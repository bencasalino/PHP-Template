<?php

    //App dependencies
    require_once __DIR__."/../vendor/autoload.php";
    // dependency needed for each Class, etc.
    // require_once __DIR__."/../src/Class1.php";
    // require_once __DIR__."/../src/Class2.php";

    // Tells the app to use Silex Application
    $app = new Silex\Application();

    //Tells app how to access sql phpmyadmin database
    // $server = 'mysql:host=localhost;dbname=hair_salon';
    // $username = 'root';
    // $password = 'root';
    // $DB = new PDO($server, $username, $password);

    //Points app to twig templates
    // $app->register(new Silex\Provider\TwigServiceProvider(), array(
    //     'twig.path' => __DIR__.'/../views'
    // ));

    //Still not sure what this does, think it has something to with Symfony being part of the composer package download list. Seems like it Symfony is used to override method paramaters in HTTP?
    // use Symfony\Component\HttpFoundation\Request;
    // Request::enableHttpMethodParameterOverride();

    //Path to homepage
    //C[R]UD, Read, get
    // tells app to render index.html.twig with twig and to getALL from the variable listed in the array. that variable needs to be within the Class
    // $app->get("/", function() use ($app) {
    //     return $app['twig']->render('index.html.twig', array('variable class name?' => Class::getAll()));
    // });

 $app->get("/", function(){
return "hello world";


});

return $app;
?>
