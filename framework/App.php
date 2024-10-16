<?php

namespace Framework;

use Exception;
use Framework\Databases\DB;
use Framework\Requests\Request;
use Framework\Routing\Route;

class App {
    /**
     * The root path of the application.
     *
     * This property holds the root path of the application.
     *
     * @var string
     */
    public static string $basePath;
    /**
     * The application instance.
     *
     * This property holds the singleton instance of the application.
     *
     * @var App
     */
    public static App $app;

    /**
     * The routing instance.
     *
     * This property holds the instance of the Route class.
     *
     * @var Route
     */
    public Route $route;

    /**
     * The service container instance.
     *
     * This property holds the instance of the Container class.
     *
     * @var Container
     */
    public Container $container;

    /**
     * The request instance.
     *
     * This property holds the instance of the Request class.
     *
     * @var Request
     */
    public Request $request;

    public DB $db;
    public Session $session;

    public function __construct($basePath) {
        self::$basePath  = $basePath;
        self::$app       = $this;
        $this->route     = new Route();
        $this->container = new Container();
        $this->request   = new Request();
        $this->db        = new DB();
        $this->session   = new Session();
    }

    /**
     * Run the application.
     *
     * This method starts the application by executing the necessary
     * initialization and handling the incoming request.
     *
     * @return void
     * @throws Exception
     */
    public function run(): void {
        $this->boot();
        $this->route->resolve();
    }

    /**
     * Boot the application.
     *
     * This method boots the application by registering the helpers,
     * connecting to the database, and registering the service providers.
     *
     * @return void
     */
    public function boot(): void {
        $this->registerHelpers();
        $this->db->connectToDatabase();
        $this->registerServiceProviders();
    }

    /**
     * Register helpers.
     *
     * This method registers the helper functions.
     *
     * @return void
     */
    public function registerHelpers(): void {
//        include_once self::$basePath.'/framework/Helper/Utils.php';
//        include_once self::$basePath.'/framework/Helper/view.php';
    }

    /**
     * Register service providers.
     *
     * This method registers the service providers defined in the
     * configuration file.
     *
     * @return void
     */
    public function registerServiceProviders(): void {
        $config    = include_once self::$basePath.'/config/app.php';
        $providers = $config['providers'];

        foreach ($providers as $provider) {
            new $provider();
        }
    }
}