<?php 

namespace v2\core;
class ServiceLocator implements ServiceLocatorInterface
{
     /**

     * 服务定义索引

     */
    private $services; 

    /**
     * 服务实例索引

     */
    private $instantiated;

    /**

     * 是否全局服务共享（单例模式）

     */
    private $shared;


    public function __construct()
    {
        $this->services     = array();
        $this->instantiated = array();
        $this->shared       = array();
    }

    /**
     * Registers a service with specific interface.
     * 使用特定接口注册服务 。使用接口注册服务
     * 
     * @param string $interface
     * @param string|object $service
     * @param bool $share
     */
    public function add($interface, $service, $share = true)
    {
        /**
         * When you add a service, you should register it
         * with its interface or with a string that you can use
         * in the future even if you will change the service implementation.
         * *添加服务时，应将其注册到其接口或将来可以使用的字符串中，即使您将更改服务实现也是如此。
         */

        if (is_object($service) && $share) {
        	// 接口名称和对象数组
            $this->instantiated[$interface] = $service;
        }
        //接口名称和对象的类的数组
        $this->services[$interface] = (is_object($service) ? get_class($service) : $service);
        //接口名称和是否全局共享的数组
        $this->shared[$interface]   = $share;
    }


    /**
     * Checks if a service is registered.
     * 检查服务是否已注册。
     *
     * @param string $interface
     *
     * @return bool
     */
    public function has($interface)
    {
        return (isset($this->services[$interface]) || isset($this->instantiated[$interface]));
    }


    /**
     * Gets the service registered for the interface.
     * 获取为接口注册的服务。
     *
     * @param string $interface
     *
     * @return mixed
     */
    public function get($interface)
    {
        // Retrieves the instance if it exists and it is shared
        if (isset($this->instantiated[$interface]) && $this->shared[$interface]) {
            return $this->instantiated[$interface];
            //检索实例（如果该实例存在且已共享）直接返回 
        }

        // otherwise gets the service registered.
        // 否则将注册服务。
        $service = $this->services[$interface];

        // You should check if the service class exists and
        // the class is instantiable.
        // 您应该检查服务类是否存在，并且该类是可实例化的

        // This example is a simple implementation, but
        // when you create a service, you can decide
        // if $service is a factory or a class.
        // By registering a factory you can create your services
        // using the DependencyInjection pattern.

        // ...
        // 这个例子是一个简单的实现，但是 创建服务时，可以决定 如果$service是工厂类还是基本类。 通过注册工厂，您可以创建您的服务 使用依赖注入模式

        // Creates the service object
        $object = new $service();

        // and saves it if the service must be shared.
        if ($this->shared[$interface]) {
            $this->instantiated[$interface] = $object;
        }
        return $object;
    }



















 ?>