<?php

namespace website\application;

use website\application\presentation\views\Error404View;
use website\application\presentation\views\ErrorView;
use website\application\usecases\UCShowLandingPage;
use website\application\usecases\UCSendMessage;
use website\application\usecases\UCShowImpressum;
use Slim\Slim;
use website\application\usecases\UCLoadAllGalleries;
use website\application\usecases\UCShowProjekt;

class ApplicationFrontController
{
    private $classArray = array();

    /**
     * constructor
     */
    public function __construct()
    {
        $app = new Slim ();

        /**
         * ERROR HANDLING
         */

        $app->error(function (\Exception $e) use ($app) {
            $view = new ErrorView();
            $view->render();

            $to = 'akuehne9878@gmail.com';
            $subject = 'Error on raumklang-band.at';
            $headers = 'From: ' . 'do-not-reply@raumklang-band.at' . "\r\n" . 'X-Mailer: PHP/' . phpversion();

            mail($to, $subject, $e->getMessage() . "\n\n" . $e->getTraceAsString(), $headers);
        });


        $app->notFound(function () use ($app) {
            $view = new Error404View();
            $view->render();
        });


        /**
         * ROUTE DEFINITIONS
         */

        $app->get('/', function () use ($app) {
            try {
                $useCase = new UCShowLandingPage ();
                $useCase->renderView();
            } catch (\Exception $e) {
                $app->error($e);
            }
        });

        $app->post("/mail", function () use ($app) {
            try {
                $name = $app->request()->params('name');
                $email = $app->request()->params('email');
                $message = $app->request()->params('message');

                $useCase = new UCSendMessage ();
                $useCase->execute($name, $email, $message);
            } catch (\Exception $e) {
                $app->error($e);
            }
        });

        $app->get("/impressum", function () use ($app) {
            try {
                $useCase = new UCShowImpressum ();
                $useCase->renderView();
            } catch (\Exception $e) {
                $app->error($e);
            }
        });

        $app->get("/projekt", function () use ($app) {
            try {
                $useCase = new UCShowProjekt();
                $useCase->renderView();
            } catch (\Exception $e) {
                $app->error($e);
            }
        });

        $app->post("/morePhotos", function () use ($app) {
            try {
                $useCase = new UCLoadAllGalleries();
                $useCase->loadAllGalleries();
            } catch (\Exception $e) {
                $app->error($e);
            }
        });

        /**
         * RUN :-)
         */

        $app->run();
    }

}
