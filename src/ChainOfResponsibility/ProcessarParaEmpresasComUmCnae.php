<?php

namespace ChainOfResponsibility;

class ProcessarParaEmpresasComUmCnae implements ProcessarNotasFiscais
{
    protected ?ProcessarNotasFiscais $next = null;

    public function handle(array $request): void
    {
        if ($request['temApenasUmCnae']) {
            echo "Nota Fiscal Processada usando seu unico CNAE! \n";
            return;
        }

        if(!is_null($this->next)) {
            $this->next->handle($request);
        }
    }

    public function setNext(ProcessarNotasFiscais $next): void
    {
        $this->next = $next;
    }
}