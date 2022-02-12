<?php
$this->shortcodes = [];
function userget()
{
    $ci = &get_instance();
    return $ci->session->userdata("user_data");
}
//views backend
function template_backpath($file = "")
{
    $CI = &get_instance();
    if ($file != "") {
        return "backend/" . $CI->config->item("back_template") . "/" . $file;
    } else {
        return "backend/" .
            $CI->config->item("back_template") .
            "/template/body";
    }
}
//assets backend
function template_backpath_assets()
{
    $CI = &get_instance();
    return base_url("assets/backend/" . $CI->config->item("back_template")) .
        "/";
}

//views frontend
function template_frontpath($file = "")
{
    $CI = &get_instance();
    return "frontend/" . $CI->config->item("front_template") . "/" . $file;
}
//assets frontend
function template_frontpath_assets()
{
    $CI = &get_instance();
    return base_url("assets/front/" . $CI->config->item("front_template")) .
        "/";
}
function site_name()
{
    $CI = &get_instance();

    if ($CI->config->item("site_name")) {
        return $CI->config->item("site_name");
    }

    return "";
}
function message($type = "success", $msj = "")
{
    $ci = &get_instance();
    $alert["type"] = $type;
    $alert["message"] = $msj;
    $ci->session->set_flashdata("sys_alert", $alert);
}
function show_message()
{
    $ci = &get_instance();

    if (!$ci->session->flashdata("sys_alert")) {
        return;
    }

    $alert = $ci->session->flashdata("sys_alert");
    $type = $alert["type"];
    $msj = $alert["message"];
    $html = "";
    switch ($type) {
        case "success":
            $html =
                '<div class="alert alert-success auto-show">
  <span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;&nbsp;' .
                $msj .
                '
</div>';
            break;
        case "error":
            $html =
                '<div class="alert alert-danger auto-show">
<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;&nbsp;' .
                $msj .
                '
</div>';
            break;
        case "info":
            $html =
                '<div class="alert alert-info auto-show">
<span class="glyphicon glyphicon-info-sign"></span>&nbsp;&nbsp;&nbsp;' .
                $msj .
                '
</div>';
            break;
        default:
            break;
    }
    $ci->session->set_flashdata("sys_alert", null);
    echo $html;
}
function getext($path)
{
    return strtolower(pathinfo($path, PATHINFO_EXTENSION));
}
function Paginate($ArrayList, $page, $numrows, &$total)
{
    $total = count($ArrayList);
    $total = ceil($total / $numrows);
    $tmpList = [];
    $li = ($page - 1) * $numrows;
    $ls = $li + $numrows;
    $tmpList = array_slice($ArrayList, $li, $ls);
    /* foreach($ArrayList as $i=> $item){
    if($i>=$li && $i<$ls){
      $tmpList[]=$item;
    }
  }*/
    unset($ArrayList);
    return $tmpList;
}
function module_get($unicode, $render = false)
{
    $CI = &get_instance();
    $pub = $CI->sysmodel->publication_get_slug($unicode);
    if ($render && $pub != false) {
        echo $pub->content;
    }
    return $pub;
}
function menu_get($unicode, $render = false)
{
    $CI = &get_instance();
    $menu = $CI->sysmodel->menu_get_by_slug($unicode);
    if ($render && $menu != false) {
        echo "<ul>";
        foreach ($menu as $i => $item):
            echo '<li><a href="' .
                base_url($item->url) .
                '">' .
                $item->label .
                "</a></li>";
        endforeach;
        echo "</ul>";
    }
    return $menu;
}
function render_shorcodes($html)
{
    $CI = &get_instance();
    $CI->load->helper("shortcodes_helper");

    $shortcodes = $CI->config->item("shortcodes");

    foreach ($shortcodes as $i => $item):
        $html = str_replace("[" . $i . "]", $item(), $html);
        $array = [];
        preg_match_all("/\[" . $i . " ([^<]*)\]/i", $html, $matches);

        $matches = $matches[1];

        foreach ($matches as $ii => $var):
            preg_match_all(
                '/(?P<variable>\w+)=\"(?P<value>([a-zA-Z0-9])+([a-zA-Z0-9\._-])+)\"/',
                $var,
                $output_array
            );
            $variables = $output_array["variable"];
            $values = $output_array["value"];

            preg_match_all(
                '/(?P<variable>\w+)=\"(?P<value>\d+)\"/',
                $var,
                $output_array
            );
            $variables2 = $output_array["variable"];
            $values2 = $output_array["value"];

            $variables = array_merge($variables, $variables2);
            $values = array_merge($values, $values2);

            $parameters = [];

            foreach ($variables as $j => $var):
                $parameters[$var] = $values[$j];
            endforeach;

            $replace = $item($parameters);
            $html = preg_replace("/\[" . $i . " ([^<]*)\]/", $replace, $html);
        endforeach;
    endforeach;

    return $html;
}
function shortcode_variables($var, $value)
{
    return [$var => $value];
}

function add_shortcode($function, $invocation)
{
    $CI = &get_instance();
    $shortcodes = $CI->config->item("shortcodes");
    $shortcodes[$invocation] = $function;
    $CI->config->set_item("shortcodes", $shortcodes);
}
function validate_email($EMAIL)
{
    $v =
        '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

    return (bool) preg_match($v, $EMAIL);
}
/*function send_mail($mail,$subject,$html,$hiddens=""){
   $CI =& get_instance();
         $config = Array(
                'protocol' => PROTOCOL,
                'smtp_host' => SMTP_HOST,
                'smtp_port' => SMTP_PORT,//587  25
                'smtp_user' => SMTP_USER,
                'smtp_pass' => SMTP_PASS,
                'mailtype'  => 'html',
                'charset'   =>  'utf-8',
                'validate'=> true
                );
        $CI->load->library('email', $config);
        $CI->email->set_newline("\r\n");
        $CI->email->from('info@bancohipotecario.com',"Banco Hipotecario");
        $CI->email->to($mail);

        if($hiddens!="")
          $CI->email->bcc($hiddens);
        
        $CI->email->subject($subject);
        $CI->email->message($html);
        $CI->email->send();
  }*/

function send_mail($data, $email)
{
    $CI = &get_instance();

    $CI->load->library("email");
    $config["protocol"] = "smtp";
    $config["smtp_host"] = "smtp.hostinger.com";
    $config["smtp_user"] = "noreplay@wannnafarm.com";
    $config["smtp_pass"] = "Kuto@houdini21";
    $config["smtp_port"] = "587";
    $config["charset"] = "utf-8";
    $config["wordwrap"] = true;
    $config["validate"] = true;

    $CI->email->initialize($config);
    $CI->email->from("noreplay@wannnafarm.com", "Wannafarm");
    $CI->email->to($email);
    $CI->email->message($data);
    if ($CI->email->send()) {
        return 201;
    } else {
        echo $CI->email->print_debugger();
        return 500;
    }
}

function clear_str($str)
{
    return addslashes(strip_tags(trim($str)));
}
function getIP()
{
    $ip = isset($_SERVER["HTTP_CLIENT_IP"])
        ? $_SERVER["HTTP_CLIENT_IP"]
        : (isset($_SERVER["HTTP_X_FORWARDED_FOR"])
            ? $_SERVER["HTTP_X_FORWARDED_FOR"]
            : $_SERVER["REMOTE_ADDR"]);

    return $ip;
}
function plantilla_aplicar($html, $parametros = [])
{
    $html = explode("{{", $html);
    $html = array_map(function ($item) use ($parametros) {
        $key = substr($item, 0, strpos($item, "}}"));
        $replace = isset($parametros[$key]) ? $parametros[$key] : "";
        return str_replace($key . "}}", $replace, $item);
    }, $html);
    $html = implode("", $html);
    return $html;
}
function encode($value, $key = "n3v3r/w3nt/t0/c0ll3g3")
{
    $key = sha1($key);
    if (!$value) {
        return false;
    }
    $strLen = strlen($value);
    $keyLen = strlen($key);
    $j = 0;
    $crypttext = "";
    for ($i = 0; $i < $strLen; $i++) {
        $ordStr = ord(substr($value, $i, 1));
        if ($j == $keyLen) {
            $j = 0;
        }
        $ordKey = ord(substr($key, $j, 1));
        $j++;
        $crypttext .= strrev(base_convert(dechex($ordStr + $ordKey), 16, 36));
    }
    return base64_encode($crypttext);
}
function decode($value, $key = "n3v3r/w3nt/t0/c0ll3g3")
{
    if (!$value) {
        return false;
    }
    $value = base64_decode($value);
    $key = sha1($key);
    $strLen = strlen($value);
    $keyLen = strlen($key);
    $j = 0;
    $decrypttext = "";
    for ($i = 0; $i < $strLen; $i += 2) {
        $ordStr = hexdec(base_convert(strrev(substr($value, $i, 2)), 36, 16));
        if ($j == $keyLen) {
            $j = 0;
        }
        $ordKey = ord(substr($key, $j, 1));
        $j++;
        $decrypttext .= chr($ordStr - $ordKey);
    }

    return $decrypttext;
}
function ExcelExport_($headers, $matrix, $namefile = "export")
{
    $CI = &get_instance();
    $CI->load->library("PHPExcel");
    $objPHPExcel = new PHPExcel();
    //$objPHPExcel->getActiveSheet()->setTitle('Ho');
    $i = 0;
    $j = 0;
    foreach ($headers as $i => $row) {
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($i, 1, $row);
        $objPHPExcel
            ->getActiveSheet()
            ->getColumnDimensionByColumn($i)
            ->setAutoSize(true);
        $objPHPExcel
            ->getActiveSheet()
            ->getStyleByColumnAndRow($i, 1)
            ->getFont()
            ->setBold(true);
        $j++;
    }

    foreach ($matrix as $i => $row) {
        $j = 0;
        $i = $i + 1;
        foreach ($row as $cell) {
            $objPHPExcel
                ->getActiveSheet()
                ->setCellValueByColumnAndRow($j, $i + 1, $cell);
            //$objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(($j),($i+1))->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
            $j++;
        }
    }

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel5");

    header("Content-Type: application/vnd.ms-excel");
    header('Content-Disposition: attachment;filename="' . $namefile . '.xls"');
    header("Cache-Control: max-age=0");
    //ob_end_clean();
    $objWriter->save("php://output");
    exit();
}
function ExcelExport($headers, $matrix, $namefile = "export")
{
    $CI = &get_instance();
    $CI->load->library("PHPSpreadsheet");
    $objPHPExcel = new PHPSpreadsheet();

    $objPHPExcel->export($headers, $matrix, $namefile);
}

function createToken($data)
{
    $data["timestamp"] = date("Y-m-d H:i:s");
    $code = encode(json_encode($data));
    return $code;
}

function decryptToken($token)
{
    $encrypt = json_decode(decode($token));
    $minutes =
        (strtotime(date("Y-m-d H:i:s")) - strtotime($encrypt->timestamp)) / 60;
    $minutes = abs($minutes);
    $minutes = floor($minutes);

    if ($minutes > 60) {
        $message["message"] = "token invalido";
        $message["status"] = 401;
        return $message;
    }

    $message["message"] = "token valido";
    $message["data"] = $encrypt;
    $message["status"] = 200;
    return $message;
}

function is_logged_in()
{
    // Get current CodeIgniter instance
    $CI = &get_instance();
    // We need to use $CI->session instead of $this->session
    $user = $CI->session->userdata("user_data");
    if (!isset($user)) {
        redirect("login");
    }
}

function is_logged()
{
    // Get current CodeIgniter instance
    $CI = &get_instance();
    // We need to use $CI->session instead of $this->session
    $user = $CI->session->userdata("user_data");
    if (isset($user) && $user != '' && $user != null) {
        if ($user->id_role == 1) {
            //redirect to user
            redirect(base_url() . 'users');
          }
          if ($user->id_role == 2) {
            //redirect to admin
            redirect(base_url() . 'admin');
          }
          if ($user->id_role == 3) {
            //redirect to jinx
            redirect(base_url() . 'jinx');
          }
    }
}

function get_metadata()
{
    $CI = &get_instance();
    $user = $CI->session->userdata("user_data");
    return $user;
}

?>
