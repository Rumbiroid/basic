<?php

namespace app\components;

class core

{


// url xml-интерфейсов
private $xml_api = array("goods_info" => "http://shop.digiseller.ru/xml/shop_product_info.asp",
"responses" => "http://shop.digiseller.ru/xml/shop_reviews.asp",
"goods_group" => "http://shop.digiseller.ru/xml/shop_categories.asp",
"goods_list" => "http://shop.digiseller.ru/xml/shop_products.asp",
"search" => "http://shop.digiseller.ru/xml/shop_search.asp",
"check_code" => "http://shop.digiseller.ru/xml/check_unique_code.asp",
"agent_req_num" => "http://shop.digiseller.ru/xml/agent_get.asp",
"agent_check" => "http://shop.digiseller.ru/xml/agent_check.asp",
"products_form" => "http://shop.digiseller.ru/xml/products_forms.asp",
"last_sale" => "http://shop.digiseller.ru/xml/last_sale.asp");
// функция получения ответа от xml-интерфейса
private function request($act,$req){
// Инициализируем сеанс CURL
$ch = curl_init($act);
// В выводе CURL http-заголовки не нужны
curl_setopt($ch,CURLOPT_HEADER,0);
// Возвращать результат, а не выводить его в браузер
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
// Метод http-запроса - POST
curl_setopt($ch,CURLOPT_POST,1);
// Что передаем?
curl_setopt($ch,CURLOPT_POSTFIELDS, $req);
// Выполняем запрос, ответ помещаем в переменную $result;
$result = @curl_exec($ch);
if(curl_errno($ch))  echo "<!-- Curl Error number = ".curl_errno($ch).", Error desc = ".curl_error($ch)." -->";
curl_close($ch);
return $result;}
function parse_xml($xml){
$result = simplexml_load_string($xml,"SimpleXMLElement",LIBXML_NOCDATA);
if(!$result){
return "<p><span class=\"warning\">".$GLOBALS["mess"]["service_disable"]."</span></p>";}
else{
return $result;}}
private function clear($text,$tmp){
$text = preg_replace("/".$tmp."/","",$text);
return $text;}

// получение групп товаров
function goods_group($id_seller){
$id_seller = $this -> clear($id_seller,"[^0-9]");
$request = "<digiseller.request><seller><id>".$id_seller."</id></seller></digiseller.request>";
$answer = $this -> request($this -> xml_api["goods_group"],$request);
return $answer;}


// получение товаров из списка
function goods_list($id_seller,$id_group,$page,$rows,$currency,$order){
$id_seller = $this -> clear($id_seller,"[^0-9]");
$id_group = $this -> clear($id_group,"[^0-9]");
$page = $this -> clear($page,"[^0-9]");
$rows = $this -> clear($rows,"[^0-9]");
$currency = $this -> clear($currency,"[^A-Z]");
$order = $this -> clear($order,"[^a-zA-Z]");
$request = "<digiseller.request><category><id>".$id_group."</id></category><seller><id>".$id_seller."</id></seller><pages><num>".$page."</num><rows>".$rows."</rows></pages><products><order>".$order."</order><currency>".$currency."</currency></products></digiseller.request>";
$answer = $this -> request($this -> xml_api["goods_list"],$request);
return $answer;}

// получение информации о товаре
    function goods_info($id_goods){
        $id_goods = $this -> clear($id_goods,"[^0-9]");
        $request = "<digiseller.request><product><id>".$id_goods."</id></product></digiseller.request>";
        $answer = $this -> request($this -> xml_api["goods_info"],$request);
        return $answer;}
// получение результатов поиска товаров
    function search($id_seller,$search_str,$page,$rows,$currency){
        $id_seller = $this -> clear($id_seller,"[^0-9]");
        $page = $this -> clear($page,"[^0-9]");
        $rows = $this -> clear($rows,"[^0-9]");
        $currency = $this -> clear($currency,"[^A-Z]");
        $request = "<digiseller.request><seller><id>".$id_seller."</id></seller><products><search>".$search_str."</search><currency>".$currency."</currency></products><pages><num>".$page."</num><rows>".$rows."</rows></pages></digiseller.request>";
        $answer = $this -> request($this -> xml_api["search"],$request);
        return $answer;}


}	