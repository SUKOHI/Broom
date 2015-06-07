<?php namespace Sukohi\Broom;

trait BroomTrait {

    public static function __callStatic($name, $arguments) {

        $pattern = '!^([a-zA-z]*)(Option|option)((Key|Value|Random)s?)$!';

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

                } else if($method_type == 'Random') {

                    $request_number = (!empty($arguments[0])) ? intval($arguments[0]) : 1;
                    $random_keys = array_rand($options, $request_number);

                    if(is_array($random_keys)) {

                        $random_values = [];

                        foreach ($random_keys as $random_key) {

                            $random_values[] = $options[$random_key];

                        }

                        return $random_values;

                    } else {

                        return $options[$random_keys];

                    }

                }

            }

            throw new \BadMethodCallException('Method ['. $method .'] does not exist.');

        }

    }

}