<?
// FileName: Pager.class.php
// ��ҳ�࣬�����������ڴ������ݽṹ������������ʾ�Ĺ���
Class Pager
{
   var $PageSize;             //ÿҳ������
   var $CurrentPageID;        //��ǰ��ҳ��
   var $NextPageID;           //��һҳ
   var $PreviousPageID;       //��һҳ
   var $numPages;             //��ҳ��
   var $numItems;             //�ܼ�¼��
   var $isFirstPage;          //�Ƿ��һҳ
   var $isLastPage;           //�Ƿ����һҳ
   var $sql;                  //sql��ѯ���
   var $tablehead;			  //��ͷ

  function Pager($option)
   {
       global $db;
       $this->_setOptions($option);
       // ������
       if ( !isset($this->numItems))
       {
           $res = $db->query($this->sql);
           $this->numItems = $res->numRows();
       }
       // ��ҳ��
       if ( $this->numItems > 0 )
       {
           if ( $this->numItems < $this->PageSize ){ $this->numPages = 1; }
           if ( $this->numItems % $this->PageSize )
           {
               $this->numPages= (int)($this->numItems / $this->PageSize) + 1;
           }
           else
           {
               $this->numPages = $this->numItems / $this->PageSize;
           }
       }
       else
       {
           $this->numPages = 0;
       }

       switch ( $this->CurrentPageID )
       {
           case $this->numPages == 1:
               $this->isFirstPage = true;
               $this->isLastPage = true;
               break;
           case 1:
               $this->isFirstPage = true;
               $this->isLastPage = false;
               break;
           case $this->numPages:
               $this->isFirstPage = false;
               $this->isLastPage = true;
               break;
           default:
               $this->isFirstPage = false;
               $this->isLastPage = false;
       }

       if ( $this->numPages > 1 )
       {
           if ( !$this->isLastPage ) { $this->NextPageID = $this->CurrentPageID + 1; }
           if ( !$this->isFirstPage ) { $this->PreviousPageID = $this->CurrentPageID - 1; }
       }

       return true;
   }

   /***
    *
    * ���ؽ���������ݿ�����
    * �ڽ�����Ƚϴ��ʱ�����ֱ��ʹ���������������ݿ����ӣ�Ȼ������֮�����������������С
    * �����������Ǻܴ󣬿���ֱ��ʹ��getPageData�ķ�ʽ��ȡ��ά�����ʽ�Ľ��
    * getPageData����Ҳ�ǵ��ñ���������ȡ�����
    *
    ***/

   function getDataLink()
   {
       if ( $this->numItems )
       {
           global $db;

           $PageID = $this->CurrentPageID;

           $from = ($PageID - 1)*$this->PageSize;
           $count = $this->PageSize;
           $link = $db->limitQuery($this->sql, $from, $count);   //ʹ��Pear DB::limitQuery������֤���ݿ������

           return $link;
       }
       else
       {
           return false;
       }
   }

   /***
    *
    * �Զ�ά����ĸ�ʽ���ؽ����
    *
    ***/

   function getPageData()
   {
       if ( $this->numItems )
       {
           if ( $res = $this->getDataLink() )
           {       
               if ( $res->numRows() )
               {
                   while ( $row = $res->fetchRow() )
                   {
                       $result[] = $row;
                   }
               }
               else
               {
                   $result = array();
               }

               return $result;
           }
           else
           {
               return false;
           }
       }
       else
       {
           return false;
       }
   }

   function _setOptions($option)
   {
       $allow_options = array(
                   'PageSize',
                   'CurrentPageID',
                   'sql',
                   'numItems'
       );

       foreach ( $option as $key => $value )
       {
           if ( in_array($key, $allow_options) && ($value != null) )
           {
               $this->$key = $value;
           }
       }

       return true;
   }
}
?>