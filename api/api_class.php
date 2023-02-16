<?php
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of api_class
 *
 * @author Hp
 */
class api_class {

    //put your code here
    public $url; // https://www.hardlinenutrition.com
    public $token;
    public $username; // akademi
    public $key; // gIaFiiLUxRMF8G8ldIlRxv3LJOcBhE6Ju0TeCcSDFzsgz2zNqugobqqjmW13pQoe2s1zwHhs8WcbXqLfSKwfe3J74x0r1wLhvkHmYfvPkdkiqbSOsDAgkNxJOpsIDFfcDCXUARNDODNZTXI1QaMWHwiG1CyjW7yaTDw5wgso3r4B4esByjgNDZMNy2qnXgu4Qe1PQl1jhcEgjs75zSf6bwI4uvzsTzQulIJGQzRCfJVNemazwBsT458tlD7f8OrT
    public $product_id;
    public $quantity;
    public $price;

    public function remove() {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url . '/index.php?route=api/cart/remove&api_token=' . $this->token,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('key' => $this->product_id),
            CURLOPT_HTTPHEADER => array(
                'Cookie: currency=TRY; language=tr-tr'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
//        echo $response;
    }

    public function get_api_token() {

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.baubuddy.de/index.php/login",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\"username\":\"365\", \"password\":\"1\"}",
            CURLOPT_HTTPHEADER => [
                "Authorization: Basic QVBJX0V4cGxvcmVyOjEyMzQ1NmlzQUxhbWVQYXNz",
                "Content-Type: application/json"
            ],
        ]);
//$response = curl_exec($curl);
        $response = curl_exec($curl);

        curl_close($curl);

        $json = json_decode($response);
        //   echo "333333  ". var_dump($response) ."  333333"."<br>";     
        return $json->oauth->access_token;
    }

    public function card_add() {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url . '/index.php?route=api/cart/add&api_token=' . $this->token,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('product_id' => $this->product_id, 'quantity' => $this->quantity
            //   , 'price' => $this->price
            ),
            CURLOPT_HTTPHEADER => array(
                'Cookie: currency=TRY; language=tr-tr'
            ),
        ));

        $response = curl_exec($curl);

//curl_close($curl);
//echo $response;
//
//return $this->url .'/index.php?route=api/cart/add&api_token='. $this->token;
    }

    public function get_datas($token) {

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.baubuddy.de/dev/index.php/v1/tasks/select",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "{\"username\":\"365\", \"password\":\"1\"}",
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer ".$token,
                "Content-Type: application/json"
            ],
        ]);
        $response = curl_exec($curl);
//        $err = curl_error($curl);
        curl_close($curl);
       
        $json = json_decode($response);
//        var_dump($json);
        return $json;
    }

    public function get_products_id_names($prodects) {
        $arrays = array();
        $ids = array();
        $names = array();

        foreach ($prodects->products as $p) {
            array_push($ids, $p->product_id);
            array_push($names, $p->name . " " . $p->price . " TL");
        }
        array_push($arrays, $ids, $names);

        return $arrays;
    }

    public function get_cart_prodects($token) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url . '/index.php?route=api/cart/products/&api_token=' . $token,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Cookie: currency=TRY; language=tr-tr'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $json = json_decode($response);
//var_dump($json);
        return $json;
    }

    public function show_card_popup($card, $href) {
        ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>

                </tr>
            </thead>
            <tbody>




                <?php
                $card->i = 1;
                foreach ($card->products as $p) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $card->i++; ?></th>
                        <th scope="row"><?php echo $p->name; ?></th>
                        <th scope="row"><?php echo $p->price; ?></th>
                        <th scope="row"><a style="color:red" onclick="remove_cart('<?php echo $p->product_id; ?>', '<?php echo $p->cart_id; ?>', '<?php echo $_SESSION["token"]; ?>', 'afterLogin/odeme/remove_cart.php')" href="#"> <span><i class="fa fa-trash-o" aria-hidden="true"></i>
                                </span></a></th>
                    </tr>

                    <?php
                }
                ?>


            </tbody>
        </table>

        <?php
    }

    public function show_card_with_out_login($card, $href) {
        ?>

        <a href="javascript:void(0)" class="<?php "" ?>"><i class="ace-icon fa fa-cart-plus"></i>  <?php
            echo count($card->products);
            ?></a> 
        <ul id="" class="sub-menu my-font">

            <?php
            foreach ($card->products as $p) {
                ?>

                <li>
                    <a href="<?php echo '#'; ?>" class="clearfix">
                        <?php
                        ?>

                        <span class="msg-body">
                            <span class="msg-title">
                                <span class="blue"><?php echo $p->name; ?>:</span>
                                <?php echo $p->name; ?>
                            </span>

                            <span class="msg-time">
                                <i class="ace-icon fa fa-try"></i>
                                <span><?php echo $p->price; ?></span>
                            </span> 
                        </span>
                    </a>

                </li>
                <?php
            }
            if (count($card->products) > 0) {
                ?>
                <li class="dropdown-footer">
                    <a target="_blank" href="<?php echo $href; ?>">
                        Ödeme Yap
                        <i class="ace-icon fa fa-arrow-right"></i>
                    </a>
                </li>
            <?php } ?>
        </ul>

        <?php
    }

    public function show_card($card, $href) {
        ?>

        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
            <i class="ace-icon fa fa-cart-plus icon-animated-vertical"></i>
            <span id="card_num" class="badge badge-warning"><?php
                if ($card->products != null) {
                    echo count($card->products) . "";
                } else {
                    echo '0';
                }
                ?></span>
        </a>

        <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
            <li class="dropdown-header">
                <i class="ace-icon fa fa-cart-plus"></i>
                <?php
                echo count($card->products);
                ?> Ürün
            </li>
            <?php
            foreach ($card->products as $p) {
                ?>
                <li class="dropdown-content">
                    <ul class="dropdown-menu dropdown-navbar">
                        <li>
                            <a href="<?php echo '#'; ?>" class="clearfix">
                                <?php
                                ?>

                                <span class="msg-body">
                                    <span class="msg-title">
                                        <span class="blue"><?php echo $p->name; ?>:</span>
                                        <?php echo $p->name; ?>
                                    </span>

                                    <span class="msg-time">
                                        <i class="ace-icon fa fa-try"></i>
                                        <span><?php echo $p->price; ?></span>
                                    </span>
                                </span>
                            </a>
                        </li>

                    </ul>
                </li>
                <?php
            }
            ?>
            <li class="dropdown-footer">
                <a target="_blank" href="<?php echo $href; ?>">
                    Ödeme Yap
                    <i class="ace-icon fa fa-arrow-right"></i>
                </a>
            </li>
        </ul>

        <?php
    }

    public function post_customer_data($token, $firstname, $lastname, $email
            , $telephone) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url . '/index.php?route=api/customer&api_token=' . $token,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('customer_id' => '0', 'firstname' => $firstname, 'lastname' => $lastname, 'email' => $email, 'telephone' => $telephone, 'customer_group_id' => '5'),
            CURLOPT_HTTPHEADER => array(
                'Cookie: currency=TRY; language=tr-tr'
            ),
        ));

        $response = curl_exec($curl);
//
//curl_close($curl);
//echo $response;
    }

}
