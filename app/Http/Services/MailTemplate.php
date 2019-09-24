<?php

namespace App\Http\Services;

class MailTemplate
{
    /**
     * Create template from the given view.
     * @param view
     * @param data
     */
    public function createTemplate($view, $data)
    {
        $view = View::make($view, $data);
        $template = $view->render();
        return $template;
    }
}