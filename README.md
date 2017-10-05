Broom
====

A PHP package mainly developed for Laravel to manage option values using Trait.  
(This packages is maintained under L54)

**[Demo](http://demo-laravel52.capilano-fw.com/broom)**

Installation
====

Execute composer command.

    composer require sukohi/broom:3.*

Preparation
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

Or you can simply prepare by setting `$option` property like so if your model extends `Illuminate\Database\Eloquent\Model`.  

    <?php namespace App;
    
    use Illuminate\Database\Eloquent\Model;
    use Sukohi\Broom\BroomTrait;
    
    class Color extends Model {
    
        use BroomTrait;

        protected $option = ['id' => 'name']; // or 'name';

Now you also can call the next methods. 

* optionValue()
* optionValues()
* optionKey()
* optionKeys()
* optionRandom()
* optionKeyRandom()
* optionHasKey()
* optionHasValue()
* optionsWithTitle()

Usage
====

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
**Note:** You will get `Collection` when you set `$option`.

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

With Default Title

    $options = \App\Color::optionsWithTitle('Pick one');
        
    /* Output
    
    Array
    (
        [] => Pick one
        [1] => Red
        [2] => Blue
        [3] => Green
    )
    
    */


    $options = \App\Color::optionsWithTitle('Pick one', '-99');
        
    /* Output
    
    Array
    (
        [-99] => Pick one
        [1] => Red
        [2] => Blue
        [3] => Green
    )
    
    */

optionIs

    $key = '1';

    if(\App\Item::optionIs('Item - 1', $key)) {

        echo 'True!';

    }

optionsList

    $list = \App\Item::optionsList();   // Default: $id_key => 'id', $value_key => 'text'
    
    // or 
    
    $id_key = 'id';
    $value_key = 'text';
    $list = \App\Item::optionsList($id_key, $value_key);
    
    /*
    
    Array
    (
        [0] => Array
            (
                [id] => 1
                [text] => Red
            )
    
        [1] => Array
            (
                [id] => 2
                [text] => Blue
            )
    
        [2] => Array
            (
                [id] => 3
                [text] => Green
            )
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

Now you can call redOptionValue(), redOptionValues(), redOptionKey(), redOptionKeys(), redOptionRandom(), redOptionKeyRandom(), redOptionHasKey(), redOptionHasValue() and redOptionsWithTitle().

License
====
This package is licensed under the MIT License.

Copyright 2015 Sukohi Kuhoh