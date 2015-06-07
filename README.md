Broom
====

A PHP package mainly developed for Laravel to manage option values.

Installation&settings for Laravel
====

After installation using composer, add the followings to the array in  app/config/app.php

    'providers' => array(  
        ...Others...,  
        'Sukohi\Broom\BroomServiceProvider',
    )

Also

    'aliases' => array(  
        ...Others...,  
        'Broom' => 'Sukohi\Broom\Facades\Broom',
    )

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

Now you also can call the methods named optionValue(), optionValues(), optionKey() and optionKeys().

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

Now you can call redOptionValue(), redOptionValues(), redOptionKey(), redOptionKeys()

License
====
This package is licensed under the MIT License.

Copyright 2015 Sukohi Kuhoh