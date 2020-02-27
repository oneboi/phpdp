<?php 
namespace  v2\core;

interface ServiceLocatorInterface
{
    /**
     * Checks if a service is registered.
     * 检查服务是否已注册。
     *
     * @param string $interface
     *
     * @return bool
     */
    public function has($interface);

    /**
     * Gets the service registered for the interface.
     *  获取为接口注册的服务。
     *
     * @param string $interface
     *
     * @return mixed
     */
    public function get($interface);
}



 ?>