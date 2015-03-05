<?php
/**
 * User registration
 * @author Panique
 * @link http://www.php-login.net
 * @link https://github.com/panique/php-login-advanced/
 * @license http://opensource.org/licenses/MIT MIT License
 */
class Registration
{
    private $db_connection = null;
    public  $registration_successful = false;
    public  $verification_successful = false;
    public  $errors = array();
    public  $messages = array();

    public function __construct()
    {
        session_start();
        // call registerNewUser()
        if (isset($_POST["register"])) {
            $this->registerNewUser($_POST['user_name'], $_POST['user_email'], $_POST['user_password_new'], $_POST['user_password_repeat'], $_POST["captcha"],$_POST["user_nome"],$_POST["user_sobnome"],$_POST["user_nasc"]);
        // call verifyNewUser()
        } else if (isset($_GET["id"]) && isset($_GET["verification_code"])) {
            $this->verifyNewUser($_GET["id"], $_GET["verification_code"]);
        }
    }

    private function databaseConnection()
    {
        // connection already opened
        if ($this->db_connection != null) {
            return true;
        } else {
            try {
                $this->db_connection = new PDO('mysql:host=127.0.0.1;dbname=ves', 'root', 'admpass');
                //$this->db_connection = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME . ';charset=utf8;', DB_USER, DB_PASS);
                return true;
            // If connection failed
            } catch (PDOException $e) {
                $this->errors[] = MESSAGE_DATABASE_ERROR;
                return false;
            }
        }
    }

    private function registerNewUser($user_name, $user_email, $user_password, $user_password_repeat, $captcha, $user_nome, $user_sobnome, $user_nasc)
    {
        // removes extra space
        $user_name  = trim($user_name);
        $user_email = trim($user_email);
        // check provided data validity
        // TODO: check for "return true" case early, so put this first
        if (strtolower($captcha) != strtolower($_SESSION['captcha'])) 
        {
            $this->errors[] = MESSAGE_CAPTCHA_WRONG;
        } 
        elseif (empty($user_name))
        {
            $this->errors[] = MESSAGE_USERNAME_EMPTY;
        } 
        elseif (empty($user_password) || empty($user_password_repeat)) 
        {
            $this->errors[] = MESSAGE_PASSWORD_EMPTY;
        } 
        elseif ($user_password !== $user_password_repeat) 
        {
            $this->errors[] = MESSAGE_PASSWORD_BAD_CONFIRM;
        } 
        elseif (strlen($user_password) < 6) 
        {
            $this->errors[] = MESSAGE_PASSWORD_TOO_SHORT;
        } 
        elseif (strlen($user_name) > 64 || strlen($user_name) < 2) 
        {
            $this->errors[] = MESSAGE_USERNAME_BAD_LENGTH;
        } 
        elseif (!preg_match('/^[a-z\d]{2,64}$/i', $user_name)) 
        {
            $this->errors[] = MESSAGE_USERNAME_INVALID;
        } 
        elseif (empty($user_email)) 
        {
            $this->errors[] = MESSAGE_EMAIL_EMPTY;
        }
        elseif (empty($user_nome)) 
        {
            $this->errors[] = MESSAGE_NOME_EMPTY;
        }
        elseif (empty($user_sobnome)) 
        {
            $this->errors[] = MESSAGE_SOBRENOME_EMPTY;
        }
        elseif (empty($user_nasc)) 
        {
            $this->errors[] = MESSAGE_NASCIMENTO_EMPTY;
        }
        elseif (strlen($user_email) > 64) {
            $this->errors[] = MESSAGE_EMAIL_TOO_LONG;
        } elseif (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = MESSAGE_EMAIL_INVALID;

        // if all the above checks are ok
        } else if ($this->databaseConnection()) {
            // check if username or email already exists
            $query_check_user_name = $this->db_connection->prepare('SELECT cad_name, cad_email FROM cad_users WHERE cad_name = :cad_name OR cad_email = :cad_email');
            $query_check_user_name->bindValue(':cad_name', $user_name, PDO::PARAM_STR);
            $query_check_user_name->bindValue(':cad_email', $user_email, PDO::PARAM_STR);
            $query_check_user_name->execute();
            $result = $query_check_user_name->fetchAll();
            // check if already exists
            if (count($result) > 0) {
                for ($i = 0; $i < count($result); $i++) {
                    $this->errors[] = ($result[$i]['user_name'] == $user_name) ? MESSAGE_USERNAME_EXISTS : MESSAGE_EMAIL_ALREADY_EXISTS;
                }
            } else {
                // check if we have a constant HASH_COST_FACTOR defined (in config/hashing.php),
                // if so: put the value into $hash_cost_factor, if not, make $hash_cost_factor = null
                $hash_cost_factor = (defined('HASH_COST_FACTOR') ? HASH_COST_FACTOR : null);
                // crypt the user's password with the PHP 5.5's password_hash() function, results in a 60 character hash string
                // the PASSWORD_DEFAULT constant is defined by the PHP 5.5, or if you are using PHP 5.3/5.4, by the password hashing
                // compatibility library. the third parameter looks a little bit shitty, but that's how those PHP 5.5 functions
                // want the parameter: as an array with, currently only used with 'cost' => XX.
                $user_password_hash = password_hash($user_password, PASSWORD_DEFAULT, array('cost' => $hash_cost_factor));
                // generate random hash for email verification (40 char string)
                $user_activation_hash = sha1(uniqid(mt_rand(), true));
                // write new users data into database
                $query_new_user_insert = $this->db_connection->prepare('    INSERT INTO cad_users   (cad_nick, cad_password_hash, cad_email, cad_first_name, cad_last_name, cad_birth, cad_activation_hash, cad_registration_ip, cad_registration_datetime) 
                                                                            VALUES                  (:user_nick, :cad_password_hash, :cad_email, :cad_first_name, :cad_last_name, :cad_birth, :cad_activation_hash, :cad_registration_ip, now())');
                $query_new_user_insert->bindValue(':cad_nick', $user_name, PDO::PARAM_STR);
                $query_new_user_insert->bindValue(':cad_password_hash', $user_password_hash, PDO::PARAM_STR);
                $query_new_user_insert->bindValue(':cad_email', $user_email, PDO::PARAM_STR);
                $query_new_user_insert->bindValue(':cad_first_name', $user_nome, PDO::PARAM_STR);
                $query_new_user_insert->bindValue(':cad_last_name', $user_sobnome, PDO::PARAM_STR);
                $query_new_user_insert->bindValue(':cad_birth', $user_nasc, PDO::PARAM_INT);
                $query_new_user_insert->bindValue(':cad_activation_hash', $user_activation_hash, PDO::PARAM_STR);
                $query_new_user_insert->bindValue(':cad_registration_ip', $_SERVER['REMOTE_ADDR'], PDO::PARAM_STR);
                $query_new_user_insert->execute();

                // id of new user
                $user_id = $this->db_connection->lastInsertId();

                if ($query_new_user_insert) {
                    // send a verification email
                    if ($this->sendVerificationEmail($user_id, $user_email, $user_activation_hash)) {
                        // when mail has been send successfully
                        $this->messages[] = MESSAGE_VERIFICATION_MAIL_SENT;
                        $this->registration_successful = true;
                    } else {
                        // delete this users account immediately, as we could not send a verification email
                        $query_delete_user = $this->db_connection->prepare('DELETE FROM cad_users WHERE cad_id = :cad_id');
                        $query_delete_user->bindValue(':cad_id', $user_id, PDO::PARAM_INT);
                        $query_delete_user->execute();
                        $this->errors[] = MESSAGE_VERIFICATION_MAIL_ERROR;
                    }
                } else {
                    $this->errors[] = MESSAGE_REGISTRATION_FAILED;
                }
            }
        }
    }
    //sends the email
    public function sendVerificationEmail($user_id, $user_email, $user_activation_hash)
    {
        $mail = new PHPMailer;
        // use SMTP or use mail()
        if (EMAIL_USE_SMTP) {
            // Set mailer to use SMTP
            $mail->IsSMTP();
            //useful for debugging, shows full SMTP errors
            //$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
            // Enable SMTP authentication
            $mail->SMTPAuth = EMAIL_SMTP_AUTH;
            // Enable encryption, usually SSL/TLS
            if (defined(EMAIL_SMTP_ENCRYPTION)) {
                $mail->SMTPSecure = EMAIL_SMTP_ENCRYPTION;
            }
            // Specify host server
            $mail->Host = EMAIL_SMTP_HOST;
            $mail->Username = EMAIL_SMTP_USERNAME;
            $mail->Password = EMAIL_SMTP_PASSWORD;
            $mail->Port = EMAIL_SMTP_PORT;
        } else {
            $mail->IsMail();
        }

        $mail->From = EMAIL_VERIFICATION_FROM;
        $mail->FromName = EMAIL_VERIFICATION_FROM_NAME;
        $mail->AddAddress($user_email);
        $mail->Subject = EMAIL_VERIFICATION_SUBJECT;

        $link = EMAIL_VERIFICATION_URL.'?id='.urlencode($user_id).'&verification_code='.urlencode($user_activation_hash);

        $mail->Body = EMAIL_VERIFICATION_CONTENT.' '.$link;

        if(!$mail->Send()) {
            $this->errors[] = MESSAGE_VERIFICATION_MAIL_NOT_SENT . $mail->ErrorInfo;
            return false;
        } else {
            return true;
        }
    }
    
    // checks the id/verification code combination and set the user's activation status to true (=1) in the database
    public function verifyNewUser($user_id, $user_activation_hash)
    {
        // if database connection opened
        if ($this->databaseConnection()) {
            // try to update user with specified information
            $query_update_user = $this->db_connection->prepare('UPDATE cad_users SET cad_active = 1, cad_activation_hash = NULL WHERE cad_id = :cad_id AND cad_activation_hash = :cad_activation_hash');
            $query_update_user->bindValue(':cad_id', intval(trim($user_id)), PDO::PARAM_INT);
            $query_update_user->bindValue(':cad_activation_hash', $user_activation_hash, PDO::PARAM_STR);
            $query_update_user->execute();

            if ($query_update_user->rowCount() > 0) {
                $this->verification_successful = true;
                $this->messages[] = MESSAGE_REGISTRATION_ACTIVATION_SUCCESSFUL;
            } else {
                $this->errors[] = MESSAGE_REGISTRATION_ACTIVATION_NOT_SUCCESSFUL;
            }
        }
    }
}
