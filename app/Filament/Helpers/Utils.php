<?php

namespace App\Filament\Helpers;

use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;

class Utils {
    public static function responsiveTableLayout(array $comps) {
        return [
            Stack::make($comps)->hiddenFrom('md'),
            Split::make($comps)->visibleFrom('md'),

        ];
    }
}
