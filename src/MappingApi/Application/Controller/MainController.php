<?php

namespace MappingApi\Application\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class MainController extends AbstractController
{
    public function page(): Response
    {
		$firstVar = "";
        // the template path is the relative file path from `templates/`
        return $this->render('base.html.twig', [
            // this array defines the variables passed to the template,
            // where the key is the variable name and the value is the variable value
            // (Twig recommends using snake_case variable names: 'foo_bar' instead of 'fooBar')
            'first_var' => $firstVar,
        ]);
    }
}