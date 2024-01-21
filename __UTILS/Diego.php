@@ -0,0 +1,674 @@
<?php
/**
 * Nerdpress - CRM Nerdweb
 * PHP Version 7.2
 *
 * @package    Nerdweb
 * @author     Rafael Rotelok rotelok@nerdweb.com.br
 * @author     Junior Neves junior@nerdweb.com.br
 * @author     Adriano Buba adriano.buba@nerdweb.com.br
 * @author     Hiago Klapowsko hiago.kalpowsko@nerdweb.com.br
 * @copyright  2012-2020 Extreme Hosting Servicos de Internet LTDA
 * @license    https://nerdpress.com.br/license.txt
 * @version    Release: 2.5.0
 * @revision   2020-02-10
 */

namespace Nerdweb {
    /**
     * Class Utils
     * Pacote de utilitarios que ficavam espalhados em varios arquivos, agora estao todos declarados nessa
     * classe estatica, o modo de utilizacao eh UTIL::<nome_da_funcao> nao eh possivel instanciar
     * um objeto dessa classe
     *
     * @package Nerdweb
     */
    final class Utils {
        // Construtor privado pra forcar a classe a ser usada somente de maneira estatica
        /**
         * Utils constructor.
         */
        private function __construct() {
        }

        /**
         * Faz um dump da variaveis e termina o script.
         *
         * Faz um dump das variaveis passadas + antes codifica as variaveis separadamente em json
         * apos a impressao finaliza a execucao do script.
         *
         * @param array ...$vars
         */
        public static function dump(...$vars) {
            $json = [];
            foreach ($vars as $var) {
                if (is_array($var) || is_object($var)) {
                    $json[] = json_encode($var, TRUE);
                }
                else {
                    $json[] = json_encode($var);
                }
            }
            /** @noinspection ForgottenDebugOutputInspection */
            print_r($json);
            exit;
        }

        /**
         * Usa o Javascript para dump de variaveis de php
         *
         * Usa o Javascript para dump de variaveis de php, essa funcao tenta imitar o console.log do javascript
         * aceita um numero variavel de parametros, faz um loop pelo array de parametros e imprime elemento por elemento
         * unsando a sintaxe <script>console.log('PHP: Parametro[i])></script>
         *
         * @param array $data
         *
         * @return void
         */
        public static function console_log(...$data) {
            foreach ($data as $obj) {
                // Encoda como array, pq eu prefiro array :)
                if (is_array($obj) || is_object($obj)) {
                    echo "<script>console.log('PHP: " . json_encode($obj, TRUE) . "');</script>" . PHP_EOL;
                }
                else {
                    echo "<script>console.log('PHP: " . $obj . "');</script>" . PHP_EOL;
                }
            }
        }

        /**
         * @param string $data
         *
         * @return bool
         */
        public static function isJSON($data = NULL) {
            if (!empty($data)) {
                /** @noinspection PhpUsageOfSilenceOperatorInspection */
                @json_decode($data, TRUE);
                return (json_last_error() === JSON_ERROR_NONE);

            }

            return FALSE;
        }

        /**
         * Corta uma string em determinado tamanho
         *
         * Corta uma string $texto com o tamanho $limite, caso a string seja maior que $limite concatena o resultado com $sufixo e retorna
         * a string resultante, ou retorna a propria string $texto caso esta seja menor que $limite
         *
         * @param int    $limite
         * @param string $texto
         * @param string $sufixo
         *
         * @return string
         */
        public static function cortaTexto($limite, $texto, $sufixo = "...") {
            $tamTotal = strlen($texto);
            $tamSufixo = strlen($sufixo);
            $texto = trim(strip_tags($texto));
            if ($tamTotal > $limite) {
                $tmpStr = substr($texto, 0, $limite - $tamSufixo);
                return $tmpStr . $sufixo;
            }
            return $texto;
        }

        /**
         * Retorna uma url mais amigavel
         *
         * Retorna uma url mais amigavel baseado no $id passao e $texto,
         *
         * @param int    $id
         * @param string $texto
         *
         * @return string
         */
        public static function geraURL($id, $texto) {
            $texto = self::limpa_nome($texto);
            return $id . "-" . $texto;
        }

        /**
         * Limpa os caracteres especiais de uma string
         *
         * Limpa os caracteres especiais de uma string removendo acentos, e outros caracteres como ' " / \ |
         * logo apos removendo espacos duplos e substituindo por -
         *
         * @param string $str
         *
         * @return string
         */
        public static function limpa_nome($str) {
            $str = self::remove_acento($str);
            $str = self::remove_caracteres_especiais($str);
            $str = trim($str);
            $str = self::limpa_espacos($str);
            $str = strtolower($str);
            return $str;
        }

        /**
         * Substitui acentuacao de uma string
         *
         * Substitui acentuacao de uma string trocando os caracteres acentuados por caracteres nao acentuados
         * ie: À => A
         *
         * @param string $str
         *
         * @return string
         */
        public static function remove_acento($str) {
            $a = ['À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ', 'ª'];
            $b = ['A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o', ''];
            return str_replace($a, $b, $str);
        }

        /**
         * Remove caracteres especiais
         *
         * Remove caracteres especiais de acentuacao
         * ie: "~" => ""
         *
         * @param string $str
         *
         * @return string
         */
        public static function remove_caracteres_especiais($str) {
            return str_replace(["\\", "/", ",", "'", "–", "‒", "–", "—", "_", "\"", "`", "~", ";", ":", "|", "[", "]", "{", "}", "(", ")", "*", "&", "^", "%", '$', "@", "!", "?", "<", ">", "ª","º","°"], "", $str);
        }

        /**
         * Remove espacos duplos
         *
         * Remove espacos duplos e substitui espacos simples por hifens
         *
         * @param string $str
         *
         * @return string
         */
        public static function limpa_espacos($str) {
            return str_replace(["  ", " "], [" ", "-"], $str);
        }

        /**
         * Ordena um array pela chave passada.
         *
         * Ordena um array de arrays, usando a chave do array interno como parametro pra ordenacao
         *
         * @param      $array
         * @param      $subkey
         * @param bool $sort_ascending
         *
         * @return array
         */
        public static function subKeySort(array $array, $subkey, $sort_ascending = FALSE) {
            return self::sksort($array, $subkey, $sort_ascending);
        }

        /**
         * Gera uma senha aleatoria do tamanho passado
         *
         * @param int $tamanho
         *
         * @return string
         */
        public static function geraSenha($tamanho = 15) {
            $chars = "abcdefghijklmnopqrstuvxwyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
            $count = mb_strlen($chars);
            $password = "";
            for ($i = 0; $i < $tamanho; $i++) {
                $random_char = rand(0, $count - 1);
                $password .= mb_substr($chars, $random_char, 1);
            }
            return $password;
        }

        /**
         * Copy a file, or recursively copy a folder and its contents
         *
         * @param string $source      Source path
         * @param string $dest        Destination path
         * @param int    $permissions New folder creation permissions
         *
         * @return      bool     Returns true on success, false on failure
         * @version     1.0.1
         * @link        http://aidanlister.com/2004/04/recursively-copying-directories-in-php/
         *
         * @author      Aidan Lister <aidan@php.net>
         */
        public static function xcopy($source, $dest, $permissions = 0777) {
            // Check for symlinks
            if (is_link($source)) {
                return symlink(readlink($source), $dest);
            }

            // Simple copy for a file
            if (is_file($source)) {
                return copy($source, $dest);
            }

            // Make destination directory
            if (!is_dir($dest)) {
                /** @noinspection MkdirRaceConditionInspection */
                mkdir($dest, $permissions);
            }

            // Loop through the folder
            $dir = dir($source);
            while (FALSE !== $entry = $dir->read()) {
                // Skip pointers
                if ($entry === '.' || $entry === '..') {
                    continue;
                }

                // Deep copy directories
                Utils::xcopy("$source/$entry", "$dest/$entry", $permissions);
            }

            // Clean up
            $dir->close();
            return TRUE;
        }


        /**
         * @param string $path
         * @param        $pasta
         *
         * @return null
         * Cria pasta para uploads;
         */
        public static function criarPasta($pasta, $full_path = FALSE) {
            $pasta = str_replace(["/../", "../", "./"], "", $pasta);

            if ($pasta[0] === "/") {
                $pasta = substr($pasta, 1);
            }

            if ($full_path === FALSE) {
                $path = $_SERVER["DOCUMENT_ROOT"] . "/";
            }

            $explode = explode("/", $pasta);
            if (isset($explode[0])) {
                foreach ($explode as $exp) {
                    $path .= $exp;
                    if (!file_exists($path) && !is_dir($path)) {
                        if (mkdir($path, 0777)) {
                            $path .= "/";
                        }
                    }
                    else {
                        $path .= "/";
                    }
                }
                return $path;
            }
            return NULL;
        }

        /**
         * @param null   $stringBase64
         * @param string $newName
         * @param string $destino
         *
         * @return array
         */
        public static function uploadImagemBase64($stringBase64 = NULL, $newName = '', $destino = '/uploads/') {
            $retorno = [
                'arquivo' => '',
                'msg'     => ''
            ];


            if ($stringBase64) {
                $data = explode(',', $stringBase64);

                if (strpos($destino, '/home2/') === FALSE) {
                    $destino = $_SERVER["DOCUMENT_ROOT"] . $destino;
                }

                // trata tipo (jpeg, png)
                $pos = strpos($data[0], ';');
                $tipo = explode('/', substr($data[0], 0, $pos))[1];

                // trata base64
                $data[1] = base64_decode($data[1]);
                $img_data = imagecreatefromstring($data[1]);

                $uniqer = md5(uniqid('', TRUE)) . time();
                $nomeArquivo = !empty($newName) ? \Nerdweb\Utils::limpa_nome(str_replace([".jpeg", ".jpg", ".gif", ".png", ".webp"], "", $newName)) . "-" . $uniqer : $uniqer;

                if (!file_exists($destino) && !is_dir($destino)) {
                    mkdir($destino, 0777, TRUE);
                }

                if (!is_writable($destino)) {
                    chmod($destino, 0777);
                }

                if ($img_data) {
                    switch ($tipo) {
                        case 'jpeg':
                            $nomeArquivo .= '.jpg';
                            $salvo = imagejpeg($img_data, $destino . $nomeArquivo, 100);
                            break;

                        case 'png':
                            $nomeArquivo .= '.png';
                            imagealphablending($img_data, FALSE);
                            imagesavealpha($img_data, TRUE);
                            $salvo = imagepng($img_data, $destino . $nomeArquivo, 6);
                            break;

                        case 'webp':
                            $nomeArquivo .= '.webp';
                            imagealphablending($img_data, FALSE);
                            imagesavealpha($img_data, TRUE);
                            $salvo = imagewebp($img_data, $destino . $nomeArquivo, 80);
                            break;


                        default:
                            $salvo = FALSE;
                            break;
                    }

                    if ($salvo) {
                        $retorno['arquivo'] = $nomeArquivo;
                    }
                    else {
                        $retorno['msg'] = 'Formato de imagem não suportado.';
                    }

                }
                else {
                    $retorno['msg'] = 'Erro no base64 enviado.';
                }

            }
            else {
                $retorno['msg'] = 'Nenhum arquivo enviado.';
            }

            return $retorno;
        }

        /**
         * Realiza upload de arquivo, para campos de upload de um único arquivo
         * TODO: revisar a função e buscar implementação dela para múltiplos arquivos
         * TODO: Arrumar a parte de truncar a string do nome do arquivo
         *
         * @param string $chave       name do campo de upload
         * @param string $extensoes   extensões de arquivo permitidas, separadas por vírgula, sem espaços (ex: 'png,jpg,jpeg,gif')
         * @param string $newName
         * @param string $destino     pasta de destino do upload
         * @param int    $max_tamanho tamanho maximo do nome do arquivo
         *
         * @return array
         */
        public static function uploadArquivo($chave, $extensoes = "", $newName = "", $destino = "/uploads", $max_tamanho = 500) {
            if (!isset($_FILES[$chave]['name'])) {
                return ['arquivo' => '', 'msg' => 'Nenhum arquivo enviado'];
            }

            $tamanhoHash = 3;
            $nome = $_FILES[$chave]['name'];
            $nomeTemporario = explode(".", $nome);
            $nomeTemporario = $nomeTemporario[0];


            $destino = str_replace(['../', '../'], '/', $destino);

            if ($destino[0] != '/') {
                $destino = "/" . $destino;
            }

            if (strpos($destino, '/home2/') === FALSE) {
                $destino = $_SERVER["DOCUMENT_ROOT"] . $destino;
            }
            // Extensão do arquivo

            if (preg_match("/\\.([^\\.]*)$/", $nome, $exts)) {
                $contExtencao = count($exts);
                $extencao = $exts[$contExtencao - 1]; // Última extensão
            }
            else {
                $extencao = "";
            }

            // Nome único para o arquivo
            $hash = substr(md5(uniqid(mt_rand(), 1)), 0, $tamanhoHash);
            $nomeTemporario = substr($nomeTemporario, 0, $max_tamanho - ($tamanhoHash + strlen($extencao)));
            $nomeArquivo = $nomeTemporario . '-' . $hash . '.' . $extencao;
            $nomeArquivo = !empty($newName) ? $newName . "-" . $nomeArquivo : $nomeArquivo;
            $nomeArquivo = Utils::limpa_nome($nomeArquivo);

            $extPermitidas = explode(",", strtolower($extensoes));

            if ($extensoes && !in_array($extencao, $extPermitidas, TRUE)) {
                $retorno = "'" . $_FILES[$chave]['name'] . "' é um arquivo inválido.";
                return ['arquivo' => '', 'msg' => $retorno];
            }


            if (substr($destino, -1) !== "/") {
                $destino .= '/';
            } //Adiciona uma barra '/' no fim do caminho
            $uploadfile = $destino . $nomeArquivo;


            $retorno = '';
            $moved = !move_uploaded_file($_FILES[$chave]['tmp_name'], $uploadfile);
            if ($moved) {
                $retorno = "Não foi possível enviar o arquivo '" . $_FILES[$chave]['name'] . "'";
                if (!file_exists($destino)) {
                    $retorno .= " : Pasta não encontrada.";
                }
                elseif (!is_writable($destino)) {
                    $retorno .= " : Pasta sem Permissão.";
                }
                elseif (!is_writable($uploadfile)) {
                    $retorno .= " : Arquivo não é editável.";
                }

                $nomeArquivo = NULL;
            }
            else {
                $size = !$_FILES[$chave]['size'];
                if ($size) {
                    /** @noinspection PhpUsageOfSilenceOperatorInspection */
                    @unlink($uploadfile); // Apaga o arquivo vazio
                    $nomeArquivo = '';
                    $retorno = "Arquivo vazio encontrado - use um arquivo válido.";
                }
                else {
                    chmod($uploadfile, 0777);
                }
            }
            return ['arquivo' => $nomeArquivo, 'msg' => $retorno];
        }

        /**
         * @param $array
         *
         * @return int|string|null
         */
        public static function array_key_last($array) {
            $key = NULL;
            if (is_array($array)) {

                end($array);
                $key = key($array);
            }

            return $key;
        }


        /**
         * @param array  $listaEmail Emails de destino
         * @param string $subject
         * @param string $content
         * @param string $nome
         * @param string $email      Email do Remetente
         * @param array  $attachments
         * @param null   $altBody
         * @param bool   $debug
         *
         * @return mixed
         */


        public static function sendEmail($listaEmail, $subject, $content, $nome, $email, $attachments = [], $altBody = NULL, $debug = FALSE) {
            /** @noinspection UntrustedInclusionInspection */
            require_once "/home2/extra_software/mail.php";
            return sendEmail_v2($listaEmail, $subject, $content, $nome, $email, $attachments, $altBody, $debug);
        }


        /**
         * @param array      $array
         * @param string|int $subkey
         * @param bool       $sort_ascending
         *
         * @return array
         */
        public static function sksort($array, $subkey, $sort_ascending = FALSE) {
            $temp_array = [];
            if (count($array)) {
                $temp_array[key($array)] = array_shift($array);
            }

            foreach ($array as $key => $val) {
                $offset = 0;
                $found = FALSE;
                foreach ($temp_array as $tmp_key => $tmp_val) {
                    if (!$found && strtolower($val[$subkey]) > strtolower($tmp_val[$subkey])) {
                        $temp_array = array_merge((array)array_slice($temp_array, 0, $offset), [$key => $val], array_slice($temp_array, $offset));
                        $found = TRUE;
                    }
                    $offset++;
                }
                if (!$found) {
                    $temp_array = array_merge($temp_array, [$key => $val]);
                }
            }
            if ($sort_ascending) {
                return array_reverse($temp_array);
            }
            return $temp_array;
        }


        /**
         * @param $format
         * @param $date
         *
         * @return false|string
         */
        public static function formatDate($format, $date) {
            $returnDate = date($format, strtotime($date));
            return $returnDate;
        }


        /**
         * Valida o input de POST ou GET
         *
         * Valida o input de $tipo[$input], caso a variavel nao esteja declarada ele
         * retorna o valor $padrao, caso a variavel esteja declarada retorna a variavel
         *
         * @param string $input
         * @param string $padrao
         * @param string $tipo
         *
         * @return string
         */
        public static function validaInput($input, $padrao, $tipo = "POST") {
            $texto = $padrao;
            if ($tipo === "POST") {
                if (!isset($_POST[$input]) || trim($_POST[$input]) === "") {
                    $texto = $padrao;
                }
                else {
                    $texto = $_POST[$input];
                }
            }
            if ($tipo === "GET") {
                if (!isset($_GET[$input]) || trim($_GET[$input]) === "") {
                    $texto = $padrao;
                }
                else {
                    $texto = $_GET[$input];
                }
            }
            $texto = strip_tags($texto, "");
            $texto = htmlspecialchars($texto);
            return $texto;
        }

        /**
         *
         */
        public static function validaLogin() {
            if (!isset($_SESSION['login_adm']['id'])) {
                if (!headers_sent()) {
                    header("Location: /nerdpress/login.php?logout=true", TRUE, 302);
                    exit;
                }
                exit('<script language="javascript">window.location.href="/nerdpress/login.php?logout=true";</script>');
            }
        }


        /**
         * @param $socialNetwork
         *
         * @return string
         */
        public static function linksDeCompartilhamento($socialNetwork) {
            $currentUrl = $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["SERVER_NAME"] . $_SERVER['REQUEST_URI'];

            switch ($socialNetwork) {
                case  "facebook" :
                    $link = "https://facebook.com/share.php?u=" . $currentUrl;
                    break;
                case "twitter":
                    $link = "https://twitter.com/intent/tweet?url=" . $currentUrl;
                    break;
                case "linkedin" :
                    $link = "http://www.linkedin.com/shareArticle?mini=true&amp;url=" . $currentUrl;
                    break;
                case "whats" :
                    $link = "https://api.whatsapp.com/send?text=" . $currentUrl;
                    break;
            }
            return $link;
        }


        /**
         * Tenta encontrar o endereco de IP do cliente
         * Retorna 0.0.0.0 caso nao encontra
         *
         * @return string
         */
        public static function getUserIP() {
            if (!isset($_SERVER['REMOTE_ADDR'])) {
                return "0.0.0.0";
            }
        }

        public static function combineOrDie($keys, $values) {
            $arrayCamposValores = array_combine($keys, $values);
            if ($arrayCamposValores === FALSE ) {
                die("Foi Passado um numero errado de campos/valores");
            }
            return $arrayCamposValores;
        }
    }
}
