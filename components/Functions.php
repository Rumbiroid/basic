<?php

//namespace yii\bootstrap;
namespace app\components;
$GLOBALS["obj"] = new Core;
$GLOBALS["seller_id"] = 714194;
//$_REQUEST["page"] = 1;
$GLOBALS["curr_name"] = "RUR";
$GLOBALS["goods_count"] = 10;
$GLOBALS["count_page"] = 10;
use Yii;
use yii\helpers\Url;
class functions

{

public static function get_current_page(){
    if(isset($_REQUEST["page"]) && !empty($_REQUEST["page"])){
    $_REQUEST["page"] = preg_replace("/[^0-9]/","",$_REQUEST["page"]);
    if(empty($_REQUEST["page"])){
    $_REQUEST["page"] = 1;}}
    else{$_REQUEST["page"] = 1;}}

/*------------------------------страница магазина--------------------------------------------------*/
public  static function show_content(){
        $result = "";

    // определение ID группы товаров
    if(isset($_GET["category_id"]) && !empty($_GET["category_id"])){
        $_GET["category_id"] = abs((int)$_GET["category_id"]);
        if(!empty($_GET["category_id"])){
            $answer = $GLOBALS["obj"] -> parse_xml($GLOBALS["obj"] -> goods_list($GLOBALS["seller_id"],$_GET["category_id"],$_REQUEST["page"],10,"RUR","name"));}
        else {$answer = $GLOBALS["obj"] -> parse_xml($GLOBALS["obj"] -> goods_list($GLOBALS["seller_id"],0,$_REQUEST["page"],$GLOBALS["goods_count"],$GLOBALS["curr_name"],$GLOBALS["order"]));}}

        else{$answer = $GLOBALS["obj"] -> parse_xml($GLOBALS["obj"] -> goods_list($GLOBALS["seller_id"],0,$_REQUEST["page"],10,"RUR","icon"));}
        $result .= "\n<ul class=\"listProducts\">\n";

		if(isset($_GET["sales"]) && !empty($_GET["sales"])) {
		switch ($_GET["sales"]) {
			case "new":$result = functions::show_new_product();
			break;
			case "sale":$result = functions::show_sale_product();
			break;
			case "hit":$result = functions::show_hit_product();
			break;
		default: $result = '';}}

		else {
                foreach($answer -> products -> product as $product){
                    //$img = "<img src=\"http://graph.digiseller.ru/img.ashx?id_d=".$product -> id."&amp;\" width=\"221\" height=\"260\" alt=\"\" />\n";
                    $img = "<img src=\"http://graph.digiseller.ru/img.ashx?id_d=".$product -> id."\">\n";

                    switch($product["icon"]){
                        case "new":
                            $lb_name = " new";
                            $vitrina_icon = "Новинка";
                            break;

                        case "sale":
                            $lb_name = " sale";
                            $vitrina_icon = "Акция";
                            break;

                        case "top":
                            $lb_name = " hit";
                            $vitrina_icon = "Хит";
                            break;

                        default:
                            $lb_name = "";
                            $vitrina_icon = "&nbsp;";}
                $result .= "
                    <div class='product'>
                    <p>".$product -> name."</p>
                    $img
                    <span class='shop-label$lb_name'>$vitrina_icon</span>
                    <span class='price'>".$product -> price." &#8381 </span>
                    <span class='buy'><a class=\"btn btn-sm btn-success\" href=\"./item?id=".$product -> id."\">Подробнее</a><span>
                    </div>\n";}
            $result .= "</ul>\n";
            if((int)($answer -> pages["cnt"]) > 1){
                $result .= "<div class = \"pagi_div\"><div class=\"pagination modal-1\">\n";
                $cp = (int)($answer -> pages -> num);
                $ap = (int)($answer -> pages["cnt"]);
                $url = "type=".$GLOBALS["count_page"];
                $result .= functions::show_num_pages($cp,$ap,$GLOBALS["count_page"],$url,"./");
                $result .= "</div></div>\n";}

		}
    



return $result;}
/*------------------------------товар по айди страница с товаром----------------------------------------------*/
public static function show_content_id(){
        $result = "";
        $_GET["id"] = abs((int)$_GET["id"]);
        $answer = $GLOBALS["obj"] -> parse_xml($GLOBALS["obj"] -> goods_info($_GET["id"]));
        $product = $answer -> product;
        $result .= "<h1 class=\"name\">".$product -> name."</h1>
                    <img src=\"http://graph.digiseller.ru/img.ashx?id_d=".$answer -> product -> id."&amp;\" width=\"221\" height=\"260\" alt=\"\">
                    <h1 class=\"price\">".$answer -> product -> prices -> wmr." "." &#8381"."</h1>
                    <p><a class=\"btn btn-sm btn-success\" href=\"https://www.oplata.info/asp/pay_x20.asp?id_d=".$product -> id."&amp;\" class=\"buy\">Купить</a></p>
					";

        $result .= "<div class=\"digiseller-prod-info\"><p>".nl2br($answer -> product -> info)."</p> ";
return $result;}
/*------------------------------дерево категорий--------------------------------------------------*/
public  static function get_tree($cat){
        //if(isset($_GET["category_id"]) && !empty($_GET["category_id"])){
           // $category_id = abs((int)$_GET["category_id"]);
        //    if(!$category_id){
          //      $category_id = 0;}
        //}
        //else{$category_id = 0;}
        $tree = "";
        foreach($cat as $category){
            //if(isset($_GET["category_id"]) and $category -> id == $_GET["category_id"]){
              //  $html_class_name = " class=\"digiseller-category-active\"";}
            //else{
              //  $html_class_name = "";}
//$category_url = "http://".$_SERVER["HTTP_HOST"].dirname($_SERVER["PHP_SELF"])."/listing.php?category_id=".$category -> id;
$category_url = "./shop?category_id=".$category -> id;

$tree .= "<li>
            <h4><a class = \"cat icon-target\" href=\"$category_url\" title=\"\" \">".$category -> name." </a></h4>
            </li>";}
                return $tree;}
//                 <span>(".$category["cnt"].")</span>

/*------------------------------дерево категорий--------------------------------------------------*/
public static function show_goods_group($status = true){
        $result ="";
        if($status === true){
            $answer = $GLOBALS["obj"] -> parse_xml($GLOBALS["obj"] -> goods_group($GLOBALS["seller_id"]));
            $cat = $answer -> categories -> category;
// вывод ID групп товаров
            $result .= "
                <style>li {list-style-type: none;}</style>
                <li><h4><a class = \"cat icon-gamepad\"  href=\"?category_id=0\">Все игры</a></h4></li>
                <li><h4><a class = \"cat icon-percent\" href=\"?sales=sale\">Скидки</a></h4></li>
                <li><h4><a class = \"cat icon-star\" href=\"?sales=new\">Новинки</a></h4></li>
                <li><h4><a class = \"cat icon-diamond\" href=\"?sales=hit\">Хиты</a></h4></li>
                \n".functions::get_tree($cat)."\r\n";}
        else {echo "&nbsp;";}
return $result;}
/*-------------------------------------------------------------------------------------------------*/
public  static function get_category_name($cat){
        $result = "";
        while($cat){
            if(isset($_GET["category_id"])){
                if((int)$cat -> id == $_GET["category_id"]){
                    $result .= "<h1>".$cat -> name."</h1>";}}
            else{$result .= "<h1>".$cat -> name."</h1>\n";}
            $cat = $cat -> category;
            //get_name_categories($cat);
        }
return $result;}
/*------------------------------результаты поиска--------------------------------------------------*/
public static function show_content_sr(){
        $result = "";
        $req_str = "";
        foreach ($_GET['SearchForm'] as $key => $value){}
        $q = $value;
        $_GET["q"] = $value;

        if(!empty($_GET["q"])){
            $q = trim(strip_tags($_GET["q"]));}

        if(isset($q)){
            if(empty($q)){
                $result .= "<div class=\"search-results\">
		                    <h4>Строка поиска не задана</h4>
	                        </div>\n";}
            elseif(strlen($_GET["q"]) < 3){
                $result .= "<div class=\"search-results\">
		                    <h4>Строка поиска менее 3 символов</h4>
	                        </div>\n";}
            else{
                $answer = $GLOBALS["obj"] -> search($GLOBALS["seller_id"],$q,$_REQUEST["page"],$GLOBALS["goods_count"],$GLOBALS["curr_name"]);
                $answer = $GLOBALS["obj"] -> parse_xml($answer);
                if($answer -> retval != 0){
                    $result .= "<div class=\"search-results\">
			                    <span class=\"digiseller-nothing-found\">Ошибка: ".$answer -> retdesc."</span>
		                        </div>\n";}
                else{
                    // страниц - 0
                    if((int)$answer -> pages["cnt"] == 0){
                        $result .= "<div class =\"search-results\">
			                        <h4>Ничего не найдено</h4>
			                        <p><a class=\"btn btn-default\" href=\"./contact?subject=Заказать_игру\">Заказать игру?</a></p>
			                        </div>\n";}
                    elseif($_REQUEST["page"] <= (int)($answer -> pages["cnt"])){
                        $req_str .= "<div class='search-results' style='padding: 10px'><h4>По запросу&nbsp;&quot;$q&quot;&nbsp;найдено товаров:&nbsp;".$answer -> products["cnt"]."\n</h4></div>";
                        foreach($answer -> products -> product as $product){
                            if(!empty($product -> snippets -> info)){
                            $product_info = str_replace(array("\n", "[[!b!]]", "[[!/b!]]"), array("<br />", "<strong>", "</strong>"),$product -> snippets -> info);}
                            else{$product_info = "";}
                            $img = "<img src=\"http://graph.digiseller.ru/img.ashx?id_d=".$product -> id."&amp;\" width=\"221\" height=\"260\" alt=\"\" />\n";
                            $result .= "
                                        <div class='product'>
                                        <p>".$product -> name."</p>
                                        $img
                                        <span class='price'>".$product -> price." "." &#8381"."</span>
                                        <span class='buy'><a class=\"btn btn-sm btn-success\" href=\"./item?id=".$product -> id."\" class=\"buy\">Подробнее</a><span>
                                        </div>\n";}}}}}
        echo $req_str;
        return $result;
}
/*------------------------------новинки виджет--------------------------------------------------*/
public static function show_new_product_w(){
        $result = "";
        $answer = $GLOBALS["obj"] -> parse_xml($GLOBALS["obj"] -> goods_list($GLOBALS["seller_id"],0,1,100,"RUR","name"));
		foreach($answer -> products -> product as $product){
            $img = "<img src=\"http://graph.digiseller.ru/img.ashx?id_d=".$product -> id."&amp;\" width=\"221\" height=\"260\" alt=\"\" />\n";
            //$curr_name = $answer -> products -> currency;
            if (!empty($product -> attributes()-> icon)){
                //if ($product -> attributes()-> icon = "new"){
            if ($product["icon"] == "new") {
            $result .= "
                    <a href=\"./item?id=".$product -> id."\">
                        <div class='slide'>
                            
                            $img
                            <span class='price'>".$product -> price." &#8381</span>                  
                        </div>
                    </a>
                    \n";}
            }}
        return $result;
}
/*------------------------------количество--------------------------------------------------*/
public  static function show_content_cnt(){

        $answer = $GLOBALS["obj"] -> parse_xml($GLOBALS["obj"] -> goods_list($GLOBALS["seller_id"],0,1,100,"RUR","name"));

        $result = $answer -> products-> attributes();
        foreach ($result as $key => $value){}
        $result = $value;
        return $result;}
/*------------------------------страницы--------------------------------------------------*/
public static function show_num_pages($current_page, $all_pages, $count_page, $add_url, $url_page){
        $result = "";
        $url1 = Url::canonical();
        if($current_page - $count_page > 0){
            $result .= "<a href=\"".$url_page."?".$add_url."\" title=\"1\">1</a>\n";}

        for($i = ($current_page - $count_page); $i <= ($current_page + $count_page); $i++){
            if($i > 0 && $i <= $all_pages){
                if($i == ($current_page - $count_page)){
                    $result .= "<span>...</span>\n";}
                elseif($i == ($current_page + $count_page)){
                    $result .= "<span>...</span>\n";}
                elseif($i == $current_page){
                    $result .= "<a href=\"#\" class=\"digiseller-activepage\">".$i."</a>\n";}
                else{
                    $result .= "<a href=\"".$url1."?page=".$i."\" title=\"".$i."\">".$i."</a>\n";}}}

            if($current_page + $count_page <= $all_pages){
            $result .= "<a href=\"".$url1."?page=".$all_pages."\" title=\"$all_pages\">$all_pages</a>\n";}
        return $result;}
/*-------------------------------------------------------------------------------------*/		
public static function show_content_id_name(){
        $result = "";
        $_GET["id"] = abs((int)$_GET["id"]);
        $answer = $GLOBALS["obj"] -> parse_xml($GLOBALS["obj"] -> goods_info($_GET["id"]));
        $product = $answer -> product;
        $result .= "".$product -> name."";
return $result;}

    /*----------------для магазина новинки----------------------*/
    public static function show_new_product(){
        $result = "";
        $answer = $GLOBALS["obj"] -> parse_xml($GLOBALS["obj"] -> goods_list($GLOBALS["seller_id"],0,1,100,"RUR","name"));
        foreach($answer -> products -> product as $product){
            $img = "<img src=\"http://graph.digiseller.ru/img.ashx?id_d=".$product -> id."&amp;\" width=\"221\" height=\"260\" alt=\"\" />\n";
            if (!empty($product -> attributes()-> icon)){
                //if ($product -> attributes()-> icon = "new"){
                if ($product["icon"] == "new") {
                    $result .= "
                    <div class='product'>
                    <p>".$product -> name."</p>
                    $img
                    <span class='price'>".$product -> price." &#8381</span>
                    <span class='buy'><a class=\"btn btn-sm btn-success\" href=\"./item?id=".$product -> id."\">Подробнее</a><span> 
                    </div> \n";}
            }}
        return $result;
    }
    /*----------------для магазина скидки----------------------*/
    public static function show_sale_product(){
        $result = "";
        $answer = $GLOBALS["obj"] -> parse_xml($GLOBALS["obj"] -> goods_list($GLOBALS["seller_id"],0,1,100,"RUR","name"));
        foreach($answer -> products -> product as $product){
            $img = "<img src=\"http://graph.digiseller.ru/img.ashx?id_d=".$product -> id."&amp;\" width=\"221\" height=\"260\" alt=\"\" />\n";

            if (!empty($product -> attributes()-> icon)){
                //if ($product -> attributes()-> icon = "new"){
                if ($product["icon"] == "sale") {
                    $result .= "
                    <div class='product'>
                    <p>".$product -> name."</p>
                    $img
                    <span class='price'>".$product -> price." &#8381</span>
                    <span class='buy'><a class=\"btn btn-sm btn-success\" href=\"./item?id=".$product -> id."\">Подробнее</a><span> 
                    </div> \n";}
            }}
        return $result;
    }
    /*----------------для магазина хиты----------------------*/
    public static function show_hit_product(){
        $result = "";
        $answer = $GLOBALS["obj"] -> parse_xml($GLOBALS["obj"] -> goods_list($GLOBALS["seller_id"],0,1,100,"RUR","name"));
        foreach($answer -> products -> product as $product){
            $img = "<img src=\"http://graph.digiseller.ru/img.ashx?id_d=".$product -> id."&amp;\" width=\"221\" height=\"260\" alt=\"\" />\n";

            if (!empty($product -> attributes()-> icon)){
                //if ($product -> attributes()-> icon = "new"){
                if ($product["icon"] == "top") {
                    $result .= "
                    <div class='product'>
                    <p>".$product -> name."</p>
                    $img
                    <span class='price'>".$product -> price." &#8381</span>
                    <span class='buy'><a class=\"btn btn-sm btn-success\" href=\"./item?id=".$product -> id."\">Подробнее</a><span> 
                    </div> \n";}
            }}
        if((int)($answer -> pages["cnt"]) > 1){
            $result .= "<div class = \"pagi_div\"><div class=\"pagination modal-1\">\n";
            $cp = (int)($answer -> pages -> num);
            $ap = (int)($answer -> pages["cnt"]);
            $url = "type=".$GLOBALS["count_page"];
            $result .= functions::show_num_pages($cp,$ap,$GLOBALS["count_page"],$url,"./");
            $result .= "</div></div>\n";}
        return $result;
    }
    
        public static function test(){
        $result = "";
        $answer = $GLOBALS["obj"] -> parse_xml($GLOBALS["obj"] -> goods_list($GLOBALS["seller_id"],0,1,100,"RUR","name"));
        foreach($answer -> products -> product as $product){
            $img = "<img src=\"http://graph.digiseller.ru/img.ashx?id_d=".$product -> id."&amp;\" width=\"221\" height=\"260\" alt=\"\" />\n";
/*
            if (!empty($product -> attributes()-> icon)){
                //if ($product -> attributes()-> icon = "new"){
                if ($product["icon"] == "sale") {
                    $result .= "
                    <div class='product'>
                    <p>".$product -> name."</p>
                    $img
                    <span class='price'>".$product -> price." &#8381</span>
                    <span class='buy'><a class=\"btn btn-sm btn-success\" href=\"./item?id=".$product -> id."\">Подробнее</a><span> 
                    </div> \n";}
            }}*/}
        $result = $answer;
        return $result;
    }


}