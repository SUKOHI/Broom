<?php namespace Sukohi\Broom;

trait BroomTrait {

    public static function __callStatic($name, $arguments) {

        $pattern = '!^([a-zA-z]*)(Option|option)((Key|Value)s?)$!';

        if(preg_match($pattern, $name, $matches)) {

            $target = $matches[1];
            $method_type = $matches[3];
            $method = camel_case($target .'_options');

            if(method_exists(get_class(), $method)) {

                $options = call_user_func('self::'. $method);

                if($method_type == 'Value') {

                    return array_get($options, $arguments[0], '');

                } else if($method_type == 'Key') {

                    return array_search($arguments[0], $options);

                } else if($method_type == 'Keys') {

                    return array_keys($options);

                } else if($method_type == 'Values') {

                    return array_values($options);

                }

            } else {

                throw new \BadMethodCallException('Method ['. $method .'] does not exist.');

            }

        }

    }

}