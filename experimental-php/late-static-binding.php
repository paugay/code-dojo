<?php

class A {
    public static function who() {
        echo __CLASS__;
    }
    public static function test() {
        self::who(); // Normal class resolution
        static::who(); // LSB
    }
}

class B extends A {
    public static function who() {
        echo __CLASS__;
    }
}

B::test();

?>
