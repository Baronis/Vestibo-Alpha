<?php

class Registration
{

    private $db_connection = null;

    public $errors = array();

    public $messages = array();

    /**
     * contrutor do registro
     */
    public function __construct()
    {
        if (isset($_POST["register"])) {
            $this->registerNewUser();
        }
    }

    //checa todos os erros posíveis
    private function registerNewUser()
    {
        if (empty($_POST['user_name'])) {
            $this->errors[] = "Nome de usuario vazio";
        } elseif (empty($_POST['user_password_new']) || empty($_POST['user_password_repeat'])) {
            $this->errors[] = "Senha vazia";
        } elseif ($_POST['user_password_new'] !== $_POST['user_password_repeat']) {
            $this->errors[] = "as duas senhas tem que ser iguais...";
        } elseif (strlen($_POST['user_password_new']) < 6) {
            $this->errors[] = "A Senha precisa ter no minimo 6 caracteres";
        } elseif (strlen($_POST['user_name']) > 64 || strlen($_POST['user_name']) < 2) {
            $this->errors[] = "O Nome de usuario nao pode ser tao curto ou tao longo";
        } elseif (!preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_name'])) {
            $this->errors[] = "o Nome de usuarios so aceita letras de A-Z e numeros...";
        } elseif (empty($_POST['user_email'])) {
            $this->errors[] = "Email nao pode estar vazio...";
        } elseif (strlen($_POST['user_email']) > 64) {
            $this->errors[] = "email nao pode ser maior que 64 characteres";
        } elseif (!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "seu email nao esta no formato vailido";
        } elseif (!empty($_POST['user_name'])
            && strlen($_POST['user_name']) <= 64
            && strlen($_POST['user_name']) >= 2
            && preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_name'])
            && !empty($_POST['user_email'])
            && strlen($_POST['user_email']) <= 64
            && filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)
            && !empty($_POST['user_password_new'])
            && !empty($_POST['user_password_repeat'])
            && ($_POST['user_password_new'] === $_POST['user_password_repeat'])
        ) {
            // cria a conexao
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            // muda para utf-8
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }

            // if se nao tiver erros de conexao
            if (!$this->db_connection->connect_errno) {

                // Checa os tipos de dados e a encripta da senha
                $user_name = $this->db_connection->real_escape_string(strip_tags($_POST['user_name'], ENT_QUOTES));
                $user_email = $this->db_connection->real_escape_string(strip_tags($_POST['user_email'], ENT_QUOTES));

                $user_password = $_POST['user_password_new'];
                $user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);

                // checa se o nome de usuario ou email ja existem
                $sql = "SELECT * FROM users WHERE user_name = '" . $user_name . "' OR user_email = '" . $user_email . "';";
                $query_check_user_name = $this->db_connection->query($sql);

                if ($query_check_user_name->num_rows == 1) {
                    $this->errors[] = "Desculpe mas esse Nome de Usuario/Email ja foi usado...";
                } else {
                    // insert para o banco de dados
                    $sql = "INSERT INTO users (user_name, user_password_hash, user_email)
                            VALUES('" . $user_name . "', '" . $user_password_hash . "', '" . $user_email . "');";
                    $query_new_user_insert = $this->db_connection->query($sql);

                    // if se o usuario foi adicionado ao db
                    if ($query_new_user_insert) {
                        $this->messages[] = "Sua Conta foi criada!!!!!!!!!!!!!!!!";
                    } else {
                        $this->errors[] = "Desculpa, seu cadastro falhou!, tente de novo...";
                    }
                }
            } else {
                $this->errors[] = "Desculpe, nao foi possivel conectar no banco de dados...";
            }
        } else {
            $this->errors[] = "um erro desconhecido ocorreu...";
        }
    }
}
