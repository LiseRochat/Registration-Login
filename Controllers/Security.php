<?php

class Security {
    public static function secureHTML($datas) {
        return htmlentities($datas);
    }
}