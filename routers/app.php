<?php


router('/', 'AppControle@start');
router('/add-subscribe', 'AppControle@add_subscribe');
router('/remove-subscribe', 'AppControle@remove_subscribe');
router('/subscribe', 'AppControle@subscribe');
router('/events', 'AppControle@events');
router('/sent', 'AppControle@sent');
router('/webhook', 'AppControle@webhook');