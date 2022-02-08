<?php

namespace App\db;

// DECLARAÇÂO DE DEPENDENCIA DA CLASSE
use \PDO;
use \PDOException;


class DataBase
{


    const HOST = 'localhost';
    const NAME = 'wdev_vagas';
    const USER = 'root';
    const PASS = '123456';

    private $_table;

    /** 
     * INSTANCIA DE CONEXAO COM O BANCO DE DADOS
     * 
     * */ 
    private $_connection;

    /** 
     * CONSTRUCTOR QUE DEFINI A TABELA
     *   
     */
    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    /**
     * METODO RESPONSÁVEL POR CRIAR UMA CONEXAO COM O BANCO DE DADOS
     */
    private function setConnection()
    {
        try {

            $this->_connection = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::NAME, self::USER, self::PASS);

            // CONFIGURACAO PARA LANÇAR UM EXCEPTION QUANDO HOUVER ERRO SERÁ TRAVADO
            $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $c) {
            die('ERROR:' . $c->getMessage());
        }
    }


    /**
     * METODO RESPONSAVEL POR EXECUTAR QUERIES DENTRO DO BANCO DE DADOS
     */

    public function execute($query, $params = [])
    {
        try {
            $statement = $this->_connection->prepare($query);
            $statement->execute($params);
            return $statement;
        }  catch (PDOException $c) {
            die('ERROR:' . $c->getMessage());
        }
    }


    /** 
     * METODO RESPONSAVEL POR INSERIR DADOS NO BANCO
     * array $values (field=>value)
     *
    */
    public function insert($values)
    {
        // DADOS DA QUERY
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        // MONTA A QUERY
        $query = 'INSERT INTO ' . $this->table . ' (' . implode(',', $fields) . ') VALUES(' . implode(',', $binds) . ')';
    
        // EXECUTA O INSERT
        $this->execute($query, array_values($values));
        
        // RETURNA O ID INSERIDO
        return $this->_connection->lastInsertId();
    }

    /** 
     * METODO PARA EXECUTAR CONSULTAS NO BANCO DE DADOS
     * 
     */
    public function select($where = null, $order = null, $limit = null, $fields = '*')
    {
        // DADOS DA QUERY
        $where = strlen($where) ? 'WHERE '.$where : '' ;
        $order = strlen($order) ? 'ORDER BY '.$order : '' ;
        $limit = strlen($limit) ? 'LIMIT '.$limit : '' ;


        //MONTA A QUERY
        $query = 'SELECT '.$fields.' FROM '. $this->table. ' '.$where.' '.$order.' '.$limit;
    
        return $this->execute($query);
    
    }


    /**
     * METODO PARA REALIZAR ACTUZLIZACAO DE DADOS NO BANCO DE DADOS
     */

    public function update($where, $values)
    {   
        //DADOS DA QUERY
        $fields = array_keys($values);



        //MONTA A QUERY 
        $query = 'UPDATE '.$this->table.' SET '.implode('=?,', $fields).'=? WHERE '. $where;
        
        $this->execute($query, array_values($values));
        return true;
    }

    /**
     * METODO RESPONSAVEL POR EXCLUIR DADOS DO BANCO DE DADOS
     */
    public function delete($where){


        //MONTA QUERY
        $query = "DELETE FROM ". $this->table. ' WHERE '. $where;
     

        //EXECUTA QUERY
        $this->execute($query);

        return true; 
    }


}
