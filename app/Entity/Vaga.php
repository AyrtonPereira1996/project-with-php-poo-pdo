<?php

namespace App\Entity;

use \App\db\dataBase;
use \PDO;

class Vaga
{
    
    // IDENTIFICADOR UNICO DA VAGA
        public $id;


    // TITULO DA VAGA
        public $titulo;


    // DESCRICAO DA VAGA
        public $descricao;


    // DEFINE SE A VAGA ESTÁ ACTIVA
        public $activo;


    // DATA DE PUBLICACAO DA VAGA
        public $data;




/**
 * METODO RESPONSÁVEL POR CADASTRAR
 * 
 */

    public function cadastrar() 
    {

        // DEFINIÇÃO DE DATA
        $this-> data = date('Y-m-d H:i:s');

        // INSERIR VAGA NA BASE DE DADOS
        $obDataBase = new DataBase('vagas');
        $this->id = $obDataBase->insert(
            [
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'ativo' => $this->activo,
            'data' => $this->data
            ]
        );
        
        return true;
        
    }

    /**
     * METODO RESPOSNAVEL POR EDITAR REGISTO DE VAGA
     */
    public function actualizar()
    {
        return (new dataBase('vagas'))-> update('id = '.$this->id, [
                                                                    'titulo' => $this->titulo,
                                                                    'descricao' => $this->descricao,
                                                                    'ativo' => $this->activo,
                                                                    'data' => $this->data
                                                                    ]
                                                                );
    }

    /**
     * METODO RESPONSAVEL PELA EXLUSAO DA VAGA
     */
    public function excluir()
    {
        return (new dataBase('vagas'))->delete('id = '. $this->id);
    }


    /**
     * METODO RESPONSAVEL POR OBTER AS VAGAS DO BANCO DE DADOS
     * 
     */
    public static function getVagas($where = null, $order = null, $limit = null)
    {
        return (new DataBase('vagas'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }

      /**
     * METODO RESPONSAVEL POR OBTER UMA VAGA COM BASE NO ID
     * 
     */
    public static function getVaga($id)
    { 
        return (new DataBase('vagas'))->select('id= '. $id)->fetchObject(self::class);
    }

    
}

    
