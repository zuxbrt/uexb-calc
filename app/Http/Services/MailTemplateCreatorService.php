<?php

namespace App\Http\Services;


use Illuminate\Support\Facades\View;

class MailTemplateCreatorService
{

    private $logService;

    public function __construct(LogService $logService)
    {
        $this->logService = $logService;
    }

    /**
     * @param $view
     * @param $data
     * @return string
     */
    public function createTemplateFromView($view, $data) {

        try {
            // create view
            $view = View::make($view, $data);
            // render to variable
            $template = $view->render();
            // return
            return $template;

        } catch (\Exception $e) {
            // add log
            $this->logService->setLog('ERROR', 'MailTemplateCreatorService - createTemplateFromView: ' . $e->getMessage());
        }
    }
}