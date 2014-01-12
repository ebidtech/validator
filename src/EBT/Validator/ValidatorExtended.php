<?php

/*
 * This file is a part of the Validator library.
 *
 * (c) 2013 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace EBT\Validator;

use Symfony\Component\Validator\Constraints\NotBlank as NotBlankConstraint;
use Symfony\Component\Validator\Constraints\Type as TypeConstraint;

/**
 * ValidatorExtended
 */
abstract class ValidatorExtended extends BaseValidator
{
    /**
     * @param mixed $value
     *
     * @return bool
     */
    public static function isStringAndNotBlank($value)
    {
        $violations = static::getValidator()->validateValue(
            $value,
            array(
                new TypeConstraint(array('type' => 'string')),
                new NotBlankConstraint()
            )
        );
        static::setViolations($violations);

        return static::violationsToBool($violations);
    }
}