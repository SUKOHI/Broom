Broom
====

A PHP package mainly developed for Laravel to manage option values using Trait.  
(This is for Laravel 5+. [For Laravel 4.2](https://github.com/SUKOHI/Broom/tree/1.0))

**[Demo](http://demo-laravel52.capilano-fw.com/broom)**

Installation
====

Add this package name in composer.json

    "require": {
      "sukohi/broom": "2.*"
    }

Execute composer command.

    composer update

Usage
====

**Simple Way**  

In your model, set BroomTrait and add a method named "options" which return values you want.

    <?php namespace App;
    
    use Sukohi\Broom\BroomTrait;
    
    class Color {
    
        use BroomTrait;

        public static function options() {
    
            return [
                '1' => 'Red',
                '2' => 'Blue',
                '3' => 'Green'
            ];
    
        }

Now you also can call the methods named optionValue(), optionValues(), optionKey(), optionKeys(), optionRandom(), optionKeyRandom(), optionHasKey() and optionHasValue().

e.g)

Options

    $colors = \App\Color::options();
    print_r($colors);

    /* Output
    
        Array
        (
            [1] => Red
            [2] => Blue
            [3] => Green
        )
    
    */

Value

    echo \App\Color::optionValue(2);   // Blue

or You can set default value.

    echo \App\Color::optionValue(5, 'Default');   // Default

Key

    echo \App\Color::optionKey('Green');      // 3

Values
    
    $values = \App\Color::optionValues();
    print_r($values);
    
    /* Output
    
        Array
        (
            [0] => Red
            [1] => Blue
            [2] => Green
        )
    
    */
    
    You also can filter the values by setting ids.
    
    $values = \App\Color::optionValues([2, 3]);
    print_r($values);

    /* Output
    
        Array
        (
            [0] => Blue
            [1] => Green
        )
    
    */

Keys

    $keys = \App\Color::optionKeys();
    print_r($keys);
    
    /* Output
    
        Array
        (
            [0] => 1
            [1] => 2
            [2] => 3
        )
    
    */

Random

    echo \App\Color::optionRandom();     // Blue
    
    $options = \App\Color::optionRandom(2);  // If you set a numeric argument, you can get array values.
    print_r($options);
    
    /* Output
    
        Array
        (
            [0] => Blue
            [1] => Green
        )
    
    */

Key Random

    echo \App\Color::optionKeyRandom();  // 2
    
    $options = \App\Color::optionKeyRandom(2);
    print_r($options);
    
    /* Output
    
    Array
    (
        [0] => 1
        [1] => 3
    )
    
    */

Has Key  

    $key = 3;
    
    if(\App\Color::optionHasKey($key)) {
    
        echo 'Has key!';
    
    }

Has Value  

    $value = 'Red';
    
    if(\App\Color::optionHasValue($value)) {
    
        echo 'Has value!';
    
    }


**Customized Method Name**  

You also can use customized method name like "redOptions".;

    use Sukohi\Broom\BroomTrait;
    
    class Color {
    
        use BroomTrait;

        public static function redOptions() {
    
            return [
                '1' => 'cherry',
                '2' => 'rose',
                '3' => 'crimson'
            ];
    
        }

Now you can call redOptionValue(), redOptionValues(), redOptionKey(), redOptionKeys(), redOptionRandom() and redOptionKeyRandom().

License
====
This package is licensed under the MIT License.

Copyright 2015 Sukohi Kuhoh