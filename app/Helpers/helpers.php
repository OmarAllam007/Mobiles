<?php

use App\Translation;

function t($word, $language = '')
{
    $language = $language ?: \Session::get('personalized-language-ar' , \Config::get('app.locale'));

    if ($word instanceof \Illuminate\Support\Collection) {
        $translate_array = collect();
        foreach ($word as $key => $item) {
            $word_exist = Translation::where('original_word', 'like', $item)
                ->where('to', $language)->first();

            if ($word_exist) {
                if ($word_exist->translated_word != '') {
                    $translate_array->put($key, $word_exist->translated_word);
                }

            } else {
                $translate_array->put($key, $item);
            }
        }
        return $translate_array;
    }

    $word_exist = Translation::where('original_word', 'like', $word)
        ->where('to', $language)->first();

    if ($word_exist) {
        if ($word_exist->translated_word != '') {
            return $word_exist->translated_word;
        }
        return $word_exist->original_word;
    }
    return $word;
}