<?php
use Symfony\Bridge\Twig\Extension\RoutingExtension;

class Base {
    private $urlGenerator;

    public function __construct() {
        $this->urlGenerator = $GLOBALS['generator'];
    }

    public function twig() {
        $twigLoader = new \Twig\Loader\FilesystemLoader(__DIR__ . TEMPLATE_PATH);

        if(TWIG_CACHE == 1) {
            $twig = new \Twig\Environment($twigLoader, ['cache' => __DIR__ . TWIG_CACHE_PATH, 'debug' => true]);
        } elseif(TWIG_CACHE == 0) {
            $twig = new \Twig\Environment($twigLoader);
        }

        $twig->addExtension(new RoutingExtension($this->urlGenerator)); // add route extension to twig (make available path and url function)

        $twig->addGlobal('_server', $_SERVER); // add global variable to twig
        $twig->addGlobal('_assets_version', ASSETS_VERSION); // add global variable to twig
        $twig->addGlobal('base_path', $GLOBALS['request']->getBasePath()); // add global variable to twig

        return $twig;
    }    
}