<?php
define("DB_HOST", "mysql.hostinger.com.br");
define("DB_NAME", "u395938104_1");
define("DB_USER", "u395938104_adm");
define("DB_PASS", "admpass");
/**
 * Configuração para os cookies
 * para saber mais sobre tempo de cookies e etc... links abaixo
 * @see http://stackoverflow.com/q/9618217/1114320
 * @see http://www.php.net/manual/en/function.setcookie.php
 *
 * COOKIE_RUNTIME: quanto tempo o cookie é válido? 1209600 segundos = 2 semanas
 * COOKIE_DOMAIN: o domínio onde o cookie irá "trabalhar"
 * COOKIE_SECRET_KEY: uma chave secreta do cookie para deixar o app mais seguro, se for mudado todo o cookie é apagado...
 */
define("COOKIE_RUNTIME", 1209600);
define("COOKIE_DOMAIN", ".127.0.0.1");
define("COOKIE_SECRET_KEY", "1gp@TMPS{+$78sfpMJFe-92s");
/**
 * Configuração para o email:
 *
 * define("EMAIL_USE_SMTP", true); se ele usa smtp ou não (hostinger não suporta...)
 * define("EMAIL_SMTP_HOST", "ssl://smtp.gmail.com"); o smtp host...
 * define("EMAIL_SMTP_AUTH", true);
 * define("EMAIL_SMTP_USERNAME", "xxxxxxxxxx@gmail.com"); email
 * define("EMAIL_SMTP_PASSWORD", "xxxxxxxxxxxxxxxxxxxx"); a senha
 * define("EMAIL_SMTP_PORT", 465); a porta usada
 * define("EMAIL_SMTP_ENCRYPTION", "ssl"); e a encriptação do email ssl é dafault em todos...
 *
 * It's really recommended to use SMTP!
 *
 */
define("EMAIL_USE_SMTP", false);
define("EMAIL_SMTP_HOST", "mx1.hostinger.com.br");
define("EMAIL_SMTP_AUTH", true);
define("EMAIL_SMTP_USERNAME", "naoresponda@vestibo.com.br");
define("EMAIL_SMTP_PASSWORD", "goldenkeyvestibo");
define("EMAIL_SMTP_PORT", 2525);
define("EMAIL_SMTP_ENCRYPTION", "ssl");
/**
 * Configuração para o email de redefinição...
 */
define("EMAIL_PASSWORDRESET_URL", "http://vestibo.com.br/dev/esqueci");
define("EMAIL_PASSWORDRESET_FROM", "naoresponda@vestibo.com.br");
define("EMAIL_PASSWORDRESET_FROM_NAME", "Vestibo");
define("EMAIL_PASSWORDRESET_SUBJECT", "Redefinir sua senha");
define("EMAIL_PASSWORDRESET_CONTENT", "Clique aqui para redefinir sua senha:");
/**
 * Configuração para o email de ativação
 */
define("EMAIL_VERIFICATION_URL", "http://vestibo.com.br/dev/cadastrar");
define("EMAIL_VERIFICATION_FROM", "naoresponda@vestibo.com.br");
define("EMAIL_VERIFICATION_FROM_NAME", "Vestibo");
define("EMAIL_VERIFICATION_SUBJECT", "Ativacao para Vestibo");
define("EMAIL_VERIFICATION_CONTENT", "Clique aqui para ativar sua conta:");
//existe vários níveis de segurança, mas o 10 é padrão...
define("HASH_COST_FACTOR", "10");
/**
 * Caminho para a gravação das imagens de perfil dos usuários
 */
define('HTTP_IMAGE_PATH', 'http://vestibo.com.br/dev/img/users/');
define('LOCAL_IMAGE_PATH', '../img/users/');
define('HTTP_DEFAULT_IMAGE_PATH', 'http://vestibo.com.br/dev/img/user-image.png');
?>