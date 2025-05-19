<?php

$contactForm = function() {
    $form = new \Uniform\Form([
        'email' => [
            'rules' => ['required', 'email'],
            'message' => 'Please enter a valid email address',
        ],
        'name' => [],
        'message' => [
            'rules' => ['required'],
            'message' => 'Please enter a message',
        ],
        'email' => [
            'rules' => ['required', 'email'],
            'message' => t('error-email'),
        ],
        'message' => [
            'rules' => ['required'],
            'message' => t('error-message'),
        ],
        'policy' => [
            'rules' => ['required'],
            'message' => t('error-policy'),
        ],
    ]);

    // Perform validation and execute guards.
    $form->withoutFlashing()
        ->withoutRedirect()
        ->guard();

    if (!$form->success()) {
        // Return validation errors.
        return Response::json($form->errors(), 400);
    }

    // If validation and guards passed, execute the action.
    $form->emailAction([
        'to' => 'remy.sirichantho@reclamebureauplug.be',
        'from' => get('email'),
        'subject' => 'Boodschap van het contactformulier'
    ])
    /*->emailAction([
        'to' => 'form@plug.be',
        'from' => get('email'),
        'subject' => 'Boodschap van het contactformulier'
    ])*/
    ->logAction([
        'file' => kirby()->roots()->site().'/logs/contact-form.log',
    ])
    ->logAction([
        'file' => kirby()->roots()->site().'/logs/contact-form.html',
        'template'    => 'maillog'
    ]);

    if (!$form->success()) {
        // This should not happen and is our fault.
        return Response::json($form->errors(), 500);
    }

    // Return code 200 on success.
    return Response::json([], 200);
};