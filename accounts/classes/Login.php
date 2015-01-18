<?php

/**
* login e logout do usuario
 */
class Login
{
    /**
     * @var objeto da conexao
     */
    private $db_connection = null;
    /**
     * @var array de mensagens de erros
     */
    public $errors = array();
    /**
     * @var array de mensagens sortidas
     */
    public $messages = array();

    /**
     * 
     * constroi a classe login
     */
    public function __construct()
    {
        // cria a sessao
        session_start();

        //checa os pssiveis dados de login
        if (isset($_GET["logout"])) {
            $this->doLogout();
        }
        // login via POst DADOS...
        elseif (isset($_POST["login"])) {
            $this->dologinWithPostData();
        }
    }

    /**
     * login via POST
     */
    private function dologinWithPostData()
    {
        // checa os campos...
        if (empty($_POST['user_name'])) {
            $this->errors[] = "campo de nome de usuario esta vazioo.";
        } elseif (empty($_POST['user_password'])) {
            $this->errors[] = "senha em branco.";
        } elseif (!empty($_POST['user_name']) && !empty($_POST['user_password'])) {

            // cria a conexao com db, conforme o conf
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            // trocar para utf-8
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }

            // if se nao tiver erro
            if (!$this->db_connection->connect_errno) {

                // POST stuff
                $user_name = $this->db_connection->real_escape_string($_POST['user_name']);

                // query do database
                $sql = "SELECT user_name, user_email, user_password_hash
                        FROM users
                        WHERE user_name = '" . $user_name . "' OR user_email = '" . $user_name . "';";
                $result_of_login_check = $this->db_connection->query($sql);

                // if se o usuario existir
                if ($result_of_login_check->num_rows == 1) {

                    // pega o resultado agr
                    $result_row = $result_of_login_check->fetch_object();

                    // usando o  check senha do PHP 5.5
                    // o hash da senha do usuario
                    if (password_verify($_POST['user_password'], $result_row->user_password_hash)) {

                        // escreve dados no php
                        $_SESSION['user_name'] = $result_row->user_name;
                        $_SESSION['user_email'] = $result_row->user_email;
                        $_SESSION['user_login_status'] = 1;

                    } else {
                        $this->errors[] = "Senha errada tente de novo....";
                    }
                } else {
                    $this->errors[] = "Esse usuario nao existe...";
                }
            } else {
                $this->errors[] = "Desculpe, Problemas no banco de dados";
            }
        }
    }

    /**
     * faz o logout
     */
    public function doLogout()
    {
        // deleta a sessao do usuario
        $_SESSION = array();
        session_destroy();
        // feeedback
        $this->messages[] = "Voce Saiu com sucesso...";

    }

    /**
     * return simples do usuario
     * @return login status como bool
     */
    public function isUserLoggedIn()
    {
        if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
            return true;
        }
        // retorna normalmente
        return false;
    }
}
