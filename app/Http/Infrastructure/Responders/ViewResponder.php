<?php


/** this class responsible for handle response for views like [index, edit, show ....] */

namespace App\Http\Infrastructure\Responders;

use Illuminate\View\View;

class ViewResponder extends Responder
{

    private $view;

    public function setView($view) :self
    {
        $this->view = $view;
        return $this;
    }

    public function respond() :View
    {
       return View($this->view)->with($this->getResponse());
    }
}
