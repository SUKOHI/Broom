Broom
====

A PHP package mainly developed for Laravel to manage option values.

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

Now you also can call the methods named optionValue(), optionValues(), optionKey(), optionKeys() and optionRandom().

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

Now you can call redOptionValue(), redOptionValues(), redOptionKey(), redOptionKeys() and redOptionRandom().

License
====
This package is licensed under the MIT License.

Copyright 2015 Sukohi Kuhoh