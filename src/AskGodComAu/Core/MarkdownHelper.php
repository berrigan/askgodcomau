<?php namespace AskGodComAu\Core;


class MarkdownHelper {

    public static function GetMarkdownHtmlFromString($markdownString) {
        $parsedown = new \Parsedown();
        return $parsedown->text($markdownString);
    }

    public static function GetMarkdownHtml($mdFile) {
        $mdFullFilename = ROOTDIR . '/copy/' . $mdFile;
        $md = file_get_contents($mdFullFilename);
        $parsedown = new \Parsedown();
        return $parsedown->text($md);
    }

} 