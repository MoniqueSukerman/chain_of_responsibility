<?php

namespace ChainOfResponsibility;

class SuporteAoClienteBase implements SuporteAoCliente
{
    protected SuporteAoCliente $next;

    public function handle(string $request): void
    {
        if(!is_null($this->next)) {
            $this->next->handle($request);
        }
    }

    public function setNext(SuporteAoCliente $next): void
    {
        $this->next = $next;
    }
}