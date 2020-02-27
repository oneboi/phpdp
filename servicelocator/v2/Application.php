<?php 
namespace v2;
use v2\core\ServiceLocator;
use v2\db\DatabaseService;
use v2\log\LogService;
class Appliaction{
    

    /**
     * @var LogService
     */
    private $logService;

    /**
     * @var DatabaseService
     */
    private $databaseService;

    /**
     * @var ServiceLocator
     */
    private $serviceLocator;



	public function __construct(){
     
        $this->serviceLocator  = new ServiceLocator();
        $this->logService      = new LogService();
        $this->databaseService = new DatabaseService();
	}

	//注册服务
	public function __init(){
   
        $this->serviceLocator->add(
            'v2\log\LogServiceInterface',
             'v2\log\LogServiceInterface\logService'
        );

        $this->serviceLocator->add(
            'v2\db\DatabaseServiceInterface',
            'v2\db\databaseService'
        );

        $this->serviceLocator->has('v2\log\LogServiceInterface'));
        $this->serviceLocator->has('v2\db\DatabaseServiceInterface'));
        $this->serviceLocator->has('v2\test\FakeServiceInterface'));

	}
	
	public function bootstrap(){

	}
}





 ?>