<?php

namespace ChainOfResponsibility;

class ProcessarParaEmpresasComUmAnexo implements ProcessarNotasFiscais
{
    protected ?ProcessarNotasFiscais $next = null;

    public function handle(array $request): void
    {
        if ($request['temApenasUmAnexo']) {
            echo "Nota Fiscal Processada usando o CNAE principal! \n";
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