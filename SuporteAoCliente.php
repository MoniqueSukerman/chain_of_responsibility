<?php

namespace ChainOfResponsibility;

interface SuporteAoCliente
{
    public function handle(string $request);

    public function setNext(self $next);
}