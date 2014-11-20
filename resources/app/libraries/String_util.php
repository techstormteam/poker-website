<?php

class String_util {

    public static function startsWith($haystack, $needle)
    {
        return $needle === "" || strpos($haystack, $needle) === 0;
    }
    public static function endsWith($haystack, $needle)
    {
        return $needle === "" || substr($haystack, -strlen($needle)) === $needle;
    }
    public static function parsePlayerName($line) {
        $first_pos = strpos($line, ' ', 5);
        $second_pos = strpos($line, '(', 5);
        return substr($line, $first_pos + 1, $second_pos - $first_pos - 2);
    }
}
