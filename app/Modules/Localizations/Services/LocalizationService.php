<?php

namespace App\Modules\Localizations\Services;

class LocalizationService
{
    const LOCALES = ['am', 'en'];

    /**
     * @param string $locale
     * @return array
     */
    public function messages(string $locale): array
    {
        if (!in_array($locale, self::LOCALES)) {
            $locale = env('DEFAULT_LOCALE');
        }

        return include resource_path("lang/{$locale}/static.php");
    }

}
