<?php
/**
 * Created by PhpStorm.
 * User: BaoKhanh
 * Date: 11/2/2021
 * Time: 9:42 AM
 */
class Pagination{

   public $param = [
       'total'=>0,
       'limit'=>0,
       'controller'=>'',
       'action'=>'',
       'full_mode'=>true
   ];

   public function __construct($param)
   {
       $this->param = $param;
   }

   public function getTotalPage(){
       $page = $this->param['total']/$this->param['limit'];
       $page = ceil($page);
       return $page;
   }

   public function getCurrentPage(){
       $page = 1;
       if(isset($_GET['page']) && is_numeric($_GET['page'])){
           $page = $_GET['page'];
           $total_page = $this->getTotalPage();
           if($page > $total_page){
               $page = $total_page;
           }
       }
       return $page;
   }

   public function getPrevPage(){
       $prev_page = '';
       $current_page = $this->getCurrentPage();
       if($current_page >= 2){
           $controller = $this->param['controller'];
           $action = $this->param['action'];
           $page = $current_page - 1;
           if(isset($_GET['content_search'])){
               $search = "&content_search={$_GET['content_search']}";
           }else{
               $search = "";
           }
           if(isset($_GET['category_id'])){
               $category_id = "&category_id={$_GET['category_id']}";
           }else{
               $category_id = "";
           }
           $url_prev = "index.php?controller=$controller&action=$action&page=$page".$search.$category_id;
           $prev_page = "<li><a href='$url_prev'>Prev</a></li>";
       }
       return $prev_page;
   }

   public function getNextpage(){
       $next_page = '';
       $controller = $this->param['controller'];
       $action = $this->param['action'];
       if($this->getCurrentPage() < $this->getTotalPage()){
           if(isset($_GET['content_search'])){
               $search = "&content_search={$_GET['content_search']}";
           }else{
               $search = "";
           }
           if(isset($_GET['category_id'])){
               $category_id = "&category_id={$_GET['category_id']}";
           }else{
               $category_id = "";
           }
           $url_next = "index.php?controller=$controller&action=$action&page=".($this->getCurrentPage() + 1).$search.$category_id;
           $next_page = "<li style='margin-left: 10px'><a href='$url_next'>Next</a></li>";
       }
       return $next_page;
   }

   public function getPaginationPage(){
        $data = "";
        if($this->getTotalPage() == 1){
           return  "";
        }
        $data.="<ul class='pagination'>".$this->getPrevPage();
        $controller = $this->param['controller'];
        $action = $this->param['action'];
       if(isset($_GET['content_search'])){
           $search = "&content_search={$_GET['content_search']}";
       }else{
           $search = "";
       }
       if(isset($_GET['category_id'])){
           $category_id = "&category_id={$_GET['category_id']}";
       }else{
           $category_id = "";
       }
        if($this->param['full_mode'] == true){
            for ($page = 1; $page <= $this->getTotalPage(); $page++){
                if($page == $this->getCurrentPage()){
                    $data .= "<li class='active'><a style='text-decoration: underline; cursor: no-drop' href='#'>$page</a></li>";
                }else{
                    $url_page = "index.php?controller=$controller&action=$action&page=$page";
                    $data .= "<li style='margin:0 10px'><a href='$url_page'>$page</a></li>";
                }
            }
        }else{
            // pagination if full mode == false
            $page_current = (float) $this->getCurrentPage();
            for ($page = 1; $page <= $this->getTotalPage(); $page++){
                if($page == 1 || $page == $this->getTotalPage()|| $page == $page_current+1|| $page == $page_current -1){
                        $page_url = "index.php?controller=$controller&action=$action&page=$page".$search.$category_id;
                        $data .= "<li style='margin:0 10px'><a href='$page_url'>$page</a></li>";
                }
                else if($page ==  $page_current){
                    $data .= "<li class='active'><a style='text-decoration: underline; cursor: no-drop' href='#'>$page</a></li>";
                }
                else if(in_array($page,[$page_current-2, $page_current-3, $page_current+2, $page_current+3])){
                    $data .= "<li>...</li>";
                }
            }
        }
        $data.= $this->getNextpage()."</ul>";
        return $data;
   }

}