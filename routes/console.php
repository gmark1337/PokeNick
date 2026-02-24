<?php

use App\Jobs\GeneratePokemonNickname;
use Illuminate\Support\Facades\Schedule;

Schedule::job(new GeneratePokemonNickname)->everyMinute();