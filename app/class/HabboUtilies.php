<?php
class Habbo {
    function GenerateText($length = 150) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $GenerateText = '';
        for ($i = 0; $i < $length; $i++) {
            $GenerateText .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $GenerateText;
    }

    public function INTorHTML($text) {
        return htmlspecialchars($text);
    }
}
$habbo = new Habbo();
?>