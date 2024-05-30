<?php

namespace ChainOfResponsibility;

class ProcessarParaEmpresasComVariosCnaes implements ProcessarNotasFiscais
{
    protected ?ProcessarNotasFiscais $next = null;

    public function handle(array $request): void
    {
        if ($request['temVariosCnaes'] && $request['leiComplementar']) {
            echo "Nota Fiscal Processada usando o Lei Complementar! \n";
            return;
        }

        if ($request['temVariosCnaes'] && !$request['leiComplementar']) {
            echo "Nota Fiscal Processada usando a relação de atividades municipais! \n";
            return;
        }

        echo "Não foi possível processar a Nota Fiscal! \n";

        if(!is_null($this->next)) {
            $this->next->handle($request);
        }
    }

    public function setNext(ProcessarNotasFiscais $next): void
    {
        $this->next = $next;
    }
}