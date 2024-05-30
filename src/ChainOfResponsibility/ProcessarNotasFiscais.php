<?php

namespace ChainOfResponsibility;

interface ProcessarNotasFiscais
{
    public function handle(array $request);

    public function setNext(self $next);
}