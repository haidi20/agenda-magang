<?php
  namespace App\custome ;

  class FilterDropdown{
    public static function user()
    {
      if(request('filter') == '1'||request('excel') == '1'){
        return request('user');
      }else{
        return '' ;
      }
    }
    public static function proyek()
    {
      if(request('filter')== '1'||request('excel')== '1'){
        return request('proyek');
      }else{
        return '' ;
      }
    }
    public static function date1()
    {
      if(request('filter')== '1'||request('excel')== '1'){
        return request('date1');
      }else{
        return '' ;
      }
    }
    public static function date2()
    {
      if(request('filter')== '1'||request('excel')== '1'){
        return request('date2');
      }else{
        return '' ;
      }
    }
  }
 ?>
