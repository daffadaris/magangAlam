<?php
use Illuminate\Support\Facades\DB;
function generateAutoIncrementingValue()
{
    $lastValue = DB::table('film')->max('kd_film');
    $number = (int) substr($lastValue, 1);
    $incrementedNumber = $number + 1;
    $incrementedValue = 'f' . str_pad($incrementedNumber, 3, '0', STR_PAD_LEFT);

    return $incrementedValue;
}


