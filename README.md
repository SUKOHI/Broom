Broom
====

A PHP package mainly developed for Laravel to manage option values.  
(This is for Laravel 4.2. [For Laravel 5+](https://github.com/SUKOHI/Broom))

Installation
====

Add this package name in composer.json

    "require": {
      "sukohi/broom": "1.*"
    }

Execute composer command.

    composer update
    
Usage
====

**Simple Way**  

In your model, set BroomTrait and add a method named "options" which return values you want.

    <?php 
    
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

    $colors = Color::options();
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

    echo Color::optionValue(2);   // Blue

or You can set default value.

    echo Color::optionValue(5, 'Default');   // Default

Key

    echo Color::optionKey('Green');      // 3
    

Values
    
    $values = Color::optionValues();
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
    
    $values = Color::optionValues([2, 3]);
    print_r($values);

    /* Output
    
        Array
        (
            [0] => Blue
            [1] => Green
        )
    
    */

Keys

    $keys = Color::optionKeys();
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

    echo Color::optionRandom();     // Blue
    
    $options = Color::optionRandom(2);  // If you set a numeric argument, you can get array values.
    print_r($options);
    
    /* Output
    
        Array
        (
            [0] => Blue
            [1] => Green
        )
    
    */

Key Random

    echo Color::optionKeyRandom();  // 2
    
    $options = Color::optionKeyRandom(2);
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

    if(Color::optionHasKey($key)) {

        echo 'Has key!';

    }
    
Has Value  
    
    $value = 'Red';

    if(Color::optionHasValue($value)) {

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

Now you can call redOptionValue(), redOptionValues(), redOptionKey(), redOptionKeys(), redOptionRandom(), redOptionKeyRandom(), redOptionHasKey() and redOptionHasValue().

License
====
This package is licensed under the MIT License.

Copyright 2015 Sukohi Kuhoh