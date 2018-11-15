<?php

namespace johnnymast\Morsecode;

class Morsecode
{
    /**
     * The translation table latin simbols we use to encode or
     * decode messages.
     *
     * @var array
     */
    private $translation = [
        '0' => '-----',
        '1' => '.----',
        '2' => '..---',
        '3' => '...--',
        '4' => '....-',
        '5' => '.....',
        '6' => '-....',
        '7' => '--...',
        '8' => '---..',
        '9' => '----.',
        'a' => '.-',
        'b' => '-...',
        'c' => '-.-.',
        'd' => '-..',
        'e' => '.',
        'f' => '..-.',
        'g' => '--.',
        'h' => '....',
        'i' => '..',
        'j' => '.---',
        'k' => '-.-',
        'l' => '.-..',
        'm' => '--',
        'n' => '-.',
        'o' => '---',
        'p' => '.--.',
        'q' => '--.-',
        'r' => '.-.',
        's' => '...',
        't' => '-',
        'u' => '..-',
        'v' => '...-',
        'w' => '.--',
        'x' => '-..-',
        'y' => '-.--',
        'z' => '--..',
        '.' => '.-.-.-',
        ',' => '--..--',
        '?' => '..--..',
        '!' => '-.-.--',
        '-' => '-....-',
        '/' => '-..-.',
        '@' => '.--.-.',
        '(' => '-.--.',
        ')' => '-.--.-',
        ' ' => '/',
    ];
    
    /**
     * The translation table cyrillic simbols we use to encode or
     * decode messages.
     *
     * @var array
     */
    private $translation_cyr = [
        '0' => '-----',
        '1' => '.----',
        '2' => '..---',
        '3' => '...--',
        '4' => '....-',
        '5' => '.....',
        '6' => '-....',
        '7' => '--...',
        '8' => '---..',
        '9' => '----.',
        'a' => '.-',	// a
        'б' => '-...	// b
        'в' => '.--',	// w
        'г' => '--.',	// g
        'д' => '-..',	// d
        'е' => '.', // e
        'ж' => '...-',	// v
        'з' => '--..',	// z
        'и' => '..',	// i
        'й' => '.---',	// j
        'к' => '-.-',	// k
        'л' => '.-..',	// l
        'м' => '--',	// m
        'h' => '-.',	// n
        'о' => '---',	// o
        'п' => '.--.',	// p
        'p' => '.-.',	// r
        'с' => '...',	// s
        'т' => '-',	// t
        'у' => '..-',	// u
        'ф' => '..-.',	// f
        'х' => '....',	// h
        'ц' => '-.-.',	// c
        'ч' => '---.',	ö
        'ш' => '----',	ch
        'щ' => '--.-',	// q
        'ъ' => '--.--',	ñ
        'ы' => '-.--',	// y
        'ь' => '-..-',	// x
        'э' => '..-..', (ѣ)	é
        'ю' => '..--',	ü
        'я' => '.-.-',	ä
        '.' => '......',
        ',' => '.-.-.-',
        '?' => '..--..',
        '!' => '--..--', // ,
        '-' => '-....-',
        '/' => '-..-.',
        '@' => '.--.-.',
        '(' => '-.--.-',
        ')' => '-.--.-',
        ':' => '---...',
        ';' => '-.-.-',
        '\'' => '.----.',
        '"' => '.-..-.',
        ' ' => '/',
    ];

    /**
     * The value the class constructed with.
     *
     * @var string
     */
    private $value = '';

    /**
     * Morsecode constructor.
     *
     * @param string $value
     */
    public function __construct(string $value = '')
    {
        $this->value = $value;
    }

    /**
     * Encode a given string into morsecode.
     *
     * @param string $str
     * @return string
     */
    public function encode(string $str = '', string $result = ''): string
    {
        if (empty($str) === true) {
            return $this->encode($this->value);
        }

        foreach (str_split($str) as $char) {
            if (isset($this->translation[$char])) {
                $result .= " ".$this->translation[$char];
            }
        }

        return trim($result);
    }

    /**
     * Decode a given morsecode string into something
     * readable for humans.
     *
     * @param string $str
     * @return string
     */
    public function decode(string $str = '', string $result = ''): string
    {
        if (empty($str) === true) {
            return $this->decode($this->value);
        }

        $characters = array_flip($this->translation);
        foreach (explode(' ', $str) as $character) {
            if (isset($characters[$character])) {
                $result .= $characters[$character];
            }
        }

        return $result;
    }
}
