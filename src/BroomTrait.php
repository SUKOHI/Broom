<?php namespace Sukohi\Broom;

trait BroomTrait {

    public static function options() {

        if(property_exists(__CLASS__, 'option')) {

            $self = new self;

            if(!is_array($self->option)) {

                $key_column = 'id';
                $value_column = $self->option;

            } else {

                $key_column = key($self->option);
                $value_column = current($self->option);

            }

            return $self->pluck($value_column, $key_column);

        }

    }

    public static function __callStatic($name, $arguments) {

		$pattern = '!^([a-zA-z]*)(Option|option|Options|options)((Key|Value|Random|KeyRandom|HasKey|HasValue|WithTitle|Is|List)s?)?$!';

        if(preg_match($pattern, $name, $matches)) {

            $target = $matches[1];
            $method_type = $matches[3];
            $method = camel_case($target .'_options');

            if(method_exists(__CLASS__, $method)) {

                $options = call_user_func('self::'. $method);

                if(!is_array($options)) {

                    $options = $options->toArray();

                }

                if($method_type == 'Value') {

					$default = isset($arguments[1]) ? $arguments[1] : '';
					return array_get($options, $arguments[0], $default);

                } else if($method_type == 'Key') {

                    return array_search($arguments[0], $options);

                } else if($method_type == 'Keys') {

                    return array_keys($options);

                } else if($method_type == 'Values') {

                    $option_ids = (!empty($arguments[0])) ? $arguments[0] : [];

                    if(!empty($option_ids)) {

                        foreach ($options as $option_id => $option) {

                            if(in_array($option_id, $option_ids)) {

                                $option_values[] = $option;

                            }

                        }

                    } else {

                        $option_values = array_values($options);

                    }

                    return $option_values;

                } else if($method_type == 'Random') {

                    $request_number = (!empty($arguments[0])) ? intval($arguments[0]) : 1;
                    $random_keys = array_rand($options, $request_number);

                    if(is_array($random_keys)) {

                        $random_values = [];

                        foreach ($random_keys as $random_key) {

                            $random_values[] = $options[$random_key];

                        }

                        return $random_values;

                    }

                    return $options[$random_keys];

                } else if($method_type == 'KeyRandom') {

                    $request_number = (!empty($arguments[0])) ? intval($arguments[0]) : 1;
                    return array_rand($options, $request_number);

                } else if($method_type == 'HasKey') {

					return isset($options[$arguments[0]]);

				} else if($method_type == 'HasValue') {

					return in_array($arguments[0], $options);

				} else if($method_type == 'WithTitle') {

					$value = $arguments[0];
					$key = isset($arguments[1]) ? $arguments[1] : '';
					return [$key => $value] + $options;

				} else if($method_type == 'Is') {

				    $value = $arguments[0];

                    if(!in_array($value, $options)) {

                        return false;

                    }

                    $key = array_search($value, $options);
                    return ($key == $arguments[1]);

                } else if($method_type == 'List') {

				    $id_key = (!empty($arguments[0])) ? $arguments[0] : 'id';
                    $value_key = (!empty($arguments[1])) ? $arguments[1] : 'text';
				    $list = [];
				    $options = self::options();

                    foreach ($options as $id => $value) {

                        $list[] = [
                            $id_key => $id,
                            $value_key => $value
                        ];

				    }

				    return $list;

                }

            }

            throw new \BadMethodCallException('Method ['. $method .'] does not exist.');

        } else {

            return is_callable(['parent', '__callStatic']) ? parent::__callStatic($name, $arguments) : null;

        }

    }

}