<?php
namespace App\Helpers\General;

/**
 * Class handel Error.
 */

class ErrorsHelper 
{
   /**
     * @param string $name
     *
     * @return error class :: has-error
     */
    public function ColoringInput($errors,$name) : string
    {
        return $errors->has($name) ? 'has-error' : '' ;
    }

    /**
     * @param string $name
     *
     * @return error text 
     */
    public function TextInput($errors,$name) : string
    {
        return $errors->first($name);
    }	
}



?>