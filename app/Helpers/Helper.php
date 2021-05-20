<?php

use App\Models\generalSettings;

function settings(){
    $settings = generalSettings::first();
    return $settings;
}