<?php

namespace Faker\Provider\vi_VN;

class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    protected static $areaCodes = array(
        296, 254, 209, 204, 291, 222, 275, 256, 274, 
        271, 252, 290, 292, 206, 236, 262, 261, 215, 
        251, 277, 269, 219, 226, 24, 239, 220, 225, 
        293, 28, 218, 221, 258, 297, 260, 213, 263, 
        205, 214, 272, 228, 238, 229, 259, 210, 257, 
        232, 235, 255, 203, 233, 299, 212, 276, 227, 
        208, 237, 234, 273, 294, 207, 270, 211, 216,
        // Mobile
        96, 97, 98, 32, 33, 34, 35, 36, 37, 38, 39, // Viettel
        91, 94, 83, 84, 85, 81, 82, // Vinaphone
        90, 93, 70, 79, 77, 76, 78, // Mobifone
        92, 56, 58, // Vietnamobile
        99, 59, // Gmobile
        95, // Sfone
    );

    protected static $formats = array(
        '7' => array(
            '0[a] ### ####',
            '(0[a]) ### ####',
            '0[a]-###-####',
            '(0[a])###-####',
            '84-[a]-###-####',
            '(84)([a])###-####',
            '+84-[a]-###-####',
        ),
        '8' => array(
            '0[a] #### ####',
            '(0[a]) #### ####',
            '0[a]-####-####',
            '(0[a])####-####',
            '84-[a]-####-####',
            '(84)([a])####-####',
            '+84-[a]-####-####',
        ),
    );

    public function phoneNumber()
    {
        $areaCode = static::randomElement(static::$areaCodes);
        $areaCodeLength = strlen($areaCode);
        $digits = 7;

        if ($areaCode === 24 || $areaCode === 28 ) {
            $digits = 8;
        }

        return static::numerify(str_replace('[a]', $areaCode, static::randomElement(static::$formats[$digits])));
    }
}
