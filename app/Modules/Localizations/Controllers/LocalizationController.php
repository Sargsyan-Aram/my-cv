<?php

namespace App\Modules\Localizations\Controllers;

use App\Http\Controllers\ApiBaseController;
use App\Modules\Localizations\Services\LocalizationService;
use Illuminate\Http\JsonResponse;

class LocalizationController extends ApiBaseController
{
    /**
     * @var LocalizationService
     */
    private LocalizationService $service;

    /**
     * LocalizationController constructor.
     * @param LocalizationService $service
     */
    public function __construct(LocalizationService $service)
    {
        $this->service = $service;
    }

    /**
     * @param string $locale
     * @return JsonResponse
     */
    public function messages(string $locale): JsonResponse
    {
        return $this->responseWithData([
            'messages' => $this->service->messages($locale)
        ]);
    }
}
