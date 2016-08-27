<?php
namespace app\admin\logic;
//逻辑抽象方法
abstract class AbstractLogic
{

    protected static $instance; //对象实例

    /**
     * 架构函数
     * @param [type] $options 参数
     */
    public function __construct($options = [])
    {
        foreach ($options as $name => $item) {
            if (property_exists($this, $name)) $this->$name = $item;
        }
    }

    /**
     * 单例模式实例化
     * @param  [type] $options 参数
     * @return [type]          [description]
     */
    public static function instance($options = [])
    {
        if (is_null(self::$instance)) self::$instance = new static($options);
        return self::$instance;
    }
}