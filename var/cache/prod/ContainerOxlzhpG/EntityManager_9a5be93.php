<?php

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder4a879 = null;
    private $initializer88a4a = null;
    private static $publicProperties1d473 = [
        
    ];
    public function getConnection()
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'getConnection', array(), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->getConnection();
    }
    public function getMetadataFactory()
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'getMetadataFactory', array(), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->getMetadataFactory();
    }
    public function getExpressionBuilder()
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'getExpressionBuilder', array(), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->getExpressionBuilder();
    }
    public function beginTransaction()
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'beginTransaction', array(), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->beginTransaction();
    }
    public function getCache()
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'getCache', array(), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->getCache();
    }
    public function transactional($func)
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'transactional', array('func' => $func), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->transactional($func);
    }
    public function wrapInTransaction(callable $func)
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'wrapInTransaction', array('func' => $func), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->wrapInTransaction($func);
    }
    public function commit()
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'commit', array(), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->commit();
    }
    public function rollback()
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'rollback', array(), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->rollback();
    }
    public function getClassMetadata($className)
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'getClassMetadata', array('className' => $className), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->getClassMetadata($className);
    }
    public function createQuery($dql = '')
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'createQuery', array('dql' => $dql), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->createQuery($dql);
    }
    public function createNamedQuery($name)
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'createNamedQuery', array('name' => $name), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->createNamedQuery($name);
    }
    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->createNativeQuery($sql, $rsm);
    }
    public function createNamedNativeQuery($name)
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->createNamedNativeQuery($name);
    }
    public function createQueryBuilder()
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'createQueryBuilder', array(), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->createQueryBuilder();
    }
    public function flush($entity = null)
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'flush', array('entity' => $entity), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->flush($entity);
    }
    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->find($className, $id, $lockMode, $lockVersion);
    }
    public function getReference($entityName, $id)
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->getReference($entityName, $id);
    }
    public function getPartialReference($entityName, $identifier)
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->getPartialReference($entityName, $identifier);
    }
    public function clear($entityName = null)
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'clear', array('entityName' => $entityName), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->clear($entityName);
    }
    public function close()
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'close', array(), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->close();
    }
    public function persist($entity)
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'persist', array('entity' => $entity), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->persist($entity);
    }
    public function remove($entity)
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'remove', array('entity' => $entity), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->remove($entity);
    }
    public function refresh($entity)
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'refresh', array('entity' => $entity), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->refresh($entity);
    }
    public function detach($entity)
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'detach', array('entity' => $entity), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->detach($entity);
    }
    public function merge($entity)
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'merge', array('entity' => $entity), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->merge($entity);
    }
    public function copy($entity, $deep = false)
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->copy($entity, $deep);
    }
    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->lock($entity, $lockMode, $lockVersion);
    }
    public function getRepository($entityName)
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'getRepository', array('entityName' => $entityName), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->getRepository($entityName);
    }
    public function contains($entity)
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'contains', array('entity' => $entity), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->contains($entity);
    }
    public function getEventManager()
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'getEventManager', array(), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->getEventManager();
    }
    public function getConfiguration()
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'getConfiguration', array(), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->getConfiguration();
    }
    public function isOpen()
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'isOpen', array(), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->isOpen();
    }
    public function getUnitOfWork()
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'getUnitOfWork', array(), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->getUnitOfWork();
    }
    public function getHydrator($hydrationMode)
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->getHydrator($hydrationMode);
    }
    public function newHydrator($hydrationMode)
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->newHydrator($hydrationMode);
    }
    public function getProxyFactory()
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'getProxyFactory', array(), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->getProxyFactory();
    }
    public function initializeObject($obj)
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'initializeObject', array('obj' => $obj), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->initializeObject($obj);
    }
    public function getFilters()
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'getFilters', array(), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->getFilters();
    }
    public function isFiltersStateClean()
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'isFiltersStateClean', array(), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->isFiltersStateClean();
    }
    public function hasFilters()
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'hasFilters', array(), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return $this->valueHolder4a879->hasFilters();
    }
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;
        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);
        $instance->initializer88a4a = $initializer;
        return $instance;
    }
    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;
        if (! $this->valueHolder4a879) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder4a879 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
        }
        $this->valueHolder4a879->__construct($conn, $config, $eventManager);
    }
    public function & __get($name)
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, '__get', ['name' => $name], $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        if (isset(self::$publicProperties1d473[$name])) {
            return $this->valueHolder4a879->$name;
        }
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder4a879;
            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }
        $targetObject = $this->valueHolder4a879;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __set($name, $value)
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder4a879;
            $targetObject->$name = $value;
            return $targetObject->$name;
        }
        $targetObject = $this->valueHolder4a879;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __isset($name)
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, '__isset', array('name' => $name), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder4a879;
            return isset($targetObject->$name);
        }
        $targetObject = $this->valueHolder4a879;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();
        return $returnValue;
    }
    public function __unset($name)
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, '__unset', array('name' => $name), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder4a879;
            unset($targetObject->$name);
            return;
        }
        $targetObject = $this->valueHolder4a879;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);
            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }
    public function __clone()
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, '__clone', array(), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        $this->valueHolder4a879 = clone $this->valueHolder4a879;
    }
    public function __sleep()
    {
        $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, '__sleep', array(), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
        return array('valueHolder4a879');
    }
    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }
    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializer88a4a = $initializer;
    }
    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializer88a4a;
    }
    public function initializeProxy() : bool
    {
        return $this->initializer88a4a && ($this->initializer88a4a->__invoke($valueHolder4a879, $this, 'initializeProxy', array(), $this->initializer88a4a) || 1) && $this->valueHolder4a879 = $valueHolder4a879;
    }
    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder4a879;
    }
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder4a879;
    }
}
