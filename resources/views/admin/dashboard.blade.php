<div class="">
  
    <x-admin-dashboard :clients=$clients
     :coupons_up=$coupons_up
     :qteV=$qteV :qteT=$qteT />
  </div>
  <div class="my-4">
   
    <x-admin-element 
    :bmsc=$bmsc
    :counts=$counts
    :qteV=$qteV 
    :ventes=$ventes />
  </div>
  <div class="my-2">
    
    <x-coupon-list :coupons=$coupons />
  </div>