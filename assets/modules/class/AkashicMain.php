<?php

include_once '../../lib/apis/mercadopago/vendor/autoload.php';

class AkashicMain
{

    /**
     * Registra Informações no banco de dados!
     * 
     * @param string $tableName você deve informar o nome da tabela
     * @param string $colums você deverá definir as colunas onde as informações serão Enviadas!
     * @param string $values você deverá definir os valores a ser Enviados!
     */
    public function sendData($tableName, $colums, $values)
    {
        $bridge = $this->bridgeToDataBase();
        $stmt = $bridge->prepare("INSERT INTO $tableName ($colums) VALUES ($values)") or die("Erro");
        return $stmt->execute();
    }

    private function bridgeToDataBase()
    {
        $mysqli = new mysqli('31.170.167.25', 'u790604256_akashic', 'Enstone@2020', 'u790604256_db_server_game');
        if (mysqli_connect_error()) {
            printf(
                'Could not connect to AuthMe database. Errno: %d, error: "%s"',
                mysqli_connect_errno(),
                mysqli_connect_error()
            );
            return null;
        }
        return $mysqli;
    }

    public function dateFormat()
    {
        date_default_timezone_set('america/sao_paulo');
        $dateZone = date('d/m/Y H:i:s');
        $timeDate = array(
            $dateZone,
            substr($dateZone, 0, 2),
            substr($dateZone, 3, 2),
            substr($dateZone, 6, 4),
            substr($dateZone, 11, 2),
            substr($dateZone, 14, 2),
            substr($dateZone, 17, 2),
        );
        return $timeDate;
    }

    public function responseJson($array)
    {
        header("Content-type: application/json; charset=utf-8");
        $response = $array;
        http_response_code(200);
        return json_encode($response);
    }

    public function cupomVerify($cupom)
    {
        $bridge = $this->bridgeToDataBase();
        $stmt = $bridge->query("SELECT * FROM `cupom` WHERE `cupom` = '$cupom' AND valid = 1");
        $bind = $stmt->fetch_assoc();
        if ($stmt->num_rows >= 1) {
            $resp = $this->responseJson(array(
                "valid" => true,
                "discount" => $bind['discount']
            ));
        } else {
            $resp = $this->responseJson(array(
                "valid" => false
            ));
        }
        return $resp;
    }

    public function addItemCart($element)
    {
        $append = false;
        if (count($_SESSION['CartItems']) <= 0) {
            $foo = array_push($_SESSION['CartItems'], $element);
            return array(
                "Sucessful" => true,
                "Message" => "item add $foo"
            );
        } else {
            foreach (array_keys($_SESSION['CartItems']) as $key) {
                if ($_SESSION['CartItems'][$key]['ItemID'] == $element['ItemID']) {
                    $append = true;
                }
            }
            if (!$append) {
                $foo = array_push($_SESSION['CartItems'], $element);
                return array(
                    "Sucessful" => true,
                    "Message" => "item add $foo"
                );
            } else {
                return array(
                    "Sucessful" => false,
                    "Message" => "already exist"
                );
            }
        }
    }

    public function removeItemCart($itemCart)
    {
        return session_unset($itemCart);
    }

    public function mercadoPago($title, $quantity, $price, $description, $infoType, $username)
    {
        MercadoPago\SDK::setAccessToken('APP_USR-5775462616287637-072114-206d6e457a5233ede9336f21ebdfb469-246758338');
        $preference = new MercadoPago\Preference();
        // Cria um item na preferência
        $item = new MercadoPago\Item();
        $item->title = $title;
        $item->quantity = $quantity;
        $item->unit_price = $price;
        $item->description = $description;
        $item->category_id = $infoType;
        $preference->items = array($item);
        $preference->external_reference = $username;
        $preference->back_urls = array(
            "success" => "https://forbiddenseries.net/",
            "failure" => "https://forbiddenseries.net/",
            "pending" => "https://forbiddenseries.net/"
        );
        $preference->payment_methods = array(
            "installments" => 1
        );
        $preference->additional_info = $username;
        $preference->notification_url = 'https://forbiddenseries.net/assets/modules/module_httpost_notification.php';
        $preference->save();

        return $this->responseJson(array(
            "init" => $preference->init_point
        ));
    }
}
