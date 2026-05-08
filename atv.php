<?php

abstract class MembroCampus {
    protected $identificacao; 
    protected $documento;     
    protected $faixaEtaria;   

    public function __construct($identificacao, $documento, $faixaEtaria) {
        $this->identificacao = $identificacao;
        $this->documento = $documento;
        $this->faixaEtaria = $faixaEtaria;
    }

    public function getDadosBase() {
        return "Registro: {$this->identificacao} | Doc: {$this->documento} | Idade: {$this->faixaEtaria} anos";
    }

    abstract public function exibirFicha();
}

class Discente extends MembroCampus {
    private $areaEstudo;
    private $registroAcademico;

    public function __construct($nome, $cpf, $idade, $curso, $ra) {
        parent::__construct($nome, $cpf, $idade);
        $this->areaEstudo = $curso;
        $this->registroAcademico = $ra;
    }

    public function exibirFicha() {
        echo "<strong>[ESTUDANTE]</strong> " . $this->getDadosBase() . "<br>";
        echo "Curso: {$this->areaEstudo} | RA: {$this->registroAcademico}<br><br>";
    }
}

class FuncionarioAtivo extends MembroCampus {
    private $cargo;
    private $remuneracao;
    private $categoria;

    public function __construct($nome, $cpf, $idade, $cargo, $salario, $categoria) {
        parent::__construct($nome, $cpf, $idade);
        $this->cargo = $cargo;
        $this->remuneracao = $salario;
        $this->categoria = $categoria;
    }

    public function exibirFicha() {
        echo "<strong>[{$this->categoria}]</strong> " . $this->getDadosBase() . "<br>";
        echo "Cargo: {$this->cargo} | Salário: R$ " . number_format($this->remuneracao, 2, ',', '.') . "<br><br>";
    }
}

class Convidado extends MembroCampus {
    public function exibirFicha() {
        echo "<strong>[VISITANTE]</strong> " . $this->getDadosBase() . "<br>";
        echo "Finalidade: Controle de Portaria<br><br>";
    }
}

$pessoa1 = new Discente("Ricardo Souza", "000.111.222-33", 19, "Agronomia", "IFTO-9982");
$pessoa2 = new FuncionarioAtivo("Dr. Helena", "444.555.666-77", 45, "Docente Titular", 7800.50, "PROFESSOR");
$pessoa3 = new FuncionarioAtivo("Roberto Alves", "888.999.000-11", 38, "Coordenador de TI", 4500.00, "SERVIDOR");
$pessoa4 = new Convidado("Patrícia Lima", "123.456.789-00", 30);


echo "<h2>Relatório de Frequência - Campus IFTO</h2><hr>";
$pessoa1->exibirFicha();
$pessoa2->exibirFicha();
$pessoa3->exibirFicha();
$pessoa4->exibirFicha();

?>